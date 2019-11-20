<?php

//require_once '../persona.php';

Class Alumno extends Persona
{
    public $legajo;


    function __construct($nombre,$apellido,$dni,$legajo)
    {
        parent::__construct($nombre,$apellido,$dni);
        $this->legajo = $legajo;
    }

    function Mostrar()
    {
        echo 'Nombre: '.$this->nombre . '<br>';
        echo 'Apellido: '.$this->apellido . '<br>';
        echo 'Dni: '.$this->dni . '<br>';
        echo 'Legajo: '.$this->legajo . '<br>';
    }


}


?>