<?php

$nombreUsuario = "root";
$contraseniaDB = "";
$nombreServidor = "localhost";

try{
    $conexion = new PDO("mysql:host=$nombreServidor; dbname = RedSocial", $nombreUsuario, $contraseniaDB);
    $conexion -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//    echo "Conexion exitosa";

}catch(PDOException $error){
//    echo "Algo salio mal ". $error -> getMessage(); 
}





?>