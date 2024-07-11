<?php
include __DIR__. "/config.php";

//$clave = 27;
$nombre = 'Leonaro1234';
$foto = "foto";
$descripcion = "Descripcion";
$fecha = date("Y/m/d");

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

        // Se crea un hash de 60 caracteres por lo que no se puede almacenar en la columna actual VARCHAR(20)
        // $contraseniaHash = password_hash($contrasenia, PASSWORD_BCRYPT);
    
        // Verificar que el correo no existe
        $buscarCorreo = $conexion->prepare("SELECT * FROM foro.usuario WHERE correo = :correo");    
        $buscarCorreo->bindParam("correo", $correo, PDO::PARAM_STR);
        $buscarCorreo->execute();
    
        if($buscarCorreo->rowCount() > 0){
            throw new Exception("El correo ya esta en uso");
        }
        
        $insertarUsuario = $conexion -> prepare("INSERT INTO foro.usuario (nombre, correo, contrasenia, foto, descripcion, fecha)
        VALUES(:nombre, :correo, :contrasenia, :foto, :descripcion, :fecha);");
    
        $insertarUsuario -> bindParam(':correo', $correo);
        $insertarUsuario -> bindParam(':contrasenia', $contrasenia, PDO::PARAM_STR);
    //    $insertarUsuario -> bindParam(':clave', $clave);
        $insertarUsuario -> bindParam(':nombre', $nombre);
        $insertarUsuario -> bindParam(':foto', $foto);
        $insertarUsuario -> bindParam(':descripcion', $descripcion);
        $insertarUsuario -> bindParam(':fecha', $fecha);
    
        $insertarUsuario -> execute();
        // echo "Se inserto correctamente";

        // Buscar nuevamente al usuario recien creado
        $buscarUsarioCreado = $conexion->prepare("SELECT * FROM foro.usuario WHERE correo = :correo"); 
        $buscarUsarioCreado->bindParam(':correo', $correo);
        $buscarUsarioCreado->execute();
        $nuevoUsuario = $buscarUsarioCreado->fetch(PDO::FETCH_ASSOC);
        
        if(!$nuevoUsuario){
            throw new Exception("No se puedo crear el usuario");
        }
       
        session_start();
        // Crear la sesion con la pk del usuario creado
        $_SESSION["codigoUsuario"] = $nuevoUsuario["codigo"];
        
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


// header("Location:\ForoDeDiscucion\maquetado\perfil.html");
// exit();

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





