


<?php foreach( $resultados as $resultado): ?>   
<div class="card">

<div data-cy="header-card" class="header-card">

      <img src="imagenes/<?php echo $resultado->imagen ; ?>" class="img-anuncio" alt="anuncio" >
</div>
<div class="body-card">
     <h3><?php echo $resultado->titulo; ?></h3>
      <p><?php echo $resultado->descripcion; ?></p>
      <span class="precio"><?php echo $resultado->precio; ?></span>
      <div class="contenedor-icon">
        <div class="subcointainer-flex">
            <img src="./build/img/icono_wc.svg"class="icono-anuncio" alt="icono" >
            <span><?php echo $resultado->wc; ?></span>
          </div>
          <div class="subcointainer-flex">
            <img src="./build/img/icono_estacionamiento.svg" class="icono-anuncio" alt="icono">
            <span><?php echo $resultado->estacionamiento; ?></span>
          </div>
          <div class="subcointainer-flex">
            <img src="./build/img/icono_dormitorio.svg" class="icono-anuncio" alt="icono">
            <span><?php echo $resultado->habitaciones; ?></span>
          </div>
     </div>

     <a href="./anuncio?id=<?php echo $resultado->id; ?>" data-cy="button_card" class="button_card">Ver propiedad</a>
</div>
</div>

<?php endforeach; ?>