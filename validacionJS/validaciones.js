/// VALIDAR IMAGEN.JS
export function ValidarArchivoTamanio(imagen){  
    const tamanioMaximo = 4*1024*1024;
  
    if(imagen.name.trim() == ""){
      return true;
    }
  
    if(imagen.size >= tamanioMaximo){
      throw `El archivo no debe pesar mas de 4mb JS`;
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
      throw `Solo se permitren extensiones${(extensionPemritidas)} JS`;
    }
  
    return imagen;
}
  
export function ValidarTexto(texto){
    if(texto.trim() == ""){
      return true;
    }
  
      texto = texto.replace(/[^a-zA-Z0-9 .,!?'"\n\r-]/g, '');
  
      if(texto.length >= 200){
        throw "El texto tiene mas de 200 caracteres JS";
      }  
  
      return texto;
}



// PRUEBAS JS
// Validar correo
// RegExp obtenida de 
export function ValidarCorreo(correo){

  let regCorreo =  /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;

  if(!regCorreo.test(correo)){
    throw "Correo no valido JS";
  }

  return correo;
}


// Valida contraseña
// RegExp obtenida de 
export function ValidarContrasenia(contrasenia){

  let regContrasenia = /^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[\W_]).{8,}$/;

  if(!regContrasenia.test(contrasenia)){
    throw "Contraseña debe contener al menos 1 numero, 1 simbolo y 1 mayuscula JS";
  }

  return contrasenia;
}

