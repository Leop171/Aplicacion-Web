<?php
/*
ESTE ARCHIVO CONTIENE LA FUNCION QUE DEBE SER LLAMADA EN CADA RESPUESTA PERSONALIZADA DEL SERVIDOR
EL PRIMER PARAMETRO ES EL CODGIO DE RESPUESTA QUE SE DEBE ENVIAR (OBLIGATORIO)
EL SEGUNDO PARAMETRO DEBE SER UN ARRAY CON LA DATA ADJUNTA EN LA RESPUESTA (OPCIONAL)

LA FUNCION SE DEBE LLAMAR CADA VEZ QUE EL SERVIDOR ENVIA DATA O LANZA UN ERROR

*/

// echo json_encode(DevolverEstado("4000", array("clave" => "valor"))); ASI ES COMO SE DEBE LLAMAR LA FUNCION DESDE UN CONTROLADOR

function DevolverEstado($codigo, $data=NULL){
    // ESTA MATRIZ GUARDA LA RESPUESTA COMPLETA DEL SERVIDOR
    // $respuesta = array("estado" => NULL, "data" => NULL);
    $respuesta = array(/*=> array()*/);


    $estado = array(
        "4000" => array (
            "estado" => true,
            "codigo" => "4000",
            "mensaje" => "Completado"
        ),
        "4001" => array (
            "estado" => false,
            "codigo" => 4001,
            "mensaje" => "Correo en uso",
            "data"=> NULL
        ),
        "4002" => array(
            "estado" => false,
            "codigo" => 4002,
            "mensaje" => "Nombre en uso"
        ),
        "4003" => array(
            "estado" => false,
            "codigo" => 4003,
            "mensaje" => "Correo no valido"
        ),
        "4004" => array(
            "estado" => false,
            "codigo" => 4004,
            "mensaje" => "Contrase\u00d1a debe contener al menos 8 caracteres, 1 mayuscula, 1 numero y 1 signo"
        ),
        "4005" => array(
            "estado" => false,
            "codigo" => 4005,
            "mensaje" => "Correo no encontrado"
        ),
        "4006" => array(
            "estado" => false,
            "codigo" => 4006,
            "mensaje" => "Contraseña incorrecta"
        ),
        "4007" => array(
            "estado" => false,
            "codigo" => 4007,
            "mensaje" => "Maximo permitido de 200 caracteres "
        ),
        "4008" => array(
            "estado" => false,
            "codigo" => 4008,
            "mensaje" => "Solo se permiten archivos .jpg, .jpeg, .jfif, .png"
        ),
        "4009" => array(
            "estado" => false,
            "codigo" => 4009,
            "mensaje" => "El archivo pesa mas de 4mb"
        ),
        "4010" => array(
            "estado" => false,
            "codigo" => 4010,
            "mensaje" => "Nombre de usuario solo debe contener letras o numeros, no debe contener mas de 20 caracteres"
        ),
        "4011" => array(
            "estado" => false,
            "codigo" => 4011,
            "mensaje" => "No hay concidencias"
        ),
        "4012" => array(
            "estado" => false,
            "codigo" => 4012,
            "mensaje" => "Nombre no puede estar vacio"
        ),
        "4013" => array(
            "estado" => false,
            "codigo" => 4013,
            "mensaje" => "Publicacion no existe"
        ),
        "4014" => array(
            "estado" => false,
            "codigo" => 4014,
            "mensaje" => "Usuario no valido"
        ),

        "4015" => array(
            "estado" => false,
            "codigo" => 4014,
            "mensaje" => "Erro de prueba"
        ),
        "4016" => array(
            "estado" => false,
            "codigo" => 4016,
            "mensaje" => "Nombre de usuario no debe contener mas 20 caracteres"
        ),
        "4017" => array(
            "estado" => false,
            "codigo" => 4017,
            "mensaje" => "Inicia session para realizar esta accion"
        ),



        "5000" => array(
            "estado" => false,
            "codigo" => 1003,
            "mensaje" => "Algo salio mal, recarga la pagina y vuelve a intentarlo",
            "data"=>"Un codigo 5000.."
        )
    );    

    if(!array_key_exists($codigo, $estado)){
        $codigo = "5000"; // c500
    }

    // $respuesta[] = $estado[$codigo]; // SI CARGAR EL ESTADO DE FORMA CORRECTA
    // $respuesta[] = $data;
    // $respuesta[] = $data;
    // $respuesta[] = $data;
    array_push($respuesta, $estado[$codigo]);
    array_push($respuesta, $data);

    // return ($estado[$codigo]);
    return $respuesta;

    // CARGAR LA DATA EN UN ARRAY DE RESPUESTA
    // $respuesta["estado"] = $estado[$codigo];
    // $respuesta["data"] = $data;

    // return $respuesta;

}



?>