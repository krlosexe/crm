<div class="card shadow mb-4 hidden" id="cuadro4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Editar Valoracion</h6>
  </div>
  <div class="card-body">
      <form class="user" autocomplete="off" method="post" id="form-update" enctype="multipart/form-data">
      
        @csrf

        <input type="hidden" name="_method" value="put">


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
              <div class="row">
                  <div class="col-md-5">

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

                          <div class="col-md-6">
                            <div class="form-group">
                                <label for=""><b>Asesora de Valoracion</b></label>
                                <select name="id_asesora_valoracion" id="id_asesora_valoracion_edit" class="form-control select2">
                                    <option value="">Seleccione</option>
                                </select>
                            </div>
                          </div>

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
                                <label for=""><b>Clinica</b></label>
                                <select name="clinic" id="clinic_edit" class="form-control select2">
                                    <option value="">Seleccione</option>
                                </select>
                            </div>
                          </div>
                      </div>



                      

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

                      <div class="row">
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


                    <div class="row">
                          <div class="col-md-12">
                              <div class="row">
                                  <div class="col-md-2">
                                    <h3 id="code-edit"></h3>
                                  </div>
                                  <div class="col-md-2">
                                    <span onclick="copyToClipboard('#code-edit')" class='consultar btn btn-sm btn-primary waves-effect' data-toggle='tooltip' title='Consultar'><i class='fa fa-copy  ' style='margin-bottom:5px'></i></span> 
                                  </div>
                                
                              </div>
                          </div>
                        </div>


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

