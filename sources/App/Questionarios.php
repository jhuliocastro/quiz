<?php
namespace App;

use Models\Questionarios_Model;
use Alertas\Alert;

class Questionarios extends Controller{
    public function __construct($router)
    {
        $this->router = $router;
    }

    public function cadastrar($data){
        parent::render("cadastrarQuestionario", ["questionario" => $data["questionario"]]);
    }

    public function cadastrarSender(){
       $questionariosModel = new Questionarios_Model();
       $retorno = $questionariosModel->cadastrar($_POST);
       $caminho = "/questionarios/".$_POST["questionario"];
       if($retorno == false):
            Alert::error("Erro ao realizar cadastro!", "Consulte o log para mais informações", $caminho);
            die();
       endif;
       Alert::success("Cadastrado com sucesso!", "", $caminho);
    }

    public function home($data){
        $questModel = new Questionarios_Model();
        $lista = $questModel->listaID($data["id"]);
        $questionarios = null;
        foreach($lista as $d):
            $questionarios .= "
                <div class='card'>
                    <h5 class='card-header'>$d->titulo</h5>
                    <br/>
                    <div class='container-fluid'>
                        <div class='card' style='width: '>
                        <ul class='list-group list-group-flush'>
            ";
            switch($d->alternativa_correta):
                case "alternativa_a":
                    $questionarios .= "
                        <li class='list-group-item'><img src='/assets/images/ok.png' style='width: 20px;'>$d->alternativa_a</li>
                        <li class='list-group-item'>$d->alternativa_b</li>
                        <li class='list-group-item'>$d->alternativa_c</li>
                        <li class='list-group-item'>$d->alternativa_d</li>
                    ";
                    break;
                    case "alternativa_b":
                        $questionarios .= "
                            <li class='list-group-item'>$d->alternativa_a</li>
                            <li class='list-group-item'><img src='/assets/images/ok.png' style='width: 20px;'>$d->alternativa_b</li>
                            <li class='list-group-item'>$d->alternativa_c</li>
                            <li class='list-group-item'>$d->alternativa_d</li>
                        ";
                        break;
                        case "alternativa_c":
                            $questionarios .= "
                                <li class='list-group-item'>$d->alternativa_a</li>
                                <li class='list-group-item'>$d->alternativa_b</li>
                                <li class='list-group-item'><img src='/assets/images/ok.png' style='width: 20px;'>$d->alternativa_c</li>
                                <li class='list-group-item'>$d->alternativa_d</li>
                            ";
                            break;
                            case "alternativa_d":
                                $questionarios .= "
                                    <li class='list-group-item'>$d->alternativa_a</li>
                                    <li class='list-group-item'>$d->alternativa_b</li>
                                    <li class='list-group-item'>$d->alternativa_c</li>
                                    <li class='list-group-item'><img src='/assets/images/ok.png' style='width: 20px;'>$d->alternativa_d</li>
                                ";
                                break;
            endswitch;
            $questionarios .= "
                            </ul>
                        </div>
                        <br/>
                    </div>
                </div>
                <br/>
            ";
        endforeach;

        parent::render("questionario", ["questionarios" => $questionarios, "idQuestionario" => $data["id"]]);
    }
}