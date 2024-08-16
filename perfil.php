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

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/perfil.css">
    <link rel="stylesheet" href="./assets/css/nav.css">
    <title>Perfil</title>
</head>
<body>
    <div class="usuario">
        <div class="fotoUsuario">
            <img src="<?php echo ($usuarioFoto)?>" alt="Foto de Perfil" class="fotoPerfil" id="foto-perfil">
        </div>
        <form style="display: none;" id="actualizarFoto" method="post">
            <input type="file" name="enviarFoto">
            <input type="submit">
        </form>

        <div class="informacionPersonal">
            <p id="usuarioNombre"><?php echo htmlspecialchars($usuarioNombre) ?></p>
            <p id="usuarioCorreo"><?php echo htmlspecialchars($usuarioCorreo) ?></p>
            <p id="usuarioDescripcion"><?php  echo htmlspecialchars($usuarioDescripcion) ?></p>
            <p id="usuarioFecha"><p>Se unio: <?php echo htmlspecialchars($usuarioFecha)?></p>
            <p><?php echo $_SESSION["codigoUsuario"]; ?></p>
            <p id="errorCampos"></p>
        </div>

    </div>

    <div class="enlaces"> 
        <?php include __DIR__. "/nav.php" ?>
    </div>

    <script  type="module" src="./assets/main.js/perfil.js"></script>

</body>
</html>