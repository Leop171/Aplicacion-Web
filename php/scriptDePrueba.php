<?php

$texto = "";
function validarTexto(&$texto){
    if(($texto) == ""){
        return $texto = null;
                
    }
    $texto = strip_tags($texto).PHP_EOL;

    if(strlen($texto) >= 200){
        echo ("Solo se permiten 200 caracteres");
    }

    return $texto;
}
validarTexto($texto);
var_dump($texto);


?>
