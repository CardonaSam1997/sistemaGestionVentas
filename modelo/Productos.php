<?php
require_once("Conexion.php");

class Producto{

    private $id;
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

    public function traerTodosProductos($valor){
        $query = "";
        if($valor == 1){
            $query = "SELECT * FROM productos";
        }else{

        }
        
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
            $ps->bindParam(":codigo",$codigo, PDO::PARAM_STR);
            $ps->bindParam(":nombre",$nombre, PDO::PARAM_STR);
            $ps->bindParam(":marca",$marca,PDO::PARAM_STR);
            $ps->bindParam(":precio",$precio,PDO::PARAM_STR);
            $ps->bindParam(":unidad",$unidad,PDO::PARAM_INT);
            $ps->bindParam(":categoria",$categoria,PDO::PARAM_STR);
            $ps->bindParam(":fechaV",$fechaV,PDO::PARAM_STR);
            $ps->execute();                   
        }catch(PDOException $e){
            error_log("ERROR en guardarProductos: ".$e->getMessage());
        }finally{
            $ps = null;
            $this->con->desconectar();
        }
    }
    
    public function eliminarProductos($id){
        $query = "DELETE FROM productos WHERE codigo= :codigo";
        try{
            $ps = $this->con->Conectar()->prepare($query);
            $ps->bindParam(":codigo",$id,PDO::PARAM_STR);
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
            $ps->bindParam(":codigo",$codigo,PDO::PARAM_STR);
            $ps->bindParam(":nombre",$nombre,PDO::PARAM_STR);
            $ps->bindParam(":marca",$marca,PDO::PARAM_STR);
            $ps->bindParam(":categoria",$categ,PDO::PARAM_STR);
            $ps->bindParam(":precio",$precio,PDO::PARAM_STR);
            $ps->bindParam(":unidad",$unidad,PDO::PARAM_INT);
            $ps->bindParam(":fechaV",$fechaV,PDO::PARAM_STR);
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