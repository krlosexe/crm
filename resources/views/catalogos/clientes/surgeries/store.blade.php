<div class="card shadow mb-4 hidden" id="cuadro2">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Registro de Cirugias</h6>
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
                        <input type="date" name="fecha" id="fecha-store" class="form-control select2" required>
                    </div>
                </div>

                <!-- <div class="col-md-6">
                  <div class="form-group">
                        <label for=""><b>Hora desde</b></label>
                        <input type="time" name="time" id="time-store" class="form-control select2" required>
                    </div>
                </div>


                <div class="col-md-6">
                  <div class="form-group">
                        <label for=""><b>Hora Hasta</b></label>
                        <input type="time" name="time_end" id="time-end-store" class="form-control select2" required>
                    </div>
                </div> -->



              </div>


              <div class="row">

                  <div class="col-md-6">
                      <div class="form-group">
                          <label for="identificacion_verify"><b>La Fecha es Tentativa ?</b></label>
                          <label class='container-check'>
                              <input type='checkbox' name='attempt' class='checkitem chk-col-blue' id='attempt' value='1'>
                              <span class='checkmark'></span>
                              <label for=''></label>
                          </label>
                      </div>
                  </div>


                  <div class="col-md-6">
                      <div class="form-group">
                          <div class="form-group">
                            <label for=""><b>Tipo</b></label>
                            <select name="type" id="type-store" class="form-control select2" required>
                                <option value="Al Contado">Al Contado</option>
                                <option value="Financiado">Financiado </option>
                            </select>
                        </div>
                      </div>
                  </div>

                  
              </div>


              <div class="row">
                  <div class="col-md-12">
                    <div class="form-group">
                          <label for=""><b>Cirujano</b></label>
                          <input type="text" name="surgeon" id="surgeon-store" class="form-control" required >
                      </div>
                  </div>

                  <!-- <div class="col-md-6">
                    <div class="form-group">
                          <label for=""><b>Quirofano</b></label>
                          <input type="text" name="operating_room" id="operating_room-store" class="form-control" required >
                      </div>
                  </div> -->
              </div>



              <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for=""><b>Seguidores</b></label>
                        <select name="followers[]" id="follower" class="form-control select2 getUsers" multiple>
                            <option value="">Seleccione</option>
                        </select>
                    </div>
                </div>


                <div class="col-md-12">
                    <div class="form-group">
                        <label for=""><b>Estatus</b></label>
                        <select name="status_surgeries" id="status-store" class="form-control select2" required>
                            <option value="0">Pendiente</option>
                        </select>
                    </div>
                </div>
              </div>



           </div>


           <div class="col-md-6">
              <div class="row">

                    <div class="col-md-12">
                    <div class="form-group">
                            <label for=""><b>Clinica</b></label>
                            <select name="clinic" id="clinic-store" class="form-control select2" required>
                                <option value="">Seleccione</option>
                            </select>
                        </div>
                    </div>

              </div>


              <div class="row">
                <div class="col-md-12">
                   <div class="form-group">
                        <label for=""><b>Comentarios</b></label>
                        <textarea id="summernote" name="comment"></textarea>
                    </div>
                </div>
              </div>


              <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <div class="form-group">
                        <label for=""><b>Monto de la Cirugia</b></label>
                        <input type="text" name="amount" id="amount-store" class="monto_formato_decimales form-control" required>
                    </div>
                    </div>
                </div>

<!--
                <div class="col-md-6">
                    <br>
                    <button type="button" id="add-additional" class="btn btn-primary btn-user">
                        Agregar Adicionales <i class="fa fa-plus"></i>
                    </button>
                </div>

              </div>

              <div class="row" id="additional">
                 
              </div>-->

              </div>
           </div>



        </div>
        <input type="hidden"  name="id_cliente" value="{{$id_client}}">
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

