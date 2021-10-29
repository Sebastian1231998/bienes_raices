
<?php

define('TEMPLATES_URL', __DIR__ . '/templates');
define('FUNCIONES_URL', __DIR__ . 'funciones.php');
define('CARPETA_IMAGENES', $_SERVER['DOCUMENT_ROOT'] . '/imagenes/');
define('CARPETA_VENDEDORES', $_SERVER['DOCUMENT_ROOT'] . '/imagenes/vendedores/');


function llamaTemplate(string $nombre, bool $inicio = false, bool $boostrap = false, $admin = false, $admin_crud = false)
{
     include TEMPLATES_URL . "/${nombre}.php";
}

function autenticar_sesion()
{

     session_start(); 



     if (!isset($_SESSION["login"])) {

          header('Location: ../');
     }

     return false;
}

function debugear($variable)
{

     echo "<pre>";
     var_dump($variable);
     echo "</pre>";
     exit;
}

function enlace($admin = false, $admin_crud = false,  $variable = '')
{
     if ($admin) {

          echo  "../${variable}";
     } else if ($admin_crud) {

          echo  "../../${variable}";
     } else {

          echo "./${variable}";
     }
}

function sanitizar($propiedad)
{

     $propiedad_sanitizada = htmlspecialchars($propiedad);

     return $propiedad_sanitizada;
}
