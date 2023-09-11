<?php
_header($data);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
    <!-- Bootstrap icons-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="<?= media(); ?>/css/Estilos_SobreProyecto/styles.css" rel="stylesheet" />
    <link href="<?= media(); ?>/css/Estilos_SobreProyecto/cards.css" rel="stylesheet" />
</head>

<body class="d-flex flex-column h-100">
    <main class="flex-shrink-0">
        <!-- Navigation-->
        <!-- Header-->
        <header class="bg-inicio py-5">
            <div class="container px-5">
                <div class="row gx-5 align-items-center justify-content-center">
                    <div class="col-lg-8 col-xl-7 col-xxl-6">
                        <div class="my-5 text-center text-xl-start">
                            <h1 class="display-5 fw-bolder text-white mb-2 Tipografia-titulo">
                                <?= $data['page_content'][0]['cont_titulo'] ?></h1>
                            <p class="lead fw-normal text-white-50 mb-4 Tipografia-contenido">
                                <?= $data['page_content'][0]['cont_contenido'] ?></p>
                            <div class="d-grid gap-3 d-sm-flex justify-content-sm-center justify-content-xl-start">
                                <a class="btn btn-primary btn-lg px-4 me-sm-3 Tipografia-contenido"
                                    href="#features">Leer más</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-5 col-xxl-6 d-none d-xl-block text-center">
                        <img class="img-fluid rounded-3 my-5" src="<?= $data['page_media'][0]['gal_url'] ?>"
                            alt="<?= $data['page_media'][0]['gal_descripcion'] ?>" />
                    </div>
                </div>
            </div>
        </header>
        <!-- Features section-->
        <section class="py-5" id="features">
            <div class="container px-5 my-5">
                <div class="row gx-5">
                    <div class="col-lg-4 mb-5 mb-lg-0">
                        <h2 class="fw-bolder mb-0 Tipografia-titulo"><?= $data['page_content'][1]['cont_titulo'] ?></h2>
                    </div>
                    <div class="col-lg-8 Tipografia-contenido">
                        <div>
                            <p><?= $data['page_content'][1]['cont_contenido'] ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Testimonial section-->
        <div class="py-5 bd-owner">
            <div class="container px-5 my-5">
                <div class="row gx-5 ">

                    <div class="fila">
                        <div class="card p-0">
                            <div class="card-image">
                                <img class="imagen_cards" src="<?= $data['page_media'][1]['gal_url'] ?>"
                                    alt="<?= $data['page_media'][1]['gal_descripcion'] ?>">
                            </div>
                            <div class="card-content d-flex flex-column align-items-center">
                                <h4 class="pt-2">José Andrés Barrantes Ortega</h4>
                                <h5><?= $data['page_content'][2]['cont_titulo'] ?></h5>

                                <ul class="social-icons d-flex justify-content-center">
                                    <li style="--i:1">
                                        <a href="#">
                                            <span class="fab fa-facebook"></span>
                                        </a>
                                    </li>
                                    <li style="--i:2">
                                        <a href="#">
                                            <span class="fab fa-twitter"></span>
                                        </a>
                                    </li>
                                    <li style="--i:3">
                                        <a href="#">
                                            <span class="fab fa-instagram"></span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-10 col-xl-7">

                        <div class="fs-4 mb-4 fst-italic text-white Tipografia-contenido ">
                            <?= $data['page_content'][2]['cont_contenido'] ?></div>
                    </div>
                </div>
            </div>
        </div>

        <!-- CARDS -->
        <div class="container">
            <div class="row">
                <center>
                    <div class="fw-bold ">
                        <h3 class="Tipografia-titulo Color-texto">Desarrolladores</h3>
                        <br>
                        <br>
                    </div>
                </center>
                <br>
                <br>
                <div class="fila">
                    <div class="card p-0 center-card">
                        <div class="card-image">
                            <img class="imagen_cards" src="<?= media(); ?>/images/devs/FiorellaBonilla.jpg"
                                alt="Fiorella Bonilla">
                        </div>
                        <div class="card-content d-flex flex-column align-items-center">
                            <h4 class="pt-2">Fiorella Bonilla González</h4>
                            <h5>Desarrolladora</h5>

                            <ul class="social-icons d-flex justify-content-center">
                                <li style="--i:1">
                                    <a href="#">
                                        <span class="fab fa-facebook"></span>
                                    </a>
                                </li>
                                <li style="--i:2">
                                    <a href="#">
                                        <span class="fab fa-twitter"></span>
                                    </a>
                                </li>
                                <li style="--i:3">
                                    <a href="#">
                                        <span class="fab fa-instagram"></span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="fila">
                    <div class="card p-0 center-card">
                        <div class="card-image">
                            <img class="imagen_cards" src="<?= media(); ?>/images/devs/AaronVillegas.jpg"
                                alt="Aaron Villegas">
                        </div>
                        <div class="card-content d-flex flex-column align-items-center">
                            <h4 class="pt-2">Aaron Villegas Mora</h4>
                            <h5>Desarrollador</h5>

                            <ul class="social-icons d-flex justify-content-center">
                                <li style="--i:1">
                                    <a href="#">
                                        <span class="fab fa-facebook"></span>
                                    </a>
                                </li>
                                <li style="--i:2">
                                    <a href="#">
                                        <span class="fab fa-twitter"></span>
                                    </a>
                                </li>
                                <li style="--i:3">
                                    <a href="#">
                                        <span class="fab fa-instagram"></span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="fila">
                    <div class="card p-0 center-card">
                        <div class="card-image">
                            <img class="imagen_cards" src="<?= media(); ?>/images/devs/AndresMejias.jpg"
                                alt="Andrés Mejías">
                        </div>
                        <div class="card-content d-flex flex-column align-items-center">
                            <h4 class="pt-2">Andrés Mejías González</h4>
                            <h5>Desarrollador</h5>

                            <ul class="social-icons d-flex justify-content-center">
                                <li style="--i:1">
                                    <a href="#">
                                        <span class="fab fa-facebook"></span>
                                    </a>
                                </li>
                                <li style="--i:2">
                                    <a href="#">
                                        <span class="fab fa-twitter"></span>
                                    </a>
                                </li>
                                <li style="--i:3">
                                    <a href="#">
                                        <span class="fab fa-instagram"></span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="fila">
                    <div class="card p-0 center-card">
                        <div class="card-image">
                            <img class="imagen_cards" src="<?= media(); ?>/images/devs/SofiaMoraga.jpg"
                                alt="Sofia Moraga">
                        </div>
                        <div class="card-content d-flex flex-column align-items-center">
                            <h4 class="pt-2">Sofia Moraga Gutierrez</h4>
                            <h5>Desarrolladora</h5>

                            <ul class="social-icons d-flex justify-content-center">
                                <li style="--i:1">
                                    <a href="#">
                                        <span class="fab fa-facebook"></span>
                                    </a>
                                </li>
                                <li style="--i:2">
                                    <a href="#">
                                        <span class="fab fa-twitter"></span>
                                    </a>
                                </li>
                                <li style="--i:3">
                                    <a href="#">
                                        <span class="fab fa-instagram"></span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- CARDS -->

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="Assets/js/Js-SobreProyecto/scripts.js"></script>
</body>

</html>
<br>
<br>


<?php
footer($data);
?>