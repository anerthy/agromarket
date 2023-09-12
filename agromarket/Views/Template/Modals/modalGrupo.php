<!-- Modal -->
<div class="modal fade" id="modalFormGrupo" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header headerRegister">
        <h5 class="modal-title" id="titleModal">Nuevo Grupo</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="formGrupo" name="formGrupo" class="form-horizontal">
          <input type="hidden" id="gpo_id" name="gpo_id" value="">
          <input type="hidden" id="foto_actual" name="foto_actual" value="">
          <input type="hidden" id="foto_remove" name="foto_remove" value="0">

          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="txtNombre">Nombre</label>
              <input type="text" class="form-control valid validText" placeholder="Nombre del grupo organizado" id="txtNombre" name="txtNombre" required="">
            </div>

            <div class="form-group col-md-6">
              <label for="txtRepresentante">Representante</label>
              <input type="text" class="form-control valid validText" placeholder="Nombre del representante del grupo" id="txtRepresentante" name="txtRepresentante" required="">
            </div>  
          </div>

          <div class="form-group">
            <label for="txtDescripcion">Descripción</label>
            <textarea type="text" class="form-control" placeholder="Una pequeña descripción de la organización" id="txtDescripcion" name="txtDescripcion" required=""></textarea>
          </div>

          <div class="form-group">
            <label for="txtUbicacion">Ubicación</label>
            <textarea type="text" class="form-control " placeholder="Ubicación para la organizaciónn" id="txtUbicacion" name="txtUbicacion" required=""></textarea>
          </div>

          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="txtCorreo">Correo</label>
              <input type="email" class="form-control valid validCorreo" placeholder="Correo electrónico" id="txtCorreo" name="txtCorreo" required="">
            </div>

            <div class="form-group col-md-6">
              <label for="txtTelefono">Teléfono</label>
              <input type="text" class="form-control valid validNumber" maxlength="8" placeholder="Número de contacto" id="txtTelefono" name="txtTelefono" required="" onkeypress="return controlTag(event);">
            </div>
          </div>


          <div class="form-group">
            <label for="listComunidad">Comunidad</label>
            <select class="form-control" data-live-search="true" id="listComunidad" name="listComunidad" required="">
            </select>
          </div>

          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="txtNumeroIntegrantes">Integrantes</label>
              <input type="number" min="0" class="form-control valid validNumber" placeholder="Cantidad" id="txtNumeroIntegrantes" name="txtNumeroIntegrantes" required="" onkeypress="return controlTag(event);">
            </div>

            <div class="form-group">
              <label for="listEstado">Estado</label>
              <select class="form-control" id="listEstado" name="listEstado" required="">
                <option value="2">Activo</option>
                <option value="3">Inactivo</option>
              </select>
            </div>
          </div>

          <div class="form-row">
            <div class="col-md-6">
              <div class="photo">
                <label for="foto">Foto (570x380)</label>
                <div class="prevPhoto">
                  <span class="delPhoto notBlock">X</span>
                  <label for="foto"></label>
                  <div>
                    <img id="img" src="<?= media(); ?>/images/uploads/grupos/imageUnavailable.png">
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
            <button id="btnActionForm" class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i><span id="btnText">Guardar</span></button>&nbsp;&nbsp;&nbsp;
            <button class="btn btn-danger" type="button" data-dismiss="modal"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cerrar</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>


Modal
<div class="modal fade" id="modalViewGrupo" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog ">
    <div class="modal-content  ">
      <div class="modal-header header-primary">
        <h5 class="modal-title" id="titleModal">Datos del grupo</h5>
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
              <td>Representante:</td>
              <td id="celRepresentante"></td>
            </tr>
            <tr>
              <td>Descripción:</td>
              <td id="celDescripcion"></td>
            </tr>
            <tr>
              <td>Ubicación:</td>
              <td id="celUbicacion"></td>
            </tr>
            <tr>
              <td>Correo:</td>
              <td id="celCorreo"></td>
            </tr>
            <tr>
              <td>Teléfono:</td>
              <td id="celTelefono"></td>
            </tr>
            <tr>
              <td>Integrantes:</td>
              <td id="celNumeroIntegrantes"></td>
            </tr>
            <tr>
              <td>Comunidad:</td>
              <td id="celComunidad"></td>
            </tr>
            <tr>
              <td>Estado:</td>
              <td id="celEstado"></td>
            </tr>
            <tr>
              <td>Foto:</td>
              <td id="imgGrupo"></td>
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