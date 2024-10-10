<?php
include_once($_SERVER["DOCUMENT_ROOT"]. "/ForoDeDiscucion/rutas.php");
include(MODELS. "model_notificacion.php");
include_once(UTILS. "respuesta_modelo.php");
// include_once(UTILS. "session.php");
include_once(UTILS. "validacion.php");


$input = file_get_contents("php://input");
$data = json_decode($input, true);


switch ($_SERVER["REQUEST_METHOD"]){
    case "GET":
        PeticionSeleccionarNotificacion(); // codigo de la session
        break;
    case "POST":
        PeticionInsertarNotificacion($data);
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



function PeticionSeleccionarNotificacion(){
    try{
                
        $codigo = $_SESSION["codigoUsuario"] ?? throw new Exception("4017");
        
        ValidarCodigo($codigo);

        SeleccionarNotificacion($codigo);

        var_dump(DevolverEstado("4000")); // Si todo salio bien se envia el codigo 4000 con la data
        

    }catch(Exception $Error){
        if($Error ->getCode() == 45000){

            var_dump($Error -> getMessage()); // En este caso se deberia imprimir un codigo de error generico
        }else{
            var_dump(DevolverEstado($Error ->getMessage())); // Si ocurre un error no se envia respuesta con data, solo el error
        }        
    }

}


function PeticionInsertarNotificacion($data){
    try{
        $codigoReceptor = $data["codigoReceptor"] ?? throw new Exception("4014");
        $codigoEmisor = $data["codigoEmisor"] ?? throw new Exception("4014");
        $texto = $data["texto"] ?? NULL;
        $tipo = $data["tipo"] ?? NULL;
        $direccion = $data["direccion"] ?? NULL;
        $imagen = $data["imagen"] ?? NULL; 

        
        ValidarCodigo($codigoReceptor);
        ValidarCodigo($codigoEmisor);
        ValidarTexto($texto);
        // ValidarImagen($imagen); Omitir la insercion de la imagen, solo se inserta la direccion

        InsertarNotificaion($codigoReceptor, $codigoEmisor, $texto, $tipo, $direccion, $imagen);

        var_dump(DevolverEstado("4000"));

    }catch(Exception $Error){
        if($Error ->getCode() == 45000){

            var_dump($Error -> getMessage());
        }else{
            var_dump(DevolverEstado($Error ->getMessage()));
        } 
    }
}

// <>

?>