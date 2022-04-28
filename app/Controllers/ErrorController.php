<?php

namespace Pokedex\Controllers;

/**
 * ErrorController gère les pages d'erreurs
 */
class ErrorController extends CoreController {

    /**
     * Méthode qui gère l'affichage de la page 404
     *
     * @return void
     */
    public function error404()
    {
        // On indique au navigateur que la page n'est pas trouvée via un code 404
        http_response_code(404);
        $this->show('404');
    }
}