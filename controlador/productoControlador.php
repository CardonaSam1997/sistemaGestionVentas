<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
//Importar
require_once("../modelo/Productos.php");
require_once("../modelo/Proveedor.php");//realmente hago algo con este?
require_once("../modelo/Notificacion.php");
require_once("../modelo/Excel.php");
//Las funciones se usan el archivo.view
require_once("../funciones/funciones.php");

class ProductoController{
    private $productos;
    private $excel;

    private $error;
    private $respuesta;

    //get y set
    public function getError(){
        return $this->error;
    }    
    public function setError($error){
        $this->error = $error;
    }

    public function getRespuesta(){
        return $this->respuesta;
    }    
    public function setRespuesta($respuesta){
        $this->respuesta = $respuesta;
    }

    public function __construct(){
        $this->productos = new Producto();
        $this->excel = new Excel();
    }

    public function eliminar(){
        if(isset($_GET['eliminar'])){
            $id = $_GET['eliminar'];
            $this->productos->eliminarProductos($id);
            //despues de eliminar debemos llamar la lista          
        }
        
    }

    public function descargarExcel(){
            echo "dentro de excel";
            if(isset($_POST['excel'])){        
                $this->excel->crearExcel("productos");
            }
        
    }
    
    public function guardar(){
        if(isset($_POST['guardar'])){
            echo "dentro de guardar en controlador";
            $this->setError("");
            $this->setRespuesta("");
            $codigo = $_POST['codigo'];
            $nombre = $_POST['nombre'];
            $marca = $_POST['marca'];
            $precio = $_POST['precio'];
            $unidad = $_POST['unidad'];
            $categoria = $_POST['categoria'];
            $fechaV = $_POST['fechaV'];  
            $this->verificarCamposVacios($codigo,$nombre,$marca,$precio,$unidad,$categoria,$fechaV);
        }        
    }

    private function verificarCamposVacios($codigo,$nombre,$marca,$precio,$unidad,$categoria,$fechaV){
        $valor = false;
        if(empty($codigo) || empty($nombre) || empty($marca) || empty($precio) || empty($unidad)){
            $this->setError("Por favor rellenar todos los campos!!");
        }else{            
            $valor = $this->productos->guardarProductos($codigo,$nombre,$marca,$precio,$unidad,$categoria,$fechaV);            
            if($valor){//si es true
                $this->setError("El producto con el codigo '$codigo' ya se encuentra registrado");
            }else{
                $this->setRespuesta("Producto guardado exitosamente!");
            }            
        }
    }

    public function obtenerlista(){
        $lista = $this->productos->traerTodosProductos();
        return $lista;
    }

    //intentar usar este metodo con el fetch de JS
    public function modificar(){        
        header('content-type application/json');
        if(isset($_POST['modificar'])){
            $codigo = $_POST['codigo'];
            $nombre = $_POST['nombre'];
            $marca = $_POST['marca'];
            $precio = $_POST['precio'];
            $unidad = $_POST['unidad'];
            $categoria = $_POST['categoria'];
            $fechaV = $_POST['fechaV'];  
            $this->productos->actualizarProductos($codigo,$nombre,$marca,$precio,$unidad,$categoria,$fechaV);
            $datos =[];
            echo json_encode($datos);
        }
    }

    public function notificacionesFechas(){
        
    }
    
}

//Instancia
$productoController = new ProductoController();

if($_SERVER['REQUEST_METHOD'] == 'POST'){  
    $productoController->guardar();
    //descargar EXCEL CON FETCH
    $productoController->descargarExcel();
}

if($_SERVER['REQUEST_METHOD'] == 'GET'){
    $productoController->eliminar();
}

//Mensajes al guardar un producto
$error = $productoController->getError();
$mss = $productoController->getRespuesta();

//la lista se recorre en el archivo.view
$listaProductos=$productoController->obtenerlista();

$productoController->modificar();
require("../vista/inventario.view.php");
?>