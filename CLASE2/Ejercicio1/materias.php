<?php

Class Materia
{
    public $nombre;
    public $cargaHoraria;


    function __construct($nombre,$carga)
    {
        $this->nombre = $nombre;
        $this->cargaHoraria = $carga;
    }

    function Mostrar()
    {
        echo 'Nombre: '.$this->nombre . '<br>';
        echo 'Carga: '.$this->cargaHoraria . '<br>';
    }


}


?>