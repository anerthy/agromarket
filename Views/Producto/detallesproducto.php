<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Detalles del Producto</title>
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

    <!-- Custom Stylesheet -->
    <link href="<?= media(); ?>/css/plantilla/product-details.css" rel="stylesheet">
</head>

<body>
    <?php navbar(); ?>

    <!-- Page Header Start -->
    <div class="container-fluid page-header py-4 mb-4 wow fadeIn" data-wow-delay="0.1s">
        <div class="container text-center py-4">
            <h1 class="display-4 text-white mb-3 animated slideInDown">Detalles del producto</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a href="<?= base_url(); ?>">Agromarket</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Producto</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->
<!-- Resto de tu código HTML -->
<style>
        /* Estilos generales */
        body {
            font-family: 'Jost', sans-serif;
            background-color: #f8f9fa;
            color: #495057;
            margin: 0;
            padding: 0;
        }

        /* Estilos para la tarjeta combinada */
        .combined-card {
            /* display: flex; */
            justify-content: space-around;
            align-items: flex-start;
            flex-wrap: wrap;
            /* margin: 20px auto; */
            max-width: 800px;
        }

        /* Estilos para el contenedor de detalles */
        .details-container {
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            /* margin: 20px; */
            padding: 20px;
            width: 150%;
            transition: transform 0.3s ease-in-out;
            box-sizing: border-box;
            margin: 0px 0px 0px -200px;
        }

        .details-container:hover {
            transform: scale(1.05);
        }

        .details-container img {
    width: 300px;
    margin: 0px 0px 0px 100px;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    margin-bottom: 15px

        }

        .details-container h2 {
            font-size: 1.8em;
            margin-bottom: 10px;
            color: #007bff;
            text-align: center;
        }

        .details-container p {
            margin: 10px 0;
            font-size: 1.2em;
            color: #6c757d;
            text-align: center;
        }
    </style>
    <center>
<div class="combined-card">
    <div class="details-container" style="display:flex;">
        <img src="<?= media() . '/images/uploads/productores/' . $data['producto'][0]['pdt_imagen']; ?>" alt="Productor">
        <ul>
        <strong>Nombre:</strong> <?php echo $data['producto'][0]['pdt_nombre'] ?>
        <strong>Teléfono:</strong> <?php echo $data['producto'][0]['per_telefono'] ?>
        <strong>Dirección:</strong> <?php echo $data['producto'][0]['pdt_ubicacion'] ?>
        </ul>

        <hr> <!-- Línea divisoria opcional -->

        <img src="<?= media() . '/images/uploads/productos/' . $data['producto'][0]['pro_imagen']; ?>" alt="Producto">
        <ul>
        <strong>Producto:</strong> <?php echo $data['producto'][0]['pro_nombre'] ?>
        <strong>Descripción:</strong> <?php echo $data['producto'][0]['pro_descripcion'] ?><br>
        <strong>Categoría:</strong> <?php echo $data['producto'][0]['pro_categoria'] ?><br>
        <strong>Precio:</strong> ₡ <?php echo $data['producto'][0]['pro_precio'] ?>
        </ul>
    </div>
</div>

</center>
<!-- Resto de tu código HTML -->


    <?php anuncios(); ?>
        

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
