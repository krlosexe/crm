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
                          <label for="surgerie_rental"><b>Cirugia de Alquiler ?</b></label>
                          <label class='container-check'>
                              <input type='checkbox' name='surgerie_rental' class='checkitem chk-col-blue' id='surgerie_rental' value='1'>
                              <span class='checkmark'></span>
                              <label for=''></label>
                          </label>
                      </div>
                    </div>
              </div>

              <div class="row"  id="paciente">
                <div class="col-md-12">
                  <div class="form-group">
                        <label for=""><b>Paciente</b></label>
                        <select name="id_cliente" id="paciente-store" class="form-control select2">
                            <option value="">Seleccione</option>
                        </select>
                    </div>
                </div>
              </div>


              <div class="row" id="paciente_alquiler">
                <div class="col-md-12">
                  <div class="form-group">
                        <label for=""><b>Paciente</b></label>
                        <input type="text" name="name_paciente" id="name_paciente-store" class="form-control">
                    </div>
                </div>
              </div>



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


                  <div class="col-md-3">
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
                  <div class="col-md-8">
                      <div class="form-group">
                      <label for=""><b>Cambiar Estado del Px</b></label>
                      <select name="state_px" id="state-filter" class="form-control select2 disabled">
                          <option value="0">Seleccione</option>
                          <option value="Afiliada">Afiliada</option>
                          <option value="Agendada">Agendada</option>
                          <option value="Aprobada">Aprobada</option>
                          <option value="Aprobada / Descartada">Aprobada / Descartada</option>
                          <option value="Asesorada No Agendada"> Asesorada No Agendada</option>
                          <option value="Asesorado por FB esperando contacto Telefonico">Asesorado por FB esperando contacto Telefonico</option>
                          <option value="Demandada">Demandada</option>
                          <option value="Descartada">Descartada</option>
                          <option value="Llamada no Asesorada">Llamada no Asesorada</option>
                          <option value="No Asistio">No Asistio</option>
                          <option value="No Contactada">No Contactada</option>
                          <option value="No Contesta">No Contesta</option>
                          <option value="Numero Equivocado">Numero Equivocado</option>
                          <option value="Operada">Operada</option>
                          <option value="Programada">Programada</option>
                          <option value="Re Agendada a Valoracion">Re Agendada a Valoracion</option>
                          <option value="Valorada">Valorada</option>
                          <option value="Valorada / Descartada">Valorada / Descartada</option>
                      </select>
                      </div>
                  </div>
                </div>





              <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <div class="form-group">
                        <label for=""><b>Monto de la Cirugia</b></label>
                        <input type="text" name="amount" id="amount-store" class="monto_formato_decimales form-control" onkeydown="noPuntoComa( event )" required>
                    </div>
                    </div>
                </div>


                <div class="col-md-6">
                    <br>
                    <button type="button" id="add-additional" class="btn btn-primary btn-user">
                        Agregar Adicionales <i class="fa fa-plus"></i>
                    </button>
                </div>

              </div>

              <div class="row" id="additional">

              </div>





           </div>


           <div class="col-md-6">
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

