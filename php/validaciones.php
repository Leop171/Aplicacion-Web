<?php
// FORMULARIO LOGIN Y INSERCION FORMULARIO
// Limpiar contraseña
function LimpiarContrasenia($contrasenia){
    $expresionRegular = "/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[\W_]).{8,}$/";

    if(!preg_match($expresionRegular, $contrasenia)){
        throw new Exception("La contraseña debe contener mas de 8 caracteres, 1 mayuscula, 1 numero y 1 signo PHP");    
    }
    return $contrasenia;
}

// Limpiar el correo 
function LimpiarCorreo($correo){

    if(!filter_var($correo, FILTER_VALIDATE_EMAIL)){
        throw new Exception("Correo no valido PHP");
    }

    return $correo;
}

// PUBLICACION 
// Funcion que valida el texto
function validarTexto(&$texto){

    if(($texto) == ""){
        return $texto = null;
        
    }

    $texto = strip_tags($texto).PHP_EOL;

    if(strlen($texto) >= 200){
        return throw new Exception("Solo se permiten 200 caracteres");
    }

    return $texto;

}

// Funcion que valida la imagen
function validarImagen(&$imagen){

    if($imagen["name"] == ""){
        return $imagen = null;        
    }

    $imagenNombre = $imagen["name"];
    $imagenPeso = $imagen["size"];

    $imagenExtension = strtolower(pathinfo($imagenNombre, PATHINFO_EXTENSION));

    $extensionPermitida = "/jpg|jpeg|jfif|png/";

    if(!preg_match($extensionPermitida, $imagenExtension)){
        return throw new Exception("Solo se permite .jpg, .jpeg, .jfif, .png");
    }

    if($imagenPeso > 400000){
        return throw new Exception("El archivo debe pesar menos de 4mb");
    } 

    return $imagen;

}




?>