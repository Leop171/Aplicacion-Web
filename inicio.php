<?php
session_start();

if(!isset($_SESSION["codigoUsuario"])){
    header("Location: registro.php");
    exit();
}
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/inicio.css">
    <title>Inicio</title>
    
</head>
<body>
    
    <div class="foros">
        <h1>Tus Grupos</h1>
    </div>
    <!-- include __DIR__. "/../php/mysql.php"; --> 

    <div id="publicaciones">
        
    </div>


    <div class="enlaces"> 
        <?php include __DIR__. "/nav.php" ?>
    </div>
    
    <script src="./assets/main.js/inicio.js"></script>
</body>
</html>



