<div class="card shadow mb-4 hidden" id="cuadro4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Editar Masajes</h6>
  </div>
  <div class="card-body">
      <form class="user" autocomplete="off" method="post" id="form-update" enctype="multipart/form-data">
      
        @csrf

        <input type="hidden" name="_method" value="put">
        <input type="hidden"  name="id_cliente" value="{{$id_client}}">
        <div class="row">
           <div class="col-md-6">

              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                        <label for=""><b>Fecha</b></label>
                        <input type="date" name="fecha" id="fecha-edit" class="form-control select2" required >
                    </div>
                </div>
              </div>


              <div class="row">
              
               <div class="col-md-6">
                  <div class="form-group">
                          <label for=""><b>Hora</b></label>
                          <input type="time" name="time" id="time-edit" class="form-control select2" required>
                   
                  </div>
                </div>
            </div>







              <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for=""><b>Estatus</b></label>
                        <select name="status_surgeries" id="status-edit" class="form-control select2" required>
                            <option value="0">Pendiente</option>
                            <option value="1">Procesado</option>
                            <option value="2">Cancelado</option>
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
                        <select name="clinic" id="clinic-edit" class="form-control select2" required>
                            <option value="">Seleccione</option>
                        </select>
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
            <button id="send_usuario" class="btn btn-primary btn-user">
                Guardar
            </button>

          </center>
          <br>
          <br>
      </form>
      
    </div>

