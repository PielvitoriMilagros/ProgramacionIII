<?php


class Sistema
{
    static public function cargarUsuario($legajo, $email, $nombre, $clave, $fotoUno, $fotoDos)
    {
        // Devuelve array de objetos del tipo que le paso
        $lista = self::LeerJSON(PATH_ARCHIVOS . "/usuarios.json", "Usuario");
        $Usuario = self::BuscaXCriterio($lista, "legajo", $legajo);

        if ($Usuario != null) {
            echo "<br>El Usuario ya existe<br>";
        } else {
            $nomFotoUno = "fotoUno_" . $legajo;
            self::cargarImagenPorNombre($fotoUno, $nomFotoUno, PATH_IMAGENES);
            $nomFotoDos = "fotoDos_" . $legajo;
            self::cargarImagenPorNombre($fotoDos, $nomFotoDos, PATH_IMAGENES);

            $Usuario = new Usuario($legajo, $email, $nombre, $clave, $nomFotoUno, $nomFotoDos);
            array_push($lista, $Usuario);
            self::guardarJSON($lista, PATH_ARCHIVOS . "/usuarios.json", "Usuario");
        }
    }


    static public function login($legajo, $clave)
    {
        $lista = self::LeerJSON(PATH_ARCHIVOS . "/usuarios.json", "Usuario");
        $listaFiltrada = self::SubListaXCriterio($lista, "legajo", $legajo, FALSE);

        if ($listaFiltrada == null) {
            echo "<br>No existe usuario con legajo: $legajo<br>";
        } else {
            $listaFiltradaClave = self::SubListaXCriterio($listaFiltrada, "clave", $clave, FALSE);
            if ($listaFiltradaClave == null) {
                echo "<br>No existe usuario con legajo: $legajo y clave: $clave<br>";
            } else {
                foreach ($listaFiltradaClave as $objeto) {
                    //$objeto->Mostrar();
                    echo $objeto;
                }
            }
        }
    }


    public static function grabarLog($caso, $hora, $ip)
    {
        // Devuelve array de objetos del tipo que le paso
        $lista = self::LeerJSON(PATH_ARCHIVOS . "/info.log", "Log");

        $Log = new Log($caso, $hora, $ip);
        array_push($lista, $Log);
        self::guardarJSON($lista, PATH_ARCHIVOS . "/info.log", "Log");
    }



    public static function modificarUsuario($legajo, $email, $nombre, $clave, $fotoUno, $fotoDos)
    {

        $lista = self::LeerJSON(PATH_ARCHIVOS . "/usuarios.json", "Usuario");

        $Usuario = self::BuscaXCriterio($lista, "legajo", $legajo);

        if ($Usuario == null) {
            echo "<br>El usuario NO existe, no se puede modificar<br>";
        } else {

            $nomFotoUno = "fotoUno_" . $legajo;
            self::cargarImagenPorNombre($fotoUno, $nomFotoUno, PATH_IMAGENES);
            $nomFotoDos = "fotoDos_" . $legajo;
            self::cargarImagenPorNombre($fotoDos, $nomFotoDos, PATH_IMAGENES);

            $Usuario->email = $email;
            $Usuario->nombre = $nombre;
            $Usuario->clave = $clave;
            $Usuario->nomFotoUno = $nomFotoUno;
            $Usuario->nomFotoDos = $nomFotoDos;

            self::guardarJSON($lista, PATH_ARCHIVOS . "/usuarios.json", "Usuario");
        }
    }







    // ***************** Funciones genéricas *****************

    public static function LeerJSON($nombreArchivo, $tipo)
    {
        $ruta = $nombreArchivo;

        if (file_exists($ruta)) {

            $archivo = fopen($ruta, "r");
            $listado = array();
            while (!feof($archivo)) {
                $renglon = fgets($archivo);
                if ($renglon != "") {
                    $objeto = json_decode($renglon);
                    switch ($tipo) {
                        case 'Usuario':
                            $Usuario = new Usuario($objeto->legajo, $objeto->email, $objeto->nombre, $objeto->clave, $objeto->fotoUno, $objeto->fotoDos);
                            array_push($listado, $Usuario);
                            break;
                        case 'Log':
                            $Log = new Log($objeto->caso, $objeto->hora, $objeto->ip);
                            array_push($listado, $Log);
                            break;
                    }
                }
            }
            fclose($archivo);
            if (count($listado) > 0) {

                return $listado;
            }
        }
        return null;
    }



    public static function guardarJSON($listado, $nombreArchivo, $tipo)
    {
        $archivo = fopen($nombreArchivo, "w");

        foreach ($listado as $objeto) {
            switch ($tipo) {
                case 'Usuario':
                    $array = array('legajo' => $objeto->legajo, 'email' => $objeto->email, 'nombre' => $objeto->nombre, 'clave' => $objeto->clave, 'fotoUno' => $objeto->fotoUno, 'fotoDos' => $objeto->fotoDos);
                    array_push($listado, $array);
                    fputs($archivo,  json_encode($array) . PHP_EOL);
                    break;
                case 'Log':
                    $array = array('caso' => $objeto->caso, 'hora' => $objeto->hora, 'ip' => $objeto->ip);
                    array_push($listado, $array);
                    fputs($archivo,  json_encode($array) . PHP_EOL);
                    break;
            }
        }

        fclose($archivo);
        return $listado;
    }


    public static function BuscaXCriterio($lista, $criterio, $dato)
    {
        $retorno = null;
        foreach ($lista as $objeto) {
            if ($objeto->$criterio == $dato) {
                $retorno = $objeto;
                break;
            }
        }
        return $retorno;
    }


    public static function SubListaXCriterio($lista, $criterio, $dato, $caseSensitive)
    {
        $retorno = null;
        $sublista = array();

        if ($caseSensitive) {
            foreach ($lista as $objeto) {
                if ($objeto->$criterio == $dato) { //si encuentra lo agrego en la sublista
                    array_push($sublista, $objeto);
                }
            }
        } else {
            foreach ($lista as $objeto) {
                if (strtolower($objeto->$criterio) == strtolower($dato)) { //si encuentra lo agrego en la sublista
                    array_push($sublista, $objeto);
                }
            }
        }

        if (count($sublista) > 0) {
            $retorno = $sublista;
        }
        return $retorno;
    }





    public function cargarImagenPorNombre($archivo, $nombre, $carpetaDestino)
    {
        //Hace path a guardar + nombre + extensión
        $destino = $carpetaDestino . $archivo["name"];

        $tipoArchivo = pathinfo($destino, PATHINFO_EXTENSION);
        $destino = $carpetaDestino . $nombre . ".$tipoArchivo";
        //        $uploadOk = TRUE;

        //VERIFICO QUE EL ARCHIVO NO EXISTA
                if (file_exists($destino)) {
                    $uploadOk = ManejadorDeArchivos::moverArchivoBackup($archivo["name"], $nombre, $destino);
                }

        //MUEVO EL ARCHIVO DEL TEMPORAL AL DESTINO FINAL
        if (move_uploaded_file($archivo["tmp_name"], $destino)) {
            echo "<br> Se subio exitosamente el archivo</br>";
        } else {
            echo "<br/>Lamentablemente ocurri&oacute; un error y no se pudo subir el archivo.";
        }
    }
}
