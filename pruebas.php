<?php
// try{

//     $ruta = "iniciono.php";

//     if($ruta[0] == "@" & strlen($ruta) <= 12){
//         ValidarUsuario($ruta);
//     }else{
//         ValidarRuta($ruta);
//     }

// }catch(Exception $Error){
//     echo "Error : ". $Error ->getMessage();
// }

// function ValidarUsuario($ruta){
//     $nombreUsuario = substr($ruta, 1);

//     $caracteresValidos = array("_", ".");

//     if(ctype_alnum(str_replace($caracteresValidos, "", $nombreUsuario))){
//         echo "Buscando en la BD";
//         return;
//     }

//     // BUSCAR AL USUARIO EN LA BD
//     echo "Error 404";
//     return;
// }

// function ValidarRuta($ruta){
//     $rutasPermitidas = array("acceder.php", "buscar.php", "inicio.php", "perfil.php", "publicar.php", "registro.php");

//     $caracteresValidos = array("_", ".");

//     if(ctype_alpha(str_replace($caracteresValidos, "", $ruta))){
//         if(in_array($ruta, $rutasPermitidas, true)){
//             echo "Si es una ruta fija valida";
//             return;
//         }
//     }    

//     echo "Error 404";

// }

// EJECUTAR UN BLOQUE TRY CATCH Y EN CASO DE ERROR CATCH DEVUELVE UN ARRAY
function DevloverEstado($codigo){

    $estado = array(
        "c200" => array (
            "estado" => true,
            "codigo" => 200,
            "mensaje" => "Completado"
        ),
        "c300" => array(
            "estado" => false,
            "codigo" => 400,
            "mensaje" => "No fue completado"
        ),
        "c400" => array(
            "estado" => false,
            "codigo" => 401,
            "mensaje" => "Tampoco fue compleatdo"
        ),
        "c500" => array(
            "estado" => false,
            "codigo" => 500,
            "mensaje" => "Error General"
        )
    );    

    if(!array_key_exists($codigo, $estado)){
        $codigo = "c500";
    }

    return($estado[$codigo]);

}

// var_dump(DevloverEstado("c670"));

// var_dump(DevloverEstado("c200"));

// var_dump($estado["c200"]);

function ExecPrueba($var1, $var2){
    try{
        // $respuesta = array();
        
        if($var1 == $var2){
            throw new Exception("c200");
        }

        return true;
    }catch(Exception $Error){
        var_dump(DevloverEstado($Error -> getMessage()));
        /*
        var_dump(array("codigo" => $Error->getCode(),
                "status" => false,
                "respuesta"=> $Error->getMessage()));
        */
    }

}

// echo ExecPrueba(1, 1);

function controlPrueba($var1, $var2){
    ExecPrueba($var1, $var2);
}

// controlPrueba(1, 1);




//     $var1 = 1;
//     $var2 = 1;

$valores = array(
    "codigo" => "   ",
    "nombre" => "cambioNombre",
    "descripcion" => "Nueva descripcion",
    "direccion" => "direccion/imagen/perfil"
);

// Asegurar que un array contenga todas las claves y valores correspondientes

// Evaluar que la solicitud contenga la cantidad de parametros solicitados por el modelo
// Si un valor esta vacio igualarlo a null

function ValidarArray(&$valores, $cantidad){
    if(!count($valores) == $cantidad){
        return "No envio la cantidad correcta de parametros";
    }

    foreach($valores as $clave => $valor){
        if(trim($valor) == ""){
            $valor = null;
        }
    }

    var_dump($valores);
}

ValidarArray($valores, 4);
// var_dump($valores);

// $espacio = "   ";
// if(trim($espacio) == ""){
//     echo "Trim si funciona";
// }else{
//     echo "Trim no funciona";
// }

// foreach($valores as $clave => $valor){
//     echo $clave. " : ". $valor. " , ";
// }

// if(!count($valores) == 4){
//     echo "No se envio la cantidad de parametros correcta";
// }else{
//     echo "Si se envio la cantidad de parametros correcta";
// }

// Si la variable esta vacia devolver un mensaje
$data = array("nombre" => "name");

$nombre = trim($data["nombre"] == "") ?? NULL;

echo $nombre;


// <>

?>