<?php
include __DIR__. "/config.php";
include __DIR__. "/mysql.php";


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $text = $_POST["publicacionTexto"];
    // $imagen = $_POST["publicacionArchivo"];
    $imagen = $_FILES["publicacionArchivo"];

    $valores = array();

    $valores[0] = $text;
    $valores[1] = $imagen;

    $carpeta = "./imagenes/". $usuarioNombre. "/";
    $ubicacionFinal = $carpeta .$imagen["name"];

    // $rutaCarpeta = dirname(__FILE__). "\imagenes/". $usuarioNombre;

    // $rutafinal = str_replace('\\', '/', $rutaCarpeta). "/". $imagen["name"];

    if(!file_exists($carpeta)){
        mkdir($carpeta, 077, true);
    }

    echo $carpeta;
    if(move_uploaded_file($imagen["tmp_name"], $ubicacionFinal)){ // $ubicacionFinal
        // var_dump($valores);
        echo $ubicacionFinal. " Impresion PHP";
    }else{
        echo "Error";
    }
    
    // echo $text;
    // echo $imagen;
}

// <>






?>




