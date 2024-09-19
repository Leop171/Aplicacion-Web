<?php
// FORMULARIO LOGIN Y INSERCION FORMULARIO
// Limpiar contraseña

use function PHPSTORM_META\type;

function ValidarContrasenia($contrasenia){
    $expresionRegular = "/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[\W_]).{8,}$/";

     if(!preg_match($expresionRegular, $contrasenia)){
        throw new Exception("4004");    
    }

    return $contrasenia;
}

// Limpiar el correo 
function ValidarCorreo($correo){

    if(!filter_var($correo, FILTER_VALIDATE_EMAIL)){
        throw new Exception("4003");
    }

    return $correo;
}

// PUBLICACION 
// Funcion que valida el texto
function ValidarTexto(&$texto){
    
    if(trim($texto) == ""){
        return $texto = null;
        
    }

    if(strlen($texto) >= 200){
        return throw new Exception("4007");
    }

    return $texto;

}

// Funcion que valida la imagen
function ValidarImagen(&$imagen){
    if(trim($imagen["name"]) == ""){
        return $imagen = null;
    }

    $imagenNombre = $imagen["name"];
    $imagenPeso = $imagen["size"];

    $imagenExtension = strtolower(pathinfo($imagenNombre, PATHINFO_EXTENSION));

    $extensionPermitida = "/jpg|jpeg|jfif|png/";

    if(!preg_match($extensionPermitida, $imagenExtension)){
        return throw new Exception("4008");
    }

    if($imagenPeso > 400000){
        return throw new Exception("4009");
    } 

    return $imagen;

}

function ValidarNombre($nombre){

    $simboloValidos = array("-", "_");

    if(!ctype_alnum(str_replace($simboloValidos, "", $nombre))){
        return throw new Exception("4010");
    }

    return $nombre;

}


ValidarCodigo("3");

function ValidarCodigo($codigo){

    if(is_numeric($codigo)){
        return $codigo = (int)$codigo;    
    }else{
        return throw new Exception("4014");
    } 
    
}


?>