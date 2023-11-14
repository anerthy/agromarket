<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Agromarket</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="<?= media(); ?>/images/img/plantilla/img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@500;600;700&family=Open+Sans:wght@400;500&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="<?= media(); ?>/lib-plantilla/animate/animate.min.css" rel="stylesheet">
    <link href="<?= media(); ?>/lib-plantilla/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="<?= media(); ?>/lib-plantilla/lightbox/css/lightbox.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="<?= media(); ?>/css/plantilla/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="<?= media(); ?>/css/plantilla/style.css" rel="stylesheet">





    
</head>

<body>
    <?php navbar(); ?>

   <!-- Carousel Start -->
   <div class="container-fluid p-0 wow fadeIn" data-wow-delay="0.1s">
        <div id="header-carousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="w-100" src="<?= media(); ?>/images/img/plantilla/img/carousel-3.jpg" alt="Image">
                    <div class="carousel-caption">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-lg-8">
                                    <h1 class="display-1 text-white mb-5 animated slideInDown">La agricultura local a un clic de distancia</h1>
                                    <!-- <a href="" class="btn btn-primary py-sm-3 px-sm-4">Explore More</a> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="w-100" src="<?= media(); ?>/images/img/plantilla/img/carousel-5.jpg" alt="Image">
                    <div class="carousel-caption">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-lg-7">
                                    <h1 class="display-1 text-white mb-5 animated slideInDown">Descubre lo mejor de la agricultura local</h1>
                                    <!-- <a href="" class="btn btn-primary py-sm-3 px-sm-4">Explore More</a> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#header-carousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#header-carousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
    <!-- Carousel End -->


<!-- Afiliarse -->
<div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5 align-items-end">
                <div class="col-lg-3 col-md-5 wow fadeInUp" data-wow-delay="0.1s">
                <!-- <img class="img-fluid rounded" src="<?= media(); ?>/images/hojitavision.jpg" alt="Visión"> -->
                    <img class="img-fluid rounded" data-wow-delay="0.1s" src="<?= media(); ?>/images/img/plantilla/img/about.jpg"> 
                </div>
                <div class="col-lg-6 col-md-7 wow fadeInUp" data-wow-delay="0.3s">
                    <h1 class="display-1 text-primary mb-0">#1</h1>
                    <p class="text-primary mb-4">En Ofrecer Productos Frescos</p>
                    <h1 class="display-5 mb-4">Únete a Agromarket y Haz Crecer tu Éxito Agrícola.</h1>
                    <p class="mb-4">Únete a Agromarket hoy y sé parte de una plataforma dedicada al impulso del sector agropecuario. Juntos, podemos fortalecer nuestras comunidades y crear oportunidades de crecimiento sostenible.</p>
                    <a class="btn btn-primary py-3 px-4" href="http://localhost/agromarket/register">Registrarse</a>

                </div>
                <div class="col-lg-3 col-md-12 wow fadeInUp" data-wow-delay="0.5s">
                    <div class="row g-5">
                        <div class="col-12 col-sm-6 col-lg-12">
                            <div class="border-start ps-4">
                                <i class="fa fa-award fa-3x text-primary mb-3"></i>
                                <h4 class="mb-3">Visibilidad Mejorada</h4>
                                <span>Destaca tus productos y eventos ante una audiencia amplia y comprometida.</span>
                            </div>
                        </div>
                        <div class="col-12 col-sm-6 col-lg-12">
                            <div class="border-start ps-4">
                                <i class="fa fa-users fa-3x text-primary mb-3"></i>
                                <h4 class="mb-3">Conexiones Estratégicas</h4>
                                <span>Establece contactos con otros miembros de la comunidad agrícola y empresarial.</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Afiliarse fin-->


<!-- QUIENES COMO Y QUE HACEMOS -->
<br>
<br>
<div class="container">
  <div class="row g-3 mb-4">
    <div class="col-md-8">
      <div class="pt-5">
        <h5 class="display-6"><strong>¿Quiénes Somos?</strong></h5>
        <p class="mb-0">
          En Agromarket, somos más que una plataforma digital; somos una comunidad apasionada que une a productores y consumidores en Nicoya y Santa Cruz. Nuestra historia se teje con la dedicación de agricultores locales y la conexión directa con aquellos que valoran la frescura, la autenticidad y la comunidad.
        </p>
      </div>
    </div>
    <div class="col-md-4">
      <!-- Ajustar tamaño máximo y agregar clase para imágenes responsivas -->
      <img class="img-fluid rounded" src="<?= media(); ?>/images/hojitamision.jpg" alt="Misión">
    </div>
  </div>
  <div class="border-top mb-4"></div>
  <div class="row g-3">
    <div class="col-md-4 my-5">
      <!-- Ajustar tamaño máximo y agregar clase para imágenes responsivas -->
      <img class="img-fluid rounded" src="<?= media(); ?>/images/hojitavision.jpg" alt="Visión">
    </div>
    <div class="col-md-8">
      <div class="pt-5">
        <h5 class="display-6"><strong>¿Qué Hacemos?</strong></h5>
        <p class="mb-0">
          En Agromarket, nos dedicamos a potenciar la conexión directa entre los productores locales y los consumidores en las vibrantes comunidades de Nicoya y Santa Cruz. Nuestra plataforma ofrece una experiencia integral que abarca desde la promoción de actividades en ferias locales hasta la presentación detallada de productos frescos y sus precios.
        </p>
      </div>
    </div>
  </div>
</div>


<!-- FIN QUIENES SOMOS Y QUE HACEMOS -->

    



<!-- VALORES -->
<div class="container-xxl py-5">
    <div class="container">
    <div class="section-title text-center position-relative pb-3 mb-5 mx-auto wow fadeInUp" data-wow-delay="0.5s" style="max-width: 600px; visibility: visible; animation-delay: 0.5s; animation-name: fadeInUp;">
        <h5 class="fw-bold text-primary text-uppercase">AQUÍ ENCONTRARÁS LOS</h5>
        <h1 class="mb-0">Valores de Agromarket</h1>
    </div>
        <div class="d-flex flex-wrap justify-content-around">
            <!-- Tarjeta 1 -->
            <div class="col-lg-2 col-md-4 col-sm-6 wow fadeInUp mb-4" data-wow-delay="0.5s">
                <div class="card">
                    <div class="card-content p-3">
                        <h3 class="fw-bold text-primary">Equidad</h3>
                    </div>
                </div>
            </div>

            <!-- Tarjeta 2 -->
            <div class="col-lg-2 col-md-4 col-sm-6 wow fadeInUp mb-4" data-wow-delay="0.5s">
                <div class="card">
                    <div class="card-content p-3">
                        <h3 class="fw-bold text-primary">Respeto</h3>
                    </div>
                </div>
            </div>

            <!-- Tarjeta 3 -->
            <div class="col-lg-2 col-md-4 col-sm-6 wow fadeInUp mb-4" data-wow-delay="0.5s">
                <div class="card">
                    <div class="card-content p-3">
                        <h3 class="fw-bold text-primary">Innovación</h3>
                    </div>
                </div>
            </div>

            <!-- Tarjeta 4 -->
            <div class="col-lg-2 col-md-4 col-sm-6 wow fadeInUp mb-4" data-wow-delay="0.5s">
                <div class="card">
                    <div class="card-content p-3">
                        <h3 class="fw-bold text-primary">Empatía</h3>
                    </div>
                </div>
            </div>

            <!-- Tarjeta 5 -->
            <div class="col-lg-2 col-md-4 col-sm-6 wow fadeInUp mb-4" data-wow-delay="0.5s">
                <div class="card">
                    <div class="card-content p-3">
                        <h3 class="fw-bold text-primary">Autenticidad</h3>
                    </div>
                    <!-- "mb-3 font-weight-bold" -->
                </div>
            </div>
        </div>
    </div>
</div>


<style>
    .card {
        width: 100%;
        background-color: #f0f0f0;
        border-radius: 10px;
        overflow: hidden;
        position: relative;
        transition: transform 0.3s;
        display: flex;
        flex-direction: column;
        align-items: center;
        cursor: pointer;
    }

    .card:hover {
        transform: scale(1.1);
    }
</style>
<!-- FIN VALORES -->

<!-- MISION Y VISON -->
<div class="container-xxl py-5">
    <div class="container mv">
        <div class="row g-5">
            <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.5s">
                <div class="img-border">
                <img class="img-fluid rounded" src="<?= media(); ?>/images/misionvision.jpg" alt="Visión">
                </div>
            </div>

            <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                <h1 class="display-5 mb-4">
                   ¡Nuestra
                    <span class="text-primary">Misión</span>!
                </h1>
                <p class="mb-4">
                Facilitar y promover el encuentro entre productores agrícolas, emprendedores y la comunidad en general, mediante la difusión clara y precisa de información sobre las ferias agropecuarias.
                </p>

                <h1 class="display-5 mb-4">
                    ¡Nuestra
                    <span class="text-primary">Visión</span>!
                </h1>
                <p class="mb-4">
                En Agromarket, aspiramos a ser el principal referente en la difusión de eventos agrícolas, convirtiéndonos en la plataforma preferida para agricultores y consumidores por igual.
                </p>
            </div>
        </div>
    </div>
</div>
<!-- Misión y visión End -->





    <!-- Productos destacados Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                <!-- <p class="fs-5 fw-bold text-primary">Destacados</p> -->
                <h1 class="display-5 mb-5">Productos Destacados</h1>
            </div>
            <div class="row g-4">
                <?php foreach ($data['productos_premium'] as $producto) : ?>
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.5s">
                        <div class="service-item rounded d-flex h-100">
                            <div class="service-img rounded">
                                <img class="img-fluid" src="<?= media() . '/images/uploads/productos/' . $producto['pro_imagen']; ?>" alt="">
                            </div>
                            <div class="service-text rounded p-5">
                                <!-- <div class="btn-square rounded-circle mx-auto mb-3">
                                            <img class="img-fluid" src="<?= media() . '/images/uploads/productos/' . $producto['pro_imagen']; ?>" alt="Icon">
                                        </div> -->
                                <h4 class="mb-3"><?php echo $producto['pro_nombre']; ?></h4>
                                <p class="mb-4">$ <?php echo $producto['pro_precio']; ?></p>
                                <a class="btn btn-sm" href="<?= base_url(); ?>/home/DetallesProducto/<?php echo $producto['pro_id']; ?>"><i class="fa fa-eye text-primary me-2"></i>Ver más</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
    <!-- Productos destacados End -->



<!-- MAPA Y FORM -->


<!-- Contact Start -->
<div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                    <p class="fs-5 fw-bold text-primary">¿Cómo Llegar?</p>
                    <h1 class="display-5 mb-5">Cada feria es un viaje vibrante hacia la comunidad agrícola</h1>
                    <p class="mb-4">En Agromarket, nos preocupamos por facilitar tu llegada a las imperdibles ferias. Para guiarte con precisión, hemos incorporado un mapa detallado en nuestro sitio web que puedes consultar para planificar tu ruta.</a>.</p>
                        <!-- <table class="table table-hover table-bordered" id="tableDonacion">
                        <thead>
                            <tr>
                                <th>Descripción</th>
                                <th>Medio</th>
                                <th>Información</th>
                            </tr>
                        </thead> -->

                        <!--COMENTO ESTO PORQUE SE DESPICHA TERE <tbody>
                            <?php foreach ($data['arrData'] as $donacion): ?>
                            <tr>
                                <td><?php echo $donacion['don_descripcion']; ?></td>
                                <td><?php echo $donacion['don_medio']; ?></td>
                                <td><?php echo $donacion['don_informacion']; ?></td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody> -->
                    </table>
                </div>
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s" style="min-height: 450px;">
                    <div class="position-relative rounded overflow-hidden h-100">
                        <iframe class="position-relative w-100 h-100" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15709.663922105574!2d-85.45294767953472!3d10.146801913996205!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8f9fb6d26f825361%3A0xcbdc1416a01be4f3!2sProvincia%20de%20Guanacaste%2C%20Nicoya!5e0!3m2!1ses-419!2scr!4v1698256841525!5m2!1ses-419!2scr" frameborder="0" style="min-height: 450px; border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Contact End -->
<!-- FIN MAPA Y FORM -->



    <section class="anuncio">
        <?php if (count($data['anuncio_principal']) > 0) { ?>
            <?php for ($i = 0; $i < count($data['anuncio_principal']); $i++) { ?>
                <center>
                    <div class="col-lg-3 col-md-12 portfolio-item">
                        <div class="rounded">
                            <img class="img-fluid" src="<?= media(); ?>/images/uploads/anuncio/<?php echo $data['anuncio_principal'][$i]['anu_imagen']; ?>" alt="<?php echo $data['anuncio_principal'][$i]['anu_descripcion']; ?>" title="<?php echo $data['anuncio_principal'][$i]['anu_descripcion']; ?>" />
                        </div>
                    </div>
                </center>
            <?php  } ?>
        <?php } ?>

    </section>

    <?php footer(); ?>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="<?= media(); ?>/lib-plantilla/wow/wow.min.js"></script>
    <script src="<?= media(); ?>/lib-plantilla/easing/easing.min.js"></script>
    <script src="<?= media(); ?>/lib-plantilla/waypoints/waypoints.min.js"></script>
    <script src="<?= media(); ?>/lib-plantilla/owlcarousel/owl.carousel.min.js"></script>
    <script src="<?= media(); ?>/lib-plantilla/counterup/counterup.min.js"></script>
    <script src="<?= media(); ?>/lib-plantilla/parallax/parallax.min.js"></script>
    <script src="<?= media(); ?>/lib-plantilla/isotope/isotope.pkgd.min.js"></script>
    <script src="<?= media(); ?>/lib-plantilla/lightbox/js/lightbox.min.js"></script>

    <!-- Template Javascript -->
    <script src="<?= media(); ?>/js/plantilla/main.js"></script>
</body>

</html>