<?php
include_once($_SERVER["DOCUMENT_ROOT"]. "/ForoDeDiscucion/rutas.php");
include(MODELS. "model_amigo.php");
include_once(UTILS. "respuesta_modelo.php");
include_once(UTILS. "validacion.php");

$input = file_get_contents("php://input");
$data = json_decode($input, true);


switch ($_SERVER["REQUEST_METHOD"]){
    case "GET":
            PeticionSeleccionarAmigo($data);
            break;
    
}


function PeticionSeleccionarAmigo($data){
    try{
        $codigo = $data["codigo"] ?? throw new Exception("4014");

        ValidarCodigo($codigo);

        SeleccionarAmigo($codigo);

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