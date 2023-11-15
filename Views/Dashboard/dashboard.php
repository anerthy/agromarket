<?php
headerAdmin($data);
?>
<main class="app-content">
  <div class="app-title">
    <div>
      <h1>
        <a href="<?= base_url(); ?>/dashboard" style="text-decoration: none;">
          <span class="fa fa-bars fa-lg"></span>
          <?= $data['page_tag'] ?>
        </a>
      </h1>
    </div>
    <ul class="app-breadcrumb breadcrumb">
      <li class="breadcrumb-item">
        <a href="<?= base_url(); ?>/dashboard">
          <i class="fa fa-home fa-lg"></i>
        </a>
      </li>
      <li class="breadcrumb-item">
        <a href="<?= base_url(); ?>/dashboard">
          <?= $data['page_title'] ?>
        </a>
      </li>
    </ul>
  </div>
  <section>
    <!-- INICIO FILA UNO -->
    <div class="row">
      <?php if (in_array($_SESSION['userData']['rol_id'], [1, 2])) { ?>
        <!-- USUARIOS -->
        <div class="col-md-6 col-lg-3">
          <div class="widget-small primary coloured-icon" style="  box-shadow: rgba(7, 7, 7, 0.1) 11px 9px 0px 0px;"><i class="icon fa fa-users fa-3x"></i>
            <div class="info">
              <h4><a href="<?= base_url(); ?>/usuario">Usuarios</a></h4>
            </div>
          </div>
        </div>
        <!-- ROLES -->
        <div class="col-md-6 col-lg-3">
          <div class="widget-small danger coloured-icon"><i class="icon fa fa-gear fa-3x"></i>
            <div class="info">
              <h4><a href="<?= base_url(); ?>/rol">Roles</a></h4>
            </div>
          </div>
        </div>
        <!-- PERSONAS -->
        <div class="col-md-6 col-lg-3">
          <div class="widget-small primary coloured-icon"><i class="icon fa fa-users"></i>
            <div class="info">
              <h4><a href="<?= base_url(); ?>/persona">Personas</a></h4>
            </div>
          </div>
        </div>
      <?php } ?>
      <?php if (in_array($_SESSION['userData']['rol_id'], [1, 2, 3, 4])) { ?>
        <?php if ($data['existe_productor'][0]['EXISTE'] != 0) { ?>
          <!-- PRODUCTORES -->
          <div class="col-md-6 col-lg-3">
            <div class="widget-small warning coloured-icon"><i class="icon fa fa-user fa-3x"></i>
              <div class="info">
                <h4><a href="<?= base_url(); ?>/productor">Perfil de productor</a></h4>
              </div>
            </div>
          </div>
        <?php } ?>
      <?php } ?>
    </div>
    <!-- FIN DE FILA UNO -->
    <!-- INICIO FILA DOS -->
    <div class="row">
      <?php if (in_array($_SESSION['userData']['rol_id'], [1, 2, 4])) { ?>
        <!-- Productos -->
        <div class="col-md-6 col-lg-3">
          <div class="widget-small danger coloured-icon" style="  box-shadow: rgba(7, 7, 7, 0.1) 11px 9px 0px 0px;"><i class="icon fa fa-carrot fa-3x"></i>
            <div class="info">
              <h4><a href="<?= base_url(); ?>/producto">Productos</a></h4>
            </div>
          </div>
        </div>
      <?php } ?>
      <?php if (in_array($_SESSION['userData']['rol_id'], [1, 2])) { ?>
        <!-- Actividades -->
        <div class="col-md-6 col-lg-3">
          <div class="widget-small warning coloured-icon"><i class="icon fa fa-calendar fa-3x"></i>
            <div class="info">
              <h4><a href="<?= base_url(); ?>/actividad">Actividades</a></h4>
            </div>
          </div>
        </div>
        <!-- Donaciones -->
        <div class="col-md-6 col-lg-3">
          <div class="widget-small info coloured-icon"><i class="icon fa fa-money"></i>
            <div class="info">
              <h4><a href="<?= base_url(); ?>/donacion/DonacionAdmin">Donaciones</a></h4>
            </div>
          </div>
        </div>
        <!-- Anuncios -->
        <div class="col-md-6 col-lg-3">
          <div class="widget-small primary coloured-icon"><i class="icon fa fa-newspaper fa-3x"></i>
            <div class="info">
              <h4><a href="<?= base_url(); ?>/anuncio">Anuncios</a></h4>
            </div>
          </div>
        </div>
      <?php } ?>
      <?php if ($data['existe_productor'][0]['EXISTE'] == 0) { ?>
        <div class="col-md-6 col-lg-3">
          <div class="widget-small info coloured-icon"><i class="icon fa fa-user fa-3x"></i>
            <div class="info">
              <h4><a href="<?= base_url(); ?>/Productor/productorform">Volverme productor</a></h4>
            </div>
          </div>
        </div>
      <?php } ?>
    </div>
    <!-- FIN DE FILA DOS -->
    <?php if (in_array($_SESSION['userData']['rol_id'], [1, 2, 4])) { ?>
      <!-- INICIO FILA TRES -->
      <div class="row">
        <!-- AFILIACION -->
        <div class="col-md-6 col-lg-3">
          <div class="widget-small primary coloured-icon" style="  box-shadow: rgba(7, 7, 7, 0.1) 11px 9px 0px 0px;"><i class="icon fa fa-user-plus fa-3x"></i>
            <div class="info">
              <h4><a href="<?= base_url(); ?>/afiliado">Afiliación</a></h4>
            </div>
          </div>
        </div>
        <!-- HOME -->
        <div class="col-md-6 col-lg-3">
          <div class="widget-small danger coloured-icon" style="  box-shadow: rgba(7, 7, 7, 0.1) 11px 9px 0px 0px;"><i class="icon fa fa-home fa-3x"></i>
            <div class="info">
              <h4><a href="<?= base_url(); ?>/">Página principal</a></h4>
            </div>
          </div>
        </div>
      </div>
      <!-- FIN DE FILA TRES -->
    <?php } ?>
  </section>
</main>
<?php footerAdmin($data); ?>