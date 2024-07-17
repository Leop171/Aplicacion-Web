document.addEventListener("DOMContentLoaded", (event) => {
    const formularioPublicacion = document.getElementById("formularioPublicacion");

    formularioPublicacion.addEventListener('submit', RecibirPublicacion);

});

function RecibirPublicacion(event){
     event.preventDefault();

    const formData = new FormData(formularioPublicacion);
  
    const file = {};
    const data = {};
    formData.forEach((value, key) => {
      if(key == "publicacionArchivo"){return}
      else{
        data[key] = value;  
      }
       
    });
    console.log(data);

    fetch('/ForoDeDiscucion/php/publicacion.php', {
        method: 'POST',
        body: JSON.stringify(data)
      })
      .then(response => response.json())
      .then(data => {
        // Respuesta del servidor

        console.log("Succes", data);

      })
      .catch((error) => {
         console.error('Error:', error);
      });
}





 
