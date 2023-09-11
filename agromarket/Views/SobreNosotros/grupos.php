<?php
_header($data);
$arrGrupos =  $data['grupos'];
?>

<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link href="<?= media(); ?>/css/cards-grupos/card-grupos.css" rel="stylesheet">
</head>

<body>
    <!-- <div class="container">  -->
    <br>
    <br>
    <br>
    <br>
    <center>
        <br>
        <h1 class="titulo Tipografia-titulo" style="color: #0f265c"><b><?= $data['page_title'] ?></b></h1>
        <br>
        <p id="info" style="font-size: 20px; text-align: justify; margin:20px">
        </p>

    </center>

    <div class="">
        <?php

    for ($i = 0; $i < count($arrGrupos); $i++) {
      $arrGrupos[$i]['gpo_logo'];

    ?>
        <center>
            <section class="">
                <div class="container py-4">

                    <article class="postcard dark blue">
                        <a class="postcard__img_link" href="#">
                            <img id="logo" src="<?= $arrGrupos[$i]['gpo_logo'] ?>" alt="logo del grupos"
                                class="card-img-top" alt="logo del grupos" style="width: 335px; height:450px;">
                        </a>
                        <div class="postcard__text">
                            <h1 class="postcard__title blue">
                                <p id="" class="Color-Title Tipografia-contenido"><?= $arrGrupos[$i]['gpo_nombre'] ?>
                                </p>

                            </h1>
                            <div class="postcard__subtitle small">

                            </div>
                            <div class="postcard__bar"></div>
                            <div class="postcard__preview-txt">

                                <h5> <b>
                                        <p id="" class="textTitulo Tipografia-contenido">
                                            <?= $arrGrupos[$i]['gpo_descripcion'] ?></p>
                                    </b>
                                    <h5>

                                        <h4 class="Tipografia-titulo"> <b> Ubicación:</b></h4>
                                        <h5> <b>
                                                <p id="" class="textTitulo Tipografia-contenido">
                                                    <?= $arrGrupos[$i]['gpo_ubicacion'] ?></p>
                                            </b>
                                            <h5>

                            </div>
                            <ul class="postcard__tagbox">
                                <button class="button-grupos" data-toggle="modal"
                                    data-target="#<?= $arrGrupos[$i]['gpo_id'] ?>">
                                    Ver más
                                </button>

                            </ul>
                        </div>
                    </article>


                </div>
            </section>

        </center>

        <!-- start modal de alimentacion -->
        <div class="modal fade" id="<?= $arrGrupos[$i]['gpo_id'] ?>" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content Fondo">
                    <div class="modal-header">
                        <h5 class="modal-title">Detalles del grupo organizado</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <!-- cuerpo del modal -->

                        <!-- Start nombre -->
                        <div class="form-group">
                            <h3 id="gpo-nombre"><b><?= $arrGrupos[$i]['gpo_nombre'] ?></b></h3>
                        </div>
                        <!-- End nombre -->

                        <!-- Start descripción -->
                        <div class="form-group">
                            <p id="gpo-descripcion"><?= $arrGrupos[$i]['gpo_descripcion'] ?></p>
                        </div>
                        <!-- End descripción -->

                        <!-- Start direccion -->
                        <div class="form-group">
                            <h5>¿Comó llegar?</h5>
                            <p id="gpo-comunidad"><?= $arrGrupos[$i]['gpo_ubicacion'] ?></p>
                        </div>
                        <!-- End direccion -->

                        <div class="form-group">
                            <h5>Representante</h5>
                            <p id="gpo-comunidad"><?= $arrGrupos[$i]['gpo_representante'] ?></p>
                        </div>

                        <!-- Start nombre -->
                        <div class="form-group">
                            <h5>Número de integrantes</h5>
                            <p class="gpo-numero-integrantes"><?= $arrGrupos[$i]['gpo_numero_integrantes'] ?></p>
                        </div>
                        <!-- End nombre -->

                        <div class="form-row">
                            <!-- start telefono -->
                            <div class="form-group col-md-6">
                                <label for="alim-telefono">
                                    <h5>Teléfono</h5>
                                </label>
                                <p>+506 <span id="gpo-telefono"><?= $arrGrupos[$i]['gpo_telefono'] ?></span></p>
                            </div>

                            <div class="form-group col-md-6">
                                <label for="wsa">
                                    <h5>WhatsApp</h5>
                                    <p>
                                        <a id="wsa" aria-label="Escribir por WhatsApp"
                                            href="https://wa.me/506<?= $arrGrupos[$i]['gpo_telefono'] ?>"
                                            target="_blank">
                                            <img alt="Escripir por WhatsApp"
                                                src="<?= media() ?>/images/WhatsAppButtonGreenSmall.png"
                                                title="Escripir por WhatsApp" width="130px" />
                                        </a>
                                    </p>
                            </div>
                            <!-- end telefono -->
                        </div>

                        <!-- start imagen -->
                        <div class="form-group">
                            <center id="gpo-imagen">
                                <img id="logo-grupo" src="<?= $arrGrupos[$i]['gpo_logo'] ?>"
                                    alt="Logo de <?= $arrGrupos[$i]['gpo_nombre'] ?>">
                            </center>
                        </div>

                        <!-- cuerpo del modal -->
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn-info" data-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- end modal de alimentacion -->



        <?php
    }
    ?>
    </div>




    <?php
  footer($data);
  ?>






    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
</body>

</html>