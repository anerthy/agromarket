<?php
headerAdmin($data);
?>
<div id="contentAjax"></div>
<main class="app-content">
    <div class="app-title">
        <div>
            <h1>
                <a href="<?= base_url(); ?>/donacion/DonacionAdmin" style="text-decoration: none;">
                <i class="fas fa-dollar-sign"></i> <?= $data['page_title'] ?>
                </a>


            </h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><a href="<?= base_url(); ?>/dashboard"><i class="fa fa-home fa-lg"></i></a></li>
            <li class="breadcrumb-item"> <a
                    href="<?= base_url(); ?>/donacion/DonacionAdmin"><?= $data['page_title'] ?></a></li>
        </ul>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    <div class="table-responsive">
                        <table class="table table-hover table-bordered" id="tableDonacion">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Descripción</th>
                                    <th>Medio</th>
                                    <th>Información</th>
                                    <th>Estado</th>
                                </tr>
                            </thead>
                            
                            <tbody>
                            <?php foreach ($data['arrData'] as $donacion): ?>
                                <tr>
                                    <td><?php echo $donacion['don_id']; ?></td>
                                    <td><?php echo $donacion['don_descripcion']; ?></td>
                                    <td><?php echo $donacion['don_medio']; ?></td>
                                    <td><?php echo $donacion['don_informacion']; ?></td>
                                    <td><?php echo $donacion['don_estado']; ?></td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<?php footerAdmin($data); ?>