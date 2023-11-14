<?php
require_once("Persona.php");

class Empleado extends Persona{
    private $numeroEmpleado;
    private $salario;
    private $cargo;
    private $discapacitado;
    private $telefono;
    private $correo;  
    private $fechaContratacion;  

    // Constructor
    public function __construct($cedula,$nombre,$edad, $direccion,$telefono, $correo, $discapacitado, $numeroEmpleado,$cargo,$salario, $fechaContratacion) {
        parent::__construct($cedula,$nombre,$edad,$direccion);
        $this->numeroEmpleado = $numeroEmpleado;
        $this->telefono = $telefono;
        $this->correo = $correo;        
        $this->discapacitado = $discapacitado;        
        $this->salario = $salario;
        $this->cargo = $cargo;
        $this->fechaContratacion = $fechaContratacion;
    }

    // Métodos get
    public function getTelefono() {
        return $this->telefono;
    }

    public function getCorreo() {
        return $this->correo;
    }

    public function getDiscapacitado() {
        return $this->discapacitado;
    }

    public function getNumeroEmpleado() {        
        return $this->numeroEmpleado;
    }

    public function getCargo() {
        return $this->cargo;
    }
    
    public function getFechaContratacion() {
        return $this->fechaContratacion;
    }

    // Métodos set
    public function setTelefono($telefono) {
        $this->telefono = $telefono;
    }

    public function setCorreo($correo) {
        $this->correo = $correo;
    }

    public function setDiscapacitado($discapacitado) {
        $this->discapacitado = $discapacitado;
    }

    public function setNumeroEmpleado($numeroEmpleado) {
        $this->numeroEmpleado = $numeroEmpleado;
    }

    public function setCargo($cargo) {
        $this->cargo = $cargo;
    }

    public function setFechaContratacion($fechaContratacion) {
        $this->fechaContratacion = $fechaContratacion;
    }
    
    // Método para obtener el salario (ejemplo)
    public function obtenersalario() {      
        return $this->salario;
    }

}
?>
