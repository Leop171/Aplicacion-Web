<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/nuevo_css/acceso.css">    
    <title>Document</title>
</head>
<body>
     <div class="acceder"> <!--class="registro  id="formulario1"-->
         <form class="registro" name="formulario" id="registro" method="post">  <!--id="registro" -->
            <h1>Registro</h1>
            <img src="/ForoDeDiscucion/assets/imagenes/tortuga.png" alt="">
            <br><br>
            <!-- Hace falta que valida el nombre -->
            <input type="text" name="nombre" id="nombre" placeholder="Nombre">
            <input type="email" name="correo" id="correo" placeholder="Correo">
            <input type="password" name="contrasenia" id="contrasenia" placeholder="Contraseña">
            <input type="submit" name="enviar" id="enviar">
            <p id="errorCampos"></p>
            <a href="acceso.php" id="enlace">¿Ya tienes una cuenta?</a>
            <!-- POLITICA DE PRIVACIADAD -->
        </form>
    </div>

    <script src="/ForoDeDiscucion/assets/peticiones.js/prueba.js" type="module"></script>
</body>
</html>