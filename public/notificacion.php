<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/nuevo_css/notificacion.css">
    <title>Document</title>
</head>
<body>
    <?php include __DIR__. "/_barra_superior.php" ?>
    <div class="contenedor-principla" id="contenedor-principal">
        <div class="busqueda">

        <input type="search" name="buscar" id="busqueda-texto" placeholder="Buscar Notificacion">
        <input type="submit" id="busqueda-boton">
        
        </div>        
        <p id="errorCampos"></p>            
        
        <div class="notificaciones" id="notificaciones">
            <!-- <div id="notificacion"> -->
            <!-- <p id="mensaje-vacio">Cuando tengas una notificacion aparecera aqui</p> -->            
            <!-- <img id="imagen" src="/ForoDeDiscucion/assets/imagenes/usuario.png" alt="imagen notificacion">
            <p id="usuario-nombre">Usuario Nombre</p>
            <p id="fecha">30/09/2024</p> -->                            
            <!-- </div> -->
        </div>
        
    </div>
    <?php include __DIR__. "/_barra_inferior.php" ?>

    <script type="module" src="/ForoDeDiscucion/assets/peticiones.js/SinFormulario.js/notificacion.js"></script>
</body>
</html>