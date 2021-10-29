<?php 
session_start();
$auth =  $_SESSION['usuario'] ?? false;

if ($auth) {

   header('Location: ./admin');
}


?>

<section>

<h1>Iniciar sesión</h1>




<?php foreach ($errores as $error) : ?>


   <div class="alerta error" style="margin: 1rem 0;
padding: 1rem;
color: white;
text-align: center;
font-weight: bold;
-webkit-box-shadow: 3px 9px 5px -8px rgba(0, 0, 0, 0.45);
-moz-box-shadow: 3px 9px 5px -8px rgba(0, 0, 0, 0.45);
box-shadow: 3px 9px 5px -8px rgba(0, 0, 0, 0.45);
text-transform: uppercase;
border-radius: 1rem;
background-color: #ea4e4e;
max-width: 60rem; 
width:95%;
margin: 2rem auto;

">

      <?php echo $error; ?>



   </div>


<?php endforeach; ?>




<form class="formulario" method="POST" style="max-width: 60rem; width:95%; margin: 0 auto; ">


   <fieldset>

      <legend>Inciar Sesión</legend>

      <div class="flex-form">
         <div class="campo">
            <label for="nombre">Correo:</label>
            <input name="email" type="email" id="nombre" placeholder="Escriba su Correo" value="<?php echo sanitizar($usuario->email);  ?>">
         </div>
         <div class="campo">
            <label for="nombre">Password:</label>
            <input name="password" type="password" id="nombre" placeholder="Escriba su password">
         </div>

      </div> <!-- flex form-->

   </fieldset>

   <input type="submit" value="iniciar sesión" style="background-color: #a1dc39;color: white;cursor:pointer">

</form>

</section>
