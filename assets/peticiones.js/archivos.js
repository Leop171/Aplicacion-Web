document.addEventListener("DOMContentLoaded", (event) => {
    formulario = document.getElementById("formulario1");

    if(formulario){
        formulario.addEventListener('submit', BuscarUsuario);
    }

});


function BuscarUsuario(event){
  try{
    event.preventDefault();

    let errorEsp = document.getElementById("errorCampos")

    const formData = new FormData(formulario);

    // const file = {};
    const data = {};
    formData.forEach((value, key) => {
      data[key] = value; 
                   
     });


    console.log(data);
    
      fetch('src/controllers/publicacion.php', {
        method: 'POST',
        body: formData
      })
      .then(response => response.json()) //.json
      .then(data =>{
        if(data.status === 'Succes'){
            console.log(data);

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
    errorEsp.textContent = err;
  }

};