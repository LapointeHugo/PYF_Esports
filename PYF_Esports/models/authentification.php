<?php
header('Content-Type: application/json');
require_once __DIR__ . '/tools/databaseConn.php';

/**
 * Script to handle the authentication of the user.
 * Redirects to the admin page if the user is authenticated.
 *
 */

session_start();

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    // Error accumulator
    $errors = [];
    $success = false;

    // Check if username is set
    if(!isset($_POST['username']) || empty($_POST['username'])){
        $errors[] = 'Username is required';
    } else {
        $username = trim($_POST['username']);
    }

    // Check if password is set
    if(!isset($_POST['password']) || empty($_POST['password'])){
        $errors[] = 'Password is required';
    } else {
        $password = trim($_POST['password']);
    }

    if(empty($errors)) {

        try{
            $db = connectToDatabase();

            $username = $db->real_escape_string($_POST['username']);

            $query = "SELECT password FROM Account WHERE username = '$username'";
            $result = $db->query($query);

            if($result->num_rows === 1){
                $user = $result->fetch_assoc();

                if(password_verify($_POST['password'], $user['password'])){
                    $success = true;
                    $_SESSION['username'] = $username;
                } else {
                    $errors[] = 'Invalid username or password';
                }
            } else {
                $errors[] = 'Invalid username or password';
            }
        } catch (Exception $e) {
            $errors[] = 'An error occurred';
        }
    }

    if($success && empty($errors)){
        echo json_encode(['success' => true]);
    } else {
        http_response_code(400);
        echo json_encode($errors);
    }

} elseif ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
    $_SESSION = [];
    session_destroy();
    echo json_encode(['success' => true]);
}
