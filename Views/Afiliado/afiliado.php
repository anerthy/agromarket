<?php
headerAdmin($data);
$valAfiliado =  $data['val_afiliado'];
$datAfiliado =  $data['dat_afiliado'];
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
                <?php if ($valAfiliado[0]['EXISTE'] == 0) { ?>
                    <section class="afiliarse">
                        <h1> <strong> UNIRSE AL PLAN PREMIUM </strong></h1>
                        <img src="<?= media(); ?>/images/afiliado.jpg" alt="Afiliados" class="rounded" style="max-width: 40%; height: auto;">
                        <br>
                        <br>
                        <h5>Beneficios del Plan Premium</h5>
                        <p class="mt-3">En AgroMarket hemos desarrollado un plan premium diseñado para potenciar al máximo tus ventajas en nuestra plataforma.
                            Te invitamos a aprovechar esta oportunidad y descubrir todas las ventajas que tenemos reservadas para ti por un costo mensual.
                        </p>
                        <button id="btn-afiliarse" class="btn btn-success mt-3" onClick="fntAfiliarse(<?php echo $_SESSION['userData']['usr_id']; ?>)">Solicitar Afiliación</button>
                    </section>
                <?php } else { ?>
                    <section class="ver-afiliacion">
                        <h1><?php echo $datAfiliado[0]['pdt_nombre'] ?></h1>
                        <img src="<?= media(); ?>/images/afiliadopremium.jpg" alt="Afiliados Premium" class="rounded" style="max-width: 40%; height: auto;">
                        <p class="mt-3">Con el plan premium tendrás acceso a funcionalidades adicionales
                            dentro de Agromarket.
                        </p>
                        <p >Ante cualquier avería usted tendrá soporte técnico prioritario.</p>
                        <p >La membresía premium ofrece más espacio de almacenamiento.</p>
                        <br>
                        <p>La Afiliación está vigente hasta el día <span class="font-weight-bold"><?php echo $datAfiliado[0]['afl_fec_vencimiento'] ?></span></p>
                        <button class="btn btn-success mt-3">Renovar ahora</button>
                    </section>
                <?php } ?>
            </div>
        </div>
    </div>
    
</main>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<?php footerAdmin($data); ?>