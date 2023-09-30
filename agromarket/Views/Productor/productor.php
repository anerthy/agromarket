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
                <div class="info">
                    <img class="user-img" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSR6uEHi2L1HNWSAF99KaXalj_S1HfyvTjzKw&usqp=CAU" alt="Foto de perfil">
                </div>
                <div class="cover-image" style="background-image: url('https://marketplace.canva.com/EAE8BWK0q3g/1/0/1600w/canva-fondo-de-pantalla-frutas-y-verduras-kawaii-naranja-Rtvd067L36k.jpg');">
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="tile p-0">
                <ul class="nav flex-column nav-tabs user-tabs">
                    <li class="nav-item"><a class="nav-link active" href="#personal-info-tab" data-toggle="tab">Datos
                            personales</a></li>
                    <li class="nav-item"><a class="nav-link" href="#payment-methods-tab" data-toggle="tab">Métodos de
                            pago</a></li>
                </ul>
            </div>
        </div>
        <div class="col-md-9">
            <div class="tab-content">
                <div class="tab-pane active" id="personal-info-tab">
                    <!-- Contenido de la pestaña "Datos personales" -->
                    <h5 class="mb-4">DATOS PERSONALES <button class="btn btn-sm btn-info" type="button" onclick="openModalProductor();"><i class="fas fa-pencil-alt" aria-hidden="true"></i></button></h5>
                    <div class="table-responsive">
                        <table id="personal-info-table" class="table table-striped table-bordered table-light table-sm">
                            <!-- Agrega la clase table-sm para reducir el tamaño de la tabla -->
                            <thead>
                                <tr>
                                    <th>NOMBRE</th>
                                    <th>CÉDULA</th>
                                    <th>UBICACIÓN</th>
                                    <th>ESTADO</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($data['arrData'] as $productor) : ?>
                                    <tr>
                                        <td><?php echo $productor['pdt_nombre']; ?></td>
                                        <td><?php echo $productor['per_cedula']; ?></td>
                                        <td><?php echo $productor['pdt_ubicacion']; ?></td>
                                        <td><?php echo $productor['pdt_estado']; ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="tab-pane" id="payment-methods-tab">
                    <!-- Contenido de la pestaña "Métodos de pago" -->
                    <h5 class="mb-4">MÉTODOS DE PAGO <button class="btn btn-sm btn-info" type="button" onclick="openModalProductor();"><i class="fas fa-pencil-alt" aria-hidden="true"></i></button></h5>
                    <div class="table-responsive">
                        <table id="payment-methods-table" class="table table-striped table-bordered table-light table-sm">
                            <!-- Agrega la clase table-sm para reducir el tamaño de la tabla -->
                            <thead>
                                <tr>
                                    <th>Sinpe Móvil</th>
                                    <th>Transferencia bancaria</th>
                                    <th>Paypal</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th>55555555</th>
                                    <th>502568742024110</th>
                                    <th>persona@hotmail.com</th>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row mb-10">
                <div class="col-md-12">
                </div>
            </div>
        </div>
    </div>
</main>



<script>
    // Inicializar DataTable en las tablas
    $(document).ready(function() {
        $('#personal-info-table').DataTable();
        $('#payment-methods-table').DataTable();
    });
</script>

<?php footerAdmin($data); ?>