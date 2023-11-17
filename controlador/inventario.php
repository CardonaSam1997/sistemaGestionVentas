<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
require_once("../modelo/Productos.php");
require_once("../modelo/Notificacion.php");
require("../funciones/funciones.php");

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
        $precio = $_GET['unidad'];
        $categoria = $_GET['categoria'];
        $fechaV = $_GET['fechaV'];
        if(empty($codigo) || empty($nombre) || empty($marca) || empty($precio) || empty($unidad)){            
            $error = "Por favor rellenar todos los campos!!";
        }else{
            //donde uso esta r? yo creo que no la uso
            $r=$productos->guardarProductos($codigo,$nombre,$marca,$precio,$unidad,$categoria,$fechaV);
            $mss = "Producto guardado exitosamente!";
        }        
    }else if(isset($_GET['eliminar'])){
        echo "entro en eliminar <br>";
        print_r($_GET);
        $id = $_GET['eliminar'];
        $productos->eliminarProductos($id);
    }
}

//INTENTAMOS LA MODAL PARA PODER TERMINAR PRODUCTOS. HACER UN COPIA Y PEGA Y TERMINAR EMPLEADOS
//compararFechas
$notificaciones;
//aunq esto ya funciona
//probar asi: $notificaciones = array();
$listaFechasProductos = $productos->traerFechaVencimientoProductos(); //contiene las fechas de la BD

foreach($listaFechasProductos as $fechaProductos){    
   //falta organizar las fechas, para que se con fechas dinamicas y modificar el 
   //numero del condicional  
   //RECORDAR QUE LAS NOTIFICACION VAN POR FECHA DE VENCIMIENTO  
    $fechaP = compararFechas("2023-11-30");
    if($fechaP <=  15){
        $notificaciones = new Notificacion($fechaProductos['codigo'],$fechaP);        
        $notificaciones->guardarNotificacion($notificaciones->getCodigo(),$notificaciones->getDias());
    }else{
        //eliminar datos de notificaciones con truncate
    }
}
/* Por cada una de las iteraciones del ciclo foreach va a guardar
el codigo del producto que tenga 5 o menos dias en comparacion de fechas y va
a guardar la cantidad de dias que le quedan*/


require("../vista/inventario.view.php");
?>