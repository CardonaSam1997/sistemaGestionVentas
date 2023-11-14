<?php
class Producto {    
    private $codigoBarras;
    private $nombre;
    private $marca;
    private $precio;
    private $categoria;
    private $fechaVencimiento;

    public function __construct($codigoBarras, $nombre, $marca, $precio, $categoria, $fechaVencimiento) {        
        $this->codigoBarras = $codigoBarras;
        $this->nombre = $nombre;
        $this->marca = $marca;
        $this->precio = $precio;
        $this->categoria = $categoria;
        $this->fechaVencimiento = $fechaVencimiento;
    }

    // Métodos Get
    public function getCodigoBarras() {
        return $this->codigoBarras;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function getMarca() {
        return $this->marca;
    }

    public function getPrecio() {
        return $this->precio;
    }

    public function getCategoria() {
        return $this->categoria;
    }

    public function getFechaVencimiento() {
        return $this->fechaVencimiento;
    }

    // Métodos Set
    public function setCodigoBarras($codigoBarras) {
        $this->codigoBarras = $codigoBarras;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function setMarca($marca) {
        $this->marca = $marca;
    }

    public function setPrecio($precio) {
        $this->precio = $precio;
    }

    public function setCategoria($categoria) {
        $this->categoria = $categoria;
    }

    public function setFechaVencimiento($fechaVencimiento) {
        $this->fechaVencimiento = $fechaVencimiento;
    }
}
?>