<?php
namespace controllers;

use controllers\base\WebController;
use utils\Template;
use models\TodoModel; 


class TodoWeb extends WebController
{
    private $todoModel;

    function __construct(){
        $this->todoModel = new TodoModel();
    }
    function liste() {
        $todos = $this->todoModel->getAll();
        return Template::render("views/todos/liste.php", array("todos" => $todos));
    }
    function ajouter($texte = ""){
        if ($texte != ''){
            $this->todoModel->ajouterTodo($texte);
            $this->redirect("./liste");
        }
        $this->redirect("./liste");
    }
    function terminer($id = ''){
        if($id != ""){
            $this->todoModel->marquerCommeTermine($id);
        }
        $this->redirect("./liste");
    }
    function supprimer($id) {
        $todo = $this->todoModel->getOne($id);
        if ($todo->termine == 1) {
            $this->todoModel->deleteOne($id);
        }
        $this->redirect('./liste');
    }
    
    
}