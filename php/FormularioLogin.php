<?php
include __DIR__. "/config.php";
session_start();

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
            throw new Exception("Correo no valido php");
        }
        elseif(!LimpiarContrasenia($contrasenia)){
            throw new Exception("Contrasenia poco segura php");
        }    
    
        // Verificar que el correo ya esta registrado
        $buscarCorreo = $conexion->prepare("SELECT * FROM RedSocial.usuario WHERE correo = :correo");    
        $buscarCorreo->bindParam("correo", $correo, PDO::PARAM_STR);
        $buscarCorreo->execute();
    
        $resultado = $buscarCorreo->fetch(PDO::FETCH_ASSOC);

        if(!$resultado){
            throw new Exception("Correo no encontrado");
        }else{
            if(!password_verify($contrasenia, $resultado["contrasenia"])){
                throw new Exception("Contraseña Incorrecta");
            }else{
                $_SESSION["codigoUsuario"] = $resultado["codigo"];
            }
        }
            
        header('Content-Type: application/json');

        echo json_encode([
            'status' => 'Accediendo',
            'message' => 'Accediendo'
        ]);

        exit();

    }
}catch(Exception $Error){
    echo json_encode([
        'status' => 'Error',
        'message' => $Error ->getMessage()
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