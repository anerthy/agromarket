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

    <style>
        /* Estilos generales */
        .product-card-container {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            /* Espacio entre tarjetas */
            justify-content: space-around;
            /* Ajuste horizontal */
            margin: 0 auto;
            max-width: 1200px;
            /* Máximo ancho del contenedor */
        }

        .product-card {
            width: 250px;
            /* Ancho fijo de la tarjeta */
            border: 1px solid #ccc;
            border-radius: 8px;
            padding: 20px;
            text-align: center;
        }

        .product-card img {
            max-width: 100%;
            height: auto;
            border-radius: 6px;
            margin-bottom: 10px;
        }

        .product-card h2 {
            margin-bottom: 10px;
        }

        .product-card a {
            display: block;
            background-color: #348E38;
            color: #fff;
            text-decoration: none;
            padding: 8px;
            border-radius: 4px;
            transition: background-color 0.3s;
        }

        .product-card a:hover {
            background-color: #0EA06F;
        }
    </style>
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


            <div class=" product-card-container">
                <?php if (count($data['listado_productos']) > 0) { ?>
                    <?php for ($i = 0; $i < count($data['listado_productos']); $i++) { ?>
                        <div class="portfolio-item product-card <?php echo $data['listado_productos'][$i]['pro_categoria']; ?>">
                            <img src="<?= media(); ?>/images/uploads/productos/<?php echo $data['listado_productos'][$i]['pro_imagen']; ?>" alt="<?php echo $data['listado_productos'][$i]['pro_descripcion']; ?>" />
                            <h2><?php echo $data['listado_productos'][$i]['pro_nombre']; ?></h2>
                            <p>₡ <?php echo $data['listado_productos'][$i]['pro_precio']; ?></p>
                            <a href="<?= base_url(); ?>/home/DetallesProducto/<?php echo $data['listado_productos'][$i]['pro_id']; ?>">Ver más</a>
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