<?php

namespace App\DependencyInjection;

use Psr\Container\ContainerInterface;

class Container implements ContainerInterface
{
    private array $services = [];
    private array $serviceDefinitions = [];

    public function get($id)
    {
        if (!$this->has($id)) {
            throw new ServiceNotFoundException("Unable to get service in container: Service $id not found");
        }

        if (!array_key_exists($id, $this->services)) {
            // Lazy load the service if not already loaded
            $this->services[$id] = call_user_func($this->serviceDefinitions[$id]);
        }

        return $this->services[$id];
    }

    public function has($id): bool
    {
        return array_key_exists($id, $this->services) || array_key_exists($id, $this->serviceDefinitions);
    }

    public function set(string $id, object $instance): self
    {
        $this->services[$id] = $instance;

        return $this;
    }

    public function addServiceDefinition(string $id, callable $definition): self
    {
        $this->serviceDefinitions[$id] = $definition;

        return $this;
    }
}