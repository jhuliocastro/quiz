<?php
namespace App;

use Models\Quiz_Model;

class Cliente extends Controller{
    public function __construct($router){
        $this->router = $router;
    }

    public function selecaoQuiz(){
        $quizModel = new Quiz_Model();
        $lista = $quizModel->lista();
        $quiz = null;
        foreach($lista as $d):
            $quiz .= "
                <div class='linha2' onClick='selecionaQuiz(\"$d->titulo\")'>
                    $d->titulo
                </div>
            ";
        endforeach;
        parent::render("selecaoQuiz", ["quiz" => $quiz]);
    }
}