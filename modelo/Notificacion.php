<?php
require_once("Conexion.php");

class Notificacion{
    //probar asi, si no funciona convertir a estatica y probar nuevamente
    /* el array de tipo notificacion se crea con exito pero 
    no perdura, ¿COMO HACER QUE DURE?*/
    /*EL CODIGO HACE REFERENCIA AL CODIGO DEL PRODUCTO Y LOS DIAS LLEVAN EL VALOR
    DE LOS DIAS DE DIFERENCIA*/
    private $codigo;
    private $dias;

    public function __construct($codigo,$dias){
        $this->codigo = $codigo;
        $this->dias= $dias;
    }

    //GET
    public function getCodigo(){
        return $this->codigo;
    }

    public function getDias(){
        return $this->dias;
    }

    //SET
    public function setCodigo($codigo){
        $this->$codigo = $codigo;
    }

    public function setDias($dias){
        $this->$dias = $dias;
    }

    public function guardarNotificacion($codigoP,$dias){        
        //NO FUNCIONO, SIGUE INGRESANDO LOS PRODUCTOS(LOS DUPLICA)
        $query = "INSERT INTO notificaciones(fkProductos,dias)VALUES(:codigoP,:dias)
        ON DUPLICATE KEY UPDATE fkProductos = fkProductos";
        $con = new Conexion();
        try{
            $ps = $con->Conectar()->prepare($query);
            $ps->bindValue(":codigoP",$codigoP);
            $ps->bindValue(":dias",$dias);            
//          $ps->bindValue(":idEmpl",$idEmpl);
            $ps->execute();            
        }catch(Exception $e){
            error_log("ERROR al guardar la notificacion: ".$e->getMessage());
        }finally{
            $ps = null;
            $con->desconectar();
        }
    }

    public static function obtenerNotificaciones(){        
        $query = "SELECT * FROM notificaciones";
        $con = new Conexion();
        try{
            $ps = $con->Conectar()->prepare($query);
            $ps->execute();            
            $rs = $ps->fetchAll(PDO::FETCH_ASSOC);
            return $rs;
        }catch(Exception $e){
            error_log("ERROR al guardar la notificacion: ".$e->getMessage());
        }finally{
            $ps = null;
            $rs = null;
            $con->desconectar();
        }
    }    
    
}


?>