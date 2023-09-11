
<!-- Modal -->
<div class="modal fade" id="modalFormTransporte" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header headerRegister">
        <h5 class="modal-title" id="titleModal">Nuevo transporte</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      
      <div class="modal-body">
        <div class="tile">
          <div class="tile-body">
            <form id="formTransporte" name="formTransporte">
              <input type="hidden" id="trans_id" name="trans_id" value="">
              <input type="hidden" id="foto_actual" name="foto_actual" value="">
              <input type="hidden" id="foto_remove" name="foto_remove" value="0">
              
              <div class="form-group">
                <label class="control-label">Nombre</label>
                <input class="form-control" id="txtNombre" name="txtNombre" type="text" placeholder="Nombre" required="">
              </div>

              <div class="form-group">
                <label class="control-label">Descripción</label>
                <textarea class="form-control" id="txtDescripcion" name="txtDescripcion" rows="2" placeholder="Descripción del transporte" required=""></textarea>
              </div>

              <div class="form-group">
                <label for="exampleSelect1">Clase</label>
                <select class="form-control" id="txtClase" name="txtClase" required="">
                  <option value="Publico">Publico</option>
                  <option value="Privado">Privado</option>
                </select>
              </div>

              <div class="form-group">
                <label for="exampleSelect1">Tipo</label>
                <select class="form-control" id="txtTipo" name="txtTipo" required="">
                  <option value="Terrestre">Terrestre</option>
                  <option value="Maritimo">Marítimo</option>
                </select>
              </div>

              <div class="form-group">
                <label class="control-label">Disponibilidad</label>
                <textarea class="form-control" id="txtDisponibilidad" name="txtDisponibilidad" rows="2" placeholder="Disponibilidad" required=""></textarea>
              </div>

              <div class="form-group">
                <label class="control-label">Teléfono</label>
                <input class="form-control valid validNumber" minlength="8" maxlength="8" id="txtTelefono" name="txtTelefono" rows="2" placeholder="Teléfono del transporte" required="" onkeypress="return controlTag(event);">
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
                        <img id="img" src="<?= media(); ?>/images/uploads/transportes/imageUnavailable.png">
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
<div class="modal fade" id="modalViewTransporte" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog ">
    <div class="modal-content  ">
      <div class="modal-header header-primary">
        <h5 class="modal-title" id="titleModal">Datos de transporte</h5>
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
            <td>Clase:</td>
              <td id="celClase"> </td>
            </tr>
            <tr>
              <td>Tipo:</td>
              <td id="celTipo"> </td>
            </tr>
            <tr>
              <td>Disponibilidad:</td>
              <td id="celDisponibilidad"> </td>
            </tr>
            <td>Teléfono:</td>
              <td id="celTelefono"> </td>
            </tr>
            <tr>
            <tr>
              <td>Estado:</td>
              <td id="celEstado"> </td>
            </tr>
            <tr>
              <td>Imagen:</td>
              <td id="imgTransporte"></td>
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