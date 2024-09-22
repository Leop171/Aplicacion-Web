function ValidarEntrad(){

}

export const cosas = {
    "correo":Correo,
    "contrasenia":Contrasenia
}

export function Contrasenia(contrasenia){
    console.log("Funcion de la contraseña Exportada " + contrasenia );
}

export function Correo(correo){
    console.log("Funcion del correo Exportada " + correo);
}


/*
RECIBO UN ARRAY CON LOS VALORES A VALIDAR
UN BUCLE FOR RECORRER EL ARRAY PARA TODAS LAS CLAVES
EN LA PRIMERA ITERACION ENCUENTRA UNA CLAVE "CORREO"
BUSCA EN "VALIDACION.JS" EL ARRAY DEL MISMO NOMBRE Y LO EJECUTA CON EL VALOR ???


UN FUNCION QUE CONTIENE VARIOS ARRAYS
CADA ARRAY ES UNA FUNCION




*/

