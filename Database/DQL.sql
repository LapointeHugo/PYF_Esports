-- Active: 1714976014167@@cocktailwizardbd.mysql.database.azure.com@3306@pyf_esports


DROP TABLE IF EXISTS Account CASCADE;
DROP TABLE IF EXISTS EventPlayer CASCADE;
DROP TABLE IF EXISTS ValoMatch CASCADE;
DROP TABLE IF EXISTS Event CASCADE;
DROP TABLE IF EXISTS Round CASCADE;
DROP TABLE IF EXISTS Tournament CASCADE;
DROP TABLE IF EXISTS Player CASCADE;
DROP TABLE IF EXISTS Team CASCADE;



CREATE TABLE Account(
    id_account INT PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(100) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL
);

CREATE TABLE Team(
    id_team INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(100) NOT NULL UNIQUE,
    logo BLOB
);

CREATE TABLE Player(
    id_player INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(100) NOT NULL,
    ValoNameTag VARCHAR(100) NOT NULL,
    main_roster BOOLEAN NOT NULL DEFAULT 1,
    rating float(8,2),
    id_team INT,
    FOREIGN KEY (id_team) REFERENCES Team(id_team)
);

CREATE TABLE Tournament(
    id_tournament INT PRIMARY KEY AUTO_INCREMENT,
    date_start DATE,
    id_winner INT,
    FOREIGN KEY (id_winner) REFERENCES Team(id_team)
);

CREATE TABLE Round(
    id_round INT PRIMARY KEY AUTO_INCREMENT,
    type VARCHAR(100),
    best_of INT NOT NULL,
    id_tournament INT,
    FOREIGN KEY (id_tournament) REFERENCES Tournament(id_tournament)
);

CREATE TABLE Event(
    id_event INT PRIMARY KEY AUTO_INCREMENT,
    id_round INT,
    id_winner INT,
    scoreA INT NOT NULL DEFAULT 0,
    scoreB INT NOT NULL DEFAULT 0,
    id_teamA INT,
    id_teamB INT,
    FOREIGN KEY (id_round) REFERENCES Round(id_round),
    FOREIGN KEY (id_winner) REFERENCES Team(id_team),
    FOREIGN KEY (id_teamA) REFERENCES Team(id_team),
    FOREIGN KEY (id_teamB) REFERENCES Team(id_team)
);

CREATE TABLE ValoMatch(
    id_match INT PRIMARY KEY AUTO_INCREMENT,
    id_event INT,
    id_winner INT,
    roundWinAtkA INT,
    roundWinDefA INT,
    nbRound INT,
    map VARCHAR(100),
    matchDateTime DATETIME,
    FOREIGN KEY (id_event) REFERENCES Event(id_event),
    FOREIGN KEY (id_winner) REFERENCES Team(id_team)
);

CREATE TABLE EventPlayer(
    id_match INT,
    id_player INT,
    averageCombatScore INT,
    kills INT,
    deaths INT,
    assists INT,
    averageDamagePerRound INT,
    headshotRT INT,
    firstKillInRound INT,
    firstDeathInRound INT,
    PRIMARY KEY (id_match, id_player),
    FOREIGN KEY (id_match) REFERENCES ValoMatch(id_match),
    FOREIGN KEY (id_player) REFERENCES Player(id_player)
);
