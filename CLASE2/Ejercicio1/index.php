<?php
session_start();

include './persona.php';
include './alumno.php';
include './personaDAO.php';
include './materias.php';

//$arrayAlumno=array();

$materia1 = new Materia('Matemática',5);
$materia2 = new Materia('Lengua',4);
$arrayMateria=array($materia1,$materia2);


switch($_SERVER['REQUEST_METHOD'])
{
    case "GET":
    personaDAO::Listar($arrayAlumno,'1');
        break;
    case "POST":
        personaDAO::Guardar();
        break;
    case "PUT":
        break;
    case "DELETE":
        break;
}

session_destroy();
session_unset();

?>