<?php



namespace App\Controller;

use App\Routing\Attribute\AuthAttribute;

class ExampleController extends AbstractController
{
    #[AuthAttribute(requireLogin: true)]
    public function securedAction()
    {
        // Le code pour la page sécurisée
        // ...
    }
}