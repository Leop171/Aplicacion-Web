<?php
include_once ($_SERVER["DOCUMENT_ROOT"]. "/ForoDeDiscucion/rutas.php");
include (SRC. "services/modelos.php");
// use model as m;

$input = file_get_contents("php://input");
$data = json_decode($input, true);


    switch($_SERVER["REQUEST_METHOD"]){
        case 'POST':
            CrearUsuario($data);
            break;
    };


function CrearUsuario($data){
    try{
        // if($_SERVER["REQUEST_METHOD"] == "POST" and $data["nombre"] and $data["codigo"]){

            UsuarioInsertar($data["codigo"], $data["nombre"]);

            echo json_encode([
                'status' => 'Accediendo',
                'codigo' => 000000,
                'message' => 'Accediendo'
            ]);
        //}
    }catch(Exception $error){
        echo json_encode([
            'status' => 'Fallido',
            'codigo' => 100203,
            'message' => 'No se puedo realizar la accion'
        ]);
        // echo "Algo salio mal". $error -> getMessage();
    }
}



// and $_POST["nombre"] and $_POST["codigo"]

// <>

?>