<?php
namespace Models;

use Stonks\DataLayer\DataLayer;

class Questionarios_Model extends DataLayer
{
    public function __construct()
    {
        parent::__construct('questionarios', [], 'id', true, 'interno');
    }

    public function listaID($id){
        return ($this)->find("quiz=:quiz", "quiz=$id")->fetch(true);
    }

    public function cadastrar($dados){
        $dados = (object) $dados;
        $this->titulo = $dados->titulo;
        $this->alternativa_a = $dados->alternativa_a;
        $this->alternativa_b = $dados->alternativa_b;
        $this->alternativa_c = $dados->alternativa_c;
        $this->alternativa_d = $dados->alternativa_d;
        $this->alternativa_correta = $dados->alternativa_correta;
        $this->quiz = $dados->questionario;
        $this->save();
        if($this->fail()):
            return false;
        else:
            return true;
        endif;
    }
}