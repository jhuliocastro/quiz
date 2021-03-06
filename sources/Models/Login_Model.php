<?php
namespace Models;

use Stonks\DataLayer\DataLayer;

class Login_Model extends DataLayer{

    public function __construct()
    {
        parent::__construct("usuarios", [], "id", false, "interno");
    }

    public function login(string $usuario, string $senha){
        return $this->find("usuario=:usuario AND senha=:senha", "usuario=$usuario&senha=$senha")->count();
    }
}