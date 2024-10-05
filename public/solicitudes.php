<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/nuevo_css/solicitud.css">
    <title>Document</title>
</head>
<body>
    <?php include __DIR__. "/_barra_superior.php" ?>

    <div class="solicitudes">
        <div class="solicitud-busqueda">

        <input type="search" name="buscar" id="busqueda-texto" placeholder="Buscar Solicitud">
        <input type="submit" id="busqueda-boton">
                
        </div>
        <div id="solicitud">
                <img id="imagen" src="/ForoDeDiscucion/assets/imagenes/usuario.png" alt="imagen solicitud">
                <p id="usuario-nombre">Usuario Nombre</p>
                <!-- <p id="fecha">30/09/2024</p> -->
                <input type="submit" value="Aceptar" class="botones" id="aceptar">
                <input type="submit" value="Rechazar" class="botones" id="rechazar">
                        
        </div>
    </div>

    <?php include __DIR__. "/_barra_inferior.php" ?>

</body>
</html>