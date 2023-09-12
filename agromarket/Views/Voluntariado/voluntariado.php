<?php
_header($data);
?>

<!-- <!DOCTYPE html>
<html lang="en"> -->

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
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500&family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="Assets/lib-voluntariado/animate/animate.min.css" rel="stylesheet">
    <link href="Assets/lib-voluntariado/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="Assets/lib-voluntariado/lightbox/css/lightbox.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="Assets/css/Estilos-voluntariado/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="Assets/css/Estilos-voluntariado/style.css" rel="stylesheet">
</head>

<body>
    <div class=" bg-white p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-grow text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->

        <!-- Navbar & Hero Start -->
        <div class=" position-relative p-0">
            <div class=" py-5 bg-primary Color-bg-hero hero-header mb-5">
                <div class="container my-5 py-5 px-lg-5">
                    <div class="row g-5 py-5">
                        <div class="col-lg-6 text-center text-lg-start">
                            <h1 class="text-white mb-4 animated zoomIn Tipografia-titulo-voluntariado-principal">
                                <?= $data['page_content'][0]['cont_titulo'] ?></h1>
                            <p class="text-white pb-3 animated zoomIn Tipografia-contenido-voluntariado">
                                <?= $data['page_content'][0]['cont_contenido'] ?></p>
                        </div>
                        <div class="col-lg-6 text-center text-lg-start">
                            <img class="img-fluid" src="<?= $data['page_media'][0]['gal_url'] ?>" alt="<?= $data['page_media'][0]['gal_descripcion'] ?>">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Navbar & Hero End -->

        <!-- Full Screen Search Start -->
        <div class="modal fade" id="searchModal" tabindex="-1">
            <div class="modal-dialog modal-fullscreen">
                <div class="modal-content" style="background: rgba(29, 29, 39, 0.7);">
                    <div class="modal-header border-0">
                        <button type="button" class="btn bg-white btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body d-flex align-items-center justify-content-center">
                        <div class="input-group" style="max-width: 600px;">
                            <input type="text" class="form-control bg-transparent border-light p-3" placeholder="Type search keyword">
                            <button class="btn btn-light px-4"><i class="bi bi-search"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Full Screen Search End -->

        <!-- About Start -->
        <div class="container-xxl py-5">
            <div class="container px-lg-5">
                <div class="row g-5">
                    <div class="col-lg-6 wow fadeInUp" data-wow-delay="0.1s">
                        <div class=" position-relative mb-4 pb-2">
                            <h1 class="mt-2 Tipografia-titulo-voluntariado">
                                <?= $data['page_content'][1]['cont_titulo'] ?></h1>
                        </div>
                        <p class="mb-4 Tipografia-contenido-voluntariado">
                            <?= $data['page_content'][1]['cont_contenido'] ?></p>
                        <div class="row g-3">
                            <div class="col-sm-6">
                                <h6 class="mb-3 Tipografia-contenido-voluntariado"><i class="fa fa-check text-primary me-2"></i><?= $data['page_content'][2]['cont_contenido'] ?>
                                </h6>
                                <h6 class="mb-0 Tipografia-contenido-voluntariado"><i class="fa fa-check text-primary me-2"></i><?= $data['page_content'][3]['cont_contenido'] ?>
                                </h6>
                            </div>
                            <div class="col-sm-6">
                                <h6 class="mb-3 Tipografia-contenido-voluntariado"><i class="fa fa-check text-primary me-2"></i><?= $data['page_content'][4]['cont_contenido'] ?>
                                </h6>
                                <h6 class="mb-0 Tipografia-contenido-voluntariado"><i class="fa fa-check text-primary me-2"></i><?= $data['page_content'][5]['cont_contenido'] ?>
                                </h6>
                            </div>
                        </div>
                        <div class="d-flex align-items-center mt-4">
                            <a class="btn btn-outline-primary btn-square me-3" href="<?php echo TWITTER ?>" target="on_blank"><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-outline-primary btn-square me-3" href="<?php echo INSTAGRAM ?>" target="on_blank"><i class="fab fa-instagram"></i></a>
                            <a class="btn btn-outline-primary btn-square me-3" href="<?php echo FACEBOOK ?>" target="on_blank"><i class="fab fa-facebook-f"></i></a>
                            <!-- <a class="btn btn-outline-primary btn-square" href=""><i class="fab fa-linkedin-in"></i></a> -->
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <!-- Reservation Start -->

                        <div class="container-xxl py-5 px-0 wow fadeInUp" id="modalFormVoluntariado" data-wow-delay="0.1s">
                            <div class="row g-0">
                                <div class="bg-ligth d-flex align-items-center" id="modalFormVoluntariado" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-hidden="true">
                                    <div class="p-5 wow fadeInUp" data-wow-delay="0.2s">

                                        <form id="formVoluntario" name="formVoluntario" class="form-horizontal">
                                        <h1 class="Tipografia-titulo-voluntariado TextoC-Voluntariado">Inscribete Ahora</h1>
                                            <input type="hidden" id="vol_id" name="vol_id" value="">

                                            <div class="row g-3">
                                                <div class="col-md-6">
                                                    <div class="form-floating">
                                                        <input type="text" class="form-control" id="txtNombre" name="txtNombre" placeholder="Your Name">
                                                        <label for="txtNombre">Nombre</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating">
                                                        <input type="text" class="form-control" id="txtPrimerApellido" name="txtPrimerApellido" placeholder="Your Email">
                                                        <label for="txtPrimerApellido">Primer Apellido</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating date" id="date3" data-target-input="nearest">
                                                        <input type="text" class="form-control datetimepicker-input" id="txtSegundoApellido" name="txtSegundoApellido" placeholder="Date & Time" data-target="#date3" data-toggle="datetimepicker" />
                                                        <label for="txtSegundoApellido">Segundo Apellido</label>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating date" id="date3" data-target-input="nearest">
                                                        <input type="text" maxlength="9" minlength="9" class="form-control datetimepicker-input valid  validNumber" id="txtCedula" name="txtCedula" placeholder="Date & Time" data-target="#date3" data-toggle="datetimepicker" pattern="[0-9]+" />
                                                        <label for="txtCedula">Cédula</label>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-floating date" id="date3" data-target-input="nearest">
                                                        <input type="email" class="form-control datetimepicker-input" id="txtCorreo" name="txtCorreo" placeholder="Date & Time" data-target="#date3" data-toggle="datetimepicker" />
                                                        <label for="txtCorreo">Correo electrónico</label>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-floating date" id="date3" data-target-input="nearest">
                                                        <input type="text" maxlength="8" minlength="8" class="form-control valid validNumber" placeholder="Número de contacto" id="txtTelefono" name="txtTelefono" required="" pattern="[0-9]+">
                                                        <label for="txtTelefono">Teléfono</label>
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <label for="txtFechaNacimiento">Fecha de nacimiento</label>
                                                    <input type="date" class="form-control valid validText" min="1900-01-01" max="<?php echo fechaNacimientoMaxima(); ?>" placeholder="Fecha de nacimiento" id="txtFechaNacimiento" name="txtFechaNacimiento" required="">
                                                </div>

                                                <div class="col-md-6">
                                                    <label for="txtGenero">Genero</label>
                                                    <select class="form-control" id="txtGenero" name="txtGenero" required="">
                                                        <option value="Masculino">Masculino</option>
                                                        <option value="Femenino">Femenino</option>
                                                    </select>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-floating">
                                                        <textarea class="form-control" placeholder="Special Request" id="txtLugarResidencia" name="txtLugarResidencia" style="height: 100px"></textarea>
                                                        <label for="txtLugarResidencia">Lugar donde residencia</label>
                                                    </div>
                                                </div>

                                                <div class="col-12">
                                                    <button id="btnActionForm" class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i><span id="btnText">Enviar</span></button>&nbsp;&nbsp;&nbsp;
                                                </div>
                                            </div>
                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- <script>
document.addEventListener('DOMContentLoaded', function(){
let formulario = document.getElementById('formVoluntario');
formulario.addEventListener('submit', function() {
formulario.reset();
});
});
</script> -->
                        <!-- Reservation Start -->
                    </div>
                </div>
            </div>
        </div>
        <!-- About End -->

        <!-- Portfolio Start -->
        <div class="container-xxl py-5">
            <div class="container px-lg-5">
                <div class=" position-relative text-center mb-5 pb-2 wow " data-wow-delay="0.1s">

                    <h1 class="mt-2 Tipografia-titulo-voluntariado">Actividades realizadas recientemente</h1>
                </div>
                <div class="row mt-n2 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="col-12 text-center">
                        <ul class="list-inline mb-5" id="portfolio-flters">
                            <li class="btn px-3 pe-4 active Tipografia-contenido-voluntariado" data-filter="*">Todas
                            </li>
                            <li class="btn px-3 pe-4 Tipografia-contenido-voluntariado" data-filter=".first">
                                Reforestación de manglares</li>
                            <li class="btn px-3 pe-4 Tipografia-contenido-voluntariado" data-filter=".second">Limpieza
                                de playas</li>
                        </ul>

                    </div>
                </div>
                <br>
                <br>
                <div class="row g-4 portfolio-container">
                    <div class="col-lg-4 col-md-6 portfolio-item first wow zoomIn" data-wow-delay="0.1s">
                        <div class="position-relative rounded overflow-hidden">
                            <img class="img-fluid w-100" style="height: 400px;" src="<?= $data['page_media'][5]['gal_url'] ?>" alt="<?= $data['page_media'][5]['gal_descripcion'] ?>">
                            <div class="">
                                <a class="btn btn-light" href="<?= $data['page_media'][5]['gal_url'] ?>" data-lightbox="portfolio">
                                    <i class="fa fa-plus fa-2x text-primary"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 portfolio-item second wow zoomIn" data-wow-delay="0.3s">
                        <div class="position-relative rounded overflow-hidden">
                            <img class="img-fluid w-100" style="height: 400px;" src="<?= $data['page_media'][6]['gal_url'] ?>" alt="<?= $data['page_media'][6]['gal_descripcion'] ?>">
                            <div class="">
                                <a class="btn btn-light" href="<?= $data['page_media'][6]['gal_url'] ?>" data-lightbox="portfolio"><i class="fa fa-plus fa-2x text-primary"></i></a>

                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 portfolio-item first wow zoomIn" data-wow-delay="0.6s">
                        <div class="position-relative rounded overflow-hidden">
                            <img class="img-fluid w-100" style="height: 400px;" src="<?= $data['page_media'][7]['gal_url'] ?>" alt="<?= $data['page_media'][7]['gal_descripcion'] ?>">
                            <div class="">
                                <a class="btn btn-light" href="<?= $data['page_media'][7]['gal_url'] ?>" data-lightbox="portfolio"><i class="fa fa-plus fa-2x text-primary"></i></a>

                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-6 portfolio-item second wow zoomIn" data-wow-delay="0.1s">
                        <div class="position-relative rounded overflow-hidden">
                            <img class="img-fluid w-100" style="height: 400px;" src="<?= $data['page_media'][8]['gal_url'] ?>" alt="<?= $data['page_media'][8]['gal_descripcion'] ?>">
                            <div class="">
                                <a class="btn btn-light" href="<?= $data['page_media'][8]['gal_url'] ?>" data-lightbox="portfolio"><i class="fa fa-plus fa-2x text-primary"></i></a>
                                < </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 portfolio-item first wow zoomIn" data-wow-delay="0.3s">
                            <div class="position-relative rounded overflow-hidden">
                                <img class="img-fluid w-100" style="height: 400px;" src="<?= $data['page_media'][9]['gal_url'] ?>" alt="<?= $data['page_media'][9]['gal_descripcion'] ?>">
                                <div class="">
                                    <a class="btn btn-light" href="<?= $data['page_media'][9]['gal_url'] ?>" data-lightbox="portfolio"><i class="fa fa-plus fa-2x text-primary"></i></a>

                                </div>
                            </div>
                        </div>


                        <div class="col-lg-4 col-md-6 portfolio-item first wow zoomIn" data-wow-delay="0.3s">
                            <div class="position-relative rounded overflow-hidden">
                                <img class="img-fluid w-100" style="height: 400px;" src="<?= $data['page_media'][10]['gal_url'] ?>" alt="<?= $data['page_media'][10]['gal_descripcion'] ?>">
                                <div class="">
                                    <a class="btn btn-light" href="<?= $data['page_media'][10]['gal_url'] ?>" data-lightbox="portfolio"><i class="fa fa-plus fa-2x text-primary"></i></a>

                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <!-- Portfolio End -->

            <!-- Testimonial Start -->
            <br>
            <br>
        

            <div class=" position-relative text-center mb-5 pb-2 wow " data-wow-delay="0.1s">
                <h1 class="mt-2 Tipografia-titulo-voluntariado">Testimonios</h1>
            </div>

            <div class=" testimonial py-5 my-5 wow fadeInUp " data-wow-delay="0.1s">
                <div class="container py-5 px-lg-5">
                    <div class="owl-carousel testimonial-carousel">

                        <div class="testimonial-item bg-transparent border rounded text-white p-4 Cards-testimonios">
                            <i class="fa fa-quote-left fa-2x mb-3"></i>
                            <p class="Tipografia-contenido-voluntariado"><?= $data['page_content'][7]['cont_contenido'] ?>
                            </p>
                            <div class="d-flex align-items-center">
                                <img class="img-fluid flex-shrink-0 rounded-circle" src="<?= $data['page_media'][1]['gal_url'] ?>" alt="<?= $data['page_media'][1]['gal_descripcion'] ?>" style="width: 50px; height: 50px;">
                                <div class="ps-3">
                                    <h6 class="text-white mb-1"><?= $data['page_content'][7]['cont_titulo'] ?></h6>

                                </div>
                            </div>
                        </div>
                        <div class="testimonial-item bg-transparent border rounded text-white p-4 Cards-testimonios">
                            <i class="fa fa-quote-left fa-2x mb-3"></i>
                            <p class="Tipografia-contenido-voluntariado"><?= $data['page_content'][8]['cont_contenido'] ?>
                            </p>
                            <div class="d-flex align-items-center">
                                <img class="img-fluid flex-shrink-0 rounded-circle" src="<?= $data['page_media'][2]['gal_url'] ?>" alt="<?= $data['page_media'][2]['gal_descripcion'] ?>" style="width: 50px; height: 50px;">
                                <div class="ps-3">
                                    <h6 class="text-white mb-1"><?= $data['page_content'][8]['cont_titulo'] ?></h6>

                                </div>
                            </div>
                        </div>
                        <div class="testimonial-item bg-transparent border rounded text-white p-4 Cards-testimonios">
                            <i class="fa fa-quote-left fa-2x mb-3"></i>
                            <p class="Tipografia-contenido-voluntariado"><?= $data['page_content'][9]['cont_contenido'] ?>
                            </p>
                            <div class="d-flex align-items-center">
                                <img class="img-fluid flex-shrink-0 rounded-circle" src="<?= $data['page_media'][3]['gal_url'] ?>" alt="<?= $data['page_media'][3]['gal_descripcion'] ?>" style="width: 50px; height: 50px;">
                                <div class="ps-3">
                                    <h6 class="text-white mb-1"><?= $data['page_content'][9]['cont_titulo'] ?></h6>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <br>
            <!-- Testimonial End -->
        </div>

        <!-- JavaScript Libraries -->
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
        <script src="Assets/lib-voluntariado/wow/wow.min.js"></script>
        <script src="Assets/lib-voluntariado/easing/easing.min.js"></script>
        <script src="Assets/lib-voluntariado/waypoints/waypoints.min.js"></script>
        <script src="Assets/lib-voluntariado/owlcarousel/owl.carousel.min.js"></script>
        <script src="Assets/lib-voluntariado/isotope/isotope.pkgd.min.js"></script>
        <script src="Assets/lib-voluntariado/lightbox/js/lightbox.min.js"></script>

        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


        <!-- Template Javascript -->
        <script src="Assets/js/js-voluntariado/main.js"></script>
</body>

<!-- </html> -->

<?php
footer($data);
?>