import { ValidarArchivoExtension, ValidarCorreo } from "../main.js/includes/validacion.js";
import { ValidarArchivoTamanio } from "../main.js/includes/validacion.js";
import { ValidarTexto } from "../main.js/includes/validacion.js";
import { ValidarBusqueda } from "../main.js/includes/validacion.js";
import { ValidarContrasenia } from "../main.js/includes/validacion.js";
import { ValidarCodigo } from "../main.js/includes/validacion.js";
import { DevolverRespuesta } from "../main.js/includes/respuestas.js";

/*
ESTA PETICION ESTA ENCARGADA DE EXTRAER DATA EN LAS PETCIONES GET
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
  
      let errorEsp = document.getElementById("errorCampos");
  
      const metodo = formulario.method;
      console.log(metodo);
      const formData = new FormData(formulario);
  
      // const file = {};
      const data = {};
      formData.forEach((value, key) => {

        validaciones(key, value);

        data[key] = value; 
                     
       });

       console.log(data);
      
        fetch('src/controllers/guardado.php', {
          method: metodo
        //   headers: {
        //     'Content-Type': 'application/json'
        // },
            // body: JSON.stringify(data)
        })
    

        .then(response => response.text()) //.json
        .then(data =>{
          if(data.estado === true){

            console.log(data);
             // window.location.replace('inicio.php');
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