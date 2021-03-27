<?php
namespace App;

class Cliente extends Controller{
    public function __construct($router){
        $this->router = $router;
    }

    public function selecaoQuiz(){
        parent::render("selecaoQuiz");
    }
}