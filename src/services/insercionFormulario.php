<?php
include "../includes/config.php";
include "../includes/validacion.php";

//$clave = 27;
$nombre = 'Leonardo';
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
        ValidarCorreo($correo);
        ValidarContrasenia($contrasenia);

        // Se crea un hash de 60 caracteres por lo que no se puede almacenar en la columna actual VARCHAR(20)
        $contraseniaHash = password_hash($contrasenia, PASSWORD_BCRYPT);
    
        // Verificar que el correo no existe
        $buscarCorreo = $conexion->prepare("SELECT * FROM RedSocial.usuario WHERE correo = :correo");    
        $buscarCorreo->bindParam("correo", $correo, PDO::PARAM_STR);
        $buscarCorreo->execute();
    
        if($buscarCorreo->rowCount() > 0){
            throw new Exception("El correo ya esta en uso");
        }
        
        $insertarUsuario = $conexion -> prepare("INSERT INTO RedSocial.usuario (nombre, correo, contrasenia, descripcion, fecha)
        VALUES(:nombre, :correo, :contrasenia, :descripcion, :fecha);");
    
        $insertarUsuario -> bindParam(':correo', $correo);
        $insertarUsuario -> bindParam(':contrasenia', $contraseniaHash,);
        $insertarUsuario -> bindParam(':nombre', $nombre);
        $insertarUsuario -> bindParam(':descripcion', $descripcion);
        $insertarUsuario -> bindParam(':fecha', $fecha);
    
        $insertarUsuario -> execute();
        // echo "Se inserto correctamente";

        // Insertar su foto de perfil 
        $direccion = "../../uploads/imagen_perfil/default/icono-usuario.png";
        $ultimoCodigoUsuario = $conexion->lastInsertId();

        $insertImagenPerfil = $conexion -> prepare("INSERT INTO RedSocial.imagen_usuario (direccion, usuario_codigo) VALUES(:direccion, :usuario_codigo)");

        $insertImagenPerfil -> bindParam(':direccion', $direccion);
        $insertImagenPerfil -> bindParam(':usuario_codigo', $ultimoCodigoUsuario);
        $insertImagenPerfil -> execute();


        // Buscar nuevamente al usuario recien creado
        $buscarUsarioCreado = $conexion->prepare("SELECT * FROM RedSocial.usuario WHERE correo = :correo"); 
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






?>





