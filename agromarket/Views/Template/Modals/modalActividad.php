<!-- Modal -->
<div class="modal fade" id="modalFormActividad" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header headerRegister">
                <h5 class="modal-title" id="titleModal">Nueva Actividad</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="tile">
                    <div class="tile-body">
                        <form id="formActividad" name="formActividad">
                            <input type="hidden" id="act_id" name="act_id" value="">
                            <input type="hidden" id="foto_actual" name="foto_actual" value="">
                            <input type="hidden" id="foto_remove" name="foto_remove" value="0">
                            <div class="form-group">
                                <label class="control-label">Nombre</label>
                                <input class="form-control" id="txtNombre" name="txtNombre" type="text" placeholder="Nombre de la actividad" required="">
                            </div>

                            <div class="form-group">
                                <label class="control-label">Descripción</label>
                                <textarea class="form-control" id="txtDescripcion" name="txtDescripcion" rows="2" placeholder="Descripción de la actividad" required=""></textarea>
                            </div>

                            <div class="form-group">
                                <label class="control-label">Lugar</label>
                                <input class="form-control" id="txtLugar" name="txtLugar" type="text" placeholder="Lugar de la actividad" required="">
                            </div>

                            <div class="form-group">
                                <label class="control-label">Categoría</label>
                                <input class="form-control" id="txtCategoria" name="txtCategoria" type="text" placeholder="Categoría de la actividad" required="">
                            </div>

                            <div class="form-group">
                                <label class="control-label">Fecha</label>
                               
                                <input class="form-control" id="txtFecha" name="txtFecha" type="date" required="">
                            </div>

  

                            

                            <div class="form-group" id="selectEstado" style="display: none">
                                <label for="exampleSelect1">Estado</label>
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
<div class="modal fade" id="modalViewActividad" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog ">
        <div class="modal-content  ">
            <div class="modal-header header-primary">
                <h5 class="modal-title" id="titleModal">Datos de la actividad</h5>
                <button type="button" class="close" data-dismiss="modal" data-toggle="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body ">
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <td>ID:</td>
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
                            <td>Fecha:</td>
                            <td id="celFecha"></td>
                        </tr>
                        <tr>
                            <td>Lugar:</td>
                            <td id="celLugar"></td>
                        </tr>
                        <tr>
                            <td>Categoria:</td>
                            <td id="celCategoria"></td>
                        </tr>
                        <tr>
                            <td>Estado:</td>
                            <td id="celEstado"></td>
                        </tr>
                        <tr>
                            <td>Imagen:</td>
                            <td id="imgActividad"></td>
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
