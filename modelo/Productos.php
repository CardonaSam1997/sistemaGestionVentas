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
        (codigo,nombre,marca,precio,categoria) 
        VALUES (:codigo,:nombre,:marca,:precio,:categoria)";
        try{
            $ps = $this->con->Conectar()->prepare($query);
            $ps->bindParam(":codigo",$codigo);
            $ps->bindParam(":nombre",$nombre);
            $ps->bindParam(":marca",$marca);
            $ps->bindParam(":precio",$precio);
            $ps->bindParam(":categoria",$categoria);
            $ps->bindParam(":fechaV",$fechaV);
            $ps->execute();            
            return "funciona guardar";
        }catch(PDOException $e){
            error_log("ERROR en guardarProductos: ".$e->getMessage());
        }finally{
            $ps = null;            
            $this->con->desconectar();
        }
    }


}

$p = new Producto();

$r=$p->guardarProductos("q10","sam","humano",2000,"humano","2023/11/15");    
/**ALERTA, SI EL PRODUCTO CON EL CODIGO A INSERTAR YA ESTA, NO DEVULVE RESPUESTA.
 * TOCA COLOCAR SI R = NO ES ISSET ENTONCES MOSTRAR MENSAJE DE ADVERTENCIA AL USUARIO
 */
//EL ERROR ES POR LA FECHA, NO INGRESA LA FECHA, NO INGRESA NINGUN PRODUCTO
echo $r;
if(isset($r)){
    echo "dentroaa";
}else{
   // echo "sin resultado";
}
?>