<div class="card shadow mb-4 hidden" id="cuadro3">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Consulta de Pre Antestesias</h6>
  </div>
  <div class="card-body">
      <form class="user" autocomplete="off" method="post" id="store" enctype="multipart/form-data">
      
        @csrf

        <div class="row">
           <div class="col-md-6">


              <div class="row">
              
                <div class="col-md-12">
                  <div class="form-group">
                        <label for=""><b>Fecha</b></label>
                        <input type="date" name="fecha" id="fecha-view" class="form-control select2" required min="<?= date("Y-m-d")?>">
                    </div>
                </div>


                <!-- <div class="col-md-6">
                  <div class="form-group">
                        <label for=""><b>Hora desde</b></label>
                        <input type="time" name="time" id="time-view" class="form-control select2" required>
                    </div>
                </div>

                <div class="col-md-6">
                  <div class="form-group">
                        <label for=""><b>Hora hasta</b></label>
                        <input type="time" name="time_end" id="time-end-view" class="form-control select2" required>
                    </div>
                </div> -->


              </div>


<!-- 
              <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                          <label for=""><b>Cirujano</b></label>
                          <input type="text" name="surgeon" id="surgeon-view" class="form-control" required >
                      </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                          <label for=""><b>Quirofano</b></label>
                          <input type="text" name="operating_room" id="operating_room-view" class="form-control" required >
                      </div>
                  </div>
              </div> -->


              
           </div>


           <div class="col-md-6">

              <div class="col-md-12">
                <div class="form-group">
                      <label for=""><b>Clinica</b></label>
                      <select name="clinic" id="clinic-view" class="form-control select2" required>
                          <option value="">Seleccione</option>
                      </select>
                  </div>
              </div>

              <div class="col-md-12">
                  <div class="form-group">
                      <label for=""><b>Obervaciones</b></label>
                      <textarea name="observaciones" id="observaciones-view" class="form-control" cols="30" rows="5"></textarea>
                  </div>
              </div>

           </div>


           <div class="col-md-6">
              <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for=""><b>Estatus</b></label>
                        <select name="status_surgeries" id="status-view" class="form-control select2" required>
                            <option value="0">Pendiente</option>
                            <option value="1">Procesado</option>
                            <option value="2">Cancelado</option>
                        </select>
                    </div>
                </div>
              </div>
           </div>

        </div>

        <input type="hidden" name="id_user" class="id_user">
        <input type="hidden" name="token" class="token">
          <br>
          <br>
        </div>
          <center>
            <button type="button"  class="btn btn-danger btn-user" onclick="prev('#cuadro3')">
                Cancelar
            </button>
          </center>
          <br>
          <br>
      </form>
      
    </div>

