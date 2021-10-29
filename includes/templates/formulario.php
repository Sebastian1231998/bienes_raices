 
      <fieldset>
    <legend>Información general</legend>
         <label for="titulo">Titulo:</label>
         <input type="text" id="titulo" name="propiedad[titulo]" placeholder="titulo propiedad" value="<?php echo sanitizar($propiedad->titulo); ?>">
         <label for="precio">Precio:</label>
         <input type="number" id="precio" name="propiedad[precio]" placeholder="precio propiedad" value="<?php echo sanitizar($propiedad->precio); ?>">
         <label for="imagen">Imagen:</label>
         <input type="file" id="imagen" name="propiedad[imagen]" accept="img/jpg , img/png">
         <img src="../../imagenes/<?php echo $propiedad->imagen; ?> " style="width: 20rem;" alt="">
         <label for="descripcion">Descripción:</label>
         <textarea name="propiedad[descripcion]" id="descripcion"> <?php echo sanitizar($propiedad->descripcion); ?> </textarea>



      </fieldset>



      <fieldset>

         <legend>Información general</legend>
         <label for="habitaciones">Titulo:</label>
         <input type="Number" id="habitaciones" name="propiedad[habitaciones]" placeholder="Ej: 3" value="<?php echo sanitizar($propiedad->habitaciones); ?>">
         <label for="baños">WC:</label>
         <input type="number" id="wc" placeholder="Ej: 3" name="propiedad[wc]" value="<?php echo sanitizar($propiedad->wc); ?>">
         <label for="estacionamiento">Estacionamiento:</label>
         <input type="number" id="estacionamiento" placeholder="Ej: 3" name="propiedad[estacionamiento]" value="<?php echo sanitizar($propiedad->estacionamiento); ?>">


      </fieldset>

      
       <fieldset>

<legend>Información general</legend>

<label for="vendedor">vendedor:</label>
<select name="propiedad[vendedorId]" id="vendedor">

   
      <?php foreach($vendedores as $vendedor):?>
      
      <option value="<?php echo $vendedor->id;  ?>" <?php  echo ($vendedor->id === $propiedad->vendedorId) ?  "selected" : '' ?> > <?php echo $vendedor->nombre;  ?> </option>


      <?php endforeach; ?> 
    

</select>


</fieldset>



