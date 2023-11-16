$( document ).ready(function(){
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
   

    //DURA MUY POCO TIEMPO
   /* $("#recuperar").click(function(){		
        $valor = true;
	});*/
});

console.log("hola");
//FUNCIONA PARA EXTRAER ELEMENTOS DEL HTML
var a = document.getElementById('saludos');
console.log(a.textContent);


//como puedo hacer para verificar el valor de aqui?
/*$valor = false;
if($valor== true){
    Swal.fire({
        title: "¡Buen trabajo!",
        text: "Revisa tu correo para recuperar la contraseña!!",
        icon: "success"
    });
}*/


/*iniciar sesion
    const Toast = Swal.mixin({
        toast: true,
        position: "top-end",
        showConfirmButton: false,
        timer: 2000,
        timerProgressBar: true,
        didOpen: (toast) => {
          toast.onmouseenter = Swal.stopTimer;
          toast.onmouseleave = Swal.resumeTimer;
        }
    });
    Toast.fire({
        icon: "success",
        title: "Signed in successfully"
    });

});

*/
