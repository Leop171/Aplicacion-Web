<?php
/*
header('Content-Type: application/json');

// Leer los datos JSON del cuerpo de la solicitud
$input = file_get_contents("php://input");
$data = json_decode($input, true);

if ($data) {
    $email = $data['email'] ?? 'No email';
    $password = $data['password'] ?? 'No password';

    // Aquí puedes hacer cualquier cosa con los datos, como guardarlos en una base de datos

    // Enviar una respuesta de vuelta al cliente
    echo json_encode([
        'status' => 'success',
        'message' => 'Datos recibidos correctamente',
        'email' => $email,
        'password' => $password
    ]);
} else {
    echo json_encode([
        'status' => 'error',
        'message' => 'No se recibieron datos'
    ]);
}

*/// -------------------------------------------------------------------------------------------------------



// Funcion que recibe el correo y contraseña de registro
// header('Content-Type: application/json');

// // Leer el JSON
// $input = file_get_contents("php://input");
// $datos = json_decode($input, true);

// if ($datos) {
//     $correo = $datos['correo'] ?? 'No email';
//     $contrasenia = $datos['contrasenia'] ?? 'No password';

//     // Aquí puedes hacer cualquier cosa con los datos, como guardarlos en una base de datos

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


$fecha = Date('Y/m/d');
var_dump($fecha);



// --------------------------------------------------------------------------------------------------------

// function LimpiarCampo($valor){
//     $valor = trim($valor);
//     $valor = stripslashes($valor);
//     $valor = htmlspecialchars($valor);
//     return $valor;
// }

// function LimpiarContrasenia($valor){
//     $expresionRegular = "/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[\W_]).{8,}$/";
//     $valor = trim($valor);
//     $valor = stripslashes($valor);
//     $valor = htmlspecialchars($valor);

//     if(preg_match($expresionRegular, $valor)){
//         echo "si";
//         return true;        
//     }else{
//         echo "No";
//         return false;
//     }
// }

// LimpiarContrasenia("No@9823YHDW6");

// ----------------------------------------------------------------------------------------------------------
// Ejemplo de correo
$correo = "leop123@gmail.com";
$contrasenia = "iuerhc#UY6DS8";

$nombreUsuario = "root";
$contraseniaDB = "";
$nombreServidor = "localhost";




// Conectar a la base de datos con PDO
// try{
//     $conexion = new PDO("mysql:host=$nombreServidor; dbname = foro", $nombreUsuario, $contraseniaDB);
//     $conexion -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//     echo "Conexion exitosa";
// }catch(PDOException $e){
//     echo "Error de conexion". $e -> getMessage();
// }
// -------------------------------------------------------------------------
// Buscar si el usuario no existe

// Asegurar la contraseña
// $contraseña_hash = password_hash($contrasenia, PASSWORD_BCRYPT);

// try{
//     $conexion = new PDO("mysql:host=$nombreServidor; dbname=foro", $nombreUsuario, $contraseniaDB);
//     $conexion -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//     echo "Conexion exitosa";

//     $buscarCorreo = $conexion->prepare("SELECT * FROM foro.usuario WHERE correo = :correo");
//     $buscarCorreo -> bindParam(":correo", $correo);

//     $buscarCorreo->execute();

//     if($buscarCorreo->rowCount() > 0){
//         echo "Error ya existen un usuario con ese correo";
//     }elseif($buscarCorreo->rowCount() == 0){
//         $insertarUsuario = $conexion->prepare("INSERT INTO usuario (codigo, nombre, correo, contrasenia, foto, descripcion, fecha)
//                 VALUES('12', 'Leonado1', ':correo', ':contrasenia', 'foto/foto', 'Soy el primer usuario insertado', '2024-01-01')");

//         $insertarUsuario -> bindParam(':correo', $correo);
//         $insertarUsuario -> bindParam(':contrasenia', $contrasenia);

//         $insertarUsuario -> execute();

//     }
// }catch(PDOException $error){
//     echo "No se pudo crear el usuario". $error->getMessage();
// }

// Cerrar la conexion
// $conexion = null;




?>

<nav>
    <a href="\ForoDeDiscucion\maquetado\iniciar-sesion.html">Iniciar sesion</a>
    <a href="\ForoDeDiscucion\maquetado\registro.html">Registrarse</a>
    <a href="\ForoDeDiscucion\maquetado\perfil.html">Perfil</a>
    <a href="\ForoDeDiscucion\maquetado\inicio.html">Inicio</a>
</nav>


<!-- <> -->