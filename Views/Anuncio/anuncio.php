<?php
headerAdmin($data);
getModal('modalAnuncio', $data); // Cambiamos el modal de alimentación al de anuncios
?>
<div id="contentAjax"></div>
<main class="app-content">
    <div class="app-title">
        <div>
            <h1>
                <a href="<?= base_url(); ?>/anuncio" style="text-decoration: none;">
                    <i class="fas fa-bullhorn"></i> <?= $data['page_title'] ?> <!-- Cambiamos el icono y el título -->
                </a>

                <button class="btn btn-primary" type="button" onclick="openModal();"><i class="fas fa-plus-circle"></i> Nuevo</button>

            </h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url(); ?>/dashboard"><i class="fa fa-home fa-lg"></i></a></li>
            <li class="breadcrumb-item">Servicios / <a href="<?= base_url(); ?>/anuncio"><?= $data['page_title'] ?></a></li>
        </ul>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered" id="tableAnuncio"> <!-- Cambiamos el ID de la tabla -->
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Descripción</th> <!-- Cambiamos Nombre por Descripción -->
                                    <th>Tipo</th> <!-- Agregamos Tipo -->
                                    <th>Fecha Vigencia</th> <!-- Agregamos Fecha Vigencia -->
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