<div class="card shadow mb-4 hidden" id="cuadro4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Editar Cotización</h6>
    </div>
    <div class="card-body">
        <form class="user" autocomplete="off" method="post" id="form-update" enctype="multipart/form-data">
            @csrf
            <br><br>
            <input type="hidden" name="_method" value="put">
            <input type="hidden" name="id_cliente" id="paciente-edit">

            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active tab_content0-0" id="init" role="tabpanel" aria-labelledby="data_general">

                    <div class="row">
                        <div class="col-md-5">

                            <div class="row">
                                <div class="col-md-6">
                                    <label for=""><b>Nombre</b></label>
                                    <div class="form-group valid-required">
                                        <input type="text" class="form-control form-control-user" id="name" disabled>
                                    </div>
                                </div>
                              
                                <div class="col-md-3">
                                    <label for=""><b>Estado</b></label>
                                    <div class="form-group valid-required">
                                        <input type="text" class="form-control form-control-user" id="state" disabled>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <label for=""><b>Idintificación</b></label>
                                    <div class="form-group valid-required">
                                        <input type="text" class="form-control form-control-user" id="identification" disabled>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label for=""><b>Ciudad</b></label>
                                    <div class="form-group valid-required">
                                        <input type="text" class="form-control form-control-user" id="country" disabled>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <label for=""><b>Correo</b></label>
                                    <div class="form-group valid-required">
                                        <input type="text" class="form-control form-control-user" id="email" disabled>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <label for=""><b>Telefono</b></label>
                                    <div class="form-group valid-required">
                                        <input type="text" class="form-control form-control-user" id="telefono" disabled>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-7">
                        <br><br>
                        <br><br>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <div class="form-group">
                                        <label for=""><b>Monto de la Cirugia</b></label>
                                        <input type="number" name="amount" id="amount-edit" class="form-control" required onkeydown="noPuntoComa( event )">
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <br>
                                <button type="button" id="add-additional_edit" class="btn btn-primary btn-user">
                                    Agregar Adicionales <i class="fa fa-plus"></i>
                                </button>
                            </div>
                        </div>
                        <div class="row" id="additional_edit">
                        </div>
                    </div>
                </div>
            </div>

            <input type="hidden" name="id_user" class="id_user">
            <input type="hidden" name="token" class="token">
            <input type="hidden" name="id_user_edit" id="id_edit">
            <br>
            <br>
    </div>
    <center>

        <button type="button" class="btn btn-danger btn-user" onclick="prev('#cuadro4')">
            Cancelar
        </button>
        <button class="btn btn-primary btn-user">
            Guardar
        </button>

    </center>
    <br>
    <br>
    </form>

</div>