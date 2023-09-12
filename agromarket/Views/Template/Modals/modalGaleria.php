<!-- Modal -->
<div class="modal fade" id="modalFormGaleria" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header headerRegister">
        <h5 class="modal-title" id="titleModal">CREAR GALERIA</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="formGaleria" name="formGaleria" class="form-horizontal">
          <input type="hidden" id="gal_id" name="gal_id" value="">
          <input type="hidden" id="foto_actual" name="foto_actual" value="">
          <input type="hidden" id="foto_remove" name="foto_remove" value="0">

          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="txtTitulo">Titulo</label>
              <input type="text" class="form-control valid validText" placeholder="Ingrese el titulo de la imagen" id="txtTitulo" name="txtTitulo" required=""></input>
            </div>
          </div>

          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="txtDescripcion">Descripción</label>
              <textarea type="text" class="form-control valid validText" placeholder="Ingrese la descripcion" id="txtDescripcion" name="txtDescripcion" required=""></textarea>
            </div>
          </div>

          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="txtPagina">Página</label>
              <input type="text" class="form-control valid validText" placeholder="Ingrese la página donde se ubica" id="txtPagina" name="txtPagina" required="" readonly></input>
            </div>
          </div>

          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="txtSeccion">Sección</label>
              <input type="text" class="form-control valid validText" placeholder="Ingrese la seccion donde se ubica" id="txtSeccion" name="txtSeccion" required="" readonly></input>
            </div>
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
<div class="modal fade" id="modalViewGaleria" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog ">
    <div class="modal-content  ">
      <div class="modal-header header-primary">
        <h5 class="modal-title" id="titleModal">Datos de la imagen</h5>
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
              <td>Titulo:</td>
              <td id="celTitulo"></td>
            </tr>
            <tr>
              <td>Descripción:</td>
              <td id="celDescripcion"></td>
            </tr>
            <tr>
              <td>Página:</td>
              <td id="celPagina"></td>
            </tr>
            <tr>
              <td>Sección:</td>
              <td id="celSeccion"></td>
            </tr>
            <tr>
              <td>Imagen:</td>
              <td id="imgGaleria"></td>
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