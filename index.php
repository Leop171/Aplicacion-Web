<?php


try{
    // Recibir la URI
    $uri = $_SERVER["REQUEST_URI"];

    // Evaluar si URI no esta vacia

    // Dividir la URI en partes
    $uriPartes = explode("/", $uri);

    // Quitar el primer / de la URI
    array_shift($uriPartes);

    $dominio = $uriPartes[0];
    $ruta = $uriPartes[1];

    echo $ruta;

    if($ruta[0] == "@" & strlen($ruta) <= 20){
        ValidarUsuario($ruta);
        return;
    }else{
        ValidarRuta($ruta);  
        return;
    }

    echo "El codigo llego al final del if-esle";
}
catch(Exception $Error){
    echo "Error : ". $Error ->getMessage();
}

function ValidarUsuario($ruta){
    $nombreUsuario = substr($ruta, 1);

    $caracteresValidos = array("_", ".");

    if(!ctype_alnum(str_replace($caracteresValidos, "", $nombreUsuario))){
        throw new Exception("Error 404 usuario no econtrado");
    }else{
        echo "Buscando en la BD.....";
        return;
    }

    // BUSCAR AL USUARIO EN LA BD

}

function ValidarRuta($ruta){
    $rutasPermitidas = array("acceder.php", "buscar.php", "inicio.php", "perfil.php", "publicar.php", "registro.php", 
    "testRutas.php");

    $caracteresValidos = array("_", ".");

    if(!ctype_alpha(str_replace($caracteresValidos, "", $ruta))){
        throw new Exception("URL no valida por que contiene caracteres especiales");
    }

    if(!in_array($ruta, $rutasPermitidas, true)){
        throw new Exception("Error 404 no es una ruta fija");
    }

    header("Location:$ruta", true, 301);
    exit();
}


// <>


?>