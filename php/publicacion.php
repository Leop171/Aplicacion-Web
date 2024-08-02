<?php
include __DIR__. "/config.php";
include __DIR__. "/mysql.php";

try{
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $texto = $_POST["publicacionTexto"] ?? NULL;
        // $imagen = $_POST["publicacionArchivo"];
        $imagen = $_FILES["publicacionArchivo"];
        $imagenPeso = $_FILES["publicacionArchivo"]["size"];
        $imagenNombre = $_FILES["publicacionArchivo"]["name"];

    }

    $imagenNombre = str_replace(" ", "", $imagenNombre);
    
    $imagenExtension = strtolower(pathinfo($imagenNombre, PATHINFO_EXTENSION));

    $extensionPermitida = "/jpg|jpeg|jfif|png/";

    if(!preg_match($extensionPermitida, $imagenExtension)){
        throw new Exception("Solo se permite .jpg, .jpeg, .jfif, .png");
    }

    if($imagenPeso > 400000){
        throw new Exception("El archivo debe pesar menos de 4mb");
    } 

    $texto = strip_tags($texto).PHP_EOL;

    $carpeta = "../imagenes/". $usuarioNombre. "/";
    $carpeta = str_replace("\\", "/", $carpeta);
    // La ruta completa hacia la imagen, no se utiliza $carpeta por que es una ruta relativa y cambia cuando
    // queramos ver la imagen desde otro archivo
    $ubicacionFinal = $carpeta. time(). $imagenNombre;
 

    if(!file_exists($carpeta)){
        mkdir($carpeta, 077, true);
    }

    $fecha = date("Y/m/d");
    // $codigo = 1;
    $etiqueta = 1;

    // Insertar las reacciones
    $insertarReaccion = $conexion -> prepare("INSERT INTO RedSocial.reaccion() VALUES()");
    $insertarReaccion -> execute();

    // Insertar la publicacion
    $insertarPublicacion = $conexion -> prepare("INSERT INTO RedSocial.publicacion (fecha, texto, usuario_codigo, reaccion_codigo)
    VALUES(:fecha, :texto, :usuario_codigo, :reaccion_codigo)");

    // Obtiene el utlimo codigo generado en .reaccion
    $ultimoCodigoReaccion = $conexion->lastInsertId();

    $insertarPublicacion -> bindParam(":fecha", $fecha);
    // $insertarPublicacion -> bindParam(":codigo", $codigo);
    $insertarPublicacion -> bindParam(":texto", $texto);
    $insertarPublicacion ->bindParam(":usuario_codigo", $usuarioCodigo);
    $insertarPublicacion -> bindParam(":reaccion_codigo", $ultimoCodigoReaccion);

    $insertarPublicacion -> execute();

    // Insertar la imagen en imagen publicacion
    $ultimoCodigoPublicacion = $conexion->lastInsertId();
        
    $insertarImagen = $conexion -> prepare("INSERT INTO RedSocial.imagen_publicacion (direccion, publicacion_codigo) VALUES(:direccion, :publicacion_codigo)");

    $insertarImagen -> bindParam(":direccion", $ubicacionFinal);
    $insertarImagen -> bindParam(":publicacion_codigo", $ultimoCodigoPublicacion);    

    $insertarImagen -> execute();

   


    // La imagem debe ser lo ultimo en insertarse en caso de que algo falle
    if(move_uploaded_file($imagen["tmp_name"], $ubicacionFinal)){ // $ubicacionFinal
        // var_dump($valores);S
        
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



