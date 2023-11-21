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
            $ps->bindValue(":numEmp",$numEmp,PDO::PARAM_STR);
            $ps->bindValue(":ced",$cedula,PDO::PARAM_STR);
            $ps->bindValue(":nom",$nombre,PDO::PARAM_STR);
            $ps->bindValue(":edad",$edad,PDO::PARAM_STR);
            $ps->bindValue(":tel",$telefono,PDO::PARAM_STR);
            $ps->bindValue(":email",$email,PDO::PARAM_STR);
            $ps->bindValue(":direcc",$direccion,PDO::PARAM_STR);
            $ps->bindValue(":discap",$discap);
            $ps->bindValue(":cargo",$cargo,PDO::PARAM_STR);
            $ps->bindValue(":sal",$salario);
            $ps->bindValue(":fechaC",$fechaC,PDO::PARAM_STR);
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