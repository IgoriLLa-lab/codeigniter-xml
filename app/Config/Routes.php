<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'ContractController::index');
$routes->get('/contracts/create', 'ContractController::create');
$routes->post('/contracts/store', 'ContractController::store');
$routes->get('/contracts/edit/(:num)', 'ContractController::edit/$1');
$routes->post('/contracts/update/(:num)', 'ContractController::update/$1');
$routes->post('/contracts/delete/(:num)', 'ContractController::delete/$1');
$routes->get('/contracts/download/(:num)', 'ContractController::download/$1');