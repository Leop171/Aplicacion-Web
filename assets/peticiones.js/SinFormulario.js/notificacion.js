try{

    fetch("/ForoDeDiscucion/src/controllers/notificacion.php")
        .then(response => response.text())
        .then(data => {
            const publicacionesDiv = document.getElementById('notificaciones');
            publicacionesDiv.innerHTML = ''; // Limpiar contenido previo
    
            if(data.status === "Error"){
                console.log("Error al recibir los datos");
            }
            
            console.log(data) // Se debe eliminar cuando todo funcione al 100 solo es para ver la data que se carga
    
            const rutaBase = "ForoDeDiscucion";
    
            let imagenHtml = ``;
            
            data.forEach(element => {
                console.log(element); // Se debe eliminar cuando todo funcione al 100 solo sirve para ver las iteraciones del bucle sobre la data
                
                // if(element[0]){
                //     imagenHtml = `<img class="publicacion" id="imagen-publicacion" src="${(element["direccion"])} alt="Imagen de la publicacion">`;
                // }
                // src="/ForoDeDiscucion/assets/imagenes/tortuga.png" 

                /*
                const publicacionHtml = `
                <div class="publicacion" id="publicacion">
                    <div class="informacion-usuario" id="informacion-usuario">
                        <img src="${(element["direccion"])}" alt="imagen usuario" id="imagen-usuario">
                        <p id="nombre-usuario">${(element["nombre"])}</p>
                        <p id="fecha">${(element["fecha"])}</p>
                    </div>
                
                    <p id="texto-publicacion">${(element["texto"])}</p>
                    <img id="imagen-publicacion"src="/ForoDeDiscucion/assets/imagenes/tortuga.png" alt="image publicacion">
                    <div class="reacciones">
                        <div class="reacciones" id="reacciones">
                        <img src="/ForoDeDiscucion/assets/imagenes/subir.png" alt="imagen-reaccion" class="imagen-reaccion">
                        <img src="/ForoDeDiscucion/assets/imagenes/bajar.png" alt="imagen-reaccion" class="imagen-reaccion">
                        <img src="/ForoDeDiscucion/assets/imagenes/comentario.png" alt="imagen-respuesta" class="imagen-reaccion">
                        <img src="/ForoDeDiscucion/assets/imagenes/guardar.png" alt="imagen-guardado" class="imagen-reaccion">    
                    </div>
                                                                    
                </div>
    
            `;*/
    
            // <>
            publicacionesDiv.innerHTML += publicacionHtml;
            });
    
        })
        .catch(error => console.log(error));
        // .catch(error => console.log('Error al cargar las publicaciones:',  JSON.stringify(error)));
    }catch(err){
        console.log("Error en el try principla" + err);
    }
    