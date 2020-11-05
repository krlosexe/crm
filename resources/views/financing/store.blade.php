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
                                        <select name="period" id="period" class="form-control" required onchange="calcular()">
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
                                    <label for="pay_to_study_credit"><b>Pago estudio de credito ?</b></label>
                                    <label class='container-check'>
                                        <input type='checkbox' name='pay_to_study_credit' class='checkitem chk-col-blue' id='pay_to_study_credit' value='1'>
                                        <span class='checkmark'></span>
                                        <label for=''></label>
                                    </label>
                                </div>
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