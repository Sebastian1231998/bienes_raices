<?php

namespace Model;


class ActiveRecord
{


    //Propiedades staticas 

    protected static $db;
    protected static $errores = [];

    protected $columnDB = [];
    protected static $tabla = '';


    public static function setDB($bd)
    {

        self::$db = $bd;
    }

    public function setImagen($imagen, $val = false)
    {

        if ($this->id && $val) {
            unlink(CARPETA_IMAGENES . $this->imagen);
        }

        if ($imagen) {
            $this->imagen = $imagen;
        }
    }


    public static function find($id)
    {

        $query = "SELECT * FROM ";
        $query .=  static::$tabla . " ";
        return static::consultaQuery(static::$tabla, $query, $id);
    }

    public static function consultaQuery($valor, $query, $id)
    {

        if (static::$tabla == "propiedades") {

            $query .= "where id = '${id}'";
            $resultado = self::getPropiedades($query);
            return  $resultado[0];
        } else if (static::$tabla == "usuarios") {

            $query .= "where email = '${id}'";
            $result = self::$db->query($query);
            return $result;
        } else if (static::$tabla == "vendedores") {

            $query .= "where id = '${id}'";
            $resultado = self::getPropiedades($query);
            return  $resultado[0];
        }
    }


    public function guardar()
    {


        $atributos = $this->santitizarDatos();

        $str = join(",", array_keys($atributos));
        $str_val = join("','", array_values($atributos));

        $query = "INSERT INTO " . static::$tabla . "($str)";
        $query .= " VALUES ('$str_val')";

 
        
        return self::$db->query($query);
    }


    public function eliminar_($args = [])
    {

   

        if ($args["id_eliminar"]) {
            if(static::$tabla =="propiedades"){
                unlink(CARPETA_IMAGENES . $args["imagen_eliminar"]);

            }else if(static::$tabla =="vendedores"){
                
                unlink(CARPETA_VENDEDORES . $args["imagen_eliminar"]);
            }
          
        }
        $consulta = "DELETE FROM " . static::$tabla . " WHERE id=$this->id";


        $resultado = self::$db->query($consulta);

        
        return $resultado;
    }

    public function identificaColumnDB()
    {

        $atributos = [];

        foreach ($this->columnDB as $column) {
            if ($column === "id" && static::$tabla == "propiedades" || $column === "id" && static::$tabla == "vendedores")  continue;
            $col = $this->$column;

            $atributos[$column] = $col;
        }

        return $atributos;
    }

    public function santitizarDatos()
    {

        $atr = $this->identificaColumnDB();
        $sanitizado = [];


        foreach ($atr as $key => $value) {

            $sanitizado[$key] = self::$db->escape_string($value);
        }


        return $sanitizado;
    }

    
    

    public function validarCampos()
    {


        if (static::$tabla == "propiedades") {

            if (
                !$this->titulo ||
                !$this->precio ||
                !$this->descripcion ||
                !$this->habitaciones ||
                !$this->wc ||
                !$this->estacionamiento


            ) {
                self::$errores[] = "todos los campos son obligatorios";
            }


            if (strlen($this->descripcion) == 35) {

                self::$errores[] = "La descripcion no puede ser muy larga igual a 35 caracteres";
            }
            if (!$this->imagen) {

                self::$errores[] = "La imagen es obligatoria";
            }
        }

        if (static::$tabla == "usuarios") {

            if (!$this->email) {

                self::$errores[] = "El email es obligatorio o no es valido ";
            }

            if (!$this->password) {

                self::$errores[] = "El password es obligatorio ";
            }
        }

        if (static::$tabla == "vendedores") {


            if (
                !$this->nombre ||
                !$this->apellido ||
                !$this->telefono 
                
            ) {

                self::$errores[] = "todos los campos son obligatorios";
            }
            if(!$this->imagen){
                self::$errores[] = "La imagen es obligatoria";
            }
         
        }
    }

    public static function devolverErrores()
    {

        return self::$errores;
    }


    public static function all()
    {

        $query = "SELECT * FROM ";
        $query .= static::$tabla;


        $resultado = self::getPropiedades($query);

        return $resultado;
    }

    public static function getPropiedades($query)
    {

        $array = [];
        $resultado = self::$db->query($query);

      self::validarId($resultado);


        while ($registro = $resultado->fetch_assoc()) {

            $array[] =  self::crearObjeto($registro);
        }

        return $array;
    }

    protected static function crearObjeto($registro)
    {

        $objeto = new static;


        foreach ($registro as $key => $value) {

            if (property_exists($objeto,  $key)) {
                $objeto->$key =  $value;
            }
        }
        return $objeto;
    }


    public function sincronizar($args = [])
    {


        foreach ($args as $key => $value) {

            if (property_exists($this, $key) && !is_null($value)) {
                $this->$key = $value;
            }
        }
    }

    public function actualizarDatos()
    {


        $atributos = $this->santitizarDatos();
        $valores = [];

        foreach ($atributos as $key => $value) {
            $valores[] = "${key} = '{$value}'";
        }

        $sql = "UPDATE " . static::$tabla . " SET ";
        $sql .= join(",", $valores);
        $sql .= " where id = '$this->id'";

 
        $result =  self::$db->query($sql);
        return $result;
        
    }

    public static function propiedadesLimit($limit){

        $consulta = "SELECT * FROM propiedades LIMIT ${limit}";
        $resultado = self::getPropiedades($consulta);

        return $resultado;
    }

    public static function validarId($resultado){

    
      if( $resultado->num_rows == 0){

        header("Location: ../admin");
      }
         
    }
}
