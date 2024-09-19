<?php
include_once($_SERVER["DOCUMENT_ROOT"]. "/ForoDeDiscucion/rutas.php");
include(MODELS. "model_solicitud.php");
include_once(UTILS. "respuesta_modelo.php");
include_once(UTILS. "validacion.php");

$input = file_get_contents("php://input");
$data = json_decode($input, true);


switch ($_SERVER["REQUEST_METHOD"]){
    case "GET":
        PeticionSeleccionarSolicitud($data);
        break;
    case "POST":
        PeticionInsertarSolicitud($data);
        break;
    case "DELETE": 
        PeticionEliminarSolicitud($data);
        break;
    case "PUT":
        PeticionAceptarSolicitud($data);
        break;
}


function PeticionSeleccionarSolicitud($data){
    try{
        $codigo = $data["codigoReceptor"] ?? throw new Exception("4014");

        ValidarCodigo($codigo);

        SeleccionarSolicitud($codigo);

        var_dump(DevolverEstado("4000"));
    }catch(Exception $Error){
        
        if($Error -> getCode() == 45000){
            var_dump(DevolverEstado("5000"));
        }else{
            var_dump(DevolverEstado($Error -> getMessage()));
        }

    }
}

function PeticionInsertarSolicitud($data){
    try{
        $codigoEmisor = $data["codigoEmisor"] ?? throw new Exception("4014");
        $codigoReceptor = $data["codigoReceptor"] ?? throw new Exception("4014");

        ValidarCodigo($codigoEmisor);
        ValidarCodigo($codigoReceptor);

        InsertarSolicitud($codigoReceptor, $codigoEmisor);

        var_dump(DevolverEstado("4000"));

    }catch(Exception $Error){

        if($Error -> getCode() == 45000){
            var_dump(DevolverEstado("5000"));
        }else{
            var_dump(DevolverEstado($Error -> getMessage()));
        }

    }
}


function PeticionEliminarSolicitud($data){
    try{
        $codigoReceptor = $data["codigoReceptor"] ?? throw new Exception("4014");
        $codigoEmisor = $data["codigoEmisor"] ?? throw new Exception("4014");

        ValidarCodigo($codigoEmisor);
        ValidarCodigo($codigoReceptor);

        EliminarSolicitud($codigoEmisor, $codigoReceptor);

        var_dump(DevolverEstado("4000"));

    }catch(Exception $Error){
        
        if($Error -> getCode() == 45000){
            var_dump(DevolverEstado("5000"));
        }else{
            var_dump(DevolverEstado($Error -> getMessage()));
        }

    }
}


function PeticionAceptarSolicitud($data){
    try{
        $codigoEmisor = $data["codigoEmisor"] ?? throw new Exception("4014");
        $codigoReceptor = $data["codigoReceptor"] ?? throw new Exception("4014");

        ValidarCodigo($codigoEmisor);
        ValidarCodigo($codigoReceptor);

        AceptarSolicitud($codigoReceptor, $codigoEmisor);

        var_dump(DevolverEstado("4000"));
        
    }catch(Exception $Error){
        if($Error -> getCode() == 45000){
            var_dump(DevolverEstado("5000"));
        }else{
            var_dump(DevolverEstado($Error -> getMessage()));
        }

    }
}


?>