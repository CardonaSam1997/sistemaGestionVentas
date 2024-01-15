//document.addEventListener("DOMContentLoaded",mostrarProductos);

let btnGuardar = document.getElementById("recuperar");

btnGuardar.addEventListener("click",mostrarProductos);
// Asegúrate de tener un campo de entrada con id "email" en tu HTML
const email = document.getElementById("email").value;
//Mostrar productos despues de guardar
function recuperarPassw(){
    const url = "../../controlador/fetch/iniciarSesion.php";
    fetch(url, {
        method:'POST',
        headers:{//para que sirve esta linea?
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: new URLSearchParams({
            'recuperar': true,
            'email':email
        }),
    })
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