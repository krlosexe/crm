<div class="card shadow mb-4 hidden" id="cuadro2">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Registro de Comisiones</h6>
  </div>
  <div class="card-body">
      <form class="user" autocomplete="off" method="post" id="store" enctype="multipart/form-data">
        @csrf

        <div class="row">

            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-6">
                        <label for=""><b>Codigo de Afiliado</b></label>
                        <div class="form-group valid-required">
                            <input type="text" name="nombre" class="form-control form-control-user" id="code_affiliate" placeholder="Codigo" required>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <br>
                        <button id="search_affiliate" type="button" class="btn btn-primary btn-user">
                            Buscar
                        </button>
                    </div>
                </div>


                <div class="row">

                    <div class="col-md-6">
                        <label for=""><b>Nombres</b></label>
                        <div class="form-group valid-required">
                            <input type="text" class="form-control form-control-user" id="nombre" disabled>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <label for=""><b>Telefono</b></label>
                        <div class="form-group valid-required">
                            <input type="text" class="form-control form-control-user" id="telefono" disabled>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <label for=""><b>Email</b></label>
                        <div class="form-group valid-required">
                            <input type="text" class="form-control form-control-user" id="email" disabled>
                        </div>
                    </div>

                </div>


            </div>


            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-6">
                        <label for=""><b>Monto del Procedimiento</b></label>
                        <div class="form-group valid-required">
                            <input type="text" name="amount_procedure" id="amount_procedure" class="form-control form-control-user">
                        </div>
                    </div>

                    <div class="col-md-6">
                        <label for=""><b>Porcentaje de Comisión</b></label>
                        <div class="form-group valid-required">
                            <input type="text" class="form-control form-control-user" name="percentege" id="percentege" readonly>
                        </div>
                    </div>
                </div>


                <div class="row">
                    <div class="col-md-6">
                        <label for=""><b>Monto a enviar</b></label>
                        <div class="form-group valid-required">
                            <input type="text" name="amount_comission" class="form-control form-control-user" id="amount_comission" readonly>
                        </div>
                    </div>

                    <input type="hidden" name="id_client" class="form-control form-control-user" id="id_client">
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

