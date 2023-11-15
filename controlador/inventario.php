<?php
require("../funciones/funciones.php");
require_once("../modelo/Productos.php");
$productos = new Producto();

$listaProductos = $productos->traerTodosProductos();

$resp="SALUDO";
//GUARDAR PRODUCTOS
if($_SERVER['REQUEST_METHOD'] == 'GET'){    
    $codigo = $_GET['codigo'];
    $nombre = $_GET['nombre'];
    $marca = $_GET['marca'];
    $precio = $_GET['precio'];
    $categoria = $_GET['categoria'];
    $fechaV = $_GET['fechaV'];
    $r=$productos->guardarProductos($codigo,$nombre,$marca,$precio,$categoria,$fechaV);    
}


require("../vista/inventario.view.php");
?>