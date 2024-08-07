function ValidarArchivoTamanio(imagen){  
  const tamanioMaximo = 4*1024*1024;

  if(imagen == null){
    return true;
  }

  if(imagen.size <= tamanioMaximo){
    return true; // imagen = "El archivo no debe pesar mas de 4MB";
  }else{
    return false;
  }
}

function ValidarArchivoExtension(imagen){
  if(imagen.name.trim() == ""){
    imagen = null;
    return true;
  }

  const extensionPemritidas = /(.jpeg|.jpg|.png|.jfif|.JFIF)$/i;

  const imagenNombre = imagen.name;
    
  if(extensionPemritidas.exec(imagenNombre)){
    return true; // imagen = "El archivo debe ser .jpeg, .jpg, .png, .gif, .jfif";
  }else{
    return false;
  }
}

function LimpiarComentario(texto){
    return texto.replace(/[^a-zA-Z0-9 .,!?'"\n\r-]/g, '');
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

    const imagen = data["publicacionArchivo"];
    let texto = data["publicacionTexto"]

    console.log(imagen, texto);

    LimpiarComentario(texto);

    console.log(texto)

    if(!ValidarArchivoExtension(imagen)){
      // throw new Error("Solo se permiten .jpeg");
      errorEsp.textContent = "Solo se permiten archivos .jpeg|.jpg|.png|.jfif JS";
    }
    else if (!ValidarArchivoTamanio(imagen)) {
      errorEsp.textContent = "El tamaño del archivo no puede superar 4MB";      
    }   
    else{
      fetch('/ForoDeDiscucion/php/publicacion.php', {
        method: 'POST',
        body: formData
      })
      .then(response => response.json()) //.json
      .then(data =>{
        if(data.status === 'Succes'){
          window.location.replace('/ForoDeDiscucion/maquetado/inicio.php');
        }else{
          errorEsp.textContent = data.message;
          console.log("Succes", data.status, "::::", data, "Esto es JS", imagen);
        }      
        // console.log("Succes", data, "Esto es JS");
          
      })
      .catch((error) => {
  
         console.log('Error:', error);
      }); 
    }           
      
  }









 
