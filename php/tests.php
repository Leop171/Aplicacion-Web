<?php
// include __DIR__. "/config.php";

// //$clave = 27;
// $nombre = 'Leonaro1234';
// $foto = "foto";
// $descripcion = "Descripcion";
// $fecha = date("Y/m/d");

// $correo = "leop05945@gmail.com";
// $contrasenia = "123Efasre@#trs";

// // Leer los datos JSON del cuerpo de la solicitud

// $data = array("correo"=>$correo, "contrasenia"=>$contrasenia);

// try{
//     if ($data) {
//         $correo = $data['correo'] ?? 'No correo';
//         $contrasenia = $data['contrasenia'] ?? 'No contaseña';
    
//         // Limpiar los valores recibidos
//         if(!LimpiarCorreo($correo)){
//             throw new Exception("Correo no valido");
//         }
//         elseif(!LimpiarContrasenia($contrasenia)){
//             throw new Exception("Contrasenia poco segura");
//         }    

//         // Se crea un hash de 60 caracteres por lo que no se puede almacenar en la columna actual VARCHAR(20)
//         // $contraseniaHash = password_hash($contrasenia, PASSWORD_BCRYPT);
    
//         // Verificar que el correo no existe
//         $buscarCorreo = $conexion->prepare("SELECT * FROM foro.usuario WHERE correo = :correo");    
//         $buscarCorreo->bindParam("correo", $correo, PDO::PARAM_STR);
//         $buscarCorreo->execute();
    
//         if($buscarCorreo->rowCount() > 0){
//             throw new Exception("El correo ya esta en uso");
//         }
        
//         $insertarUsuario = $conexion -> prepare("INSERT INTO foro.usuario (nombre, correo, contrasenia, foto, descripcion, fecha)
//         VALUES(:nombre, :correo, :contrasenia, :foto, :descripcion, :fecha);");
    
//         $insertarUsuario -> bindParam(':correo', $correo);
//         $insertarUsuario -> bindParam(':contrasenia', $contrasenia, PDO::PARAM_STR);
//     //    $insertarUsuario -> bindParam(':clave', $clave);
//         $insertarUsuario -> bindParam(':nombre', $nombre);
//         $insertarUsuario -> bindParam(':foto', $foto);
//         $insertarUsuario -> bindParam(':descripcion', $descripcion);
//         $insertarUsuario -> bindParam(':fecha', $fecha);
    
//         $insertarUsuario -> execute();
//         // echo "Se inserto correctamente";

//         // Buscar nuevamente al usuario recien creado
//         $buscarUsarioCreado = $conexion->prepare("SELECT * FROM foro.usuario WHERE correo = :correo"); 
//         $buscarUsarioCreado->bindParam(':correo', $correo);
//         $buscarUsarioCreado->execute();
//         $nuevoUsuario = $buscarUsarioCreado->fetch(PDO::FETCH_ASSOC);
//         // var_dump($nuevoUsuario);
        
//         if(!$nuevoUsuario){
//             throw new Exception("No se puedo crear el usuario");
//         }
       
//         session_start();
//         // Crear la sesion con la pk del usuario creado
//         $_SESSION["codigoUsuario"] = $nuevoUsuario["codigo"];
    
//         // Enviar una respuesta de vuelta al cliente
//         echo $correo, $contrasenia;
//         // 'correo' => $correo,
//         // 'contrasenia' => $contrasenia

//         header("Location:\ForoDeDiscucion\php\prueba.php");
//         exit();
//     }
// }catch(Exception $Error){
//     echo $Error ->getMessage();
// }
  



// // Limpiar contraseña
// function LimpiarContrasenia($valor){
//     $expresionRegular = "/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[\W_]).{8,}$/";
//     $valor = trim($valor);
//     $valor = stripslashes($valor);
//     $valor = htmlspecialchars($valor);

//     if(preg_match($expresionRegular, $valor)){
//         return true;        
//     }else{
//         return false;
//     }
// }

// // Limpiar el correo 
// function LimpiarCorreo($valor){
//     $valor = trim($valor);
//     $valor = stripslashes($valor);
//     $valor = htmlspecialchars($valor);

//     if(filter_var($valor, FILTER_VALIDATE_EMAIL)){
//         return true;
//     }else{
//         return false;
//     }
// }

// -------------------------------------------------------------------------------------------------------------
// include __DIR__. "/config.php";

// //$clave = 27;
// $nombre = 'Leonaro1234';
// $foto = "foto";
// $descripcion = "Descripcion";
// $fecha = date("Y/m/d");

// $eCorreo = "leop04586@gmail.com";
// $eContrasenia = "YtasrR534@#8T";

// $data = array("correo" => $eCorreo, "contrasenia" => $eContrasenia);

// try{
//     if ($data) {
//         $correo = $data['correo'] ?? 'No correo';
//         $contrasenia = $data['contrasenia'] ?? 'No contaseña';
    
//         // Limpiar los valores recibidos
//         if(!LimpiarCorreo($correo)){
//             throw new Exception("Correo no valido");
//         }
//         elseif(!LimpiarContrasenia($contrasenia)){
//             throw new Exception("Contrasenia poco segura");
//         }    

//         // Se crea un hash de 60 caracteres por lo que no se puede almacenar en la columna actual VARCHAR(20)
//         // $contraseniaHash = password_hash($contrasenia, PASSWORD_BCRYPT);
    
//         // Verificar que el correo no existe
//         $buscarCorreo = $conexion->prepare("SELECT * FROM foro.usuario WHERE correo = :correo");    
//         $buscarCorreo->bindParam("correo", $correo, PDO::PARAM_STR);
//         $buscarCorreo->execute();
    
//         if($buscarCorreo->rowCount() > 0){
//             throw new Exception("El correo ya esta en uso");
//         }
        
//         $insertarUsuario = $conexion -> prepare("INSERT INTO foro.usuario (nombre, correo, contrasenia, foto, descripcion, fecha)
//         VALUES(:nombre, :correo, :contrasenia, :foto, :descripcion, :fecha);");
    
//         $insertarUsuario -> bindParam(':correo', $correo);
//         $insertarUsuario -> bindParam(':contrasenia', $contrasenia, PDO::PARAM_STR);
//     //    $insertarUsuario -> bindParam(':clave', $clave);
//         $insertarUsuario -> bindParam(':nombre', $nombre);
//         $insertarUsuario -> bindParam(':foto', $foto);
//         $insertarUsuario -> bindParam(':descripcion', $descripcion);
//         $insertarUsuario -> bindParam(':fecha', $fecha);
    
//         $insertarUsuario -> execute();
//         // echo "Se inserto correctamente";

//         // Buscar nuevamente al usuario recien creado
//         $buscarUsarioCreado = $conexion->prepare("SELECT * FROM foro.usuario WHERE correo = :correo"); 
//         $buscarUsarioCreado->bindParam(':correo', $correo);
//         $buscarUsarioCreado->execute();
//         $nuevoUsuario = $buscarUsarioCreado->fetch(PDO::FETCH_ASSOC);
        
//         if(!$nuevoUsuario){
//             throw new Exception("No se puedo crear el usuario");
//         }
       
//         if(!session_start() or !$_SESSION["codigoUsuario"] = $nuevoUsuario["codigo"]){
//             throw new Exception("No se pudo crear la sesion");
//         }
//         // Crear la sesion con la pk del usuario creado
        
    
//         // Enviar una respuesta de vuelta al cliente
//         echo json_encode([
//         'status' => 'success',
//         'message' => 'Datos recibidos correctamente'
//         // 'correo' => $correo,
//         // 'contrasenia' => $contrasenia
//         ]);    

//         if(session_start()){
//             header("Location:\ForoDeDiscucion\php\prueba.php");
//             exit();
//         }else{
//             throw new Exception("No se pudo redirigir");
//         }
    
//     }
// }catch(Exception $Error){
//     echo json_encode([
//         'status' => 'succes',
//         'message' => 'Error',
//         'correo' => $Error ->getMessage(),
//         'contrasenia' => $contrasenia
//     ]);
// }

// ---------------------------------------------------------------------------------------------------------------

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
// function LimpiarContrasenia($valor){
//     $expresionRegular = "/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[\W_]).{8,}$/";
//     $valor = trim($valor);
//     $valor = stripslashes($valor);
//     $valor = htmlspecialchars($valor);

//     if(preg_match($expresionRegular, $valor)){
//         return true;        
//     }else{
//         return false;
//     }
// }

// // Limpiar el correo 
// function LimpiarCorreo($valor){
//     $valor = trim($valor);
//     $valor = stripslashes($valor);
//     $valor = htmlspecialchars($valor);

//     if(filter_var($valor, FILTER_VALIDATE_EMAIL)){
//         return true;
//     }else{
//         return false;
//     }
// }

// --------------------------------------------------------------------------------------------------------------
// if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//     $text = $_POST["publicacionTexto"];
//     // $imagen = $_POST["publicacionArchivo"];
//     $imagen = $_FILES["publicacionArchivo"];

//     $valores = array();

//     $valores[0] = $text;
//     $valores[1] = $imagen;

//     $carpeta = "./imagenes/";
//     $ubicacionFinal = $carpeta. $imagen["name"];

//     $rutaCarpeta = dirname(__FILE__). "\imagenes";

//     $rutafinal = str_replace('\\', '/', $rutaCarpeta). "/". trim(strtolower($imagen["name"]));
    
//     if(move_uploaded_file($imagen["tmp_name"], $ubicacionFinal)){
//         // var_dump($valores);
//         echo $rutafinal. " Impresion PHP";
//     }else{
//         echo "Error";
//     }
    
//     // echo $text;
//     // echo $imagen;
// }

// ------------------------------------------------------------------------------------------------------------

// if($_SERVER["REQUEST_METHOD"] == "POST"){
//     // $imagen = ($_REQUEST["publicacionArchivo"]);
//     var_dump($_POST["publicacionTexto"]);
//     var_dump($_POST["data"]);
    
// }

// var_dump($_POST);


// echo $input["data"];
// echo $data;
// var_dump($data);


/// ------------------------------------------------------------------------------------------------------
/* VALIDAR LA EXTENSION DE UN ARCHIVO
// $imagenExtension = ".pdf";
$imagen = "lala.pdf";

$imagenExtension = strtolower(pathinfo($imagen, PATHINFO_EXTENSION));

echo $imagenExtension;

$extensionPermitida = "/jpg|jpeg|jfif|png/";

    if(!preg_match($extensionPermitida, $imagenExtension)){
        echo "Solo se permite .jpg, .jpeg, .jfif, .png";
    }else{
        echo "Imagen permitida";
    }
*/// ----------------------------------------------------------------------------------------------------

// --------------------------------------------------------------------------------------------------

include __DIR__. "/config.php";
include __DIR__. "/mysql.php";


// Extraer las publicaciones de la base de datos
try{
    $publicaciones = "SELECT * FROM foro.publicacion LIMIT 10";
    // // codigo, fecha, tema, usuario_codigo, etiqueta_codigo
    // $publicaciones -> execute();
    $resultado = $conexion -> prepare($publicaciones, array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));

    $resultado -> execute();    

    $datos = array();

    // $fila = $resultado ->fetch();

    while($fila = $resultado -> fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_NEXT)){
        array_push($datos, $fila);
    }
    // var_dump($datos);

    
    // $resultado = $publicaciones->fetch(PDO::FETCH_ASSOC);

    echo json_encode([ // echo json_encode
        $datos
    ]);

}catch(Exception $e){
    echo json_encode([
        "status" => "Error",
        "Message" =>  $e -> getMessage() 
    ]);
}


?>