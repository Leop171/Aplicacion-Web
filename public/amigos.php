<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/nuevo_css/amigos.css">
    <title>Document</title>
</head>
<body>
    <?php include __DIR__. "/_barra_superior.php" ?>
    <div class="amigos">
        <div class="busqueda">
        <input type="search" name="buscar" id="busqueda-amigo" placeholder="Buscar Amigo">
        <input type="submit" id="busqueda-boton" value="Buscar">
        </div>

        <div id="amigo">
            <img src="/ForoDeDiscucion/assets/imagenes/usuario.png" alt="imagen usuario" id="imagen">
            <p id="usuario-nombre">Nombre Usuario</p>
            <input type="submit" value="Eliminar" id="boton-eliminar">

        </div>

    </div>    

    <?php include __DIR__. "/_barra_inferior.php" ?>
</body>
</html>