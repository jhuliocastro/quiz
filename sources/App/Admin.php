<?php
namespace App;

use Models\Login_Model;
use Alertas\Alert;

class Admin extends Controller{

    public function __construct($router)
    {
        $this->router = $router;
    }

    public function home(){
        parent::render("login");
    }

    public function login(){
        $usuario = $_POST["usuario"];
        $senha = md5($_POST["senha"]);
        $loginModel = new Login_Model();
        $retorno = $loginModel->login($usuario, $senha);
        if($retorno > 0):
            session_start();
            $_SESSION["usuario"] = $usuario;
            $this->router->redirect("/dashboard");
        else:
            Alert::error("Dados incorretos!", "Verique e tente novamente.", "/admin");
        endif;
    }
}