<?php
include_once($_SERVER["DOCUMENT_ROOT"]. "/ForoDeDiscucion/rutas.php");
include(MODELS. "model_usuario.php");
include_once(UTILS. "respuesta_modelo.php");
include_once(UTILS. "validacion.php");


$input = file_get_contents("php://input");
$data = json_decode($input, true);

switch($_SERVER["REQUEST_METHOD"]){
    case "GET":
        PeticionObtenerUsuario($data);
        break;
    case "PUT":
        PeticionActualizarUsuario($data);
        break;
}


function PeticionObtenerUsuario($data){
    try{
        // Si es null o no existe
        $nombre = $data["nombre"] ?? throw new Exception("4010");

        ValidarNombre($nombre);

        ObtenerUsuario($nombre);

        var_dump(DevolverEstado("4000"));

    }catch(Exception $Error){
        if($Error -> getCode() == 45000){
            var_dump(DevolverEstado("5000"));
        }else{
            var_dump(DevolverEstado($Error -> getMessage()));
        }

    }
}


function PeticionActualizarUsuario($data){
    try{
        $codigo = $data["codigo"] ?? NULL;
        $nombre = $data["nombre"] ?? throw new Exception("4002");
        $descripcion = $data["descripcion"] ?? NULL;
        $direccion = $data["direccion"] ?? NULL;

        ValidarNombre($nombre);
        ValidarTexto($descripcion);
        ValidarImagen($direccion);

        ActualizarUsuario($codigo, $nombre, $descripcion, $direccion["name"]);

        var_dump(DevolverEstado("4000"));

    }catch(Exception $Error){

        if($Error -> getCode() == 45000){
            var_dump($Error -> getMessage());
        }else{
            var_dump(DevolverEstado($Error -> getMessage()));
        }

    }

}


?>