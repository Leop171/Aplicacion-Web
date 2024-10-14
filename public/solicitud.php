<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/nuevo_css/solicitud.css">
    <title>Document</title>
</head>
<body>
    <?php include __DIR__. "/_barra_superior.php" ?>

    <div class="contenedor-principal" id="contenedor-principal">
        <div class="solicitud-busqueda">

        <input type="search" name="buscar" id="busqueda-texto" placeholder="Buscar Solicitud">
        <input type="submit" id="busqueda-boton">
                
        </div>
        <p id="errorCampos"></p> 
        <div class="solicitudes" id="solicitudes">

        </div>
 
        
    </div>

    <?php include __DIR__. "/_barra_inferior.php" ?>

    <script type="module" src="/ForoDeDiscucion/assets/peticiones.js/SinFormulario.js/solicitud.js"></script>
</body>
</html>