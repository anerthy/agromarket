<!-- Modal -->
<div class="modal fade" id="modalFormUsuario" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header headerRegister">
        <h5 class="modal-title" id="titleModal">Nuevo Usuario</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="formUsuario" name="formUsuario" class="form-horizontal">
          <input type="hidden" id="usr_id" name="usr_id" value="">
          <p class="text-primary">Todos los campos son obligatorios.</p>

          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="txtNombre">Nombre</label>
              <input type="text" class="form-control" id="txtNombre" name="txtNombre" required="">
            </div>
            <div class="form-group col-md-6">
              <label for="txtEmail">Email</label>
              <input type="email" class="form-control valid validEmail" id="txtEmail" name="txtEmail" required="">
            </div>
            <div class="form-group col-md-6">
              <label for="txtCedula">Cedula</label>
              <input type="text" class="form-control" id="txtCedula" name="txtCedula" required="">
            </div>
          </div>

          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="listRol">Rol del usuario</label>
              <select class="form-control" data-live-search="true" id="listRol" name="listRol" required>
              </select>
            </div>
            <div class="form-group col-md-6">
              <label for="listEstado">Estado</label>
              <select class="form-control selectpicker" id="listEstado" name="listEstado" required>
                <option value="Activo">Activo</option>
                <option value="Inactivo">Inactivo</option>
              </select>
            </div>
          </div>

          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="txtContrasena">Contraseña</label>
              <input type="password" class="form-control" id="txtContrasena" name="txtContrasena">
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

<!-- Modal -->
<div class="modal fade" id="modalViewUser" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header header-primary">
        <h5 class="modal-title" id="titleModal">Datos del usuario</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <table class="table table-bordered">
          <tbody>
            <tr>
              <td>Nombre:</td>
              <td id="celNombre"></td>
            </tr>

            <tr>
              <td>Email:</td>
              <td id="celEmail"></td>
            </tr>
            <tr>
              <td>Rol de Usuario:</td>
              <td id="celRol"></td>
            </tr>
            <tr>
              <td>Cedula:</td>
              <td id="celCedula"></td>
            </tr>
            <tr>
              <td>Estado:</td>
              <td id="celEstado"></td>
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