<?php

class Log
{

    public $caso;
    public $hora;
    public $ip;


    function __construct($caso, $hora, $ip)
    {
        $this->caso = $caso;
        $this->hora = $hora;
        $this->ip = $ip;
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


    



}
