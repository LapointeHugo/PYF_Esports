<?php

/**
 * Function to connect to the database.
 *
 * @return MySQLi
 */

 function connectToDatabase()
 {
    require_once __DIR__ . '/../../../../configData.php';

    try{

        $db = new mysqli($DB_HOST, $DB_USER, $DB_PASSWORD, $DB_NAME);

        if($db->connect_error){
            http_response_code(500);
            die('Connection failed: ' . $db->connect_error);
        }

    } catch (Exception $e) {
        http_response_code(500);
        die('Error: ' . $e->getMessage());
    }

    return $db;
 }
