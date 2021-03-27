<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

    <title>QUIZ</title>
    <style>
        body{
            background-color: #783F04;
        }
        .linha1{
            margin-top: 60px;
            background-color: #FFFFFF;
            border-radius: 5px;
            font-weight: bold;
            text-align: center;
            padding-top: 5px;
            padding-bottom: 5px;
        }
        .alternativas{
            background-color: #FFFFFF;
            border-radius: 5px;
            margin-top: 10px;
        }
    </style>
  </head>
  <body>    
    <?=$this->section('content')?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
  </body>
</html>