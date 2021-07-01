<div class="card shadow mb-4 hidden" id="cuadro4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Edicion de Referidos</h6>
    </div>
    <div class="card-body">
        <form class="user" autocomplete="off" method="post" id="form-update" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="_method" value="put">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item">
                    <a id="tab0" class="nav-link active" id="patient_record_edit" data-toggle="tab" href="#init_edit" role="tab" aria-controls="init" aria-selected="true">Ficha</a>
                </li>
                <li class="nav-item">
                    <a id="tab1" class="nav-link" id="information_aditionals_edit" data-toggle="tab" href="#info-add-edit" role="tab" aria-controls="info-add" aria-selected="false">Info Cirugia</a>
                </li>

                <li class="nav-item">
                    <a id="tab2" class="nav-link" id="init_history_edit" data-toggle="tab" href="#init-history-edit" role="tab" aria-controls="info-add" aria-selected="false">Historial Clinico</a>
                </li>

                <li class="nav-item">
                    <a id="tab3" class="nav-link"  data-toggle="tab" href="#info-credit-patient-edit" role="tab" aria-controls="info-add" aria-selected="false">Info Crediticia</a>
                </li>

                <li class="nav-item" id="tab4_edit">
                    <a class="nav-link" id="info_credit_patient_edit" data-toggle="tab" href="#info-valuations-edit" role="tab" aria-controls="info-add" aria-selected="false">Valoraciones</a>
                </li>


                <li class="nav-item" id="tab5_edit">
                    <a id="tab4" class="nav-link" id="info_credit_patient_edit" data-toggle="tab" href="#info-preanestesia-edit" role="tab" aria-controls="info-add" aria-selected="false">Pre Anestesia</a>
                </li>

                <li class="nav-item" id="tab6_edit">
                    <a id="tab4" class="nav-link" data-toggle="tab" href="#info-cirugia-edit" role="tab" aria-controls="info-add" aria-selected="false">Procedimientos</a>
                </li>

                <li class="nav-item" id="tab7_edit">
                    <a id="tab4" class="nav-link" data-toggle="tab" href="#info-revision-edit" role="tab" aria-controls="info-add" aria-selected="false">Revisiones</a>
                </li>


                <li class="nav-item" id="tab8_edit">
                    <a id="tab4" class="nav-link" data-toggle="tab" href="#info-tracing-edit" role="tab" aria-controls="info-add" aria-selected="false">Seguimientos</a>
                </li>


                <li class="nav-item" id="tab9_edit">
                    <a id="tab4" class="nav-link" data-toggle="tab" href="#info-masajes-edit" role="tab" aria-controls="info-add" aria-selected="false">Masajes</a>
                </li>

                <li class="nav-item" id="tab11_edit">
                    <a id="tab4" class="nav-link" data-toggle="tab" href="#info-examenes-edit" role="tab" aria-controls="info-add" aria-selected="false">Examenes</a>
                </li>

                <li class="nav-item" id="tab10_edit">
                    <a id="tab5" class="nav-link" data-toggle="tab" href="#info-refferees-edit" role="tab" aria-controls="info-add" aria-selected="false">Referidos PRP</a>
                </li>


            </ul>
            <br><br>

            <div class="tab-content" id="myTabContent">

                <div class="tab-pane fade show active tab_content0" id="init_edit" role="tabpanel" aria-labelledby="patient_record_edit">
                @include('catalogos.referidos.info_referidos')
                </div>

                <div class="tab-pane fade tab_content1" id="info-add-edit" role="tabpanel" aria-labelledby="patient_record">
                @include('catalogos.referidos.Info_cirugia')
                </div>

                <div class="tab-pane fade tab_content1" id="init-history-edit" role="tabpanel" aria-labelledby="patient_record">
                @include('catalogos.referidos.Inf_clinico')   
                </div>

                <div class="tab-pane fade tab_content1-0" id="info-credit-patient-edit" role="tabpanel" aria-labelledby="patient_record">

                    <div class="row">
                        <div class="col-md-4">
                            <label for="dependent_independent"><b>Dependiente / independiente</b></label>
                            <input type="text" name="dependent_independent" class="form-control form-control-user" id="dependent_independent_edit" placeholder="PJ. Dependiente">
                        </div>

                        <div class="col-md-4">
                            <label for="type_contract"><b>Tipo de Contrato</b></label>
                            <input type="text" name="type_contract" class="form-control form-control-user" id="type_contract_edit" placeholder="PJ. Contado">
                        </div>

                        <div class="col-md-4">
                            <label for="antiquity"><b>Antiguedad</b></label>
                            <input type="text" name="antiquity" class="form-control form-control-user" id="antiquity_edit" placeholder="PJ. 1 Año">
                        </div>
                    </div>

                    <br><br>

                    <div class="row">
                        <div class="col-md-4">
                            <label for="average_monthly_income"><b>Promedio de Ingresos Mensuales</b></label>
                            <input type="number" name="average_monthly_income" class="form-control form-control-user" id="average_monthly_income_edit" placeholder="PJ. 1 Año">
                        </div>

                        <div class="col-md-4">
                            <label for="previous_credits"><b>Créditos Anteriores</b></label>
                            <input type="text" name="previous_credits" class="form-control form-control-user" id="previous_credits_edit" placeholder="PJ. 1 Año">
                        </div>

                        <div class="col-md-4">
                            <label for="previous_credits"><b>Esta reportado</b></label>
                            <input type="text" name="reported" class="form-control form-control-user" id="reported_edit" placeholder="">
                        </div>
                    </div>

                    <br><br>
                    <div class="row">
                        <div class="col-md-4">
                            <label for="average_monthly_income"><b>Cuenta Bancaria</b></label>
                            <input type="text" name="bank_account" class="form-control form-control-user" id="bank_account_edit" placeholder="PJ. 1 Año">
                        </div>

                        <div class="col-md-4">
                            <label for="average_monthly_income"><b>Inicial</b></label>
                            <input type="text" name="have_initial" class="form-control form-control-user" id="have_initial_edit" placeholder="PJ. 1 Año">
                        </div>

                        <div class="col-md-2">
                            <label for="properties_edit"><b>Propiedades</b></label>
                            <label class='container-check'>
                                <input type='checkbox' name='properties' class='checkitem chk-col-blue' id='properties_edit' value='1'>
                                <span class='checkmark'></span>
                                <label for=''></label>
                            </label>
                        </div>

                        <div class="col-md-2">
                            <label for="vehicle_edit"><b>Vehículo</b></label>
                            <label class='container-check'>
                                <input type='checkbox' name='vehicle' class='checkitem chk-col-blue' id='vehicle_edit' value='1'>
                                <span class='checkmark'></span>
                                <label for=''></label>
                            </label>
                        </div>
                    </div>

                    <br><br>

                    <div class="row">
                        <div class="col-md-2">
                            <label for="pay_to_study_credit"><b>Pago estudio de credito ?</b></label>
                            <label class='container-check'>
                                <input type='checkbox' name='pay_to_study_credit' class='checkitem chk-col-blue' id='pay_to_study_credit' value='1'>
                                <span class='checkmark'></span>
                                <label for=''></label>
                            </label>
                        </div>


                        <div class="col-md-2">
                            <label for="average_monthly_income"><b>ID de Transaccion</b></label>
                            <input type="text"  class="form-control form-control-user" id="id_transaccion" placeholder="PJ. Transferencia">
                        </div>


                        <div class="col-md-2">
                            <label for="average_monthly_income"><b>Metodo de Pago</b></label>
                            <input type="text" name="payment_method" class="form-control form-control-user" id="method_pay_study_credit_edit" placeholder="PJ. Transferencia">
                        </div>

                        <div class="col-md-2">
                            <label for="average_monthly_income"><b>Fecha de Pago</b></label>
                            <input type="datetime" name="date_pay_study_credit" class="form-control form-control-user" id="date_pay_study_credit_edit">
                        </div>

                    </div>

                    <br><br>

                    <div class="row">
                        <div class="col-md-5">
                            <label for="average_monthly_income"><b>Soporte de Pago</b></label>
                            <div>
                                <img src="" id="load_img" alt="" width="250px" height="200px">
                            </div>
                        </div>
                    </div>

                    <button class="btn btn-primary btn-user" id="process_status">
                        Procesar
                    </button>
                    <br><br>
                </div>


                <div class="tab-pane fade tab_content1-0" id="info-valuations-edit" role="tabpanel" aria-labelledby="patient_record">
                    <div class="embed-responsive embed-responsive-16by9">
                        <iframe class="embed-responsive-item " id="iframeValuationsEdit" allowfullscreen="">
                        </iframe>
                    </div>
                    <br><br>
                </div>

                <div class="tab-pane fade tab_content1-0" id="info-preanestesia-edit" role="tabpanel" aria-labelledby="patient_record">
                    <div class="embed-responsive embed-responsive-16by9">
                        <iframe class="embed-responsive-item " id="iframepPreanestesiaEdit" allowfullscreen="">
                        </iframe>
                    </div>
                    <br><br>
                </div>

                <div class="tab-pane fade tab_content1-0" id="info-cirugia-edit" role="tabpanel" aria-labelledby="patient_record">
                    <div class="embed-responsive embed-responsive-16by9">
                        <iframe class="embed-responsive-item " id="iframepCirugiaEdit" allowfullscreen="">
                        </iframe>
                    </div>
                    <br><br>
                </div>

                <div class="tab-pane fade tab_content1-0" id="info-revision-edit" role="tabpanel" aria-labelledby="patient_record">
                    <div class="embed-responsive embed-responsive-16by9">
                        <iframe class="embed-responsive-item " id="iframepRevisionEdit" allowfullscreen="">
                        </iframe>
                    </div>
                    <br><br>
                </div>

                <div class="tab-pane fade tab_content1-0" id="info-tracing-edit" role="tabpanel" aria-labelledby="patient_record">
                    <div class="embed-responsive embed-responsive-16by9">
                        <iframe class="embed-responsive-item " id="iframepTracingEdit" allowfullscreen="">
                        </iframe>
                    </div>
                    <br><br>
                </div>

                <div class="tab-pane fade tab_content1-0" id="info-masajes-edit" role="tabpanel" aria-labelledby="patient_record">
                    <div class="embed-responsive embed-responsive-16by9">
                        <iframe class="embed-responsive-item " id="iframepMsajesEdit" allowfullscreen="">
                        </iframe>
                    </div>
                    <br><br>
                </div>

                <div class="tab-pane fade tab_content1-0" id="info-examenes-edit" role="tabpanel" aria-labelledby="patient_record">
                    <div class="embed-responsive embed-responsive-16by9">
                        <iframe class="embed-responsive-item " id="iframeexamenesEdit" allowfullscreen="">
                        </iframe>
                    </div>
                    <br><br>
                </div>
                
                <div class="tab-pane fade tab_content1-0" id="info-refferees-edit" role="tabpanel" aria-labelledby="patient_record">
                    <div class="embed-responsive embed-responsive-16by9">
                        <iframe class="embed-responsive-item " id="iframepRefferedsEdit" allowfullscreen="">
                        </iframe>
                    </div>
                    <br><br>
                </div>

            </div>


            <input type="hidden" name="id_user" class="id_user">
            <input type="hidden" name="token" class="token">
            <input type="hidden" id="id_cliente">
            <input type="hidden" name="id_user_edit" id="id_edit">
            <br>
    </div>
                <center>

                    <button type="button" class="btn btn-danger btn-user" onclick="prevClient('#cuadro4')">
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



