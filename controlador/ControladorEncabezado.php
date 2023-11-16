<?php
session_start(); 
require("../funciones/funciones.php");


if(!isset($_SESSION['usuario'])){
    header("Location: ../index.php");
}


if($_SERVER['REQUEST_METHOD']=='GET'){
   echo "ENTRO.....";
   // print_r($_GET);       
    //session_destroy();
}

require("../vista/componentes/encabezado.php");
?>