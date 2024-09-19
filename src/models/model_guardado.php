<?php
include_once($_SERVER["DOCUMENT_ROOT"]. "/ForoDeDiscucion/rutas.php");
include_once(UTILS. "config.php");
include_once(UTILS. "respuesta_modelo.php");

/*
Crear la funcion
Iniciar el try-catch
Crear la conexion
Llamar al proceso
Blindar los parametros
Ejecutar el proceso
Cerar la ejecucion
Codigo catch
*/


function InsertarGuardado($codigoUsuario, $direccion, $codigoPublicacion){
    try{
        $conexion = Conexion();

        $guardadoInsertar = $conexion ->prepare("CALL spInsertGuardado(:codigoUsuario, :direccion, :codigoPublicacion)");

        $guardadoInsertar ->bindParam(":codigoUsuario", $codigoUsuario);
        $guardadoInsertar ->bindParam(":direccion", $direccion);
        $guardadoInsertar ->bindParam(":codigoPublicacion", $codigoPublicacion);
        $guardadoInsertar ->execute();
        $guardadoInsertar ->closeCursor();

    }catch(PDOException $Error){
        echo $Error ->getMessage();        
    }
}


function SeleccionarGuardado($codigo){
    try{
        $conexion = Conexion();

        $guardadoSeleccionar = $conexion ->prepare("CALL spSelectGuardado(:codigo)");
        $guardadoSeleccionar ->bindParam(":codigo", $codigo);
        $guardadoSeleccionar ->execute();
        $resultado = $guardadoSeleccionar ->fetch(PDO::FETCH_ASSOC);
        $guardadoSeleccionar ->closeCursor();
        
        var_dump($resultado);

    }catch(PDOException $Error){
        echo $Error ->getMessage();

    }
}


function EliminarGuardado($codigoUsuario, $codigoPublicacion){
    try{
        $conexion = Conexion();

        $guardadoEliminar = $conexion ->prepare("CALL spEliminarGuardado(:codigoUsuario, :codigoPublicacion)");
        $guardadoEliminar ->bindParam(":codigoUsuario", $codigoUsuario);
        $guardadoEliminar ->bindParam(":codigoPublicacion", $codigoPublicacion);
        $guardadoEliminar ->execute();
        $guardadoEliminar ->closeCursor();

    }catch(PDOException $Error){
        echo $Error ->getMessage();

    }

}


// <>

?>