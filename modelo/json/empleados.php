<?php
require_once("../Empleado.php");
header('Content-Type: application/json; charset=utf-8');

$empleado = new Empleado();
//devuelve un array asociativo de la BD
$datos = $empleado->traerTodosEmpleados();

echo json_encode($datos);

?>