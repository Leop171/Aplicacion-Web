<?php
session_start();

if(!isset($_SESSION["codigoUsuario"])){
    header("Location: registro.php");
    exit();
}
else{
    include "src/includes/config.php";
    include "src/includes/mysql.php";
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/publicar.css">
    <title>Publicar</title>
</head>
<body>
    <div class="publicar">
        <h1>Publicar</h1>
        <form name="formularioPublicacion" id="formularioPublicacion" method="post" enctype="multipart/form-data">
            <textarea name="publicacionTexto" class="publicacionTexto"></textarea>
            <input type="file" name="publicacionArchivo" class="publicacionArchivo" value="Subir Imagen"> <!-- type="image" -->
            <p id="errorCampos"></p>
            <div id="previsualizarImagen">
                
            </div>
            <button type="submit"></button>
        </form>
    </div>


    <div class="enlaces"> 
        <?php include __DIR__. "/nav.php" ?>
    </div>

    <script type="module" src="./assets/main.js/imagen.js"></script>

</body>
</html>





