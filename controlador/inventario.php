<?php
require_once("../modelo/Productos.php");

$productos = new Producto();
$listaProductos = $productos->traerTodosProductos();


//GUARDAR PRODUCTOS
if($_SERVER['REQUEST_METHOD'] == 'GET'){        
    $error;
    $mss;
    if(isset($_GET['guardar'])){        
        $codigo = $_GET['codigo'];
        $nombre = $_GET['nombre'];
        $marca = $_GET['marca'];
        $precio = $_GET['precio'];
        $categoria = $_GET['categoria'];
        $fechaV = $_GET['fechaV'];
        if(empty($codigo) || empty($nombre) || empty($marca) || empty($precio)){            
            $error = "Por favor rellenar todos los campos!!";
        }else{
            $r=$productos->guardarProductos($codigo,$nombre,$marca,$precio,$categoria,$fechaV);
            $mss = "Producto guardado exitosamente!";
        }
        
    }else if(isset($_GET['eliminar'])){
        echo "entro en eliminar <br>";
        //print_r($_GET['eliminar']);//obtengo el valor que se almacena en el vector get[eliminar]
        //debo crear eliminacion de productos de la BD
    }    
}


require("../vista/inventario.view.php");
?>