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

// SeleccionarAmigo(15);

function SeleccionarAmigo($codigo){

    try{
        $conexion = Conexion();

        $amigoSeleccionar = $conexion->prepare("CALL spSelectAmigo(:codigo)");
        $amigoSeleccionar ->bindParam(":codigo", $codigo);
        $amigoSeleccionar ->execute();
        $resultado = $amigoSeleccionar ->fetchAll(PDO::FETCH_ASSOC);
        // $amigoSeleccionar ->closeCursor();

        return $resultado;

    }catch(PDOException $Error){

        echo $Error ->getMessage();
    }


}

// <>
?>