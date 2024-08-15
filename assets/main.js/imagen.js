import { ValidarArchivoTamanio } from './includes/validacion.js';
import { ValidarArchivoExtension } from './includes/validacion.js';
import { ValidarTexto } from './includes/validacion.js';


document.addEventListener("DOMContentLoaded", (event) => {
    const formularioPublicacion = document.getElementById("formularioPublicacion");

    if(formularioPublicacion){
      formularioPublicacion.addEventListener('submit', RecibirPublicacion);
    }

});

// Voy a convertir esto en una funcion


function RecibirPublicacion(event){
  try{
    event.preventDefault();

    let errorEsp = document.getElementById("errorCampos")

    const formData = new FormData(formularioPublicacion);

    // const file = {};
    const data = {};
    formData.forEach((value, key) => {
      data[key] = value; 
                   
     });

    let texto = data["publicacionTexto"]
    const imagen = data["publicacionArchivo"];

    console.log(data);
    console.log(imagen, texto);

    ValidarTexto(texto);

    ValidarArchivoExtension(imagen);
    ValidarArchivoTamanio(imagen);
    
      fetch('src/services/publicacion.php', {
        method: 'POST',
        body: formData
      })
      .then(response => response.json()) //.json
      .then(data =>{
        if(data.status === 'Succes'){
          window.location.replace('inicio.php');
        }else{
          errorEsp.textContent = data.message;
          console.log("Succes", data.status, "::::", data, "Esto es JS");
        }      
          
      })
      .catch((error) => {
        console.log(error);
      });

  }catch(err){
    let errorEsp = document.getElementById("errorCampos");
    errorEsp.textContent = err;
  }

};


// <>












 
