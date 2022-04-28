<?php

namespace Pokedex\Controllers;

/**
 * CoreController est le controlleur général qui s'applique à tous les autres controlleurs
 */
class CoreController {
    // Tous les controllers ont besoin d'afficher une page. La méthode show permet cet affichage et comme elle est nécessaire pour tous les controllers, elle est placée dans le CoreController

    public function show($viewName, $viewData = []) 
    {
        // Pour générer des URLs dans les templates, on a besoin de la variable $router contenant notre routeur. Cette dernière étant définie hors de la méthode show (index.php), elle est inaccessible.
        // Pour l'instant, pour y accéder on va rendre la variable $router globale.
        global $router;

        // On a besoin d'une URL absolue pour afficher les assets (css, js, img). On utilise donc l'entrée BASE_URI de $_SERVER qui contient la partie fixe de nos URLs.
        // Comme la variable absoluteUrl est défini juste avant l'inclusion des templates, elle est disponible dans ceux-ci.
        $absoluteUrl = $_SERVER['BASE_URI'];

        // $viewData est un tableau contenant différentes informations utilies à nos templates. Plutôt que d'aller piocher dedans à chaque fois, on va "déballer" ce tableau. C'est à dire créer autant de variables qu'il y a d'entrées dans ce tableau.
        // Si on a un tableau $tab = ['coucou' => true] : l'extraction du tableau nous donnera une variable $coucou qui contiendra la valeur true.
        // $viewData est disponible dans chaque fichier de vue.
        extract($viewData);

        // On indique à la fonction show les pages à afficher.
        // Le header et le footer sont à afficher dans toutes les pages, et le contenu de la page dépendra de la valeur de $viewName
        require_once __DIR__ . '/../views/header.tpl.php';
        require_once __DIR__ . '/../views/' . $viewName . '.tpl.php';
        require_once __DIR__ . '/../views/footer.tpl.php';

    }
}