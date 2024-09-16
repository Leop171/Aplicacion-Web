<?php
include "../includes/config.php";
include "../includes/mysql.php";


// Extraer las publicaciones de la base de datos
try{
    $publicaciones = "SELECT * FROM RedSocial.vPublicacion";

    $resultado = $conexion -> prepare($publicaciones, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));

    $resultado -> execute();    

    $datos = array();

    while($fila = $resultado -> fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_NEXT)){
        array_push($datos, $fila);
    }
    
    echo json_encode($datos);

}catch(Exception $e){
    echo json_encode([
        "status" => "Error",
        "Message" =>  $e -> getMessage() 
    ]);
}

?>