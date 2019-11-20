<?php

class Manejador
{

    public function alumnos()
    {
        Facultad::alumnos();
    }

    public function cargarAlumno()
    {
        if (isset($_POST["nombre"]) && isset($_POST["apellido"]) && isset($_POST["email"]) && isset($_FILES["foto"])) {
            Facultad::AltaAlumno($_POST["nombre"], $_POST["apellido"],  $_POST["email"], $_FILES["foto"]);
        } else {
            echo "Faltan datos";
        }
    }

    public function cargarMateria()
    {
        if (isset($_POST["nombre"]) && isset($_POST["codigo"]) && isset($_POST["cupo"]) && isset($_POST["aula"])) {
            Facultad::cargarMateria($_POST["nombre"], $_POST["codigo"],  $_POST["cupo"],  $_POST["aula"]);
        } else {
            echo "Faltan datos";
        }
    }

    public function consultarAlumno()
    {
        if (isset($_GET["apellido"])) {
            Facultad::consultarAlumno($_GET["apellido"]);
        } else {
            echo "Faltan datos";
        }
    }

    public function inscribirAlumno()
    {
        if (isset($_GET["nombre"]) && isset($_GET["apellido"]) && isset($_GET["email"]) && isset($_GET["materia"]) && isset($_GET["codigo"])) {
            Facultad::inscribirAlumno($_GET["nombre"], $_GET["apellido"], $_GET["email"], $_GET["materia"], $_GET["codigo"]);
        } else {
            echo "Faltan datos";
        }
    }

    public function inscripciones()
    {
        $apellido = null;
        $materia = null;
        $flag = 0;

        if (isset($_GET["apellido"])) {
            $apellido = $_GET["apellido"];
            $flag = 1;
        }

        if (isset($_GET["materia"])) {
            $materia = $_GET["materia"];
            $flag = $flag + 1;
        }

        if ($flag == 0 || $flag = 1) {
            Facultad::inscripciones($apellido, $materia);
        } else {
            echo "Se ingresaron datos de mas";
        }
    }

    public function modificarAlumno()
    {
        if (isset($_POST["nombre"]) && isset($_POST["apellido"]) && isset($_POST["email"]) && isset($_FILES["foto"])) {
            Facultad::modificarAlumno($_POST["nombre"], $_POST["apellido"],  $_POST["email"], $_FILES["foto"]);
        } else {
            echo "Faltan datos";
        }
    }


}
