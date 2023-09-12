<!-- Modal -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<div class="modal fade" id="modalFormComunidad" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header headerRegister">
        <h5 class="modal-title" id="titleModal">CREAR COMUNIDAD</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="formComunidad" name="formComunidad" class="form-horizontal">
          <input type="hidden" id="com_id" name="com_id" value="">
          <input type="hidden" id="foto_actual" name="foto_actual" value="">
          <input type="hidden" id="foto_remove" name="foto_remove" value="0">

          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="txtNombre">Nombre</label>
              <input type="text" class="form-control valid validText" placeholder="Ingrese el nombre" id="txtNombre" name="txtNombre" required="">
            </div>
          </div>
          <div class="form-row">

            <div class="form-group col-md-6">
              <label for="txtDescripcion">Descripción</label>
              <textarea type="text" class="form-control" placeholder="Ingrese la descripción" id="txtDescripcion" name="txtDescripcion" required=""></textarea>
            </div>
          </div>

          <div class="form-row">
            <div class="form-group col-md-3">
              <label for="txtProvincia">Provincia</label>
              <select class="form-control" id="txtProvincia" name="txtProvincia" required="">
                <option value="">Seleccione una provincia</option>
                <option value="Puntarenas">Puntarenas</option>
                <option value="Guanacaste">Guanacaste</option>
              </select>
            </div>

            <div class="form-group col-md-3">
              <label for="txtCanton">Cantón</label>
              <select class="form-control" id="txtCanton" name="txtCanton" required="">
                <option value="">Seleccione un cantón</option>
              </select>
            </div>

            <div class="form-group col-md-3">
              <label for="txtDistrito">Distrito</label>
              <select class="form-control" id="txtDistrito" name="txtDistrito" required="">
                <option value="">Seleccione una provincia</option>
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
                    <img id="img" src="<?= media(); ?>/images/uploads/comunidades/imageUnavailable.png">
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
<div class="modal fade" id="modalViewComunidad" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog ">
    <div class="modal-content  ">
      <div class="modal-header header-primary">
        <h5 class="modal-title" id="titleModal">Datos de la comunidad</h5>
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
              <td>Provincia:</td>
              <td id="celProvincia"></td>
            </tr>
            <tr>
              <td>Distrito:</td>
              <td id="celDistrito"></td>
            </tr>
            <tr>
              <td>Cantón:</td>
              <td id="celCanton"></td>
            </tr>
            <tr>
              <td>Foto:</td>
              <td id="imgComunidad"></td>
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