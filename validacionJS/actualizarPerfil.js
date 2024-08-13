import {ValidarArchivoTamanio} from './validaciones.js';
import {ValidarArchivoExtension} from './validaciones.js';

let fotoPerfil;

document.addEventListener("DOMContentLoaded", (event) => {
    fotoPerfil = document.getElementById('actualizarFoto');

    if(fotoPerfil){
      fotoPerfil.addEventListener('submit', EnviarFoto);
    }

});


function EnviarFoto(event){
  try{
    event.preventDefault();

    const errorEsp = document.getElementById("errorCampos");

    console.log(fotoPerfil);

    let formData = new FormData(fotoPerfil);

    // const file = {};
    const data = {};
    formData.forEach((value, key) => {
      data[key] = value; 
                   
     });
    console.log(data);

    const imagen = data["enviarFoto"];
    console.log(imagen);

    ValidarArchivoTamanio(imagen);
    ValidarArchivoExtension(imagen);
    
    
      fetch('/ForoDeDiscucion/php/actualizarPerfil.php', {
        method: 'POST',
        body: formData
      })
      .then(response => response.json()) //.json
      .then(data =>{
        if(data.status === 'Succes'){
          window.location.replace('/ForoDeDiscucion/maquetado/perfil.php');
        }else{
          errorEsp.textContent = data.message;
          console.log("Succes", data.status, "::::", data, "Esto es JS");
        }      
          
      })
      .catch((error) => {
        console.log(error + "Error del servidor");
      });

  }catch(err){
    let errorEsp = document.getElementById("errorCampos");
    errorEsp.textContent = err + "Es en el catch final";
  }

};

