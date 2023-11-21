<?php
session_start();
require_once("Conexion.php");

class IniciarSesion{
    private $con;

    public function __construct(){
        $this->con = new Conexion();
    }

    public function verificarUsuario($user,$passw){
        //COMPROBAR SI ESTA SENTENCIA FUNCIONA!!
        $query = "SELECT empleados.nombre, sesiones.contrasena, sesiones.rol FROM sesiones 
        JOIN empleados ON fkEmpleado = empleados.id 
        WHERE sesiones.usuario = :user AND sesiones.contrasena = :passw";
        try{
            $ps = $this->con->Conectar()->prepare($query);
            $ps->bindValue(":user",$user, PDO::PARAM_STR);
            $ps->bindValue(":passw",$passw, PDO::PARAM_STR);
            $ps->execute();
            $rs = $ps->fetch(PDO::FETCH_ASSOC);            
            //DEBERIA IMPRIMIR PARA VER COMO SALE ESTO??
            if(is_array($rs)){
                $_SESSION['usuario'] = $rs['nombre'];
                $_SESSION['rol'] = $rs['rol'];
                $salida = $this->compararPassword($passw,$rs['contrasena']);
                return $salida;
            }
        }catch(PDOException $e){
            error_log("ERROR en verificarUsuario: ".$e->getMessage());
        }finally{
            $ps = null;
            $rs = null;
            $this->con->desconectar();
        }
    }

    //FALTA ENCRIPTAR LAS CONTRASEÑAS
    private function compararPassword($passw1,$passw2){
        /*encriptar contraseña 1 y compararla con la extraccion de bd que es contraseña 2.
        devolver valor booleano*/
        $valor = false;
        if($passw1 == $passw2){
            $valor = true;            
        }        
        return $valor;
    }


}
?>