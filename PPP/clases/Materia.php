<?php

class Materia {

    private $nombre; 
    private $codigo; 
    private $cupo;
    private $aula;

    function __construct($nombre, $codigo, $cupo, $aula)
    {
        $this->nombre= $nombre;
        $this->codigo= $codigo;
        $this->cupo= $cupo;
        $this->aula= $aula;        
    }

    //GETTER && SETTERS
    public function __get($property)
    {
        if(property_exists($this, $property)) {
            return $this->$property;
        }
    }   

    public function __set($property, $value){
        if(property_exists($this, $property)) {
            $this->$property = $value;
        }
    }

    //---- Funciones ---
    public function __toString()
    {
        return "nombre: $this->nombre || codigo: $this->codigo || cupo: $this->cupo || aula: $this->aula </br>";
    }
}
?>
