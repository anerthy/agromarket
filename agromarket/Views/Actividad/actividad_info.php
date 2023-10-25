<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Actividades</title>
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

    <!-- Page Header Start -->
    <div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container text-center py-5">
            <h1 class="display-3 text-white mb-4 animated slideInDown">Actividades</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a href="<?= base_url(); ?>">Agromarket</a></li>
                    <li class="breadcrumb-item"><a href="">Actividades</a></li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->

    <!-- ANUNCIOS  -->
    <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
        <h1 class="display-5 mb-5">Empresas Patrocinadoras</h1>
    </div>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6 col-12">
                <div class="card" style="border: none;">
                    <img src="<?= media(); ?>/images/cocacolanuncio.png" alt="Afiliados Premium" class="rounded" style="width: 100%; max-height: 200px;">
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-12">
                <div class="card" style="border: none;">
                    <img src="<?= media(); ?>/images/dospinosanuncio.png" alt="Afiliados Premium" class="rounded" style="width: 100%; max-height: 200px;">
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-12">
                <div class "card" style="border: none;">
                    <img src="<?= media(); ?>/images/pizzahutanuncio.jpg" alt="Afiliados Premium" class="rounded" style="width: 100%; max-height: 200px;">
                </div>
            </div>
        </div>
    </div>
    <!-- ANUNCIOS FIN -->

    <!-- Projects Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                <p class="fs-5 fw-bold text-primary">Proximas</p>
                <h1 class="display-5 mb-5">Actividades a Realizar</h1>
            </div>
            <div class="row wow fadeInUp" data-wow-delay="0.3s">
                <div class="col-12 text-center">
                    <ul class="list-inline rounded mb-5" id="portfolio-flters">
                        <li class="mx-2 active" data-filter="*">Todas</li>
                        <li class="mx-2" data-filter=".nicoya">Nicoya</li>
                        <li class="mx-2" data-filter=".santa_cruz">Santa Cruz</li>
                    </ul>
                </div>
            </div>

            <div class="row g-4 portfolio-container">

                <?php foreach ($data['listado_actividades'] as $actividad) : ?>
                    <div class="col-lg-4 col-md-6 portfolio-item <?php echo $actividad['act_lugar']; ?> wow fadeInUp" data-wow-delay="0.1s">
                        <div class="card">
                            <i class="fa fa-leaf fa-5x d-block mx-auto mt-3 text-success"></i>
                            <div class="card-body">
                                <img src="<?php echo media() . '/images/uploads/actividades/' . $actividad['act_imagen']; ?>" alt="<?php echo $actividad['act_nombre']; ?>" width="100px">
                                <h5 class="card-title"><?php echo $actividad['act_nombre']; ?></h5>
                                <p class="card-text"><?php echo $actividad['act_descripcion']; ?></p>
                                <p><i class="fa fa-map-marker"></i> Lugar: <?php echo $actividad['act_lugar']; ?></p>
                                <p><i class="fa fa-calendar"></i> Fecha: <?php echo $actividad['act_fecha']; ?></p>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>

            </div>
        </div>
    </div>
    <!-- Projects End -->

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