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
                            <input type="hidden" id="COD_ACTIVIDAD" name="COD_ACTIVIDAD" value="">
                            <input type="hidden" id="IMG_ACTIVIDAD" name="IMG_ACTIVIDAD" value="">
                            <div class="form-group">
                                <label class="control-label">Nombre</label>
                                <input class="form-control" id="NOM_ACTIVIDAD" name="NOM_ACTIVIDAD" type="text" placeholder="Nombre de la actividad" required="">
                            </div>

                            <div class="form-group">
                                <label class="control-label">Descripción</label>
                                <textarea class="form-control" id="DES_ACTIVIDAD" name="DES_ACTIVIDAD" rows="2" placeholder="Descripción de la actividad" required=""></textarea>
                            </div>

                            <div class="form-group">
                                <label class="control-label">Lugar</label>
                                <input class="form-control" id="ACT_LUGAR" name="ACT_LUGAR" type="text" placeholder="Lugar de la actividad" required="">
                            </div>

                            <div class="form-group">
                                <label class="control-label">Categoría</label>
                                <input class="form-control" id="ACT_CATEGORIA" name="ACT_CATEGORIA" type="text" placeholder="Categoría de la actividad" required="">
                            </div>

                            <div class="form-group">
                                <label class="control-label">Hora de inicio</label>
                                <input type="datetime-local" class="form-control" id="FEC_ACTIVIDAD" name="FEC_ACTIVIDAD" placeholder="Fecha y hora de inicio" required="">
                            </div>

                            <div class="form-group" id="selectEstado" style="display: none">
                                <label for="exampleSelect1">Estado</label>
                                <select class="form-control" id="IND_ESTADO" name="IND_ESTADO" required="">
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
                            <td id="celCOD_ACTIVIDAD"></td>
                        </tr>
                        <tr>
                            <td>Nombre:</td>
                            <td id="celNOM_ACTIVIDAD"></td>
                        </tr>
                        <tr>
                            <td>Descripción:</td>
                            <td id="celDES_ACTIVIDAD"></td>
                        </tr>
                        <tr>
                            <td>Lugar:</td>
                            <td id="celACT_LUGAR"></td>
                        </tr>
                        <tr>
                            <td>Categoría:</td>
                            <td id="celACT_CATEGORIA"></td>
                        </tr>
                        <tr>
                            <td>Fecha y hora de inicio:</td>
                            <td id="celFEC_ACTIVIDAD"></td>
                        </tr>
                        <tr>
                            <td>Estado:</td>
                            <td id="celIND_ESTADO"></td>
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
