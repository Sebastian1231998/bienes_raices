<?php 


require_once __DIR__ . "/../includes/app.php";

use MVC\Router; 
use Controllers\PropiedadController;
use Controllers\VendedorController;
use Controllers\AppController;
use Controllers\LoginController;

$router = new Router();

$router->get('/admin', [PropiedadController::class , 'index']);

//Crud Propiedad


$router->get('/propiedades/crear',[PropiedadController::class , 'crear']);
$router->post('/propiedades/crear',[PropiedadController::class , 'crear']);
$router->post('/propiedades/actualizar',[PropiedadController::class , 'actualizar']);
$router->get('/propiedades/actualizar',[PropiedadController::class , 'actualizar']);
$router->post('/propiedades/eliminar',[PropiedadController::class , 'eliminar']);

//Crud Vendedor

$router->get('/vendedores/crear',[VendedorController::class , 'crear']);
$router->post('/vendedores/crear',[VendedorController::class , 'crear']);
$router->post('/vendedores/actualizar',[VendedorController::class , 'actualizar']);
$router->get('/vendedores/actualizar',[VendedorController::class , 'actualizar']);
$router->post('/vendedores/eliminar',[VendedorController::class , 'eliminar']);


//paginas principales app

$router->get('/',[AppController::class , 'index']);
$router->get('/nosotros',[AppController::class , 'nosotros']);
$router->get('/anuncios',[AppController::class , 'anuncios']);
$router->get('/anuncio',[AppController::class , 'anuncio']);
$router->get('/blog',[AppController::class , 'blog']);
$router->get('/contacto',[AppController::class , 'contacto']);
$router->get('/prueba',[AppController::class , 'prueba']);
$router->post('/contacto',[AppController::class , 'contacto']);

//login 

$router->get('/login',[LoginController::class , 'login']);
$router->post('/login',[LoginController::class , 'login']);
$router->get('/cerrar',[LoginController::class , 'cerrar']);

$router->validarRutas();