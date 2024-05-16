<?php
/**
 * Creation of a tournament
 *
 * This file is used to create a tournament in the database.
 *
 * JSON body:
 * {
 *     "Tname": "tournament name",
 *     "Tdate": "tournament date",
 *     "Round": [
 *        {
 *          "RType": "Ex: semi-final",
 *          "bestOf": "best of",
 *          "Event" : [
 *              {
 *                 "Edate": "2024-12-13 12:00:00",
 *                 "Team1": "team name",
 *                 "Team2": "team name",
 *          ]
 *        }
 *      ]
 * }
 */
header('Content-Type: application/json');
require_once __DIR__ . '/tools/databaseConn.php';
require_once __DIR__ . '/tools/verifyAuth.php';
require_once __DIR__ . '/tools/verifyJSON.php';

$DB = connectToDatabase();

//verifyAuth();

$data = json_decode(file_get_contents('php://input'), true);

$tournamentName = verifyJSON($data, 'Tname');
$tournamentDate = date('Y-m-d', strtotime(verifyJSON($data, 'Tdate')));
$rounds = verifyJSON($data, 'Round');

$DB->begin_transaction();

// Add the tournament
try{
    $query = $DB->prepare('CALL CreateTournament(?, ?)');
    $query->bind_param('ss', $touurnamentDate, $tournamentName);
    $query->execute();
    $result = $query->get_result();
    $query->close();

    if($result->num_rows == 1 && $row = $result->fetch_assoc()){
        $tournamentId = $row['id_tournament'];
    } else {
        throw new Exception('An error occurred while adding the tournament');
    }

    // Add the rounds
    foreach($rounds as $round){
        $roundType = verifyJSON($round, 'RType');
        $bestOf = verifyJSON($round, 'bestOf');
        $events = verifyJSON($round, 'Event');

        $query = $DB->prepare('CALL AddRound(?, ?, ?)');
        $query->bind_param('iis', $bestOf, $tournamentId, $roundType);
        $query->execute();
        $result = $query->get_result();
        $query->close();

        if($result->num_rows == 1 && $row = $result->fetch_assoc()){
            $roundId = $row['id_round'];
        } else {
            throw new Exception('An error occurred while adding the round');
        }

        // Add the events
        foreach($events as $event){
            $eventDate = date('Y-m-d H:i:s', strtotime(verifyJSON($event, 'Edate')));
            $team1 = verifyJSON($event, 'Team1');
            $team2 = verifyJSON($event, 'Team2');

            $query = $DB->prepare('CALL AddEvent(?, ?, ?, ?)');
            $query->bind_param('isss', $roundId, $eventDate, $team1, $team2);
            $query->execute();
            $query->close();
        }
    }

    $DB->commit();
    echo json_encode(['success' => 'Tournament added successfully']);

} catch(Exception $e){
    $DB->rollback();
    http_response_code(500);
    echo json_encode(['error' => $e->getMessage()]);
    exit();
}
