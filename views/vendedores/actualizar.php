<?php 


autenticar_sesion();

?> 

<main class="contenedor contenedor-seccion">


<?php foreach ($errores as $error) :  ?>


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
">

      <?php echo $error; ?>



   </div>

<?php endforeach; ?>

<h1>Actualizar Vendedor</h1>

<a href="../admin" class="form-button" style="padding: 2rem 3rem; background-color: #a1dc39; color: white; font-weight: bold; border: none; border-radius: 1rem;"> Volver </a>

<form class="formulario" method="POST" enctype="multipart/form-data">

  <?php include __DIR__ . '/../../includes/templates/formulario_vendedor.php'  ?> 


 
  


   <div style="text-align:right">
      <input type="submit" value="Actualizar" style="padding: 2rem 3rem; width:15%; background-color: #a1dc39; color: white; font-weight: bold; border: none;cursor:pointer">
   </div>
</form>


</main>