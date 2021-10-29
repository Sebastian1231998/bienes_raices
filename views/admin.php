<?php 


autenticar_sesion();

?> 


<main class="contenedor contenedor-seccion">

  <h1>Admin</h1>


  <?php if ($res == 1) : ?>

    <div class="" style="margin: 1rem 0;
  padding: 1rem;
  
  text-align: center;
  font-weight: bold;
  -webkit-box-shadow: 3px 9px 5px -8px rgba(0, 0, 0, 0.45);
  -moz-box-shadow: 3px 9px 5px -8px rgba(0, 0, 0, 0.45);
  box-shadow: 3px 9px 5px -8px rgba(0, 0, 0, 0.45);
  text-transform: uppercase;
  border-radius: 1rem;
  background-color: #32b532;
  margin-bottom:3rem;
  
  ">
      <p style="color: white;">Se ha creado correctamente la propiedad</p>
    </div>

  <?php elseif ($res == 2) : ?>
    <div class="" style="margin: 1rem 0;
       padding: 1rem;
       
       text-align: center;
       font-weight: bold;
       -webkit-box-shadow: 3px 9px 5px -8px rgba(0, 0, 0, 0.45);
       -moz-box-shadow: 3px 9px 5px -8px rgba(0, 0, 0, 0.45);
       box-shadow: 3px 9px 5px -8px rgba(0, 0, 0, 0.45);
       text-transform: uppercase;
       border-radius: 1rem;
       background-color: #32b532;
       margin-bottom:3rem;
       
       ">
      <p style="color: white;">Se ha Actualizad correctamente la propiedad</p>
    </div>

  <?php elseif ($res == 3) : ?>
    <div class="" style="margin: 1rem 0;
       padding: 1rem;
       
       text-align: center;
       font-weight: bold;
       -webkit-box-shadow: 3px 9px 5px -8px rgba(0, 0, 0, 0.45);
       -moz-box-shadow: 3px 9px 5px -8px rgba(0, 0, 0, 0.45);
       box-shadow: 3px 9px 5px -8px rgba(0, 0, 0, 0.45);
       text-transform: uppercase;
       border-radius: 1rem;
       background-color: #32b532;
       margin-bottom:3rem;
       
       ">
      <p style="color: white;">Se ha eliminado correctamente la propiedad</p>
    </div>


  <?php endif; ?>

  <a href="propiedades/crear" style="padding: 2rem 3rem; background-color: #a1dc39; color: white; font-weight: bold; border: none; border-radius: 1rem;"> Crear </a>
  <a href="vendedores/crear" style="margin: 1rem;padding: 2rem 3rem; background-color: #ec7248; color: white; font-weight: bold; border: none; border-radius: 1rem;"> Vendedor </a>

  <table style="
   border-spacing:unset;
   margin:4rem 0rem; 
   width:100%
   ">

    <thead style="
      background-color: #1cef1c;
      color:white
     
   ">

      <tr style="padding:20rem">
        <th style="
           padding: 2rem 1rem;
           width: 5rem;
    
          ">id</th>
        <th style="width: 22rem;text-align:center">titulo</th>
        <th style="
    text-align: center;
    width: 9rem;
    margin:2rem
">precio</th>
        <th style="
    text-align: center;
">imagen</th>
        <th style="
    text-align: center;
">descripcion</th>
        <th style="
    text-align: center;
">habitaciones</th>
        <th style="
        width: 10rem;
        text-align: center;
         ">WC</th>
        <th style="width: 15rem;text-align: center;">estacionamiento</th>

        <th style="width: 15rem;text-align: center;">Acciones</th>
      </tr>
    </thead>


    <tbody>

      <!-- generar la iteración -->


      <?php foreach ($propiedades as $propiedad) : ?>

        <tr>
          <th><?php echo $propiedad->id; ?> </th>
          <th><?php echo $propiedad->titulo; ?></th>
          <th>$ <?php echo $propiedad->precio; ?></th>
          <th style="width: 20rem; padding: 1rem;"><img src="../imagenes/<?php echo $propiedad->imagen; ?>" alt="" srcset=""></th>
          <th style="
    width: 25%;
    padding: 1rem;
    height: 15%;
     "><?php echo $propiedad->descripcion; ?></th>
          <th style="text-align: center;" ><?php echo $propiedad->habitaciones; ?></th>
          <th style="text-align: center;"><?php echo $propiedad->wc; ?></th>
          <th style="text-align: center;"> <?php echo $propiedad->estacionamiento; ?></th>

          <th style="display:flex;justify-content: space-around;height: 29rem;align-items:center">

            <div style="width:35px">
              <a href="propiedades/actualizar?id=<?php echo $propiedad->id; ?> ">
                <img src="/build/img/recargar.webp" alt="">
              </a>

            </div>

            <div style="width:35px">

              <form method="POST" action="/propiedades/eliminar">

                <input type="hidden" name="imagen_eliminar" value="<?php echo $propiedad->imagen; ?>">
                <input type="hidden" name="id_eliminar" value="<?php echo $propiedad->id; ?>">
                <input type="hidden" name="tipo" value="propiedad">
                <button type="submit">

                  <img src="/build/img/borrar.webp" alt="">
                </button>


              </form>

            </div>
          </th>
        </tr>

      <?php endforeach; ?>
    </tbody>
  </table>


<!-- tabla usuarios --> 

<h2>Vendedores</h2>


<table style="
   border-spacing:unset;
   margin:4rem 0rem; 
   width:100%
   ">

    <thead style="
      background-color: #1cef1c;
      color:white
     
   ">

      <tr>
        <th style="
           padding: 2rem 1rem;
           width: 5rem;
    
          ">id</th>
        <th>Nombre</th>
        <th>Apellido</th>
        <th style="
    text-align: center;
">imagen</th>
        <th style="
    text-align: center;
">telefono</th>

     
        <th style="width: 15rem;">Acciones</th>
      </tr>
    </thead>


    <tbody>

      <!-- generar la iteración -->


      <?php foreach ($vendedores as $vendedor) : ?>

        <tr>
          <th><?php echo $vendedor->id; ?> </th>
          <th><?php echo $vendedor->nombre; ?></th>
          <th><?php echo $vendedor->apellido; ?></th>
          <th style="width: 30rem;"><img src="../imagenes/vendedores/<?php echo $vendedor->imagen; ?>" alt="" srcset=""></th>
          <th style="
    text-align: center;
"> <?php echo $vendedor->telefono; ?></th>
    
      

        <th style="display:flex;justify-content: space-around;height: 29rem;align-items:center">

            <div style="width:35px">
              <a href="vendedores/actualizar?id=<?php echo $vendedor->id; ?> ">
                <img src="/build/img/recargar.webp" alt="">
              </a>

            </div>

            <div style="width:35px">

              <form method="POST" action="/vendedores/eliminar">

                <input type="hidden" name="imagen_eliminar" value="<?php echo $vendedor->imagen; ?>">
                <input type="hidden" name="id_eliminar" value="<?php echo $vendedor->id; ?>">
                <input type="hidden" name="tipo" value="vendedor">
                <button type="submit">

                  <img src="/build/img/borrar.webp" alt="">
                </button>


              </form>

            </div>
          </th>
        </tr>

      <?php endforeach; ?>
    </tbody>
  </table>



</main>