// Debe recibir un array clave/valor con 1 o mas elementos, buscar si las claves son claves del array "things",
// de ser asi ejecutar la funcion que que es valor de la clave que se encontro 

/*
Una funcion que reciba un array clave/valor con 1 o mas elementos
Se cuenta con un array llamado "things" que contiene 8 elementos clave/valor
La funcion debe buscar el clave de cada elementos en el las claves del array "things", si la clave es encontrada
ejecutar la funcion de la clave con el valor recibido

*/

const cosas = {
    "correo":Correo,
    "contrasenia":Contrasenia
};



const data = {
    "correo":"prueba@gmail.com",
    "contrasenia":"contrasenia123"
}

// cosas.forEach((element) => {
//     console.log(element);
// });

// cosas.forEach((value, key) => {
//     data[key] = value; 
                 
// });

// for(let clave in cosas){
//     console.log(clave);
//     if(clave in data){
//         console.log(data[clave]);
//     }
// }

for(let clave in cosas){
    console.log(data[clave]);

}

// console.log(cosas["correo"])
// console.log(cosas["correo"]);

function RecibirArray(data){




}



function Contrasenia(contrasenia){
    console.log(contrasenia)
}

function Correo(correo){
    console.log(correo)
}


