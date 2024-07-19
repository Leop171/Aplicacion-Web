document.addEventListener("DOMContentLoaded", (event) => {
    const formularioPublicacion = document.getElementById("formularioPublicacion");

    formularioPublicacion.addEventListener('submit', RecibirPublicacion);

});

function RecibirPublicacion(event){
    event.preventDefault();

    const formData = new FormData(formularioPublicacion);

    // const file = {};
    const data = {};
    // formData.forEach((value, key) => {
    //   if(key == "publicacionArchivo"){
    //     file[key] = value;
    //   }else{
    //     data[key] = value;
    //   }         
       
    // });
    console.log(formData);    

    fetch('/ForoDeDiscucion/php/tests.php', {
        method: 'POST',
        body: formData
      })
      .then(response => response.text()) //.json
      .then(data =>{
        // Respuesta del servidor
        
        console.log("Succes", data, "Esto es JS");
        
      })
      .catch((error) => {
         console.error('Error:', error);
      });
}





 
