<?php
// include __DIR__. "/config.php";

header('Content-Type: application/json');

// Leer los datos JSON del cuerpo de la solicitud
$input = file_get_contents("php://input");
$data = json_decode($input, true);

if ($data) {
    $correo = $data['correo'] ?? 'No correo';
    $contrasenia = $data['contrasenia'] ?? 'No contaseña';

    // Limpiar los valores recibidos
    LimpiarCorreo($correo);
    LimpiarContrasenia($contrasenia);    

        
    // Enviar una respuesta de vuelta al cliente
    echo json_encode([
        'status' => 'success',
        'message' => 'Datos recibidos correctamente',
        'correo' => $correo,
        'contrasenia' => $contrasenia
    ]);
} else {
    echo json_encode([
        'status' => 'error',
        'message' => 'No se recibieron datos'
    ]);
}




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





