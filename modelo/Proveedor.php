
<?php
require_once("Conexion.php");
class Proveedor{        
    private $con;    

    public function __construct(){
        $this->con = new Conexion();
    }

    public function traerNombreProveedor(){
        $query = "SELECT nombreEmpresa FROM proveedores";        
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

    public function traerTodosProveedores($id){
        $query = "SELECT * FROM proveedores";
        try{
            $ps = $this->con->Conectar()->prepare($query);
            $ps->bindValue(":id",$id,PDO::PARAM_INT);
            $ps->execute();
            $rs = $ps->fetchColumn(0);
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