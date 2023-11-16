<?php
require_once("Conexion.php");
class Producto{
    private $con;

    public function __construct(){
        $this->con = new Conexion();
    }

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

    public function guardarProductos($codigo,$nombre,$marca,$precio,$categoria,$fechaV){
        $query = "INSERT INTO productos
        (codigo,nombre,marca,precio,categoria,fechaVencimiento) 
        VALUES (:codigo,:nombre,:marca,:precio,:categoria,:fechaV)";
        try{//que retorna cuando el valor esta vacio? array vacio?
            $ps = $this->con->Conectar()->prepare($query);
            $ps->bindParam(":codigo",$codigo);
            $ps->bindParam(":nombre",$nombre);
            $ps->bindParam(":marca",$marca);
            $ps->bindParam(":precio",$precio);
            $ps->bindParam(":categoria",$categoria);
            $ps->bindParam(":fechaV",$fechaV);
            $ps->execute();                        
        }catch(PDOException $e){
            error_log("ERROR en guardarProductos: ".$e->getMessage());
        }finally{
            $ps = null;            
            $this->con->desconectar();
        }
    }

    //PROBAR ESTO
    public function eliminarProductos($id){
        $query = "DELETE FROM productos WHERE codigo= :codigo";
        try{
            $ps = $this->con->Conectar()->prepare($query);            
            $ps->bindParam(":codigo",$id);
            $ps->execute();           
            echo "producto eliminado";
        }catch(PDOException $e){
            error_log("ERROR en guardarProductos: ".$e->getMessage());
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