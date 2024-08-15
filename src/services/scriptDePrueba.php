<?php

function LimpiarContrasenia($contrasenia){
    $expresionRegular = "/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[\W_]).{8,}$/";

    if(!preg_match($expresionRegular, $contrasenia)){
        echo ("La contraseña debe contener mas de 8 caracteres, 1 mayuscula, 1 numero y 1 signo PHP");    
    }
    return $contrasenia;
    
}

// Limpiar el correo 
function LimpiarCorreo($correo){

    if(!filter_var($correo, FILTER_VALIDATE_EMAIL)){
        echo ("Correo no valido PHP");
    }

    return $correo;
}

LimpiarCorreo("leop1234gmail.com");

?>
