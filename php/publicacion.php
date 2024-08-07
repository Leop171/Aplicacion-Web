<?php
include __DIR__. "/config.php";
include __DIR__. "/mysql.php";

// Funcion que valida el texto
function validarTexto($texto){

    if($texto === NULL){
        return $texto;
    }

    $texto = strip_tags($texto).PHP_EOL;

    if(strlen($texto) >= 200){
        return throw new Exception("Solo se permiten 200 caracteres");
    }

    return $texto;
}


// Funcion que valida la imagen
function validarImagen($imagen){
    if(isset($imagen)){
        return;
    }

    $imagenNombre = $imagen["name"];
    $imagenPeso = $imagen["size"];

    $imagenExtension = strtolower(pathinfo($imagenNombre, PATHINFO_EXTENSION));

    $extensionPermitida = "/jpg|jpeg|jfif|png/";

    if(!preg_match($extensionPermitida, $imagenExtension)){
        return throw new Exception("Solo se permite .jpg, .jpeg, .jfif, .png");
    }

    if($imagenPeso > 400000){
        return throw new Exception("El archivo debe pesar menos de 4mb");
    } 
}


try{
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $texto = $_POST["publicacionTexto"] ?? null;
        // $imagen = $_POST["publicacionArchivo"];
        $imagen = $_FILES["publicacionArchivo"] ?? null;
    }

    validarTexto($texto);
    validarImagen($imagen);

    $carpeta = "../imagenes/". $usuarioNombre. "/";
    $carpeta = str_replace("\\", "/", $carpeta);

    if(!file_exists($carpeta)){
        mkdir($carpeta, 077, true);
        }

    // La ruta completa hacia la imagen, no se utiliza $carpeta por que es una ruta relativa y cambia cuando
    // queramos ver la imagen desde otro archivo
    if(isset($imagen)){
        $ubicacionFinal = null;        
    }else{
        $imagenNombre = str_replace(" ", "", $imagen["name"]);
        $ubicacionFinal = $carpeta. time(). $imagenNombre;
        move_uploaded_file($imagen["tmp_name"], $ubicacionFinal);  
    }


    
    $fecha = date("Y/m/d");

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
              

    // header('Content-Type: application/json');
   
    echo json_encode([
        "status" => "Succes",
        "message" => "Succes"
    ]);
            
    
}
catch(Exception $Error){
        echo json_encode([
            "status" => "Error",
            "message" => $Error -> getMessage()
        ]);
}


// <>






?>




