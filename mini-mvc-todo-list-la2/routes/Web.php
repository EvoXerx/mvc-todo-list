<?php

namespace routes;

use controllers\SampleWebController;
use routes\base\Route;
use controllers\TodoWeb;
use utils\Template;
use controllers\AuthControler;

class Web
{
    function __construct()
    {
        $main = new SampleWebController();
        $todo = new TodoWeb();
        $auth = new AuthControler();

        // Appel la méthode « home » dans le contrôleur $main.
        Route::Add('/', [$main, 'home']);
        Route::Add('/exemple', [$main, 'exemple']);
        Route::Add('/exemple2/{parametre}', [$main, 'exemple']);
        Route::Add('/test', [$main, 'test']);

        Route::Add('/todos/liste', [$todo, 'liste']);
        Route::Add('/todos/ajouter', [$todo, 'ajouter']);
        Route::Add('/todos/terminer', [$todo, 'terminer']);
        Route::Add('/todos/supprimer', [$todo, 'supprimer']);

        Route::Add('/auth/seconnecter', [$auth, 'connexion']);
        Route::Add('/auth/recupConnexion', [$auth, 'verifuser']);
        Route::Add('/auth/sedeconnecter', [$auth, 'deconnexion']);
        Route::Add('/auth/updatepasshash', [$auth, 'updatepasshash']);

        // Appel la fonction inline dans le routeur.
        // Utile pour du code très simple, où un tes, l'utilisation d'un contrôleur est préférable.
        Route::Add('/about', function () {
            return Template::render('views/global/about.php');
        });

        //        Exemple de limitation d'accès à une page en fonction de la SESSION.
        //        if (SessionHelpers::isLogin()) {
        //            Route::Add('/logout', [$main, 'home']);
        //        }
    }
}

