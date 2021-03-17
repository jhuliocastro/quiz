<?php
namespace App;

use League\Plates\Engine;

class Controller{

    private $caminhoViews = __DIR__."/../../themes";

    public function __construct($router)
    {
        $this->router = $router;
        $this->userActive();
    }

    public function render($view, array $dados = []){
        $template = new Engine($this->caminhoViews);
        echo $template->render($view, $dados);
    }

    private function userActive(){
        session_start();
        if(!isset($_SESSION["usuario"])):
            $this->router->redirect("/login");
        endif;
    }
}