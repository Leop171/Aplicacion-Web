// import{ Correo } from "assets/peticiones.js/exTest.js";
// import { ValidarArchivoExtension } from "../main.js/includes/validacion";
import { ValidarArchivoExtension, ValidarCorreo } from "../main.js/includes/validacion.js";
import { ValidarArchivoTamanio } from "../main.js/includes/validacion.js";
import { ValidarTexto } from "../main.js/includes/validacion.js";
import { ValidarBusqueda } from "../main.js/includes/validacion.js";
import { ValidarContrasenia } from "../main.js/includes/validacion.js";
import { ValidarCodigo } from "../main.js/includes/validacion.js";
import { DevolverRespuesta } from "../main.js/includes/respuestas.js";

// import { ValidarCorreo } from "../main.js/includes/validacion.js";


let formulario = "";


document.addEventListener("DOMContentLoaded", (event) => {
  formulario = document.getElementById("formulario1");

  if(formulario){
      formulario.addEventListener('submit', BuscarUsuario);
  }


});

function validaciones(clave, valor){
  switch(clave){
      case "texto":
          ValidarTexto(valor);
          break;
      case "imagen":
          ValidarArchivoExtension(valor);
          // ValidarArchivoExtension(valor);
          break;
      case "imagen":
          ValidarArchivoTamanio(valor);
          break;
      case "busqueda":
          ValidarBusqueda(valor);
          break;
      case "contrasenia":
          ValidarContrasenia(valor);
          break;
      case "correo":
          ValidarCorreo(valor);
          break;
      case "codigo":
          ValidarCodigo(valor);
          break;
  };


  throw "2000";

/*
ValidarArchivoExtension
ValidarArchivoTamanio
ValidarTexto
ValidarBusquedad
ValidarContrasnia
ValidarCorreo
ValidarCodigo
*/

}



function BuscarUsuario(event){
  try{
    event.preventDefault();

    let errorEsp = document.getElementById("errorCampos")

    const metodo = formulario.method;
    const formData = new FormData(formulario);

    console.log(formData);

    // const file = {};
    const data = {};
    formData.forEach((value, key) => {

      validaciones(key, value);

      data[key] = value;

                   
     });

/*
----------------------------------------------------------------------------
for(let dato  in data){
    evaluar = dato;
    validaciones(dato, data[dato]);
    
}

ENVIAR LA CLAVE Y LOS PARAMETROS

clave = "correo"
valor = correo@gmail.com

----------------------------------------------------------------------------

*/


    console.log(data);
    
      fetch('src/controllers/publicacion.php', {
        method: metodo,
        body: formData
      })
      .then(response => response.json()) //.json
      .then(data =>{
        if(data.status === 'Succes'){
            console.log(data);

        }else{
          errorEsp.textContent = data.mensaje;
          console.log("Succes", data.estado, "::::", data, "Esto es JS");
        }      
          
      })
      .catch((error) => {
        console.log(error);
      });

  }catch(err){
    let errorEsp = document.getElementById("errorCampos");
    errorEsp.textContent = DevolverRespuesta(err);
  }

};