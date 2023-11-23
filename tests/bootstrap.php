<?php

use Symfony\Component\Dotenv\Dotenv;

require_once dirname(__DIR__) . '/vendor/autoload.php';

// Chargement des configurations supplémentaires si le fichier bootstrap.php existe
$bootstrapFile = dirname(__DIR__) . '/config/bootstrap.php';
if (file_exists($bootstrapFile)) {
    require_once $bootstrapFile;
} else {
    // Initialisation de l'environnement avec Dotenv si bootstrap.php n'existe pas
    if (method_exists(Dotenv::class, 'bootEnv')) {
        (new Dotenv())->bootEnv(dirname(__DIR__) . '/.env');
    }
}