<?php

namespace App\Libraries;

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
class RoutesBuilder
{
    public static function create($controller)
    {
        $routes = service('routes');

        $routes->get('clients', $controller . '::index');

        return $routes;
    }
}