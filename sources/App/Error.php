<?php
namespace App;

use League\Plates\Engine;

class Error extends Controller {
    public function __construct($router){
        $this->router = $router;
    }

    public function erro($data){
        switch($data["code"]):
            case "404":
                self::e404();
                break;
            default:
                var_dump($data["code"]);
        endswitch;
    }

    private function e404(){
        parent::render("e404");
    }
}