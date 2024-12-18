<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'User::index');
$routes->get('itemDetails/(:num)', 'ItemDetails::index/$1');
$routes->get('itemDetailsRFID/checkTmpRFID', 'ItemDetailsRFID::checkTmpRFID');
$routes->get('API/insert', 'APIController::insert');

$routes->setAutoRoute(true);