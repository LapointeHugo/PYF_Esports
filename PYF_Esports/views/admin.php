<?php
    session_start();
    if(!isset($_SESSION['username'])){
        header('Location: /auth');
        exit();
    }
?>

<!DOCTYPE html>
<html>
    <h1>admin</h1>
</html>
