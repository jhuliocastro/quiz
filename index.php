<?php
require __DIR__."/vendor/autoload.php";

use CoffeeCode\Router\Router;

$router = new Router(URL_BASE);

$router->namespace("App");

$router->get("/admin", "Admin:home");
$router->post("/login", "Admin:login");
$router->get("/dashboard", "Dashboard:home", "dashboard");

/*
 * QUIZ
 */
$router->group("quiz");
$router->get("/", "Quiz:quiz");
$router->post("/adicionar", "Quiz:adicionar");

/*
 * QUESTIONARIOS
 */
$router->group("questionarios");
$router->get("/{id}", "Questionarios:home");

/*
 * ERROS
 */
$router->group("error");
$router->get("/{code}", "Error:erro");

$router->dispatch();

if($router->error()):
    $router->redirect("/error/{$router->error()}");
endif;