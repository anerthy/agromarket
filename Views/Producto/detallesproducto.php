<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Producto</title>
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
            <h1 class="display-3 text-white mb-4 animated slideInDown">Detalles del producto</h1>
            <nav aria-label="breadcrumb animated slideInDown">
                <ol class="breadcrumb justify-content-center mb-0">
                    <li class="breadcrumb-item"><a href="<?= base_url(); ?>">Agromarket</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Producto</li>
                </ol>
            </nav>
        </div>
    </div>
    <!-- Page Header End -->
    <style>
        /* Estilos para pantallas grandes */
        .product-details {
            display: flex;
            justify-content: space-around;
            align-items: center;
        }

        .product-image img {
            max-width: 300px;
            height: auto;
        }

        .details {
            max-width: 60%;
            /* Para asegurar que los detalles no ocupen demasiado espacio */
        }

        /* Estilos para pantallas más pequeñas o dispositivos móviles */
        @media (max-width: 768px) {
            .product-details {
                flex-direction: column;
                /* Cambiar a disposición vertical en pantallas pequeñas */
                text-align: center;
            }

            .product-image img {
                max-width: 100%;
                /* La imagen ocupa todo el ancho disponible */
                margin-bottom: 20px;
            }

            .details {
                max-width: 100%;
                /* Detalles ocupan todo el ancho disponible */
            }
        }

        .product-category-badge {
            padding: 5px 10px;
            background-color: #337ab7;
            /* Color de fondo del badge */
            color: white;
            /* Color del texto dentro del badge */
            border-radius: 20px;
            /* Redondear las esquinas del badge */
            font-size: 0.9em;
            /* Tamaño de fuente del texto en el badge */
        }

        .contact-details {
            margin: 20px;
            padding: 20px;
            border: 1px solid #ccc;
        }

        .contact-details h2 {
            font-size: 1.5em;
            margin-bottom: 10px;
        }

        .contact-details p {
            margin: 5px 0;
        }

        .contact-details span {
            font-weight: bold;
            color: #333;
        }

        .banner {
            width: 100%;
        }

        .banner img {
            width: 100%;
            height: 200px;
            display: block;
        }
    </style>

    <div class="product-details">
        <div class="product-image">
            <img src="<?= media() . '/images/uploads/productos/' . $data['producto'][0]['pro_imagen']; ?>" alt="Producto">
        </div>
        <div class="details">
            <h1><span id="product-id"><?php echo $data['producto'][0]['pro_nombre'] ?></span></h1>
            <!-- <h2>Nombre: <span id="product-name">Nombre del Producto</span></h2> -->
            <p><span id="product-description"><?php echo $data['producto'][0]['pro_descripcion'] ?></span></p>
            <p><span id="product-category" class="product-category-badge"><?php echo $data['producto'][0]['pro_categoria'] ?></span></p>
            <h3>₡ <span id="product-price"><?php echo $data['producto'][0]['pro_precio'] ?></span></h3>
        </div>
    </div>

    <div class="contact-details">
        <div class="product-image">
            <img src="<?= media() . '/images/uploads/productores/' . $data['producto'][0]['pdt_imagen']; ?>" alt="Producto">
        </div>
        <h2>Detalles del productor</h2>
        <p><span id="producer-name"><?php echo $data['producto'][0]['pdt_nombre'] ?></span></p>
        <p><span id="producer-phone"><?php echo $data['producto'][0]['per_telefono'] ?></span></p>
        <p><span id="producer-address"><?php echo $data['producto'][0]['pdt_ubicacion'] ?></span></p>
    </div>

    <div class="banner">
        <!-- <img src="<?= media(); ?>/images/uploads/anuncio/<?php echo $data['anuncio_principal'][0]['anu_imagen']; ?>" alt="<?php echo $data['anuncio_principal'][0]['anu_descripcion']; ?>" title="<?php echo $data['anuncio_principal'][0]['anu_descripcion']; ?>" </div> -->
    </div>


    


<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">

  <style>
    /* Estilos generales */
    .owl-carousel {
      display: flex;
      justify-content: center;
      align-items: center;
      overflow: hidden;
    }

    .owl-carousel .owl-stage {
      display: flex;
      justify-content: space-between;
      align-items: center;
    }

    /* Estilos para cada ítem del carrusel */
    .owl-item {
      margin-right: 10px;
      transition: transform 0.3s ease-in-out;
    }

    .owl-item:hover {
      transform: scale(1.05);
    }

    .owl-item img {
      width: 100%;
      height: auto; /* Cambiado de 100% a auto */
      object-fit: cover;
      border-radius: 8px; /* Puedes ajustar el radio de borde según tu preferencia */
    }

    .owl-item .shadow-sm {
      position: absolute;
      bottom: 0;
      left: 0;
      right: 0;
      background-color: #88b44e;
      padding: 10px;
    }

    .owl-item h4 {
      color: #fff;
      font-size: 1.5em;
      margin: 0;
    }
  </style>
</head>
<body>

<!-- Anuncios Start -->
<div class="container-fluid product py-5 my-5">
  <div class="container py-5">
    <div class="section-title text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
      <h1 class="display-6">Anuncios</h1>
    </div>
    <div class="owl-carousel owl-theme product-carousel wow fadeInUp" data-wow-delay="0.5s">

      <?php foreach ($data['anuncio_principal'] as $anuncio) : ?>
        <!-- <a href="<?php echo $anuncio['url']; ?>" class="d-block product-item rounded"> -->
          <img src="<?= media(); ?>/images/uploads/anuncio/<?php echo $anuncio['anu_imagen']; ?>" alt="<?php echo $anuncio['anu_descripcion']; ?>" title="<?php echo $anuncio['anu_descripcion']; ?>">
        <!-- </a> -->
      <?php endforeach; ?>

    </div>
  </div>
</div>
<!-- Anuncios End -->


<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

<script>
  $(document).ready(function(){
    $('.owl-carousel').owlCarousel({
      items: 3,
      loop: true,
      margin: 10,
      autoplay: true,
      autoplayTimeout: 3000,
      responsive: {
        0: {
          items: 1
        },
        768: {
          items: 3
        }
      }
    });
  });
</script>

</body>
</html>






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