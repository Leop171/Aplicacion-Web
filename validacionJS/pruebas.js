// let correo = "leop88567@gmail.com";
// let contrasenia = "348fj43h4f";

// let regCorreo =  /^\w+([.-_+]?\w+)*@\w+([.-]?\w+)*(\.\w{2,10})+$/;
// let regContrasenia = /^[a-zA-Z0-9\s.,!?;:'"()\-]+$/;

// function Validar(){
//     if(regCorreo.test(correo) == false){
//         console.log("Direccion de correo no valida");
//         return false;
    
//       }else if(regContrasenia.test(contrasenia) == false){
//         console.log("Contraseña poco segura");
//         return false;
    
//       }else{
//         console.log("Todo biem");
//         return true;
//         //window.location = "\ForoDeDiscucion\maquetado\inicio.html";
//       }
// }
// Validar()

// ------------------------------------------------TEST ENVIO DE DATOS
// document.addEventListener('DOMContentLoaded', (event) => {
//     const formulario = document.getElementById('formularioRegistro');

//     formulario.addEventListener('submit', function(event) {
//         event.preventDefault(); // Evita el comportamiento predeterminado del formulario

//         const formData = new FormData(formulario);

//         const data = {};
//         formData.forEach((value, key) => {
//             data[key] = value;
//         });

//         // Enviar datos como JSON
//         fetch('/ForoDeDiscucion/php/prueba.php', {
//             method: 'POST',
//             headers: {
//                 'Content-Type': 'application/json'
//             },
//             body: JSON.stringify(data)
//         })
//         .then(response => response.json())
//         .then(data => {
//             // Manejar la respuesta del servidor
//             console.log('Success:', data);
//         })
//         .catch((error) => {
//             // Manejar errores
//             console.error('Error:', error);
//         });
//     });
// });
// ----------------------------------------------------------TEST OPERADOR TERNAIO
// age = 16;
// let votable = (age > 18)? "Puede pasar":"No puede pasar";
// console.log(votable);



// document.addEventListener('DOMContentLoaded', (event) => {
//   const formulario = document.getElementById('formularioRegistro');

//   formulario.addEventListener('submit', function(event) {
//     event.preventDefault(); 

//     const formData = new FormData(formulario);
    
//     const data = {};
//     formData.forEach((value, key) => {
//       data[key] = value;
//     });

//     (ValidarCorreo(data["correo"])) == true ? mostrarErrorCoreo = "Correo no valido": true;
//     (ValidarContrasenia(data["contrasenia"]) == true) ? mostrarErrorContrasenia.textContent = "Contraseña muy debil": true;

//     // Enviar datos al servidor
//     fetch('/ForoDeDiscucion/php/insercionFormulario.php', {
//       method: 'POST',
//       headers: {
//           'Content-Type': 'application/json'
//       },
//       body: JSON.stringify(data)
//     })
//     .then(response => response.json())
//     .then(data => {
//       // Respuesta del servidor
//     //   const errorCredenciales = document.getElementById("errorCredenciales")
//     //   errorCredenciales.textContent = data;
          
//       console.log('Success:', data);
//     })
//     .catch((error) => {
//         console.error('Error:', error);
//     });
//   });
// });
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
          //   const errorCredenciales = document.getElementById("errorCredenciales")
          //   errorCredenciales.textContent = data;
                
            console.log('Success:', data);
          })
          .catch((error) => {
              console.error('Error:', error);
          });
        
       }

     // Enviar datos al servidor

   });
});









