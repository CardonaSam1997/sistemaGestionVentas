<?php
require_once("../modelo/Productos.php");
//require("../funciones/funciones.php");

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
        print_r($_GET);
        $id = $_GET['eliminar'];
        $productos->eliminarProductos($id);
    }    
}

//compararFechas
$productoVencidos; //array que tenga los productos proximos a vencer
$listaFechasProductos = $productos->traerFechaVencimientoProductos(); //contiene las fechas de la BD
//Recorre las filas de la BD
foreach($listaFechasProductos as $fechaProductos){
    //ME SACA ERROR EN ESTA PARTE
    //almacena el valor que falta entre cada fecha
    //echo $fechaProductos[0]['fechaVencimiento'];
   //$fechaP = compararFechas("2023-11-30");

//   echo compararFechas($fechaProductos[0]['fechaVencimiento']);
    //compara valores
    if($fechaP <=  15){
   /*     echo "dentro dewl condicional 15";        
        $productoVencidos = 
        array($fechaP['codigo'] => $fechaP);*/
    }
}

/* Por cada una de las iteraciones del ciclo foreach va a guardar
el codigo del producto que tenga 5 o menos dias en comparacion de fechas y va
a guardar la cantidad de dias que le quedan*/


require("../vista/inventario.view.php");
?>