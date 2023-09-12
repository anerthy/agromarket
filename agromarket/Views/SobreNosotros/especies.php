<?php
_header($data);
?>



<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500&family=Roboto:wght@400;500;700&display=swap"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="<?= media(); ?>/lib-especies/animate/animate.min.css" rel="stylesheet">
    <link href="<?= media(); ?>/lib-especies/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="<?= media(); ?>/lib-especies/lightbox/css/lightbox.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="<?= media(); ?>/css/Estilos-especies/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="<?= media(); ?>/css/Estilos-especies/style.css" rel="stylesheet">
</head>

<body>
    <div class=" bg-white p-0">

        <!-- Navbar & Hero Start -->
        <div class=" position-relative p-0">
            <div class=" py-5 bg-primary Color-bg-hero hero-header mb-5">
                <div class="container my-5 py-5 px-lg-5">
                    <div class="row g-5 py-5">
                        <div class="col-lg-6 text-center text-lg-start">
                            <h1 class="text-white mb-4 animated zoomIn Tipografia-titulo-voluntariado">
                                <?= $data['page_content'][0]['cont_titulo'] ?></h1>
                            <p class="text-white pb-3 animated zoomIn Tipografia-contenido-voluntariado">
                                <?= $data['page_content'][0]['cont_contenido'] ?></p>
                        </div>

                        <div class="col-lg-6 text-center text-lg-start">

                            <iframe width="660" height="415" src="https://www.youtube.com/embed/LXb3EKWsInQ"
                                title="YouTube video player" frameborder="0"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                allowfullscreen></iframe>


                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Navbar & Hero End -->
        <center>
            <div class="card-pdf">

                <P><?= $data['page_content'][1]['cont_contenido'] ?> </P>

                <a href="<?= media(); ?>/docs/EspeciesdelGolfodeNicoya.pdf" target="_blank">
                    <button class="learn-more">
                        <span class="circle" aria-hidden="true">
                            <span class="icon arrow"></span>
                        </span>
                        <span class="button-text">Ver mas</span>
                    </button>
                </a>

            </div>

        </center>

        <!-- Reservation Start -->
    </div>
    </div>
    </div>
    </div>
    <!-- About End -->

    <!-- Portfolio Start -->
    <div class="container-xxl py-5">
        <div class="container px-lg-5">
            <div class="section-title position-relative text-center mb-5 pb-2 wow fadeInUp" data-wow-delay="0.1s">

                <h2 class="mt-2 Tipografia-titulo-voluntariado">Galeria de especies</h2>

            </div>
            <div class="row mt-n2 wow fadeInUp" data-wow-delay="0.1s">
                <div class="col-12 text-center">
                    <ul class="list-inline mb-5" id="portfolio-flters">
                        <li class="btn px-3 pe-4 active Tipografia-contenido-voluntariado" data-filter="*">Todas
                        </li>
                        <li class="btn px-3 pe-4 Tipografia-contenido-voluntariado" data-filter=".first">
                            Aves marinas</li>
                        <li class="btn px-3 pe-4 Tipografia-contenido-voluntariado" data-filter=".second">
                            Colibríes</li>
                        <li class="btn px-3 pe-4 Tipografia-contenido-voluntariado" data-filter=".three">
                            Martines, carpinteros y trepadores</li>
                        <li class="btn px-3 pe-4 Tipografia-contenido-voluntariado" data-filter=".four">
                            Otras aves de bosque</li>
                    </ul>

                </div>
            </div>
            <br>
            <br>

            <div class="row g-4 portfolio-container">

                <!-- /////////////////////////FIRSTTTTTTT/////////////////////////// -->

                <div class="col-lg-4 col-md-6 portfolio-item first wow zoomIn" data-wow-delay="0.1s">
                    <div class="position-relative rounded overflow-hidden">
                        <img class="img-fluid w-100" style="height: 400px;"
                            src="<?= media(); ?>/images/img/Especies/Aves Marinas/1.webp" alt="">
                        <div class="">
                            <a class="btn btn-light" href="<?= media(); ?>/images/img/Especies/Aves Marinas/1.webp"
                                data-lightbox="portfolio"><i class="fa fa-plus fa-2x text-primary"></i></a>

                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 portfolio-item first wow zoomIn" data-wow-delay="0.6s">
                    <div class="position-relative rounded overflow-hidden">
                        <img class="img-fluid w-100" style="height: 400px;"
                            src="<?= media(); ?>/images/img/Especies/Aves Marinas/2.webp" alt="">
                        <div class="">
                            <a class="btn btn-light" href="<?= media(); ?>/images/img/Especies/Aves Marinas/2.webp"
                                data-lightbox="portfolio"><i class="fa fa-plus fa-2x text-primary"></i></a>

                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 portfolio-item first wow zoomIn" data-wow-delay="0.3s">
                    <div class="position-relative rounded overflow-hidden">
                        <img class="img-fluid w-100" style="height: 400px;"
                            src="<?= media(); ?>/images/img/Especies/Aves Marinas/3.webp" alt="">
                        <div class="">
                            <a class="btn btn-light" href="<?= media(); ?>/images/img/Especies/Aves Marinas/3.webp"
                                data-lightbox="portfolio"><i class="fa fa-plus fa-2x text-primary"></i></a>

                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 portfolio-item first wow zoomIn" data-wow-delay="0.3s">
                    <div class="position-relative rounded overflow-hidden">
                        <img class="img-fluid w-100" style="height: 400px;"
                            src="<?= media(); ?>/images/img/Especies/Aves Marinas/4.webp" alt="">
                        <div class="">
                            <a class="btn btn-light" href="<?= media(); ?>/images/img/Especies/Aves Marinas/4.webp"
                                data-lightbox="portfolio"><i class="fa fa-plus fa-2x text-primary"></i></a>

                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 portfolio-item first wow zoomIn" data-wow-delay="0.3s">
                    <div class="position-relative rounded overflow-hidden">
                        <img class="img-fluid w-100" style="height: 400px;"
                            src="<?= media(); ?>/images/img/Especies/Aves Marinas/5.webp" alt="">
                        <div class="">
                            <a class="btn btn-light" href="<?= media(); ?>/images/img/Especies/Aves Marinas/5.webp"
                                data-lightbox="portfolio"><i class="fa fa-plus fa-2x text-primary"></i></a>

                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 portfolio-item first wow zoomIn" data-wow-delay="0.3s">
                    <div class="position-relative rounded overflow-hidden">
                        <img class="img-fluid w-100" style="height: 400px;"
                            src="<?= media(); ?>/images/img/Especies/Aves Marinas/6.webp" alt="">
                        <div class="">
                            <a class="btn btn-light" href="<?= media(); ?>/images/img/Especies/Aves Marinas/6.webp"
                                data-lightbox="portfolio"><i class="fa fa-plus fa-2x text-primary"></i></a>

                        </div>
                    </div>
                </div>

                <!-- /////////////////////////SECONDDDD/////////////////////////// -->

                <div class="col-lg-4 col-md-6 portfolio-item second wow zoomIn" data-wow-delay="0.3s">
                    <div class="position-relative rounded overflow-hidden">
                        <img class="img-fluid w-100" style="height: 400px;"
                            src="<?= media(); ?>/images/img/Especies/Colibries/1.webp" alt="">
                        <div class="">
                            <a class="btn btn-light" href="<?= media(); ?>/images/img/Especies/Colibries/1.webp"
                                data-lightbox="portfolio"><i class="fa fa-plus fa-2x text-primary"></i></a>

                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 portfolio-item second wow zoomIn" data-wow-delay="0.1s">
                    <div class="position-relative rounded overflow-hidden">
                        <img class="img-fluid w-100" style="height: 400px;"
                            src="<?= media(); ?>/images/img/Especies/Colibries/2.webp" alt="">
                        <div class="">
                            <a class="btn btn-light" href="<?= media(); ?>/images/img/Especies/Colibries/2.webp"
                                data-lightbox="portfolio"><i class="fa fa-plus fa-2x text-primary"></i></a>

                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 portfolio-item second wow zoomIn" data-wow-delay="0.1s">
                    <div class="position-relative rounded overflow-hidden">
                        <img class="img-fluid w-100" style="height: 400px;"
                            src="<?= media(); ?>/images/img/Especies/Colibries/3.webp" alt="">
                        <div class="">
                            <a class="btn btn-light" href="<?= media(); ?>/images/img/Especies/Colibries/3.webp"
                                data-lightbox="portfolio"><i class="fa fa-plus fa-2x text-primary"></i></a>

                        </div>
                    </div>
                </div>

                <!-- /////////////////////////THREEEEEEEEE/////////////////////////// -->
                <div class="col-lg-4 col-md-6 portfolio-item three wow zoomIn" data-wow-delay="0.6s">
                    <div class="position-relative rounded overflow-hidden">
                        <img class="img-fluid w-100" style="height: 400px;"
                            src="<?= media(); ?>/images/img/Especies/Martinespescadores,carpinteros y trepadores/1.webp"
                            alt="">
                        <div class="">
                            <a class="btn btn-light"
                                href="<?= media(); ?>/images/img/Especies/Martinespescadores,carpinteros y trepadores/1.webp"
                                data-lightbox="portfolio"><i class="fa fa-plus fa-2x text-primary"></i></a>

                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 portfolio-item three wow zoomIn" data-wow-delay="0.6s">
                    <div class="position-relative rounded overflow-hidden">
                        <img class="img-fluid w-100" style="height: 400px;"
                            src="<?= media(); ?>/images/img/Especies/Martinespescadores,carpinteros y trepadores/2.webp"
                            alt="">
                        <div class="">
                            <a class="btn btn-light"
                                href="<?= media(); ?>/images/img/Especies/Martinespescadores,carpinteros y trepadores/2.webp"
                                data-lightbox="portfolio"><i class="fa fa-plus fa-2x text-primary"></i></a>

                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 portfolio-item three wow zoomIn" data-wow-delay="0.6s">
                    <div class="position-relative rounded overflow-hidden">
                        <img class="img-fluid w-100" style="height: 400px;"
                            src="<?= media(); ?>/images/img/Especies/Martinespescadores,carpinteros y trepadores/3.webp"
                            alt="">
                        <div class="">
                            <a class="btn btn-light"
                                href="<?= media(); ?>/images/img/Especies/Martinespescadores,carpinteros y trepadores/3.webp"
                                data-lightbox="portfolio"><i class="fa fa-plus fa-2x text-primary"></i></a>

                        </div>
                    </div>
                </div>


                <div class="col-lg-4 col-md-6 portfolio-item three wow zoomIn" data-wow-delay="0.6s">
                    <div class="position-relative rounded overflow-hidden">
                        <img class="img-fluid w-100" style="height: 400px;"
                            src="<?= media(); ?>/images/img/Especies/Martinespescadores,carpinteros y trepadores/4.webp"
                            alt="">
                        <div class="">
                            <a class="btn btn-light"
                                href="<?= media(); ?>/images/img/Especies/Martinespescadores,carpinteros y trepadores/4.webp"
                                data-lightbox="portfolio"><i class="fa fa-plus fa-2x text-primary"></i></a>

                        </div>
                    </div>
                </div>

                <!-- /////////////////////////four/////////////////////////// -->
                <div class="col-lg-4 col-md-6 portfolio-item four wow zoomIn" data-wow-delay="0.6s">
                    <div class="position-relative rounded overflow-hidden">
                        <img class="img-fluid w-100" style="height: 400px;"
                            src="<?= media(); ?>/images/img/Especies/Otras aves de bosque/1.webp" alt="">
                        <div class="">
                            <a class="btn btn-light"
                                href="<?= media(); ?>/images/img/Especies/Otras aves de bosque/1.webp"
                                data-lightbox="portfolio"><i class="fa fa-plus fa-2x text-primary"></i></a>

                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 portfolio-item four wow zoomIn" data-wow-delay="0.6s">
                    <div class="position-relative rounded overflow-hidden">
                        <img class="img-fluid w-100" style="height: 400px;"
                            src="<?= media(); ?>/images/img/Especies/Otras aves de bosque/2.webp" alt="">
                        <div class="">
                            <a class="btn btn-light"
                                href="<?= media(); ?>/images/img/Especies/Otras aves de bosque/2.webp"
                                data-lightbox="portfolio"><i class="fa fa-plus fa-2x text-primary"></i></a>

                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 portfolio-item four wow zoomIn" data-wow-delay="0.6s">
                    <div class="position-relative rounded overflow-hidden">
                        <img class="img-fluid w-100" style="height: 400px;"
                            src="<?= media(); ?>/images/img/Especies/Otras aves de bosque/3.webp" alt="">
                        <div class="">
                            <a class="btn btn-light"
                                href="<?= media(); ?>/images/img/Especies/Otras aves de bosque/3.webp"
                                data-lightbox="portfolio"><i class="fa fa-plus fa-2x text-primary"></i></a>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="<?= media(); ?>/lib-especies/wow/wow.min.js"></script>
    <script src="<?= media(); ?>/lib-especies/easing/easing.min.js"></script>
    <script src="<?= media(); ?>/lib-especies/waypoints/waypoints.min.js"></script>
    <script src="<?= media(); ?>/lib-especies/owlcarousel/owl.carousel.min.js"></script>
    <script src="<?= media(); ?>/lib-especies/isotope/isotope.pkgd.min.js"></script>
    <script src="<?= media(); ?>/lib-especies/lightbox/js/lightbox.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Template Javascript -->
    <script src="<?= media(); ?>/js/js-especies/main.js"></script>
</body>





<?php
footer($data);
?>