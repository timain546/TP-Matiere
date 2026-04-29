<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/dashboard', 'Home::dashboard');

$routes->get('/login', 'UserController::login');
$routes->post('/login', 'UserController::submitLogin');

$routes->group('', ['filter' => 'auth'], function($routes) {
    $routes->get('/etudiants', 'Controller::getAllEtudiants');
    $routes->get('/etudiants/(:segment)/resultats', 'Controller::getAllResultatsDeEtudiant/$1');
    $routes->get('/etudiants/(:segment)/resultats/(:segment)', 'Controller::getResultatDeEtudiant/$1/$2');

    $routes->get('/etudiants/(:segment)/notes', 'Controller::getAllNotesDeEtudiant/$1');
    $routes->post('/etudiants/(:segment)/notes/new', 'Controller::submitNewNote/$1');
    $routes->get('/etudiants/(:segment)/notes/delete', 'Controller::deleteNote/$1');
});
