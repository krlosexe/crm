<div class="card shadow mb-4 hidden" id="cuadro4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Editar Cirugias</h6>
  </div>
  <div class="card-body">
      <form class="user" autocomplete="off" method="post" id="form-update" enctype="multipart/form-data">
      
        @csrf

        <input type="hidden" name="_method" value="put">
        
        <div class="row">

           <div class="col-md-12">
              
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                        <label for=""><b>Descripcion</b></label>
                        <input type="text" name="description" id="description_edit" class="form-control" required>
                    </div>
                </div>

                <div class="col-md-3">
                  <div class="form-group">
                        <label for=""><b>Fecha</b></label>
                        <input type="date" name="fecha" id="fecha_edit" class="form-control" required max="<?= date("Y-m-d")?>">
                    </div>
                </div>
              </div>



              <div class="row">
                <div class="col-md-12">
                    <div class="row" id="content_acquittance">
                      <div class="col-sm-12 text-center"> 
                            <label for=""><b>Adjuntar Evidencia</b></label>
                            <div>
                                <div class="file-loading">
                                    <input id="evidence_edit" name="evidence_file" type="file">
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

