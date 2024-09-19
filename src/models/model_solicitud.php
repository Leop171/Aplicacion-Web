<?php
include_once($_SERVER["DOCUMENT_ROOT"]. "/ForoDeDiscucion/rutas.php");
include_once(UTILS. "config.php");
include_once(UTILS. "respuesta_modelo.php");


function InsertarSolicitud($codigoEmisor, $codigoReceptor){
    try{
        $conexion = Conexion();

        $solicitudInsertar = $conexion ->prepare("CALL spInsertSolicitud(:codigoEmisor, :codigoReceptor)");
        $solicitudInsertar ->bindParam(":codigoEmisor", $codigoEmisor);
        $solicitudInsertar ->bindParam(":codigoReceptor", $codigoReceptor);
        $solicitudInsertar ->execute();
        $solicitudInsertar ->closeCursor();

    }catch(PDOException $Error){
        echo $Error ->getMessage();
    }
}


function SeleccionarSolicitud($codigo){
    try{
        $conexion = Conexion();
        $solicitudSeleccionar = $conexion ->prepare("CALL spSelectSolicitud(:codigo)");
        $solicitudSeleccionar ->bindParam(":codigo", $codigo);
        $solicitudSeleccionar ->execute();
        $resultado = $solicitudSeleccionar ->fetch(PDO::FETCH_ASSOC);
        $solicitudSeleccionar ->closeCursor();

        var_dump($resultado);

    }catch(PDOException $Error){
        echo $Error ->getMessage();
    }
}

function EliminarSolicitud($codigoReceptor, $codigoEmisor){
    try{
        $conexion = Conexion();

        $solicitudEliminar = $conexion ->prepare("CALL spEliminarSolicitud(:codigoReceptor, :codigoEmisor)");
        $solicitudEliminar ->bindParam(":codigoReceptor", $codigoReceptor);
        $solicitudEliminar ->bindParam(":codigoEmisor", $codigoEmisor);
        $solicitudEliminar ->execute();
        $solicitudEliminar ->closeCursor();

    }catch(PDOException $Error){
        echo $Error ->getMessage();
    }
}


function AceptarSolicitud($codigoReceptor, $codigoEmisor){
    try{
        $conexion = Conexion();

        $solicitudAceptar = $conexion ->prepare("CALL spAceptarSolicitud(:codigoReceptor, :codigoEmisor)");
        $solicitudAceptar ->bindParam(":codigoReceptor", $codigoReceptor);
        $solicitudAceptar ->bindParam(":codigoEmisor", $codigoEmisor);
        $solicitudAceptar ->execute();
        $solicitudAceptar ->closeCursor();       

    }catch(PDOException $Error){
        echo $Error ->getMessage();
        
    } 
}


// <>

?>