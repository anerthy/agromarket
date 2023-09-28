<?php
headerAdmin($data);
?>
<main class="app-content">
    <div class="app-title">
        <div>


        <!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .custom-container {
            height: 80vh; /* Establece la altura al 80% de la ventana */
            width: 80vw; /* Establece el ancho al 80% de la ventana */
            margin: auto; /* Centra el contenido vertical y horizontalmente */
            padding: 20px; /* Agrega un espacio alrededor del contenido */
            text-align: center; /* Centra el contenido horizontalmente */
        }
    </style>
</head>
<body>
    <div class="custom-container">
        <h1>UNIRSE AL PLAN PREMIUM</h1>
        <br>
        <img src="<?= media(); ?>/images/afiliados.jpg" alt="Afiliados" class="rounded" style="max-width: 40%; height: auto;">

        <!-- <img src="<?= media(); ?>/images/afiliados.jpg" alt="Afiliados" class="img-fluid rounded"> -->
        <p class="mt-3">En AgroMarket, valoramos la pasión por la agricultura y la dedicación a cultivar alimentos frescos y saludables. Si eres un productor de frutas y verduras comprometido con la calidad y la sostenibilidad, te invitamos a formar parte de nuestra comunidad.</p>
        <a href="#" class="btn btn-primary mt-3">Solicitar Afiliación</a>
    </div>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html> 

            <!-- <center>
                <h1>Unirse al plan premium</h1>
                <img src="https://placehold.co/300x200?text=Unete+a+nuestro+equipo" alt="imagen ilustrativa">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Voluptate dolorum temporibus iure officia quam necessitatibus cupiditate laborum animi explicabo voluptatem tempore eligendi, quae perspiciatis excepturi quo aliquam mollitia eveniet deleniti!</p>
                <button>
                    <a href="#">
                        Volverme afiliado
                    </a>
                </button>
            </center> -->
        </div>
    </div>
</main>

<?php footerAdmin($data); ?>