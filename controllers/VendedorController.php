<?php

namespace Controllers;

use Intervention\Image\ImageManagerStatic as Image;
use Model\Propiedad;
use Model\Vendedores;
use MVC\Router;

class VendedorController
{


    public static function crear(Router $router)
    {



        $vendedor = new Vendedores;



        $errores = Vendedores::devolverErrores();

        $res = filter_var($_GET['result'] ?? null, FILTER_VALIDATE_INT);




        if ($_SERVER['REQUEST_METHOD'] === "POST") {




            $vendedor = new Vendedores($_POST['vendedor']);



            $str = md5(uniqid(rand(), true)) . ".jpg";
            if (!is_dir(CARPETA_VENDEDORES)) {

                mkdir(CARPETA_VENDEDORES);
            }
            if ($_FILES["vendedor"]["tmp_name"]["imagen"]) {

                $imagen = image::make($_FILES["vendedor"]["tmp_name"]["imagen"])->fit(800, 500);
                $vendedor->setImagen($str);
            }



            $vendedor->validarCampos();
            $errores = Vendedores::devolverErrores();


            if (empty($errores)) {


                $imagen->save(CARPETA_VENDEDORES . $str);

                $resultado = $vendedor->guardar();

                if ($resultado) {

                    header('location:../admin?result=1');
                }
            }
        }
        $router->render('/vendedores/crear', [

            "res" => $res,
            "vendedor" => $vendedor,
            "errores" => $errores
        ]);
    }



    public static function eliminar()
    {

        if ($_SERVER["REQUEST_METHOD"] == "POST") {


            $id = filter_var($_POST["id_eliminar"] ?? null, FILTER_VALIDATE_INT);


            if ($_POST["tipo"] == "vendedor") {


                $vendedor = Vendedores::find($id);
                $resultado = $vendedor->eliminar_($_POST);
            }

            if ($resultado) {
                header('Location:../admin?result=3');
            }
        }
    }

    public static function actualizar(Router $router)
    {


        $id = filter_var($_GET['id'] ?? null, FILTER_VALIDATE_INT);
        if (!$id) {

            header('location:../');
        }

        if (!isset($_GET["id"])) {

            header('location:../');
        }

        $res = filter_var($_GET['result'] ?? null, FILTER_VALIDATE_INT);

        $vendedor = Vendedores::find($id);


        if ($_SERVER['REQUEST_METHOD'] === "POST") {


          
            $args = $_POST['vendedor'];
            $vendedor->sincronizar($args);
        
   
   
          
            if (!is_dir(CARPETA_VENDEDORES)) {
               mkdir(CARPETA_VENDEDORES);
            }
         
         
            if ($_FILES["vendedor"]['tmp_name']['imagen']) {
               $str = md5(uniqid(rand(), true)) . ".jpg";
               $imagen =  Image::make($_FILES["vendedor"]['tmp_name']['imagen'])->fit(800, 600);
               $val = true;
               $vendedor->setImagen($str, $val);
            } else {
               $str = $vendedor->imagen;
               $val = false;
               $vendedor->setImagen($str, $val);
            }
         
            $vendedor->validarCampos();
            $errores =  Vendedores::devolverErrores();
         
         
         
            if (empty($errores)) {
         
               if (isset($imagen)) {
         
                  $imagen->save(CARPETA_VENDEDORES . $str);
               }
         
               $resultado = $vendedor->actualizarDatos();
         
         
               if ($resultado) {
         
                  header('location:../admin?result=2');
               }
            }
         }

        $errores = Vendedores::devolverErrores();
        $router->render('/vendedores/actualizar', [

            "res" => $res,
            "vendedor" => $vendedor,
            "errores" => $errores
        ]);
    }
}
