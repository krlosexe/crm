<div class="card shadow mb-4 hidden" id="cuadro4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Editar Cirugias</h6>
  </div>
  <div class="card-body">
      <form class="user" autocomplete="off" method="post" id="form-update" enctype="multipart/form-data">
      
        @csrf

        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li  class="nav-item">
                <a id="tab0-0" class="nav-link active" data-toggle="tab" href="#init" role="tab" aria-controls="init" aria-selected="true">Datos Generales</a>
            </li>
            <li  class="nav-item">
                <a id="tab1-0" class="nav-link" id="" data-toggle="tab" href="#payments" role="tab" aria-controls="info-add" aria-selected="false">Pagos</a>
            </li>
        </ul>


        <br><br>

        <input type="hidden" name="_method" value="put">
        
        <div class="tab-content" id="myTabContent">
          <div class="tab-pane fade show active tab_content0-0" id="init" role="tabpanel" aria-labelledby="data_general">

            <div class="row">
              <div class="col-md-6">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                            <label for=""><b>Fecha</b></label>
                            <input type="date" name="fecha" id="fecha-edit" class="form-control select2" required >
                        </div>
                    </div>


                    <div class="col-md-6">
                      <div class="form-group">
                            <label for=""><b>Hora desde</b></label>
                            <input type="time" name="time" id="time-edit" class="form-control select2" required>
                        </div>
                    </div>

                    <div class="col-md-6">
                      <div class="form-group">
                            <label for=""><b>Hora hasta</b></label>
                            <input type="time" name="time_end" id="time-end-edit" class="form-control select2" required>
                        </div>
                    </div>


                  </div>


                  <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="identificacion_verify"><b>La Fecha es Tentativa ?</b></label>
                            <label class='container-check'>
                                <input type='checkbox' name='attempt' class='checkitem chk-col-blue' id='attempt-edit' value='1'>
                                <span class='checkmark'></span>
                                <label for=''></label>
                            </label>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <div class="form-group">
                              <label for=""><b>Tipo</b></label>
                              <select name="type" id="type-edit" class="form-control select2" required>
                                  <option value="Al Contado">Al Contado</option>
                                  <option value="Financiado">Financiado </option>
                              </select>
                          </div>
                        </div>
                    </div>


                    <div class="col-md-3">
                        <div class="form-group">
                            <div class="form-group">
                              <label for=""><b>Monto de la Cirugia</b></label>
                              <input type="text" name="amount" id="amount-edit" class="monto_formato_decimales form-control" required>
                          </div>
                        </div>
                    </div>





                  </div>



                  <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                              <label for=""><b>Cirujano</b></label>
                              <input type="text" name="surgeon" id="surgeon-edit" class="form-control" required >
                          </div>
                      </div>

                      <!-- <div class="col-md-6">
                        <div class="form-group">
                              <label for=""><b>Quirofano</b></label>
                              <input type="text" name="operating_room" id="operating_room-edit" class="form-control" required >
                          </div>
                      </div> -->
                  </div>



                  
              </div>


              <div class="col-md-6">

                  <div class="col-md-12">
                    <div class="form-group">
                          <label for=""><b>Clinica</b></label>
                          <select name="clinic" id="clinic-edit" class="form-control select2" required>
                              <option value="">Seleccione</option>
                          </select>
                      </div>
                  </div>


                  <div class="col-md-12">
                      <div class="form-group">
                          <label for=""><b>Obervaciones</b></label>
                          <textarea name="observaciones" id="observaciones-edit" class="form-control" cols="30" rows="5"></textarea>
                      </div>
                  </div>

              </div>


              <div class="col-md-6">
                  <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for=""><b>Estatus</b></label>
                            <select name="status" id="status-edit" class="form-control select2" required>
                                <option value="0">Pendiente</option>
                                <option value="1">Procesado</option>
                                <option value="2">Cancelado</option>
                            </select>
                        </div>
                    </div>
                  </div>
              </div>

            </div>
          </div>




          <div class="tab-pane fade tab_content1" id="payments" role="tabpanel" aria-labelledby="patient_record">

            <div class="row">
                <div class="col-md-3">
                  <div class="form-group">
                      <label for=""><b>Fecha del pago</b></label>
                      <input type="date" id="date-pay-store" class="form-control  form-control-user">
                  </div>
                </div>

                <div class="col-md-3">
                  <div class="form-group">
                      <label for=""><b>Forma de Pago</b></label>
                      <input type="text" id="way-to-pay-store" class="form-control  form-control-user">
                  </div>
                </div>


                <div class="col-md-3">
                  <div class="form-group">
                      <label for=""><b>Monto de Pago</b></label>
                      <input type="text" id="amount-payment-store" class="form-control  form-control-user monto_formato_decimales">
                  </div>
                </div>

              <div class="col-md-3" style="padding-top: 40px;">
                <button type="button" class="btn btn-primary waves-effect pull-left" onclick="addPayment('#tableRegistrar', 'store')">Agregar</button>
              </div>
            </div>


            <div class="row">
              <div class="col-sm-12">
                <table class="table table-bordered table-striped table-hover" id="tableRegistrar">
                  <thead>
                    <tr>
                      <th>Fecha</th>
                      <th>Forma de pago</th>
                      <th>Monto</th>
                      <th>&nbsp;</th>
                    </tr>
                  </thead>
                  <tbody></tbody>
                </table>
              </div>
            </div>



          </div>

        </div>
        

        <input type="hidden" name="inicial" id="inicial">
        <input type="hidden" name="id_user" class="id_user">
        <input type="hidden" name="token" class="token">

        <input type="hidden" name="id_user_edit" id="id_edit">


          <br>
          <br>
        </div>
          <center>

            <button type="button"  class="btn btn-danger btn-user" onclick="prev('#cuadro4')">
                Cancelar
            </button>
            <button  class="btn btn-primary btn-user">
                Guardar
            </button>

          </center>
          <br>
          <br>
      </form>
      
    </div>
