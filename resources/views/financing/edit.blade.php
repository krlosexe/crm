<div class="card shadow mb-4 hidden" id="cuadro4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Editar Solicitud</h6>
  </div>
  <div class="card-body">
      <form class="user" autocomplete="off" method="post" id="form-update" enctype="multipart/form-data">
      
        @csrf

        <input type="hidden" name="_method" value="put">
        
        <div class="row">

           <div class="col-md-12">

                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for=""><b>Cliente</b></label>
                            <input type="text" name="client" id="client" class="form-control" required>
                        </div>
                    </div>


                    <div class="col-md-3">
                        <div class="form-group">
                            <label for=""><b>Monto Solicitado</b></label>
                            <input type="text" name="required_amount" id="required_amount" class="form-control" required onkeyup="calcular()">
                        </div>
                    </div>


                    <div class="col-md-3">
                        <div class="form-group">
                            <label for=""><b>Cuotas Mensuales</b></label>
                            <input type="text" name="monthly_fee" id="monthly_fee" class="form-control" required>
                        </div>
                    </div>


                    <div class="col-md-3">
                        <div class="form-group">
                            <label for=""><b>Plazos</b></label>
                            <select name="period" id="period"  class="form-control" required onchange="calcular()">
                                <option value="">Seleccione</option>
                                <option value="72">72 meses</option>
                                <option value="60">60 meses</option>
                                <option value="48">48 meses</option>
                                <option value="36">36 meses</option>
                                <option value="24">24 meses</option>
                            </select>
                        </div>
                    </div>

                </div>


                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for=""><b>Estatus</b></label>
                            <select name="status" id="status" class="form-control" required>
                                <option value="">Seleccione</option>
                                <option value="Pendiente">Pendiente</option>
                                <option value="Aprobado">Aprobado</option>
                                <option value="Rechazado">Rechazado</option>
                            </select>
                        </div>
                    </div>
                </div>



                <div class="row">
                    <button type="button" class="btn btn-primary btn-user" id="view_plan_pays">
                        Ver Plan de Pagos
                    </button>
                </div>

                <br><br>


                <table id="table-2" style="width: 100%; text-align: right; border: 1px gray solid; border-collapse: collapse; display: none;">
                    <caption>Tabla de amortización</caption>
                        <tr>
                            <th>Número</th>
                            <th>Interés</th>
                            <th>Abono al capital</th>
                            <th>Valor de la cuota</th>
                            <th>Saldo al capital</th>
                        </tr>
                    <tbody id="tbody_1">
                    </tbody>
                </table>



              
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

