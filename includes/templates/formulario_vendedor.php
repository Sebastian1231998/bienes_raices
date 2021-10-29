<fieldset>
    <legend>Información general</legend>
         <label for="nombre">Nombre:</label>
         <input type="text" id="nombre" name="vendedor[nombre]" placeholder="titulo vendedor" value="<?php echo sanitizar($vendedor->nombre); ?>">
         <label for="apellido">Apellido:</label>
         <input type="text" id="apellido" name="vendedor[apellido]" placeholder="Apellido vendedor" value="<?php echo sanitizar($vendedor->apellido); ?>">
         <label for="imagen">Imagen:</label>
         <input type="file" id="imagenVendedor" name="vendedor[imagen]" accept="img/jpg , img/png">
         <img src="../../imagenes/vendedores/<?php echo $vendedor->imagen; ?> " style="width: 20rem;" alt="">
         <label for="Telefono">Telefono:</label>
         <input type="text" id="Telefono" name="vendedor[telefono]" placeholder="telefono vendedor" value="<?php echo sanitizar($vendedor->telefono); ?>">



      </fieldset>

