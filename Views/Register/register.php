<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Registrarse</title>
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
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

</head>

<body>
    <?php navbar(); ?>

    <!-- Page Header Start -->
    <div class="container-fluid page-header py-5 mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div class="container text-center py-5">
            <h1 class="display-3 text-white mb-4 animated slideInDown">Registrarse</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a href="<?= base_url(); ?>">Agromarket</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><a href="">Registro</a></li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- Quote Start -->
    <div class="container-fluid py-5">
        <div class="container">
            <div class="text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
                <p class="fs-5 fw-bold text-primary">Registrate</p>
                <h1 class="display-5 mb-5">Se nuestro proximo productor</h1>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-7">
                    <div class="bg-light rounded p-4 p-sm-5 wow fadeInUp" data-wow-delay="0.1s">
                        <form id="formProductor" name="formProductor" class="form-horizontal" action="procesar_registro.php" method="post">
                            <div class="row g-3">
                                <div class="col-sm-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control border-0" id="icedula" required placeholder="Cedula">
                                        <label for="icedula">Tu cedula</label>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control border-0" id="inombre" required placeholder="Nombre">
                                        <label for="inombre">Tu nombre</label>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control border-0" id="iapellido1" required placeholder="Primer apellido">
                                        <label for="iapellido1">Tu primer apellido</label>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control border-0" id="iapellido2" required placeholder="Segundo apellido">
                                        <label for="iapellido2">Tu segundo apellido</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating">
                                        <textarea class="form-control border-0" required placeholder="Direccion" id="idireccion" style="height: 100px"></textarea>
                                        <label for="idireccion">Dirreccion</label>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-floating">
                                        <input type="email" class="form-control border-0" id="imail" required placeholder="Email">
                                        <label for="imail">Tu Email</label>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control border-0" id="itelefono" required placeholder="Telefono">
                                        <label for="itelefono">Tu telefono</label>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control border-0" id="iusuario" required placeholder="Nombre de usuario">
                                        <label for="iusuario">Tu nombre de usuario</label>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-floating">
                                        <input type="password" class="form-control border-0" id="icontrasena" required placeholder="Contraseña">
                                        <label for="icontrasena">Tu contraseña</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button id="btnActionForm" class="btn btn-primary py-3 px-4" type="submit">Registrarme</button>
                                </div>
                            </div>
                        </form>
                        <script>
                            $(document).ready(function() {
                                $('#formProductor').submit(function(e) {
                                    e.preventDefault(); // Evitar el envío estándar del formulario

                                    // Obtener los valores del formulario
                                    var cedula = $('#icedula').val();
                                    var nombre = $('#inombre').val();
                                    var apellido1 = $('#iapellido1').val();
                                    var apellido2 = $('#iapellido2').val();
                                    var direccion = $('#idireccion').val();
                                    var email = $('#imail').val();
                                    var telefono = $('#itelefono').val();
                                    var usuario = $('#iusuario').val();
                                    var contrasena = $('#icontrasena').val();

                                    // Realizar la solicitud AJAX
                                    $.ajax({
                                        type: 'POST',
                                        url: 'http://localhost/agromarket/procesar_registro.php', // Cambia esto a la URL de tu script PHP
                                        data: {
                                            cedula: cedula,
                                            nombre: nombre,
                                            apellido1: apellido1,
                                            apellido2: apellido2,
                                            direccion: direccion,
                                            email: email,
                                            telefono: telefono,
                                            usuario: usuario,
                                            contrasena: contrasena,
                                        },
                                        success: function(response) {
                                            // Manejar la respuesta del servidor
                                            // console.log(response);
                                            console.log('Registro exitoso');
                                            alert('Registro exitoso');
                                            // Puedes redirigir a otra página o mostrar un mensaje de éxito aquí
                                        },
                                        error: function(error) {
                                            console.error(error);
                                            alert('Ha ocurrido un error');
                                            // Manejar errores aquí
                                        }
                                    });
                                });
                            });
                        </script>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Quote End -->


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