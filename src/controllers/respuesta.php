<?php
include_once($_SERVER["DOCUMENT_ROOT"]. "/ForoDeDiscucion/rutas.php");
include(MODELS. "model_respuesta.php");
include(UTILS. "validacion.php");
include_once(UTILS. "respuesta_modelo.php");

$input = file_get_contents("php://input");
$data = json_decode($input, true);


switch($_SERVER["REQUEST_METHOD"]){
    case "GET":
        PeticionSeleccionarRespuesta($data);
        break;    
    case "POST":
        PeticionInsertarRespuesta();
        break;
};


function PeticionSeleccionarRespuesta($data){
    try{
        $publicacion = $data["publicacion"] ?? throw new Exception("4013");

        ValidarCodigo($publicacion);
        
        SeleccionarRespuesta($publicacion);

        var_dump(DevolverEstado("4000"));

    }catch(Exception $Error){
    
    if($Error -> getCode() == 45000){
        var_dump(DevolverEstado("5000"));
    }else{
        var_dump(DevolverEstado($Error -> getMessage()));
    }

    }
}


function PeticionInsertarRespuesta(){
    try{
        $codigo = $_POST["codigo"] ?? throw new Exception("4014");
        $publicacion = $_POST["publicacion"] ?? throw new Exception("4013");
        $texto = $_POST["texto"] ?? NULL;
        $imagen = $_FILES["imagen"] ?? NULL;

        ValidarCodigo($codigo);
        ValidarCodigo($publicacion);
        ValidarTexto($texto);
        ValidarImagen($imagen);

        $carpeta = IMAGEN_RESPUESTA. $codigo. "/";
        // $carpeta = str_replace("\\", "/", $carpeta);
    
        if(!file_exists($carpeta)){
            mkdir($carpeta, 077, true);
        }
        
        $ubicacionFinal = "";
        // La ruta completa hacia la imagen, no se utiliza $carpeta por que es una ruta relativa y cambia cuando
        // queramos ver la imagen desde otro archivo
        if(!isset($imagen)){
            $ubicacionFinal = NULL;
        }else{
            $imagenNombre = str_replace(" ", "", $imagen["name"]);
            $ubicacionFinal = $carpeta. time(). $imagenNombre;
            move_uploaded_file($imagen["tmp_name"], $ubicacionFinal);  
        }


        InsertarRespuesta($codigo, $publicacion, $texto, $ubicacionFinal);

        var_dump(DevolverEstado("4000"));

    }catch(Exception $Error){
        if($Error -> getCode() == 4500){
            // var_dump(DevolverEstado("5000"));
            echo $Error ->getMessage();
        }else{
            var_dump(DevolverEstado($Error ->getMessage()));
        }
        
    }
}
?>