fetch("/ForoDeDiscucion/php/tests.php")
    .then(response => response.json()) // .json()
    .then(data => {
        const publicacionesDiv = document.getElementById('publicaciones');
        publicacionesDiv.innerHTML = ''; // Limpiar contenido previo

        if(data.status === "Error"){
            console.log("Error al recibir los datos");
        }

        data = Array(data);
        console.log(typeof(data));

        // data.forEach((element) => {
        //     element.forEach((dato) => {
        //         const publicacionHtml = `
        //         <div class="publicacion">
        //             <p>${(dato[0])}<p>
        //             <p>${(dato[1])}</p>
        //             <p>${(dato[2])}<p>
        //             <p>${(dato[3])}</p>
        //             <p>${(dato[4])}</p>
        //         </div>
        //      `;
        //      publicacionesDiv.innerHTML += publicacionHtml;
        //     });
                
        // });

        data.forEach((element) => {
            console.log(element[2]);
        });


        // data.message.forEach((publicacion) => {
        //     const publicacionHtml = `
        //        <div class="publicacion">
        //              <p>${(publicacion)}<p>
        //         </div>`
                     
        //      publicacionesDiv.innerHTML += publicacionHtml;



        //     <div class="publicacion">
        //         <p>${(item[1])}<p>
        //         <p>${(item)}</p>
        //         <p>${(item)}<p>
        //         <p>${(item)}</p>
        //         <p>${(item)}</p>
        //     </div>
        // `;
        // publicacionesDiv.innerHTML += publicacionHtml;
    //  });



        // data.message.forEach((item, index) => {
        //     console.log(`Index ${index}:`, item);
        // });
        
    
        // quiza solo hace falta recibir el array en json                
        // data.forEach(publicacion => {
        //     const publicacionHtml = `
        //         <div class="publicacion">
        //             <p>${(publicacion[0])}<p>
        //             <p>${(publicacion.fecha)}</p>
        //             <p>${(publicacion.tema)}<p>
        //             <p>${(publicacion.usuario_codigo)}</p>
        //             <p>${(publicacion.etiqueta_codigo)}</p>
        //         </div>
        //     `;
        //     publicacionesDiv.innerHTML += publicacionHtml;
        // });
    })
    .catch(error => console.error('Error al cargar las publicaciones:', error));






