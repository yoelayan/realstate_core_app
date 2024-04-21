<?php

use CodeIgniter\Router\RouteCollection;
/**
 * @var RouteCollection $routes
 */

function buildCrudHelper($routes, $controllerName)
{
    $routes->get('/', $controllerName . '::index');
    $routes->get('(:num)', $controllerName . '::show/$1');
    $routes->post('create', $controllerName . '::create');
    $routes->post('update/(:num)', $controllerName . '::update/$1');
    $routes->post('delete/(:num)', $controllerName . '::delete/$1');
}

$routes->group('real-states', function ($routes) {
    buildCrudHelper($routes, 'RealStateController');
});

$routes->group('countries', function ($routes) {
    buildCrudHelper($routes, 'CountryController');
});

$routes->group('business-models', function ($routes) {
    buildCrudHelper($routes, 'BusinessModelController');
});

$routes->group('currencies', function ($routes) {
    buildCrudHelper($routes, 'CurrencyController');
});

$routes->group('kind-markets', function ($routes) {
    buildCrudHelper($routes, 'KindMarketController');
});

$routes->group('kind-properties', function ($routes) {
    buildCrudHelper($routes, 'KindPropertyController');
});

$routes->group('kind-unit-areas', function ($routes) {
    buildCrudHelper($routes, 'KindUnitAreaController');
});

$routes->group('property-types', function ($routes) {
    buildCrudHelper($routes, 'PropertyTypeController');
});

$routes->group('property-conditions', function ($routes) {
    buildCrudHelper($routes, 'PropertyConditionsController');
});
