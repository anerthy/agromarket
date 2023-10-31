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

    <!-- Projects Start -->
    <div class="container-xxl py-5">
        <div class="container">

            <!-- Service Start -->
            <div class="container-xxl py-5">
                <div class="container">
                    <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                        <!-- <p class="fs-5 fw-bold text-primary">Destacados</p> -->
                        <h1 class="display-5 mb-5">Productos destacados</h1>
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
            <!-- Service End -->

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
    <!-- Projects End -->

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