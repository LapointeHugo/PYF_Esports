<?php

/**
 * Add a team to the database
 *
 * JSON body:
 * {
 *     "Tname": "team name",
 *     "logo": "team logo"(optional),
 *     players: [
 *        {
 *           "Pname": "player name",
 *           "role": "1 or 0"(1 for main, 0 for sub)
 *        }
 *     ]
 * }
 */

require_once __DIR__ . '/tools/databaseConn.php';
require_once __DIR__ . '/tools/verifyAuth.php';
require_once __DIR__ . '/tools/verifyJSON.php';

//verifyAuth();

// Error accumulator
$errors = [];
$success = false;

// Get the JSON body
$body = file_get_contents('php://input');
$data = json_decode($body, true);

$teamName = verifyJSON($data, 'Tname');
$players = verifyJSON($data, 'players');

if (isset($data['logo'])) {
    $teamLogo = $data['logo'];
} else {
    $teamLogo = null;
}

$DB = connectToDatabase();

$DB->begin_transaction();

// Add the team
try{
    $query = $DB->prepare('CALL addTeam(?, ?)');
    $query->bind_param('ss', $teamName, $teamLogo);
    $query->execute();
    $result = $query->get_result();
    $query->close();

    $teamId = $result->fetch_assoc()['teamId'];

    // Add the players
    foreach ($players as $player) {
        $playerName = verifyJSON($player, 'Pname');
        $playerRole = verifyJSON($player, 'role') == 1 || verifyJSON($player, 'role') == 0 ? verifyJSON($player, 'role') : 1;

        $query = $DB->prepare('CALL addPlayer(?, ?, ?)');
        $query->bind_param('sis', $playerName, $playerRole, $teamId);
        $query->execute();
        $query->close();
    }
}
