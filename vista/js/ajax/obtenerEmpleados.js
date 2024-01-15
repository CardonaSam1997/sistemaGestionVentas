document.addEventListener("DOMContentLoaded",mostrarEmpleados);

let btnEliminar = document.getElementById("eliminar");
//let btnGuardar = document.getElementById("guardar");

//btnGuardar.addEventListener("click",mostrarProductos);

//Mostrar productos despues de guardar
btnEliminar.addEventListener("click",mostrarMensajeELiminar);

function mostrarMensajeELiminar(){
    console.log("Saludo eliminar");
}

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

function mostrarHTML(empleados){
    const contenido = document.getElementById("cuerpoTabla");
    let html = "";
    empleados.forEach(empleado => {
        //los campos de aca deben de ser las columnas de la BD
        const {codigoEmpleado,nombre,cargo,salario,fecha_contratacion} = empleado;
        html += 
        `<tr>
            <td>${codigoEmpleado}</td>                
            <td>${nombre}</td>
            <td>${cargo}</td>
            <td>${salario}</td>
            <td>${fecha_contratacion}</td>
            <td>
                <button type="button" class="btn btn-danger" id="eliminar" name="eliminar" value="${empleado.id}">
                    <i class="fa-solid fa-trash" style="color: #fafcff;" ></i>
                </button>
                <!-- USAR JS para que aparezca una modal al dar clic en modificar. 
                se debe conservar el id del empleado a modificar -->
                <button type="submit" class="btn btn-success" id="modificar" name="modificar" value="${empleado.id}">
                    <i class="fa-solid fa-pencil" style="color: #ffffff;"></i>
                </button>
            </td>
        </tr>`;
    });        
    contenido.innerHTML= html;    
}
