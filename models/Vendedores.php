<?php

namespace Model;

class Vendedores extends ActiveRecord
{

    
    protected $columnDB = ['id', 'nombre','apellido','imagen', 'telefono'];
    protected static $tabla = 'vendedores'; 

    public $id;
    public $nombre;
    public $apellido;
    public $imagen;
    public $telefono;
  


    public function __construct($args = [])

    {
        $this->id = $args['id'] ?? '';
        $this->nombre = $args['nombre'] ?? '';
        $this->apellido = $args['apellido'] ?? '';
        $this->imagen = $args['imagen'] ?? '';
        $this->telefono = $args['telefono'] ?? '';
        
    }
}
