<?php
session_start();

if(!isset($_SESSION["codigoUsuario"])){
    header("Location: registro.html");
    exit();
}
else{
    include __DIR__. '/../php/config.php';
    include __DIR__. "/../php/mysql.php";
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Prueba</title>
</head>
<body>
    <form name="formularioPublicacion" id="formularioPublicacion" method="post" enctype="multipart/form-data">
        <input type="text" name="publicacionTexto">
        <input type="file" name="publicacionArchivo">
        <p id="errorCampos"></p>
        <div id="previsualizarImagen">
        <p><?php echo $_SESSION["codigoUsuario"] ?></p>
            
        </div>
        <button type="submit"></button>
    </form>
    <script src="/ForoDeDiscucion/validacionJS/validarImagen.js"></script>

</body>
</html>


