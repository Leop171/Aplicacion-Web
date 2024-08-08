function ValidarArchivoTamanio(imagen){  
  const tamanioMaximo = 4*1024*1024;

  if(imagen.name.trim() == ""){
    return true;
  }

  if(imagen.size >= tamanioMaximo){
    throw `El archivo no debe pesar mas de 4mb JS`;
  }

  return imagen;
}


function ValidarArchivoExtension(imagen){
  if(imagen.name.trim() == ""){
    return true;
  }

  const extensionPemritidas = /(.jpeg|.jpg|.png|.jfif|.JFIF)$/i;

  const imagenNombre = imagen.name;
    
  if(!extensionPemritidas.exec(imagenNombre)){
    throw `Solo se permitren extensiones${(extensionPemritidas)} JS`;
  }

  return imagen;
}


function LimpiarComentario(texto){
  if(texto.trim() == ""){
    return true;
  }

    texto = texto.replace(/[^a-zA-Z0-9 .,!?'"\n\r-]/g, '');

    if(texto.length >= 200){
      throw "El texto tiene mas de 200 caracteres JS";
    }  

    return texto;
}

document.addEventListener("DOMContentLoaded", (event) => {
    const formularioPublicacion = document.getElementById("formularioPublicacion");
    const actulizacionPerfil = document.getElementById("actulizarFoto");

    if(formularioPublicacion){
      formularioPublicacion.addEventListener('submit', RecibirPublicacion);
    }

    if(actulizacionPerfil){
      actulizacionPerfil.addEventListener('submit', RecibirPublicacion);
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

    LimpiarComentario(texto);

    console.log(texto)

    ValidarArchivoExtension(imagen);
    ValidarArchivoTamanio(imagen);
    
      fetch('/ForoDeDiscucion/php/publicacion.php', {
        method: 'POST',
        body: formData
      })
      .then(response => response.text()) //.json
      .then(data =>{
        if(data.status === 'Succes'){
          window.location.replace('/ForoDeDiscucion/maquetado/inicio.php');
        }else{
          errorEsp.textContent = data.message;
          console.log("Succes", data.status, "::::", data, "Esto es JS", imagen);
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












 
