<?php
include_once($_SERVER["DOCUMENT_ROOT"]. "/ForoDeDiscucion/rutas.php");
include(MODELS. "model_registro.php");
include(UTILS. "validacion.php");

$input = file_get_contents("php://input");
$data = json_decode($input, true);


switch($_SERVER["REQUEST_METHOD"]){
    case "POST":
        PeticionInsertarUsuario($data);
        break;
};

/*
Crear la funcion con array como parametro
Iniciar el bloque try-catch
Verificar que los datos se hayan enviado y no sean null
Validar los datos recibidos
Llamar al modelo
Devolver el estado
Codigo del catch
*/

function PeticionInsertarUsuario($data){
    try{
        $nombre = $data["nombre"] ?? throw new Exception("4010");
        $correo = $data["correo"] ?? throw new Exception("4003");
        $contrasenia = $data["contrasenia"] ?? throw new Exception("4004");

        ValidarNombre($nombre);
        ValidarCorreo($correo);
        ValidarContrasenia($contrasenia);


        InsertarAcceso($data["nombre"], $data["correo"], password_hash($data["contrasenia"], PASSWORD_BCRYPT));   
        
        // Un consulta que lee el utlimo id insertado y lo coloca como codigo de session
        
        // session_start();
        // Crear la sesion con la pk del usuario creado
        // $_SESSION["codigoUsuario"] = $nuevoUsuario["codigo"];

        echo json_encode(DevolverEstado("4000")); // Por se un registro se envia solo el codigo de estado sin data
    
    }catch(Exception $Error){
        if($Error -> getCode() == 45000){

            // var_dump($Error -> getMessage());
            echo "ErroDelcontrolador";
        }else{
            echo json_encode(DevolverEstado($Error -> getMessage()));
        }
        
    }
}



?>