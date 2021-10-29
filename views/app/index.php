  <section class="conenido-principal">
    <h2 data-cy="heading-nosotros">Mas sobre Nosotros</h2>

    <div data-cy="contenido-nosotros" class="contenedor contenido-nosotros">

      <div class="column-nosotros">

        <img src="/build/img/icono1.svg" class="icono" alt="icono" width="200px" height="100px">
        <h3>Seguridad</h3>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quo, nostrum, nisi, non voluptate eum fugit itaque neque commodi nam at nesciunt natus quas. Reiciendis dolor veritatis</p>


      </div>
      <div class="column-nosotros">

        <img src="/build/img/icono2.svg" class="icono" alt="icono" width="200px" height="100px">
        <h3>Precio</h3>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quo, nostrum, nisi, non voluptate eum fugit itaque neque commodi nam at nesciunt natus quas. Reiciendis dolor veritatis</p>


      </div>
      <div class="column-nosotros">

        <img src="/build/img/icono3.svg" class="icono" alt="icono" width="200px" height="100px">
        <h3>A tiempo</h3>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quo, nostrum, nisi, non voluptate eum fugit itaque neque commodi nam at nesciunt natus quas. Reiciendis dolor veritatis</p>


      </div>




    </div>
  </section>

  <main class="anuncios">
    <div class="contenedor">



      <h2 data-cy="heading-anuncios">Casas y Depas en Venta</h2>




      <div class="grid-card">

        <?php include __DIR__ . '/../../includes/templates/anuncio.php'; ?>



      </div>



    </div>

    </div> <!-- cierre grid-->




    <div class="button-contenedor contenedor">

      <a href="./anuncios" data-cy="button_todos" class="button_todos">Ver Todas</a>
    </div>



  </main>



  <section class="seccion-enlace-contacto">
    <div class="hero-image-enlace" style="background-image: url(./build/img/encuentra.jpg);">
      <div class="contenedor flex-enlace">
        <h2 data-cy="heading-contacto-index">Encuentra la casa de tus sueños</h2>
        <p>Llena el formulario y un asesor se pondra en contacto contigo</p>
        <a href="./contacto" data-cy="button_enlace" class="button_enlace">Contactános</a>
      </div>


    </div>

  </section>


  <section class="blog-info">


    <div class="blog-contenedor contenedor">


      <div class="contenido-blog">
        <h3>Nuestro Blog</h3>



        <div class="entrada">

          <div class="flex-blog">
            <img src="./build/img/blog1.jpg" alt="blog">
            <div class="contenido-blog">
              <div class="border">
                <h3>Terraza en el techo de tu casa</h3>
              </div>


              <p class="admin">Escrito el: <span>9/03/21</span> spor: <span>Admin</span></p>

              <p>Consejos para construir una terraza ern el techo de tu casa con los mejores materiales y ahorrando dinero</p>

            </div>
          </div>

        </div>


        <div class="entrada">

          <div class="flex-blog">
            <img src="./build/img/blog2.jpg" alt="blog">
            <div class="contenido-blog">
              <div class="border">
                <h3>Terraza en el techo de tu casa</h3>
              </div>

              <p class="admin">Escrito el: <span>9/03/21</span> por: <span>Admin</span></p>

              <p>Consejos para construir una terraza ern el techo de tu casa con los mejores materiales y ahorrando dinero</p>

            </div>
          </div>



        </div>

      </div>





      <div class="testimoniales">

        <h3>Testimoniales</h3>

        <div class="contenedor-testimoniales">

          <div class="flex-test">

            <span>&quot;</span>
            <p class="p-test">El personal se comportó de una excelente forma,muy buena atención y la casa que me ofrecieron cumple con todas mis expectativas</p>
          </div>

          <p class="firma">- Juan Sebastian Rodriguez </p>
        </div>



      </div><!-- testimoniales  -->

    </div> <!-- contenedor -->
  </section>