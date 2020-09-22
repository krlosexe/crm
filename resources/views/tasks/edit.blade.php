<div class="card shadow mb-4 hidden" id="cuadro4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Editar Cirugias</h6>
  </div>
  <div class="card-body">
      <form class="user" autocomplete="off" method="post" id="form-update" enctype="multipart/form-data">
      
        @csrf

        <input type="hidden" name="_method" value="put">
        
        <div class="row">

           <div class="col-md-5">
              
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                        <label for=""><b>Responsable</b></label>
                        <select name="responsable" id="responsable-edit" class="form-control select2" required>
                            <option value="">Seleccione</option>
                        </select>
                    </div>
                </div>
              </div>


              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                        <label for=""><b>Paciente</b></label>
                        <input type="text" name="issue" id="name_client-edit" class="form-control" required >
                    </div>
                </div>
              </div>





              <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                          <label for=""><b>Asunto</b></label>
                          <input type="text" name="issue" id="issue-edit" class="form-control" required >
                      </div>
                  </div>
              </div>


              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                        <label for=""><b>Fecha</b></label>
                        <input type="date" name="fecha" id="fecha-edit" class="form-control" required>
                    </div>
                </div>

                <div class="col-md-6">
                  <div class="form-group">
                        <label for=""><b>Hora</b></label>
                        <input type="time" name="time" id="time-edit" class="form-control" required>
                    </div>
                </div>
              </div>


              <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for=""><b>Estatus</b></label>
                        <select name="status_task" id="status_task-edit" class="form-control" required>
                            <option value="Abierta">Abierta</option>
                            <option value="Finalizada">Finalizada</option>
                        </select>
                    </div>
                </div>
              </div>
              
           </div>


           <div class="col-md-7">
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


                  <div class="col-md-2">
                          
                  </div>

                        
                  <div class="col-md-10">
                    <div class="form-group">
                            <label for=""><b>Comentarios</b></label>
                            <!-- <textarea name="observaciones" id="observaciones-store" class="form-control" cols="30" rows="5"></textarea> -->
                            <textarea id="summernote_edit" name="comments"></textarea>
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




                  <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-6">
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

                  <input type="hidden" name="id_cliente" id="id_cliente_edit">



              <br><br>
              <div class="row">

                <div class="col-md-2">
                            
                  </div>


                <div class="col-md-10">
                  <div class="form-group">
                        <label for=""><b>Seguidores</b></label>
                        <select name="followers[]" id="followers-edit" class="form-control select2" multiple>
                            <option value="">Seleccione</option>
                        </select>
                    </div>
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

