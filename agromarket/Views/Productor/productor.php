<?php
headerAdmin($data);
getModal('modalProductor', $data);
?>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="Assets/js/functions_productor.js"></script> <!-- Tu script que utiliza jQuery -->

<main class="app-content">
    <div class="row user">
        <div class="col-md-12">
            <div class="profile">
           
             
                </div>
            </div>
        </div>

        <div class="col-md-9">
            <div class="tab-content">
                <div class="tab-pane active" id="personal-info-tab">
                    <!-- Contenido de la pestaña "Datos personales" -->
                    <h5 class="mb-4">
                        DATOS PERSONALES
                        <button class="btn btn-sm btn-info" onclick="fntEditProductor()">
                            Editar
                        </button>
                    </h5>
                </div>
            </div>
            <div class="row mb-10">
                <div class="col-md-12">
                </div>
            </div>
        </div>
    </div>
    <?php foreach ($data['arrData'] as $productor) : ?>
        <section style="background-color: #eee;">
            <div class="container py-5">
                <div class="row">
                    <div class="col">
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-4">
                        <div class="card mb-4">
                            <div class="card-body text-center">

                                <img src="<?php echo  media() . '/images/uploads/productores/' . $productor['pdt_imagen']; ?>" alt="Foto">

                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="card mb-4">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Nombre</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0"><?php echo $productor['pdt_nombre']; ?></p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Cedula</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0"><?php echo $productor['per_cedula']; ?></p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Ubicacion</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0"><?php echo $productor['pdt_ubicacion']; ?></p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Estado</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0"><?php echo $productor['pdt_estado']; ?></p>
                                    </div>
                                </div>
                                <hr>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    <?php endforeach; ?>
</main>

<?php footerAdmin($data); ?>