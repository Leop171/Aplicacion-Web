<?php

include __DIR__. "/config.php";
include __DIR__. "/mysql.php";


// Extraer las publicaciones de la base de datos
try{
    $publicaciones = $conexion -> prepare("SELECT * FROM foro.publicacion LIMIT 10");
    // codigo, fecha, tema, usuario_codigo, etiqueta_codigo
    $publicaciones -> execute();

    // $resultado = $publicaciones->fetch(PDO::FETCH_ASSOC);
    $resultado = $publicaciones->fetch(PDO::FETCH_ASSOC);

    print json_encode([ // echo json_encode
        $resultado
    ]);

}catch(Exception $e){
    print json_encode([
        "status" => "Error",
        "Message" =>  $e -> getMessage() 
    ]);
}






// <>







?>



