<?php
namespace controllers;

use controllers\base\WebController;
use models\AuthModel;
use utils\SessionHelpers;
use utils\Template;


class AuthControler extends WebController
{
    private $authModel;

    function __construct(){
        $this->authModel = new AuthModel();
    }

    function connexion() {
        return Template::render("views/global/fauthentif.php");
    }
    
    function verifuser(){
        $postData = $_POST;
        if (isset($postData['email']) && isset($postData['password']) && !empty($postData['password']) ) {
            
            $mail = $postData['email'];
            $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
            //$leMail = $this->authModel->existeUser($mail, $postData['password']);
            $leMail = $this->authModel->existeUserH($mail, $postData['password']);
            if ($leMail !== 'inconnu') {
                SessionHelpers::login($mail);
                $this->redirect("/");
            }else {
                echo "Erreur";
                
            
            }
        }else{
            echo "Erreur de saisie";
        }
        
    }


    function updatepasshash() {
        $this->authModel->updatePassId();
        $this->redirect("/");

    }


    function deconnexion(){
        SessionHelpers::logout();
        $this->redirect("/");
    }
}