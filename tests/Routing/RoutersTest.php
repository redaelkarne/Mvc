<?php




use PHPUnit\Framework\TestCase;
use Routing\Router;
use Routing\Route;

class RouterTest extends TestCase
{
    public function testAddRoute()
    {
        $router = new Router();
        $route = new Route('/example', 'example_route', 'GET', 'Controller\ExampleController', 'exampleAction');

        $router->addRoute($route);
        $routes = $router->getRoutes();

        $this->assertCount(1, $routes);
        $this->assertEquals($route, $routes[0]);
    }

   
}