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
                        <form id="formProductor" name="formProductor" class="form-horizontal">
                            <div class="row g-3">
                                <div class="col-sm-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control border-0" id="icedula" placeholder="Cedula">
                                        <label for="icedula">Tu cedula</label>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control border-0" id="inombre" placeholder="Nombre">
                                        <label for="inombre">Tu nombre</label>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control border-0" id="inombiapellido1re" placeholder="Primer apellido">
                                        <label for="iapellido1">Tu primer apellido</label>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control border-0" id="iapellido2" placeholder="Segundo apellido">
                                        <label for="iapellido2">Tu segundo apellido</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating">
                                        <textarea class="form-control border-0" placeholder="Direccion" id="idireccion" style="height: 100px"></textarea>
                                        <label for="idireccion">Dirreccion</label>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-floating">
                                        <input type="email" class="form-control border-0" id="imail" placeholder="Email">
                                        <label for="imail">Tu Email</label>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control border-0" id="itelefono" placeholder="Telefono">
                                        <label for="itelefono">Tu telefono</label>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-floating">
                                        <input type="text" class="form-control border-0" id="iusuario" placeholder="Nombre de usuario">
                                        <label for="iusuario">Tu nombre de usuario</label>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-floating">
                                        <input type="password" class="form-control border-0" id="icontrasena" placeholder="Contraseña">
                                        <label for="icontrasena">Tu contraseña</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button id="btnActionForm" class="btn btn-primary py-3 px-4" type="submit">Registrarme</button>
                                </div>
                            </div>
                        </form>
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

    <script>
        var tableVoluntarios;
        let rowTable = "";
        let divLoading = document.querySelector("#divLoading");

        document.addEventListener('DOMContentLoaded', function() {

            var formProductor = document.querySelector("#formProductor");
            formProductor.onsubmit = function(e) {
                e.preventDefault();
                // var intIdVoluntario = document.querySelector('#vol_id').value;
                var strCedula = document.querySelector('#icedula').value;
                var strNombre = document.querySelector('#inombre').value;
                var strApellido1 = document.querySelector('#iapellido1').value;
                var strApellido2 = document.querySelector('#iapellido2').value;
                var strDireccion = document.querySelector('#idireccion').value;
                var strCorreo = document.querySelector('#imail').value;
                var strTelefono = document.querySelector('#itelefono').value;
                var strUsuario = document.querySelector('#iusuario').value;
                var strContrasena = document.querySelector('#icontrasena').value;

                alert(strCedula)
                if (strNombre == '' || strApellido1 == '' || strApellido2 == '' || strCedula == '' || strCorreo == '' || strTelefono == '' || strFechaNacimiento == '' || strUsuario == '' || strDireccion == '') {
                    alert("Atención", "Todos los campos son obligatorios.");
                }

                var request = (window.XMLHttpRequest) ? new XMLHttpRequest() : new ActiveXObject('Microsoft.XMLHTTP');
                var ajaxUrl = 'http://localhost/agromarket/Register/agregarProductor';
                var formData = new FormData(formProductor);
                request.open("POST", ajaxUrl, true);
                request.send(formData);
                request.onreadystatechange = function() {
                    if (request.readyState == 4 && request.status == 200) {

                        var objData = JSON.parse(request.responseText);
                        if (objData.status) {

                            alert('Registro exitoso');

                            formProductor.reset();
                        } else {
                            alert('Ha ocurrido un error');
                        }
                    }
                    return false;
                }
            }
        }, false);
    </script>
</body>

</html>