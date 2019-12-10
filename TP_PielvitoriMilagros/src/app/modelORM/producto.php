<?php  
namespace App\Models\ORM;
 
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;


class Producto extends \Illuminate\Database\Eloquent\Model{
    protected $id;
    protected $descripcion;
    protected $tipo;
    protected $precio;
    protected $idRol;
    protected $tiempoPreparacion;
    protected $primaryKey = 'id';

}
