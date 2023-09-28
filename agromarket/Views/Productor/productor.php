<?php
  headerAdmin($data);
  getModal('modalProductor',$data);
 ?>
<main class="app-content">
    <div class="row user">
        <div class="col-md-12">
            <div class="profile">
                <div class="info"><img class="user-img" src="<?= media();?>/images/avatar.png">
                
                </div>
                <div class="cover-image"></div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="tile p-0">
                <ul class="nav flex-column nav-tabs user-tabs">
                    <li class="nav-item"><a class="nav-link active" href="#user-timeline" data-toggle="tab">Datos
                            personales</a></li>
                </ul>
            </div>
        </div>
        <div class="col-md-9">
            <div class="tab-content">
                <div class="tab-pane active" id="user-timeline">
                    <div class="timeline-post">
                        <div class="post-media">
                            <div class="content">
                                <h5>DATOS PERSONALES <button class="btn btn-sm btn-info" type="button"
                                        onclick="openModalProductor();"><i class="fas fa-pencil-alt"
                                            aria-hidden="true"></i></button></h5>
                            </div>
                        </div>

                        <table class="table table-bordered">


                            <tbody>
                            
                                <?php foreach ($data['arrData'] as $productor): ?>
                                <tr>
                                <td style="width:150px;">ID:</td>
                                    <td><?php echo $productor['pdt_id']; ?></td>
                                </tr>
                                <tr>
                                <td style="width:150px;">NOMBRE:</td>
                                    <td><?php echo $productor['pdt_nombre']; ?></td>
                                </tr>
                                <tr>
                                <td style="width:150px;">Cédula:</td>
                                    <td><?php echo $productor['pdt_cedula']; ?></td>
                                </tr>
                                <tr>
                                <td style="width:150px;">UBI:</td>
                                    <td><?php echo $productor['pdt_ubicacion']; ?></td>
                                </tr>

                                <tr>
                                <td style="width:150px;">EST:</td>
                                    <td><?php echo $productor['pdt_estado']; ?></td>
                                </tr>


                                <?php endforeach; ?>
                            
                                <tr>
                                    <td colspan="5">No hay datos de productores disponibles.</td>
                                </tr>
                               

                            </tbody>



                        </table>
                    </div>
                </div>

                <div class="row mb-10">
                    <div class="col-md-12">
                        <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>
                            Guardar</button>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
    </div>
    </div>
</main>
<?php footerAdmin($data); ?>