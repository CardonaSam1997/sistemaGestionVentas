<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

session_start(); 
/** Se extraen las notificaciones y se guardan en un array
 *  se verifica si el array esta lleno o vacio
 *  segun su estado 'true o 'false' se toma accion en 
 *  encabezado.view
 */
require_once("../modelo/Notificacion.php"); //SIN PROBLEMAS 

$notificaciones = Notificacion::obtenerNotificaciones();
$respuesta = empty($notificaciones) ? true : false;


//VERIFICAMOS LA SESION
if(!isset($_SESSION['usuario'])){
    header("Location: ../index.php");
}

//CERRAR SESION
if($_SERVER['REQUEST_METHOD'] == 'GET'){    
    //ME OBLIGA A PRESIONAR 2 VECES PARA CERRAR SESION, corregir
    if(!empty($_GET['cerrar'])){
        session_destroy();
    }
}

require("../vista/componentes/encabezado.php");
?>