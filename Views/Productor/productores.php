<?php
headerAdmin($data);
getModal('modalPersona', $data);
?>
<div id="contentAjax"></div>
<main class="app-content">
    <div class="app-title">
        <div>
            <h1>
                <a href="<?= base_url(); ?>/persona" style="text-decoration: none;">
                    <i class="fas fa-user"></i> <?= $data['page_title'] ?>
                </a>
            </h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url(); ?>/dashboard"><i class="fa fa-home fa-lg"></i></a></li>
            <li class="breadcrumb-item"><a href="<?= base_url(); ?>/productor/listado"><?= $data['page_title'] ?></a></li>
        </ul>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered" id="tablePersonas">
                            <thead>
                                <tr>
                                    <th>Cedula</th>
                                    <th>Productor</th>
                                    <th>Nombre</th>
                                    <th>Ubicacion</th>
                                    <th>Teléfono</th>
                                    <th>Estado</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<?php footerAdmin($data); ?>