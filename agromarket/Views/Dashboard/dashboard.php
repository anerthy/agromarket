<?php
headerAdmin($data);
// $arrModulos =  $data['modulos'];
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
      <!-- PRODUCTORES -->
      <div class="col-md-6 col-lg-3">
        <div class="widget-small warning coloured-icon"><i class="icon fa fa-user fa-3x"></i>
          <div class="info">
            <h4><a href="<?= base_url(); ?>/productor">Productores</a></h4>
          </div>
        </div>
      </div>
    </div>
    <!-- FIN DE FILA UNO -->

    <!-- INICIO FILA DOS -->
    <div class="row">
      <!-- Productos -->
      <div class="col-md-6 col-lg-3">
        <div class="widget-small danger coloured-icon" style="  box-shadow: rgba(7, 7, 7, 0.1) 11px 9px 0px 0px;"><i class="icon fa fa-carrot fa-3x"></i>
          <div class="info">
            <h4><a href="<?= base_url(); ?>/producto">Productos</a></h4>
          </div>
        </div>
      </div>
      <!-- Actividades -->
      <div class="col-md-6 col-lg-3">
        <div class="widget-small warning coloured-icon"><i class="icon fa fa-calendar fa-3x"></i>
          <div class="info">
            <h4><a href="<?= base_url(); ?>/rol">Actividades</a></h4>
          </div>
        </div>
      </div>
      <!-- Donaciones -->
      <div class="col-md-6 col-lg-3">
        <div class="widget-small info coloured-icon"><i class="icon fa fa-money"></i>
          <div class="info">
            <h4><a href="<?= base_url(); ?>/donacion_admin">Donaciones</a></h4>
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
      <div class="col-md-6 col-lg-3">
        <div class="widget-small info coloured-icon"><i class="icon fa fa-home fa-3x"></i>
          <div class="info">
            <h4><a href="<?= base_url(); ?>/Productor/productorform">Perfil</a></h4>
          </div>
        </div>
      </div>

      
    </div>
    <!-- FIN DE FILA DOS -->
  </section>
</main>
<?php footerAdmin($data); ?>
