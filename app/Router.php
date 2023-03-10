<?php

namespace App;

use App\Controllers\AboutController;
use App\Controllers\AuthController;
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

        $matcher = new UrlMatcher($routes, $context);

        try {
            $arrayUri = explode('?', $_SERVER['REQUEST_URI']);

            if (str_contains($arrayUri[0], 'homepage/login')) {
                $controller = new AuthController();
                $controller->loginAction();
            } else if (str_contains($arrayUri[0], 'homepage')) {
                $controller = new AuthController();
                $controller->indexAction();
            } else if (str_contains($arrayUri[0], 'about')) {
                $controller = new AboutController();
                $controller->indexAction();
            }
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
