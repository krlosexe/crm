<div class="card shadow mb-4 hidden" id="cuadro3">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Consulta de Salida de Productos</h6>
  </div>
  <div class="card-body">
      <form class="user" autocomplete="off" method="post"  enctype="multipart/form-data">
      
        @csrf

        <div class="row">
          <div class="col-md-12">
              <div class="row">
                <div class="col-md-6">
                    <label for=""><b>Local Comercial</b></label>
                    <div class="form-group valid-required">
                        <input type="text" class="form-control" name="concept" id="commercial_premises_view" required>
                    </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-4">
                    <label for=""><b>Nombre</b></label>
                    <div class="form-group valid-required">
                       <input type="text" class="form-control" name="name" id="name_view" required>
                    </div>
                </div>
                <div class="col-md-4">
                  <label for=""><b>Concepto</b></label>
                  <div class="form-group valid-required">
                     <input type="text" class="form-control" name="concept" id="concept_view" required>
                  </div>
                </div>

                <div class="col-md-4">
                  <label for=""><b>Valor</b></label>
                  <div class="form-group valid-required">
                     <input type="text" class="form-control" name="value" id="value_view" required>
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
            <button type="button"  class="btn btn-danger btn-user" onclick="prev('#cuadro3')">
                Cancelar
            </button>
          </center>
          <br>
          <br>
      </form>
      
    </div>

