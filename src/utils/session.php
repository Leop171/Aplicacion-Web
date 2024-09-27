<?php
include_once($_SERVER["DOCUMENT_ROOT"]. "/ForoDeDiscucion/rutas.php");
include_once(UTILS. "config.php");
include_once(UTILS. "respuesta_modelo.php");

try{
    session_start();

    if(!isset($_SESSION["codigoUsuario"])){
        throw new Exception("4017");        
        echo "No existe la session";
        return;
    }

    $codigoUsuario = $_SESSION["codigoUsuario"];
    
    $conexion = Conexion();
    
    $verificarSession = $conexion->prepare("CALL spSelectSession(:codigo)");
    $verificarSession ->bindParam(":codigo", $codigoUsuario);
    $verificarSession ->execute();
    $credencialesUsuario = $verificarSession->fetch(PDO::FETCH_ASSOC);
    $verificarSession ->closeCursor();


}catch(Exception $Error){
    var_dump(DevolverEstado($Error ->getMessage()));
}



// <>

?>