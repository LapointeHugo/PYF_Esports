<?php

/**
 * Add a team to the database
 *
 * JSON body:
 * {
 *     "name": "team name",
 *     "logo": "team logo"(optional),
 *     players: [
 *        {
 *           "name": "player name",
 *           "role": "1 or 0"(1 for main, 0 for sub)
 *        }
 *     ]
 * }
 */

require_once __DIR__ . '/tools/databaseConn.php';
require_once __DIR__ . '/tools/verifyAuth.php';
