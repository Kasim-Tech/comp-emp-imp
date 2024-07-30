<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'RegistrationController::index');
$routes->get('login', 'LoginController::index'); 
$routes->post('registration/register', 'RegistrationController::register');
$routes->post('login/login', 'LoginController::login');
$routes->get('login/logout', 'LoginController::logout');
$routes->get('dashboard', 'DashboardController::index');

