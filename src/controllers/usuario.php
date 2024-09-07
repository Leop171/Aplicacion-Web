<?php
// include "rutas.php";
include($_SERVER["DOCUMENT_ROOT"]. "rutas.php");
include(SRC. "/models/model_usuario.php");
include(SRC. "/includes/respuesta.php");

// use model as m;

$input = file_get_contents("php://input");
$data = json_decode($input, true);


switch($_SERVER["REQUEST_METHOD"]){
    case "POST":
        PeticionInsertarUsuario($data);
        break;
};


function PeticionInsertarUsuario($data){
    try{
        // if($_SERVER["REQUEST_METHOD"] == "POST" and $data["nombre"] and $data["codigo"]){

            InsertarUsuario($data["codigo"], $data["nombre"]);

            echo json_encode([
                'status' => 'Accediendo',
                'codigo' => 000000,
                'message' => 'Accediendo'
            ]);
            
            // echo json_encode();
    
    }catch(Exception $error){
        echo json_encode([
            'status' => 'Fallido',
            'codigo' => 100203,
            'message' => 'No se puedo realizar la accion'
        ]);
        // echo "Algo salio mal". $error -> getMessage();
    }
}


?>