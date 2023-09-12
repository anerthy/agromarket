<?php
_header($data);
?>
<head>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link href="<?= media(); ?>/css/cards-tour/cards_tours.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
</head>

<main>
  <div class="card animate__animated  animate__backInDown">
    <br><br><br>
    <div class="hero">
      <div class="hero-text">
        <h1 class="titulo" style="color: #0f265c"><b><?= $data['page_title'] ?></b></h1>
        <p style="color: black;">Descubre la magia del Golfo de Nicoya: donde el sol, el mar y la aventura se unen en un solo viaje.</p>
      </div>
      <div class="project__carousel-container">
      <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>

        <div class="carousel-inner">  
          <div class="carousel-item active">
            <iframe src="https://www.facebook.com/plugins/video.php?height=308&href=https%3A%2F%2Fwww.facebook.com%2Fasjuesdeiv97%2Fvideos%2F521408402876167%2F&show_text=false&width=560&t=0" width="560" height="308" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share" allowFullScreen="true"></iframe>
          </div>
          <div class="carousel-item">
            <iframe src="https://www.facebook.com/plugins/video.php?height=308&href=https%3A%2F%2Fwww.facebook.com%2Fasjuesdeiv97%2Fvideos%2F278316104288725%2F&show_text=false&width=560&t=0" width="560" height="308" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share" allowFullScreen="true"></iframe>
          </div>
          <div class="carousel-item">
            <iframe src="https://www.facebook.com/plugins/video.php?height=308&href=https%3A%2F%2Fwww.facebook.com%2Fasjuesdeiv97%2Fvideos%2F3605224922879719%2F&show_text=false&width=560&t=0" width="560" height="308" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowfullscreen="true" allow="autoplay; clipboard-write; encrypted-media; picture-in-picture; web-share" allowFullScreen="true"></iframe>  </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
      </div>
    </div>
  </div>

  <div class="separador"></div>

  <br><br><br><br>
  <center>
    <br>
    <h1 class="titulo" style="color: #0f265c"><b><?= $data['page_title'] ?></b></h1>
    <br>
    <p id="info" style="font-size: 20px; text-align: justify; margin:20px">
    </p>
    <!-- start contenedor de cards -->
    <div id="cards-container">
      <p>cargando...</p>
    </div>
    <!-- end contenedor de cards -->

    <!-- start paginador -->
    <nav aria-label="Page navigation example">
      <ul class="pagination justify-content-center">
        <li class="page-item">
          <a class="page-link" href="#" id="btn-anterior" tabindex="-1">Anterior</a>
        </li>
        <li class="page-item">
          <p class="page-link" id="num-page" tabindex="-1">1</p>
        </li>
        <li class="page-item">
          <a class="page-link" id="btn-siguiente" href="#">Siguiente</a>
        </li>
      </ul>
    </nav>
    <!-- end paginador -->
  </center>

  <!-- start modal de tour -->
  <div id="modalTour" class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Detalles del tour</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <!-- cuerpo del modal -->

          <!-- Start nombre -->
          <div class="form-group">
            <h3 id="tour-nombre"><b>Lorem ipsum dolor</b></h3>
          </div>
          <!-- End nombre -->

          <!-- Start descripción -->
          <div class="form-group">
            <p id="tour-descripcion">Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus quos alias provident labore exercitationem, iusto temporibus! Sequi, minima quos. Culpa deleniti explicabo placeat similique sapiente laborum. Iure voluptate praesentium consectetur.</p>
          </div>
          <!-- End descripción -->

          <!-- Start actividad -->
          <div class="form-group">
            <h5>¿En que consiste?</h5>
            <p id="tour-actividad">Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus quos alias provident labore exercitationem, iusto temporibus! Sequi, minima quos. Culpa deleniti explicabo placeat similique sapiente laborum. Iure voluptate praesentium consectetur.</p>
          </div>
          <!-- End actividad -->

          <!-- Start lugar -->
          <div class="form-group">
            <h5>Lugar</h5>
            <p id="tour-lugar">Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus quos alias provident labore exercitationem, iusto temporibus! Sequi, minima quos. Culpa deleniti explicabo placeat similique sapiente laborum. Iure voluptate praesentium consectetur.</p>
          </div>
          <!-- End lugar -->

          <!-- Start servicios -->
          <div class="form-group">
            <h5>¿Qué incluye?</h5>
            <ul id="tour-servicios">
              <li>Lorem ipsum dolor sit amet consectetur, adipisicing elit.</li>
              <li>Nulla similique rerum obcaecati consectetur.</li>
              <li>Libero pariatur ab ratione quam dolore voluptatem.</li>
            </ul>
          </div>
          <!-- End servicios -->

          <!-- start disponibilidad -->
          <div class="form-group">
            <h5>Disponibilidad</h5>
            <p id="tour-disponibilidad">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
          </div>
          <!-- end disponibilidad -->
          <div class="form-row">
            <div class="form-group col-md-3">
              <label for="tour-precio">
                <h5>Precio por persona</h5>
              </label>
              <input type="text" class="form-control" id="tour-precio" value="5000" readonly>
            </div>
            <div class="form-group col-md-9"></div>
          </div>
          <div class="row">
            <br>
            <!-- start hora-inicio -->
            <div class="form-group col-md-3">
              <label for="tour-hora-inicio">
                <h5>Hora de inicio</h5>
              </label>
              <input type="text" class="form-control" id="tour-hora-inicio" value="08:00AM - 10:00PM" readonly>
            </div>
            <!-- end hora-inicio -->
            <!-- start duracion -->
            <div class="form-group col-md-3">
              <label for="tour-duracion">
                <h5>Duración</h5>
              </label>
              <input type="text" class="form-control" id="tour-duracion" value="02:00 aprox" disabled>
            </div>
            <!-- end duracion -->
            <div class="form-group col-md-2"></div>
            <div class=" col-md-3">
              <label for="tour-cupo">
                <h5>Cupo minimo</h5>
              </label>
              <input type="text" class="form-control" id="tour-cupo" value="10 personas" disabled>
            </div>
          </div>

          <div class="form-row">
            <!-- start telefono -->
            <div class="form-group col-md-3">
              <label for="tour-telefono">
                <h5>Teléfono</h5>
              </label>
              <p>+506 <span id="tour-telefono">88008800</span></p>
            </div>

            <div class="form-group col-md-3">
              <label for="wsa">
                <h5>WhatsApp</h5>
                <p>
                  <a id="wsa" aria-label="Escribir por WhatsApp" href="https://wa.me/50688008800" target="_blank">
                    <img alt="Escripir por WhatsApp" src="<?= media() ?>/images/WhatsAppButtonGreenSmall.png" title="Escripir por WhatsApp" width="130px" />
                  </a>
                </p>
            </div>
            <!-- end telefono -->
            <div class="form-group col-md-6"></div>
          </div>

          <!-- start imagen -->
          <div class="form-group">
            <div id="tour-imagen"></div>
          </div>
          <!-- end imagen -->

          <!-- cuerpo del modal -->
        </div>
        <div class="modal-footer">
          <button type="button" class="btn-dark" data-dismiss="modal">Cerrar</button>
        </div>
      </div>
    </div>
  </div>
  <!-- end modal de tour -->
</main>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="<?= media(); ?>/js/views/tours.js"></script>
<script src="<?= media(); ?>/js/js-tours/carousel.js"></script>

<?php
footer($data);
?>