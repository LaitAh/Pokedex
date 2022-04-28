<?php
/**
 * La page index.php est le point d'entrée de notre site, tout transite par là
 */


// Le fichier autoload.php permet de charger automatiquement dans toutes les dépendances gérées par composer.
require __DIR__ . '/../vendor/autoload.php';

// On instancie la classe AltoRouter qui va replacer notre router fait main
$router = new AltoRouter();

// AltoRouter a besoin de connaitre la partie "fixe" de l'URL des pages pour fonctionner. On lui passe donc cette information grace à setBasePath. La partie fixe des URL a été retrouvée grace à notre htaccess et rangée dans la supergrolbale $_SERVER.
//! Attention à n'avoir aucun accent ou espace dans vos URLs, AltoRouter ne fonctionnerait plus !

$router->setBasePath($_SERVER['BASE_URI']);

// Avec AltoRouter, on utilise la méthode map pour déclarer chacune des routes de notre application.
$router->map(
    'GET', // La méthode HTTP utilisée (GET ou POST)
    '/',   // L'URL de la route, la "cible" de l'URL, c'est à dire l'endroit où est stocké le code qui gère la page de cette URL
    [
        'method'     => 'home',
        'controller' => 'MainController'
    ], 
    'home' // Le nom de la route (une sorte d'étiquette dont on choisit le nom)
);

$router->map(
    'GET',
    '/pokedex/details/[i:numero]', // AtoRouter gère les partie dynamiques des URLs via un système de motif. Le i entre crochets indique qu'on peut mettre n'importe quel chiffre.
    [
        'method' => 'pokemon',
        'controller' => 'PokemonController'
    ],
    'details'
);

$router->map(
    'GET',
    '/pokedex/types', 
    [
        'method' => 'types',
        'controller' => 'PokemonController'
    ],
    'types'
);

$router->map(
    'GET',
    '/pokedex/types/[i:type_id]', 
    [
        'method' => 'pokemonTypes',
        'controller' => 'PokemonController'
    ],
    'types-details'
);

// On vérifie que la page demandée par l'utilisateur fait partie des routes définies dans AltoRouter grace à la méthode match.
// Si la page existe, $match contient un tableau avec les infos de la route (méthode, controller, nom de la route). Sinon, $match contient false.
$match = $router->match();

// On vérifie que la page demandée par l'utilisateur fasse partie des routes existantes.
if ($match !== false) {
    
    // On récupère la méthode à exécuter pour afficher la page
    $methodToUse = $match['target']['method'];

    // On récupère le controller à instancier
    $controllerToUse = $match['target']['controller'];

    // Depuis qu'on utilise des namespaces, nos classes n'ont plus un nom de classe mais un nom complet (FQCN). Il faut utiliser ce FQCN pour les instancier.
    // Comme tous les controllers sont rangés dans le même namespace, on peut prendre le nom de la classe liée à la route et lui concaténer le namespace.
    $controllerToUse = "Pokedex\Controllers\\" . $controllerToUse;

    // On instancie notre controller qui s'occupe d'afficher les pages
    $controller = new $controllerToUse;

    // On éxécute la méthode associée à notre URL (Dispatcher)
    $controller->$methodToUse($match['params']);

} else {
    // Je suis tombée sur une page 404, on va donc utiliser le controller dédié pour afficher cette page
    $controller = new Pokedex\Controllers\ErrorController;

    // On appelle la méthode dédiée à l'erreur 404
    $controller->error404();
}