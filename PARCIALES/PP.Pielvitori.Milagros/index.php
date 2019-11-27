<?php

require_once './clases/Usuario.php';
require_once './clases/Log.php';
require_once './clases/Manejador.php';

define("PATH_ARCHIVOS", "./archivos");
define("PATH_IMAGENES", "./img/fotos/");
date_default_timezone_set('America/Argentina/Buenos_Aires');

$metodo = $_SERVER['REQUEST_METHOD'];


switch($metodo)
{
    case "POST":
    switch(key($_POST))
    {
        case 'cargarUsuario':
        Manejador::cargarUsuario();
        Manejador::grabarLog('cargarUsuario',date('hms'),$_SERVER['REMOTE_ADDR']);
        break;
        case 'modificarUsuario':
            Manejador::modificarUsuario();
            Manejador::grabarLog('modificarUsuario',date('hms'),$_SERVER['REMOTE_ADDR']);
    }
    case "GET":
    switch(key($_GET))
    {
        case 'login':
        Manejador::login();
        Manejador::grabarLog('login',date('hms'),$_SERVER['REMOTE_ADDR']);
        break;
    }
}




?>