<?php




use PHPUnit\Framework\TestCase;
use DependencyInjection\Container;

class ContainerTest extends TestCase
{
    public function testGet()
    {
        $container = new Container();
        $instance = new \stdClass();

        $container->set('example_service', $instance);

        $this->assertTrue($container->has('example_service'));
        $this->assertSame($instance, $container->get('example_service'));
    }

    
}