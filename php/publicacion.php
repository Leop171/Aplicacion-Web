<?php

// $file = 1;
header('Content-Type: application/json');



// Leer los datos JSON del cuerpo de la solicitud
$input = file_get_contents("php://input");
$data = json_decode($input, true);


try{
    if($data){
        $texto = $data["publicacionTexto"] ?? "No texto";

        if($file){
            $imagen = "Si hay imagen";
        }else{
            $imagen = "No hay Imagen";
        }

        // Ruta temporal
        // $rutaTemporal = $_FILES["publicacionArchivo"]["tmp_name"];

        // Ruta donde esta la carpeta que guarda las imagenes
        // $obtenerRuta = dirname(__FILE__). "/imagenes";
        
        // Remplazar los \\ por / en la ruta
        // $carpetaRuta = str_replace("\\", "/", $obtenerRuta);
 
        // Crear la ruta para el archivo por medio de su nombre
        // $imagenRuta = $carpetaRuta. basename("ArchivoPrueba");

        // Mover el archivo a la carpeta creada
        // move_uploaded_file($rutaTemporal, $carpetaRuta);
        
        echo json_encode([
            "data" => $texto,
            "imagen" => $imagen
            // "obtenerRuta" => $obtenerRuta,
            // "nuevaRuta" => $carpetaRuta,
            // "imagenRuta" => $imagenRuta,
            // "carpetaRuta" => $carpetaRuta,
            // "VerificarImagen"  => $$verificarImagen
            // "rutaTemporal" => $rutaTemporal
        ]);
    }
}catch(Exception $Error){
    echo json_encode([
        "status" => "Error",
        "Error" => $Error -> getMessage()
    ]);
};

// $direccionTemporal = $_FILES["publicacionArchivo"]["tmp_name"];

// $carpetaImagenes = dirname(__FILE__). "/imagenes";

// $direccionDestino = str_replace("\\", "/", $carpetaImagenes). "/". $imagen;

// echo $direccionDestino;
// echo $carpetaImagenes;

// if(!file_exists())


// <>






?>




