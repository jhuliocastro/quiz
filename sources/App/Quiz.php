<?php
namespace App;

use Alertas\Alert;
use Models\Quiz_Model;

class Quiz extends Controller{
    public function __construct($router)
    {
        $this->router = $router;
    }

    public function quiz(){
        parent::render("quiz", [
            "tabela" => $this->tabela()
        ]);
    }

    private function tabela(){
        $tabela = null;
        $quizModel = new Quiz_Model();
        $lista = $quizModel->listaDescrecente();
        foreach($lista as $d):
            $tabela .= "
                <tr>
                    <td>$d->id</td>
                    <td>$d->titulo</td>
                    <td></td>
                    <td style='text-align: center;'>
                        <a href='/questionarios/$d->id' data-bs-toggle='tooltip' data-bs-placement='top' title='Vizualizar Questionários'><img style='width: 30px;' src='/assets/images/questionarios.png'></a>
                    </td>
                </tr>
            ";
        endforeach;

        return $tabela;
    }

    public function adicionar(){
        $quizModel = new Quiz_Model();
        $quant = $quizModel->quant($_POST["titulo"]);
        if ($quant != 0):
            Alert::error("Já existe um quiz com esse título!", "Verifique e tente novamente.", "/quiz");
            die();
        endif;
        $retorno = $quizModel->cadastrar($_POST);
        if($retorno == "cadastrado"):
            Alert::success("Quiz cadastrado com sucesso!", "", "/quiz");
        else:
            Alert::error("Erro ao cadastrar Quiz. Informe o seguinte erro para o administrador do sistema:", "$retorno", "/quiz");
        endif;
    }

}