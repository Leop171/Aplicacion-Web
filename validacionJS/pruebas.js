// Validar correo
// RegExp obtenida de 
function ValidarCorreo(correo){
  const mostrarErrorCoreo = document.getElementById("errorCorreo");

  let regCorreo =  /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;

  if(regCorreo.test(correo)){
      return true;
  }else{
      return false;
  }
}


// Valida contraseña
// RegExp obtenida de 
function ValidarContrasenia(contrasenia){
  const mostrarErrorContrasenia = document.getElementById("errorContrasenia");

  let regContrasenia = /^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[\W_]).{8,}$/;

  if(regContrasenia.test(contrasenia)){
      return true;
  }
  else{
      return false;
  }
}


document.addEventListener('DOMContentLoaded', (event) => {
  const formulario = document.getElementById("formularioRegistro");
  const errorCampos = document.getElementById("errorCampos");

  formulario.addEventListener('submit', function(event) {
    event.preventDefault(); 

    const formData = new FormData(formulario);

    const data = {};
    formData.forEach((value, key) => {
      data[key] = value;
    });
  
   if(!ValidarCorreo(data["correo"])){
    errorCampos.textContent = "Correo no valido";
    }
    else if(!ValidarContrasenia(data["contrasenia"])){
      errorCampos.textContent = "Contraseña no valida";
    }
    else{
          fetch('/ForoDeDiscucion/php/insercionFormulario.php', {
            method: 'POST',
            headers: {
            'Content-Type': 'application/json'
          },
            body: JSON.stringify(data)
          })
          .then(response => response.json())
          .then(data => {
            // Respuesta del servidor
                
            console.log('Success:', data);
          })
          .catch((error) => {
              console.error('Error:', error);
          });
        
       }

   });
});










