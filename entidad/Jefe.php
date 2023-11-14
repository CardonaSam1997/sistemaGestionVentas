<?php
require_once("Empleado.php");
class Jefe extends Empleado {
    private $bono;

    public function __construct($cedula, $nombre, $edad,$telefono, $correo, $direccion, $discapacitado, $cargo, $numeroEmpleado,$sueldo) {
        parent::__construct($cedula, $nombre, $edad,$telefono, $correo, $direccion, $discapacitado, $cargo,$numeroEmpleado,$sueldo);        
    }

    public function getBono() {
        return $this->bono;
    }

    public function setBono($bono) {
        $this->bono = $bono;
    }

    //@Override = Esto me recuerda que se esta sobreescribiendo este metodo
    public function obtenerSueldo() {        
        $total = parent::obtenerSueldo()+$this->getBono();
        return $total;
    }

}
?>
