<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
require_once("../modelo/Empleado.php");
require("../funciones/funciones.php");
$empleados = new Empleado();
$listaEmpleados = $empleados->traerTodosEmpleados();

//VERIFICAR CAMPOS VACIOS
//VERIFICAR INFORMACION UNICA
//AGREGAR A LA TABLA EMPLEADO LA FECHA DE TERMINACION DE CONTRATO


require("../vista/empleados.view.php");
?>