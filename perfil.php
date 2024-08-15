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
    <link rel="stylesheet" href="assets/css/perfil.css">
    <title>Perfil</title>
</head>
<body>
    <div class="espacio-personal">
        <div class="foto-usuario">
            <img src="<?php echo ($usuarioFoto)?>" alt="Foto de Perfil" class="fotoPerfil" id="foto-perfil">
        </div>
        <form id="actualizarFoto" method="post">
            <input type="file" name="enviarFoto">
            <input type="submit">
        </form>


        </div>
        <div class="informacion-personal">
            <p id="usuario-nombre"><?php echo htmlspecialchars($usuarioNombre) ?></p>
            <p id="usuario-correo"><?php echo htmlspecialchars($usuarioCorreo) ?></p>
            <p id="usuario-descripcion"><?php  echo htmlspecialchars($usuarioDescripcion) ?></p>
            <p id="usuario-fecha"><p>Se unio: <?php echo htmlspecialchars($usuarioFecha)?></p>
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