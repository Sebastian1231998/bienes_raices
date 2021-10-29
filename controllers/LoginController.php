<?php namespace Controllers; 
use MVC\Router;
use Model\Usuario;
class LoginController{


public static function login(Router $router){
    
    $errores = Usuario::devolverErrores();
    $usuario = new Usuario; 


    if ($_SERVER["REQUEST_METHOD"] === "POST") {

        filter_var($_POST["email"], FILTER_VALIDATE_EMAIL); 
        filter_var($_POST["password"], FILTER_SANITIZE_STRING);
     
        $usuario = new Usuario($_POST); 
        $sanitzado = $usuario->santitizarDatos();
     
     
        $usuario->validarCampos(); 
        $errores = Usuario::devolverErrores();
     
        if (empty($errores)) {
           //consulta a la base de datos
          $result =  $usuario->find($sanitzado['email']); 
           if ($result->num_rows) {
     
              $usuario->consultarUsuario($result);
              $errores = Usuario::devolverErrores();
     
           } else {
              $errores[] = "El usuario no existe";
           }
        }
     }

    $router->render('/app/login/login', [
        "errores" => $errores,
        "usuario" => $usuario
    ]);

}

public static function cerrar(){

    if($_GET["cerrar_sesion"]){

        session_start(); 
        $_SESSION = []; 
        header('Location: ./login');
    }

}


}