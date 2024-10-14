<?php
include_once($_SERVER["DOCUMENT_ROOT"]. "/ForoDeDiscucion/rutas.php");
include(MODELS. "model_amigo.php");
include_once(UTILS. "respuesta_modelo.php");
include_once(UTILS. "validacion.php");

$input = file_get_contents("php://input");
$data = json_decode($input, true);


switch ($_SERVER["REQUEST_METHOD"]){
    case "GET":
        PeticionSeleccionarAmigo();
        break;
    
}


function PeticionSeleccionarAmigo(){
    try{
        session_start();
        $codigo = $_SESSION["__usuario_codigo"] ?? throw new Exception("4017"); // VERIFICAR QUE LA SESSION EXISTA

        ValidarCodigo($codigo);

        $respuestaModelo = SeleccionarAmigo($codigo); 

        echo json_encode(DevolverEstado("4000", $respuestaModelo));

    }catch(Exception $Error){

        if($Error -> getCode() == 4500){
            // var_dump(DevolverEstado("5000"));
            echo $Error ->getMessage();
        }else{
            echo json_encode(DevolverEstado($Error -> getMessage()));
        }

    }

}

?>