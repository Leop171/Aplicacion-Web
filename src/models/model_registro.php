<?php
include_once($_SERVER["DOCUMENT_ROOT"]. "/ForoDeDiscucion/rutas.php");
include_once(UTILS. "config.php");
include_once(UTILS. "respuesta_modelo.php");


// MODELOS USUARIO
function InsertarAcceso($nombre, $correo, $contrasenia){
    try{
        $conexion = Conexion();

        $CorreoBuscar = $conexion->prepare("CALL spSelectUsuarioCorreo(:correo)");
        $CorreoBuscar ->bindParam(":correo", $correo);
        $CorreoBuscar->execute();
        $CorreoBuscar->closeCursor();

        if($CorreoBuscar->rowCount() > 0){
            throw new Exception("4001");
        }

        $NombreBuscar = $conexion->prepare("CALL spSelectUsuarioNombre(:nombre)");
        $NombreBuscar->bindParam(":nombre", $nombre);
        $NombreBuscar->execute();
        $NombreBuscar->closeCursor();

        if($NombreBuscar->rowCount() > 0){
            throw new Exception("4002");
        }


        $GuardarUsuario = $conexion->prepare("CALL spInsertUsuario(:nombre, :correo, :contrasenia, @resultado)");
        $GuardarUsuario ->bindParam(":nombre", $nombre);
        $GuardarUsuario->bindParam(":correo", $correo);
        $GuardarUsuario->bindParam(":contrasenia", $contrasenia);
        $GuardarUsuario->execute();
        $RecuperarCodigo = $GuardarUsuario ->fetch(PDO::FETCH_ASSOC);
        $GuardarUsuario->closeCursor();

        // Leer el ultimo id insertado y colocarlo en una variable
        session_start();
        $_SESSION["__usuario_codigo"] = $RecuperarCodigo;



    }catch(PDOException $Error){
        
        // echo $Error -> getMessage();
        echo "ErrorDelMoedlo";
        // var_dump("5000"); // Si el error llego al modelo es por que no fue controlado en el controlador, imprime un error generico
                
    }
        
}





/*
----------------------------------------------------------------------------------------------------------
*/

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

// <>

?>