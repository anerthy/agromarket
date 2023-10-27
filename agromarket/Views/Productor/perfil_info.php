<!DOCTYPE html>
<html lang="zxx">

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



  
    <!-- Css Styles -->
    <link rel="stylesheet" href="<?= media(); ?>/css/PerfilProductor_Info/style.css" type="text/css">


    <!-- Template Stylesheet -->
    <link href="<?= media(); ?>/css/plantilla/style.css" rel="stylesheet">
</head>

<body>



    <!-- Navbar End -->
    <?php navbar(); ?>




    <!-- Hero Section Begin -->
    <section class="hero">
        <div class="container">
            <div class="row">
                <center>
             
                <div class="col-lg-9" style="    margin-top: 100px;">


                    <?php foreach ($data['arrData'] as $productor): ?>

                    <div class="container-hero">
                        <div class="info-section-hero">
                            <div class="info-text-hero">
                                <h4><?php echo $productor['pdt_nombre']; ?></h4>
                                <p><?php echo $productor['pdt_ubicacion']; ?></p>
                            </div>
                        </div>
                        <div class="image-section-hero">
                            <img src="<?php echo media() . '/images/uploads/productores/' .$productor['pdt_imagen']; ?>"
                                alt="">
                        </div>
                    </div>

                    <?php endforeach; ?>




                </div>
                </center>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->
    <!-- Featured Section Begin -->
    <section class="featured spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>Featured Product</h2>
                    </div>
                    <div class="featured__controls">
                        <ul>
                            <li class="active" data-filter="*">All</li>
                            <li data-filter=".oranges">Oranges</li>
                            <li data-filter=".fresh-meat">Fresh Meat</li>
                            <li data-filter=".vegetables">Vegetables</li>
                            <li data-filter=".fastfood">Fastfood</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row featured__filter">
                <?php foreach ($data['arrDatapro'] as $producto): ?>
                <div class="col-lg-3 col-md-4 col-sm-6 mix oranges fresh-meat">
                    <div class="featured__item">
                        <div class="featured__item__pic set-bg"
                            data-setbg="<?=media() . '/images/uploads/productos/' .$producto['pro_imagen']; ?>">
                            <ul class="featured__item__pic__hover">
                                <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                <li><a href="#"><i class="fa fa-retweet"></i></a></li>
                                <li><a href="#"><i class="fa fa-shopping-cart"></i></a></li>
                            </ul>
                        </div>
                        <div class="featured__item__text">
                            <h6><?php echo $producto['pro_nombre']; ?></h6>
                            <h5>$<?php echo $producto['pro_precio']; ?></h5>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>







    </section>
    <!-- Featured Section End -->

    <!-- Banner End -->

    <!-- Footer Start -->
    <?php footer(); ?>
    <!-- Footer End -->









    <!-- Js Plugins -->
    <script src="<?= media(); ?>/js/Perfil-productor/jquery-3.3.1.min.js"></script>
    <script src="<?= media(); ?>/js/Perfil-productor/bootstrap.min.js"></script>
    <script src="<?= media(); ?>/js/Perfil-productor/jquery.nice-select.min.js"></script>
    <script src="<?= media(); ?>/js/Perfil-productor/jquery-ui.min.js"></script>
    <script src="<?= media(); ?>/js/Perfil-productor/jquery.slicknav.js"></script>
    <script src="<?= media(); ?>/js/Perfil-productor/mixitup.min.js"></script>
    <script src="<?= media(); ?>/js/Perfil-productor/owl.carousel.min.js"></script>
    <script src="<?= media(); ?>/js/Perfil-productor/main.js"></script>
        <!-- JavaScript Libraries -->
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


