<?php
include "../includes/config.php";
include "../includes/validacion.php";

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
        ValidarCorreo($correo);
        ValidarContrasenia($contrasenia);    
    
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




?>