<?php

session_start();
$codigo = $_SESSION["codigoUsuario"];
    
$obtenerUsuario = $conexion->prepare("SELECT codigo, nombre, correo, foto, descripcion, fecha FROM foro.usuario WHERE codigo = :codigo");
$obtenerUsuario->bindParam("codigo", $codigo, PDO::PARAM_STR);
$obtenerUsuario->execute();

$resultadoUsuario = $obtenerUsuario->fetch(PDO::FETCH_ASSOC);

$usuarioCodigo = $resultadoUsuario["codigo"];
$usuarioNombre = $resultadoUsuario["nombre"];
$usuarioCorreo = $resultadoUsuario["correo"];
$usuarioFoto = $resultadoUsuario["foto"];
$usuarioDescripcion = $resultadoUsuario["descripcion"];
$usuarioFecha = $resultadoUsuario["fecha"];



?>


