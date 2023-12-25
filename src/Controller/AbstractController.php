<?php

namespace App\Controller;

use Twig\Environment;

abstract class AbstractController
{
    protected Environment $twig;
    protected $router;

    public function __construct(Environment $twig, $router)
    {
        $this->twig = $twig;
        $this->router = $router;
    }

    public function redirect(string $location): void
    {
        header('Location: ' . $location);
        exit;
    }

    public function generateUrl(string $routeName, array $parameters = []): string
    {
        return $this->router->generateUrl($routeName, $parameters);
    }
}
