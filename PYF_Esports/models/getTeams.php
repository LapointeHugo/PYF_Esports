<?php

function getTeams() {
    require_once __DIR__ . '/tools/databaseConn.php';
    require_once __DIR__ . '/classes/team.php';
    require_once __DIR__ . '/classes/player.php';

    $DB = connectToDatabase();

    $teams = array();

    try {
        $query = $DB->prepare('CALL GetTeams()');
        $query->execute();
        $result = $query->get_result();
        $query->close();

        $currentTeamId = null;

        while ($row = $result->fetch_assoc()) {
            
            if ($currentTeamId != $row['id_team']) {
                $currentTeamId = $row['id_team'];
                $team = new Team($row['name'], $row['logo']);
                $teams[$currentTeamId] = $team;
            }

            $teams[$currentTeamId]->addPlayer(new Player($row['pName'], $row['main_roster']));
        }

        return $teams;
    } catch (Exception $e) {
        throw $e;
    }
}
