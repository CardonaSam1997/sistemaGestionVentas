<?php
session_start();

if($_SESSION['usuario']){
    header("Location: ./controlador/menuPrincipal.php"); //contenido pag
}else{
    header("Location: ./controlador/iniciarSesion.php"); //Iniciar sesion
}
?>