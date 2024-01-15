<?php
require_once("Conexion.php");

class Producto{

    private $id;
    private $error;
    private $con;    

    public function __construct(){
        $this->con = new Conexion();
    }

    public  function setId($id){
        $this->id = $id;
    }

    public  function getId(){
        return $this->id;
    }

    public  function getError(){
        return $this->error;
    }

    public function traerProductoUnico($id){
        $query = "SELECT * FROM productos WHERE id = :id";        
        try{
            $ps = $this->con->Conectar()->prepare($query);
            $ps->bindValue(":id",$id,PDO::PARAM_INT);
            $ps->execute();
            $rs = $ps->fetch(PDO::FETCH_ASSOC);
            return $rs;
        }catch(PDOException $e){
            error_log("ERROR en traerTodosProductos: ".$e->getMessage());
        }finally{
            $ps = null;
            $rs = null;
            $this->con->desconectar();
        }
    }

    //USARLO EN LA MODAL
    public function traerTodosProductos(){        
        $query = "SELECT * FROM productos";
        try{
            $ps = $this->con->Conectar()->prepare($query);
            $ps->execute();
            $rs = $ps->fetchAll(PDO::FETCH_ASSOC);
            return $rs;
        }catch(PDOException $e){
            error_log("ERROR en traerTodosProductos: ".$e->getMessage());
        }finally{
            $ps = null;
            $rs = null;
            $this->con->desconectar();
        }
    }

    public function guardarProductos($codigo,$nombre,$marca,$precio,$unidad,$categoria,$fechaV){
        $query = "INSERT INTO productos
        (codigo,nombre,marca,precio,unidad,categoria,fechaVencimiento) 
        VALUES (:codigo,:nombre,:marca,:precio,:unidad,:categoria,:fechaV)";
        try{
            $ps = $this->con->Conectar()->prepare($query);
            $ps->bindValue(":codigo",$codigo, PDO::PARAM_STR);
            $ps->bindValue(":nombre",$nombre, PDO::PARAM_STR);
            $ps->bindValue(":marca",$marca,PDO::PARAM_STR);
            $ps->bindValue(":precio",$precio,PDO::PARAM_STR);
            $ps->bindValue(":unidad",$unidad,PDO::PARAM_INT);
            $ps->bindValue(":categoria",$categoria,PDO::PARAM_STR);
            $ps->bindValue(":fechaV",$fechaV,PDO::PARAM_STR);
            $ps->execute();                   
        }catch(PDOException $e){
            error_log("ERROR en guardarProductos: ".$e->getMessage());
            $error = $e->getCode();
            if($error == 23000){
                return true;                
            }
        }finally{
            $ps = null;
            $this->con->desconectar();
        }
    }
    
    public function eliminarProductos($id){
        $query = "DELETE FROM productos WHERE codigo= :codigo";
        try{
            $ps = $this->con->Conectar()->prepare($query);
            $ps->bindValue(":codigo",$id,PDO::PARAM_STR);
            $ps->execute();
        }catch(PDOException $e){
            error_log("ERROR en guardarProductos: ".$e->getMessage());
        }finally{
            $ps = null;
            $this->con->desconectar();
        }
    }

    public function actualizarProductos($codigo,$nombre,$marca,$precio,$unidad,$categoria,$fechaV){
        $query = "UPDATE productos SET nombre = :nombre, marca = :marca, categoria = :categ, precio = :precio,
        unidad = :unidad, fechaVencimiento = :fechaV WHERE codigo = :codigo";
        try{
            $ps = $this->con->Conectar()->prepare($query);
            $ps->bindValue(":codigo",$codigo,PDO::PARAM_STR);
            $ps->bindValue(":nombre",$nombre,PDO::PARAM_STR);
            $ps->bindValue(":marca",$marca,PDO::PARAM_STR);
            $ps->bindValue(":categoria",$categoria,PDO::PARAM_STR);
            $ps->bindValue(":precio",$precio,PDO::PARAM_STR);
            $ps->bindValue(":unidad",$unidad,PDO::PARAM_INT);
            $ps->bindValue(":fechaV",$fechaV,PDO::PARAM_STR);
            $ps->execute();
        }catch(PDOException $e){
            error_log("ERROR en actualizarProductos: ".$e->getMessage());
        }finally{
            $ps = null;
            $this->con->desconectar();
        }
    }

    public function traerFechaVencimientoProductos(){
        $query = "SELECT codigo,fechaVencimiento FROM productos";
        try{
            $ps = $this->con->Conectar()->prepare($query);
            $ps->execute();
            $rs = $ps->fetchAll(PDO::FETCH_ASSOC);
            return $rs;
        }catch(PDOException $e){
            error_log("ERROR en traerTodosProductos: ".$e->getMessage());
        }finally{
            $ps = null;
            $rs = null;
            $this->con->desconectar();
        }
    }
}
?>