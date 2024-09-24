<?php
include_once($_SERVER["DOCUMENT_ROOT"]. "/ForoDeDiscucion/rutas.php");
include(MODELS. "model_guardado.php");
include_once(UTILS. "respuesta_modelo.php");
include_once(UTILS. "validacion.php");

$input = file_get_contents("php://input");
$data = json_decode($input, true);


switch ($_SERVER["REQUEST_METHOD"]){
    case "GET":
            PeticionSeleccionarGuardado($data);
            break;
    case "POST":
        PeticionInsertarGuardado($data);
        break;
    case "DELETE":
        PeticionEliminarGuardado($data);
        break;
    
}


/*
Crear la funcion con array como parametro
Iniciar el bloque try-catch
Verificar que los datos se hayan enviado y no sean null
Validar los datos recibidos
Llamar al modelo
Devolver el estado
Codigo del catch
*/

// Los controladores con metodo GET no pueden recibir $data ya que no se envia en el cuerpo de la peticion
function PeticionSeleccionarGuardado($data){
    try{
        $codigo = $data["codigo"] ?? throw new Exception("4014");

        ValidarCodigo($codigo);

        SeleccionarGuardado($codigo);

        echo json_encode(DevolverEstado("4000"));

    }catch(Exception $Error){
        if($Error ->getCode() == 45000){

            echo json_encode($Error -> getMessage());
        }else{
            echo json_encode(DevolverEstado($Error ->getMessage()));
        } 

    }
}


function PeticionInsertarGuardado($data){
    try{
        $codigoUsuario = $data["codigoUsuario"] ?? throw new Exception("4014");
        $direccion = $data["direccion"] ?? NULL;
        $codigoPublicacion = $data["codigoPublicacion"] ?? throw new Exception("4013");

        ValidarCodigo($codigoUsuario);
        ValidarCodigo($codigoPublicacion);

        InsertarGuardado($codigoUsuario, $direccion ,$codigoPublicacion, );

        echo json_encode(DevolverEstado("4000"));

    }catch(PDOException $Error){
        if($Error ->getCode() == 45000){

            echo json_encode($Error -> getMessage());
        }else{
            echo json_encode(DevolverEstado($Error ->getMessage()));
        } 

    }
}


function PeticionEliminarGuardado($data){
    try{
        $codigoUsuario = $data["codigoUsuario"] ?? throw new Exception("4014");
        $codigoPublicacion = $data["codigoPublicacion"] ?? NULL;

        ValidarCodigo($codigoUsuario);
        ValidarCodigo($codigoPublicacion);

        EliminarGuardado($codigoUsuario, $codigoPublicacion);

        var_dump(DevolverEstado("4000"));

    }catch(Exception $Error){
        if($Error ->getCode() == 45000){

            var_dump($Error -> getMessage());
        }else{
            var_dump(DevolverEstado($Error ->getMessage()));
        } 

    }
}

?>