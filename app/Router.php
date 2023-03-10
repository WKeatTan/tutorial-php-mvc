<?php

namespace App;

use App\Controllers\AboutController;
use App\Controllers\PageController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\RequestContext;
use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\Routing\Matcher\UrlMatcher;
use Symfony\Component\Routing\Exception\MethodNotAllowedException;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\Exception\NoConfigurationException;

class Router
{
    public function __invoke(RouteCollection $routes)
    {
        $context = new RequestContext();
        $context->fromRequest(Request::createFromGlobals());

        // Routing can match routes with incoming requests
        $matcher = new UrlMatcher($routes, $context);

        try {
            $arrayUri = explode('?', $_SERVER['REQUEST_URI']);
            // $extactRoute = str_replace('/tutorial-php-mvc', '', $arrayUri[0]);
            // $matcher = $matcher->match($arrayUri[0]);

            // // Cast params to int if numeric
            // array_walk($matcher, function (&$param) {
            //     if (is_numeric($param)) {
            //         $param = (int) $param;
            //     }
            // });

            // https://github.com/gmaccario/simple-mvc-php-framework/issues/2
            // Issue #2: Fix Non-static method ... should not be called statically
            // $className = '\\App\\Controllers\\PageController';
            // $classInstance = new $className();

            if (str_contains($arrayUri[0], 'homepage')) {
                $controller = new PageController();
                $controller->indexAction();
            } else if (str_contains($arrayUri[0], 'about')) {
                $controller = new AboutController();
                $controller->indexAction();
            }
            // Add routes as paramaters to the next class
            // $params = array_merge(array_slice($matcher, 2, -1), array('routes' => $routes));

            // call_user_func_array(array($classInstance), []);
            // call_user_func_array($className, []);
        } catch (MethodNotAllowedException $e) {
            echo 'Route method is not allowed.';
        } catch (ResourceNotFoundException $e) {
            echo 'Route does not exists.';
        } catch (NoConfigurationException $e) {
            echo 'Configuration does not exists.';
        }
    }
}

// Invoke
$router = new Router();
$router($routes);