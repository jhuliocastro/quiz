<?php
ini_set('display_errors',1);
ini_set('display_startup_erros',1);
error_reporting(E_ALL);
require __DIR__."/vendor/autoload.php";

use CoffeeCode\Router\Router;

$router = new Router(URL_BASE);

$router->namespace("App");

$router->get("/", "Cliente:selecaoQuiz");
$router->get("/admin", "Admin:home");
$router->post("/login", "Admin:login");
$router->get("/dashboard", "Dashboard:home", "dashboard");

/*
 * QUIZ
 */
$router->group("quiz");
$router->get("/", "Quiz:quiz");
$router->post("/adicionar", "Quiz:adicionar");
$router->post("/iniciar", "Quiz:iniciar");
$router->get("/questionarios", "Quiz:inicio");
$router->get("/questionarios/iniciar", "Quiz:inicio2");
$router->get("/selecao/{alternativa}/{questionario}", "Quiz:selecao");
$router->get("/resultado", "Quiz:resultado");

/*
 * QUESTIONARIOS
 */
$router->group("questionarios");
$router->get("/{id}", "Questionarios:home");
$router->get("/cadastrar/{questionario}", "Questionarios:cadastrar");
$router->post("/cadastrar", "Questionarios:cadastrarSender");

/*
 * ERROS
 */
$router->group("error");
$router->get("/{code}", "Error:erro");

$router->dispatch();

if($router->error()):
    $router->redirect("/error/{$router->error()}");
endif;
