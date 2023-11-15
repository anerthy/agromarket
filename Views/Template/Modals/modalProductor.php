<!-- Modal -->
<div class="modal fade" id="modalFormProductor" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header headerUpdate">
                <h5 class="modal-title" id="titleModal">Actualizar Datos</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="formPerfil" name="formPerfil" class="form-horizontal">
                    <p class="text-primary">Los campos con asterisco (<span class="required">*</span>) son obligatorios.
                    </p>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <!-- <label for="txtCedula">Cédula <span class="required">*</span></label>
                  <input type="text" class="form-control" id="txtCedula" name="txtCedula" value="<?= $_SESSION['userData']['cedula']; ?>" required=""> -->
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="txtNombre">Nombre <span class="required">*</span></label>
                            <input type="text" class="form-control valid validText" id="txtNombre" name="txtNombre"
                                value="<?= isset($_SESSION['userData']['nombre']) ? $_SESSION['userData']['nombre'] : ''; ?>"
                                required="">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="txtUbicacion">Ubicacion <span class="required">*</span></label>
                            <input type="text" class="form-control valid validText" id="txtUbicacion"
                                name="txtUbicacion"
                                value="<?= isset($_SESSION['userData']['ubicacion']) ? $_SESSION['userData']['ubicacion'] : ''; ?>"
                                required="">
                        </div>

                    </div>

                    <div class="tile-footer">
                        <button id="btnActionForm" class="btn btn-info" type="submit"><i
                                class="fa fa-fw fa-lg fa-check-circle"></i><span
                                id="btnText">Actualizar</span></button>&nbsp;&nbsp;&nbsp;
                        <button class="btn btn-danger" type="button" data-dismiss="modal"><i
                                class="fa fa-fw fa-lg fa-times-circle"></i>Cerrar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>