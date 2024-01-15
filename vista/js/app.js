$( document ).ready(function(){

    // -- PRUEBA
    $(".clic").click(function(){
        $(".tooltip-bottom").addClass("abrir");
	});

    //si clic
    $(".passw").click(function(){		
        $(".capa").addClass("moverIzquierda");
        //$(".capa").removeClass("main .capa");
	});

    let abrir = true;
    $("#menuHamburg").click(function(){
        if(abrir === true){            
            $(".menuDespl").addClass("abrirMenuDespl");
            $(".cont-lista p").addClass("abrirLista");
            abrir = false;
        }else{            
            $(".menuDespl").removeClass("abrirMenuDespl");
            $(".cont-lista p").removeClass("abrirLista");            
            abrir = true;
        }
	});
       
});


function mostrarModal(codigoProducto,nombre) {
    // Aquí puedes hacer lo que necesites con el código del producto
    // Por ejemplo, puedes guardarlo en una variable y luego mostrarlo en la modal
    var codigoSeleccionado = codigoProducto.toString().padStart(3, '0');

    // Muestra el código en la modal o realiza otras operaciones necesarias
    document.getElementById('codigoProductoModal').innerHTML = codigoSeleccionado;
    document.getElementById('nombre').innerHTML = nombre;
}