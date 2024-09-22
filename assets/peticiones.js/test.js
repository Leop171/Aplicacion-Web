// Debe recibir un array clave/valor con 1 o mas elementos, buscar si las claves son claves del array "things",
// de ser asi ejecutar la funcion que que es valor de la clave que se encontro 

/*
Una funcion que reciba un array clave/valor con 1 o mas elementos
Se cuenta con un array llamado "things" que contiene 8 elementos clave/valor
La funcion debe buscar el clave de cada elementos en el las claves del array "things", si la clave es encontrada
ejecutar la funcion de la clave con el valor recibido

*/
function Contrasenia(contrasenia){
    console.log("Funcion de la contraseña Exportada " + contrasenia );
}

function Correo(correo){
    console.log("Funcion del correo Exportada " + correo);
}


const cosas = {
    "correo":Correo,
    "contrasenia":Contrasenia
}

const data = {
    "correo":"prueba@gmail.com",
    "contrasenia":"contrasenia123"
}

// if("correo" in cosas){
//     console.log(cosas["correo"]);
// }



// for(let dato  in data){
//     evaluar = dato;
//     validaciones(dato, data[dato]);
    
//     console.log(dato);
//     console.log(data[dato]);

// }

// ENVIAR LA CLAVE Y LOS PARAMETROS

// clave = "correo"
// valor = correo@gmail.com

// function validaciones(clave, valor){
//     switch(clave){
//         case "correo":
//             source(valor);
//     }

// }


// function source(correo){
//     console.log("Correo!!!!!");
// }

    

// for(let clave in data){
//     console.log(clave);
//     //if(clave in data){
//       //  console.log(data[clave]);
//     //}
// }


// for(let clave in data){
//     console.log(clave);
//     //if(clave in data){
//       //  console.log(data[clave]);
//     //}
// }




// const cosas = {
//     "correo":Correo(),
//     "contrasenia": Contrasenia()
// };

// const peticion = {};
//       data.forEach((key) => {
//         console.log(key);
//         // peticion[key] = key;      
//        });

       // console.log(peticion);

// Validar que el codigo de usuario se una session correcta
function ValidarCodigo(codigo){

    if(!Number.isInteger(codigo)){
        throw("4014");
    }

    return true;
  
}

ValidarCodigo(-1);


function ValidarCorreo(correo){

    let regCorreo =  /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
  
    if(!regCorreo.test(correo)){
      console.log("Correo no valido JS");
    }
  
    console.log("Fin de la funciona");
  }

  
function ValidarContrasenia(contrasenia){

    let regContrasenia = /^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[\W_]).{8,}$/;
  
    if(!regContrasenia.test(contrasenia)){
      console.log("Contraseña debe contener al menos 1 numero, 1 simbolo y 1 mayuscula JS");
    }
  
    console.log("Fin de la funcion " + contrasenia);
  }

// console.log(cosas["correo"])
// console.log(cosas["correo"]);

function RecibirArray(_data){




}


// <>

