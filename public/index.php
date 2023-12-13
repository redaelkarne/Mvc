<?php

require_once __DIR__ . '/../vendor/autoload.php';

use App\Controller\IndexController;
use App\Controller\ProductController;
use App\Entity\User;
use App\Routing\Exception\RouteNotFoundException;
use App\Routing\Route;
use App\Routing\Router;
use Doctrine\DBAL\DriverManager;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\ORMSetup;

if (
    php_sapi_name() !== 'cli' && // Environnement d'exécution != console
    preg_match('/\.(ico|png|jpg|jpeg|css|js|gif)$/', $_SERVER['REQUEST_URI'])
) {
    return false;
}

// DATABASE CONNECTION
$dbConfig = parse_ini_file(__DIR__ . '/../config/db.ini');

if ($dbConfig === false) {
    echo "Fichier de configuration de la base de données introuvable, créez un fichier db.ini dans config/ (voir README)";
    exit;
}

$dbParams = [
    'driver'   => $dbConfig['DB_DRIVER'],
    'user'     => $dbConfig['DB_USER'],
    'password' => $dbConfig['DB_PASSWORD'],
    'dbname'   => $dbConfig['DB_NAME'],
    'host'     => $dbConfig['DB_HOST'],
    'port'     => $dbConfig['DB_PORT'],
];

$paths = [__DIR__ . '/../src/Entity'];
$isDevMode = true;

$config = ORMSetup::createAttributeMetadataConfiguration($paths, $isDevMode);
$connection = DriverManager::getConnection($dbParams, $config);
$entityManager = new EntityManager($connection, $config);

$user = new User();
$user
    ->setEmail("haf@teci.gw")
    ->setPassword(password_hash("test", PASSWORD_BCRYPT));

$entityManager->persist($user);
$entityManager->flush();

// ROUTER
$router = new Router();

$router
    ->addRoute(
        new Route('/', 'home', 'GET', IndexController::class, 'home')
    )
    ->addRoute(
        new Route('/contact', 'contact', 'GET', IndexController::class, 'contact')
    )
    ->addRoute(
        new Route('/products', 'products_list', 'GET', ProductController::class, 'list')
    );

if (php_sapi_name() === 'cli') {
    return;
}

[
    'REQUEST_URI'    => $uri,
    'REQUEST_METHOD' => $httpMethod
] = $_SERVER;

try {
    echo $router->execute($uri, $httpMethod);
} catch (RouteNotFoundException) {
    http_response_code(404);
    echo "Page non trouvée";
} catch (Exception) {
    http_response_code(500);
    echo "Erreur interne, veuillez contacter l'administrateur";
}
