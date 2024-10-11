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
        
        session_start();
        $codigo = $_SESSION["__usuario_codigo"] ?? throw new Exception("4017"); // VERIFICAR QUE LA SESSION EXISTA
        
        ValidarCodigo($codigo); // VERIFICAR QUE EL CODIGO DE SESSION SE VALIDO

        // $respuestaModelo = SeleccionarNotificacion($codigo); 
        $respuestaModelo = SeleccionarNotificacion($codigo); 
        
                                            // EJECUTAR EL MODELO Y GUARDAR LA RESPUESTA EN UNA VARIABLE
        // SI EL MODELO TIENE UN ERROR SE EJECUTARA EN SU BLOQUE TRY-CATCH Y LA EJECUCION SE DETENDAR SIN SALIR DEL MODELO
        // SI LA EJECUCION SALIO DEL MODELO SOLO PUEDE DEVOLVER FALSE O UN ARRAY CON LA DATA, SI ES FALSE EL CLIENTE PRESENTA EL MENSAJE DONDE
        // DICE QUE NO HAY DATA PARA MOSTRAR, DE LO CONTRARIO TENDRA UN ARRAY PARA RECORRER
        echo json_encode(DevolverEstado("4000", $respuestaModelo));
        

    }catch(Exception $Error){
        if($Error ->getCode() == 45000){

            echo json_encode($Error -> getMessage()); // En este caso se deberia imprimir un codigo de error generico
        }else{
            echo json_encode(DevolverEstado($Error ->getMessage())); // Si ocurre un error no se envia respuesta con data, solo el error
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