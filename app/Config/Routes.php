<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->get('/login', 'UserController::login');
$routes->post('/login', 'UserController::submitLogin');

$routes->group('', ['filter' => 'auth'], function($routes) {
    $routes->get('/etudiants', 'Controller::getAllEtudiants');
    $routes->get('/etudiants/(:num)', 'Controller::getAllNotesDeEtudiant/$1');
    $routes->get('/etudiants/(:num)/(:segment)', 'Controller::getNoteDeEtudiant/$1/$2');
});
