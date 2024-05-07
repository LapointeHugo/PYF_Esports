<?php

/**
 * This file is used to verify if the user has the right to access the ressource
 */

function verifyAuth()
{
  if (session_status() == PHP_SESSION_NONE) {
    session_start();
  }

  if (!isset($_SESSION['user'])) {
    http_response_code(401);
    die('Unauthorized');
  }
}
