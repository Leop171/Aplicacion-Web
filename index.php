<?php
// include "src\services\create_test.php";

try{
    $uri = $_SERVER["REQUEST_URI"];

    $data = $_SERVER["REQUEST_METHOD"];
    // Evaluar si URI no esta vacia

    $uriBase = "/ForoDeDiscucion/";

    $endpoint = ["create_test.php" => "create_test.php"];
    $data = array();

    // Una array con la URL completa, contiene una unica clave path
    $uriPartes = parse_url($uri);
    var_dump($uriPartes);

    // Extraer el nombre del endpoint
    $endpointSolicitado = str_replace($uriBase, "", $uriPartes["path"]);

    if(empty($endpointSolicitado)){
        $endpointSolicitado = "/";
    }

    var_dump($endpointSolicitado);

    if(!array_key_exists($endpointSolicitado, $endpoint)){
        echo "Error 404";
    }

    // PUEDO UTILIZAR IS FILE PARA BUSCAR EL ENDPOINT?
    // SI EL ARCHIVO EXISTE LLAMO A LA FUNCION QUE CONTIENE EL SWITCH DEL CONTROLADOR?

}
catch(Exception $Error){
    echo "Error : ". $Error -> getMessage();
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
    // Este array no debe contener el nombre de las rutas fijas si no de los controladores
    $rutasPermitidas = array("acceder.php", "buscar.php", "inicio.php", "perfil.php", "publicar.php", "registro.php", "testRutas.php");

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