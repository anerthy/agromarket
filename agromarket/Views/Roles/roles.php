<?php
headerAdmin($data);
getModal('modalRoles', $data);
?>
<div id="contentAjax"></div>
<main class="app-content">
  <div class="app-title">
    <div>
      <h1>
      <a href="<?= base_url(); ?>/roles" style="text-decoration: none;">
        <i class="fa fa-gear"></i> <?= $data['page_title'] ?>
      </a>
        <?php if ($_SESSION['permisosMod']['agregar']) { ?>
          <button class="btn btn-primary" type="button" onclick="openModal();"><i class="fas fa-plus-circle"></i> Nuevo</button>
        <?php } ?>
      </h1>
    </div>
    <ul class="app-breadcrumb breadcrumb">
      <li class="breadcrumb-item"><a href="<?= base_url(); ?>/dashboard"><i class="fa fa-home fa-lg"></i></a></li>
      <li class="breadcrumb-item">Seguridad / <a href="<?= base_url(); ?>/roles"><?= $data['page_title'] ?></a></li>
    </ul>
  </div>

  <div class="row">
    <div class="col-md-12">
      <div class="tile">
        <div class="tile-body">
          <div class="table-responsive">
            <table class="table table-hover table-bordered" id="tableRoles">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Nombre</th>
                  <th>Descripción</th>
                  <th>Estado</th>
                  <th>Acciones</th>
                </tr>
              </thead>
              <tbody>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>
<?php footerAdmin($data); ?>