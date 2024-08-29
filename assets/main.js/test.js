// --------------------------------------------------------------------------------------------------------------
// Funcion que valida el peso y extension del archivo
// function ValidarArchivoTamanio(value){  
//   const tamanioMaximo = 4*1024*1024;

//   if(value.size <= tamanioMaximo){
//     return true; //value = "El archivo no debe pesar mas de 4MB";
//   }else{
//     return false;
//   }
// }

// function ValidarArchivoExtension(value){
//   const extensionPemritidas = /(.jpeg|.jpg|.png|.jfif|.JFIF)$/i;

//   valueName = value.name;
    
//   if(extensionPemritidas.exec(valueName)){
//     return true; //value = "El archivo debe ser .jpeg, .jpg, .png, .gif, .jfif";
//   }else{
//     return false;
//   }
// }

// document.addEventListener("DOMContentLoaded", (event) => {
//     const formularioPublicacion = document.getElementById("formularioPublicacion");

//     formularioPublicacion.addEventListener('submit', RecibirPublicacion);

// });
// // try{
//   function RecibirPublicacion(event){
//     event.preventDefault();

//     const formData = new FormData(formularioPublicacion);

//     let errorEsp = document.getElementById("errorCampos")

//     // const file = {};
//     const data = {};
//     formData.forEach((value, key) => {
//       data[key] = value; 
                   
//      });
//     console.log(data);
//     console.log(errorEsp);

//     value = data["publicacionArchivo"];

//     console.log(value);

//     if(!ValidarArchivoExtension(value)){
//       // throw new Error("Solo se permiten .jpeg");
//       errorEsp.textContent = "Solo se permiten archivos .jpeg|.jpg|.png|.jfif";
//     }
//     else if (!ValidarArchivoTamanio(value)) {
//       errorEsp.textContent = "El tamaño del archivo no puede superar 4MB";      
//     }   
//     else{
//       fetch('/ForoDeDiscucion/php/tests.php', {
//         method: 'POST',
//         body: formData
//       })
//       .then(response => response.text()) //.json
//       .then(data =>{
//         // Respuesta del servidor
        
//         console.log("Succes", data, "Esto es JS");
          
//       })
//       .catch((error) => {
  
//          console.log('Error:', error);
//       }); 
//     }           
      
//   }

// -------------------------------------------------------------------------------------------------------------

  // }catch(error){
//     console.log(error.message())
//     // errorEsp.textContent = error.message;
//   // console.log("Error", err)
// }


    


    // var visor = new FileReader();
    // visor.onload = function(e){
    //   document.getElementById("previsualizarImagen").innerHTML = '<embed src="'+e.target.result+' width="100" heigth="100" />'
    // }   

// arrEjemplo = [2, '2024-07-26 00:00:00', 'Prime publicacion', 2, 1];

// arrEjemplo = JSON.stringify(arrEjemplo);

// arrEjemplo = JSON.parse(arrEjemplo);


// arrEjemplo.forEach(element => {
//   console.log(element);
// });



// Texto no mayor a 20 caracteres
// Texto en UTF-8
// Limpiar de caracteres especiales
// No permite espacios

const direccion = "../../uploads/imagen_perfil/Leonardo/1723751197LicenciaSQL.jfif";
let usuarioCodigo = 5;
let contador = 5;

while(contador < 1006){
    console.log(`INSERT INTO imagen_usuario (direccion, usuario_codigo) VALUES ('${(direccion)}', '${(usuarioCodigo)}');`);
    contador++;
    usuarioCodigo++;
}




