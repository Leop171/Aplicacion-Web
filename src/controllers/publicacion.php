<?php
include_once($_SERVER["DOCUMENT_ROOT"]. "/ForoDeDiscucion/rutas.php");
include(MODELS. "model_publicacion.php");
include_once(UTILS. "respuesta_modelo.php");
include_once(UTILS. "validacion.php");


switch ($_SERVER["REQUEST_METHOD"]){
    case "GET":
            PeticionSeleccionarPublicacion();
            break;
    case "POST":
        PeticionInsertarPublicacion();
        break;
}

function PeticionInsertarPublicacion(){
    try{
        $codigo = $_POST["codigo"] ?? throw new Exception("4014"); // Los archivos no esta llegando
        $texto = $_POST["texto"] ?? NULL;
        $imagen = $_FILES["imagen"] ?? NULL;

        ValidarCodigo($codigo);
        ValidarTexto($texto);
        ValidarImagen($imagen);
        
        // Guardar la imagen
        $carpeta = IMAGEN_PUBLICACION. $codigo. "/";
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

        InsertarPublicacion($codigo, $texto, $ubicacionFinal);

        echo(json_encode(DevolverEstado("4000")));

    }catch(Exception $Error){
        if($Error -> getCode() == 45000){

            echo(json_encode($Error -> getMessage()));
        }else{
            echo(json_encode(DevolverEstado($Error -> getMessage())));
        }

    } 
}


function PeticionSeleccionarPublicacion(){
    try{
        SelectPublicacion();

        var_dump("4000");
    }catch(Exception $Error){
        if($Error -> getCode() == 4500){
            var_dump($Error -> getMessage());            
        }else{
            var_dump(DevolverEstado($Error ->getMessage()));
        }
    }
    

}
// try{
//     $nombre = $data["nombre"] ?? throw new Exception("4010");
//     $correo = $data["correo"] ?? throw new Exception("4003");
//     $contrasenia = $data["contrasenia"] ?? throw new Exception("4004");

//     ValidarNombre($nombre);
//     ValidarCorreo($correo);
//     ValidarContrasenia($contrasenia);


//     InsertarAcceso($data["nombre"], $data["correo"], password_hash($data["contrasenia"], PASSWORD_BCRYPT));   
    
//     var_dump(DevolverEstado("4000"));

// }catch(Exception $Error){
//     if($Error -> getCode() == 45000){

//         var_dump($Error -> getMessage());
//     }else{
//         var_dump(DevolverEstado($Error -> getMessage()));
//     }
    
// }

?>