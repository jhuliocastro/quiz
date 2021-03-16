<?php
namespace App;

use Models\Questionarios_Model;

class Questionarios extends Controller{
    public function __construct($router)
    {
        $this->router = $router;
    }

    public function home($data){
        $questModel = new Questionarios_Model();
        $lista = $questModel->listaID($data["id"]);
        var_dump($lista);

        parent::render("questionario");
    }
}