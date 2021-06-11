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
                    <a id="tab0" class="nav-link active" id="patient_record_edit" data-toggle="tab" href="#init_edit" role="tab" aria-controls="init" aria-selected="true">CONSULTA PREANESTÉSICA</a>
                </li>
                <li class="nav-item">
                    <a id="tab1" class="nav-link" id="information_aditionals_edit" data-toggle="tab" href="#info-add-edit" role="tab" aria-controls="info-add" aria-selected="false">DESCRIPCIÓN QUIRÚRGICA</a>
                </li>

                <li class="nav-item">
                    <a id="tab2" class="nav-link" id="init_history_edit" data-toggle="tab" href="#init_history_edit" role="tab" aria-controls="info-add" aria-selected="false">HISTORIA CLÍNICA ESTÉTICA</a>
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

            <div class="tab-content" id="myTabContent">

                <div class="tab-pane fade show active tab_content0" id="init_edit" role="tabpanel" aria-labelledby="patient_record_edit">

                    <div class="row">
                        <div class="col-md-12">
                            <h3>Datos Personales</h3>
                            <hr>
                    </div>

                        <br>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for=""><b>Fecha</b></label>
                                <input type="date" name="fecha_preanestesia" class="form-control form-control-user" id="fecha_preanestesia">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for=""><b>Nombres y Apellidos</b></label>
                                <input type="text" name="nombres" class="form-control form-control-user" id="nombre_edit" placeholder="PJ. Carlos Javier" readonly>
                            </div>
                        </div>


                        <div class="col-md-4">
                            <div class="form-group">
                                <label for=""><b>Numero de identificacion</b></label>
                                <input type="text" name="identificacion" class="form-control form-control-user" id="identificacion_edit" placeholder="PJ. 23559081154" readonly>
                            </div>
                        </div>


                        <div class="col-md-4">
                            <div class="form-group">
                                <label for=""><b>Genero</b></label>
                                <select name="gener" id="gener" class="form-control">
                                    <option value="">Seleccione</option>
                                    <option value="Masculino">Masculino</option>
                                    <option value="Femenino">Femenino</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for=""><b>Edad</b></label>
                                <input type="text" name="year" class="form-control" id="year_edit" readonly>
                            </div>
                        </div>


                        <div class="col-md-4">
                            <div class="form-group">
                                <label for=""><b>Estado Civil</b></label>
                                <input type="text" name="estado_civil" class="form-control form-control-user" id="estado_civil_edit" required>
                            </div>
                        </div>

                    </div>

                    <br>

                    <hr>


                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for=""><b>ESPECIALIDAD/ES QUIRÚRGICA(S)</b></label>
                                <input type="text" name="especialidades_quirurgica" class="form-control form-control-user" id="especialidades_quirurgica" required>
                            </div>
                        </div>
                    </div>


                    <hr>


                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for=""><b>PROCEDIMIENTO A REALIZAR:</b></label>
                                <input type="text" name="procedure" class="form-control form-control-user" id="procedure" required>
                            </div>
                        </div>
                    </div>

                    <br>
                    <div class="row">


                        <div class="col-md-12">
                            <h3>ANTECEDENTES</h3>
                            <hr>
                        </div>
                        <br>


                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for=""><b>Anestesicos</b></label>
                                        <input type="text" name="anestesicos" class="form-control form-control-user" id="anestesicos_edit" >
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for=""><b>Complicaciones</b></label>
                                        <input type="text" name="Complicaciones" class="form-control form-control-user" id="Complicaciones_edit">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for=""><b>Alergicos</b></label>
                                        <input type="text" name="Alergicos" class="form-control form-control-user" id="Alergicos_edit" >
                                    </div>
                                </div>



                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for=""><b>Farmacologicos</b></label>
                                        <input type="text" name="Farmacologicos" class="form-control form-control-user" id="Farmacologicos_edit">
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for=""><b>Hemorragicos</b></label>
                                        <input type="text" name="Hemorragicos" class="form-control form-control-user" id="Hemorragicos_edit" >
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for=""><b>Patologicos</b></label>
                                        <input type="text" name="Patologicos" class="form-control form-control-user" id="Patologicos_edit">
                                    </div>
                                </div>



                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for=""><b>Quirurgicos</b></label>
                                        <input type="text" name="Quirurgicos" class="form-control form-control-user" id="Quirurgicos_edit" >
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for=""><b>Toxicos</b></label>
                                        <input type="text" name="Toxicos" class="form-control form-control-user" id="Toxicos_edit">
                                    </div>
                                </div>


                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for=""><b>Transfuncionales</b></label>
                                        <input type="text" name="Transfuncionales" class="form-control form-control-user" id="Transfuncionales_edit">
                                    </div>
                                </div>



                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for=""><b>Otros</b></label>
                                        <input type="text" name="Otros" class="form-control form-control-user" id="Otros_edit">
                                    </div>
                                </div>

                    </div>   <br><br><br>

                        <div class="row">
                            <div class="col-md-12">
                                <h3>EXAMENES FISICOS</h3>
                                <hr>
                            </div>
                            <br><br>

                            <div class="col-md-12">
                                <h3>Signos vitales</h3>
                            </div>
                            <div class="form-group col-md-3">
                                <label for=""><b>Tension Arterial:</b></label>
                                <input type="text" name="Tarterial" class="form-control form-control-user" id="Tarterial_edit">
                            </div>

                            <div class="form-group col-md-3">
                                <label for=""><b>Frecuencia Cardiaca:</b></label>
                                <input type="text" name="fcardiaca" class="form-control form-control-user" id="fcardiaca_edit">
                            </div>

                            <div class="form-group col-md-3">
                                <label for=""><b>Frecuencia Respiratoria:</b></label>
                                <input type="text" name="Frespiratoria" class="form-control form-control-user" id="Frespiratoria_edit">
                            </div>

                            <div class="form-group col-md-3">
                                <label for=""><b>Pulsometria:</b></label>
                                <input type="text" name="Pulsometria" class="form-control form-control-user" id="Pulsometria_edit">
                            </div>
                            <div class="form-group col-md-3">
                                <label for=""><b>Temperatura:</b></label>
                                <input type="text" name="Tarterial" class="form-control form-control-user" id="Tarterial_edit">
                            </div>

                            <div class="form-group col-md-3">
                                <label for=""><b>Peso:</b></label>
                                <input type="text" name="fcardiaca" class="form-control form-control-user" id="fcardiaca_edit">
                            </div>

                            <div class="form-group col-md-3">
                                <label for=""><b>Talla:</b></label>
                                <input type="text" name="Frespiratoria" class="form-control form-control-user" id="Frespiratoria_edit">
                            </div>

                            <div class="form-group col-md-3">
                                <label for=""><b>IMC:</b></label>
                                <input type="text" name="Pulsometria" class="form-control form-control-user" id="Pulsometria_edit">
                            </div>

                            <div class="form-group col-md-3">
                                <label for=""><b>Perimetro Abdominal:</b></label>
                                <input type="text" name="fcardiaca" class="form-control form-control-user" id="fcardiaca_edit">
                            </div>

                            <div class="form-group col-md-3">
                                <label for=""><b>Interpretación:</b></label>
                                <input type="text" name="Frespiratoria" class="form-control form-control-user" id="Frespiratoria_edit">
                            </div>

                            <div class="form-group col-md-3">
                                <label for=""><b>Lateralidad Dominante:</b></label>
                                <input type="text" name="Pulsometria" class="form-control form-control-user" id="Pulsometria_edit">
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-md-12">
                                <h3>TÓRAX</h3>
                                <hr>
                            </div>
                            <br>

                                        <div class="form-group col-md-3">
                                            <label for=""><b>Auscultación pulmonar</b></label>
                                            <input type="text" name="Auscultación pulmonar" class="form-control form-control-user" id="Auscultación pulmonar_edit">
                                        </div>

                                        <div class="form-group col-md-3">
                                            <label for=""><b>Caracteristicas del soplo</b></label>
                                            <input type="text" name="youtube" class="form-control form-control-user" id="youtube_edit">
                                        </div>

                                        <div class="form-group col-md-3">
                                            <label for=""><b>Ruidos cardiacos</b></label>
                                            <input type="text" name="rcardiacos" class="form-control form-control-user" id="rcardiacos_edit">
                                        </div>

                                        <div class="form-group col-md-3">
                                            <label for=""><b>Soplos</b></label>
                                            <input type="text" name="Soplos" class="form-control form-control-user" id="Soplos_edit">
                                        </div>
                        </div>


                        <div class="row">
                            <div class="col-md-12">
                                <h3>CABEZA</h3>
                                <hr>
                            </div>
                            <br>
                                        <div class="form-group col-md-6">
                                            <label for=""><b>Apertura</b></label>
                                            <input type="text" name="Apertura" class="form-control form-control-user" id="Apertura_edit">
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label for=""><b>Cuello normal</b></label>
                                            <input type="text" name="cnormal" class="form-control form-control-user" id="cnormal_edit">
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label for=""><b>Dientes flojos</b></label>
                                            <input type="text" name="dflojos" class="form-control form-control-user" id="dflojos_edit">
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label for=""><b>Lentes de contacto</b></label>
                                            <input type="text" name="lcontacto" class="form-control form-control-user" id="lcontacto_edit">
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label for=""><b>Masas</b></label>
                                            <input type="text" name="masas" class="form-control form-control-user" id="masas_edit">
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label for=""><b>Protesis</b></label>
                                            <input type="text" name="Protesis" class="form-control form-control-user" id="Protesis_edit">
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label for=""><b>Pulsos</b></label>
                                            <input type="text" name="pulsos" class="form-control form-control-user" id="pulsos_edit">
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label for=""><b>Removible</b></label>
                                            <input type="text" name="removible" class="form-control form-control-user" id="removible_edit">
                                        </div>
                        </div>


                            <div class="col-md-4">
                                    <div class="col-md-12">
                                    <br>
                                        <h3>ABDOMEN</h3>
                                        <hr>
                                    </div>
                                        <div class="row">
                                            <input type="text" name="obsabdomen" class="form-control form-control-user" id="obsabdomen_edit">
                                        </div>
                                <br><br>
                                    <div class="col-md-12">
                                    <br>
                                            <h3>EXTREMIDADES</h3>

                                            <hr>
                                    </div>

                                        <div class="row">
                                            <input type="text" name="obsextremidades" class="form-control form-control-user" id="obsextremidades_edit">
                                        </div>
                                        <br>
                                    <div class="col-md-12">
                                    <br><br>
                                            <h3>OTROS HALLAZGOS</h3>
                                            <hr>
                                    </div>
                                        <div class="row">
                                            <input type="text" name="obsotros" class="form-control form-control-user" id="obsotros_edit">
                                        </div>
                            </div>

                            <br><br>


                    <div class="row">
                        <div class="col-md-12">
                        <br><br>
                            <h3>EXÁMENES DE LABORATORIO</h3>
                            <hr>
                        </div>
                        <br>

                            <div class="form-group col-md-4">
                                <label for=""><b>Hematocrito: </b></label>
                                <input type="text" name="hematocrito" class="form-control form-control-user" id="hematocrito_edit">
                            </div>

                            <div class="form-group col-md-4">
                                <label for=""><b>Creatinina:</b></label>
                                <input type="text" name="creatinina" class="form-control form-control-user" id="creatinina_edit">
                            </div>

                            <div class="form-group col-md-4">
                                <label for=""><b>Nitrógeno ureico:</b></label>
                                <input type="text" name="Nitrógeno ureico:" class="form-control form-control-user" id="Nureico_edit">
                            </div>

                            <div class="form-group col-md-4">
                                <label for=""><b>Glicemia:</b></label>
                                <input type="text" name="glicemia" class="form-control form-control-user" id="glicemia_edit">
                            </div>

                            <div class="form-group col-md-4">
                                <label for=""><b>Albúmina:</b></label>
                                <input type="text" name="albúmina" class="form-control form-control-user" id="albúmina_edit">
                            </div>

                            <div class="form-group col-md-4">
                                <label for=""><b>Plaquetas:</b></label>
                                <input type="text" name="plaquetas" class="form-control form-control-user" id="plaquetas_edit">
                            </div>

                            <div class="form-group col-md-4">
                                <label for=""><b>TP:</b></label>
                                <input type="text" name="tp" class="form-control form-control-user" id="tp_edit">
                            </div>

                            <div class="form-group col-md-4">
                                <label for=""><b>PTT</b></label>
                                <input type="text" name="ptt" class="form-control form-control-user" id="ptt_edit">
                            </div>

                            <div class="form-group col-md-4">
                                <label for=""><b>BUN</b></label>
                                <input type="text" name="BUN" class="form-control form-control-user" id="BUN_edit">
                            </div>

                            <div class="form-group col-md-4">
                                <label for=""><b>Transaminasas:</b></label>
                                <input type="text" name="transaminasas" class="form-control form-control-user" id="transaminasas_edit">
                            </div>

                            <div class="form-group col-md-4">
                                <label for=""><b>PCR:</b></label>
                                <input type="text" name="pcr" class="form-control form-control-user" id="pcr_edit">
                            </div>

                            <div class="form-group col-md-4">
                                <label for=""><b>IGG</b></label>
                                <input type="text" name="igg1" class="form-control form-control-user" id="igg1_edit">
                            </div>

                            <div class="form-group col-md-4">
                                <label for=""><b>IGG</b></label>
                                <input type="text" name="igg2" class="form-control form-control-user" id="igg2_edit">
                            </div>

                    </div>


                    <div class="row">
                        <div class="col-md-12">
                        <br><br>
                            <h3>EXÁMENES DE APOYO DIAGNÓSTICO</h3>
                            <hr>
                        </div>
                        <br>
                            <div class="form-group col-md-6">
                                <label for=""><b>Electrocardiograma:</b></label>
                                <input type="text" name="electrocardiograma" class="form-control form-control-user" id="electrocardiograma_edit">
                            </div>

                            <div class="form-group col-md-6">
                            <br>
                                <input type="date" class="form-control" name="electro_date" id="electro_date">
                            </div>

                            <div class="form-group col-md-6">
                                <label for=""><b>Rx de Tórax:</b></label>
                                <input type="text" name="rtorax" class="form-control form-control-user" id="rtorax_edit">
                            </div>

                            <div class="form-group col-md-6">
                            <br>
                                <input type="date" class="form-control" name="torax_date" id="torax_date">
                            </div>

                            <div class="form-group col-md-6">
                                <label for=""><b>Otros Estudios:</b></label>
                                <input type="text" class="form-control form-control-user" name="estudios_date" id="estudios_date">
                            </div>

                            <div class="form-group col-md-6">
                            <br>
                                <input type="date" name="pcr" class="form-control" id="pcr_edit">
                            </div>

                    </div>


                            <div class="col-md-4">
                                    <div class="col-md-12">
                                    <br>
                                        <h3>CLASIFICACIÓN ASA</h3>
                                        <hr>
                                    </div>
                                        <div class="row">
                                            <input type="text" name="obsabdomen" class="form-control form-control-user" id="obsabdomen_edit">
                                        </div>
                                <br><br>
                                    <div class="col-md-12">
                                    <br>
                                            <h3>RECOMENDACIONES</h3>

                                            <hr>
                                    </div>

                                        <div class="row">
                                            <input type="text" name="obsextremidades" class="form-control form-control-user" id="obsextremidades_edit">
                                        </div>
                                        <br>

                            </div>


                            <center>

                                <button type="button" class="btn btn-danger btn-user" onclick="prevClient('#cuadro4')">
                                    Limpiar
                                </button>
                                <button class="btn btn-primary btn-user">
                                    Guardar
                                </button>
                            </center>



                </div>

                <div class="tab-pane fade tab_content1-0" id="info-add-edit" role="tabpanel" aria-labelledby="patient_record_edit">

                    <div class="row">
                        <div class="col-md-12">
                            <h3>ESPECIFICACIÓN QUIRÚRGICA</h3>
                            <hr>
                        </div>

                        <br>
                        <div class="form-group col-md-4">
                            <label for=""><b>CIE10 </b></label>
                            <input type="text" class="form-control form-control-user" name="cie10" id="cie10_edit">
                        </div>

                        <div class="form-group col-md-4">
                            <label for=""><b>DIAGNÓSTICO </b></label>
                            <input type="text" class="form-control form-control-user" name="diagnostico" id="diagnostico_edit">
                        </div>

                        <div class="form-group col-md-4">
                            <label for=""><b>TIPO</b></label>
                            <input type="text" class="form-control form-control-user" name=""tipo" id="tipo_edit">
                        </div>

                        <div class="form-group col-md-4">
                            <label for=""><b>Tipo de Anestesia:</b></label>
                            <input type="text" class="form-control form-control-user" name="tanestesia" id="tanestesia_edit">
                         </div>

                        <div class="form-group col-md-4">
                            <label for=""><b>Procedimiento Quirúrgico Planeado</b></label>
                           <input type="text" class="form-control form-control-user" name="pqp" id="pqp_edit">
                        </div>
                    </div>



                    <div class="row">
                        <div class="col-md-12">
                            <h3>PERSONAL QUIRÚRGICO</h3>
                            <hr>
                        </div>

                        <div class="form-group col-md-4">
                            <label for=""><b>Cirujano Principal:</b></label>
                            <input type="text" class="form-control form-control-user" name="cirujano1" id="cirujano1_edit">
                        </div>

                        <div class="form-group col-md-4">
                            <label for=""><b>Segundo Cirujano::</b></label>
                            <input type="text" class="form-control form-control-user" name="cirujano2" id="cirujano2_edit">
                        </div>
                        <div class="form-group col-md-4">
                            <label for=""><b>Anestesiólogo:</b></label>
                            <input type="text" class="form-control form-control-user" name="anesteciologo" id="anesteciologo_edit">
                        </div>
                        <div class="form-group col-md-4">
                            <label for=""><b>Primer Ayudante:</b></label>
                            <input type="text" class="form-control form-control-user" name="ayudante1" id="ayudante1_edit">
                        </div>
                        <div class="form-group col-md-4">
                            <label for=""><b>Segundo Ayudante:</b></label>
                            <input type="text" class="form-control form-control-user" name="ayudante2" id="ayudante2_edit">
                        </div>
                        <div class="form-group col-md-4">
                            <label for=""><b>Instrumentador Quirúrgico:</b></label>
                            <input type="text" class="form-control form-control-user" name="instrumentador" id="instrumentador_edit">
                        </div>
                        <div class="form-group col-md-4">
                            <label for=""><b>Auxiliares de Sala</b></label>
                            <input type="text" name="asa" class="form-control form-control-user" id="asa_edit">
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-md-12">
                            <h3>DESCRIPCIÓN QUIRÚRGICA</h3>
                            <hr>
                        </div>
                        <br>
                    </div>


                    <div class="form-group col-md-4">
                        <label for=""><b>Fecha y Hora de Inicio:</b></label>
                        <input type="date" class="form-control" name="ah_inicio_date" id="ah_inicio_date">

                        <div class="form-group col-md-10">
                            <label for=""><b>Descripción Quirúrgica</b></label>
                            <input type="text" name="descripcion" class="form-control form-control-user" id="descripcion_edit">
                        </div>

                        <div class="form-group col-md-10">
                            <label for=""><b>Complicaciones</b></label>
                            <input type="text" name="complicacion" class="form-control form-control-user" id="complicacion_edit">
                        </div>
                    </div>

                    <center>

                        <button type="button" class="btn btn-danger btn-user" onclick="prevClient('#cuadro4')">
                            Limpiar
                        </button>
                        <button class="btn btn-primary btn-user">
                            Guardar
                        </button>
                    </center>




                </div>

                <div class="tab-pane fade tab_content1-0" id="init_history_edit" role="tabpanel" aria-labelledby="patient_record">


                    <div class="col-md-12">
                        <br>
                        <h3>MOTIVO DE LA CONSULTA</h3>
                        <hr>
                    </div>
                    <div class="row">
                        <input type="text" name="obsabdomen" class="form-control form-control-user" id="obsabdomen_edit">
                    </div>
                     <br><br>
                    <div class="col-md-12">
                        <br>
                        <h3>ENFERMEDAD ACTUAL</h3>
                        <hr>
                    </div>

                    <div class="row">
                        <input type="text" name="obsextremidades" class="form-control form-control-user" id="obsextremidades_edit">
                    </div>
                    <br>

                    <div class="row">
                        <div class="col-md-10">
                            <h3>ANTECEDENTES</h3>
                            <hr>
                        </div>

                        <br>
                        <div class="form-group col-md-5">
                            <label for=""><b>Patologicos</b></label>
                            <input type="text" class="form-control form-control-user" name="Patologicos" id="Patologicos_edit">
                        </div>

                        <div class="form-group col-md-5">
                            <label for=""><b>Procedimientos esteticos previos</b></label>
                            <input type="text" class="form-control form-control-user" name="pep" id="pep_edit">
                        </div>

                        <div class="form-group col-md-5">
                            <label for=""><b>Quirurgicos</b></label>
                            <input type="text" class="form-control form-control-user" name="quiruant" id="quiruant_edit">
                        </div>

                        <div class="form-group col-md-5">
                            <label for=""><b>Hospitalarios</b></label>
                            <input type="text" class="form-control form-control-user" name="Hospitalarios" id="Hospitalarios">
                         </div>

                         <div class="form-group col-md-5">
                            <label for=""><b>Farmacologicos</b></label>
                           <input type="text" class="form-control form-control-user" name="farmante" id="farmante_edit">
                        </div>

                        <div class="form-group col-md-5">
                            <label for=""><b>Alergicos</b></label>
                            <input type="text" class="form-control form-control-user" name="Alergicos" id="Alergicos_edit">
                        </div>

                        <div class="form-group col-md-5">
                            <label for=""><b>Toxicologicos</b></label>
                            <input type="text" class="form-control form-control-user" name="Toxicologicos" id="Toxicologicos_edit">
                        </div>

                        <div class="form-group col-md-5">
                            <label for=""><b>Transfuncionales</b></label>
                            <input type="text" class="form-control form-control-user" name="Transante" id="Transante_edit">
                        </div>

                        <div class="form-group col-md-5">
                            <label for=""><b>Habitos</b></label>
                            <input type="text" class="form-control form-control-user" name="Habitos" id="Habitos_edit">
                         </div>

                         <div class="form-group col-md-5">
                            <label for=""><b>Familiares</b></label>
                           <input type="text" class="form-control form-control-user" name="Familiares" id="Familiares_edit">
                        </div>

                        <div class="form-group col-md-5">
                            <label for=""><b>Escleroterapia previa</b></label>
                           <input type="text" class="form-control form-control-user" name="esclero" id="esclero_edit">
                        </div>

                        <div class="form-group col-md-5">
                            <label for=""><b>Planificación</b></label>
                            <input type="text" class="form-control form-control-user" name="Planificación" id="Planificación_edit">
                        </div>

                        <div class="form-group col-md-5">
                            <label for=""><b>Factores agravantes</b></label>
                            <input type="text" class="form-control form-control-user" name="Factores" id="Factores_edit">
                        </div>

                        <div class="form-group col-md-5">
                            <label for=""><b>Otros</b></label>
                            <input type="text" class="form-control form-control-user" name="otrante" id="otrante_edit">
                        </div>

                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <br>
                            <h3>GINECOLÓGICOS</h3>
                            <hr>
                        </div>

                        <br>
                        <div class="form-group col-md-2">
                            <label for=""><b>Gestaciones</b></label>
                            <input type="text" class="form-control form-control-user" name="Gestaciones" id="Gestaciones_edit">
                        </div>

                        <div class="form-group col-md-2">
                            <label for=""><b>Partos</b></label>
                            <input type="text" class="form-control form-control-user" name="partos" id="partos_edit">
                        </div>

                        <div class="form-group col-md-2">
                            <label for=""><b>Cesareas</b></label>
                            <input type="text" class="form-control form-control-user" name="cesareas" id="cesareas_edit">
                        </div>

                        <div class="form-group col-md-2">
                            <label for=""><b>Abortos</b></label>
                            <input type="text" class="form-control form-control-user" name="abortos" id="abortos_edit">
                         </div>

                         <div class="form-group col-md-2">
                            <label for=""><b>Embarazo ectópico</b></label>
                           <input type="text" class="form-control form-control-user" name="farmante" id="farmante_edit">
                        </div>

                        <div class="form-group col-md-2">
                            <label for=""><b>Fecha de la ultima mestuación</b></label>
                            <input type="date" class="form-control" name="Fechamestruacion" id="Fechamestruacion_edit">
                        </div>

                        <div class="form-group col-md-2">
                            <label for=""><b>Ciclos</b></label>
                            <input type="text" class="form-control form-control-user" name="ciclos" id="ciclos_edit">
                        </div>

                        <div class="form-group col-md-2">
                            <label for=""><b>Metodos de planificación</b></label>
                            <input type="text" class="form-control form-control-user" name="planificacion" id="planificacion_edit">
                        </div>

                    </div>


                    <div class="row">
                        <div class="col-md-10">
                            <h3>REVISIÓN POR SISTEMAS</h3>
                            <hr>
                        </div>

                        <br>
                        <div class="form-group col-md-5">
                            <label for=""><b>Cardiobascular</b></label>
                            <input type="text" class="form-control form-control-user" name="Cardio" id="cardio_edit">
                        </div>

                        <div class="form-group col-md-5">
                            <label for=""><b>Digestivo</b></label>
                            <input type="text" class="form-control form-control-user" name="digestivo" id="digestivo_edit">
                        </div>

                        <div class="form-group col-md-5">
                            <label for=""><b>Genitourinario</b></label>
                            <input type="text" class="form-control form-control-user" name="Genitourinario" id="Genitourinario_edit">
                        </div>

                        <div class="form-group col-md-5">
                            <label for=""><b>Neurologico</b></label>
                            <input type="text" class="form-control form-control-user" name="Neurologico" id="Neurologico_edit">
                         </div>

                         <div class="form-group col-md-5">
                            <label for=""><b>Ocular</b></label>
                           <input type="text" class="form-control form-control-user" name="Ocular" id="Ocular_edit">
                        </div>

                        <div class="form-group col-md-5">
                            <label for=""><b>Osteomuscular</b></label>
                            <input type="date" class="form-control" name="Osteomuscular" id="Osteomuscular_edit">
                        </div>

                        <div class="form-group col-md-5">
                            <label for=""><b>Respiratorio</b></label>
                            <input type="text" class="form-control form-control-user" name="Respiratorio" id="Respiratorio_edit">
                        </div>

                    </div>

                    <center>

                        <button type="button" class="btn btn-danger btn-user" onclick="prevClient('#cuadro4')">
                            Limpiar
                        </button>
                       <button class="btn btn-primary btn-user">
                           Guardar
                        </button>
                    </center>
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



