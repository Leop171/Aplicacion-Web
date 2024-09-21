document.addEventListener("DOMContentLoaded", (event) => {
    formulario = document.getElementById("formulario1");

    if(formulario){
        formulario.addEventListener('submit', BuscarUsuario);
    }

});



function BuscarUsuario(event){
    try{
      event.preventDefault();
  
      let errorEsp = document.getElementById("errorCampos");
  
      const formData = new FormData(formulario);
  
      // const file = {};
      const data = {};
      formData.forEach((value, key) => {
        data[key] = value; 
                     
       });

       console.log(data);
      
        fetch('src/controllers/acceso.php', {
          method: 'POST',
          headers: {
            'Content-Type': 'application/json'
        },
            body: JSON.stringify(data)
        })
    

        .then(response => response.json()) //.json
        .then(data =>{
          if(data.estado === true){
            window.location.replace('inicio.php');
          }else{
            console.log(data.mensaje);
            errorEsp.textContent = data.mensaje;
            console.log(data);
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





// ---------------------------------------------------------------------------------------------------
// document.addEventListener("DOMContentLoaded", (event) => {
//     const formulario = document.getElementById('formulario1');

//     if(formulario){
//         formulario.addEventListener('submit', BuscarUsuario);
//     }
    
// });


// function BuscarUsuario(event){
//     const errores = document.getElementById("errorCampos");

//     event.preventDefault();
//     console.log("XD");
//     const data = {};
    
//     let formData = new FormData(formulario);
//     console.log(formulario);
//     formData.forEach((key, value) => {
//         data[key] = value;   
//     });
//     console.log(data);
// }

// --------------------------------------------------------------------------------------------------------

// console.log(formulario);

// METODO, ENDPOINT
// function BuscarUsuario(event){
//     try{
//     event.preventDefault();
//     let errorEsp = document.getElementById("errorCampos");
//     //   let errorEsp = document.getElementById("errorCampos")
  
//     const formData = new FormData(formulario);
  
//     //   // const file = {};
//       const data = {};
//       formData.forEach((value, key) => {
//         data[key] = value; 
//        });

//        console.log(data);
//         // fetch(ednpoint, {
//         //   method: metodo,
//         //   body: data
//         // })
//         // .then(response => response.text()) //.json
//         // .then(data =>{
//         //     console.log(data); 
            
//         // })
//         // .catch((error) => {
//         //   console.log(error);
//         // });
  
//     }catch(err){

//     console.log(err);
//     }
  
// };



// -----------------------------------------------------------------------------------------------------

// METODO, ENDPOINT
// function BuscarUsuario(metodo, ednpoint){
//     try{
    
//       const data = {
//         correo:"prueba2@gmail.com",
//         contrasenia:"1234@HWgt2"
//     };

//         fetch(ednpoint, {
//           method: metodo,
//           body: data
//         })
//         .then(response => response.text()) //.json
//         .then(data =>{
//             console.log(data);
            
//         })
//         .catch((error) => {
//           console.log(error);
//         });
  
//     }catch(err){
//     console.log(err);
//     }
  
// };

// BuscarUsuario("POST", "src/controllers/acceso.php" );

// -----------------------------------------------------------------------------------------------------







/*
DEBO CREAR UNA SOLICITUD FETCH PARA CADA TIPO DE METODO SOLICITADO?
GET, POST, PUT Y DELETE
*/

/*
CREAR LA FUNCIONA PARAMETRO EVENT
INICIAR EL TRY
PREVENIR QUE SE RECARGUE LA PAGINA
OBTENER EL ELEMENTO QUE MOSTRARA LOS ERRORES
CREAR EL FORMDATA
COLOCAR LOS DATOS DEL FORMDATA EN UN ARRAY DATA
VALIDAR LOS DATOS DE LA PETICION
(VALIDAR LOS DATOS DE LA PETICION Y DESPUES COLOCARLOS EN EL ARRAY DATA)
INICIOAR EL FETCH CON EL ENDPOINT PHP, CON METODO Y BODY ES DATA
RECIBIR LA RESPUESTA CON .THEN
VERIFICA EL STATUS DE LA RESPUESTA
SI ES TRUE MOSTRAR LOS DATOS DEVUELTOS POR EL ENDPOINT
DE LO CONTRARIO MOSTRAR EL MENSAJE DE ERROR
CATCH DE LA PROMESA
CATCH GENERAL
*/


