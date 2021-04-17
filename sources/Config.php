<?php
define("URL_BASE", "http://localhost");
define("NOME_EMPRESA", "NOVA NET TELECOM");
define("VERSAO", "1.0.1");
define("COPYRIGHT", "2021");

define('DATA_LAYER_CONFIG', [
    'interno' => [
        'driver' => 'mysql',
        'host' => '187.60.246.252',
        'port' => '3306',
        'dbname' => 'quiz',
        'username' => 'sispro',
        'passwd' => 'sispro',
        'options' => [
            PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
            PDO::ATTR_CASE => PDO::CASE_NATURAL,
        ],
    ]
]);