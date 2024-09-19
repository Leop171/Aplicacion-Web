<?php
include_once($_SERVER["DOCUMENT_ROOT"]. "/ForoDeDiscucion/rutas.php");
include_once(UTILS. "config.php");
include_once(UTILS. "respuesta_modelo.php");


function InsertarPublicacion($codigo, $texto, $ubicacionFinal){
    try{
        $conexion = Conexion();

        $publicacionInsertar = $conexion ->prepare("CALL spInsertPublicacion(:codigo, :texto, :ubicacionFinal)");     
        $publicacionInsertar ->bindParam(":codigo", $codigo);
        $publicacionInsertar ->bindParam(":texto", $texto);
        $publicacionInsertar -> bindParam(":ubicacionFinal", $ubicacionFinal);
        $publicacionInsertar ->execute();
        $publicacionInsertar ->closeCursor();

    }catch(PDOException $Error){
        echo $Error ->getMessage();

    } 
}


function SelectPublicacion(){
    try{
        $conexion = Conexion();

        $publicacionObtener = $conexion ->prepare("CALL spSelectPublicacion()");
        $publicacionObtener ->execute();
        $resultado = $publicacionObtener ->fetchAll(PDO::FETCH_ASSOC);
        $publicacionObtener ->closeCursor();

        var_dump($resultado);

        // TENGO QUE GUARDARLO CON GIT -
        // MAÑANA SI O SI COMIENZO EL CURSO DE C# 
        // OBLIGATORIAMENTE DEBO COMENZAR A PREPARARME PARA LA ENTREVISTA TECINICA 

        
    }catch(PDOException $Error){
        echo $Error -> getMessage();
    }
}


// <>

?>

