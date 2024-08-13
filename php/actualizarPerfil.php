<?php
include __DIR__. "/config.php";
include __DIR__. "/mysql.php";
include __DIR__. "/validaciones.php";

// Leer los datos JSON del cuerpo de la solicitud


try{
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $imagen = $_FILES["enviarFoto"];
    }

    if(!isset($imagen)){
        throw new Exception("No se envio ninguna imagen");
    }

    validarImagen($imagen);

    $carpeta = "../imagenesPerfil/". $usuarioNombre. "/";
    $carpeta = str_replace("\\", "/", $carpeta);

    if(!file_exists($carpeta)){
        mkdir($carpeta, 077, true);
        }

    // SIMEPRE DESPUES DE HACER UNA COSULTA SE DEBE CERRAR LA CONEXION CON LA BASE DE DATOS!


    // La ruta completa hacia la imagen, no se utiliza $carpeta por que es una ruta relativa y cambia cuando
    // queramos ver la imagen desde otro archivo    
    $imagenNombre = str_replace(" ", "", $imagen["name"]);
    $ubicacionFinal = $carpeta. time(). $imagenNombre;
    move_uploaded_file($imagen["tmp_name"], $ubicacionFinal);  

    // Actualizar la direccion de la imagen de perfil
    $actualizarImagen =  $conexion -> prepare("UPDATE RedSocial.imagen_usuario SET direccion = :ubicacionFinal WHERE codigo = :usuarioCodigo");

    $actualizarImagen -> bindParam(":ubicacionFinal", $ubicacionFinal, PDO::PARAM_STR);
    $actualizarImagen -> bindParam(":usuarioCodigo", $usuarioCodigo, PDO::PARAM_STR);
    $actualizarImagen -> execute();
    
    echo json_encode([
        "status" => "Succes",
        "message" => "Succes"
    ]);

}catch(Exception $Error){
    echo json_encode([
        "status" => "Error",
        "message" => $Error -> getMessage()
    ]);
}







?>