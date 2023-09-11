<?php
_header($data);
$arrComunidades =  $data['comunidades'];
?>

<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link href="<?= media(); ?>/css/cards-comunidades/cards-comunidades.css" rel="stylesheet">
</head>

<body>

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

    for ($i = 0; $i < count($arrComunidades); $i++) {
        $arrComunidades[$i]['com_imagen'];

    ?>

        <center>
            <section class="">
                <div class="container py-4">


                    <article class="postcard dark blue">
                        <a class="postcard__img_link" href="#">
                            <img id="logo" src="<?= $arrComunidades[$i]['com_imagen'] ?>" alt="logo del grupos"
                                class="card-img-top" alt="logo del grupos" style="width: 335px; height:450px;">
                        </a>
                        <div class="postcard__text">
                            <h1 class="postcard__title blue">
                                <p id="" class="Color-Title Tipografia-contenido">
                                    <?= $arrComunidades[$i]['com_nombre'] ?></p>

                            </h1>
                            <div class="postcard__subtitle small">

                            </div>
                            <div class="postcard__bar"></div>
                            <div class="postcard__preview-txt">

                                <h2 class="Tipografia-contenido-Comunidades">
                                    <?= $arrComunidades[$i]['com_provincia'] ?>,
                                    <?= $arrComunidades[$i]['com_canton'] ?>,
                                    <?= $arrComunidades[$i]['com_distrito'] ?>.</h2>


                                <h4 class="Tipografia-titulo"> <b> Descripción:</b></h4>
                                <h5> <b>
                                        <p id="" class="textTitulo Tipografia-contenido">
                                            <?= $arrComunidades[$i]['com_descripcion'] ?></p>
                                    </b>
                                    <h5>

                            </div>
                            <ul class="postcard__tagbox">


                            </ul>
                        </div>
                    </article>


                </div>
            </section>
        </center>
        <?php
    }
    ?>
       
       
      <?php
footer($data);?>






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