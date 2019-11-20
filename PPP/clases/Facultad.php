
<?php
require_once './clases/Alumno.php';
require_once './clases/Materia.php';
require_once './clases/Inscripciones.php';

class Facultad
{

    //PUNTO - 1
    static public function AltaAlumno($nombre, $apellido, $email,  $foto)
    {
        // Devuelve array de objetos del tipo que le paso
        $lista = self::LeerJSON(PATH_ARCHIVOS . "/Alumno.txt", "Alumno");
        $Alumno = self::BuscaXCriterio($lista, "email", $email);

        if ($Alumno != null) {
            echo "<br>El Alumno ya existe<br>";
        } else {
            $nomFoto = "SIN_FOTO";
            if ($foto != null) {
                $nomFoto = "foto_" . $apellido;
                self::cargarImagenPorNombre($foto, $nomFoto, "./fotosAlumno/");
            }

            $Alumno = new Alumno($nombre, $apellido, $email, $nomFoto);
            array_push($lista, $Alumno);
            self::guardarJSON($lista, PATH_ARCHIVOS . "/Alumno.txt", "Alumno");
        }
    }

    //PUNTO - 2    
    static public function consultarAlumno($apellido)
    {
        $lista = self::LeerJSON(PATH_ARCHIVOS . "/Alumno.txt", "Alumno");
        $listaFiltrada = self::SubListaXCriterio($lista, "apellido", $apellido, FALSE);

        if ($listaFiltrada == null) {
            echo "<br>No existe alumno con apellido: $apellido<br>";
        } else {
            foreach ($listaFiltrada as $objeto) {
                //$objeto->Mostrar();
                echo $objeto;
            }
        }
    }


    //PUNTO - 3
    static public function cargarMateria($nombre, $codigo, $cupo,  $aula)
    {
        $lista = self::LeerJSON(PATH_ARCHIVOS . "/Materia.txt", "Materia");
        $objeto = self::BuscaXCriterio($lista, "codigo", $codigo);

        if ($objeto != null) {
            echo "<br>La Materia ya existe<br>";
        } else {
            $Materia = new Materia($nombre, $codigo, $cupo, $aula);
            array_push($lista, $Materia);
            self::guardarJSON($lista, PATH_ARCHIVOS . "/Materia.txt", "Materia");
        }
    }

    //PUNTO - 4
    static public function inscribirAlumno($nombre, $apellido, $email, $materia, $codigo)
    {
        $listaMaterias = self::LeerJSON(PATH_ARCHIVOS . "/Materia.txt", "Materia");
        $objeto = self::BuscaXCriterio($listaMaterias, "codigo", $codigo);

        if ($objeto == null) {
            echo "<br>La Materia NO existe<br>";
        } else {
            if ($objeto->cupo <= 0) {
                echo "<br>No hay Cupo en $objeto->nombre <br>";
            } else {
                //echo "<br>Nueva Inscripcion <br>";
                $listaInscripciones = self::LeerJSON(PATH_ARCHIVOS . "/Inscripciones.txt", "Inscripciones");
                //No valido datos: por ejemplo $objeto->nombre == $materia ... (no lo pidieron...)
                $Inscripcion = new Inscripciones($nombre, $apellido, $email, $codigo, $materia);
                array_push($listaInscripciones, $Inscripcion);

                //Resto en 1 el cupo, con __set (metodo magico)= __get (metodo magico) -1
                $objeto->cupo = ($objeto->cupo - 1);

                self::guardarJSON($listaMaterias, PATH_ARCHIVOS . "/Materia.txt", "Materia");
                self::guardarJSON($listaInscripciones, PATH_ARCHIVOS . "/Inscripciones.txt", "Inscripciones");
            }
        }
    }

    //PUNTO 5y6    
    static public function inscripciones($apellido, $materia)
    {
        $lista = self::LeerJSON(PATH_ARCHIVOS . "/Inscripciones.txt", "Inscripciones");
        if ($apellido == null && $materia == null) {
            $listaMostrar = $lista;
        } else {
            if ($apellido != null) {
                $listaMostrar = self::SubListaXCriterio($lista, "apellido", $apellido, FALSE);
            } else {
                $listaMostrar = self::SubListaXCriterio($lista, "materia", $materia, FALSE);
            }
        }

        foreach ($listaMostrar as $objeto) {
            echo $objeto;
        }
    }

    //PUNTO - 7
    static public function modificarAlumno($nombre, $apellido, $email,  $foto)
    {
        //echo "<br>Entro en modificarAlumno con datos: $nombre, $apellido, $email </br>";
        $lista = self::LeerJSON(PATH_ARCHIVOS . "/Alumno.txt", "Alumno");
        //$Alumno=self::ExisteAlumno($lista, $email); //no la uso mas... tengo la de abajo que es generica
        $Alumno = self::BuscaXCriterio($lista, "email", $email);

        if ($Alumno == null) {
            echo "<br>El Alumno NO existe, no se puede modificar<br>";
        } else {
            //echo "<br>Modifica Alumno<br>";             
            $nomFoto = "SIN_FOTO";
            if ($foto != null) {
                $nomFoto = "foto_" . $apellido;
                self::cargarImagenPorNombre($foto, $nomFoto, "./fotosAlumno/");
            }

            //modificado con seters magicos XD
            $Alumno->nombre = $nombre;
            $Alumno->apellido = $apellido;
            $Alumno->nomFoto = $nomFoto;

            self::guardarJSON($lista, PATH_ARCHIVOS . "/Alumno.txt", "Alumno");
        }
    }

    //PUNTO - 8
    static public function alumnos()
    {
        $lista = self::LeerJSON(PATH_ARCHIVOS . "/Alumno.txt", "Alumno");

        if ($lista == null) {
            echo "<br>No existen alumnos a mostrar<br>";
        } else {
 //           echo (self::crearTablaHeader($lista));
            $path = "./fotosAlumno/";
            
            foreach ($lista as $objeto)
            {
                $file = $objeto->nomFoto . ".png";

                echo $objeto;
                if($objeto->nomFoto != 'SIN_FOTO')
                {
                    $strHtml = "<img src=".$path . $file. " alt= foto" . " border=3 height=120px width=160px></img>";
                    echo $strHtml;
                }
          } 
            
        }
    }

    //**********  OTRAS FUNCIONES ***********/


    public static function crearTablaHeader($lista)
    {
        $strHtml = "<table border='1'>";
        $strCabeceras = reset($lista);

        $campos = $lista[0];
        self::debugAlgo($campos);

        /*
        foreach ($campos as $key => $value) {
            self::debugAlgo($key);
          //  self::debugAlgo($value);
            
        }
        */
        //    $strHtml.="<th>".$objeto[0]."</th>";            

        /*
        $strHtml.="<th>ALIAS</th>";
        $strHtml.="<th>TIPO</th>";
        $strHtml.="<th>EDAD</th>";
        $strHtml.="<th>EMAIL</th>";
        $strHtml.="<th>FOTO</th>";
        $strHtml.="<tbody>";
  */
        return $strHtml;
    }

    /**Funcion de Busqueda Generica en listado
     * Usa los metodos magicos __get para buscar por atributo del objeto
     * criterio= atributo del objeto
     * dato = dato a buscar en dicho atributo
     * 
     * Si encuentra devuelve el objeto, si no devuelve null
     */
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

    /**Genera una lista filtrada por criterio 
     * 
     * lista = lista de objetos donde buscar
     * criterio = atributo del objeto a buscar
     * dato = valor a buscar en el atributo del objeto
     * caseSensitive = TRUE /FALSE
     */
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


    //************ ARCHIVOS ********** */
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
                        case 'Materia':
                            $Materia = new Materia($objeto->nombre, $objeto->codigo, $objeto->cupo, $objeto->aula);
                            array_push($listado, $Materia);
                            break;
                        case 'Alumno':
                            //$Alumno = new Alumno($objeto->get("nombre") ,$objeto->get("apellido") , $objeto->get("email") ,$objeto->get("nomFoto") );
                            $Alumno = new Alumno($objeto->nombre, $objeto->apellido, $objeto->email, $objeto->nomFoto);
                            array_push($listado, $Alumno);
                            break;
                        case 'Inscripciones':
                            $Inscripcion = new Inscripciones($objeto->nombre, $objeto->apellido, $objeto->email, $objeto->codigo, $objeto->materia);
                            //self::debugAlgo($Inscripcion);
                            array_push($listado, $Inscripcion);
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
                case 'Materia':
                    $array = array('nombre' => $objeto->nombre, 'codigo' => $objeto->codigo, 'cupo' => $objeto->cupo, 'aula' => $objeto->aula);
                    array_push($listado, $array);
                    fputs($archivo,  json_encode($array) . PHP_EOL);
                    break;
                case 'Alumno':
                    //$array = array('nombre' => $key->get("nombre"), 'apellido' => $key->get("apellido"),'email' => $key->get("email"),'nomFoto' => $key->get("nomFoto") );                        
                    $array = array('nombre' => $objeto->nombre, 'apellido' => $objeto->apellido, 'email' => $objeto->email, 'nomFoto' => $objeto->nomFoto);
                    array_push($listado, $array);
                    fputs($archivo,  json_encode($array) . PHP_EOL);
                    break;
                case 'Inscripciones':
                    $array = array('nombre' => $objeto->nombre, 'apellido' => $objeto->apellido, 'email' => $objeto->email, 'codigo' => $objeto->codigo, 'materia' => $objeto->materia);
                    array_push($listado, $array);
                    fputs($archivo,  json_encode($array) . PHP_EOL);
                    break;
            }
        }

        fclose($archivo);
        return $listado;
    }


    //************ DEBUG ********** */

    public static function debugAlgo($algo)
    {
        echo "</br> ------- var_dump() -------- </br>";
        var_dump($algo);
        echo "</br>";
    }


    public function cargarImagenPorNombre($archivo, $nombre, $carpetaDestino)
    {
        //Hace path a guardar + nombre + extensión
        $destino = $carpetaDestino . $archivo["name"];

        $tipoArchivo = pathinfo($destino, PATHINFO_EXTENSION);
        $destino = $carpetaDestino . $nombre . ".$tipoArchivo";
        $uploadOk = TRUE;

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
} //FIN class Facultad 

?>