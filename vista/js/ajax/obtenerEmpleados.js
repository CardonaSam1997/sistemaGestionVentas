//let btnGuardar = document.getElementById("guardar");

//btnGuardar.addEventListener("click",mostrarProductos);

//Mostrar productos despues de guardar
function mostrarEmpleados(){
    const url = "../modelo/json/empleados.php";
    fetch(url)
    .then(respuesta => {
        console.log(respuesta);        
        return respuesta.json();
    })
    .then(resultado => {
        console.table(resultado);
        return mostrarHTML(resultado);//si obtien el valor de la BD
    })
    .then(error => console.log("Error: "+error))
}

// En algún lugar de tu script PHP
$urlFormulario = "";


function mostrarHTML(empleados){
    const contenido = document.querySelector("#cuerpoTabla");
    let html = "";
    empleados.forEach(empleado => {
        const {codigoEmpleado,cedula,nombre,edad,telefono} = empleado;

            html += 
            `<tr>
                <td>${codigoEmpleado}</td>
                <td>${cedula}</td>
                <td>${nombre}</td>
                <td>${edad}</td>
                <td>${telefono}</td>
                <td> 
                    <form action="echo htmlspecialchars($_SERVER['PHP_SELF'])" method="GET">
                        <button type="submit" class="btn btn-danger" name="eliminar" value="${empleado.id}">
                            <i class="fa-solid fa-trash" style="color: #fafcff;" ></i>
                        </button>
                        <!-- USAR JS para que aparezca una modal al dar clic en modificar. 
                        se debe conservar el id del empleado a modificar -->
                        <button type="submit" class="btn btn-success" name="modificar" value="${empleado.id}">
                            <i class="fa-solid fa-pencil" style="color: #ffffff;"></i>
                        </button>
                    </form>
                </td>
            </tr>`
    });        
    contenido.innerHTML= html;
    
}
document.addEventListener("DOMContentLoaded",mostrarEmpleados);