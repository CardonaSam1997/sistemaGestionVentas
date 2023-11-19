$( document ).ready(function(){

    //NO FUNCIONA ONCLIC Y PHP

    //si clic
    $(".passw").click(function(){		
        $(".capa").addClass("moverIzquierda");
        //$(".capa").removeClass("main .capa");
	});

    let num = 0;
    $("#menuHamburg").click(function(){
        if(num == 0){            
            $(".menuDespl").addClass("abrirMenuDespl");
            $("#lista").addClass("abrirLista");
            num = 1;            
        }else{            
            $(".menuDespl").removeClass("abrirMenuDespl");
            $("#lista").removeClass("abrirLista");            
            num = 0;
        }
	});
       
});


function mostrarModal(codigoProducto) {
    // Aquí puedes hacer lo que necesites con el código del producto
    // Por ejemplo, puedes guardarlo en una variable y luego mostrarlo en la modal
    var codigoSeleccionado = codigoProducto.toString().padStart(3, '0');

    // Muestra el código en la modal o realiza otras operaciones necesarias
    document.getElementById('codigoProductoModal').innerHTML = codigoSeleccionado;
}


