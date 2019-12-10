<?php

namespace App\Models\ORM;

use App\Models\AutentificadorJWT;
use App\Models\ORM\Mesa;
use App\Models\IApiControler;   


include_once __DIR__ . '/mesa.php';
include_once __DIR__ . '../../modelAPI/AutentificadorJWT.php';
include_once __DIR__ . '../../modelAPI/IApiControler.php';



use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;


class mesaController implements IApiControler
{
    public function TraerTodos($request, $response, $args)
    {
        $todasLasMesas = Mesa::all();
        if(count($todasLasMesas) > 0) 
        {
            $newResponse = $response->withJson($todasLasMesas, 200);
        }
        else{
            $newResponse = $response->withJson("No hay mesas", 200);
        }
        return $newResponse;
    }
    public function obtenerMesaLibre()
    {
        $mesaLibre = Mesa::where("idEstadoMesa", "=", "4")
        ->select("codigoMesa")
        ->first();
        
        if($mesaLibre != null)
        {
            $newResponse = $mesaLibre->codigoMesa;
//            self::cambiarEstado($mesaLibre->codigoMesa, 1);
        }
        else
        {
            $newResponse = null;
        }
        return $newResponse;
    }
    public function TraerUno($request, $response, $args)
    {
        $id = $args["id"];
        $mesa = Mesa::find($id);
        if(count((array)$mesa) > 0) 
        {
            $newResponse = $response->withJson($mesa, 200);
        }
        else{
            $newResponse = $response->withJson("No hay mesa con ese ID", 200);
        }
        return $newResponse;
    }

    public function CargarUno($request, $response, $args)
    {
        $mesa = new Mesa;
        $mesa->codigoMesa = " ";
        $mesa->idEstadoMesa = 4;
        $mesa->save();
        $mesa->codigoMesa = "MESA-".$mesa->id;
        $mesa->save();
        $newResponse = $response->withJson('Mesa ' . $mesa->codigoMesa. ' cargada', 200);
        return $newResponse;
    }
    public function BorrarUno($request, $response, $args)
    {
        $newResponse = $response->withJson("No se puede eliminar una mesa", 200);  
        return $newResponse;
    }

    public function ModificarUno($request, $response, $args)
    {
        $newResponse = $response->withJson("No se puede modificar una mesa", 200);  
        return $newResponse;
    }

/*    public function IniciarSesion($request, $response, $args)
    {
        $arrayDeParametros = $request->getParsedBody();

        $encargado=Encargado::where('usuario','=',$arrayDeParametros["usuario"])
        ->join('roles','encargados.idRol','roles.id')
        ->get()
        ->toArray();

        unset($encargado[0]["created_at"],$encargado[0]["updated_at"]);
        
        if(count($encargado) == 1 && $encargado[0]["clave"] == $arrayDeParametros["clave"])
        {
            unset($encargado[0]["clave"], $encargado[0]["idRol"]);

            $token = AutentificadorJWT::CrearToken($encargado[0]);
            $newResponse = $response->withJson($token, 200);

        }
        else
        {
            $newResponse = $response->withJson("Error al iniciar sesion", 200);
        }

        return $newResponse;
    }
*/
    public function cambiarEstado($codigMesa, $estado)
    {
      $mesa = Mesa::where('codigoMesa', $codigMesa)->first();
      if($mesa)
      {
          $mesa->idEstadoMesa = $estado;
          $mesa->save();
          return true;
      }
      else
      {
        return false;
      }
    }
  
}
