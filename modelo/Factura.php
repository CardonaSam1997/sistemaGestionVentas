<?php
require_once("Conexion.php");

class Factura{
    private $con;
    private $error;
    private $resp;

    public function __construct(){
        $this->con = new Conexion();
    }

    //GET Y SET
    public function setError($error){
        $this->error = $error;
    }

    public function getError(){
        return $this->error;
    }

    public function setResp($resp){
        $this->resp = $resp;
    }

    public function getResp(){
        return $this->resp;
    }

    public function crearConsulta($codigoFactura,$fechaCompra,$direccionEmpresa,
    $fkCliente,$fkEmpleado,$fkProducto,$formaPago,$subtotal,$iva,$total){
        $query = "INSERT INTO facturas (codigoFactura, fechaCompra, direccionEmpresa, 
        fkCliente, fkEmpleado, fkProducto, formaPago, subtotal, iva, total)
        VALUES (:codigoFactura, :fechaCompra, :direccionEmpresa, 
        :fkCliente, :fkEmpleado, :fkProducto, :formaPago, :subtotal, :iva, :total)";
        try{
            $ps = $this->con->Conectar()->prepare($query);
            $ps->bindValue(":codigoFactura",$codigoFactura,PDO::PARAM_INT);
            $ps->bindValue(":fechaCompra",$fechaCompra,PDO::PARAM_STR);
            $ps->bindValue(":direccionEmpresa",$direccionEmpresa,PDO::PARAM_STR);
            $ps->bindValue(":fkCliente",$fkCliente,PDO::PARAM_INT);
            $ps->bindValue(":fkEmpleado",$fkEmpleado, PDO::PARAM_INT);
            $ps->bindValue(":fkProducto",$fkProducto,PDO::PARAM_INT);
            $ps->bindValue(":formaPago",$formaPago,PDO::PARAM_STR);
            $ps->bindValue(":subtotal",$subtotal,PDO::PARAM_INT);
            $ps->bindValue(":iva",$iva,PDO::PARAM_INT);
            $ps->bindValue(":total",$total,PDO::PARAM_INT);
            $ps->execute();
            if(!$ps->rowCount() > 0){
                $this->setError("Error al crear la factura");
            }else{
                $this->setResp("Factura creada exitosamente");                
            }
        }catch(PDOException $e){
            error_log("ERROR en crearConsulta Factura");
            echo "ERROR CODE CREAR FACTURA: ".$e->getCode();
        }finally{
            $ps = null;
            $this->con->desconectar();
        }
    }
}

/**
 * DATOS
 * ********************CONSTANTES EN ARCHIVOPDF**************
 * NIT  
 * DIRECCION
 * TELEFONO
 * 
 * ***************VARIABLES***************
 * FECHA COMPRA CON HORA
 * NOMBRE CLIENTE Y CC
 * NOMBRE PRODUCTOS Y CANTIDAD
 * SUBTOTAL
 * TOTAL
 * FORMA DE PAGO
 * NUMERO FACTUYRA 
 */

?>