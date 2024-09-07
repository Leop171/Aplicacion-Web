<?php



// CAMBIE EL NOMBRE DE LA BASE DE DATOS MOMENTANEAMENTE
// DEBO REGRESARLO A: dbname = RedSocial
try{
    function Conexion(){
        $nombreUsuario = "root";
        $contraseniaDB = "";
        $nombreServidor = "localhost";

        $conexion = new PDO("mysql:host=$nombreServidor; dbname=RedSocial", $nombreUsuario, $contraseniaDB);
        $conexion -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conexion;
    }
//    echo "Conexion exitosa";

}catch(PDOException $error){
//    echo "Algo salio mal ". $error -> getMessage(); 
}

// SIMEPRE DESPUES DE HACER UNA COSULTA SE DEBE CERRAR LA CONEXION CON LA BASE DE DATOS!



?>