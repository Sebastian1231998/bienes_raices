<?php 

require "funciones.php";
require "config/bd.php";
require __DIR__ . "/../vendor/autoload.php";


use Model\ActiveRecord;




$bd = connect_bd();

ActiveRecord::setDB($bd);





