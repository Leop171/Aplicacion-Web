<?php
// Crear la base de datos inicial
$nombreUsuario = "root";
$contraseniaDB = "";
$nombreServidor = "localhost";

try{
    $conexion = new PDO("mysql:host=$nombreServidor; dbname = RedSocial", $nombreUsuario, $contraseniaDB);
    $conexion -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Conexion exitosa";

    $sql = file_get_contents('C:\laragon\www\ForoDeDiscucion\bd\RedSocial.sql');

    $conexion->exec($sql);
    echo "Script SQL ejecutado exitosamente.";

}catch(PDOException $error){
    echo "Algo salio mal ". $error -> getMessage(); 
}

// SIMEPRE DESPUES DE HACER UNA COSULTA SE DEBE CERRAR LA CONEXION CON LA BASE DE DATOS!


// Crear la base de datos con PDO
// $dataBase = "CREATE DATABASE foroDiscucion";
// if($conexion -> query($dataBase) == TRUE){
//     echo "Base de datos creada con exito";
// }else{
//     echo "No se pudo crear la base de datos";
// }

// Crear las tablas 
// $tablas = "CREATE TABLE "



// Creacion de las tablas



// Crear las tablas 



// Usuario para el servidor: root
// Contraseña Para el servidor: I87DSHD
// Puerto 3306





// <>


?>






