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
 *           "valoNameTag" : "player valorant name tag",
 *           "role": "1 or 0"(1 for main, 0 for sub)
 *        }
 *     ]
 * }
 */
header('Content-Type: application/json');
require_once __DIR__ . '/tools/databaseConn.php';
require_once __DIR__ . '/tools/verifyAuth.php';
require_once __DIR__ . '/tools/verifyJSON.php';

//verifyAuth();

$nbPlayersMain = 0;

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
try {
    $query = $DB->prepare('CALL addTeam(?, ?)');
    $query->bind_param('ss', $teamName, $teamLogo);
    $query->execute();
    $result = $query->get_result();
    $query->close();

    if ($result->num_rows == 1 && $row = $result->fetch_assoc()) {
        $teamId = $row['id_team'];
    } else {
        throw new Exception('An error occurred while adding the team');
    }

    // Add the players
    foreach ($players as $player) {
        $playerName = verifyJSON($player, 'Pname');
        $nameTag = verifyJSON($player, 'valoNameTag');
        $playerRole = verifyJSON($player, 'role') == 1 || verifyJSON($player, 'role') == 0 ? verifyJSON($player, 'role') : 0;

        if ($playerRole == 1) {
            $nbPlayersMain++;
        }

        $query = $DB->prepare('CALL addPlayer(?, ?, ?,?)');
        $query->bind_param('siss', $playerName, $playerRole, $teamId, $nameTag);
        $query->execute();
        $query->close();
    }

    if ($nbPlayersMain != 5) {
        throw new Exception('A team must have 5 main players');
    }

    $DB->commit();
    echo json_encode(['message' => 'Team added successfully']);
} catch (Exception $e) {
    $DB->rollback();
    http_response_code(400);
    echo json_encode(['error' => $e->getMessage()]);
}
