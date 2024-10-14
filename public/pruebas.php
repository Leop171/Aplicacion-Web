<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="get" id="otro" class="envio" name="envio">
        <input type="text" name="nombre" id="nombre">
        <input type="text" name="nombre" id="apellido">
        <input type="submit" name="nombre">
    </form>
    <p><?php session_start(); var_dump($_SESSION["__usuario_codigo"])?></p>
   
    <script type="module" src="../assets/peticiones.js/nuevaPrueba.js"></script>
    
</body>
</html>