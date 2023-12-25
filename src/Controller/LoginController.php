<?php
// LoginController.php
namespace App\Controller;

use App\DependencyInjection\SessionManager;

class LoginController extends AbstractController
{
    public function login()
    {
        // Récupérez les données du formulaire
        $username = $_POST['username'] ?? '';
        $password = $_POST['password'] ?? '';

       
        $authenticated = $this->authenticate($username, $password);

        if ($authenticated) {
           
            SessionManager::set('user', ['username' => $username]);

           
            $this->redirect($this->generateUrl('home'));
        } else {
            
            return $this->twig->render('login/error.html.twig');
        }
    }

    private function authenticate($username, $password)
    {
        // Logique d'authentification , j'ai pas vraiment du temps avec mon alternance mais je peux ajouter Oauth2 graph api ou juste une simple bdd meme si c'est pas sucirise 
        // Retourne true si l'authentification réussit, false sinon
    }
}
