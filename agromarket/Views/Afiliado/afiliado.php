<?php
headerAdmin($data);
?>

<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .custom-container {
            height: 100%;
            /* Establece la altura al 80% de la ventana */
            width: 100%;
            /* Establece el ancho al 80% de la ventana */
            margin: auto;
            /* Centra el contenido vertical y horizontalmente */
            padding: 20px;
            /* Agrega un espacio alrededor del contenido */
            text-align: center;
            /* Centra el contenido horizontalmente */
        }
    </style>
</head>
<main class="app-content">
    <div class="app-title">
        <div>
            <div class="custom-container">
                <section class="afiliarse">
                    <h1> <strong> UNIRSE AL PLAN PREMIUM </strong></h1>
                    <img src="<?= media(); ?>/images/afiliado.jpg" alt="Afiliados" class="rounded" style="max-width: 40%; height: auto;">
                    <br>
                    <br>
                    <h5>Beneficios del Plan Premium</h5>
                    <p class="mt-3">En AgroMarket hemos desarrollado un plan premium diseñado para potenciar al máximo tus ventajas en nuestra plataforma.
                        Te invitamos a aprovechar esta oportunidad y descubrir todas las ventajas que tenemos reservadas para ti por un costo mensual.
                    </p>
                    <button id="btn-afiliarse" class="btn btn-success mt-3" onClick="fntAfiliarse(1)">Solicitar Afiliación</button>
                </section>
                <hr>
                <section class="ver-afiliacion">
                    <h1>Andres Mejias</h1>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nulla soluta eveniet veniam fuga esse quidem enim beatae, veritatis impedit temporibus ducimus vero praesentium eius iusto consequatur itaque ullam dolor dolorem.</p>
                    <p>Afiliacion vigente hasta el <span>29/10/2023</span></p>
                    <button class="btn btn-success mt-3">...</button>
                </section>
            </div>
        </div>
    </div>
</main>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<?php footerAdmin($data); ?>