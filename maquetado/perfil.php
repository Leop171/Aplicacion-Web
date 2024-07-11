<?php
session_start();

if(!isset($_SESSION["codigoUsuario"])){
    header("Location: registro.html");
    exit();
}
else{
    include __DIR__. "\config.php";
}
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="\ForoDeDiscucion\estilos\estilos-perfil.css">
    <title>Perfil</title>
</head>
<body>
    <div class="espacio-personal">
        <div class="foto-usuario">
            <img src="" alt="Foto de Perfil">
        </div>
        <div class="informacion-personal">
            <p id="usuario-nombre"></p>
            <p id="usuario-correo"></p>
            <p id="usuario-fecha"></p>

        </div>

    </div>    

    <nav>
        <a href="\ForoDeDiscucion\maquetado\iniciar-sesion.html">Iniciar sesion</a>
        <a href="\ForoDeDiscucion\maquetado\registro.html">Registrarse</a>
        <a href="\ForoDeDiscucion\maquetado\perfil.html">Perfil</a>
        <a href="\ForoDeDiscucion\maquetado\inicio.html">Inicio</a>
    </nav>

</body>
</html>