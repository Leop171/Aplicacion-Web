<?php

use function PHPSTORM_META\map;

include_once($_SERVER["DOCUMENT_ROOT"]. "/ForoDeDiscucion/rutas.php");
include_once(UTILS. "config.php");
// include_once(UTILS. "respuesta_modelo.php");

// codigo, nombre, descripcion, direccion

function ObtenerUsuario($nombre){
    try{
        $conexion = Conexion();

        $usuarioObtener = $conexion ->prepare("CALL spSelectUsuario(:nombre)");
        $usuarioObtener ->bindParam(":nombre", $nombre);
        $usuarioObtener ->execute();
        $resultado = $usuarioObtener ->fetchAll(PDO::FETCH_ASSOC);
        $usuarioObtener ->closeCursor();
        
        var_dump($resultado);

    }catch(PDOException $Error){
        echo $Error -> getMessage();
    }
}

function ActualizarUsuario($codigo, $nombre, $descripcion, $direccion){
    try{
    
        $conexion = Conexion();
        
        $usuarioActualizar = $conexion ->prepare("CALL spUpdateUsuario(:codigo, :nombre, :descripcion, :direccion)");
        $usuarioActualizar->bindParam(":codigo", $codigo);
        $usuarioActualizar->bindParam(":nombre", $nombre);
        $usuarioActualizar->bindParam(":descripcion", $descripcion);
        $usuarioActualizar->bindParam(":direccion", $direccion);
        $usuarioActualizar->execute();
        $usuarioActualizar->closeCursor();

    }catch(PDOException $Error){
        echo $Error ->getMessage();

    }
}

// <>
?>
