<?php
include __DIR__. "/config.php";


$clave = 23;
$nombre = 'Leonaro1234';
$foto = "foto";
$descripcion = "Descripcion";
$fecha = "2024-01-01";

header('Content-Type: application/json');

// Leer los datos JSON del cuerpo de la solicitud
$input = file_get_contents("php://input");
$data = json_decode($input, true);

try{
    if ($data) {
        $correo = $data['correo'] ?? 'No correo';
        $contrasenia = $data['contrasenia'] ?? 'No contaseña';
    
        // Limpiar los valores recibidos
        if(!LimpiarCorreo($correo)){
            throw new Exception("Correo no valido");
        }
        elseif(!LimpiarContrasenia($contrasenia)){
            throw new Exception("Contrasenia poco segura");
        }    
    
        // Verificar que el correo no existe
        $buscarCorreo = $conexion->prepare("SELECT * FROM foro.usuario WHERE correo = :correo");    
        $buscarCorreo->bindParam("correo", $correo, PDO::PARAM_STR);
        $buscarCorreo->execute();
    
        if($buscarCorreo->rowCount() > 0){
            throw new Exception("El correo ya esta en uso");
        }
    
        $insertarUsuario = $conexion -> prepare("INSERT INTO foro.usuario (codigo, nombre, correo, contrasenia, foto, descripcion, fecha)
        VALUES(:clave, :nombre, :correo, :contrasenia, :foto, :descripcion, :fecha);");
    
        $insertarUsuario -> bindParam(':correo', $correo);
        $insertarUsuario -> bindParam(':contrasenia', $contrasenia);
        $insertarUsuario -> bindParam(':clave', $clave);
        $insertarUsuario -> bindParam(':nombre', $nombre);
        $insertarUsuario -> bindParam(':foto', $foto);
        $insertarUsuario -> bindParam(':descripcion', $descripcion);
        $insertarUsuario -> bindParam(':fecha', $fecha);
    
        $insertarUsuario -> execute();
        // echo "Se inserto correctamente";
        
        // Enviar una respuesta de vuelta al cliente
        echo json_encode([
        'status' => 'success',
        'message' => 'Datos recibidos correctamente',
        'correo' => $correo,
        'contrasenia' => $contrasenia
        ]);    
    }
}catch(Exception $Error){
    echo json_encode([
        'status' => 'succes',
        'message' => 'Error',
        'correo' => $Error ->getMessage(),
        'contrasenia' => $contrasenia
    ]);
}


// if ($data) {
//     $correo = $data['correo'] ?? 'No correo';
//     $contrasenia = $data['contrasenia'] ?? 'No contaseña';

//     // Limpiar los valores recibidos
//     LimpiarCorreo($correo);
//     LimpiarContrasenia($contrasenia);    

//     // Verificar que el correo no existe
//     // $buscarCorreo = $conexion->prepare("SELECT * FROM foro.usuario WHERE correo = :correo");    
//     // $buscarCorreo->bindParam("correo", $correo, PDO::PARAM_STR);
//     // $buscarCorreo->execute();

//     // if($buscarCorreo->rowCount() > 0){
//     //     $data['correo'] = "Correo en uso";
//     //     $data['contrasenia'] = "Contrasenia";        
//     // }

//     $insertarUsuario = $conexion -> prepare("INSERT INTO foro.usuario (codigo, nombre, correo, contrasenia, foto, descripcion, fecha)
//     VALUES(:clave, :nombre, :correo, :contrasenia, :foto, :descripcion, :fecha);");

//     $insertarUsuario -> bindParam(':correo', $correo);
//     $insertarUsuario -> bindParam(':contrasenia', $contrasenia);
//     $insertarUsuario -> bindParam(':clave', $clave);
//     $insertarUsuario -> bindParam(':nombre', $nombre);
//     $insertarUsuario -> bindParam(':foto', $foto);
//     $insertarUsuario -> bindParam(':descripcion', $descripcion);
//     $insertarUsuario -> bindParam(':fecha', $fecha);

//     $insertarUsuario -> execute();
//     // echo "Se inserto correctamente";
    
//     // Enviar una respuesta de vuelta al cliente
//     echo json_encode([
//         'status' => 'success',
//         'message' => 'Datos recibidos correctamente',
//         'correo' => $correo,
//         'contrasenia' => $contrasenia
//     ]);
// } else {
//     echo json_encode([
//         'status' => 'error',
//         'message' => 'No se recibieron datos'
//     ]);
// }


// Limpiar contraseña
function LimpiarContrasenia($valor){
    $expresionRegular = "/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[\W_]).{8,}$/";
    $valor = trim($valor);
    $valor = stripslashes($valor);
    $valor = htmlspecialchars($valor);

    if(preg_match($expresionRegular, $valor)){
        return true;        
    }else{
        return false;
    }
}

// Limpiar el correo 
function LimpiarCorreo($valor){
    $valor = trim($valor);
    $valor = stripslashes($valor);
    $valor = htmlspecialchars($valor);

    if(filter_var($valor, FILTER_VALIDATE_EMAIL)){
        return true;
    }else{
        return false;
    }
}



?>





