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
  const formularioRegistro = document.getElementById('formularioRegistro');
  const formularioLogin = document.getElementById('formularioLogin');

  if(formularioRegistro){
    formularioRegistro.addEventListener('submit', RecibirRegistro);
  }

  if(formularioLogin){
    formularioLogin.addEventListener('submit', RecibirLogin);
  }
});


// Funcion que valida y envia el formulario de registro
function RecibirRegistro(event){
  
    event.preventDefault(); 

    const formData = new FormData(formularioRegistro);

    const data = {};
    formData.forEach((value, key) => {
      data[key] = value;
    });
  
   if(!ValidarCorreo(data["correo"])){
    errorCampos.textContent = "Correo no valido";
    }
    else if(!ValidarContrasenia(data["contrasenia"])){
      errorCampos.textContent = "Contraseña debe contener al menos 1 numero, 1 simbolo y 1 mayuscula";
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
            // maquetado\perfil.html
            // \ForoDeDiscucion\maquetado\perfil.html

            if(data.status === 'Accediendo'){
              window.location.replace('/ForoDeDiscucion/maquetado/perfil.php');
            }else{
              errorCampos.textContent = data.message;
            }

          })
          .catch((error) => {
             console.error('Error:', error);
          });
        
       }
};









