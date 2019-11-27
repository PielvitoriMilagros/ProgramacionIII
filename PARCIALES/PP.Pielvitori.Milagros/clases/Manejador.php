<?php

require_once './clases/Sistema.php';
require_once './clases/ManejadorDeArchivos.php';

class Manejador
{
    public function cargarUsuario()
    {
        if (isset($_POST["legajo"]) && isset($_POST["email"]) && isset($_POST["nombre"]) && isset($_POST["clave"]) && isset($_FILES["fotoUno"]) && isset($_FILES["fotoDos"])) {
            Sistema::cargarUsuario($_POST["legajo"], $_POST["email"],  $_POST["nombre"], $_POST["clave"], $_FILES["fotoUno"], $_FILES["fotoDos"]);
        } else {
            echo "Faltan datos";
        }
    }

    public function login()
    {
        if (isset($_GET["legajo"]) && isset($_GET["clave"])) {
            Sistema::login($_GET["legajo"],$_GET["clave"]);
        } else {
            echo "Faltan datos";
        }
    }



    public function grabarLog($caso,$hora,$ip)
    {
        Sistema::grabarLog($caso,$hora,$ip);
    }

    public function modificarUsuario()
    {
        Sistema::modificarUsuario($_POST["legajo"], $_POST["email"],  $_POST["nombre"], $_POST["clave"], $_FILES["fotoUno"], $_FILES["fotoDos"]);
    }



}




?>