<?php
include_once($_SERVER["DOCUMENT_ROOT"]. "/ForoDeDiscucion/rutas.php");
include_once(UTILS. "config.php");
include_once(UTILS. "respuesta_modelo.php");

function SeleccionarAcceso($correo, $contrasenia){
    try{
        $conexion = Conexion();

        $CorreoBuscar = $conexion->prepare("CALL spSelectUsuarioCorreo(:correo)");
        $CorreoBuscar ->bindParam(":correo", $correo);
        $CorreoBuscar->execute();
        
        // $resultado = $CorreoBuscar->fetch(PDO::FETCH_ASSOC);
        $CorreoBuscar->closeCursor();

        $ContraseniaBuscar = $conexion->prepare("CALL spSelectAcceso(:correo, :contrasenia)");
        $ContraseniaBuscar->bindParam(":correo", $correo);
        $ContraseniaBuscar ->bindParam(":contrasenia", $contrasenia);
        $ContraseniaBuscar ->execute();
        $datosUsuario = $ContraseniaBuscar->fetch(PDO::FETCH_ASSOC);

        if(!$CorreoBuscar -> rowCount() > 0){
            throw new Exception("4005");
        }else{ // TENGO QUE CREAR OTRO PROCESO ALMACENADO PARA VERIFICAR EL CORREO Y CONTRASELA A LA VEZ
            if(!password_verify($contrasenia, $datosUsuario["contrasenia"])){
                throw new Exception("4006");
            }else{
                // Crear el inicio de session para el usuario
                throw new Exception("4000");
            }
        }    

    }catch(PDOException $Error){
        echo(json_encode($Error -> getMessage()));       
    }
    
}





?>