<?php
require_once("../modelo/Empleado.php");
$empleados = new Empleado();
$listaEmpleados = $empleados->traerTodosEmpleados();

require("../vista/empleados.view.php");
?>