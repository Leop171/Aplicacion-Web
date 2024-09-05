<?php
include "../includes/config.php";
include "../includes/mysql.php";
include "../includes/validacion.php";


try{
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $texto = $_POST["publicacionTexto"]; 
        // $imagen = $_POST["publicacionArchivo"];
        $imagen = $_FILES["publicacionArchivo"];
    }

    validarTexto($texto);
    validarImagen($imagen);

    // "../uploads/imagen_publicacion/" CREAR LA CARPETA EN EL MISMO NIVEL QUE SERVICES
    // "./uploads/imagen_publicacion/" CREAR LA CARPETA DENTRO DE SERVICES
    // "/uploads/imagen_publicacion/" NO SE CREA LA CARPETA
    // "uploads/imagen_publicacion/" CREAR LA CARPETA DENTRO DE SERVICES
    // uploads\imagen_publicacion 

    $carpeta = "../../uploads/imagen_publicacion/". $usuarioNombre. "/";
    $carpeta = str_replace("\\", "/", $carpeta);

    if(!file_exists($carpeta)){
        mkdir($carpeta, 077, true);
        }

    // La ruta completa hacia la imagen, no se utiliza $carpeta por que es una ruta relativa y cambia cuando
    // queramos ver la imagen desde otro archivo
    if(!isset($imagen)){
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



