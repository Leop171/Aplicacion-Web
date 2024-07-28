<?php
include __DIR__. "/config.php";
include __DIR__. "/mysql.php";

try{
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $texto = $_POST["publicacionTexto"];
        // $imagen = $_POST["publicacionArchivo"];
        $imagen = $_FILES["publicacionArchivo"];
        $imagenPeso = $_FILES["publicacionArchivo"]["size"];
        $imagenNombre = $_FILES["publicacionArchivo"]["name"];

    }
    
    $imagenExtension = strtolower(pathinfo($imagenNombre, PATHINFO_EXTENSION));

    $extensionPermitida = "/jpg|jpeg|jfif|png/";

    if(!preg_match($extensionPermitida, $imagenExtension)){
        throw new Exception("Solo se permite .jpg, .jpeg, .jfif, .png");
    }

    if($imagenPeso > 400000){
        throw new Exception("El archivo debe pesar menos de 4mb");
    } 

    $texto = strip_tags($texto).PHP_EOL;

    $carpeta = "./imagenes/". $usuarioNombre. "/";
    $ubicacionFinal = $carpeta .$imagen["name"];

    //16,384

    
    if(!file_exists($carpeta)){
        mkdir($carpeta, 077, true);
    }
    // La imagem debe ser lo ultimo en insertarse en caso de que algo falle
    if(move_uploaded_file($imagen["tmp_name"], $ubicacionFinal)){ // $ubicacionFinal
        // var_dump($valores);S

    $fecha = date("Y/m/d");
    $codigo = 4;
    $etiqueta = 1;

    $insertarPublicacion = $conexion -> prepare("INSERT INTO foro.publicacion (codigo, fecha, tema, usuario_codigo, etiqueta_codigo)
    VALUES(:codigo, :fecha, :tema, :usuario_codigo, :etiqueta_codigo)");

    $insertarPublicacion -> bindParam(":fecha", $fecha);
    $insertarPublicacion -> bindParam(":codigo", $codigo);
    $insertarPublicacion -> bindParam(":tema", $texto);
    $insertarPublicacion ->bindParam(":usuario_codigo", $usuarioCodigo);
    $insertarPublicacion -> bindParam(":etiqueta_codigo", $etiqueta);

    $insertarPublicacion -> execute();
        
    header('Content-Type: application/json');

    echo json_encode([
        "status" => "Succes",
        "message" => "Succes"
    ]);
            
    }
        
        // echo $text;
        // echo $imagen;

}
catch(Exception $Error){
        echo json_encode([
            "status" => "Error",
            "message" => $Error -> getMessage()
        ]);
}


// <>






?>




