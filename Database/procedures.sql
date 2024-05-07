
SHOW PROCEDURE STATUS WHERE Db = 'pyf_esports';

DELIMITER //

DROP PROCEDURE IF EXISTS AddTeam;
CREATE PROCEDURE AddTeam(IN teamName VARCHAR(100), IN teamLogo BLOB)
BEGIN
    INSERT INTO Team(name, logo) VALUES (teamName, teamLogo);

    SELECT LAST_INSERT_ID() AS id_team;
END//

DROP PROCEDURE IF EXISTS AddPlayer;
CREATE PROCEDURE AddPlayer(IN playerName VARCHAR(100), IN playerMainRoster BOOLEAN, IN playerTeam INT)
BEGIN
    INSERT INTO Player(name, main_roster, id_team) VALUES (playerName, playerMainRoster, playerTeam);
END//
