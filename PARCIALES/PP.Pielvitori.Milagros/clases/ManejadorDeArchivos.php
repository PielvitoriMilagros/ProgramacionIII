<?php

class ManejadorDeArchivos
{
	
	function __construct()
	{
		date_default_timezone_set("America/Argentina/Buenos_Aires");
	}


	public  static function backupArchivo($Origen)
	{
		copy($Origen,"backup/".pathinfo($Origen,PATHINFO_FILENAME)."_".date("ymhi").".".pathinfo($Origen,PATHINFO_EXTENSION));
	}

	public static function moverArchivoBackup($archivoOriginal , $nuevoArchivo, $destino)
	{
		$arrayDeDatos = explode('.', $archivoOriginal); //agarramos el archivo original y lo desarmamos
		$nuevoDestino = "./img/backup/" . $nuevoArchivo.date("Ymd_hms").".$arrayDeDatos[1]"; //hacemos un nuevo destino url con el nuevo nombre de archivo y la extension del original
		
		//echo "NUEVO DESTINO $nuevoDestino";
		copy($destino, $nuevoDestino ); //movemos ese archivo al nuevo destino

		$destino ="./archivos/".$nuevoArchivo.".$arrayDeDatos[1]";

		return TRUE;
	}



}

?>