<?php
class Persona{
    private $cedula;
    private $nombre;
    private $edad;
    private $direccion;

    // Constructor
    public function __construct($cedula, $nombre, $edad,$direccion) {
        $this->cedula = $cedula;
        $this->nombre = $nombre;
        $this->edad = $edad;
        $this->direccion = $direccion;
    }

    // Métodos get
    public function getCedula() {
        return $this->cedula;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function getEdad() {
        return $this->edad;
    }

    public function getDireccion() {
        return $this->direccion;
    }

    // Métodos set
    public function setCedula($cedula) {
        $this->cedula = $cedula;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function setEdad($edad) {
        $this->edad = $edad;
    }

    public function setDireccion($direccion) {
        $this->direccion = $direccion;
    }
}
?>