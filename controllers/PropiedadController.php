<?php namespace Controllers; 

use Intervention\Image\ImageManagerStatic as Image;
use MVC\Router;
use Model\Propiedad;
use Model\Vendedores;


class PropiedadController {

 public static function index(Router  $router){
  
  $propiedades = Propiedad::all();
  $vendedores = Vendedores::all();

  $res = filter_var($_GET['result'] ?? null, FILTER_VALIDATE_INT);


   $router->render('/admin', [
   
       "propiedades" => $propiedades,
       "res" => $res,
       "vendedores" => $vendedores
   ]);

 }
 public static function crear(Router  $router){

  $propiedad = new Propiedad; 
  $vendedores = Vendedores::all();
  $errores = Propiedad::devolverErrores();

  if ($_SERVER['REQUEST_METHOD'] === "POST") {



    $propiedad = new Propiedad($_POST['propiedad']);
 

    if (!is_dir(CARPETA_IMAGENES)) {
       mkdir(CARPETA_IMAGENES);
    }
 
    $str = md5(uniqid(rand(), true)) . ".jpg";
    if ($_FILES["propiedad"]['tmp_name']['imagen']) {
       $imagen =  Image::make($_FILES["propiedad"]['tmp_name']['imagen'])->fit(800, 600);
       $propiedad->setImagen($str);
    }
 
    $propiedad->validarCampos();
    $errores = Propiedad::devolverErrores();
 
    if (empty($errores)) {
       // guardar en el servidor
       // guardarla carpeta imagenes  
       $imagen->save( CARPETA_IMAGENES . $str);
 
       $resultado = $propiedad->guardar();
 
 
       if ($resultado) {
 
          header('location:../admin?result=1');
       }
    }
 }
  $router->render('/propiedades/crear', [

    'propiedad' => $propiedad,
    'vendedores'=>  $vendedores,
    'errores' => $errores
  ]);
  
   }

   public static function actualizar(Router  $router){

      $id = filter_var($_GET['id'] ?? null, FILTER_VALIDATE_INT);
      if (!$id) {
      
         header('location:../admin');
      }
      
      if (!isset($_GET["id"])) {
      
         header('location:../admin');
      }

      $propiedad = Propiedad::find($id);

      

      $vendedores = Vendedores::all();
      $errores =  [];



      if ($_SERVER['REQUEST_METHOD'] === "POST") {


         $args = $_POST['propiedad'];
         $propiedad->sincronizar($args);
      


       
         if (!is_dir(CARPETA_IMAGENES)) {
            mkdir(CARPETA_IMAGENES);
         }
      
      
         if ($_FILES["propiedad"]['tmp_name']['imagen']) {
            $str = md5(uniqid(rand(), true)) . ".jpg";
            $imagen =  Image::make($_FILES["propiedad"]['tmp_name']['imagen'])->fit(800, 600);
            $val = true;
            $propiedad->setImagen($str, $val);
         } else {
            $str = $propiedad->imagen;
            $val = false;
            $propiedad->setImagen($str, $val);
         }
      
         $propiedad->validarCampos();
         $errores =  Propiedad::devolverErrores();
      
      
      
         if (empty($errores)) {
      
            if (isset($imagen)) {
      
               $imagen->save(CARPETA_IMAGENES . $str);
            }
      
            $resultado = $propiedad->actualizarDatos();
      
      
            if ($resultado) {
      
               header('location:../admin?result=2');
            }
         }
      }
      $router->render('/propiedades/actualizar', [
      

         'propiedad' => $propiedad, 
         'vendedores' => $vendedores, 
         'errores' => $errores
      ]);
  
   }

   public static function eliminar(){

      if ($_SERVER["REQUEST_METHOD"] == "POST") {
   

         
  
         $id = filter_var($_POST["id_eliminar"] ?? null, FILTER_VALIDATE_INT);
        

         if($_POST["tipo"] == "propiedad"){
        
            $propiedad_eliminar = Propiedad::find($id); 
            $resultado = $propiedad_eliminar->eliminar_($_POST);
         }
         
         
         if ($resultado) {
       
       
           header('location:../admin?result=3');
         }
       }

   }

}