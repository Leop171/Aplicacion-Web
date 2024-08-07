fetch("/ForoDeDiscucion/php/tests.php")
    .then(response => response.json()) // .json()
    .then(data => {
        const publicacionesDiv = document.getElementById('publicaciones');
        publicacionesDiv.innerHTML = ''; // Limpiar contenido previo

        if(data.status === "Error"){
            console.log("Error al recibir los datos");
        }

        // data = Array(data);
        // console.log(typeof(data));
        console.log(data)

        data.forEach((element) => {
            let imagenHtml = '';
            if (element[1]) {
                imagenHtml = `<img class="imagen" src="${(element[1])}" alt="Imagen">`;
            }
            if(element[2]){
                textoHtml = `<p class="texto">${(element[2])}<p>`;
            }
            const publicacionHtml = `
            <div class="publicacion">
            <p>${(element[0])}<p>
            <div class="publicacionImagen">
                ${(imagenHtml)}
            </div>
            <div class="publicacionTexto">
                ${(textoHtml)}
            </div>
            <div class="reacciones">
            <button class="positivo">${(element[4])}</button>
            <button class="negativo">${(element[5])}</button>
            </div>
            <br>


         `;
        publicacionesDiv.innerHTML += publicacionHtml;
                
        });
    })
    .catch(error => console.error('Error al cargar las publicaciones:', error));






