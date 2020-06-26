<div class="card shadow mb-4 hidden" id="cuadro2">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Registro de pacientes</h6>
  </div>
  <div class="card-body">
      <form class="user" autocomplete="off" method="post" id="store" enctype="multipart/form-data">
        @csrf


        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li  class="nav-item">
                <a id="tab0-0" class="nav-link active" id="patient_record" data-toggle="tab" href="#init" role="tab" aria-controls="init" aria-selected="true">Ficha</a>
            </li>
            <li  class="nav-item">
                <a id="tab1-0" class="nav-link" id="information_aditionals" data-toggle="tab" href="#info-add" role="tab" aria-controls="info-add" aria-selected="false">Info Cirugia</a>
            </li>

            <li  class="nav-item">
                <a id="tab2-0" class="nav-link" id="init_history" data-toggle="tab" href="#init-history" role="tab" aria-controls="info-add" aria-selected="false">Historial Clinico</a>
            </li>

            <li  class="nav-item">
                <a id="tab3-0" class="nav-link" id="info_credit_patient" data-toggle="tab" href="#info-credit-patient" role="tab" aria-controls="info-add" aria-selected="false">Info Crediticia</a>
            </li>



            <li  class="nav-item tabs-remove" style="display: none">
                <a id="tab4" class="nav-link" id="info_credit_patient_edit" data-toggle="tab" href="#info-valuations-store" role="tab" aria-controls="info-add" aria-selected="false">Valoraciones</a>
            </li>


            <li  class="nav-item tabs-remove" style="display: none">
                <a id="tab4" class="nav-link" id="info_credit_patient_edit" data-toggle="tab" href="#info-preanestesia-store" role="tab" aria-controls="info-add" aria-selected="false">Pre Anestesia</a>
            </li>

            <li  class="nav-item tabs-remove" style="display: none">
                <a id="tab4" class="nav-link"  data-toggle="tab" href="#info-cirugia-store" role="tab" aria-controls="info-add" aria-selected="false">Cirugias</a>
            </li>

            <li  class="nav-item tabs-remove" style="display: none">
                <a id="tab4" class="nav-link"  data-toggle="tab" href="#info-revision-store" role="tab" aria-controls="info-add" aria-selected="false">Revisiones</a>
            </li>

            <!-- <li  class="nav-item tabs-remove" style="display: none">
                <a id="tab4" class="nav-link"  data-toggle="tab" href="#info-tracing-edit" role="tab" aria-controls="info-add" aria-selected="false">Seguimientos</a>
            </li> -->

        </ul>
        <br><br>

        <div class="tab-content" id="myTabContent">

			  <div class="tab-pane fade show active tab_content0-0" id="init" role="tabpanel" aria-labelledby="patient_record">

                <div class="row">
        
                    <div class="col-md-6">

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for=""><b>Estado</b></label>
                                    <select name="state" id="state" class="form-control select2 disabled" required>
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
                                    </select>
                                </div>
                            </div>
                        </div>



                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label for=""><b>Numero de identificacion</b></label>
                                    <input type="number" name="identificacion" class="form-control form-control-user" id="identificacion" placeholder="PJ. 23559081154">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="identificacion_verify"><b>Cédula Verificada?</b></label>
                                    <label class='container-check'>
                                        <input type='checkbox' name='identificacion_verify' class='checkitem chk-col-blue disabled' id='identificacion_verify' value='1'>
                                        <span class='checkmark'></span>
                                        <label for=''></label>
                                    </label>
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for=""><b>Nombres y Apellidos</b></label>
                                    <input type="text" name="nombres" class="form-control form-control-user disabled" id="nombre" placeholder="PJ. Carlos Javier Cardenas" required>
                                </div>
                            </div>
                        
                          <!--<div class="col-md-6">
                                <div class="form-group">
                                    <label for=""><b>Apellidos</b></label>
                                    <input type="text" name="apellidos" class="form-control form-control-user disabled" id="apellido" placeholder="PJ. Cardenas" required>
                                </div>
                            </div>-->

                        </div>

                        
                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label for=""><b>Fecha de Nacimiento</b></label>
                                    <input type="date" name="fecha_nacimiento" class="form-control form-control-user disabled" id="fecha_nacimiento" placeholder="PJ. Cardenas" >
                                </div>
                            </div>


                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for=""><b>Edad</b></label>
                                    <input type="text" name="year" class="form-control form-control-user disabled" id="year"  disabled>
                                </div>
                            </div>
                        </div>



                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for=""><b>Ciudad</b></label>
                                    <select name="city" id="city" class="form-control  disabled" required>
                                        <option value="">Seleccione</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for=""><b>Clinica</b></label>
                                    <select name="clinic" id="clinic" class="form-control select2 disabled" required>
                                        <option value="">Seleccione</option>
                                    </select>
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-sm-10">
                                    <div class="form-group">
                                        <label for=""><b>Telefono</b></label>
                                        <input type="text" name="telefono" class="form-control form-control-user" id="telefono" placeholder="PJ. 315 2077862" required>
                                    </div>
                            </div>
                            <div class="col-md-2">
                            <br>
                                <button type="button" id="add_phone" class="btn btn-primary"><i class="fa fa-plus"></i></button>
                            </div>

                            
                        </div>

                        <div id="add_phone_content" class="row">

                        </div>


                        <hr>




                        <div class="row">
                            <div class="col-sm-10">
                                <div class="form-group">
                                    <label for=""><b>E-mail</b></label>
                                    <input type="email" name="email" class="form-control form-control-user disabled" id="email" placeholder="PJ. correo@dominio.com" required>
                                </div>
                            </div>
                            <div class="col-md-2">
                            <br>
                                <button type="button" id="add_email" class="btn btn-primary"><i class="fa fa-plus"></i></button>
                            </div>

                            
                        </div>

                        <div id="add_email_content" class="row">

                        </div>


                        <hr>





                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for=""><b>Linea de Negocio</b></label>
                                    <select name="id_line" id="linea-negocio" class="form-control disabled" required>
                                        <option value="">Seleccione</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for=""><b>Asesora Responsable</b></label>
                                    <select name="id_user_asesora" id="asesora" class="form-control select2 disabled" required>
                                        <option value="">Seleccione</option>
                                    </select>
                                </div>


                                <!-- <div class="form-group">
                                    <label for=""><b>Asesora de Valoracion</b></label>
                                    <select name="id_asesora_valoracion" id="id_asesora_valoracion" class="form-control select2 disabled">
                                        <option value="">Seleccione</option>
                                    </select>
                                </div> -->




                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for=""><b>Origen</b></label>
                                        <input type="text" name="origen" class="form-control form-control-user disabled" id="origen">
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for=""><b>Forma de pago (Contado/Financiación)</b></label>
                                        <input type="text" name="forma_pago" class="form-control form-control-user disabled" id="forma_pago">
                                    </div>
                                </div>



                            </div>
                        </div>





                    </div>



                    <div class="col-md-6">

                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for=""><b>Facebook</b></label>
                                <input type="text" name="facebook" class="form-control form-control-user" id="facebook">
                            </div>

                            <div class="form-group col-md-6">
                                <label for=""><b>Instagram</b></label>
                                <input type="text" name="instagram" class="form-control form-control-user" id="instagram">
                            </div>
                        </div>



                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for=""><b>Twitter</b></label>
                                <input type="text" name="twitter" class="form-control form-control-user" id="twitter">
                            </div>

                            <div class="form-group col-md-6">
                                <label for=""><b>Youtube</b></label>
                                <input type="text" name="youtube" class="form-control form-control-user" id="youtube">
                            </div>
                        </div>


                        <div class="row">
                            <div class="form-group col-md-12">
                                <label for=""><b>Link Fotos de Google</b></label>
                                <input type="text" name="photos_google" class="form-control form-control-user" id="photos_google">
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-6">
                                <label for=""><b>PRP</b></label>
                                <select name="prp" id="prp" class="form-control select2 select2-hidden-accessible">
                                    <option value="No">No</option>
                                    <option value="Si">Si</option>
                                </select>
                            </div>
                        </div>




                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for=""><b>Comentarios</b></label>
                                    <!-- <textarea name="observaciones" id="observaciones-store" class="form-control" cols="30" rows="5"></textarea> -->
                                    <textarea id="summernote" name="comment"></textarea>
                                </div>
                            </div>
                        </div>




                        <br>
                        <br>


                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for=""><b>Quieres Crear una Tarea?</b></label>
                                    <div class="custom-control custom-switch">
                                        <input type="checkbox" class="custom-control-input" name="create_task_client" id="create_task_client" value="1">
                                        <label class="custom-control-label" for="create_task_client">Si</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row" id="content_create_task" style="display:none">

                            

                            <div class="col-md-12">
                            <h3>Crear una Tarea</h3>
                                <div class="row">
                                    <div class="col-md-12">
                                    <div class="form-group">
                                            <label for=""><b>Responsable</b></label>
                                            <select name="responsable" id="responsable" class="form-control getUsers select2">
                                                <option value="">Seleccione</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>



                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for=""><b>Asunto</b></label>
                                            <input type="text" name="issue" id="issue-store" class="form-control" >
                                        </div>
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="col-md-6">
                                    <div class="form-group">
                                            <label for=""><b>Fecha</b></label>
                                            <input type="date" name="fecha" id="fecha-store" class="form-control" min="<?= date("Y-m-d")?>">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                    <div class="form-group">
                                            <label for=""><b>Hora</b></label>
                                            <input type="time" name="time" id="time-store" class="form-control">
                                        </div>
                                    </div>
                                </div>



                                <div class="row">
                                    <div class="col-md-12">
                                    <div class="form-group">
                                            <label for=""><b>Seguidores</b></label>
                                            <select name="followers[]" id="followers-store" class="form-control getUsers select2"  multiple>
                                                <option value="">Seleccione</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>





                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for=""><b>Estatus</b></label>
                                            <select name="status_task" id="status_task-store" class="form-control" required>
                                                <option value="Abierta">Abierta</option>
                                                
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>

                        </div>


                        
                    </div>

                </div>


                <div class="row">
                    <div class="col md-12">
                        <label for=""><br><b>Direccion</b></label>
                        <textarea name="direccion" placeholder="PJ. Calle 47A #6AB-30" id="direccion" class="form-control disabled" cols="30" rows="10"></textarea>
                    </div>
                </div>
              </div>


              <div class="tab-pane fade tab_content1" id="info-add" role="tabpanel" aria-labelledby="patient_record">

                    <div class="row">

                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-4">
                                    <label for=""><b>Categoria</b></label>
                                    <div class="form-group valid-required">
                                        <select name="id_category" class="form-control" id="category"></select>
                                    </div>
                                </div>
                                
                                <div class="col-md-4">
                                    <label for=""><b>Sub Categoria</b></label>
                                    <div class="form-group valid-required">
                                        <select  class="form-control" id="sub_category"></select>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <br>
                                    <button type="button" id="btn-add-surgerie" class="btn btn-primary btn-user" >
                                        Agregar <i class="fa fa-pl"></i>
                                    </button>
                                </div>
                            </div>


                            <div class="row">
                                <div class="col-md-12"> 
                                    <div class="form-group">
                                        <label for=""><b>Observaciones adicionales</b></label>
                                        <textarea class="form-control" name="observations" id="observations"></textarea>
                                    </div>
                                </div>
                            </div>

                        </div>



                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-12">
                                    <table class="table table-bordered" id="tablecx"  width="100%" cellspacing="0">

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
                                <input type="text" name="current_size" class="form-control form-control-user" id="current_size" placeholder="PJ. 12">
                            </div>
                        </div>
                    
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for=""><b>Talla en que quiere quedar</b></label>
                                <input type="text" name="desired_size" class="form-control form-control-user" id="desired_size" placeholder="PJ. 16">
                            </div>
                        </div>


                        <div class="col-md-4">
                            <div class="form-group">
                                <label for=""><b>Vol Implante</b></label>
                                <input type="text" name="implant_volumem" class="form-control form-control-user" id="implant_volumem" placeholder="PJ. 11">
                            </div>
                        </div>


                        <div class="col-md-4">
                            <div class="form-group">
                                <label for=""><b>Vol Implante</b></label>
                                <input type="text" name="implant_volumem" class="form-control form-control-user" id="implant_volumem" placeholder="PJ. 11">
                            </div>
                        </div>
                        
                    </div>
              </div>






              <div class="tab-pane fade tab_content1" id="init-history" role="tabpanel" aria-labelledby="patient_record">
              
                    <div class="row">

                        <div class="col-md-7">

                            <div class="row">
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <label for=""><b>EPS</b></label>
                                        <input type="text" name="eps" class="form-control form-control-user" id="eps" placeholder="PJ. EPS SURAMERICANA S.A.">
                                    </div>
                                </div>
                            
                                <div class="col-md-9">
                                    <div class="form-group">
                                        <label for=""><b>Estatura</b></label>
                                        <input type="text" name="height" class="form-control form-control-user" id="height" placeholder="PJ. 1.50">
                                    </div>
                                </div>


                                <div class="col-md-9">
                                    <div class="form-group">
                                        <label for=""><b>Peso</b></label>
                                        <input type="text" name="weight" class="form-control form-control-user" id="weight" placeholder="PJ. 50Kg">
                                    </div>
                                </div>


                                <div class="col-md-4">
                                    <label for="children"><b>¿Tiene hijos?</b></label>
                                    <label class='container-check'>
                                        <input type='checkbox' name='children' class='checkitem chk-col-blue' id='children' value='1'>
                                        <span class='checkmark'></span>
                                        <label for=''></label>
                                    </label>
                                </div>

                                <div class="col-md-5">
                                    <label for="number_children"><b>Numero de Hijos</b></label>
                                    <input type="number" name="number_children" class="form-control form-control-user" readonly id="number_children" placeholder="PJ. 1">
                                </div>

                            </div>
                        </div>


                        <div class="col-md-5">
                            <div class="row">

                              
                                <div class="col-md-6">
                                    <label for="alcohol"><b>Alcohol</b></label>
                                    <label class='container-check'>
                                        <input type='checkbox' name='alcohol' class='checkitem chk-col-blue' id='alcohol' value='1'>
                                        <span class='checkmark'></span>
                                        <label for=''></label>
                                    </label>
                                </div>


                                <div class="col-md-6">
                                    <label for="smoke"><b>Fuma</b></label>
                                    <label class='container-check'>
                                        <input type='checkbox' name='smoke' class='checkitem chk-col-blue' id='smoke' value='1'>
                                        
                                        <span class='checkmark'></span>
                                        <label for=''></label>
                                    </label>
                                </div>


                                <div class="col-md-4">
                                    <label for="surgery"><b>¿Se ha practicado alguna cirugía?</b></label>
                                    <label class='container-check'>
                                        <input type='checkbox' name='surgery' class='checkitem chk-col-blue' id='surgery' value='1'>
                                        <span class='checkmark'></span>
                                        <label for=''></label>
                                    </label>
                                </div>


                                <div class="col-md-8">
                                        <label for="previous_surgery"><b>Cirugías Anteriores</b></label>
                                    <input type="text" name="previous_surgery" class="form-control form-control-user" readonly id="previous_surgery" placeholder="PJ. Mamaria">
                                </div>



                                <div class="col-md-4">
                                    <label for="disease"><b>¿Sufre alguna enfermedad importante?</b></label>
                                    <label class='container-check'>
                                        <input type='checkbox' name='disease' class='checkitem chk-col-blue' id='disease' value='1'>
                                        <span class='checkmark'></span>
                                        <label for=''></label>
                                    </label>
                                </div>


                                <div class="col-md-8">
                                        <label for="major_disease"><b>Cual/es</b></label>
                                    <input type="text" name="major_disease" class="form-control form-control-user" readonly id="major_disease" placeholder="PJ. Asma">
                                </div>



                                <div class="col-md-4">
                                    <label for="medication"><b>¿Toma algún medicamento?</b></label>
                                    <label class='container-check'>
                                        <input type='checkbox' name='medication' class='checkitem chk-col-blue' id='medication' value='1'>
                                        <span class='checkmark'></span>
                                        <label for=''></label>
                                    </label>
                                </div>


                                <div class="col-md-8">
                                        <label for="drink_medication"><b>Medicamentos que toma</b></label>
                                    <input type="text" name="drink_medication" class="form-control form-control-user" readonly id="drink_medication" placeholder="PJ. Asma">
                                </div>



                                <div class="col-md-4">
                                    <label for="allergic"><b>¿Es alegic@ a algún medicamento o sutura?</b></label>
                                    <label class='container-check'>
                                        <input type='checkbox' name='allergic' class='checkitem chk-col-blue' id='allergic' value='1'>
                                        <span class='checkmark'></span>
                                        <label for=''></label>
                                    </label>
                                </div>


                                <div class="col-md-8">
                                        <label for="allergic_medication"><b>A que medicamentos o Suturas es Alergic@?</b></label>
                                    <input type="text" name="allergic_medication" class="form-control form-control-user" readonly id="allergic_medication" placeholder="PJ. Acetaminofen" >
                                </div>


                            </div>
                        </div>

                    </div>

                    <br><br>

                    
              </div>










              <div class="tab-pane fade tab_content1-0" id="info-credit-patient" role="tabpanel" aria-labelledby="patient_record">
              
                    <div class="row">

                        <div class="col-md-4">
                            <label for="dependent_independent"><b>Dependiente / independiente</b></label>
                            <input type="text" name="dependent_independent" class="form-control form-control-user"  id="dependent_independent" placeholder="PJ. Dependiente">
                        </div>

                        <div class="col-md-4">
                            <label for="type_contract"><b>Tipo de Contrato</b></label>
                            <input type="text" name="type_contract" class="form-control form-control-user"  id="type_contract" placeholder="PJ. Contado">
                        </div>


                        <div class="col-md-4">
                            <label for="antiquity"><b>Antiguedad</b></label>
                            <input type="text" name="antiquity" class="form-control form-control-user"  id="antiquity" placeholder="PJ. 1 Año">
                        </div>

                    </div>

                    <br><br>

                    <div class="row">

                        <div class="col-md-4">
                            <label for="average_monthly_income"><b>Promedio de Ingresos Mensuales</b></label>
                            <input type="number" name="average_monthly_income" class="form-control form-control-user"  id="average_monthly_income" placeholder="PJ. 1 Año">
                        </div>


                        <div class="col-md-4">
                            <label for="previous_credits"><b>Créditos Anteriores</b></label>
                            <input type="text" name="previous_credits" class="form-control form-control-user"  id="previous_credits" placeholder="PJ. 1 Año">
                        </div>


                        <div class="col-md-4">
                            <label for="previous_credits"><b>Esta reportado</b></label>
                            <input type="text" name="reported" class="form-control form-control-user"  id="reported" placeholder="">
                        </div>

                    </div>

                    <br><br>




                    <div class="row">

                        <div class="col-md-8">
                            <label for="average_monthly_income"><b>Cuenta Bancaria</b></label>
                            <input type="text" name="bank_account" class="form-control form-control-user"  id="bank_account" placeholder="PJ. 1 Año">
                        </div>

                        <div class="col-md-2">
                            <label for="properties"><b>Propiedades</b></label>
                            <label class='container-check'>
                                <input type='checkbox' name='properties' class='checkitem chk-col-blue' id='properties' value='1'>
                                <span class='checkmark'></span>
                                <label for=''></label>
                            </label>
                        </div>

                        <div class="col-md-2">
                            <label for="vehicle"><b>Vehículo</b></label>
                            <label class='container-check'>
                                <input type='checkbox' name='vehicle' class='checkitem chk-col-blue' id='vehicle' value='1'>
                                <span class='checkmark'></span>
                                <label for=''></label>
                            </label>
                        </div>

                    </div>

                    <br><br>
                    
              </div>



              <div class="tab-pane fade tab_content1-0" id="info-valuations-store" role="tabpanel" aria-labelledby="patient_record">
                
                <div class="embed-responsive embed-responsive-16by9">

                    <iframe class="embed-responsive-item " id="iframeValuationsStore" allowfullscreen="">

                    </iframe>

                </div>
                   
                    <br><br>
                    
              </div>



              <div class="tab-pane fade tab_content1-0" id="info-preanestesia-store" role="tabpanel" aria-labelledby="patient_record">
                <div class="embed-responsive embed-responsive-16by9">
                    <iframe class="embed-responsive-item " id="iframepPreanestesiaStore" allowfullscreen="">
                    </iframe>
                </div>
                <br><br>
              </div>



              <div class="tab-pane fade tab_content1-0" id="info-cirugia-store" role="tabpanel" aria-labelledby="patient_record">
                <div class="embed-responsive embed-responsive-16by9">
                    <iframe class="embed-responsive-item " id="iframepCirugiaStore" allowfullscreen="">
                    </iframe>
                </div>
                <br><br>
              </div>



              <div class="tab-pane fade tab_content1-0" id="info-revision-store" role="tabpanel" aria-labelledby="patient_record">
                <div class="embed-responsive embed-responsive-16by9">
                    <iframe class="embed-responsive-item " id="iframepRevisionStore" allowfullscreen="">
                    </iframe>
                </div>
                <br><br>
              </div>












        </div>

        

        <input type="hidden" name="id_user" class="id_user">
        <input type="hidden" name="token" class="token">

        <input type="hidden" name="id_modulo_vista_hidden" id="id_modulo_vista_hidden">
          <br>
        </div>
          <center>

            <button type="button"  class="btn btn-danger btn-user" onclick="prev('#cuadro2')">
                Cancelar
            </button>
            <button id="btn-store" class="btn btn-primary btn-user">
                Registrar
            </button>

          </center>
          <br>
          <br>
      </form>
      
    </div>

