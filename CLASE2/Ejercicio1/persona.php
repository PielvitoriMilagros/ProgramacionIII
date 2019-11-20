<?php

Class Persona
{
    public $nombre;
    public $apellido;
    public $dni;


    function __construct($nombre,$apellido,$dni)
    {
        $this->nombre =$nombre;
        $this->apellido =$apellido;
        $this->dni = $dni;
    }



}


?>