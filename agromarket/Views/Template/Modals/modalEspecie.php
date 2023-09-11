<!-- Modal -->
<div class="modal fade" id="modalFormEspecie" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header headerRegister">
        <h5 class="modal-title" id="titleModal">Nuevo Especie</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="tile">
          <div class="tile-body">
            <form id="formEspecie" name="formEspecie">
              <input type="hidden" id="esp_id" name="esp_id" value="">
              <input type="hidden" id="foto_actual" name="foto_actual" value="">
              <input type="hidden" id="foto_remove" name="foto_remove" value="0">
              
              <div class="form-group">
                <label class="control-label">Nombre Científico</label>
                <input class="form-control" id="txtNombreCientifico" name="txtNombreCientifico" type="text" placeholder="Nombre científico" required="">
              </div>

              <div class="form-group">
                <label class="control-label">Nombre Común</label>
                <input class="form-control" id="txtNombreComun" name="txtNombreComun" type="text" placeholder="Nombre común" required="">
              </div>

              <div class="form-group">
                <label class="control-label">Descripción</label>
                <textarea class="form-control" id="txtDescripcion" name="txtDescripcion" rows="2" placeholder="Descripción sobre la especie" required=""></textarea>
              </div>

              <div class="form-group" id="selectEstado" style="display: block">
                  <label for="exampleSelect1">Estado</label>
                  <select class="form-control" id="listEstado" name="listEstado" required="">
                      <option value="2">Activo</option>
                      <option value="3">Inactivo</option>
                  </select>
              </div>

              <div class="form-row">

                <div class="col-md-6">
                  <div class="photo">
                    <label for="foto">Foto (570x380)</label>
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

              <div class="tile-footer">
                <button id="btnActionForm" class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i><span id="btnText">Guardar</span></button>&nbsp;&nbsp;&nbsp;<a class="btn btn-secondary" href="#" data-dismiss="modal"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancelar</a>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="modalViewEspecie" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog ">
    <div class="modal-content  ">
      <div class="modal-header header-primary">
        <h5 class="modal-title" id="titleModal">Datos de la especie</h5>
        <button type="button" class="close" data-dismiss="modal" data-toggle="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body ">
        <table class="table table-bordered">
          <tbody>
            <tr>
              <td>Id:</td>
              <td id="celId"> </td>
            </tr>
            <tr>
              <td>Nombre científico:</td>
              <td id="celNombreCientifico"> </td>
            </tr>
            <tr>
              <td>Nombre común:</td>
              <td id="celNombreComun"> </td>
            </tr>
            <tr>
              <td>Descripción:</td>
              <td id="celDescripcion"> </td>
            </tr>
            <tr>
              <td>Estado:</td>
              <td id="celEstado">Larry</td>
            </tr>

            <tr>
              <td>Imagen:</td>
              <td id="imgEspecie"></td>
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