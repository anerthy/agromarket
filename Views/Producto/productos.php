<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Productos</title>
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
            <h1 class="display-3 text-white mb-4 animated slideInDown">Productos</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a href="<?= base_url(); ?>">Agromarket</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><a href="">Productos</a></li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->

    <!-- Product List Start -->
    <div class="container-xxl py-5">
        <div class="container">

            <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                <p class="fs-5 fw-bold text-primary">Explora nuestro mercado en linea</p>
                <!-- <h1 class="display-5 mb-5">Productos</h1> -->
            </div>

            <div class="row wow fadeInUp" data-wow-delay="0.3s">
                <div class="col-12 text-center">
                    <ul class="list-inline rounded mb-5" id="portfolio-flters">
                        <li class="mx-2 active" data-filter="*">Todos</li>
                        <li class="mx-2" data-filter=".fruta">Frutas</li>
                        <li class="mx-2" data-filter=".verdura">Verduras</li>
                    </ul>
                </div>
            </div>

            <div class="row g-4 portfolio-container">
                <?php if (count($data['listado_productos']) > 0) { ?>
                    <?php for ($i = 0; $i < count($data['listado_productos']); $i++) { ?>
                        <div class="col-lg-3 col-md-6 portfolio-item <?php echo $data['listado_productos'][$i]['pro_categoria']; ?>">
                            <div class="rounded">
                                <img class="img-fluid" src="<?= media(); ?>/images/uploads/productos/<?php echo $data['listado_productos'][$i]['pro_imagen']; ?>" alt="<?php echo $data['listado_productos'][$i]['pro_descripcion']; ?>" />
                                <div class="portfolio-text">
                                    <h4 class="text-center mb-2 mt-2"><?php echo $data['listado_productos'][$i]['pro_nombre']; ?></h4>
                                    <h5 class="text-center mb-3 mt-2">₡ <?php echo $data['listado_productos'][$i]['pro_precio']; ?></h5>
                                    <center>
                                        <a class="btn btn-primary py-3 px-4" href="<?= base_url(); ?>/home/DetallesProducto/<?php echo $data['listado_productos'][$i]['pro_id']; ?>">
                                            <i class="fa fa-eye me-2"></i>Ver más</a>
                                    </center>
                                </div>
                            </div>
                        </div>
                    <?php  } ?>
                <?php } else { ?>
                    <center>
                        <p>no hay productos...</p>
                    </center>
                <?php } ?>

            </div>
        </div>
    </div>
    <!-- Product List End -->

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