<!-- Modal -->
<!-- 
 <div class="modal fade" id="modalFormTour" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">  -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg">Large modal</button>

<div class="modal fade bd-example-modal-lg" id="modalFormTour" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">


      <div class="modal-header headerRegister">
        <h5 class="modal-title" id="titleModal">Nuevo Tour</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="formTour" name="formTour" class="form-horizontal">

          <input type="hidden" id="tour_id" name="tour_id" value="">
          <input type="hidden" id="foto_actual" name="foto_actual" value="">
          <input type="hidden" id="foto_remove" name="foto_remove" value="0">

          <div id="pag1">

            <div class="form-row">
              <h4 class="text-primary">Información general</h4>
            </div>

            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="txtNombre">Nombre</label>
                <input type="text" class="form-control valid validText" placeholder="Nombre del tour" id="txtNombre" name="txtNombre" required="" autofocus="on">
              </div>
            </div>

            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="txtDescripcion">Descripción</label>
                <textarea class="form-control" data-live-search="true" id="txtDescripcion" placeholder="Descripción del tour" name="txtDescripcion" required=""></textarea>
              </div>
            </div>

            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="txtLugar">Lugar</label>
                <input class="form-control" data-live-search="true" id="txtLugar" placeholder="Lugar donde se realiza el tour" name="txtLugar" required=""></input>
              </div>
            </div>

            <div class="form-row">
              <div class="form-group col-md-6">
                <label for="txtDisponibilidad">Disponibilidad</label>
                <input class="form-control" type="text" data-live-search="true" id="txtDisponibilidad" placeholder="Disponibilidad del tour" name="txtDisponibilidad" required=""></input>
              </div>
            </div>

            <div class="form-row">
              <div class="form-group col-md-4">
                <label for="txtTelefono">Teléfono</label>
                <input type="text" maxlength="8" class="form-control valid validNumber" data-live-search="true" placeholder="Número de contacto" id="txtTelefono" name="txtTelefono" required="">
              </div>
            </div>

            <div class="form-row">
              <input type="button" value="Siguiente" id="2" class="btn btn-info" onclick="CambiarPagina(this);verificarServicios();">
            </div>

          </div>

          <div id="pag2" style="display: none;">

            <div class="form-row">
              <h4 class="text-primary">Servicios incluidos</h4>
            </div>

            <div class="form-row">
              <div class="form-check">
                <label class="form-check-label">
                  <input class="form-check-input" id="alim" type="checkbox" name="servicio" value="option2" onclick="MostrarServicios();">Servicio de alimentación.
                </label>
              </div>
            </div>

            <div class="form-row">
              <div class="form-group col-md-10" id="formAlim" style="display: none;">
                <!-- <label for="txtAlimentacion">Alimentacion</label> -->
                <textarea type="text" class="form-control valid validText" placeholder="Servicio de alimentación" id="txtAlimentacion" name="txtAlimentacion"></textarea>
              </div>
            </div>

            <div class="form-row">
              <div class="form-check">
                <label class="form-check-label">
                  <input class="form-check-input" id="hosp" type="checkbox" name="servicio" value="option2" onclick="MostrarServicios();">Servicio de hospedaje.
                </label>
              </div>
            </div>

            <div class="form-row">
              <div class="form-group col-md-10" id="formHosp" style="display: none;">
                <!-- <label for="txtHospedaje">Hospedaje</label> -->
                <textarea type="text" class="form-control valid validText" placeholder="Servicio de hospedaje" id="txtHospedaje" name="txtHospedaje"></textarea>
              </div>
            </div>

            <div class="form-row">
              <div class="form-check">
                <label class="form-check-label">
                  <input class="form-check-input" id="trans" type="checkbox" name="servicio" value="option2" onclick="MostrarServicios();">Servicio de transporte.
                </label>
              </div>
            </div>

            <div class="form-row">
              <div class="form-group col-md-10" id="formTrans" style="display: none;">
                <!-- <label for="txtTransporte">Transporte</label> -->
                <textarea class="form-control" data-live-search="true" placeholder="Servicio de trasporte" id="txtTransporte" name="txtTransporte"></textarea>
              </div>
            </div>

            <div class="form-row">
              <br>
            </div>

            <div class="form-row">
              <div class="form-group col-md-10">
                <label for="txtActividad">Actividad</label>
                <textarea type="text" class="form-control" placeholder="Actividad" id="txtActividad" name="txtActividad" required=""></textarea>
              </div>
            </div>

            <div class="form-row">
              <div class="form-group">
                <input type="button" value="Anterior" id="1" class="btn btn-info" onclick="CambiarPagina(this);">

                <input type="button" value="Siguiente" id="3" class="btn btn-info" onclick="CambiarPagina(this);">
              </div>
            </div>

          </div>

          <div id="pag3" style="display: none;">

            <div class="form-row">
              <h4 class="text-primary">Otra información</h4>
            </div>

            <div class="form-row">
              <div class="form-group col-md-3">
                <label for="txtPrecio">Precio</label>
                <input type="number" class="form-control valid validNumber" data-live-search="true" placeholder="Cantidad en colones" id="txtPrecio" name="txtPrecio" required="">
              </div>
              <div class="form-group col-md-3">
                <label for="txtCupoMinimo">Cupo mínimo</label>
                <input type="number" min="0" class="form-control" data-live-search="true" id="txtCupoMinimo" placeholder="Mínimo de personas" name="txtCupoMinimo" required="">
              </div>
            </div>

            <div class="form-row">
              <div class="form-group col-md-2">
                <label for="txtHoraInicio">Hora inicio</label>
                <input type="time" class="form-control" data-live-search="true" id="txtHoraInicio" name="txtHoraInicio" required="">
              </div>

              <div class="form-group col-md-2">
                <label for="txtDuracion">Duración</label>
                <input type="time" class="form-control" data-live-search="true" id="txtDuracion" name="txtDuracion" required="">
              </div>
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
                      <img id="img" src="<?= media(); ?>/images/uploads/tours/imageUnavailable.png">
                    </div>
                  </div>
                  <div class="upimg">
                    <input type="file" name="foto" id="foto">
                  </div>
                  <div id="form_alert"></div>
                </div>
              </div>
            </div>

            <div class="form-row">
              <br><br>
            </div>

            <div class="form-row">
              <input type="button" value="Anterior" id="2" class="btn btn-info" onclick="CambiarPagina(this);verificarServicios();">
            </div>

          </div>

          <div class="form-row">
            <br>
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


<!-- Modal -->
<!-- <div class="modal fade" id="modalViewTour" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog " >
    <div class="modal-content  "> -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg">Large modal</button>

<div class="modal fade bd-example-modal-lg" id="modalViewTour" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <div class="modal-header header-primary">
        <h5 class="modal-title" id="titleModal">Datos del tour</h5>
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
              <td>Actividad:</td>
              <td id="celActividad"></td>
            </tr>
            <tr>
              <td>Servicio de Alimentación:</td>
              <td id="celAlimentacion"></td>
            </tr>
            <tr>
              <td>Servicio de Hospedaje:</td>
              <td id="celHospedaje"></td>
            </tr>
            <tr>
              <td>Servicio de Transporte:</td>
              <td id="celTransporte"></td>
            </tr>
            <tr>
              <td>Lugar:</td>
              <td id="celLugar"></td>
            </tr>
            <tr>
              <td>Disponibilidad:</td>
              <td id="celDisponibilidad"></td>
            </tr>
            <tr>
              <td>Hora de inicio:</td>
              <td id="celHoraInicio"></td>
            </tr>
            <tr>
              <td>Duración:</td>
              <td id="celDuracion"></td>
            </tr>
            <tr>
              <td>Cupo mínimo:</td>
              <td id="celCupoMinimo"></td>
            </tr>
            <tr>
              <td>Cupo Teléfono:</td>
              <td id="celTelefono"></td>
            </tr>
            <tr>
              <td>Precio:</td>
              <td id="celPrecio"></td>
            </tr>

            <tr>
              <td>Estado:</td>
              <td id="celEstado"></td>
            </tr>

          </tbody>
        </table>
        <div id="imgTour"> </div>
      </div>

      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>