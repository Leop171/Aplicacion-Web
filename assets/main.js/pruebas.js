import { ValidarCorreo } from './includes/validacion.js';
import { ValidarContrasenia } from './includes/validacion.js';


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
    try{
        event.preventDefault(); 
        const errorCampos = document.getElementById("errorCampos");
    
        let formData = new FormData(formularioRegistro);

        const data = {};
        formData.forEach((value, key) => {
        data[key] = value;
        });

        const correo = data["correo"];
        const contrasenia = data["contrasenia"];
  
        ValidarCorreo(correo);
        ValidarContrasenia(contrasenia);

        fetch('src/services/insercionFormulario.php', {
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
          window.location.replace('perfil.php');
        }else{
          errorCampos.textContent = data.message;
        }

      })
      .catch((error) => {
        errorCampos.textContent = error;    
      });
        
}catch(err){
    const errorCampos = document.getElementById("errorCampos");
    errorCampos.textContent = err;
    }
};




// Funcion que valida y envia el formulario de login
function RecibirLogin(event){
    try{
        event.preventDefault(); 
        const errorCampos = document.getElementById("errorCampos");
    
        let formData = new FormData(formularioLogin);

        const data = {};
        formData.forEach((value, key) => {
        data[key] = value;
        });

        const correo = data["correo"];
        const contrasenia = data["contrasenia"];
  
        ValidarCorreo(correo);
        ValidarContrasenia(contrasenia);

        fetch('src/services/FormularioLogin.php', {
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
          window.location.replace('perfil.php');
        }else{
          errorCampos.textContent = data.message;
        }

      })
      .catch((error) => {
        errorCampos.textContent = error;    
      });
        
}catch(err){
    const errorCampos = document.getElementById("errorCampos");
    errorCampos.textContent = err;
    }
};

