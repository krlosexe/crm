<div class="card shadow mb-4 hidden" id="cuadro4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Edicion de pacientes</h6>
    </div>
    <div class="card-body">
        <form class="user" autocomplete="off" method="post" id="form-update" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="_method" value="put">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item">
                    <a id="tab0" class="nav-link active" id="patient_record_edit" data-toggle="tab" href="#init_edit" role="tab" aria-controls="init" aria-selected="true">Consulta Preanestésica</a>
                </li>
                <li class="nav-item">
                    <a id="tab1" class="nav-link" id="information_aditionals_edit" data-toggle="tab" href="#info-add-edit" role="tab" aria-controls="info-add" aria-selected="false">Descripcion Quirurgica</a>
                </li>

                <li class="nav-item">
                    <a id="tab2" class="nav-link" id="init_history_edit" data-toggle="tab" href="#init_history_edit" role="tab" aria-controls="info-add" aria-selected="false">Historia Clinica Estética</a>
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


                <li class="nav-item" id="tab10_edit">
                    <a id="tab5" class="nav-link" data-toggle="tab" href="#info-refferees-edit" role="tab" aria-controls="info-add" aria-selected="false">Referidos PRP</a>
                </li>


            </ul>
            <br><br>


                <div class="tab-pane fade show active tab_content0" id="init_edit" role="tabpanel" aria-labelledby="patient_record_edit">
                
                    @include('catalogos.history_clinic.preanestesia')


                </div>

                <div class="tab-pane fade tab_content1-0" id="info-add-edit" role="tabpanel" aria-labelledby="patient_record_edit">

                    @include('catalogos.history_clinic.quirurgica')
                </div>

                <div class="tab-pane fade tab_content1-0" id="init_history_edit" role="tabpanel" aria-labelledby="patient_record">
                    @include('catalogos.history_clinic.histroia)

                </div>



            

                <div class="tab-pane fade tab_content1-0" id="info-credit-patient-edit" role="tabpanel" aria-labelledby="patient_record">


                </div>

                <div class="tab-pane fade tab_content1-0" id="info-valuations-edit" role="tabpanel" aria-labelledby="patient_record">

                </div>

                <div class="tab-pane fade tab_content1-0" id="info-preanestesia-edit" role="tabpanel" aria-labelledby="patient_record">

                </div>

                <div class="tab-pane fade tab_content1-0" id="info-cirugia-edit" role="tabpanel" aria-labelledby="patient_record">

                </div>

                <div class="tab-pane fade tab_content1-0" id="info-revision-edit" role="tabpanel" aria-labelledby="patient_record">

                </div>

                <div class="tab-pane fade tab_content1-0" id="info-tracing-edit" role="tabpanel" aria-labelledby="patient_record">

                </div>

                <div class="tab-pane fade tab_content1-0" id="info-masajes-edit" role="tabpanel" aria-labelledby="patient_record">

                </div>

                <div class="tab-pane fade tab_content1-0" id="info-refferees-edit" role="tabpanel" aria-labelledby="patient_record">

                </div>

            </div>


            <input type="hidden" name="id_user" class="id_user">
            <input type="hidden" name="token" class="token">
            <input type="hidden" id="id_cliente">
            <input type="hidden" name="id_user_edit" id="id_edit">
            <br>
    </div>
            <br>
            <br>
        </form>

</div>



