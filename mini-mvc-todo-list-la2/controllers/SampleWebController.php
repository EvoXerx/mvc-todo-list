<?php

namespace controllers;

use controllers\base\WebController;
use utils\Template;

class SampleWebController extends WebController
{
    function home(): string
    {
        return Template::render("views/global/home.php", array("date" => date("d-m-Y à H:i")));
    }

    function exemple($parametre = 'Valeur par défaut'): string
    {
        return "Voilà votre paramètre : $parametre";
    }

    function test2($titre, $message): string
    {
        // url http://mini-mvc-todo-list-la.test/mini-mvc-todo-list-la/test2?titre=autretitre&message=bonjour2
        return Template::render("views/global/test.php", ["titre" => $titre, "message" => $message,"date" => date("d-m-Y à H:i")]);
    }
    function test():string
    {
        // url http://mini-mvc-todo-list-la.test/mini-mvc-todo-list-la/test
        return Template::render("views/global/test.php", ["titre" => "Ceci est un titre ! ", "message" =>"Ceci est un message !","date" => date("d-m-Y à H:i")]);
    }
}