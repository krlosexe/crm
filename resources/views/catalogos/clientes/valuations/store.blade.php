<div class="card shadow mb-4 hidden" id="cuadro2">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Registro de Valoracion</h6>
  </div>
  <div class="card-body">
      <form class="user" autocomplete="off" method="post" id="store" enctype="multipart/form-data">
        @csrf
        <div class="row">
           <div class="col-md-6">
              
              <input type="hidden"  name="id_cliente" value="{{$id_client}}">

              <div class="row">

                <div class="col-md-12">
                  <div class="form-group">
                        <label for=""><b>Fecha</b></label>
                        <input type="date" name="fecha" id="fecha-store" class="form-control select2" required>
                    </div>
                </div>

                <div class="col-md-6">
                  <div class="form-group">
                        <label for=""><b>Hora desde</b></label>
                        <input type="time" name="time" id="time-store" class="form-control select2" required>
                    </div>
                </div>


                <div class="col-md-6">
                  <div class="form-group">
                        <label for=""><b>Hora hasta</b></label>
                        <input type="time" name="time_end" id="time-end-store" class="form-control select2" required>
                    </div>
                </div>

                

              </div>


            
              <div class="row">

                  <div class="col-md-6">
                    <div class="form-group">
                        <label for=""><b>Asesora de Valoracion</b></label>
                        <select name="id_asesora_valoracion" id="id_asesora_valoracion" class="form-control select2">
                            <option value="">Seleccione</option>
                        </select>
                    </div>
                  </div>


                  <div class="col-md-12">
                    <div class="form-group">
                          <label for=""><b>Doctor</b></label>
                          <input type="text" name="surgeon" id="surgeon-store" class="form-control select2">
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
                        <select name="status" id="status-store" class="form-control" required>
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
                        <select name="clinic" id="clinic" class="form-control select2" required>
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

              <br><br>



                <div class="col-md-12">
                   <div class="row">

                      <div class="col-md-3">
                        <div class="form-group">
                          <label for=""><b>Paga Consulta?</b></label>
                          <div class="custom-control custom-switch">
                              <input type="checkbox" class="custom-control-input" name="pay_consultation" id="pay_consultation" checked="checked" value="1">
                            <label class="custom-control-label" for="pay_consultation">Si</label>
                          </div>
                       </div>
                      </div>




                      <div class="col-md-4">
                        <div class="form-group">
                          <label for=""><b>Código PRP de quien remite</b></label>
                            <input type="text" name="code_prp" id="code_prp-store" class="form-control">
                       </div>
                      </div>

                   </div>


                   



                   <div class="row">
                        <div class="col-md-12">
                          <label for=""><b>Forma de Pago</b></label>
                            <select name="way_to_pay" id="way_to_pay-store" class="form-control" required>
                                <option value="">Seleccione</option>
                                <option value="Transferencia">Transferencia</option>
                                <option value="Efectivo">Efectivo </option>
                            </select>
                        </div>
                   </div>

                   <br>
                    <br>


                   <div class="row">
                    <div class="col-md-12">
                        <div class="row" id="content_acquittance" style="display: none">
                          <div class="col-sm-12 text-center"> 
                                <label for=""><b>Adjuntar recibo</b></label>
                                <div>
                                    <div class="file-loading">
                                        <input id="acquittance" name="acquittance_file" type="file">
                                    </div>
                                </div>
                                <div class="kv-avatar-hintss">
                                    <small>Seleccione una imagen</small>
                                </div>
                            </div>
                        </div>
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

