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


                <li class="nav-item" id="tab10_edit">
                    <a id="tab5" class="nav-link" data-toggle="tab" href="#info-refferees-edit" role="tab" aria-controls="info-add" aria-selected="false">Referidos PRP</a>
                </li>


            </ul>

            <br><br>


            <div class="tab-content" id="myTabContent">

                <div class="tab-pane fade show active tab_content0" id="init_edit" role="tabpanel" aria-labelledby="patient_record_edit">

                    <div class="row">
                        <div class="col-md-5">


                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for=""><b>Estado</b></label>
                                        <select name="state" id="state_edit" class="form-control select2" required>
                                            <option value="">Seleccione</option>
                                            <option value="Afiliada">Afiliada</option>
                                            <option value="Agendada">Agendada</option>
                                            <option value="Aprobada">Aprobada</option>
                                            <option value="Aprobada / Descartada">Aprobada / Descartada</option>
                                            <option value="Asesorada No Agendada"> Asesorada No Agendada</option>
                                            <option value="Asesorado por FB esperando contacto Telefonico">Asesorado por FB esperando contacto Telefonico</option>
                                            <option value="Demandada">Demandada</option>
                                            <option value="Descartada">Descartada</option>
                                            <option value="Llamada no Asesorada">Llamada no Asesorada</option>
                                            <option value="No Asistio">No Asistio</option>
                                            <option value="No Contactada">No Contactada</option>
                                            <option value="No Contesta">No Contesta</option>
                                            <option value="Numero Equivocado">Numero Equivocado</option>
                                            <option value="Operada">Operada</option>
                                            <option value="Programada">Programada</option>
                                            <option value="Re Agendada a Valoracion">Re Agendada a Valoracion</option>
                                            <option value="Valorada">Valorada</option>
                                            <option value="Valorada / Descartada">Valorada / Descartada</option>
                                            <option value="En mora">En mora</option>
                                            <option value="Al Dia">Al Dia</option>
                                        </select>
                                    </div>
                                </div>
                            </div>



                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for=""><b>Nombres y Apellidos</b></label>
                                        <input type="text" name="nombres" class="form-control form-control-user" id="nombre_edit" placeholder="PJ. Carlos Javier" required>
                                    </div>
                                </div>

                                <!--  <div class="col-sm-6">
                                <div class="form-group">
                                    <label for=""><b>Apellidos</b></label>
                                    <input type="text" name="apellidos" class="form-control form-control-user" id="apellido_edit" placeholder="PJ. Cardenas">
                                </div>
                            </div>-->
                            </div>

                            <div class="row">
                                <div class="col-sm-8">
                                    <div class="form-group">
                                        <label for=""><b>Numero de identificacion</b></label>
                                        <input type="number" name="identificacion" class="form-control form-control-user" id="identificacion_edit" placeholder="PJ. 23559081154">
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for="identificacion_verify"><b>Cédula Verificada?</b></label>
                                        <label class='container-check'>
                                            <input type='checkbox' name='identificacion_verify' class='checkitem chk-col-blue' id='identificacion_verify_edit' value='1'>
                                            <span class='checkmark'></span>
                                            <label for=''></label>
                                        </label>
                                    </div>
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-sm-8">
                                    <div class="form-group">
                                        <label for=""><b>Fecha de Nacimiento</b></label>
                                        <input type="date" name="fecha_nacimiento" class="form-control" id="fecha_nacimiento_edit" placeholder="PJ. Cardenas">
                                    </div>
                                </div>


                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <label for=""><b>Edad</b></label>
                                        <input type="text" name="year" class="form-control" id="year_edit" disabled>
                                    </div>
                                </div>
                            </div>



                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for=""><b>Ciudad</b></label>
                                        <select name="city" id="city_edit" class="form-control" required>
                                            <option value="">Seleccione</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for=""><b>Clinica</b></label>
                                        <select name="clinic" id="clinic_edit" class="form-control" required>
                                            <option value="">Seleccione</option>
                                        </select>
                                    </div>
                                </div>

                            </div>




                            <div class="row">
                                <div class="col-sm-10">
                                    <div class="form-group">
                                        <label for=""><b>Telefono</b></label>
                                        <input type="text" name="telefono" class="form-control form-control-user" id="telefono_edit" placeholder="PJ. 315 2077862" required>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <br>
                                    <button type="button" id="add_phone_edit" class="btn btn-primary"><i class="fa fa-plus"></i></button>
                                </div>

                            </div>


                            <div class="row" id="phone_add_content_edit">
                            </div>

                            <hr>




                            <div class="row">
                                <div class="col-sm-10">
                                    <div class="form-group">
                                        <label for=""><b>E-mail</b></label>
                                        <input type="text" name="email" class="form-control form-control-user" id="email_edit" placeholder="PJ. correo@dominio.com" required>
                                    </div>
                                </div>
                                <div class="col-md-2">
                                    <br>
                                    <button type="button" id="add_email_edit" class="btn btn-primary"><i class="fa fa-plus"></i></button>
                                </div>

                            </div>



                            <div class="row" id="email_add_content_edit">
                            </div>

                            <hr>


                            <div class="row">
                                <div class="col-sm-12">


                                    <div class="form-group">
                                        <label for=""><b>Linea de Negocio</b></label>
                                        <select name="id_line" id="linea-negocio-edit" class="form-control" required>
                                            <option value="">Seleccione</option>
                                        </select>
                                    </div>


                                    <div class="form-group">
                                        <label for=""><b>Asesora Responsable</b></label>
                                        <select name="id_user_asesora" id="asesora-edit" class="form-control" required>
                                            <option value="">Seleccione</option>
                                        </select>
                                    </div>

                                    <!-- <div class="form-group">
                                    <label for=""><b>Asesora de Valoracion</b></label>
                                    <select name="id_asesora_valoracion" id="id_asesora_valoracion-edit" class="form-control select2">
                                        <option value="">Seleccione</option>
                                    </select>
                                </div> -->


                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label for=""><b>Origen</b></label>
                                            <input type="text" name="origen" class="form-control form-control-user" id="origen_edit">
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label for=""><b>Forma de pago (Contado/Financiación)</b></label>
                                            <input type="text" name="forma_pago" class="form-control form-control-user" id="forma_pago_edit">
                                        </div>
                                    </div>




                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label for=""><b>Facebook</b></label>
                                            <input type="text" name="facebook" class="form-control form-control-user" id="facebook_edit">
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label for=""><b>Instagram</b></label>
                                            <input type="text" name="instagram" class="form-control form-control-user" id="instagram_edit">
                                        </div>
                                    </div>



                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label for=""><b>Twitter</b></label>
                                            <input type="text" name="twitter" class="form-control form-control-user" id="twitter_edit">
                                        </div>

                                        <div class="form-group col-md-6">
                                            <label for=""><b>Youtube</b></label>
                                            <input type="text" name="youtube" class="form-control form-control-user" id="youtube_edit">
                                        </div>
                                    </div>



                                    <div class="row">
                                        <div class="form-group col-md-12">
                                            <label for=""><b>Link Fotos de Google</b></label>
                                            <input type="text" name="photos_google" class="form-control form-control-user" id="photos_google_edit">
                                        </div>
                                    </div>





                                    <div class="row">
                                        <div class="form-group col-md-6">
                                            <label for=""><b>PRP</b></label>
                                            <select name="prp" id="prp_edit" class="form-control">
                                                <option value="No">No</option>
                                                <option value="Si">Si</option>
                                            </select>
                                        </div>
                                    </div>


                                </div>
                            </div>



                        </div>



                        <div class="col-md-7">




                            <div class="row">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <h3 id="code-edit"></h3>
                                        </div>
                                        <div class="col-md-2">
                                            <span onclick="copyToClipboard('#code-edit')" class='consultar btn btn-sm btn-primary waves-effect' data-toggle='tooltip' title='Consultar'><i class='fa fa-copy  ' style='margin-bottom:5px'></i></span>
                                        </div>

                                    </div>
                                </div>
                            </div>


                            <br><br>
                            <!--
                        <div class="row">
                            <div class="col-md-2">

                            </div>
                            <div class="col-md-3">
                                <label for="testimony"><b>Testimonio</b></label>
                                <label class='container-check'>
                                    <input type='checkbox' name='testimony' class='checkitem chk-col-blue' id='testimony' value='1'>
                                    <span class='checkmark'></span>
                                    <label for=''></label>
                                </label>
                            </div>

                            <div class="col-md-4">
                                <label for="testimony_date"><b>Fecha</b></label>
                                <input type="date" class="form-control" name="testimony_date" id="testimony_date">
                            </div>
                        </div>-->


                            <div class="row">
                                <div class="col-md-2">

                                </div>
                                <div class="col-md-3">
                                    <label for="before_and_after"><b>Fotos Antes y Despues</b></label>
                                    <label class='container-check'>
                                        <input type='checkbox' name='before_and_after' class='checkitem chk-col-blue' id='before_and_after' value='1'>
                                        <span class='checkmark'></span>
                                        <label for=''></label>
                                    </label>
                                </div>

                                <div class="col-md-4">
                                    <label for="before_and_after_date"><b>Fecha</b></label>
                                    <input type="date" class="form-control" name="before_and_after_date" id="before_and_after_date">
                                </div>
                            </div>


                            <!--
                        <div class="row">
                             <div class="col-md-2">

                              </div>
                            <div class="col-md-3">
                                <label for="califications"><b>Calificaciones de Google</b></label>
                                <label class='container-check'>
                                    <input type='checkbox' name='califications' class='checkitem chk-col-blue' id='califications' value='1'>
                                    <span class='checkmark'></span>
                                    <label for=''></label>
                                </label>
                            </div>

                            <div class="col-md-4">
                                <label for="califications_date"><b>Fecha</b></label>
                                <input type="date" class="form-control" name="califications_date" id="califications_date">
                            </div>
                        </div>-->



                            <div class="row">
                                <div class="col-md-2">

                                </div>
                                <div class="col-md-3">
                                    <label for="survey"><b>Encuesta Asesora</b></label>
                                    <label class='container-check'>
                                        <input type='checkbox' name='survey' class='checkitem chk-col-blue' id='survey' value='1' disabled>
                                        <span class='checkmark'></span>
                                        <label for=''></label>
                                    </label>
                                </div>
                            </div>





                            <br><br>





                            <div class="row">
                                <div class="col-md-12">
                                    <h4>Historial</h4>
                                </div>
                            </div>
                            <br><br>

                            <div class="row">
                                <div class="col-md-12">
                                    <div id="logs_edit"></div>
                                </div>
                            </div>







                            <br><br>

                            <div class="row">
                                <div class="col-md-12">
                                    <h4>Comentarios</h4>
                                </div>
                            </div>
                            <br><br>

                            <div class="row" id="comments_edit">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-2">
                                            Foto
                                        </div>
                                        <div class="col-md-10">
                                            Text
                                        </div>
                                    </div>
                                </div>
                            </div>




                            <div class="row">

                                <div class="col-md-2"></div>

                                <div class="col-md-10">
                                    <div class="form-group">

                                        <!-- <textarea name="observaciones" id="observaciones-store" class="form-control" cols="30" rows="5"></textarea> -->
                                        <textarea id="summernote_edit" name="comment"></textarea>
                                    </div>
                                </div>

                            </div>


                            <div class="row">

                                <div class="col-md-2">

                                </div>

                                <div class="col-md-10">
                                    <button type="button" id="add-comments" class="btn btn-primary">
                                        Comentar
                                    </button>
                                </div>

                            </div>



                        </div>

                    </div>


                    <div class="row">
                        <div class="col md-12">
                            <label for=""><br><b>Direccion</b></label>
                            <textarea name="direccion" placeholder="PJ. Calle 47A #6AB-30" id="direccion_edit" class="form-control" cols="30" rows="10"></textarea>
                        </div>
                    </div>
                </div>




                <div class="tab-pane fade tab_content1" id="info-add-edit" role="tabpanel" aria-labelledby="patient_record">


                    <div class="row">
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-4">
                                    <label for=""><b>Categoria</b></label>
                                    <div class="form-group valid-required">
                                        <select name="id_category" class="form-control" id="category_edit"></select>
                                    </div>
                                </div>


                                <div class="col-md-4">
                                    <label for=""><b>Sub Categoria</b></label>
                                    <div class="form-group valid-required">
                                        <select name="id_sub_category" class="form-control" id="sub_category_edit"></select>
                                    </div>
                                </div>


                                <div class="col-md-4">
                                    <br>
                                    <button type="button" id="btn-add-surgerie-edit" class="btn btn-primary btn-user">
                                        Agregar <i class="fa fa-pl"></i>
                                    </button>
                                </div>
                            </div>



                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for=""><b>Observaciones adicionales</b></label>
                                        <textarea class="form-control" name="observations" id="observations_edit"></textarea>
                                    </div>
                                </div>
                            </div>



                        </div>


                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-12">
                                    <table class="table table-bordered" id="tablecx_edit" width="100%" cellspacing="0">

                                        <thead>
                                            <tr>
                                                <th>Procedimientos</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>








                    <br><br>


                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for=""><b>Talla Actual</b></label>
                                <input type="text" name="current_size" class="form-control form-control-user" id="current_size_edit" placeholder="PJ. 12">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for=""><b>Talla en que quiere quedar</b></label>
                                <input type="text" name="desired_size" class="form-control form-control-user" id="desired_size_edit" placeholder="PJ. 16">
                            </div>
                        </div>


                        <div class="col-md-4">
                            <div class="form-group">
                                <label for=""><b>Vol Implante</b></label>
                                <input type="text" name="implant_volumem" class="form-control form-control-user" id="implant_volumem_edit" placeholder="PJ. 11">
                            </div>
                        </div>
                    </div>
                </div>




                <div class="tab-pane fade tab_content1" id="init-history-edit" role="tabpanel" aria-labelledby="patient_record">

                    <div class="row">

                        <div class="col-md-7">

                            <div class="row">
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <label for=""><b>EPS</b></label>
                                        <input type="text" name="eps" class="form-control form-control-user" id="eps_edit" placeholder="PJ. EPS SURAMERICANA S.A.">
                                    </div>
                                </div>

                                <div class="col-md-9">
                                    <div class="form-group">
                                        <label for=""><b>Estatura</b></label>
                                        <input type="text" name="height" class="form-control form-control-user" id="height_edit" placeholder="PJ. 1.50">
                                    </div>
                                </div>


                                <div class="col-md-9">
                                    <div class="form-group">
                                        <label for=""><b>Peso</b></label>
                                        <input type="text" name="weight" class="form-control form-control-user" id="weight_edit" placeholder="PJ. 50Kg">
                                    </div>
                                </div>


                                <div class="col-md-4">
                                    <label for="children_edit"><b>¿Tiene hijos?</b></label>
                                    <label class='container-check'>
                                        <input type='checkbox' name='children' class='checkitem chk-col-blue' id='children_edit' value='1'>
                                        <span class='checkmark'></span>
                                        <label for=''></label>
                                    </label>
                                </div>

                                <div class="col-md-5">
                                    <label for="number_children"><b>Numero de Hijos</b></label>
                                    <input type="number" name="number_children" class="form-control form-control-user" readonly id="number_children_edit" placeholder="PJ. 1">
                                </div>

                            </div>
                        </div>


                        <div class="col-md-5">
                            <div class="row">


                                <div class="col-md-6">
                                    <label for="alcohol_edit"><b>Alcohol</b></label>
                                    <label class='container-check'>
                                        <input type='checkbox' name='alcohol' class='checkitem chk-col-blue' id='alcohol_edit' value='1'>
                                        <span class='checkmark'></span>
                                        <label for=''></label>
                                    </label>
                                </div>


                                <div class="col-md-6">
                                    <label for="smoke_edit"><b>Fuma</b></label>
                                    <label class='container-check'>
                                        <input type='checkbox' name='smoke' class='checkitem chk-col-blue' id='smoke_edit' value='1'>

                                        <span class='checkmark'></span>
                                        <label for=''></label>
                                    </label>
                                </div>


                                <div class="col-md-4">
                                    <label for="surgery_edit"><b>¿Se ha practicado alguna cirugía?</b></label>
                                    <label class='container-check'>
                                        <input type='checkbox' name='surgery' class='checkitem chk-col-blue' id='surgery_edit' value='1'>
                                        <span class='checkmark'></span>
                                        <label for=''></label>
                                    </label>
                                </div>


                                <div class="col-md-8">
                                    <label for="previous_surgery_edit"><b>Cirugías Anteriores</b></label>
                                    <input type="text" name="previous_surgery" class="form-control form-control-user" readonly id="previous_surgery_edit" placeholder="PJ. Mamaria">
                                </div>



                                <div class="col-md-4">
                                    <label for="disease_edit"><b>¿Sufre alguna enfermedad importante?</b></label>
                                    <label class='container-check'>
                                        <input type='checkbox' name='disease' class='checkitem chk-col-blue' id='disease_edit' value='1'>
                                        <span class='checkmark'></span>
                                        <label for=''></label>
                                    </label>
                                </div>


                                <div class="col-md-8">
                                    <label for="major_disease"><b>Cual/es</b></label>
                                    <input type="text" name="major_disease" class="form-control form-control-user" readonly id="major_disease_edit" placeholder="PJ. Asma">
                                </div>



                                <div class="col-md-4">
                                    <label for="medication_edit"><b>¿Toma algún medicamento?</b></label>
                                    <label class='container-check'>
                                        <input type='checkbox' name='medication' class='checkitem chk-col-blue' id='medication_edit' value='1'>
                                        <span class='checkmark'></span>
                                        <label for=''></label>
                                    </label>
                                </div>


                                <div class="col-md-8">
                                    <label for="drink_medication"><b>Medicamentos que toma</b></label>
                                    <input type="text" name="drink_medication" class="form-control form-control-user" readonly id="drink_medication_edit" placeholder="PJ. Asma">
                                </div>



                                <div class="col-md-4">
                                    <label for="allergic_edit"><b>¿Es alegic@ a algún medicamento o sutura?</b></label>
                                    <label class='container-check'>
                                        <input type='checkbox' name='allergic' class='checkitem chk-col-blue' id='allergic_edit' value='1'>
                                        <span class='checkmark'></span>
                                        <label for=''></label>
                                    </label>
                                </div>


                                <div class="col-md-8">
                                    <label for="allergic_medication"><b>A que medicamentos o Suturas es Alergic@?</b></label>
                                    <input type="text" name="allergic_medication" class="form-control form-control-user" readonly id="allergic_medication_edit" placeholder="PJ. Acetaminofen">
                                </div>


                            </div>
                        </div>

                    </div>

                    <br><br>

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
                            <label for="average_monthly_income"><b>Metodo de Pago</b></label>
                            <input type="text" name="payment_method" class="form-control form-control-user" id="method_pay_study_credit_edit" placeholder="PJ. Transferencia">
                        </div>

                        <div class="col-md-2">
                            <label for="average_monthly_income"><b>Fecha de Pago</b></label>
                            <input type="date" name="date_pay_study_credit" class="form-control form-control-user" id="date_pay_study_credit_edit">
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