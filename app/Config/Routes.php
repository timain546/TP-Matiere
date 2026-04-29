<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/dashboard', 'Home::dashboard');
$routes->get('/list', 'Home::list');

$routes->get('/etudiants', 'Controller::getAllEtudiants');
$routes->get('/etudiants/(:num)', 'Controller::getAllNotesDeEtudiant/$1');
$routes->get('/etudiants/(:num)/(:segment)', 'Controller::getNoteDeEtudiant/$1/$2');
