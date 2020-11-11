<div class="card shadow mb-4 hidden" id="cuadro2">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Registro de Solicitud de Credito </h6>
    </div>
    <div class="card-body">
        <form class="user" autocomplete="off" method="post" id="store" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-6">
                            <label for=""><b>Cliente</b></label>
                            <div class="form-group valid-required">
                                <input type="text" maxlength="15" name="number" id="indetification" class="form-control form-control-user">
                            </div>
                        </div>
                        <span class='btn btn-sm btn-info waves-effect mb-auto my-auto' id="search" data-toggle='tooltip' title='Buscar'><i class='fas fa-search'></i></span>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <label for=""><b>Nombre</b></label>
                            <div class="form-group valid-required">
                                <input type="text" class="form-control form-control-user" id="name" disabled>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label for=""><b>Apellido</b></label>
                            <div class="form-group valid-required">
                                <input type="text" class="form-control form-control-user" id="lastname" disabled>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label for=""><b>Telefono</b></label>
                            <div class="form-group valid-required">
                                <input type="text" class="form-control form-control-user" id="email" disabled>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label for=""><b>telefono</b></label>
                            <div class="form-group valid-required">
                                <input type="text" class="form-control form-control-user" id="telefono" disabled>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for=""><b>Monto Solicitado</b></label>
                                        <input type="text" name="required_amount" id="required_amount_new" class="form-control monto_formato_decimales" required>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for=""><b>Fecha de inico del Credito</b></label>
                                        <input type="date" name="date_init" id="date_init_new" class="form-control" required>
                                    </div>
                                </div>


                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for=""><b>Cuotas Mensuales</b></label>
                                        <input type="text" name="monthly_fee" id="monthly_fee_new" class="form-control monto_formato_decimales" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for=""><b>Plazos</b></label>
                                        <input type="number" name="period" id="period_new" class="form-control" required>
                                    </div>
                                </div>
                            </div>



                            <!-- <div class="row">
                                <div class="col-md-6">
                                    <label for="pay_to_study_credit"><b>Pago estudio de credito ?</b></label>
                                    <label class='container-check'>
                                        <input type='checkbox' name='pay_to_study_credit' class='checkitem chk-col-blue' id='pay_to_study_credit_new' checked value='1'>
                                        <span class='checkmark'></span>
                                        <label for=''></label>
                                    </label>
                                </div>
                            </div> -->
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                        <div class="col-md-12">
                            <br><br>
                            <table id="table-3" style="width: 100%; text-align: right; border: 1px gray solid; border-collapse: collapse; display: none;">
                                <caption>Tabla de amortización</caption>
                                <tr>
                                    <th>Número</th>
                                    <th>Interés</th>
                                    <th>Abono al capital</th>
                                    <th>Valor de la cuota</th>
                                    <th>Saldo al capital</th>
                                </tr>
                                <tbody id="tbody_2">
                                </tbody>
                            </table>
                        </div>
                    </div>
            <input type="hidden" name="id_user" class="id_user">
            <input type="hidden" name="token" class="token">
            <input type="hidden" name="id_cliente" id="id_cliente">
            <input type="hidden" name="cedula" id="cedula">
            <br>
            <br>
    </div>
    <center>
        <button type="button" class="btn btn-danger btn-user" onclick="prev('#cuadro2')">
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
