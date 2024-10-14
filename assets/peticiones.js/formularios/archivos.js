// import{ Correo } from "assets/peticiones.js/exTest.js";
// import { ValidarArchivoExtension } from "../main.js/includes/validacion";
import { ValidarArchivoExtension, ValidarCorreo } from "assets/peticiones.js/includes/validacion.js";
import { ValidarArchivoTamanio } from "assets/peticiones.js/includes/validacion.js";
import { ValidarTexto } from "assets/peticiones.js/includes/validacion.js";
import { ValidarBusqueda } from "assets/peticiones.js/includes/validacion.js";
import { ValidarContrasenia } from "assets/peticiones.js/includes/validacion.js";
import { ValidarCodigo } from "assets/peticiones.js/includes/validacion.js";
import { DevolverRespuesta } from "assets/peticiones.js/includes/validacion.js";

// import { ValidarCorreo } from "../main.js/includes/validacion.js";


/*
ESTA PETICION ENVIA ARCHIVOS POR POST
*/

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

  // throw "2000";

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

      console.log(key, value);
      validaciones(key, value);

      data[key] = value;

                   
     });


    console.log(data);
    
      fetch('src/controllers/publicacion.php', {
        method: metodo,
        body: formData // Sigo creando data{} si el que envio es formData?
      })
      .then(response => response.json()) //.json
      .then(data =>{
        if(data.status === 'Succes'){ // Puedo eliminar esta seccion y solo dejar un if en caso de error
            console.log(data); // Una forma en la respuesta de servidor para saber si devolvio registros

        }else{
          errorEsp.textContent = data.mensaje;
          console.log("Succes", data.estado, "::::", data, "Esto es JS");
        }      
          
      })
      .catch((error) => {
        // En caso de un erro al enviar la solicitud?????
        errorEsp.textContent = "No se pudo conectar al servidor :(";
      });

  }catch(err){
    let errorEsp = document.getElementById("errorCampos");
    errorEsp.textContent = DevolverRespuesta(err);
  }

};