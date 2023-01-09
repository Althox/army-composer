<?php
namespace Framework;

use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\Routing\RouterInterface;

class Url
{
    private RouteCollection $routeCollection;

    public function __construct(RouterInterface $router)
    {
        $this->routeCollection = $router->getRouteCollection();
    }

    public function generateLink(string $controllerClass, string $method): string
    {
        foreach ($this->routeCollection as $route) {
            $defaults = $route->getDefaults();
            $controllerPath = $defaults['_controller'];
            $parts = explode('::', $controllerPath);

            if ($parts[0] !== $controllerClass) {
                continue;
            }

            if ($parts[1] !== $method) {
                continue;
            }

            return $route->getPath();
        }

        throw new \RuntimeException('Route for controller and method is missing');
    }
}
