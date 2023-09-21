<!-- Modal -->
<div class="modal fade" id="modalFormAnuncio" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header headerRegister">
                <h5 class="modal-title" id="titleModal">Nuevo Anuncio</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="tile">
                    <div class="tile-body">
                        <form id="formAnuncio" name="formAnuncio">
                            <input type="hidden" id="anu_id" name="anu_id" value="">
                            <input type="hidden" id="foto_actual" name="foto_actual" value="">
                            <input type="hidden" id="foto_remove" name="foto_remove" value="0">
                            <div class="form-group">
                                <label class="control-label">Descripción</label>
                                <textarea class="form-control" id="txtDescripcion" name="txtDescripcion" rows="2" placeholder="Descripción del anuncio" required=""></textarea>
                            </div>

                            <div class="form-group">
                                <label class="control-label">Tipo</label>
                                <input class="form-control" id="txtTipo" name="txtTipo" type="text" placeholder="Tipo de anuncio" required="">
                            </div>
                            <div class="form-group">
    <label class="control-label">Fecha Vigencia</label>
    <input class="form-control" id="txtFechaVigencia" name="txtFechaVigencia" type="date" required="">
</div>


<div class="form-group" id="selectEstado">
    <label for="listEstado">Estado</label>
    <select class="form-control" id="listEstado" name="listEstado" required="">
        <option value="Activo">Activo</option>
        <option value="Inactivo">Inactivo</option>
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
<div class="modal fade" id="modalViewAnuncio" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header header-primary">
                <h5 class="modal-title" id="titleModal">Datos del anuncio</h5>
                <button type="button" class="close" data-dismiss="modal" data-toggle="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <td>Id:</td>
                            <td id="celId"></td>
                        </tr>
                        <tr>
                            <td>Descripción:</td>
                            <td id="celDescripcion"></td>
                        </tr>
                        <tr>
                            <td>Tipo:</td>
                            <td id="celTipo"></td>
                        </tr>
                        <tr>
                            <td>fecha:</td>
                            <td id="celFechaVigencia"></td>
                        </tr>
                        <tr>
                            <td>Estado:</td>
                            <td id="celEstado"></td> <!-- Agrega esta fila para mostrar el estado -->
                        </tr>
                        <tr>
                            <td>Imagen:</td>
                            <td id="imgAnuncio"></td>
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
