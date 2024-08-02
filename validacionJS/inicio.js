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
            const publicacionHtml = `
            <div class="publicacion">
                <p>${(element[0])}<p>
                <p>${(element[1])}<p>
            <div class="imagenPerfil">
                <img class="imagen" src="${(element[1])}" alt="Imagen">
                <a href="${(element[1])}">Enlace</a>
            </div>
                <p>${(element[2])}<p>
                <p>${(element[3])}</p>
                <a href="C:/laragon/www/ForoDeDiscucion/php/imagenes/Leonardo/1722560397LicenciaSQL.jfif">A</a>
            <div class="reacciones">
            <button class="positivo">${(element[4])}</button>
            <button class="negativo">${(element[5])}</button>
            </div>

         `;
        publicacionesDiv.innerHTML += publicacionHtml;
                
        });
    })
    .catch(error => console.error('Error al cargar las publicaciones:', error));






