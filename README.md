# MVC rendu Reda El Karne
# Symfony Console
cet exemple  présente l'envoi d'e-mails via la console en utilisant Symfony Console. Un exemple générique utilise la bibliothèque PHPMailer pour envoyer un e-mail de test. Les paramètres SMTP sont configurés pour utiliser MailHog.
### Fonctionnement 
 - Commande Symfony Console : La commande test:email envoie un e-mail de test.
 - PHPMailer : La bibliothèque PHPMailer est utilisée pour gérer l'envoi d'e-mails.
 - Configuration SMTP : Les paramètres du serveur SMTP sont définis pour utiliser MailHog.

# Conteneur d'injection de dépendances avec Chargement Différé (lazy loading)
Cet parti illustre l'implémentation d'un conteneur d'injection de dépendances personnalisé avec des capacités de chargement différé. Le chargement différé garantit que les services ne sont créés que lorsqu'ils sont demandés, optimisant ainsi l'utilisation des ressources dans l'application.
### Fonctionnement 
- Définitions de Services : Vous pouvez ajouter des définitions de services au conteneur, qui sont des fonctions appelables responsables de la création effective de l'instance du service.

- Chargement Différé : Lorsqu'un service est demandé, le conteneur vérifie s'il a déjà été créé. Si ce n'est pas le cas, il utilise la définition fournie pour instancier le service, garantissant que les services sont chargés uniquement lorsqu'ils sont nécessaires.

Cette approche permet la création différée des services, offrant une manière efficace de gérer les ressources dans une application PHP.

# Authentification, Gestion de Session et Autorisations dans MVC
Pour intégrer l'authentification, la gestion de session et les autorisations dans mon application MVC,j'ai suivie les étapes :
#### Authentification :

- Créez un formulaire de login dans ma vue, puis un contrôleur qui gère la soumission du formulaire en utilisant la méthode POST.
#### Gestion de la session :

- Créez un service de gestion de session (SessionManager) pour interagir avec $_SESSION.
#### Autorisations :

- Créez un attribut d'autorisation qui peut être appliqué au-dessus d'un contrôleur. Dans cet exemple, ajoutons un attribut @Auth.

Par manque de temps j'ai pas arrive a utilise l'Oauth2 de microsoft que j'utilise deja a l'entreprise pour un acces client 
## la Fonction path ( définition d'une extension pour créer des URL dynamiquement)
J'ai ajoute La fonction path ma framework pour permettre la génération dynamique d'URLs dans les modèles Twig. Voici comment elle fonctionne :
- Injection du Routeur : Dans le constructeur de mon AbstractController, le routeur est injecté. Cela permet au contrôleur d'avoir accès aux fonctionnalités de routage.

- Méthode getPath : Une nouvelle méthode, getPath, est ajoutée à l'AbstractController. Cette méthode prend le nom de la route en paramètre ainsi qu'un tableau optionnel de paramètres, et elle utilise le routeur pour générer l'URL correspondante.
# PHP TEST 
#### instalation 
```composer require --dev phpunit/phpunit```
#### Écriture de Tests
- Crée les Fichiers de Test : Pour chaque classe, écris des fichiers de test en utilisant les fonctionnalités de PHPUnit
 #### Exécution des Tests
- Exécution Globale : Dans le terminal, lance la commande suivante pour exécuter tous les tests :
vendor/bin/phpunit```
- Exécution Spécifique : Tu peux aussi lancer des tests spécifiques en indiquant le chemin du fichier de test. Par exemple 
```vendor/bin/phpunit tests/Routing/RouterTest.php```



































