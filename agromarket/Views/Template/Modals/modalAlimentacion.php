<!-- Modal -->
<div class="modal fade" id="modalFormAlimentacion" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header headerRegister">
                <h5 class="modal-title" id="titleModal">Nueva Alimentacion</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="tile">
                    <div class="tile-body">
                        <form id="formAlimentacion" name="formAlimentacion">
                            <input type="hidden" id="alim_id" name="alim_id" value="">
                            <input type="hidden" id="foto_actual" name="foto_actual" value="">
                            <input type="hidden" id="foto_remove" name="foto_remove" value="0">
                            <div class="form-group">
                                <label class="control-label">Nombre</label>
                                <input class="form-control" id="txtNombre" name="txtNombre" type="text" placeholder="Nombre de la alimentación" required="">
                            </div>

                            <div class="form-group">
                                <label class="control-label">Descripción</label>
                                <textarea class="form-control" id="txtDescripcion" name="txtDescripcion" rows="2" placeholder="Descripción de la alimentación" required=""></textarea>
                            </div>

                            <div class="form-group">
                                <label class="control-label">Dirección</label>
                                <textarea class="form-control" id="txtDireccion" name="txtDireccion" rows="2" placeholder="Dirección de la alimentación" required=""></textarea>
                            </div>

                            <div class="form-group">
                                <label class="control-label">Hora de apertura</label>
                                <input type="time" class="form-control" id="txtHoraApertura" name="txtHoraApertura" rows="2" placeholder="Hora de apertura" required="">
                            </div>

                            <div class="form-group">
                                <label class="control-label">Hora de cierre</label>
                                <input type="time" class="form-control" id="txtHoraCierre" name="txtHoraCierre" rows="2" placeholder="Hora de cierre" required="">
                            </div>

                            <div class="form-group">
                                <label class="control-label">Teléfono</label>
                                <input class="form-control valid validNumber" maxlength="8" id="txtTelefono" name="txtTelefono" rows="2" placeholder="Teléfono del servicio de alimentación" required="" onkeypress="return controlTag(event);">
                            </div>

                            <div class="form-group" id="selectEstado" style="display: none">
                                <label for="exampleSelect1">Estado</label>
                                <select class="form-control" id="listEstado" name="listEstado" required="">
                                    <option value="2">Activo</option>
                                    <option value="3">Inactivo</option>
                                </select>
                            </div>
                            
                            <div class="form-row">
                                <div class="col-md-6">
                                    <div class="photo">
                                        <label for="foto">Imagen</label>
                                        <div class="prevPhoto">
                                            <span class="delPhoto notBlock">X</span>
                                            <label for="foto"></label>
                                            <div>
                                                <img id="img" src="<?= media(); ?>/images/uploads/imageUnavailable.png">
                                            </div>
                                        </div>
                                        <div class="upimg">
                                            <input type="file" name="foto" id="foto">
                                        </div>
                                        <div id="form_alert"></div>
                                    </div>
                                </div>
                            </div>

                            <div id="tile-footer" class="tile-footer">
                                <br>
                                <button id="btnActionForm" class="btn btn-primary" type="submit">
                                    <i class="fa fa-fw fa-lg fa-check-circle"></i>
                                    <span id="btnText">Guardar</span>
                                </button>&nbsp;&nbsp;&nbsp;
                                <a class="btn btn-secondary" href="#" data-dismiss="modal">
                                    <i class="fa fa-fw fa-lg fa-times-circle"></i>Cancelar
                                </a>
                            </div>
                            <div id="optionButtons"></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modalViewAlimentacion" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog ">
        <div class="modal-content  ">
            <div class="modal-header header-primary">
                <h5 class="modal-title" id="titleModal">Datos de la alimentación</h5>
                <button type="button" class="close" data-dismiss="modal" data-toggle="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body ">
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <td>Id:</td>
                            <td id="celId"></td>
                        </tr>
                        <tr>
                            <td>Nombre:</td>
                            <td id="celNombre"></td>
                        </tr>
                        <tr>
                            <td>Descripción:</td>
                            <td id="celDescripcion"></td>
                        </tr>
                        <tr>
                            <td>Dirección:</td>
                            <td id="celDireccion"></td>
                        </tr>
                        <tr>
                            <td>Hora de apertura:</td>
                            <td id="celHoraApertura"></td>
                        </tr>
                        <tr>
                            <td>Hora de cierre:</td>
                            <td id="celHoraCierre"></td>
                        </tr>
                        <tr>
                            <td>Teléfono:</td>
                            <td id="celTelefono"></td>
                        </tr>

                        <tr>
                            <td>Estado:</td>
                            <td id="celEstado"></td>
                        </tr>

                        <tr>
                            <td>Imagen:</td>
                            <td id="imgAlimentacion"></td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>