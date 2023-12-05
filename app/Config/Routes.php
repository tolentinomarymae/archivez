<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'UserController::index');
$routes->get('/register', 'UserController::register');
$routes->get('/logins', 'UserController::login');
