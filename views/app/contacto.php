

<main class="contacto">
   <div class="contenedor contenido-contacto">

   
<?php if($mensaje): ?>
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
      <p style="color: white;">Se ha enviado mensaje correctamente</p>
    </div>

   <?php endif; ?>

      <h2 data-cy="heading-page-contacto">Contacto</h2>
      <div class="encabezado-contacto">

         <picture>
            <source srcset="build/img/destacada3.webp" type="image/webp">
            <source srcset="build/img/destacada3.jpg" type="image/jepg">
            <img src="build/img/destacada3.jpg" load="lazy" alt="">


         </picture>
      </div>



      <div class="cuerpo-contacto">
         <h2>Llena el Formulario de Contacto</h2>


         <form class="formulario" method="POST">

            <fieldset>
               <legend>Información personal</legend>

               <div class="flex-form">


                  <div class="campo">
                     <label for="nombre">Nombre:</label>
                     <input type="text" name="nombre" id="nombre" placeholder="Escriba su Nombre" required>
                  </div>
            
                  <div class="campo">
                     <label for="mensaje">Mensaje:</label>
                     <textarea type="text" name="mensaje" id="mensaje" required></textarea>

                  </div>  

               </div> <!-- flex form-->


            </fieldset>


            <fieldset class="fieldset">
               <legend>Información sobre su propiedad</legend>

               <div class="flex-form">


                  <div class="campo">
                     <label for="tipo">Vende o compra</label>
                     <select name="tipo" id="tipo" required>
                  
                        <option value="Vender">Vender</option>
                        <option value="Comprar">Comprar</option>
                     </select>
                  </div>
                  <div class="campo">
                     <label for="cantidad">Precio:</label>
                     <input type="text" name="precio" id="precio" required>
                  </div>

               </div>




            </fieldset>

            <fieldset>
               <legend class="legend">Contacto</legend>

               <div class="flex-form check">

                  <div class="campo">

                              <label for="cbox1">Telefono</label>
                              <input class="checkbox" name="contacto" type="radio" id="cbox1" value="Telefono " required>
                           

                       
                              <label for="cbox1">Correo</label>
                              <input class="checkbox" name="contacto" type="radio" id="cbox2" value="Correo" required>
                        


                  </div>

                  <div class="campo email">
                     <label for="email" >Correo:</label>
                     <input type="email" name="email" id="email" placeholder="Escriba su Correo">
                  </div>
                  <div class="campo telefono">
                     <label for="telefono">Telefono:</label>
                     <input type="tel" name="telefono" id="telefono" placeholder="Escriba su Telefono">
                  </div> 
                  
                  <div class="campo">
                     <label for="cantidad">Fecha:</label>
                     <input type="date" name="fecha" id="fecha" required>
                  </div>

                  <div class="campo">
                     <label for="cantidad">Hora:</label>
                     <input type="time" name="hora" id="hora" required>
                  </div>


               </div> <!-- flex form-->


            </fieldset>





            <div class="content-button">

               <input type="submit" class="form-button"></a>
            </div>


      </div>
   </div>

   </form>
   </div>
   </div> <!-- Cierre contenedor-->
</main>