<?php
// Crear la base de datos con PDO
$nombreServidor = "localhost";
$nombreUsuario = "root";
$contrasenia = "";

$correo = strval('leo345@gmail.com');
$contraseniaU = strval('12345');
$clave = 17;
$nombre = 'Leonaro1234';
$foto = "foto";
$descripcion = "Descripcion";
$fecha = "2024-01-01";


// Crear la base de datos inicial
// try{
//     $conexion = new PDO("mysql:host=$nombreServidor; dbname = ForoDeDiscucion", $nombreUsuario, $contrasenia);
//     $conexion -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//     echo "Conexion exitosa";

//     $sql = file_get_contents('C:\laragon\www\ForoDeDiscucion\bd\foroBD.sql');

//     $conexion->exec($sql);
//     echo "Script SQL ejecutado exitosamente.";

//     // Aqui va la ejecucion del script


// }catch(PDOException $error){
//     echo "Coneccion fallida: ". $error -> getMessage();
// }

// Insertar datos en usuario
try{
    $conexion = new PDO("mysql:host=$nombreServidor; dbname =foro", $nombreUsuario, $contrasenia);
    $conexion -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Conexion exitosa";

    $insertarUsuario = $conexion -> prepare("INSERT INTO foro.usuario (codigo, nombre, correo, contrasenia, foto, descripcion, fecha)
    VALUES(:clave, :nombre, :correo, :contrasenia, :foto, :descripcion, :fecha);");

/*
INSERT INTO foro.usuario (codigo, nombre, correo, contrasenia, foto, descripcion, fecha)
VALUES('13', 'Leonado1', 'leo123@gmail.com', '1234', 'foto/foto', 'Soy el primer usuario insertado', '2024-01-01')
*/

    $insertarUsuario -> bindParam(':correo', $correo);
    $insertarUsuario -> bindParam(':contrasenia', $contraseniaU);
    $insertarUsuario -> bindParam(':clave', $clave);
    $insertarUsuario -> bindParam(':nombre', $nombre);
    $insertarUsuario -> bindParam(':foto', $foto);
    $insertarUsuario -> bindParam(':descripcion', $descripcion);
    $insertarUsuario -> bindParam(':fecha', $fecha);

    $insertarUsuario -> execute();
    echo "Se inserto correctamente";

    //$insertar = file_get_contents('C:\laragon\www\ForoDeDiscucion\bd\isnercion.sql');
    
    // if($conexion -> exec($insertarUsuario)){
    //     echo "Se inserto con exito el usuario";
    // };

}catch(PDOException $error){
    echo "Algo salio mal ". $error -> getMessage(); 
}

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






