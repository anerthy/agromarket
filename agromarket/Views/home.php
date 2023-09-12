<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Anton&display=swap" rel="stylesheet">

    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500;600&family=Rubik:wght@500;600;700&display=swap"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="Assets/lib-home/animate/animate.min.css" rel="stylesheet">
    <link href="Assets/lib-home/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="Assets/css/Estilos-home/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="Assets/css/Estilos-home/style.css" rel="stylesheet">
    <link href="<?= media(); ?>/css/carousel-home/carousel-home.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

</head>

<body>
    <!-- Spinner Start -->
    <div id="spinner"
        class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" role="status" style="width: 3rem; height: 3rem;"></div>
    </div>
    <!-- Spinner End -->

    <!-- Navbar Start -->

    <?php
    _header($data);
    ?>
    <!-- Navbar End -->

    <div>
        <!-- <div class="contenedor"> -->
        <Div class="p">
            <div>
                <h1 class="textoPrincipal texto-encima  contenido  ">Paraíso azul <br>Golfo de Nicoya</h1>
            </div>

            <!-- </div> -->
            <svg version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px"
                y="0px" width="100%" height="100%" viewBox="0 0 1600 900" preserveAspectRatio="xMidYMax slice">
                <defs>
                    <linearGradient id="bg">
                        <stop offset="0%" style="stop-color:rgba(130, 158, 249, 0.06)"></stop>
                        <stop offset="50%" style="stop-color:rgba(76, 190, 255, 0.6)"></stop>
                        <stop offset="100%" style="stop-color:rgba(115, 209, 72, 0.2)"></stop>

                    </linearGradient>
                    <path id="wave" fill="url(#bg)" d="M-363.852,502.589c0,0,236.988-41.997,505.475,0
	s371.981,38.998,575.971,0s293.985-39.278,505.474,5.859s493.475,48.368,716.963-4.995v560.106H-363.852V502.589z" />
                </defs>
                <g>
                    <use xlink:href='#wave' opacity=".3">
                        <animateTransform attributeName="transform" attributeType="XML" type="translate" dur="10s"
                            calcMode="spline" values="270 230; -334 180; 270 230" keyTimes="0; .5; 1"
                            keySplines="0.42, 0, 0.58, 1.0;0.42, 0, 0.58, 1.0" repeatCount="indefinite" />
                    </use>
                    <use xlink:href='#wave' opacity=".6">
                        <animateTransform attributeName="transform" attributeType="XML" type="translate" dur="8s"
                            calcMode="spline" values="-270 230;243 220;-270 230" keyTimes="0; .6; 1"
                            keySplines="0.42, 0, 0.58, 1.0;0.42, 0, 0.58, 1.0" repeatCount="indefinite" />
                    </use>
                    <use xlink:href='#wave' opacty=".9">
                        <animateTransform attributeName="transform" attributeType="XML" type="translate" dur="6s"
                            calcMode="spline" values="0 230;-140 200;0 230" keyTimes="0; .4; 1"
                            keySplines="0.42, 0, 0.58, 1.0;0.42, 0, 0.58, 1.0" repeatCount="indefinite" />
                    </use>
                </g>
            </svg>
        </div>
    </Div>

    <!-- About Start -->
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-6">
                    <div class="row gx-3 h-100">
                        <div class="col-6 align-self-start wow fadeInUp" data-wow-delay="0.1s">
                            <img class="img-fluid" src="<?= $data['page_media'][0]['gal_url'] ?>"
                                alt="<?= $data['page_media'][0]['gal_descripcion'] ?>">
                        </div>
                        <div class="col-6 align-self-end wow fadeInDown" data-wow-delay="0.1s">
                            <img class="img-fluid" src="<?= $data['page_media'][1]['gal_url'] ?>"
                                alt="<?= $data['page_media'][1]['gal_descripcion'] ?>">
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                    <p class="fw-medium text-uppercase text-primary mb-2 Texto-Home ">Bienvenidos al</p>
                    <h1 class="display-5 mb-4 color-text Tipografia-titulo">
                        <?= $data['page_content'][0]['cont_titulo'] ?></h1>
                    <p class="mb-4 Tipografia-contenido"><?= $data['page_content'][0]['cont_contenido'] ?></p>

                    <div class="ms-4">
                        <p class="Tipografia-contenido"><i
                                class="fa fa-check text-primary me-2 Texto-Home"></i><?= $data['page_content'][1]['cont_contenido'] ?>
                        </p>
                        <p class="Tipografia-contenido"><i
                                class="fa fa-check text-primary me-2 Texto-Home"></i><?= $data['page_content'][2]['cont_contenido'] ?>
                        </p>
                        <p class="Tipografia-contenido"><i
                                class="fa fa-check text-primary me-2 Texto-Home"></i><?= $data['page_content'][3]['cont_contenido'] ?>
                        </p>
                        <p class="Tipografia-contenido"><i
                                class="fa fa-check text-primary me-2 Texto-Home"></i><?= $data['page_content'][4]['cont_contenido'] ?>
                        </p>
                        <p class="mb-0 Tipografia-contenido"><i
                                class="fa fa-check text-primary me-2 Texto-Home"></i><?= $data['page_content'][5]['cont_contenido'] ?>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
    <!-- About End -->

    <!-- Facts Start -->
    <div class="container-fluid facts my-5 p-5">
        <h2 class="Tipografia-titulo">Fases del proyecto</h2>
        <div class="row g-5">
            <div class="col-md-6 col-xl-3 wow fadeIn" data-wow-delay="0.1s">
                <div class="text-center border p-5">
                    <i class="fa bi-1-circle fa-3x text-white mb-3"></i>
                    <h1 class="Tipografia-contenido"></h1>
                    <span
                        class="fs-5 fw-semi-bold text-white Tipografia-contenido"><?= $data['page_content'][6]['cont_contenido'] ?></span>
                </div>
            </div>
            <div class="col-md-6 col-xl-3 wow fadeIn" data-wow-delay="0.3s">
                <div class="text-center border p-5">
                    <i class="fa bi-2-circle fa-3x text-white mb-3"></i>
                    <h1 class="Tipografia-contenido"></h1>
                    <span
                        class="fs-5 fw-semi-bold text-white Tipografia-contenido"><?= $data['page_content'][7]['cont_contenido'] ?></span>
                </div>
            </div>
            <div class="col-md-6 col-xl-3 wow fadeIn" data-wow-delay="0.5s">
                <div class="text-center border p-5">
                    <i class="fa bi-3-circle fa-3x text-white mb-3"></i>
                    <h1 class="Tipografia-contenido"></h1>
                    <span
                        class="fs-5 fw-semi-bold text-white Tipografia-contenido"><?= $data['page_content'][8]['cont_contenido'] ?></span>
                </div>
            </div>
            <div class="col-md-6 col-xl-3 wow fadeIn" data-wow-delay="0.7s">
                <div class="text-center border p-5">
                    <i class="fa bi-4-circle  fa-3x text-white mb-3"></i>
                    <h1 class="Tipografia-contenido"></h1>
                    <span
                        class="fs-5 fw-semi-bold text-white Tipografia-contenido"><?= $data['page_content'][9]['cont_contenido'] ?></span>
                </div>
            </div>
        </div>
    </div>
    <!-- Facts End -->



    <center>
        <iframe src="https://www.google.com/maps/d/u/0/embed?mid=1dpxcEmyP5lgsx9tE49EIE7BSXNdcCoI&ehbc=2E312F"
            width="100%" height="500"></iframe>
    </center>
    <hr>

    <center>

        <h2 class="Tipografia-titulo Titulo">Involucrados</h2>
        <br>


    </center>

    <div class="container text-center my-3">
        <div class="row mx-auto my-auto justify-content-center">
            <div id="recipeCarousel" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner " role="listbox">
                    <div class="carousel-item active">
                        <div class="col-md-3">
                            <div class="card">
                                <div class="card-img Tam ">
                                    <img src="<?= $data['page_media'][2]['gal_url'] ?>" class="img-fluid"
                                        alt="<?= $data['page_media'][2]['gal_descripcion'] ?>">
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="col-md-3">
                            <div class="card">
                                <div class="card-img Tam">
                                    <img src="<?= $data['page_media'][3]['gal_url'] ?>" class="img-fluid"
                                        alt="<?= $data['page_media'][3]['gal_descripcion'] ?>">
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="col-md-3">
                            <div class="card">
                                <div class="card-img Tam">
                                    <img src="<?= $data['page_media'][4]['gal_url'] ?>" class="img-fluid"
                                        alt="<?= $data['page_media'][4]['gal_descripcion'] ?>">
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="col-md-3">
                            <div class="card">
                                <div class="card-img Tam">
                                    <img src="<?= $data['page_media'][5]['gal_url'] ?>" class="img-fluid"
                                        alt="<?= $data['page_media'][5]['gal_descripcion'] ?>">
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="col-md-3">
                            <div class="card">
                                <div class="card-img Tam">
                                    <img src="<?= $data['page_media'][6]['gal_url'] ?>" class="img-fluid"
                                        alt="<?= $data['page_media'][6]['gal_descripcion'] ?>">
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <div class="col-md-3">
                            <div class="card">
                                <div class="card-img Tam">
                                    <img src="<?= $data['page_media'][7]['gal_url'] ?>" class="img-fluid"
                                        alt="<?= $data['page_media'][7]['gal_descripcion'] ?>">
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <hr>
    <!-- Footer Start -->
    <?php
    footer($data);
    ?>
    <!-- Footer End -->

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="Assets/lib-home/wow/wow.min.js"></script>
    <script src="Assets/lib-home/easing/easing.min.js"></script>
    <script src="Assets/lib-home/waypoints/waypoints.min.js"></script>
    <script src="Assets/lib-home/owlcarousel/owl.carousel.min.js"></script>
    <script src="Assets/lib-home/counterup/counterup.min.js"></script>

    <!-- Template Javascript -->
    <script src="Assets/js/Js-home/main.js"></script>
    <script src="Assets/js/carousel-home/carousel-home.js"></script>
</body>

</html>