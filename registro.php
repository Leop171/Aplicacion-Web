<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/sesion.css">
    <title>Registrate</title>

</head>
<body>
    <div class="formularioEnvio"> 
         <form  id="formularioRegistro" class="registrarse" method="post">
            <h1>Registrate</h1>
            <input type="" name="correo" id="correo" required>
            <p id="errorCorreo"></p>
            <input type="password" name="contrasenia" id="contrasenia" required>   
            <p id="errorContrasenia"></p>
            <input type="submit" id="enviar">
            <p id="errorCampos"></p>
        </form>
        
    </div> 

    <div class="enlaces"> 
        <?php include __DIR__. "/nav.php" ?>
    </div>
    

    <!-- <script src="/ForoDeDiscucion/validacionJS/validarFormulario.js"></script> -->
    <script  type="module" src="./assets/main.js/pruebas.js"></script>
    
</body>
</html>


