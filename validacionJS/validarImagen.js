function ValidarArchivoTamanio(value){  
  const tamanioMaximo = 4*1024*1024;

  if(value.size <= tamanioMaximo){
    return true; //value = "El archivo no debe pesar mas de 4MB";
  }else{
    return false;
  }
}

function ValidarArchivoExtension(value){
  const extensionPemritidas = /(.jpeg|.jpg|.png|.jfif|.JFIF)$/i;

  valueName = value.name;
    
  if(extensionPemritidas.exec(valueName)){
    return true; //value = "El archivo debe ser .jpeg, .jpg, .png, .gif, .jfif";
  }else{
    return false;
  }
}

document.addEventListener("DOMContentLoaded", (event) => {
    const formularioPublicacion = document.getElementById("formularioPublicacion");

    formularioPublicacion.addEventListener('submit', RecibirPublicacion);

});
// try{
  function RecibirPublicacion(event){
    event.preventDefault();

    const formData = new FormData(formularioPublicacion);

    let errorEsp = document.getElementById("errorCampos")

    // const file = {};
    const data = {};
    formData.forEach((value, key) => {
      data[key] = value; 
                   
     });
    console.log(data);
    console.log(errorEsp);

    value = data["publicacionArchivo"];

    console.log(value);

    if(!ValidarArchivoExtension(value)){
      // throw new Error("Solo se permiten .jpeg");
      errorEsp.textContent = "Solo se permiten archivos .jpeg|.jpg|.png|.jfif";
    }
    else if (!ValidarArchivoTamanio(value)) {
      errorEsp.textContent = "El tamaño del archivo no puede superar 4MB";      
    }   
    else{
      fetch('/ForoDeDiscucion/php/publicacion.php', {
        method: 'POST',
        body: formData
      })
      .then(response => response.text()) //.json
      .then(data =>{
        // Respuesta del servidor
        
        console.log("Succes", data, "Esto es JS");
          
      })
      .catch((error) => {
  
         console.log('Error:', error);
      }); 
    }           
      
  }









 
