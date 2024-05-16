
SHOW PROCEDURE STATUS WHERE Db = 'pyf_esports';

DELIMITER //

DROP PROCEDURE IF EXISTS AddTeam;
CREATE PROCEDURE AddTeam(IN teamName VARCHAR(100), IN teamLogo BLOB)
BEGIN
    INSERT INTO Team(name, logo) VALUES (teamName, teamLogo);

    SELECT LAST_INSERT_ID() AS id_team;
END//

DROP PROCEDURE IF EXISTS AddPlayer;
CREATE PROCEDURE AddPlayer(IN playerName VARCHAR(100), IN playerMainRoster BOOLEAN, IN playerTeam INT, IN playerValoNameTag VARCHAR(100))
BEGIN
    INSERT INTO Player(name, main_roster, id_team, ValoNameTag) VALUES (playerName, playerMainRoster, playerTeam, playerValoNameTag);
END//

DROP PROCEDURE IF EXISTS GetSchedule;
CREATE PROCEDURE GetSchedule()
BEGIN
    SELECT E.matchDateTime, R.type, T1.name AS TeamA, T2.name AS TeamB, T1.logo AS TeamALogo, T2.logo AS TeamBLogo
    FROM Event E
    JOIN Round R ON E.id_round = R.id_round
    JOIN Team T1 ON E.id_teamA = T1.id_team
    JOIN Team T2 ON E.id_teamB = T2.id_team
    WHERE E.matchDateTime > NOW()
    ORDER BY E.matchDateTime ASC;
END//

DROP PROCEDURE IF EXISTS GetTeams;
CREATE PROCEDURE GetTeams()
BEGIN
    SELECT T.*, P.name AS pName , P.main_roster
    FROM Team T
    LEFT JOIN Player P ON T.id_team = P.id_team
    ORDER BY T.id_team ASC;
END//

Call GetTeams();

DROP PROCEDURE IF EXISTS CreateTournament;
CREATE PROCEDURE CreateTournament(IN tournamentDate DATE, IN name VARCHAR(100))
BEGIN
    INSERT INTO Tournament(date_start, name) VALUES (tournamentDate, name);
    SELECT LAST_INSERT_ID() AS id_tournament;
END//

DROP PROCEDURE IF EXISTS AddRound;
CREATE PROCEDURE AddRound(IN roundBestOf INT, IN roundTournament INT, IN typeRound VARCHAR(100))
BEGIN
    INSERT INTO Round(best_of, id_tournament, type) VALUES (roundBestOf, roundTournament, typeRound);
    SELECT LAST_INSERT_ID() AS id_round;
END//

DROP PROCEDURE IF EXISTS AddEvent;
CREATE PROCEDURE AddEvent(IN eventRound INT, IN startDate DATETIME, IN teamA VARCHAR(200), IN teamB VARCHAR(200))
BEGIN
    DECLARE teamA_id INT;
    DECLARE teamB_id INT;
    DECLARE event_id INT;
    DECLARE bestOf INT;

    SELECT id_team INTO teamA_id FROM Team WHERE name = teamA;
    SELECT id_team INTO teamB_id FROM Team WHERE name = teamB;

    IF teamA_id IS NULL OR teamB_id IS NULL THEN
        SIGNAL SQLSTATE '45000'
        SET MESSAGE_TEXT = 'Team not found';
    END IF;

    INSERT INTO Event(id_round, matchDateTime, id_teamA, id_teamB) VALUES (eventRound, startDate, teamA_id, teamB_id);
    SELECT LAST_INSERT_ID() INTO event_id;

    SELECT R.best_of INTO bestOf
    FROM Event E
    JOIN Round R ON E.id_round = R.id_round
    WHERE E.id_event = event_id;

    CALL AutoCreateMatch(bestOf, event_id);
END//

DROP PROCEDURE IF EXISTS AddMatch;
CREATE PROCEDURE AddMatch(IN eventID INT)
BEGIN
    DECLARE matchID INT;

    INSERT INTO ValoMatch(id_event) VALUES (eventID);
    SET matchID = LAST_INSERT_ID();

    CALL CreateMatchPlayers(matchID);
END//

DROP PROCEDURE IF EXISTS CreateMatchPlayers;
CREATE PROCEDURE CreateMatchPlayers(IN matchID INT)
BEGIN
    DECLARE teamA INT;
    DECLARE teamB INT;

    SELECT E.id_teamA, E.id_teamB INTO teamA, teamB
    FROM ValoMatch VM
    JOIN Event E ON VM.id_event = E.id_event
    WHERE VM.id_match = matchID;

    INSERT INTO MatchPlayer(id_match, id_player)
    SELECT matchID, id_player
    FROM Player
    WHERE (id_team = teamA AND main_roster = 1) OR (id_team = teamB AND main_roster = 1);
END//


DROP PROCEDURE IF EXISTS AutoCreateMatch;
CREATE PROCEDURE AutoCreateMatch(IN bestOf INT, IN eventID INT)
BEGIN
    DECLARE counter INT DEFAULT 0;

    WHILE counter < bestOf DO
        CALL AddMatch(eventID);
        SET counter = counter + 1;
    END WHILE;
END//

DELIMITER ;
