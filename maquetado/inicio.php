<?php
session_start();

if(!isset($_SESSION["codigoUsuario"])){
    header("Location: registro.html");
    exit();
}


?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="\ForoDeDiscucion\estilos\estilos.inicio.css">
    <title>Inicio</title>
    
</head>
<body>
    
    <div class="foros">
        <h1>Tus Foros</h1>
    </div>
    <!-- include __DIR__. "/../php/mysql.php"; --> 

    <div id="publicaciones">

    </div>


    <!-- <div class="oublicacion">
        <div class="publicacionEncabezado">
            <img src="" alt="" id="foto">
            <p id="nombre"></p>
            <p id="fecha"></p>      
        </div>
        <div class="publicacionCuerpo">
            <p id="texto"></p>
        </div>
        <div class="publicacionPie">
            <input type="submit" value="Like">
            <input type="submit" value="dislike">
            <input type="submit" value="Estrella">
            <input type="submit" value="Respuestas">
        </div>
    </div> -->


    
    <nav>
        <a href="\ForoDeDiscucion\maquetado\iniciar-sesion.html">Iniciar sesion</a>
        <a href="\ForoDeDiscucion\maquetado\registro.html">Registrarse</a>
        <a href="\ForoDeDiscucion\maquetado\perfil.php">Perfil</a>
        <a href="\ForoDeDiscucion\maquetado\inicio.php">Inicio</a>
    </nav>

    <!-- EJEMPLO DE UN COMENTARIO  -->
    <!-- <div class="comentario">
        <div class="usuario">
            <img src="" alt="Usuario.png">
            <p class="NombreUsuario">NombreUsuario</p>
            <div class="texto">
                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Ipsum maiores nulla praesentium omnis 
                    perspiciatis, aperiam accusantium, hic, inventore aut pariatur voluptatem ducimus voluptatibus reprehenderit soluta assumenda doloribus sequi fugit accusamus.</p>
            </div>
            <div class="reacciones">
                <input type="submit" value="Like">
                <input type="submit" value="dislike">
                <input type="submit" value="Estrella">
                <input type="submit" value="Respuestas">
            </div>
        </div>
    </div> -->
    
    <script src="/ForoDeDiscucion/validacionJS/inicio.js"></script>
</body>
</html>



