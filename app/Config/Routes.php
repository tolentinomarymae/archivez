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
$routes->post('/addprofile', 'StudentDashboardController::addprofile');

//research papers
$routes->get('/researchpapers', 'ResearchController::researchpapers');
$routes->get('/insertresearch', 'ResearchController::insertresearch');
$routes->post('/addresearch', 'ResearchController::addnewresearch');
$routes->get('/viewresearch', 'ResearchController::viewresearchpaper');
$routes->get('/myresearchoutput', 'ResearchController::myresearch');
$routes->post('/myresearchoutput/edit/(:num)', 'ResearchController::edit/$1');
$routes->post('/myresearchoutput/update', 'ResearchController::update');

//research detatils
$routes->get('/researchdetails/(:any)', 'ResearchController::researchdetails/$1');
