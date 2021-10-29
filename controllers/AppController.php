<?php

namespace Controllers;

use PHPMailer\PHPMailer\PHPMailer;
use Exception;
use MVC\Router;
use Model\Propiedad;



class AppController
{

    public static function index(Router $router)
    {

        $incio = true;

        $anuncios = Propiedad::propiedadesLimit(3);

        $router->render('/app/index', [
            "inicio" => $incio,
            "resultados" => $anuncios
        ]);
    }

    public static function nosotros(Router $router)
    {

        $router->render('/app/nosotros', []);
    }

    public static function anuncios(Router $router)
    {
        $anuncios = Propiedad::propiedadesLimit(9);
        $router->render('/app/anuncios', [
            "resultados" => $anuncios

        ]);
    }

    public static function anuncio(Router $router)
    {


        $id = filter_var($_GET['id'], FILTER_VALIDATE_INT);

        if (!$id) {

            header('location:../');
        }

        $propiedad = Propiedad::find($id);


        $router->render('/app/anuncio', [
            "resultado" => $propiedad

        ]);
    }


    public static function blog(Router $router)
    {

        $router->render('/app/blog', []);
    }

    public static function contacto(Router $router)
    {

        $mensaje = false; 

        if ($_SERVER["REQUEST_METHOD"] == "POST") {

          
            $nombre = filter_var($_POST["nombre"], FILTER_SANITIZE_STRING);
            $mensaje = filter_var($_POST["mensaje"], FILTER_SANITIZE_STRING);
            $tipo = filter_var($_POST["tipo"], FILTER_SANITIZE_STRING);
            $precio = filter_var($_POST["precio"], FILTER_SANITIZE_NUMBER_INT);
            $contacto = filter_var($_POST["contacto"], FILTER_SANITIZE_STRING);
            $fecha = filter_var($_POST["fecha"], FILTER_SANITIZE_STRING);
            $hora = filter_var($_POST["hora"], FILTER_SANITIZE_STRING);


            try {
                $email = new PHPMailer();
                $email->isSMTP();
                $email->Host = 'smtp.mailtrap.io';
                $email->SMTPAuth   = true;
                $email->Port = 2525;
                $email->Username = 'b7ff49fbbccb63';
                $email->Password = 'fff2355c9b80c1';


                $email->setFrom('bienas@raices.com', 'Bienes Raices');
                $email->addAddress('bienas@raices.com', 'Sebastian Rodriguez');     //Add a recipient
                $email->Subject = 'Alguien se quiere poner en contacto con Bienesraices.com';

                $email->isHTML(true);
                $email->CharSet = 'UTF-8';
                $contenido = '<html>  
                
                <div class="container-mensaje" style="
                margin: 0 auto; 
                width:40%;
                border:1px solid #e1e1e1"
                
                >
                
                    <div class="header-message">
                
                        <h2 style="
                        margin: 0; 
                        padding:2rem;
                        background-color: #696262;
                        color: white;
                        text-align:center"
                        >
                    Datos Cliente</h2>
                        <p
                        style="text-align: center;"
                        ><span style="font-weight: bold;"> Cliente: </span> interesado en ser contactado</p>
                        <p
                        style="text-align: center;"
                        ><span style="font-weight: bold;"> Nombre: </span> ' .  $nombre . '  </p>
                        <p
                        style="text-align: center;"
                        ><span style="font-weight: bold;"> Vende o Compra: </span>' . $tipo . '</p>
                    
                    </div>
                    
                    <div class="body-message">
                
                    <h2 style="
                        margin: 0; 
                        padding:2rem;
                        background-color: #696262;
                        color: white;
                        text-align: center;
                        ">Mensaje</h2>
                
                        <p
                        style="text-align: center;"
                        ><span style="font-weight: bold;"> Mensaje: </span>' . $mensaje  . '</p>
                        <p
                        style="text-align: center;"
                        ><span style="font-weight: bold;"> Como desea ser contactado: </span>' . $contacto . '</p>
                        
                        <p
                        style="text-align: center;"
                        ><span style="font-weight: bold;"> presupuesto establecido: </span>' . $precio . '</p>';

                if ($contacto === 'Correo') {

                    $contenido .= '<p  style="text-align: center;" ><span style="font-weight: bold;"> Email: </span>' . $_POST["email"] . '</p>';
                } else {

                    $contenido .= '<p  style="text-align: center;" ><span style="font-weight: bold;"> Telefono: </span>' . $_POST["telefono"] . '</p>';
                }

                $contenido .=  '<p  style="text-align: center;"><span style="font-weight: bold;"> Fecha: </span>' .  $fecha .'</p>
                        <p  style="text-align: center;"><span style="font-weight: bold;"> Hora: </span>' . $hora .'</p>
                
                    
                    </div>
                
                
                    <div class="body-message">
                
                <div style="
                    margin: 0; 
                    padding:4rem;
                    background-color: #333;
                    color: white;">
                    <p
                    style="
                    
                    color: white;
                    text-align:center"
                    >Todos los derechos reservados &copy; </p>
                
                </div>
                
                
                </div>
                
                </div>
                
                
                </html>';

                $email->Body = $contenido;
                $email->AltBody = 'This is the body in plain text for non-HTML mail clients';


                if ($email->send()) {
                  $mensaje = true; 
                } else {
                    $mensaje = false; 
                }
            } catch (Exception $e) {

                echo "Ha ocurrido un error al conectarse al servidor de correos -> error:  " + $e;
            }
        }

        $router->render('/app/contacto', [
            "mensaje" => $mensaje
        ]);
    }

    public static function prueba(Router $router)
    {

        $router->render('/app/prueba', []);
    }
}
