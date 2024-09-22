export function DevolverRespuesta(codigo){
    const respuesta = {
        "1000":"Completado",
        "1001":"Correo un uso",
        "1002":"Nombre en uso",
        "1003":"Correo en uso",
        "1004":"Contraseña debe contener al menos 8 caracterees, 1 mayuscula, 1 numero y 1 signo",
        "1005":"Corre no registrado",
        "1006":"Contraseña incorrecta",
        "1007":"Maximo permitido de 200 caracteres",
        "1008":"Solo se permiten archivos .jpg, .jpeg, .jfif, .png",
        "1009":"El archivo pesa mas de 4mb",
        "1010":"Nombre debe contener almenos 1 letra y 1 numero",
        "1011":"No hay concidencias",
        "1012":"Nombre no puede estar vacio",
        "1013":"Publicacion ya no existe",
        "1014":"Usuario no valido",
        "1015":"Error de prueba",
        "1016":"Nombre de usuario no debe contener mas de 200 caracteres",

        "2000":"Error, vuelve a intentarlo"
    }

    if(codigo in respuesta){
        return respuesta[codigo];
    }

    return console.log("No hay codigo");

}

// DevolverRespuesta("1003");


