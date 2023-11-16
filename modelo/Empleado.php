<?php
require_once("Conexion.php");

class Empleado{
    private $con;

    public function __construct(){
        $this->con = new Conexion();
    }

    public function traerTodosEmpleados(){
        $query = "SELECT * FROM empleados";
        try{
            $ps = $this->con->Conectar()->prepare($query);
            $ps->execute();
            $rs = $ps->fetchAll(PDO::FETCH_ASSOC);
            return $rs;
        }catch(PDOException $e){
            error_log("ERROR en traerTodosEmpleados: ".$e->getMessage());
        }finally{
            $ps = null;
            $rs = null;
            $this->con->desconectar();
        }
    }

    public function guardarEmpleado($numEmp,$cedula,$nombre,$edad,$telefono,
    $email,$direccion,$discap,$cargo,$salario,$fechaC){
        $query = "INSERT INTO empleados
        (numero_empleado,cedula,nombre,edad,telefono,correo,
        direccion,discapacitado,cargo,salario,fecha_contratacion)
        VALUES(:numEmp,:ced,:nom,:edad,:tel,:email,
        :direcc,:discap,:cargo,:sal,:fechaC)";
        try{
            $ps = $this->con->Conectar()->prepare($query);
            $ps->bindParam(":numEmp",$numEmp);
            $ps->bindParam(":ced",$cedula);
            $ps->bindParam(":nom",$nombre);
            $ps->bindParam(":edad",$edad);
            $ps->bindParam(":tel",$telefono);
            $ps->bindParam(":email",$email);
            $ps->bindParam(":direcc",$direccion);
            $ps->bindParam(":discap",$discap);
            $ps->bindParam(":cargo",$cargo);
            $ps->bindParam(":sal",$salario);
            $ps->bindParam(":fechaC",$fechaC);
            $ps->execute();                        
        }catch(PDOException $e){
            error_log("ERROR en guardarEmpleados: ".$e->getMessage());
        }finally{
            $ps = null;            
            $this->con->desconectar();
        }
    }

}
?>