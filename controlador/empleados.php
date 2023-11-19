<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
//Importar paquetes
require_once("../modelo/Empleado.php");
require_once("../modelo/Excel.php"); //genera error ???
require_once("../modelo/Notificacion.php");
/* se importan funciones y se usan en empleados.view */
require("../funciones/funciones.php");

//instancias
$empleados = new Empleado();
$excel = new Excel();

/* Almaceno los empleados de la BD en un array asociativo
y los imprimo en la ventana empleados.view con
un ciclo foreach en una tabla */
$listaEmpleados = $empleados->traerTodosEmpleados();

//VERIFICAR CAMPOS VACIOS
//VERIFICAR INFORMACION UNICA
//que solo aparezcan empleados activos, en excel todos los empleados
//AGREGAR A LA TABLA EMPLEADO LA FECHA DE TERMINACION DE CONTRATO




//DESCARGAR EXCEL DE EMPELADOS
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if(isset($_POST['excel'])){        
        $excel->crearExcel("empleados");
    }
}

require("../vista/empleados.view.php");
?>