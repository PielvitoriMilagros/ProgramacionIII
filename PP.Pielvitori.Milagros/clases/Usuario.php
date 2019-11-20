<?php

class Usuario
{

    public $legajo;
    public $email;
    public $nombre;
    public $clave;
    public $fotoUno;
    public $fotoDos;

    function __construct($legajo, $email, $nombre, $clave, $fotoUno, $fotoDos)
    {
        $this->legajo = $legajo;
        $this->email = $email;
        $this->nombre = $nombre;
        $this->clave = $clave;
        $this->fotoUno = $fotoUno;
        $this->fotoDos = $fotoDos;
    }


    public function __get($property){
        if(property_exists($this, $property)) {
            return $this->$property;
        }
    }

    public function __set($property, $value){
        if(property_exists($this, $property)) {
            $this->$property = $value;
        }
    }



        public function __toString()
    {
        return "legajo: $this->legajo - email: $this->email - nombre: $this->nombre - clave: $this->clave </br>";
    }

    public  function toArray()
    {
        $arrayAux = array();
        array_push($arrayAux, $this->legajo);
        array_push($arrayAux, $this->email);
        array_push($arrayAux, $this->nombre);        
        array_push($arrayAux, $this->clave);
        array_push($arrayAux, $this->fotoUno);
        array_push($arrayAux, $this->fotoDos);
        array_push($arrayAux, "\n");

        return $arrayAux;
    }

    



}
