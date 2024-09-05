<?php
// include "../includes/config.php";
// namespace model;
// include "../includes/config.php";
// include "src\includes\config.php";
include_once ($_SERVER["DOCUMENT_ROOT"]. "/ForoDeDiscucion/rutas.php");
include (SRC. "includes/config.php");

function UsuarioInsertar($codigo, $nombre){
    
    $conexion = Conexion();
    
    $stmt = $conexion->prepare("INSERT INTO test.usuario_test (codigo, nombre) VALUES(:codigo, :nombre)");
    $stmt->bindParam(":codigo", $codigo);
    $stmt->bindParam(":nombre", $nombre);
    
    if($stmt->execute()){
        echo "Insercion exitosa";
    }else{
        echo "Insercion fallida";
    }
    
}



// <>

?>