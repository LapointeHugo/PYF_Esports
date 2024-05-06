<?php

/**
 * This file is the entry point for all requests to the application.
 *
 */
require_once __DIR__ . '/router.php';

// Static routes

// Home
get('/', 'views/home.php');
get('/home', 'views/home.php');

// Schedule
get('/schedule', 'views/schedule.php');

// Admin connection
get('/auth', 'views/auth.php');

// Admin control panel
get('/admin', 'views/admin.php');

// Bracket
get('/bracket', 'views/bracket.php');



// Dynamic routes

// Admin connection
post('/auth', 'models/authentification.php');

// Admin disconnection
delete('/auth', 'models/authentification.php');

// Adding a team
post('/team', 'models/addTeam.php');


// Not found
any('/404', 'views/404.php');
