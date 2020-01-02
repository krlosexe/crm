<div class="card shadow mb-4 hidden" id="cuadro2">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Registro Cita de Revision</h6>
  </div>
  <div class="card-body">
      <form class="user" autocomplete="off" method="post" id="store" enctype="multipart/form-data">
        @csrf
        <div class="row">
           <div class="col-md-3">
              <div class="form-group">
                  <label for=""><b>Paciente</b></label>
                  <select name="id_paciente" id="paciente-store" class="form-control select2" required>
                      <option value="">Seleccione</option>
                  </select>
              </div>
          </div>
        </div>


        <div class="row">
            <div class="col-md-3">
              <div class="form-group">
                  <label for=""><b>N° de contrato</b></label>
                  <input type="text" name="numero_contrato" id="numero_contrato-store" class="form-control  form-control-user" required>
              </div>
           </div>


          <div class="col-md-3">
              <div class="form-group">
                  <label for=""><b>Cirugia</b></label>
                  <input type="text" name="cirugia" id="cirugia-store" class="form-control  form-control-user" required>
              </div>
          </div>


          <div class="col-md-3">
              <div class="form-group">
                  <label for=""><b>Clinica</b></label>
                  <select name="clinica" id="clinica-store" class="form-control select2" required>
                      <option value="">Seleccione</option>
                  </select>
              </div>
          </div>

          <div class="col-md-3">
              <div class="form-group">
                  <label for=""><b>Asesora</b></label>
                  <select  id="asesora-store" class="form-control select2" required>
                      <option value="">Seleccione</option>
                  </select>
              </div>
          </div>
        </div>


        <div class="row">
            <div class="col-md-12">
                <div class="card-header py-3">
                 <h6 class="m-0 font-weight-bold text-primary">Agendar</h6>
                </div>
            </div>
        </div>

        <br>

        <div class="row">
            <div class="col-md-3">
              <div class="form-group">
                  <label for=""><b>Fecha</b></label>
                  <input type="date" name="fecha" id="fecha-store" class="form-control  form-control-user" required min="<?= date('Y-m-d')?>">
              </div>
           </div>


           <div class="col-md-3">
              <div class="form-group">
                  <label for=""><b>Cirujano</b></label>
                  <input type="text" name="cirujano" id="cirujano-store" class="form-control  form-control-user" required>
              </div>
          </div>


          <div class="col-md-3">
              <div class="form-group">
                  <label for=""><b>Enfermera</b></label>
                  <input type="text" name="enfermera" id="enfermera-store" class="form-control  form-control-user" required>
              </div>
          </div>


          <div class="col-md-3">
              <div class="form-group">
                  <label for=""><b>Descripcion</b></label>
                  <input type="text" name="descripcion" id="descripcion-store" class="form-control  form-control-user" required>
              </div>
          </div>


          <div class="col-md-12" style="padding-top: 25px;">
            <button type="button" class="btn btn-primary waves-effect pull-left" onclick="addAppointment('#tableRegistrar', 'store')">Agregar</button>
          </div>

        </div>

        <br>

        <div class="row">
          <div class="col-sm-12">
            <table class="table table-bordered table-striped table-hover" id="tableRegistrar">
              <thead>
                <tr>
                  <th>Fecha</th>
                  <th>Descripcion</th>
                  <th>Cirujano</th>
                  <th>Enfermera</th>
                  <th>&nbsp;</th>
                </tr>
              </thead>
              <tbody></tbody>
            </table>
          </div>
        </div>

        <input type="hidden" name="id_user" class="id_user">
        <input type="hidden" name="token" class="token">
          <br>
          <br>
        </div>
          <center>

            <button type="button"  class="btn btn-danger btn-user" onclick="prev('#cuadro2')">
                Cancelar
            </button>
            <button id="send_usuario" class="btn btn-primary btn-user">
                Registrar
            </button>

          </center>
          <br>
          <br>
      </form>
      
    </div>

