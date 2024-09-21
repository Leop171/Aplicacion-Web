<?php
include_once($_SERVER["DOCUMENT_ROOT"]. "/ForoDeDiscucion/rutas.php");
include(MODELS. "model_acceso.php");
include_once(UTILS. "respuesta_modelo.php");
include_once(UTILS. "validacion.php");


$input = file_get_contents("php://input");
$data = json_decode($input, true);


switch($_SERVER["REQUEST_METHOD"]){
    case "POST":
        PeticionSeleccionarAcceso($data);
        break;
};


function PeticionSeleccionarAcceso($data){
    try{
        $correo = $data["correo"] ?? throw new Exception("4003");
        $contrasenia = $data["contrasenia"] ?? throw new Exception("4004");

        ValidarCorreo($correo);
        ValidarContrasenia($contrasenia);

        SeleccionarAcceso($data["correo"], $data["contrasenia"]);
        var_dump(json_encode(DevolverEstado("4000")));

    }catch(Exception $Error){

        if($Error -> getCode() == 45000){
            echo(json_encode($Error -> getMessage())); 
        }else{
            echo(json_encode(DevolverEstado($Error -> getMessage())));
        }
    }

}




?>