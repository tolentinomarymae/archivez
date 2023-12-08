<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */


//login
$routes->get('/', 'UserController::index');
$routes->get('/registerview', 'UserController::registerview');
$routes->post('/register', 'UserController::register');
$routes->get('/logins', 'UserController::login');
$routes->post('/loginauth', 'UserController::loginauth');


//dashboard
$routes->get('/studentdashboard', 'StudentDashboardController::studentdashboard');
$routes->get('/studentprofile', 'StudentDashboardController::studentprofile');
$routes->get('/researchoutputs', 'ResearchOutputController::researchoutputs');


//researchpapers
$routes->get('/researchpapers', 'ResearchController::researchpapers');
$routes->get('/insertresearch', 'ResearchController::insertresearch');
$routes->post('/addresearch', 'ResearchController::addnewresearch');
$routes->get('/viewresearch', 'ResearchController::viewresearchpaper');
$routes->get('/myresearchoutput', 'ResearchController::myresearch');
