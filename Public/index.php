<?php

// ROOT_PATH : chemin racine
define('ROOT_PATH', __DIR__);

// ROOT_URL : url racine
define('ROOT_URL', 'http://localhost:8000/');

// PATH : chemin entre le nom de domaine et notre application
// Si votre site est a la racine de votre hébergeur "/"
define('PATH', '/');


// On appel notre Autoload
require_once '../Core/Autoloader.php';
Autoloader::register();

// On instancie Request
$request = new Core\Request;

// On instancie notre Router avec l'appel de la methode qui va gérer l'url pour appeler le controller correspondant.
$router = new Core\Router($request);
$router->route();
