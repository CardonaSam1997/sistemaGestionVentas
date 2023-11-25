document.addEventListener("DOMContentLoaded",mostrarProductos);

let btnGuardar = document.getElementById("guardar");

btnGuardar.addEventListener("click",mostrarProductos);

//Mostrar productos despues de guardar
function mostrarProductos(){
    const url = "js/ajax/datos.json";
    fetch(url)
    .then(respuesta => {
        console.log(respuesta);
        return respuesta.json();
    })
    .then(resultado => {
        console.log(resultado);
        return mostrarHTML(resultado);
    })
}


function mostrarHTML({id,nombre,edad,pais}){
    const contenido = document.getElementById("contenido");
    contenido.innerHTML=
    `<p>id:${id}</p>
    <p>nombre:${nombre}</p>
    <p>edad:${edad}</p>
    <p>pais:${pais}</p>`

}