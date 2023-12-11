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

// email

$routes->match(['get', 'post'], '/mail', 'UserController::mail');
$routes->match(['get', 'post'], '/signupview', 'UserController::signupview');
$routes->match(['get', 'post'], '/signups', 'UserController::signups');
$routes->match(['get', 'post'], 'verify/(:any)', 'UserController::verify/$1');



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
$routes->post('/myresearch/edit/(:num)', 'ResearchController::myresearchedit/$1');
$routes->post('/myresearch/update', 'ResearchController::myresearchupdate');

//research detatils
$routes->get('/researchdetails/(:any)', 'ResearchController::researchdetails/$1');
$routes->get('/bookmarks', 'ResearchController::bookmarks');
$routes->get('bookmarkResearch/(:num)', 'ResearchController::bookmarkResearch/$1');
$routes->get('/bookmarkdetails/(:any)', 'ResearchController::bookmarkdetails/$1');
$routes->get('archive/(:num)', 'ResearchController::archive/$1');
$routes->get('archive', 'ResearchController::archives');

// admin
$routes->get('/admindashboard', 'AdminController::admindashboard');
$routes->get('/adminresearchpapers', 'AdminController::adminresearchpapers');
$routes->get('/manageteachers', 'AdminController::manageteachers');
$routes->get('/managesections', 'AdminController::managesection');
$routes->get('/managesubject', 'AdminController::managesubject');
$routes->get('/adminresearchdetails/(:any)', 'AdminController::researchdetails/$1');


$routes->post('/addteacher', 'AdminController::addteacher');
$routes->post('/addteacher/edit/(:num)', 'AdminController::editteacher/$1');
$routes->post('/addteacher/update', 'AdminController::updateteacher');
$routes->post('manageteachers/delete/(:num)', 'AdminController::deleteteacher/$1');

$routes->post('/addsection', 'AdminController::addsection');
$routes->post('/addsection/edit/(:num)', 'AdminController::editsection/$1');
$routes->post('/addsection/update', 'AdminController::updatesection');
$routes->post('managesection/delete/(:num)', 'AdminController::deletesection/$1');

$routes->post('/addsubject', 'AdminController::addsubject');
$routes->post('/addsubject/edit/(:num)', 'AdminController::editsubject/$1');
$routes->post('/addsubject/update', 'AdminController::updatesubject');
$routes->post('managesubjects/delete/(:num)', 'AdminController::deletesubject/$1');

// instructor
$routes->get('/instuctordashboard', 'InstructorController::instructordashboard');
$routes->get('/instructorresearchpapers', 'InstructorController::instructorresearchpapers');
$routes->get('/instructorresearchdetails/(:any)', 'InstructorController::researchdetails/$1');

// comment
$routes->post('/addcomment', 'ResearchController::addcomment');
$routes->get('upvoteResearch/(:num)', 'ResearchController::upvoteResearch/$1');
