<?php
include "../includes/config.php";


function CrearRegistro($codigo, $nombre){
    
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