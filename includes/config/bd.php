
<?php 


function connect_bd():mysqli{



    $bd = new mysqli('localhost', 'root', '', 'bienes_raices');

    


    if(!$bd){
        echo "no se pudo conectar"; 
        exit;
    }
  
    return $bd;
   
}
