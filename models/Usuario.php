<?php namespace Model; 

class Usuario extends ActiveRecord{


    public $id; 
    public $email;
    public $password; 


    protected $columnDB = ['id', 'email','password']; 
    protected static $tabla = 'usuarios'; 

    public function __construct($args = []){


      $this->id = $args['id'] ?? '';   
      $this->email = $args['email'] ?? ''; 
      $this->password = $args['password'] ?? ''; 
  

    }


    public function consultarUsuario( $resultado){

       $result = $resultado->fetch_assoc();

       $auth = password_verify($this->password, $result["password"]);

       if ($auth) {

          session_start();

          $_SESSION["usuario"] = $this->email;

          $_SESSION["login"] = true;

          header('Location: ./admin');
       } else {

          self::$errores[] = "El usuario o password es incorrecto ";
       }

    }



}

