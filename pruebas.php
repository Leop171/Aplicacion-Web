<?php
try{

    $ruta = "iniciono.php";

    if($ruta[0] == "@" & strlen($ruta) <= 12){
        ValidarUsuario($ruta);
    }else{
        ValidarRuta($ruta);
    }

}catch(Exception $Error){
    echo "Error : ". $Error ->getMessage();
}

function ValidarUsuario($ruta){
    $nombreUsuario = substr($ruta, 1);

    $caracteresValidos = array("_", ".");

    if(ctype_alnum(str_replace($caracteresValidos, "", $nombreUsuario))){
        echo "Buscando en la BD";
        return;
    }

    // BUSCAR AL USUARIO EN LA BD
    echo "Error 404";
    return;
}

function ValidarRuta($ruta){
    $rutasPermitidas = array("acceder.php", "buscar.php", "inicio.php", "perfil.php", "publicar.php", "registro.php");

    $caracteresValidos = array("_", ".");

    if(ctype_alpha(str_replace($caracteresValidos, "", $ruta))){
        if(in_array($ruta, $rutasPermitidas, true)){
            echo "Si es una ruta fija valida";
            return;
        }
    }    

    echo "Error 404";

}

?>