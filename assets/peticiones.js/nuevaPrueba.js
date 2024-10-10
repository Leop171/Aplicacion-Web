/*
ESTE ARCHIVO SIRVE PARA PROBAR SI ES POSIBLE VERIFICAR QUE FORMULARIO FUE ENVIADO POR MEDIO DE UN SWITCH
*/
let formulario = "";

document.addEventListener("DOMContentLoaded", (event) => {
    formulario = document.getElementsByTagName("form").envio;
    console.log(formulario);

    // YA CAPTURA EL FOMULARIO POR LA ETIQUETA, CREO...

    if(formulario){
        console.log(formulario.id);

        switch(formulario.id){
            case "Acceso":
                // Llamar funcion de acceso
                break;
        }
        // formulario.addEventListener('submit', BuscarUsuario);
        
        /*
        La funcion que se llama en el switch es una peticion
        */
        
    }

});



