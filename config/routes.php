<?php
/**
 * Routes configuration.
 *
 * In this file, you set up routes to your controllers and their actions.
 * Routes are very important mechanism that allows you to freely connect
 * different URLs to chosen controllers and their actions (functions).
 *
 * It's loaded within the context of `Application::routes()` method which
 * receives a `RouteBuilder` instance `$routes` as method argument.
 *
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */

use Cake\Routing\Route\DashedRoute;
use Cake\Routing\RouteBuilder;

return static function (RouteBuilder $routes) {
    /*
     * The default class to use for all routes
     *
     * The following route classes are supplied with CakePHP and are appropriate
     * to set as the default:
     *
     * - Route
     * - InflectedRoute
     * - DashedRoute
     *
     * If no call is made to `Router::defaultRouteClass()`, the class used is
     * `Route` (`Cake\Routing\Route\Route`)
     *
     * Note that `Route` does not do any inflections on URLs which will result in
     * inconsistently cased URLs when used with `{plugin}`, `{controller}` and
     * `{action}` markers.
     */
    $routes->setRouteClass(DashedRoute::class);

    $routes->scope('/', function (RouteBuilder $builder) {

        $builder->connect('/user/login',
            ['prefix' => 'V1', 'controller' => 'Users', 'action' => 'login']);

        $builder->connect('/users/login',
            ['controller' => 'Users', 'action' => 'login']);

        $builder->connect('/users/logout', ['prefix' => 'V1', 'controller' => 'Users', 'action' => 'logout']);
        $builder->connect('/logout/user', ['prefix' => 'V1', 'controller' => 'Users', 'action' => 'logout']);

        $builder->fallbacks();
    });

    $routes->prefix('v1', function (RouteBuilder $builder) {
        //$builder->connect('/users/login', ['controller' => 'Users', 'action' => 'login']);
        //Parse specified extensions from URLs
        $builder->setExtensions(['json', 'xml']);
        //Connect API actions here.
        $builder->resources('Users');
        $builder->fallbacks(DashedRoute::class);
    });

};
