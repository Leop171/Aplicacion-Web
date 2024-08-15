/*
Cuando el formulario se cargue obtener todos los campos
Llama las funciones para validar los campos
Envia en JSON al servidor y espera la repuesta
*/

/*
ESTE SCIPT NO ESTA SIENDO UTILZADO POR NINGUN .html
*/

/*
ESTE SCIPT NO ESTA SIENDO UTILZADO POR NINGUN .html
*/

/*
ESTE SCIPT NO ESTA SIENDO UTILZADO POR NINGUN .html
*/

/*
ESTE SCIPT NO ESTA SIENDO UTILZADO POR NINGUN .html
*/

/*
ESTE SCIPT NO ESTA SIENDO UTILZADO POR NINGUN .html
*/

/*
ESTE SCIPT NO ESTA SIENDO UTILZADO POR NINGUN .html
*/

/*
ESTE SCIPT NO ESTA SIENDO UTILZADO POR NINGUN .html
*/

/*
ESTE SCIPT NO ESTA SIENDO UTILZADO POR NINGUN .html
*/

/*
ESTE SCIPT NO ESTA SIENDO UTILZADO POR NINGUN .html
*/
/*
ESTE SCIPT NO ESTA SIENDO UTILZADO POR NINGUN .html
*/

// VALIDAR FORMULARIO JS
// Validar correo
// RegExp obtenida de 
function ValidarCorreo(correo){
  const mostrarErrorCoreo = document.getElementById("errorCorreo");

  let regCorreo =  /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;

  if(regCorreo.test(correo)){
      return true;
  }else{
      mostrarErrorCoreo.textContent = "Correo no valido";
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
      mostrarErrorContrasenia.textContent = "Contraseña no valida";
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

function RecibirRegistro(event){

  

    event.preventDefault(); 

    const formData = new FormData(formularioRegistro);
    
    const data = {};
    formData.forEach((value, key) => {
      data[key] = value;
    });

    (ValidarCorreo(data["correo"])) == true ? mostrarErrorCoreo = "Correo no valido": true;
    (ValidarContrasenia(data["contrasenia"]) == true) ? mostrarErrorContrasenia.textContent = "Contraseña muy debil": true;

    // Enviar datos al servidor
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
      
    });
};


// Funcion que recibe el archivo de Formulario Login
function RecibirLogin(event){

  event.preventDefault(); 

  const formData = new FormData(formularioLogin);
  
  const data = {};
  formData.forEach((value, key) => {
    data[key] = value;
  });

  (ValidarCorreo(data["correo"])) == true ? mostrarErrorCoreo = "Correo no valido": true;
  (ValidarContrasenia(data["contrasenia"]) == true) ? mostrarErrorContrasenia.textContent = "Contraseña debe contener  al menos 1 signo, 1 letra mayuscula y 1 numero": true;

  // Enviar datos al servidor
  fetch('/ForoDeDiscucion/php/FormularioLogin.php', {
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
};



// document.addEventListener('DOMContentLoaded', event =>{
//   const formulario = document.getElementById('formularioRegistro');

//   formulario.addEventListener('submit', function(event){
//     event.preventDefault();

//     const formData = new FormData(formulario);

//     const datos= {};

//     formData.forEach((value, key) =>{
//       datos[key] = value;
//     });

//       fetch('/ForoDeDiscucion/php/insercionFormulario.php', {
//         method: 'POST',
//         headers: {
//             'Content-Type': 'application/json'
//         },
//         body: JSON.stringify(datos)
//       })
//       .then(response => response.json())
//       .then(datos => {
//         // Manejar la respuesta del servidor
//         console.log('Success:', datos);
//       })
//       .catch((error) => {
//         // Manejar errores
//         console.error('Error:', error);
//       });
//   });
// });




// function EnviarCampo(){
//   const formulario = new FormData(document.getElementById("formularioRegistro"));

//   fetch("insercionFormulario.php",{
//     method : "post",
//     body : formulario
//   })

//   .then(response => response.json())
//         .then(data => {
//             // Manejar la respuesta del servidor
//             console.log('Success:', data);
//         })
//         .catch((error) => {
//             // Manejar errores
//             console.error('Error:', error);
//         });
// };



// function ValidarRegistro(){

//   const formularioRegistro = document.getElementById("formularioRegistro");
//   const correo = document.getElementById("correo");
//   const contrasenia = document.getElementById("contrasenia");
//   const errorContrasenia = document.getElementById("errorContrasenia");
//   const errorCorreo = document.getElementById("errorCorreo");    

//   // Regexp correo y constraseña
//   let regCorreo =  /^\w+([.-_+]?\w+)*@\w+([.-]?\w+)*(\.\w{2,10})+$/;
//   let regContrasenia = /<\/?[a-z][\s\S]*>/i

//   if(regCorreo.test(correo) == false){
//     errorCorreo.textContent = "Direccion de correo no valida";
//     return false;
//   }else if(regContrasenia.test(contrasenia) == false){
//     errorContrasenia.textContent = "Contraseña poco segura";
//     return false;
//   }else{
//     console.log("Todo salio bien");
//   }
// }

// registroEnviar.addEventListener('click', ValidarRegistro());



// const formularioRegistro = document.getElementById("formularioRegistro");
// const correo = document.getElementById("correo");
// const contrasenia = document.getElementById("contrasenia");
// const errorContrasenia = document.getElementById("errorContrasenia");
// const errorCorreo = document.getElementById("errorCorreo");

//   registroEnviar.addEventListener('click', event => {
//   event.preventDefault();

//   // Regexp para verificar que el correo es valido
//   let regCorreo =  /^\w+([.-_+]?\w+)*@\w+([.-]?\w+)*(\.\w{2,10})+$/;

//   if(regCorreo.test(correo)){
//     "Correo valido";
//   }

//   if (correo.value == "" || contrasenia.value == "") {
//     alert("Completa todos los campos...")
//     return false
//   }else{
//     console.log(correo.value);
//     console.log(contrasenia.value);
//   }
// })

// --------------------------------------------------------------------------------------

// Redirigir al usuario a la pagina que queremos
// window.location = 'index.html'

//   const form = new FormData(formLogin)
//   form.append("function", "login")
//   fetch("data/Users.php", {
//     method: "POST",
//     body: form
//   })

//     .then(response => response.json())
//     .then(json => {
//       if (!json) {
//         alert("No has podido iniciar sesión")
//         return false
//       }
//       sessionStorage.setItem("user", JSON.stringify(json))
//     })
// })




// function ImprimirSi(){
//     console.log("Si")
// }

// Onclick
// function EnviarFormulario(){
//     formularioRegistro.onsubmit = async (e) => {
//         e.preventDefault();

//         let credenciales = {};
        
//         let formData = new FormData(formularioRegistro);
        
//         formData.forEach((value, key) => {
//             credenciales[key] = value;
//         });
        
//         let credencialesJSON = JSON.stringify(credenciales);
    
//         let response = await fetch('ForoDeDiscucion/php/insercionFormulario.php', {
//           method: 'POST',
//           headers: {
//             'Content-Type': 'application/json'
//           },
//           body: credencialesJSON
//         });
    
//         let result = await response.json();
    
//         alert(result.message);
//     };
// }



// function ValidarFormulario(){
//     formularioRegistro.onsubmit = async (e) =>{
//         e.preventDefault();
//         let credenciales = {};
//         let formData = new FormData(formularioRegistro);
//         formData.forEach((value, key) => {
//             credenciales[key] = value;
//             console.log(key);
//         });
//     };
// };



