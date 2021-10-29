<?php

namespace MVC;

class Router
{


    public $routerGet = [];
    public $routerPost = [];

    public function get($url, $fn)
    {


        $this->routerGet[$url] = $fn;
    }

    public function post($url, $fn)
    {


        $this->routerPost[$url] = $fn;
    }

    public function validarRutas()
    {
        $urlActual = $_SERVER["PATH_INFO"] ?? '/';
        $metodo = $_SERVER["REQUEST_METHOD"];


        if ($metodo === 'GET') {
            $fn = $this->routerGet[$urlActual] ?? null;    
        }else {
            $fn = $this->routerPost[$urlActual] ?? null;
        }

        if (!is_null($fn)) {

     
            call_user_func($fn, $this);
           
        } else {
            header("Location: /");
        }
    }

    public function render($view, $datos = [])
    {
        foreach ($datos as $key => $value) {
            $$key = $value;
        }

        ob_start(); //almacenamiento de memoria temporal
        include __DIR__ . "/views/$view.php";

        $contenido = ob_get_clean();

        include 'views/propiedades/layout.php';
    }
}
