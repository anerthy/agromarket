<?php header($data); ?>
<head>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link href="<?= media(); ?>/css/cards-hospedaje/cards_hospedaje.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
</head>
<main>
  <div class="card animate__animated  animate__backInDown">
    <br><br><br>
    <div class="hero">
      <div class="hero-text">
        <h1 class="titulo" style="color: #0f265c"><b><?= $data['page_title'] ?></b></h1>
        <p style="color: black;">Sumérgete en el paraíso del Golfo de Nicoya: un refugio de tranquilidad y comodidad en la costa.</p>
      </div>
      <div class="project__img-container">
        <img class="project__img" src='<?= media(); ?>/images/uploads/hospedajes/Hero.jpg' alt=''>
      </div>
    </div>
  </div>
  <div class="separador"></div>

  <center>
    <br><br><br><br><br>
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

  <!-- start modal de hospedaje -->
  <div class="modal fade" id="modalHospedaje" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Detalles del servicio</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <!-- cuerpo del modal -->

          <!-- Start nombre -->
          <div class="form-group">
            <h3 id="hosp-nombre"><b>Lorem ipsum dolor</b></h3>
          </div>
          <!-- End nombre -->

          <!-- Start descripción -->
          <div class="form-group">
            <p id="hosp-descripcion">Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus quos alias provident labore exercitationem, iusto temporibus! Sequi, minima quos. Culpa deleniti explicabo placeat similique sapiente laborum. Iure voluptate praesentium consectetur.</p>
          </div>
          <!-- End descripción -->

          <!-- Start direccion -->
          <div class="form-group">
            <h5>Ubicación</h5>
            <p id="hosp-direccion">Lorem ipsum dolor sit amet consectetur adipisicing elit. Natus quos alias provident labore exercitationem, iusto temporibus! Sequi, minima quos. Culpa deleniti explicabo placeat similique sapiente laborum. Iure voluptate praesentium consectetur.</p>
          </div>
          <!-- End direccion -->

          <div class="form-row">
            <!-- start tipo -->
            <div class="form-group col-md-6">
              <label for="hosp-tipo">
                <h5>Tipo</h5>
              </label>
              <input type="text" class="form-control" id="hosp-tipo" value="08:00AM - 10:00PM" readonly>
            </div>
            <!-- end tipo -->

            <!-- start precio -->
            <div class="form-group col-md-6">
              <label for="hosp-precio">
                <h5>Precio</h5>
              </label>
              <input type="text" class="form-control" id="hosp-precio" value="5000" disabled>
            </div>
            <!-- end precio -->
          </div>

          <div class="form-row">
            <!-- start telefono -->
            <div class="form-group col-md-6">
              <label for="hosp-telefono">
                <h5>Teléfono</h5>
              </label>
              <p>+506 <span id="hosp-telefono">88008800</span></p>
            </div>

            <div class="form-group col-md-6">
              <label for="wsa">
                <h5>WhatsApp</h5>
                <p>
                  <a id="wsa" aria-label="Escribir por WhatsApp" href="https://wa.me/50688008800" target="_blank">
                    <img alt="Escripir por WhatsApp" src="<?= media() ?>/images/WhatsAppButtonGreenSmall.png" title="Escripir por WhatsApp" width="130px" />
                  </a>
                </p>
            </div>
            <!-- end telefono -->
          </div>

          <!-- start imagen -->
          <div class="form-group">
            <div id="hosp-imagen"></div>
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
  <!-- end modal de hospedaje -->
</main>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="<?= media(); ?>/js/views/hospedajes.js"></script>

<?php
footer($data);
?>