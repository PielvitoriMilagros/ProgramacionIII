<?php

// Muestra información acerca de la variable
var_dump($_FILES);
// Antes de arrancar, entrar al PostMan y en Body agregar una imagen para cargar
// Se hace con los corchetes así porque es un array de doble entrada $_FILES
$array = explode('.',$_FILES['fichero']['name']);

// Nombre de la imagen temporal a guardar, donde la quiero guardar + / + nombre de la imagen
move_uploaded_file($_FILES['fichero']['tmp_name'],"C:\\xampp\htdocs\MILI"."/".$_FILES['fichero']['name']);


?>