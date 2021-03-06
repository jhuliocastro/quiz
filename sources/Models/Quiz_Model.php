<?php
namespace Models;

use Stonks\DataLayer\DataLayer;

class Quiz_Model extends DataLayer
{
    public function __construct()
    {
        parent::__construct('quiz', [], 'id', true, 'interno');
    }

    public function cadastrar($dados) : string{
        $this->titulo = $dados["titulo"];
        $this->save();
        if ($this->fail()):
            return $this->fail()->getMessage();
        else:
            return "cadastrado";
        endif;
    }

    public function dadosID($quiz){
        return ($this)->find("titulo=:titulo", "titulo=$quiz")->fetch();
    }

    public function quant($titulo){
        return ($this)->find("titulo=:titulo", "titulo=$titulo")->count();
    }

    public function listaDescrecente(){
        return $this->find()->order("id DESC")->fetch(true);
    }

    public function lista(){
        return $this->find()->order("titulo ASC")->fetch(true);
    }
}