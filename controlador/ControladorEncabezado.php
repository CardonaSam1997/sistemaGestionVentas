<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
session_start(); 
require_once("../modelo/Notificacion.php"); //SIN PROBLEMAS 
/* creo que tengo que importar notificacion si lo hago tendre un error
ya que notificacion esta importado en inventario.php y el Controladorencabezado 
esta vinculado a todos los archivos.
No pueden haber 2 importaciones de un archivo a la vez entre archivos que estan relacionados*/
$notificaciones = Notificacion::obtenerNotificaciones();
$respuesta = empty($notificaciones) ? true : false;

//VERIFICAMOS LA SESION
if(!isset($_SESSION['usuario'])){
    header("Location: ../index.php");
}

//CERRAR SESION
if($_SERVER['REQUEST_METHOD'] == 'GET'){
    print_r($_GET);
    //ME OBLIGA A PRESIONAR 2 VECES PARA CERRAR SESION
    if(!empty($_GET['cerrar'])){
        session_destroy();
    }
  // echo "ENTRO..... al controladorEncabezado cerrar sesion";
   // print_r($_GET);           
}

require("../vista/componentes/encabezado.php");
?>