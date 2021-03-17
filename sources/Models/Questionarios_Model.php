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
}