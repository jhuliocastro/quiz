<?php
namespace App;

use Alertas\Alert;
use Models\Questionarios_Model;
use Models\Quiz_Model;

class Quiz extends Controller{
    public function __construct($router)
    {
        $this->router = $router;
    }

    public function iniciar(){
        $quizModel = new Quiz_Model();
        $retorno = $quizModel->dadosID($_POST["quiz"]);
        session_start();
        $_SESSION["cliente"] = $_POST["nome"];
        $_SESSION["quiz"] = $retorno->id;
        $this->router->redirect("/quiz/questionarios");
    }

    public function inicio(){
        session_start();
        if(isset($_SESSION["questionarios"])):
            unset($_SESSION["questionarios"]);
        endif;
        $questionarioModel = new Questionarios_Model();
        $questionarios = $questionarioModel->listaID($_SESSION["quiz"]);
        if($questionarios == null):
            Alert::warning("Questionario Vazio!", "Contate o Administrador do Sistema", "/");
        else:
            $i = 0;
            foreach ($questionarios as $d):
                $_SESSION["questionarios"][$i]["titulo"] = $d->titulo;
                $_SESSION["questionarios"][$i]["alternativa_a"] = $d->alternativa_a;
                $_SESSION["questionarios"][$i]["alternativa_b"] = $d->alternativa_b;
                $_SESSION["questionarios"][$i]["alternativa_c"] = $d->alternativa_c;
                $_SESSION["questionarios"][$i]["alternativa_d"] = $d->alternativa_d;
                $_SESSION["questionarios"][$i]["alternativa_correta"] = $d->alternativa_correta;
                $_SESSION["questionarios"][$i]["respondeu"] = 0;
                $_SESSION["questionarios"][$i]["alternativa_respondeu"] = "";
                $i++;
            endforeach;
            $_SESSION["nQuestionarios"] = count($_SESSION["questionarios"]);
            $_SESSION["quantRespondida"] = 0;
            $this->router->redirect("/quiz/questionarios/iniciar");
        endif;
    }

    public function inicio2(){
        session_start();
        $nQuestionarios = $_SESSION["nQuestionarios"] - 1;
        if($_SESSION["quantRespondida"] == $nQuestionarios):
            $this->router->redirect("/quiz/resultado");
        endif;
        $i = 0;
        do{
            $quest = rand(0, $nQuestionarios);
            if($_SESSION["questionarios"][$quest]["respondeu"] == 0):
                $i++;
            endif;
        }while($i == 0);

        parent::render("inicioQuestionario", [
            "titulo" => $_SESSION["questionarios"][$quest]["titulo"],
            "alternativa_a" => $_SESSION["questionarios"][$quest]["alternativa_a"],
            "alternativa_b" => $_SESSION["questionarios"][$quest]["alternativa_b"],
            "alternativa_c" => $_SESSION["questionarios"][$quest]["alternativa_c"],
            "alternativa_d" => $_SESSION["questionarios"][$quest]["alternativa_d"],
            "quest" => $quest
        ]);
    }

    public function selecao($data){
        session_start();
        $_SESSION["questionarios"][$data["questionario"]]["respondeu"] = 1;
        $_SESSION["questionarios"][$data["questionario"]]["alternativa_respondeu"] = $data["alternativa"];
        $_SESSION["quantRespondida"]++;
        $this->router->redirect("/quiz/questionarios/iniciar");
    }

    public function resultado(){
        session_start();
        dump($_SESSION);
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