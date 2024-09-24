/// VALIDAR IMAGEN.JS

/*
Se debe crear un array especifico que guarde todos los mensajes de error
*/

export function ValidarArchivoTamanio(imagen){  
    const tamanioMaximo = 4*1024*1024;
  
    if(imagen.name.trim() == ""){
      return true;
    }
  
    if(imagen.size >= tamanioMaximo){
      throw "1009";
    }
  
    return imagen;
}

export function ValidarArchivoExtension(imagen){
    if(imagen.name.trim() == ""){
      return true;
    }
  
    const extensionPemritidas = /(.jpeg|.jpg|.png|.jfif|.JFIF)$/i;
  
    const imagenNombre = imagen.name;
      
    if(!extensionPemritidas.exec(imagenNombre)){
      throw "1008";
    }
  
    return imagen;
}
  
export function ValidarTexto(texto){
    if(texto.trim() == ""){
      return true;
    }
  
      texto = texto.replace(/[^a-zA-Z0-9 .,!?'"\n\r-]/g, '');
  
      if(texto.length >= 200){
        throw "1007";
      }  
  
      return texto;
}



// PRUEBAS JS
// Validar correo
// RegExp obtenida de 
export function ValidarCorreo(correo){

  let regCorreo =  /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;

  if(!regCorreo.test(correo)){
    throw "1003";
  }

  return correo;
}


// Valida contraseña
// RegExp obtenida de 
export function ValidarContrasenia(contrasenia){

  let regContrasenia = /^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[\W_]).{8,}$/;

  if(!regContrasenia.test(contrasenia)){
    throw "1004";
  }

  return contrasenia;
}


// Validar Busqueda
// 
export function ValidarBusqueda(texto){
  // Se valida que es null antes de entrar en la funcion
  texto = texto.replace(/\s/, "");

  texto = texto.replace(/[^a-zA-Z0-9]/g, "");

  if(texto.length >= 20){
      throw "1016";
  }    

  arroba = "@";

  texto = arroba + texto;

  return texto;
}


// Validar que el codigo de usuario se una session correcta
export function ValidarCodigo(codigo){

  if(isNaN(codigo)){
      throw("1014");
  }

  return codigo;

}



