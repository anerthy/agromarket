<?php
headerAdmin($data);
$arrModulos =  $data['modulos'];
?>

<main class="app-content">
  <div class="app-title">
    <div>
      <h1>
        <a href="<?= base_url(); ?>/dashboard" style="text-decoration: none;">  
          <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAB4AAAAeCAYAAAA7MK6iAAAAAXNSR0IArs4c6QAAANZJREFUSEvtV8ENgzAQM5u0m8AmZbKyCd2EblJkRKsQaHxFJyWVchKv+DC+XJyjQaZoMvGiKOILAD6peESLKifGHyp+Gco/AOhX3B3ATeQ8AVxDTFzqFsBoIKaCbsURzzwVxH+UV+Ja6m8N81fNxePEY7WER1fTPNgbKdNhhTYm4kGszu/hejHELNdkkBBapuUISsskpzJ8YsL9crFMg9gdxI04m+Jfr0UXxZZGee9xvRZVY9ZBYFOhM87FQY8Dn4rk7XTGuSw5pvFWfbnLelF/Ei6K1EtmBBlUHyr3vLcAAAAASUVORK5CYII=" />
          <?= $data['page_tag'] ?>
        </a>
      </h1>
    </div>
    <ul class="app-breadcrumb breadcrumb">
      <li class="breadcrumb-item"><a href="<?= base_url(); ?>/dashboard"><i class="fa fa-home fa-lg"></i></a></li>
      <li class="breadcrumb-item"><a href="<?= base_url(); ?>/dashboard"><?= $data['page_title'] ?></a></li>
    </ul>
  </div>
  <section>
    <div class="row">
      <?php if (!empty($_SESSION['permisos'][3]['ver'])) { ?>
        <div class="col-md-6 col-lg-3">
          <div class="widget-small primary coloured-icon"><i class="icon fa fa-users fa-3x"></i>

            <div class="info">
              <h4><a href="<?= base_url(); ?>/usuarios">Usuarios</a></h4>
              <p><b> <?= $arrModulos[0]['Registros'] ?></b></p>
            </div>
          </div>
        </div>
      <?php } ?>

      <?php if (!empty($_SESSION['permisos'][2]['ver'])) { ?>
        <div class="col-md-6 col-lg-3">
          <div class="widget-small info coloured-icon"><i class="icon fa fa-gear fa-3x"></i>
            <div class="info">
              <h4><a href="<?= base_url(); ?>/roles">Roles</a></h4>
              <p><b> <?= $arrModulos[1]['Registros'] ?></b></p>
            </div>
          </div>
        </div>
      <?php } ?>

      <?php if (!empty($_SESSION['permisos'][4]['ver'])) { ?>
        <div class="col-md-6 col-lg-3">
          <div class="widget-small warning coloured-icon"><i class="icon fa fa-building fa-3x"></i>
            <div class="info">
              <h4><a href="<?= base_url(); ?>/grupo">Grupos organizados</a></h4>
              <p><b> <?= $arrModulos[2]['Registros'] ?></b></p>
            </div>
          </div>
        </div>
      <?php } ?>

      <?php if (!empty($_SESSION['permisos'][5]['ver'])) { ?>
        <div class="col-md-6 col-lg-3">
          <div class="widget-small danger coloured-icon"><i class="icon fa fa-city fa-3x"></i>
            <div class="info">
              <h4><a href="<?= base_url(); ?>/comunidad">Comunidades</a></h4>
              <p><b> <?= $arrModulos[3]['Registros'] ?></b></p>
            </div>
          </div>
        </div>
      <?php } ?>
    </div>

    <div class="row">
      <?php if (!empty($_SESSION['permisos'][6]['ver'])) { ?>
        <div class="col-md-6 col-lg-3">
          <div class="widget-small info coloured-icon"><i class="icon fa fa-utensils fa-3x"></i>
            <div class="info">
              <h4><a href="<?= base_url(); ?>/alimentacion">Alimentaciones</a></h4>
              <p>
                <b><?= $arrModulos[4]['Registros'] ?></b>
                <?php
                if (
                  $arrModulos[4]['Pendientes'] > 0 &&
                  (in_array($_SESSION['userData']['id_rol'], [1, 2, 3]))
                ) {
                ?>
                  <span class="badge badge-warning" title="Hay <?= $arrModulos[4]['Pendientes'] ?> registros pendientes de revisar!">
                    <i class="fas fa-exclamation"></i>
                  </span>
                <?php
                }
                ?>
              </p>
            </div>
          </div>
        </div>
      <?php } ?>

      <?php if (!empty($_SESSION['permisos'][8]['ver'])) { ?>
        <div class="col-md-6 col-lg-3">
          <div class="widget-small warning coloured-icon"><i class="icon fa fa-home fa-3x"></i>
            <div class="info">
              <h4><a href="<?= base_url(); ?>/hospedaje">Hospedajes</a></h4>
              <p>
                <b><?= $arrModulos[5]['Registros'] ?></b>
                <?php
                if (
                  $arrModulos[5]['Pendientes'] > 0 &&
                  (in_array($_SESSION['userData']['id_rol'], [1, 2, 3]))
                ) {
                ?>
                  <span class="badge badge-warning" title="Hay <?= $arrModulos[5]['Pendientes'] ?> registros pendientes de revisar!">
                    <i class="fas fa-exclamation"></i>
                  </span>
                <?php
                }
                ?>
              </p>
            </div>
          </div>
        </div>
      <?php } ?>

      <?php if (!empty($_SESSION['permisos'][9]['ver'])) { ?>
        <div class="col-md-6 col-lg-3">
          <div class="widget-small danger coloured-icon"><i class="icon fa fa-car fa-3x"></i>
            <div class="info">
              <h4><a href="<?= base_url(); ?>/transporte">Transportes</a></h4>
              <p>
                <b><?= $arrModulos[6]['Registros'] ?></b>
                <?php
                if (
                  $arrModulos[6]['Pendientes'] > 0 &&
                  (in_array($_SESSION['userData']['id_rol'], [1, 2, 3]))
                ) {
                ?>
                  <span class="badge badge-warning" title="Hay <?= $arrModulos[6]['Pendientes'] ?> registros pendientes de revisar!">
                    <i class="fas fa-exclamation"></i>
                  </span>
                <?php
                }
                ?>
              </p>
            </div>
          </div>
        </div>
      <?php } ?>

      <?php if (!empty($_SESSION['permisos'][7]['ver'])) { ?>
        <div class="col-md-6 col-lg-3">
          <div class="widget-small primary coloured-icon"><i class="icon fa fa-walking fa-3x"></i>
            <div class="info">
              <h4><a href="<?= base_url(); ?>/tour">Tours</a></h4>
              <p>
                <b><?= $arrModulos[7]['Registros'] ?></b>
                <?php
                if (
                  $arrModulos[7]['Pendientes'] > 0 &&
                  (in_array($_SESSION['userData']['id_rol'], [1, 2, 3]))
                ) {
                ?>
                  <span class="badge badge-warning" title="Hay <?= $arrModulos[7]['Pendientes'] ?> registros pendientes de revisar!">
                    <i class="fas fa-exclamation"></i>
                  </span>
                <?php
                }
                ?>
              </p>
            </div>
          </div>
        </div>
      <?php } ?>
    </div>

    <div class="row">
      <?php if (!empty($_SESSION['permisos'][10]['ver'])) { ?>
        <div class="col-md-6 col-lg-3">
          <div class="widget-small warning coloured-icon"><i class="icon fa fa-user fa-3x"></i>

            <div class="info">
              <h4><a href="<?= base_url(); ?>/voluntario">Voluntarios</a></h4>
              <p>
                <b><?= $arrModulos[8]['Registros'] ?></b>
                <?php
                if (
                  $arrModulos[8]['Pendientes'] > 0 &&
                  (in_array($_SESSION['userData']['id_rol'], [1, 2, 3]))
                ) {
                ?>
                  <span class="badge badge-warning" title="Hay <?= $arrModulos[8]['Pendientes'] ?> registros pendientes de revisar!">
                    <i class="fas fa-exclamation"></i>
                  </span>
                <?php
                }
                ?>
              </p>
            </div>
          </div>
        </div>
      <?php } ?>

      <?php if (!empty($_SESSION['permisos'][11]['ver'])) { ?>
        <div class="col-md-6 col-lg-3">
          <div class="widget-small danger coloured-icon"><i class="icon fa fa-file fa-3x"></i>
            <div class="info">
              <h4><a href="<?= base_url(); ?>/contenido">Contenidos</a></h4>
              <p><b> <?= $arrModulos[9]['Registros'] ?></b></p>
            </div>
          </div>
        </div>
      <?php } ?>

      <?php if (!empty($_SESSION['permisos'][12]['ver'])) { ?>
        <div class="col-md-6 col-lg-3">
          <div class="widget-small primary coloured-icon"><i class="icon fa fa-image fa-3x"></i>
            <div class="info">
              <h4><a href="<?= base_url(); ?>/galeria">Galeria</a></h4>
              <p><b> <?= $arrModulos[10]['Registros'] ?></b></p>
            </div>
          </div>
        </div>
      <?php } ?>
      <div class="col-md-6 col-lg-3">
        <div class="widget-small info coloured-icon"><i class="icon fa fa-home fa-3x"></i>
          <div class="info">
            <h4><a href="<?= base_url(); ?>">Página principal</a></h4>
          </div>
        </div>
      </div>
    </div>
  </section>
</main>
<?php footerAdmin($data); ?>