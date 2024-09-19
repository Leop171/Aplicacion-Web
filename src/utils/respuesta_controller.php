<?php
// var_dump(Respuesta("c200"));

function DevolverEstado($codigo){

    $estado = array(
        "4001" => array (
            "estado" => false,
            "codigo" => 200,
            "mensaje" => "Completado"
        ),
    
        "4002" => array (
            "estado" => true,
            "codigo" => 201,
            "mensaje" => "Completado"
        ),
    
        "c204" => array(
            "estado" => true,
            "codigo" => 204,
            "mensaje" => "No hay contenido por mostrar"
        ),
        
        "c400" => array (
            "estado" => false,
            "codigo" => 400,
            "mensaje" => "Parametros de solitud incorrectos"
        ),
    
        "c403" => array (
            "estado" => false,
            "codigo" => 403,
            "mensaje" => "Acceso denegado"
        ),
    
        "c404" => array (
            "estado" => false,
            "codigo" => 404,
            "mensaje" => "El recurso solicitado no fue encontrado"
        ),
    
        "c500" => array(
            "estado" => false,
            "codigo" => 500,
            "mensaje" => "No se puede acceder en estos momentos"
        ),        
    );

    if(!array_key_exists($codigo, $estado)){
        $codigo = "c500";
    }

    return($estado[$codigo]);
}

?>