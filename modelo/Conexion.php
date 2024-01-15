<?php

class Conexion{
    private $user;
    private $passw;
    private $url;
    public $con;

    public function __construct(){
        $this->user = "root";
        $this->passw = "";
        $this->url = "mysql:host=localhost;port=3306;dbname=sistemagestion";
    }

    public function Conectar(){
        try{
            $this->con = new PDO($this->url,$this->user,$this->passw);            
            $this->con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $this->con;            
        }catch(PDOException $e){
            error_log("Error en la conexion: ".$e->getMessage());
        }
    }

    public function desconectar(){
        $this->con = null;
    }
}
?>