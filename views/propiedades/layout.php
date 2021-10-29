<?php
if (!isset($_SESSION)) {
    session_start();
}
$auth = $_SESSION['usuario'] ?? false;

if ($auth) {
    $sesion = true;
} else {
    $sesion = false;
}


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienes Raices</title>


    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link rel="stylesheet" href="/build/css/app.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
</head>

<body>




    <header class=" <?php echo $inicio ? 'header' : 'header-nosotros' ?> ">
        <div class="contenedor contenido-header">


            <div class="barra">
                <a href="/">
                    <img src="/build/img/logo.svg" alt="logo">
                </a>
                <div class="contenedor-menu">
                    <div class="button_nav"></div>
                </div>
                <div class="derecha">

                    <img loading="lazy" class="button-dark" src="/build/img/dark-mode.svg" alt="dark-mode">

                    <nav class="navegacion" data-cy="navegacion-header">

                        <a href="nosotros">Nosotros</a>
                        <a href="anuncios">Anuncios</a>
                        <a href="blog">Blog</a>
                        <a href="contacto">Contacto</a>
                        <?php if ($sesion) : ?>
                            <a href="cerrar?cerrar_sesion=true">Cerrar Sesión</a>
                        <?php endif; ?>
                    </nav>
                </div>

            
            </div>

            <?php if(isset($inicio)): ?>
            <div class="abajo">
                         <h1 data-cy="heading-sitio">Venta y departamentos exclusivos de lujo</h1>                
                </div>
            <?php endif; ?> 

    </header>


    <?php echo $contenido; ?>

    <footer class="footer">
        <div class="contenedor">

            <nav class="navegacion nav-footer" data-cy="navegacion-footer">
                <a href="nosotros">Nosotros</a>
                <a href="anuncios">Anuncios</a>
                <a href="blog">Blog</a>
                <a href="contacto">Contacto</a>

            </nav>
        </div>

        <p>Todos los derechos reservados &copy;</p>

    </footer>





    <script src="/build/js/bundle.min.js"></script>





</body>

</html>