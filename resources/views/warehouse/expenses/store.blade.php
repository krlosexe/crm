<div class="card shadow mb-4 hidden" id="cuadro2">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Registro de Egreso</h6>
  </div>
  <div class="card-body">
      <form class="user" autocomplete="off" method="post" id="store" enctype="multipart/form-data">
        @csrf
        <div class="row">
          <div class="col-md-12">
              <div class="row">
                <div class="col-md-6">
                    <label for=""><b>Local Comercial</b></label>
                    <div class="form-group valid-required">
                        <select name="commercial_premises" class="form-control" id="commercial_premises" required>
                          <option value="">Seleccione</option>
                          
                        </select>
                    </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-4">
                    <label for=""><b>Nombre</b></label>
                    <div class="form-group valid-required">
                       <input type="text" class="form-control" name="name" id="name" required>
                    </div>
                </div>
                <div class="col-md-4">
                  <label for=""><b>Concepto</b></label>
                  <div class="form-group valid-required">
                     <input type="text" class="form-control" name="concept" id="concept" required>
                  </div>
                </div>

                <div class="col-md-4">
                  <label for=""><b>Valor</b></label>
                  <div class="form-group valid-required">
                     <input type="text" class="form-control" name="value" id="value" required>
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
            <button class="btn btn-primary btn-user">
                Registrar
            </button>

          </center>
          <br>
          <br>
      </form>
      
    </div>

