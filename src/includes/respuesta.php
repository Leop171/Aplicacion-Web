<?php

$respuesta = "";

$estado = array(
    "c200" => array (
        "estado" => "Succes",
        "codigo" => 200,
        "mensaje" => "Completado"
    ),

    "c201" => array (
        "estado" => "Succes",
        "codigo" => 201,
        "mensaje" => "Completado"
    ),

    "c204" => array(
        "estado" => "Succes",
        "codigo" => 204,
        "mensaje" => "No hay contenido por mostrar"
    ),
    
    "c400" => array (
        "estado" => "Error",
        "codigo" => 400,
        "mensaje" => "Parametros de solitud incorrectos"
    ),

    "c403" => array (
        "estado" => "Error",
        "codigo" => 403,
        "mensaje" => "Acceso denegado"
    ),

    "c404" => array (
        "estado" => "Error",
        "codigo" => 404,
        "mensaje" => "El recurso solicitado no fue encontrado"
    ),

    "c500" => array(
        "estado" => "Error",
        "codigo" => 500,
        "mensaje" => "No se puede acceder en estos momentos"
    ),
    
);

// var_dump($estado["c201"])

?>