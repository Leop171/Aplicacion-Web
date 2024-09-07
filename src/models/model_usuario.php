<?php
include($_SERVER["DOCUMENT_ROOT"]. "rutas.php");
// include(SRC. "/models/model_usuario.php");


// MODELOS USUARIO
function InsertarUsuario($codigo, $nombre){

    $conexion = Conexion();
    
    $declaracion = $conexion->prepare("CALL spInsertUsuario(:nombre, :correo, :contrasenia)");
    $declaracion ->bindParam(":nombre", $nombre);
    $declaracion ->bindParam(":correo", $correo);
    $declaracion->bindParam(":contrasenia", $contrasenia);
    
    if($declaracion ->execute()){
        echo "Insercion exitosa";
    }else{
        echo "Insercion fallida";
    }
    
}

function ActualizarUsuario(){

    $conexion = Conexion();

    $declaracion  = $conexion->prepare("CALL spUpdateUsuario()");

    if($declaracion->execute()){
        echo "Insercion exitosa";
    }else{
        echo "Insercion fallida";
    }

}

function ObtenerUsuario(){

    $conexion = Conexion();

    $declaracion = $conexion->prepare("CALL spSelectUsuario()");

    if($declaracion->execute()){
        echo "Insercion exitosa";
    }else{
        echo "Insercion fallida";
    }

}

?>