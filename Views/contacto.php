<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Contacto</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/agrolajas-logo.png" rel="icon" />

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Playfair+Display:wght@700;900&display=swap"
        rel="stylesheet"
    />

    <!-- Bootstrap v5.0.0 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Bootstrap Icons v1.5.0 CSS -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    
    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet" />
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet" />

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet" />
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

    <!-- Page Header Start -->
    <div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container text-center py-5">
            <h1 class="display-3 text-white mb-4 animated slideInDown">Contacto</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a href="<?= base_url(); ?>">Agromarket</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><a href="">Contacto</a></li>
                </ol>
            </nav>
        </div>
    </div>

    <div class="container-xxl contact py-5">
        <div class="container">
            <div class="section-title text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px">
                <p class="fs-5 fw-medium fst-italic text-primary">Contáctenos</p>
                <h1 class="display-6">
                    Para cualquier consulta, estamos a tu disposición
                </h1>
            </div>

            <div class="row g-5 mb-5">
             <!-- Sección de correo electrónico -->
             <div class="col-md-4 text-center wow fadeInUp" data-wow-delay="0.3s">
                    <div class="mx-auto mb-3 icon-bg">
                        <!-- Utilizando icono de sobre de Font Awesome -->
                        <i class="fa fa-envelope fa-2x text-white"></i>
                    </div>
                    <p class="mb-2"><b>Correo electrónico</b></p>
                    <a href="mailto:agrolajascostarica@gmail.com">
                        <p class="mb-0">agromarketnicoya@gmail.com</p>
                    </a>
                </div>

                <!-- Sección de número de teléfono -->
                <div class="col-md-4 text-center wow fadeInUp" data-wow-delay="0.4s">
                    <div class="mx-auto mb-3 icon-bg">
                        <!-- Utilizando icono de teléfono de Font Awesome -->
                        <i class="fa fa-phone fa-2x text-white"></i>
                    </div>
                    <p class="mb-2"><b>Número de teléfono</b></p>
                    <a href="tel:+50620232023">
                        <p class="mb-0">+506 2023-2023</p>
                    </a>
                </div>

                <!-- Sección de dirección -->
                <div class="col-md-4 text-center wow fadeInUp" data-wow-delay="0.5s">
                    <div class="mx-auto mb-3 icon-bg">
                        <!-- Utilizando icono de mapa de Font Awesome -->
                        <i class="fa fa-map-marker-alt fa-2x text-white"></i>
                    </div>
                    <p class="mb-2"><b>Dirección</b></p>
                    <p class="mb-0">
                        Nicoya, Guanacaste, Costa Rica
                    </p>
                </div>
            </div>


            <!-- Resto del contenido -->
        </div>
    </div>

    <!-- EL ANUNCIO -->
    <?php anuncios(); ?>
    <!-- ANUNCIO FIN -->
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
