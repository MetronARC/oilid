<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Pages::index');
$routes->get('/about', 'Pages::about');
$routes->get('/contact', 'Pages::contact');

$routes->get('contact/generate', 'Contact::generate');
$routes->post('contact/validate', 'Contact::validateCaptcha');
$routes->post('contact/sendEmail', 'Contact::sendEmail');