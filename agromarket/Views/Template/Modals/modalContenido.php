<!-- Modal -->
<div class="modal fade" id="modalFormContenido" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header headerRegister">
        <h5 class="modal-title" id="titleModal">CREAR CONTENIDO DE PÁGINA</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="formContenido" name="formContenido" class="form-horizontal">

          <input type="hidden" id="cont_id" name="cont_id" value="">

          <div class="form-row">

            <div class="form-group col-md-12">
              <label for="txtTitulo">Titulo</label>
              <input type="text" class="form-control valid validText" placeholder="Ingrese el titulo" id="txtTitulo" name="txtTitulo" required=""></input>
            </div>
          </div>

          <div class="form-row">
            <div class="form-group col-md-12">
              <label for="txtContenido">Contenido</label>
              <textarea type="text" class="form-control valid validText" placeholder="Ingrese el contenido de la pagina" id="txtContenido" name="txtContenido" required=""></textarea>
            </div>
          </div>

          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="txtPagina">Página</label>
              <select class="form-control" id="txtPagina" name="txtPagina" required="" disabled>
                <option value="Inicio">Inicio</option>
                <option value="Proyecto">Proyecto</option>
                <option value="Voluntariado">Voluntariado</option>
                <option value="Especies">Especies</option>
                <option value="Grupos Organizados">Grupos Organizados</option>
                <option value="Alimentaciones">Alimentaciones</option>
                <option value="Comunidades">Comunidades</option>
                <option value="Hospedajes">Hospedajes</option>
                <option value="Transportes">Transportes</option>
                <option value="Tours">Tours</option>
              </select>
            </div>
          </div>

          <div class="form-row">
            <div class="form-group col-md-6">
              <label for="txtPosicion">Posicion</label>
              <input type="number" class="form-control valid validNumber" placeholder="Ingrese la posición" id="txtPosicion" name="txtPosicion" required="" readonly></input>
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
<div class="modal fade" id="modalViewContenido" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog ">
    <div class="modal-content  ">
      <div class="modal-header header-primary">
        <h5 class="modal-title" id="titleModal">Datos del contenido de página</h5>
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
              <td>Contenido:</td>
              <td id="celContenido"></td>
            </tr>

            <tr>
              <td>Página:</td>
              <td id="celPagina"></td>
            </tr>

            <tr>
              <td>Posicion:</td>
              <td id="celPosicion"></td>
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