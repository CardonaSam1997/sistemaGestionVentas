<?php
require_once("../modelo/Sesion.php");

//Instancia de objetos
$iniciarSesion = new IniciarSesion();

if(isset($_POST['ingresar'])){
    $error = "";
    $user = $_POST['user'];
    $passw = $_POST['passw'];
    if(empty($user) || empty($passw) ){//estan vacios
        $error = "Por favor llenar todos los campos!!";
    }else{//no estan vacios
        $verificar = $iniciarSesion->verificarUsuario($user,$passw);
        if($verificar == true){//true
            header("Location: ./contenido.php");
        }else{//no agarra este !! HAY QUE MIRAR PORQUE!!
           $error = "El usuario o la contraseña son incorrectos";
        }
    }
}

/* CUANDO ENVIO EL FORMULARIO LA CAPA VUELE A SUS VALORES NORMALES
TENGO QUE QUITARLE SUS VALORES NORMALES DEL ARCHIVO CSS
PARA QUE AL ENVIAR EL FORMULARIO LA CAPA SE QUEDE EN LEFT
Y CUANDO PRESIONE EL BOTON OK DE SWEET ALERT VOLVER A AGREGARLE ESA CAPA Y RETIRARLE
LA OTRA(MOVIMIENTOIZQUIERDO)*/ 
//CUANDO EMAIL ESTA VACIO NO SALE EL MENSAJE DE ERROR -- SE RESETEA LA PAGINA
if(isset($_GET['recuperar'])){
    $errorP = "";
    $email = $_GET['email'];
    if(empty($email)){
        $errorP = "Por favor ingresar un correoqqq";
    }else{
        echo $email;
    }   
}


require("../vista/sesion.view.php");
?>