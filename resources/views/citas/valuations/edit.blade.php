<div class="card shadow mb-4 hidden" id="cuadro4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Editar Valoracion</h6>
  </div>
  <div class="card-body">
      <form class="user" autocomplete="off" method="post" id="form-update" enctype="multipart/form-data">

        @csrf


        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li  class="nav-item">
                <a id="tab0" class="nav-link active" data-toggle="tab" href="#init_edit" role="tab" aria-controls="init" aria-selected="true">Datos Generales</a>
            </li>
            <li  class="nav-item">
                <a id="tab1" class="nav-link" data-toggle="tab" href="#fotos-edit" role="tab" aria-controls="fotos" aria-selected="false">Fotos</a>
            </li>
        </ul>

        <br><br>



        <div class="tab-content" id="myTabContent">

            <div class="tab-pane fade show active tab_content0" id="init_edit" role="tabpanel" aria-labelledby="patient_record_edit">

            <input type="hidden" name="_method" value="put">
            <input type="hidden" name="id_cliente" id="paciente-edit">

            <div class="row">
              <div class="col-md-5">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group">
                            <label for=""><b>Paciente</b></label>
                            <input type="text" class="form-control" id="name_client" disabled>
                        </div>
                    </div>
                  </div>


                  <div class="row">

                    <div class="col-md-12">
                      <div class="form-group">
                            <label for=""><b>Fecha</b></label>
                            <input type="date" name="fecha" id="fecha-edit" class="form-control select2" required>
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
                      <div class="col-md-12">
                        <div class="form-group">
                              <label for=""><b>Doctor</b></label>
                              <input type="text" name="surgeon" id="surgeon-edit" class="form-control select2" required>
                          </div>
                      </div>


                      <div class="col-md-12">
                        <div class="form-group">
                            <label for=""><b>Clinica</b></label>
                            <select name="clinic" id="clinic-edit" class="form-control select2">
                                <option value="">Seleccione</option>
                            </select>
                        </div>
                      </div>
                  </div>


                  <div class="row">

                      <div class="col-md-6">
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

                  </div>


                  <div class="row">

                  <div class="col-md-12">
                    <div class="form-group">
                          <label for=""><b>Seguidores</b></label>
                          <select name="followers[]" id="followers-edit" class="form-control getUsers"  multiple>
                              <option value="">Seleccione</option>
                          </select>
                      </div>
                  </div>




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


                    <div class="col-md-12">
                      <div class="row">
                        <div class="col-sm-12 text-center">
                              <label for=""><b>Adjuntar Cotizacion</b></label>
                              <div>
                                  <div class="file-loading">
                                      <input id="file-input-edit" name="file" type="file">
                                  </div>
                              </div>
                              <div class="kv-avatar-hintss">
                                  <small>Seleccione una foto</small>
                              </div>
                          </div>
                      </div>
                    </div>
                  </div>







              </div>


              <div class="col-md-7">

                  <br><br>

                        <div class="row" id="comments_edit">
                            <div class="col-md-12">
                              <div class="row">
                                  <div class="col-md-2">
                                    Foto
                                  </div>
                                  <div class="col-md-10">
                                    Text
                                  </div>
                              </div>
                            </div>
                        </div>




                        <div class="row">

                           <div class="col-md-2"></div>

                           <div class="col-md-10">
                                <div class="form-group">
                                    <label for=""><b>Comentarios</b></label>
                                    <!-- <textarea name="observaciones" id="observaciones-store" class="form-control" cols="30" rows="5"></textarea> -->
                                    <textarea id="summernote_edit" name="comment"></textarea>
                                </div>
                            </div>

                        </div>


                          <div class="row">

                              <div class="col-md-2">

                              </div>

                              <div class="col-md-10">
                                <button type="button" id="add-comments"  class="btn btn-primary">
                                  Comentar
                                </button>
                              </div>

                          </div>


                          <br><br>


<!--

                          <div class="row">
                            <div class="col-md-2"></div>
                            <div class="col-md-8">
                              <div class="form-group">
                                <label for=""><b>Cambiar Estado del Px</b></label>
                                <select name="state_px" id="state-filter-edit" class="form-control select2 disabled">
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


                        -->


                          <br><br>
                            <br><br>






                          <div class="row">

                            <br><br>
                            <br><br>

                            <br><br>

                            <div class="col-md-2">

                            </div>

                            <div class="col-md-10">
                              <div class="row">

                                  <div class="col-md-3">
                                    <div class="form-group">
                                      <label for=""><b>Paga Consulta?</b></label>
                                      <div class="custom-control custom-switch">
                                          <input type="checkbox" class="custom-control-input" name="pay_consultation" id="pay_consultation_edit" disabled value="1">
                                        <label class="custom-control-label" for="pay_consultation">Si</label>
                                      </div>
                                  </div>
                                  </div>




                                  <div class="col-md-4">
                                    <div class="form-group">
                                      <label for=""><b>Código PRP de quien remite</b></label>
                                        <input type="text" name="code_prp" id="code_prp-edit" class="form-control" disabled>
                                  </div>
                                  </div>

                              </div>






                              <div class="row">
                                    <div class="col-md-12">
                                      <label for=""><b>Forma de Pago</b></label>
                                        <select name="way_to_pay" id="way_to_pay-edit" class="form-control" disabled>
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
                                    <div class="row" id="content_acquittance-edit" style="display: none">
                                      <div class="col-sm-12 text-center">
                                            <label for=""><b>Recibo</b></label>
                                            <div>
                                                <div class="file-loading">
                                                    <input id="acquittance-edit" name="acquittance_file" type="file" disabled>
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


            </div>


            </div>

            <div class="tab-pane fade tab_content0" id="fotos-edit" role="tabpanel" aria-labelledby="patient_record_edit">
              <div id="photos_edit" class="row">

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
            <button class="btn btn-primary btn-user">
                Guardar
            </button>

          </center>
          <br>
          <br>
      </form>

    </div>

