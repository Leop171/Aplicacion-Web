<?php

$texto = "Ahora si <div></div>";

function validarTexto($texto){

$texto = strip_tags($texto).PHP_EOL;

if(strlen($texto) >= 20){
     echo("Solo se permiten 20 caracteres");
}

echo $texto;
}

validarTexto($texto);

?>
