<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->add('/user/', 'User::index');
$routes->add('/user/(:any)', 'User::$1');
$routes->add('/(:any)', 'Home::$1');
