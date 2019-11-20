<?php

// require_once '../alumno.php';
// require_once '../persona.php';

Class personaDAO
{
    static function Listar($array,$caso)
    {
/*        switch($caso)
        {
            case 1:
*/            foreach($array as $alumno)
            {
                $alumno->Mostrar();
            }
/*            break;
            case 2:
            foreach($array as $materia)
            {
                $materia->Mostrar();
            }
            break;
            default:
            echo 'Petición Inválida';
            break;        
        }  */
    }

    function Guardar()
    {   
        $alumno1 = new Alumno('Maria','Perez','1','111');
$alumno2 = new Alumno('Martin','Perales','2','222');
$arrayAlumno=array($alumno1,$alumno2);
        echo 'Se guardó el Array correspondiente';
    }

    function Modificar($array)
    {

    }



}


?>