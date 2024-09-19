<?php
include_once($_SERVER["DOCUMENT_ROOT"]. "/ForoDeDiscucion/rutas.php");
include_once(UTILS. "config.php");
include_once(UTILS. "respuesta_modelo.php");


function InsertarRespuesta($codigo, $publicacion, $texto, $imagen){
    try{
        $conexion = Conexion();

        $respuestaInsertar = $conexion ->prepare("CALL spInsertRespuesta(:codigo, :publicacion, :texto, :imagen)");
        $respuestaInsertar ->bindParam(":codigo", $codigo);
        $respuestaInsertar ->bindParam(":publicacion", $publicacion);
        $respuestaInsertar ->bindParam(":texto", $texto);
        $respuestaInsertar ->bindParam(":imagen", $imagen);
        $respuestaInsertar ->execute();
        $respuestaInsertar ->closeCursor();

    }catch(Exception $Error){
        echo $Error ->getMessage();

    }
}


function SeleccionarRespuesta($publicacion){
    try{
        $conexion = Conexion();

        $respuestaSeleccionar = $conexion ->prepare("CALL spSelectRespuesta(:publicacion)");
        $respuestaSeleccionar ->bindParam(":publicacion", $publicacion);
        $respuestaSeleccionar ->execute();
        $resultado = $respuestaSeleccionar ->fetch(PDO::FETCH_ASSOC);
        $respuestaSeleccionar ->closeCursor();

        var_dump($resultado);
        
    }catch(Exception $Error){
        echo $Error ->getMessage();

    }
}

// <>

?>