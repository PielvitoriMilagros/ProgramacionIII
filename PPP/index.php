<?php
    require_once './clases/Facultad.php';
    require_once './manejador.php';
    

   define("PATH_ARCHIVOS", "./archivos"); 

   

    date_default_timezone_set('America/Argentina/Buenos_Aires');

    $metodo = $_SERVER['REQUEST_METHOD'];

    switch ($metodo)
     {
        case "GET":
             switch (key($_GET)) 
             {
                case 'consultarAlumno':
                    Manejador::consultarAlumno();
                    break;
                case 'inscribirAlumno':
                    Manejador::inscribirAlumno();
                    break;
                case 'inscripciones':
                    Manejador::inscripciones();
                    break;
                case 'alumnos':
                    Manejador::alumnos();
                    break;
                
             }// FIN switch (key($_GET)) 

             break;

        case "POST":
            switch (key($_POST)) 
            {
                case 'cargarAlumno':
                    Manejador::cargarAlumno();
                    break;

                case 'cargarMateria':
                    Manejador::cargarMateria();
                    break;

                case 'modificarAlumno':
                    Manejador::modificarAlumno();
                    break;
            }// FIN switch (key($_POST))             
            break;

        } //FIN switch($metodo)    

    ?>