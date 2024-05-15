<?php

/**
 * This file is the entry point for all requests to the application.
 *
 */
require_once __DIR__ . '/router.php';

// Static routes

// Home
get('/', 'controllers/layout.php');
get('/home', 'controllers/layout.php');

// Schedule
get('/schedule', 'controllers/layout.php');

// Admin connection
get('/auth', 'controllers/layout.php');

// Admin control panel
get('/admin', 'controllers/layout.php');

// Bracket
get('/bracket', 'controllers/layout.php');

get('/teams', 'controllers/layout.php');

get('/team', 'controllers/layout.php');

get('/players', 'controllers/layout.php');


// Dynamic routes

// Admin connection
post('/auth', 'models/authentification.php');

// Admin disconnection
delete('/auth', 'models/authentification.php');

// Adding a team
post('/api/team', 'models/addTeam.php');

get('/api/schedule', 'models/getSchedule.php');

post('/api/tournament', 'models/addTournament.php');


// Not found
any('/404', 'views/404.php');
