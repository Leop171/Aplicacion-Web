<?php
include "modelos.php";

$input = file_get_contents("php://input");
$data = json_decode($input, true);

try{
    if($_SERVER["REQUEST_METHOD"] == "POST" and $data["nombre"] and $data["codigo"]){
        var_dump($data);
        CrearRegistro($data["codigo"], $data["nombre"]);
    //        echo "Insercion Exitosa";
    }
}catch(Exception $error){
    echo "Algo salio mal". $error -> getMessage();
}

// and $_POST["nombre"] and $_POST["codigo"]

// <>

?>