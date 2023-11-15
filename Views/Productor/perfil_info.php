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

    <!-- Google Web Fonts
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@500;600;700&family=Open+Sans:wght@400;500&display=swap" rel="stylesheet"> -->

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet
    <link href="<?= media(); ?>/lib-plantilla/animate/animate.min.css" rel="stylesheet">
    <link href="<?= media(); ?>/lib-plantilla/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="<?= media(); ?>/lib-plantilla/lightbox/css/lightbox.min.css" rel="stylesheet"> -->

    <!-- Customized Bootstrap Stylesheet -->
    <link href="<?= media(); ?>/css/plantilla/bootstrap.min.css" rel="stylesheet">
    <!-- Css Styles -->
    <link rel="stylesheet" href="<?= media(); ?>/css/PerfilProductor_Info/style.css" type="text/css">


    <!-- Template Stylesheet -->
    <link href="<?= media(); ?>/css/plantilla/style.css" rel="stylesheet">
</head>

<body>
    <!-- NAVBAR -->

    <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" role="status" style="width: 3rem; height: 3rem;"></div>
    </div>
    <!-- Spinner End -->


    <!-- Topbar Start -->
    <div class="container-fluid bg-dark text-light px-0 py-2">
        <div class="row gx-0 d-none d-lg-flex">
            <div class="col-lg-7 px-5 text-start">
                <div class="h-100 d-inline-flex align-items-center me-4">
                    <span class="fa fa-phone-alt me-2"></span>
                    <span>+506 2023-2023</span>
                </div>
                <div class="h-100 d-inline-flex align-items-center">

                    <span class="far fa-envelope me-2"></span>
                    <span>agromarket@gmail.com</span>
                </div>
            </div>
            <div class="col-lg-5 px-5 text-end">
                <div class="h-100 d-inline-flex align-items-center mx-n2">
                    <span>Síguenos en:</span>
                    <a class="btn btn-link text-light" href=""><i class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-link text-light" href=""><i class="fab fa-twitter"></i></a>
                    <a class="btn btn-link text-light" href=""><i class="fab fa-linkedin-in"></i></a>
                    <a class="btn btn-link text-light" href=""><i class="fab fa-instagram"></i></a>
                </div>
            </div>
        </div>
    </div>
    <!-- Topbar End -->


    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg bg-white navbar-light sticky-top p-0">
        <a href="<?= base_url(); ?>" class="navbar-brand d-flex align-items-center px-4 px-lg-5">
            <h1 style="color: #0F4229;
    font-size: 40px;" class="m-0">Agromarket</h1>
        </a>
        <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto p-4 p-lg-0">
                <a href="<?= base_url(); ?>/" class="nav-item nav-link active">Inicio</a>
                <a href="<?= base_url(); ?>/home/about_us" class="nav-item nav-link">Sobre Nosotros</a>
                <div class="nav-item dropdown">
                    <a href="<?= base_url(); ?>/home/productos" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Mercado</a>
                    <div class="dropdown-menu bg-light m-0">
                        <a href="<?= base_url(); ?>/home/productos" class="dropdown-item">Productos</a>
                        <a href="<?= base_url(); ?>/home/productor" class="dropdown-item">Productores</a>
                    </div>
                </div>
                <!-- <a href="<?= base_url(); ?>/home/Productor" class="nav-item nav-link">Productores</a> -->
                <a href="<?= base_url(); ?>/home/Actividad" class="nav-item nav-link">Actividades</a>
                <a href="<?= base_url(); ?>/home/contacto" class="nav-item nav-link">Contacto</a>
            </div>
            <a href="<?= base_url(); ?>/login" class="btn btn-primary py-4 px-lg-4 rounded-0 d-none d-lg-block">Iniciar
                sesión<i class="fa fa-arrow-right ms-3"></i></a>
        </div>
    </nav>
    <!-- Navbar End -->


    <!-- NAVBAR -->

    <!-- Hero Section Begin -->
    <section class="hero">
        <div class="container">
            <div class="row">
                <center>

                    <br>
                    <br>

                    <div class="col-lg-12">
                        <div class="section-title">
                            <h2>Perfil del Productor</h2>
                        </div>

                        <section class="vh-5" style="background-color: #417648;">
                            <div class="container py-5 h-100">
                                <div class="row d-flex justify-content-center align-items-center h-10">
                                    <div class="col col-lg-6 mb-4 mb-lg-0">
                                        <div class="card mb-3" style="border-radius: .5rem;">
                                            <div class="row g-0">
                                                <div class="col-md-4 gradient-custom text-center text-white" style="border-top-left-radius: .5rem; border-bottom-left-radius: .5rem;">
                                                    <img src="https://images.unsplash.com/photo-1522075469751-3a6694fb2f61?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=500&q=80" class="rounded" width="155">
                                                    alt="Avatar" class="img-fluid my-5" style="width: 80px;" />
                                                    <i class="far fa-edit mb-5"></i>
                                                </div>
                                                <div class="col-md-8">
                                                    <div class="card-body p-4">
                                                        <?php foreach ($data['arrData'] as $productor) : ?>
                                                            <h6>Información Personal</h6>
                                                            <hr class="mt-0 mb-4">
                                                            <div class="row pt-1">
                                                                <div class="col-6 mb-3">
                                                                    <h6>Nombre</h6>
                                                                    <p class="text-muted"><?php echo $productor['pdt_nombre']; ?></p>
                                                                </div>
                                                                <div class="col-6 mb-3">
                                                                    <h6>Dirección</h6>
                                                                    <p class="text-muted"><?php echo $productor['pdt_ubicacion']; ?></p>
                                                                </div>
                                                                <div class="col-6 mb-3">
                                                                    <h6>Teléfono</h6>
                                                                    <p><?php echo $productor['per_telefono']; ?></p>
                                                                </div>
                                                            </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                        </section>

                        <!-- <div class="container mt-5 d-flex justify-content-center">

<div class="card p-3">

    <div class="d-flex align-items-center">

        <div class="image">
    <img src="https://images.unsplash.com/photo-1522075469751-3a6694fb2f61?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=500&q=80" class="rounded" width="155" >
    </div>

    <div class="ml-3 w-100">
    <?php foreach ($data['arrData'] as $productor) : ?> 
       <h4 class="mb-0 mt-0"><?php echo $productor['pdt_nombre']; ?></h4>
       <span><?php echo $productor['pdt_ubicacion']; ?></span>

    </div>

    <?php endforeach; ?>  
    </div> -->

                    </div>

            </div>
            <!-- 
                    <div class="col-lg-9" style="    margin-top: 100px;">
                        <?php foreach ($data['arrData'] as $productor) : ?>

                        <div class="container-hero">
                            <div class="info-section-hero">
                                <div class="info-text-hero">
                               
                                <img class="img-fluid rounded" src="<?= media(); ?>/images/misionvision.jpg" alt="Visión">
                                    <h4><?php echo $productor['pdt_nombre']; ?></h4>
                                    <p><?php echo $productor['pdt_ubicacion']; ?></p>
                                </div>
                       
                            </div>
                            <div class="image-section-hero">
                                <img src="<?php echo media() . '/images/uploads/productores/' . $productor['pdt_imagen']; ?>"
                                    alt="">

                                    
                            </div>
                        </div>

                        <?php endforeach; ?>
                    </div> -->
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
                        <h2>Productos</h2>
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

                </div>
            </div>
            <style>
                /* Estilos para el botón */
                button {
                    background-color: #7fad39;
                    /* Color de fondo */
                    color: white;
                    /* Color del texto */
                    border: none;
                    /* Quita el borde */
                    padding: 10px 20px;
                    /* Espaciado interno */
                    border-radius: 5px;
                    /* Bordes redondeados */
                    cursor: pointer;
                    /* Cambia el cursor al pasar por encima */
                    font-size: 16px;
                    /* Tamaño del texto */
                }

                /* Estilos cuando el cursor está sobre el botón */
                button:hover {
                    background-color: #8ea964;
                    /* Cambia el color de fondo al pasar el cursor */
                }
            </style>
            <div class="row featured__filter">


                <?php if (count($data['arrDatapro']) > 0) : ?>
                    <?php foreach ($data['arrDatapro'] as $producto) : ?>
                        <div class="col-lg-3 col-md-4 col-sm-6 mix oranges fresh-meat">
                            <div class="featured__item">
                                <div class="featured__item__pic set-bg" data-setbg="<?= media() . '/images/uploads/productos/' . $producto['pro_imagen']; ?>">
                                    <ul class="featured__item__pic__hover">
                                        <button class="ver-detalles-button" onclick="redirectToDetails(<?= $producto['pro_id']; ?>)">Ver detalles</button>

                                        <script>
                                            function redirectToDetails(productId) {
                                                window.location.href = "<?= base_url(); ?>/home/DetallesProducto/" + productId;
                                            }
                                        </script>

                                    </ul>
                                </div>
                                <div class="featured__item__text">
                                    <h6><?= $producto['pro_nombre']; ?></h6>
                                    <h5>$<?= $producto['pro_precio']; ?></h5>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else : ?>
                    <center>
                        <p>No hay productos...</p>
                    </center>
                <?php endif; ?>






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