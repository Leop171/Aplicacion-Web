document.addEventListener("DOMContentLoaded", (event) => {
    const formularioBusqueda = document.getElementById("formularioBusqueda");

    if(formularioBusqueda ){
        formularioBusqueda .addEventListener('submit', BuscarUsuario);
    }

});



function BuscarUsuario(event){
    try{
      event.preventDefault();
  
      let errorEsp = document.getElementById("errorCampos")
  
      const formData = new FormData(formularioBusqueda);
  
      // const file = {};
      const data = {};
      formData.forEach((value, key) => {
        data[key] = value; 
                     
       });

      let texto = data["buscar"];
  
      ValidarBusqueda(texto)
      
        fetch('src/services/buscar.php', {
          method: 'POST',
          body: formData
        })
        .then(response => response.text()) //.json
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

