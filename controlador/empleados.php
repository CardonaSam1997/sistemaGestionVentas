<?php
require_once("../modelo/Empleado.php");
$empleados = new Empleado();
$listaEmpleados = $empleados->traerTodosEmpleados();

//VERIFICAR CAMPOS VACIOS
//VERIFICAR INFORMACION UNICA
//AGREGAR A LA TABLA EMPLEADO LA FECHA DE TERMINACION DE CONTRATO


require("../vista/empleados.view.php");
?>