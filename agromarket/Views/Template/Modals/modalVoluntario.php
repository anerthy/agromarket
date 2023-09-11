<!-- Modal -->
<div class="modal fade" id="modalFormVoluntario" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header headerRegister">
        <h5 class="modal-title" id="titleModal">Nuevo Voluntario</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <form id="formVoluntario" name="formVoluntario" class="form-horizontal">
              <input type="hidden" id="vol_id" name="vol_id" value="">             
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="txtNombre">Nombre</label>
                  <input type="text" class="form-control valid validText"  placeholder="Nombre del voluntario" id="txtNombre" name="txtNombre" required="">
                </div>
            
                <div class="form-group col-md-6">
                  <label for="txtCedula">Cédula</label>
                  <input type="text" maxlength="9" class="form-control  valid  validNumber " placeholder="Cedula" id="txtCedula" name="txtCedula" required="">
                </div>
              </div>

              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="txtPrimerApellido">Primer apellido</label>
                  <input type="text" class="form-control valid validText" placeholder="Primer apellido" id="txtPrimerApellido" name="txtPrimerApellido" required="">
                </div>  
                <div class="form-group col-md-6">
                  <label for="txtSegundoApellido">Segundo apellido</label>
                  <input type="text" class="form-control valid validText" placeholder="Segundo apellido" id="txtSegundoApellido" name="txtSegundoApellido" required="" >
                </div>
              </div>

              <div class="form-row">
                <label for="txtCorreo">Correo</label>
                <input type="email" class="form-control valid validCorreo" placeholder="Correo electronico" id="txtCorreo" name="txtCorreo" required="">
              </div>

                <div class="form-row">
                  <label for="txtTelefono">Teléfono</label>
                  <input type="text" maxlength="8" class="form-control valid validNumber" placeholder="Número de contacto" id="txtTelefono" name="txtTelefono" required="" onkeypress="return controlTag(event);">
                </div>

                <div class="form-row">
                  <label for="txtFechaNacimiento">Fecha de nacimiento</label>
                  <input type="date" class="form-control valid validText" min="1900-01-01" max="2013-01-01" placeholder="Fecha de nacimiento" id="txtFechaNacimiento" name="txtFechaNacimiento" required="">
                </div>

                <div class="form-row">
                  <label for="txtGenero">Genero</label>
                  <select class="form-control" id="txtGenero" name="txtGenero" required="">
                    <option value="Masculino">Masculino</option>
                    <option value="Femenino">Femenino</option>
                  </select>
                </div>

                <div class="form-row">
                  <label for="txtLugarResidencia">Lugar de residencia</label>
                  <input type="text" class="form-control" placeholder="Lugar donde vive" id="txtLugarResidencia" name="txtLugarResidencia" required="" >
                </div>

                <div class="form-group" id="selectEstado" style="display: none">
                    <label for="exampleSelect1">Estado</label>
                    <select class="form-control" id="listEstado" name="listEstado" required="">
                        <option value="2">Activo</option>
                        <option value="3">Inactivo</option>
                    </select>
                </div>
              <br>
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
<div class="modal fade" id="modalViewVoluntario" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog " >
    <div class="modal-content  ">
      <div class="modal-header header-primary">
        <h5 class="modal-title" id="titleModal">Datos del voluntario</h5>
        <button type="button" class="close" data-dismiss="modal" data-toggle="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body " >
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
              <td>Primer apellido:</td>
              <td id="celPrimerApellido"></td>
            </tr>
            <tr>
              <td>Segundo apellido:</td>
              <td id="celSegundoApellido"></td>
            </tr>
            <tr>
              <td>Cédula:</td>
              <td id="celCedula"></td>
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
              <td>Fecha de nacimiento:</td>
              <td id="celFechaNacimiento"></td>
            </tr>
            <tr>
              <td>Genero:</td>
              <td id="celGenero"></td>
            </tr>
            <tr>
              <td>Residencia:</td>
              <td id="celLugarResidencia"></td>
            </tr>
            <tr>
              <td>Estado:</td>
              <td id="celEstado"></td>
            </tr>
          </tbody>
        </table>
      </div>

      <div id="closeModal" class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
      <div id="optionButtons"></div>
    </div>
  </div>
</div>