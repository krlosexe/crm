<div class="card shadow mb-4 hidden" id="cuadro4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Editar Solicitud</h6>
  </div>
  <div class="card-body">
      <form class="user" autocomplete="off" method="post" id="form-update" enctype="multipart/form-data">

        @csrf

        <input type="hidden" name="_method" value="put">

        <div class="row">

           <div class="col-md-6">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for=""><b>Cliente</b></label>
                            <input type="text" name="client" id="client" class="form-control" required>
                        </div>
                    </div>


                    <div class="col-md-6">
                        <div class="form-group">
                            <label for=""><b>Monto Solicitado</b></label>
                            <input type="text" name="required_amount" id="required_amount" class="form-control" required onkeyup="calcular()">
                        </div>
                    </div>
                </div>


                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for=""><b>Cuotas Mensuales</b></label>
                            <input type="text" name="monthly_fee" id="monthly_fee" class="form-control" required>
                        </div>
                    </div>


                    <div class="col-md-6">
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

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for=""><b>Dependiente o independiente ?</b></label>
                            <input type="text" name="dependent_independent" id="dependent_independent" class="form-control" required>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for=""><b>Tiene Inicial ?</b></label>
                            <input type="text" name="have_initial" id="have_initial" class="form-control" required>
                        </div>
                    </div>

                </div>



                <div class="row">

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for=""><b>Esta Reportado ?</b></label>
                            <input type="text" name="reported" id="reported" class="form-control" required>
                        </div>
                    </div>



                    <div class="col-md-6">
                        <div class="form-group">
                            <label for=""><b>Dias para Tomar el Credito</b></label>
                            <input type="number" name="days_limit" id="days_limit" class="form-control" value="1">
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
                                <option value="Desembolsado">Desembolsado</option>

                            </select>
                        </div>
                    </div>
                </div>



                <div class="row">
                    <button type="button" class="btn btn-primary btn-user" id="view_plan_pays">
                        Ver Plan de Pagos
                    </button>
                </div>

           </div>


           <div class="col-md-6">
                <div class="row">
                    <div class="col-md-6">
                        <label for="pay_to_study_credit"><b>Pago estudio de credito ?</b></label>
                        <label class='container-check'>
                            <input type='checkbox' name='pay_to_study_credit' class='checkitem chk-col-blue' id='pay_to_study_credit' value='1'>
                            <span class='checkmark'></span>
                            <label for=''></label>
                        </label>
                    </div>

                    <div class="col-md-6">
                        <label for="average_monthly_income"><b>Metodo de Pago</b></label>
                        <input type="text" name="payment_method" id="payment_method" class="form-control form-control-user"  id="method_pay_study_credit_edit" placeholder="PJ. Transferencia">
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-5">
                        <label for="average_monthly_income"><b>Fecha de Pago</b></label>
                        <input type="text" class="form-control form-control-user"  id="date_pay_study_credit_edit">
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-5">
                        <label for="average_monthly_income"><b>Soporte de Pago</b></label>
                        <div>
                        <img src="" alt="">
                        </div>
                        <!-- <input type="text" class="form-control form-control-user"  id="date_pay_study_credit_edit"> -->
                    </div>
                </div>


                <br><br>


                <div class="row">


                    <div class="col-md-12">
                        <h4>Requisitos</h4>

                        <div class="row">
                            <div class="col-6">

                                <br>
                                <br>

                                <div class="row">
                                    <h5>Dependientes</h5>
                                </div>
                                <div class="row">
                                    <label class='container-check'>
                                        <input type='checkbox' name='working_letter' class='checkitem chk-col-blue' id='working_letter' value='1'>
                                        <span class='checkmark'></span>
                                        <label for="working_letter"><b>Carta Laboral</b></label>
                                    </label>
                                </div>

                                <div class="row">
                                    <label class='container-check'>
                                        <input type='checkbox' name='payment_stubs' class='checkitem chk-col-blue' id='payment_stubs' value='1'>
                                        <span class='checkmark'></span>
                                        <label for="payment_stubs"><b>Ultimas tres colillas de pago</b></label>
                                    </label>
                                </div>



                                <div class="row">
                                    <label class='container-check'>
                                        <input type='checkbox' name='copy_of_id' class='checkitem chk-col-blue' id='copy_of_id' value='1'>
                                        <span class='checkmark'></span>
                                        <label for="copy_of_id"><b>Copia de la cedula</b></label>
                                    </label>
                                </div>

                            </div>

                            <div class="col-6">
                                <br>
                                <br>
                                <div class="row">
                                    <h5>Intependintes</h5>
                                </div>
                                <div class="row">
                                    <label class='container-check'>
                                        <input type='checkbox' name='bank_statements' class='checkitem chk-col-blue' id='bank_statements' value='1'>
                                        <span class='checkmark'></span>
                                        <label for="bank_statements"><b>Extractos bancarios del ultimo trimestre O Certificación de ingresos por parte de un contador</b></label>
                                    </label>
                                </div>

                                <div class="row">
                                    <label class='container-check'>
                                        <input type='checkbox' name='copy_of_id' class='checkitem chk-col-blue' id='copy_of_id2' value='1'>
                                        <span class='checkmark'></span>
                                        <label for="copy_of_id2"><b>Copia de la cedula</b></label>
                                    </label>
                                </div>



                            </div>
                        </div>

                    </div>
                </div>


                <div class="row">
                    <div class="col-md-12">
                        <h4>Opcional</h4>

                        <div class="row">
                            <div class="col-6">



                                <div class="row">
                                    <label class='container-check'>
                                        <input type='checkbox' name='co_debtor' class='checkitem chk-col-blue' id='co_debtor' value='1'>
                                        <span class='checkmark'></span>
                                        <label for="co_debtor"><b>Codeudor</b></label>
                                    </label>
                                </div>




                                <div class="row">
                                    <label class='container-check'>
                                        <input type='checkbox' name='property_tradition' class='checkitem chk-col-blue' id='property_tradition' value='1'>
                                        <span class='checkmark'></span>
                                        <label for="property_tradition"><b>Certificado de libertad y tradicion del inmueble</b></label>
                                    </label>
                                </div>

                                <div class="row">
                                    <label class='container-check'>
                                        <input type='checkbox' name='license_plate_copy' class='checkitem chk-col-blue' id='license_plate_copy' value='1'>
                                        <span class='checkmark'></span>
                                        <label for="license_plate_copy"><b>Copia de la matriculas</b></label>
                                    </label>
                                </div>

                            </div>

                        </div>


                    </div>
                </div>
           </div>

        </div>

        <div class="row">
            <div class="col-md-12">
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

