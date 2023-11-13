<style>
    .article-anuncios {
        width: 100%;
    }

    .article-anuncios img {
        width: 100%;
        height: 200px;
        display: block;
    }
</style>

<article class="article-anuncios">
    <img src="..." alt="..." title="...">
</article>






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

<!-- Products Start -->
<div class="container-fluid product py-5 my-5">
  <div class="container py-5">
    <div class="section-title text-center mx-auto wow fadeInUp" data-wow-delay="0.1s" style="max-width: 500px;">
      <h1 class="display-6">Valores</h1>
    </div>
    <div class="owl-carousel owl-theme product-carousel wow fadeInUp" data-wow-delay="0.5s">
      <!-- Primer elemento del carrusel -->
      <a href="" class="d-block product-item rounded">
        <img src="<?= media(); ?>/images/uploads/anuncio/anuncio1.jpg" alt="">

      </a>

      <!-- Segundo elemento del carrusel -->
      <a href="" class="d-block product-item rounded">
        <img src="<?= media(); ?>/images/uploads/anuncio/anuncio1.jpg" alt="">

      </a>

      <!-- Tercer elemento del carrusel -->
      <a href="" class="d-block product-item rounded">
        <img src="<?= media(); ?>/images/uploads/anuncio/anuncio1.jpg" alt="">

      </a>
      <!-- Agrega más elementos del carrusel aquí -->
    </div>
  </div>
</div>
<!-- Products End -->

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
