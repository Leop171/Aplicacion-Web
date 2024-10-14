<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/nuevo_css/amigos.css">
    <title>Document</title>
</head>
<body>
    <?php include __DIR__. "/_barra_superior.php" ?>    
    <div class="contenedor-principal" id="contenedor-principal">
       <div class="busqueda">
            <input type="search" name="buscar" id="busqueda-amigo" placeholder="Buscar Amigo">
            <input type="submit" id="busqueda-boton" value="Buscar">
        </div>

        <p id="errorCampos"></p>
        <div class="amigos" id="amigos">

        </div>    
    </div>

    
    <?php include __DIR__. "/_barra_inferior.php" ?>

    <script type="module" src="/ForoDeDiscucion/assets/peticiones.js/SinFormulario.js/amigo.js"></script>
</body>
</html>