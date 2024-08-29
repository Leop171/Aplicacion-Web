<?php
$direccion = "../../uploads/imagen_perfil/Leonardo/1723751197LicenciaSQL.jfif";
$usuarioCodigo = 4;

while($usuarioCodigo <= 6);{
    echo ("'INSERT INTO imagen_usuario (direccion, usuario_codigo) VALUES ('$direccion', '$usuarioCodigo')'");
    $usuarioCodigo = +1;
}

// <>

?>