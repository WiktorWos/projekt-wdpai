<?php
session_start();

require 'Routing.php';

$path = trim($_SERVER['REQUEST_URI'], '/');
$path = parse_url( $path, PHP_URL_PATH);

Router::get('', 'DefaultController');
Router::get('profile', 'DefaultController');
Router::post('addTicket', 'ConnectionController');
Router::post('connectionList', 'ConnectionController');
Router::post('login', 'SecurityController');
Router::post('bookTicket', 'ProfileController');
Router::get('getTickets', 'ProfileController');
Router::get('getBusStops', 'ConnectionController');
Router::get('getUserDetails', 'ProfileController');
Router::post('addUser', 'SecurityController');
Router::get('register', 'SecurityController');
//Router::post('logout', 'SecurityController');


Router::run($path);
