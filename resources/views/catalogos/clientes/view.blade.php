<div class="card shadow mb-4 hidden" id="cuadro3">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Consulta de pacientes</h6>
  </div>
  <div class="card-body">
      <form class="user" autocomplete="off" method="post" id="form-view" enctype="multipart/form-data">
        @csrf
        
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li  class="nav-item">
                <a id="tab0" class="nav-link active" id="patient_record_view" data-toggle="tab" href="#init_view" role="tab" aria-controls="init" aria-selected="true">Ficha</a>
            </li>
            <li  class="nav-item">
                <a id="tab1" class="nav-link" id="information_aditionals_view" data-toggle="tab" href="#info-add-view" role="tab" aria-controls="info-add" aria-selected="false">Info Cirugia</a>
            </li>

            <li  class="nav-item">
                <a id="tab2" class="nav-link" id="init_history_view" data-toggle="tab" href="#init-history-view" role="tab" aria-controls="info-add" aria-selected="false">Historial Clinico</a>
            </li>

            <li  class="nav-item">
                <a id="tab3" class="nav-link" id="info_credit_patient_view" data-toggle="tab" href="#info-credit-patient-view" role="tab" aria-controls="info-add" aria-selected="false">Info Crediticia</a>
            </li>


            <li  class="nav-item" id="tab4_view">
                <a id="tab4" class="nav-link"  data-toggle="tab" href="#info-valuations-view" role="tab" aria-controls="info-add" aria-selected="false">Valoraciones</a>
            </li>


            <li  class="nav-item" id="tab5_view"> 
                <a id="tab4" class="nav-link"  data-toggle="tab" href="#info-preanestesia-view" role="tab" aria-controls="info-add" aria-selected="false">Pre Anestesias</a>
            </li>


            <li  class="nav-item" id="tab6_view"> 
                <a id="tab4" class="nav-link"  data-toggle="tab" href="#info-cirugias-view" role="tab" aria-controls="info-add" aria-selected="false">Cirugias</a>
            </li>

            <li  class="nav-item" id="tab7_view">
                <a id="tab4" class="nav-link"  data-toggle="tab" href="#info-revision-view" role="tab" aria-controls="info-add" aria-selected="false">Revisiones</a>
            </li>

            <li  class="nav-item" id="tab8_view">
                <a id="tab4" class="nav-link"  data-toggle="tab" href="#info-tracing-view" role="tab" aria-controls="info-add" aria-selected="false">Seguimientos</a>
            </li>


        </ul>
        <br><br>



        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active tab_content0" id="init_view" role="tabpanel" aria-labelledby="patient_record_view">

                <div class="row">
        
                    <div class="col-md-6">

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for=""><b>Estado</b></label>
                                    <select name="state" id="state_view" class="form-control select2" required>
                                        <option value="">Seleccione</option>
                                        <option value="No Contactada">No Contactada</option>
                                        <option value="Agendada">Agendada</option>
                                        <option value="Programada">Programada</option>
                                        <option value="Descartada">Descartada</option>
                                        <option value="Asesorada No Agendada"> Asesorada No Agendada</option>
                                        <option value="Llamada no Asesorada">Llamada no Asesorada</option>
                                        <option value="Aprobada">Aprobada</option>
                                        <option value="Operada">Operada</option>
                                        <option value="Valorada">Valorada</option>
                                        <option value="Asesorado por FB esperando contacto Telefonico">Asesorado por FB esperando contacto Telefonico</option>
                                        <option value="Re Agendada a Valoracion">Re Agendada a Valoracion</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for=""><b>Nombres</b></label>
                                    <input type="text" name="nombres" class="form-control form-control-user" id="nombre_view" placeholder="PJ. Carlos Javier" required>
                                </div>
                            </div>
                        
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for=""><b>Apellidos</b></label>
                                    <input type="text" name="apellidos" class="form-control form-control-user" id="apellido_view" placeholder="PJ. Cardenas" required>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-8">
                                <div class="form-group">
                                    <label for=""><b>Numero de identificacion</b></label>
                                    <input type="number" name="identificacion" class="form-control form-control-user" id="identificacion_view" placeholder="PJ. 23559081154" required>
                                </div>
                            </div>

                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for="identificacion_verify"><b>Cédula Verificada?</b></label>
                                    <label class='container-check'>
                                        <input type='checkbox' name='identificacion_verify' class='checkitem chk-col-blue' id='identificacion_verify_view' value='1'>
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
                                    <input type="date" name="fecha_nacimiento" class="form-control" id="fecha_nacimiento_view" placeholder="PJ. Cardenas" required>
                                </div>
                            </div>


                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for=""><b>Edad</b></label>
                                    <input type="text" name="year" class="form-control" id="year_view"  disabled>
                                </div>
                            </div>
                        </div>



                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for=""><b>Ciudad</b></label>
                                    <select name="city" id="city_view" class="form-control" required>
                                        <option value="">Seleccione</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for=""><b>Clinica</b></label>
                                    <select name="clinic" id="clinic_view" class="form-control" required>
                                        <option value="">Seleccione</option>
                                    </select>
                                </div>
                            </div>

                        </div>





                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for=""><b>Telefono</b></label>
                                    <input type="number" name="telefono" class="form-control form-control-user" id="telefono_view" placeholder="PJ. 315 2077862" required>
                                </div>


                                <div class="form-group">
                                    <label for=""><b>E-mail</b></label>
                                    <input type="text" name="email" class="form-control form-control-user" id="email_view" placeholder="PJ. correo@dominio.com" required>
                                </div>


                                <div class="form-group">
                                    <label for=""><b>Linea de Negocio</b></label>
                                    <select name="id_line" id="linea-negocio-view" class="form-control select2" required>
                                        <option value="">Seleccione</option>
                                    </select>
                                </div>


                                <div class="form-group">
                                    <label for=""><b>Asesora Responsable</b></label>
                                    <select name="id_user_asesora" id="asesora-view" class="form-control select2" required>
                                        <option value="">Seleccione</option>
                                    </select>
                                </div>


                                <!-- <div class="form-group">
                                    <label for=""><b>Asesora de Valoracion</b></label>
                                    <select name="id_asesora_valoracion" id="id_asesora_valoracion-view" class="form-control select2">
                                        <option value="">Seleccione</option>
                                    </select>
                                </div> -->




                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for=""><b>Origen</b></label>
                                        <input type="text" name="origen" class="form-control form-control-user" id="origen_view">
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for=""><b>Forma de pago (Contado/Financiación)</b></label>
                                        <input type="text" name="forma_pago" class="form-control form-control-user" id="forma_pago_view">
                                    </div>
                                </div>



                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for=""><b>Facebook</b></label>
                                        <input type="text" name="facebook" class="form-control form-control-user" id="facebook_view">
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for=""><b>Instagram</b></label>
                                        <input type="text" name="instagram" class="form-control form-control-user" id="instagram_view">
                                    </div>
                                </div>



                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for=""><b>Twitter</b></label>
                                        <input type="text" name="twitter" class="form-control form-control-user" id="twitter_view">
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label for=""><b>Youtube</b></label>
                                        <input type="text" name="youtube" class="form-control form-control-user" id="youtube_view">
                                    </div>
                                </div>


                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for=""><b>PRP</b></label>
                                        <select name="prp" id="prp_view" class="form-control select2 select2-hidden-accessible">
                                            <option value="No">No</option>
                                            <option value="Si">Si</option>
                                        </select>
                                    </div>
                                </div>


                            </div>
                        </div>





                    </div>



                    <div class="col-md-6">


                        <div class="row">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-3">
                                        <h3 id="code-view"></h3>
                                    </div>
                                    <div class="col-md-2">
                                        <span onclick="copyToClipboard('#code-view')" class='consultar btn btn-sm btn-primary waves-effect' data-toggle='tooltip' title='Consultar'><i class='fa fa-copy  ' style='margin-bottom:5px'></i></span> 
                                    </div>
                                    
                                </div>
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
                                <div id="logs_view"></div>
                            </div>
                        </div>



                        <br><br>


                        <div class="col-md-12">
                                <h4>Comentarios</h4>
                        </div>
                        <br><br>

                        <div class="row" id="comments">
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




                        
                    </div>

                </div>


                <div class="row">
                    <div class="col md-12">
                        <label for=""><br><b>Direccion</b></label>
                        <textarea name="direccion" placeholder="PJ. Calle 47A #6AB-30" id="direccion_view" class="form-control" cols="30" rows="10"></textarea>
                    </div>
                </div>
            </div>





            <div class="tab-pane fade tab_content1" id="info-add-view" role="tabpanel" aria-labelledby="patient_record">
                    


                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for=""><b>Nombre Cirugia</b></label>
                                <input type="text" name="name_surgery" class="form-control form-control-user" id="name_surgery_view" placeholder="PJ. Mastopexia">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for=""><b>Talla Actual</b></label>
                                <input type="text" name="current_size" class="form-control form-control-user" id="current_size_view" placeholder="PJ. 12">
                            </div>
                        </div>
                    
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for=""><b>Talla en que quiere quedar</b></label>
                                <input type="text" name="desired_size" class="form-control form-control-user" id="desired_size_view" placeholder="PJ. 16">
                            </div>
                        </div>


                        <div class="col-md-4">
                            <div class="form-group">
                                <label for=""><b>Vol Implante</b></label>
                                <input type="text" name="implant_volumem" class="form-control form-control-user" id="implant_volumem_view" placeholder="PJ. 11">
                            </div>
                        </div>


                    </div>
              </div>




              <div class="tab-pane fade tab_content1" id="init-history-view" role="tabpanel" aria-labelledby="patient_record">
              
                <div class="row">

                    <div class="col-md-7">

                        <div class="row">
                            <div class="col-md-9">
                                <div class="form-group">
                                    <label for=""><b>EPS</b></label>
                                    <input type="text" name="eps" class="form-control form-control-user" id="eps_view" placeholder="PJ. EPS SURAMERICANA S.A.">
                                </div>
                            </div>
                        
                            <div class="col-md-9">
                                <div class="form-group">
                                    <label for=""><b>Estatura</b></label>
                                    <input type="text" name="height" class="form-control form-control-user" id="height_view" placeholder="PJ. 1.50">
                                </div>
                            </div>


                            <div class="col-md-9">
                                <div class="form-group">
                                    <label for=""><b>Peso</b></label>
                                    <input type="text" name="weight" class="form-control form-control-user" id="weight_view" placeholder="PJ. 50Kg">
                                </div>
                            </div>


                            <div class="col-md-4">
                                <label for="children"><b>¿Tiene hijos?</b></label>
                                <label class='container-check'>
                                    <input type='checkbox' name='children' class='checkitem chk-col-blue' id='children_view' value='1'>
                                    <span class='checkmark'></span>
                                    <label for=''></label>
                                </label>
                            </div>

                            <div class="col-md-5">
                                <label for="number_children"><b>Numero de Hijos</b></label>
                                <input type="number" name="number_children" class="form-control form-control-user" disabled id="number_children_view" placeholder="PJ. 1">
                            </div>

                        </div>
                    </div>


                    <div class="col-md-5">
                        <div class="row">

                            
                            <div class="col-md-6">
                                <label for="alcohol"><b>Alcohol</b></label>
                                <label class='container-check'>
                                    <input type='checkbox' name='alcohol' class='checkitem chk-col-blue' id='alcohol_view' value='1'>
                                    <span class='checkmark'></span>
                                    <label for=''></label>
                                </label>
                            </div>


                            <div class="col-md-6">
                                <label for="smoke"><b>Fuma</b></label>
                                <label class='container-check'>
                                    <input type='checkbox' name='smoke' class='checkitem chk-col-blue' id='smoke_view' value='1'>
                                    
                                    <span class='checkmark'></span>
                                    <label for=''></label>
                                </label>
                            </div>


                            <div class="col-md-4">
                                <label for="surgery"><b>¿Se ha practicado alguna cirugía?</b></label>
                                <label class='container-check'>
                                    <input type='checkbox' name='surgery' class='checkitem chk-col-blue' id='surgery_view' value='1'>
                                    <span class='checkmark'></span>
                                    <label for=''></label>
                                </label>
                            </div>


                            <div class="col-md-8">
                                    <label for="previous_surgery"><b>Cirugías Anteriores</b></label>
                                <input type="text" name="previous_surgery" class="form-control form-control-user" disabled id="previous_surgery_view" placeholder="PJ. Mamaria">
                            </div>



                            <div class="col-md-4">
                                <label for="disease"><b>¿Sufre alguna enfermedad importante?</b></label>
                                <label class='container-check'>
                                    <input type='checkbox' name='disease' class='checkitem chk-col-blue' id='disease_view' value='1'>
                                    <span class='checkmark'></span>
                                    <label for=''></label>
                                </label>
                            </div>


                            <div class="col-md-8">
                                    <label for="major_disease"><b>Cual/es</b></label>
                                <input type="text" name="major_disease" class="form-control form-control-user" disabled id="major_disease_view" placeholder="PJ. Asma">
                            </div>



                            <div class="col-md-4">
                                <label for="medication"><b>¿Toma algún medicamento?</b></label>
                                <label class='container-check'>
                                    <input type='checkbox' name='medication' class='checkitem chk-col-blue' id='medication_view' value='1'>
                                    <span class='checkmark'></span>
                                    <label for=''></label>
                                </label>
                            </div>


                            <div class="col-md-8">
                                    <label for="drink_medication"><b>Medicamentos que toma</b></label>
                                <input type="text" name="drink_medication" class="form-control form-control-user" disabled id="drink_medication_view" placeholder="PJ. Asma">
                            </div>



                            <div class="col-md-4">
                                <label for="allergic"><b>¿Es alegic@ a algún medicamento o sutura?</b></label>
                                <label class='container-check'>
                                    <input type='checkbox' name='allergic' class='checkitem chk-col-blue' id='allergic_view' value='1'>
                                    <span class='checkmark'></span>
                                    <label for=''></label>
                                </label>
                            </div>


                            <div class="col-md-8">
                                    <label for="allergic_medication"><b>A que medicamentos o Suturas es Alergic@?</b></label>
                                <input type="text" name="allergic_medication" class="form-control form-control-user" disabled id="allergic_medication_view" placeholder="PJ. Acetaminofen" >
                            </div>


                        </div>
                    </div>

                </div>

                <br><br>
                
            </div>







                 <div class="tab-pane fade tab_content1-0" id="info-credit-patient-view" role="tabpanel" aria-labelledby="patient_record">
              
                    <div class="row">

                        <div class="col-md-4">
                            <label for="dependent_independent"><b>Dependiente / independiente</b></label>
                            <input type="text" name="dependent_independent" class="form-control form-control-user"  id="dependent_independent_view" placeholder="PJ. Dependiente">
                        </div>

                        <div class="col-md-4">
                            <label for="type_contract"><b>Tipo de Contrato</b></label>
                            <input type="text" name="type_contract" class="form-control form-control-user"  id="type_contract_view" placeholder="PJ. Contado">
                        </div>


                        <div class="col-md-4">
                            <label for="antiquity"><b>Antiguedad</b></label>
                            <input type="text" name="antiquity" class="form-control form-control-user"  id="antiquity_view" placeholder="PJ. 1 Año">
                        </div>

                    </div>

                    <br><br>

                    <div class="row">

                        <div class="col-md-4">
                            <label for="average_monthly_income"><b>Promedio de Ingresos Mensuales</b></label>
                            <input type="text" name="average_monthly_income" class="form-control form-control-user"  id="average_monthly_income_view" placeholder="PJ. 1 Año">
                        </div>


                        <div class="col-md-4">
                            <label for="previous_credits"><b>Créditos Anteriores</b></label>
                            <input type="text" name="previous_credits" class="form-control form-control-user"  id="previous_credits_view" placeholder="PJ. 1 Año">
                        </div>


                        <div class="col-md-4">
                            <label for="previous_credits"><b>Esta reportado</b></label>
                            <input type="text" name="reported" class="form-control form-control-user"  id="reported_view" placeholder="">
                        </div>

                    </div>

                    <br><br>




                    <div class="row">

                        <div class="col-md-8">
                            <label for="average_monthly_income"><b>Cuenta Bancaria</b></label>
                            <input type="text" name="bank_account" class="form-control form-control-user"  id="bank_account_view" placeholder="PJ. 1 Año">
                        </div>

                        <div class="col-md-2">
                            <label for="properties"><b>Propiedades</b></label>
                            <label class='container-check'>
                                <input type='checkbox' name='properties' class='checkitem chk-col-blue' id='properties_view' value='1'>
                                <span class='checkmark'></span>
                                <label for=''></label>
                            </label>
                        </div>

                        <div class="col-md-2">
                            <label for="vehicle"><b>Vehículo</b></label>
                            <label class='container-check'>
                                <input type='checkbox' name='vehicle' class='checkitem chk-col-blue' id='vehicle_view' value='1'>
                                <span class='checkmark'></span>
                                <label for=''></label>
                            </label>
                        </div>

                    </div>

                    <br><br>
                    
              </div>




              <div class="tab-pane fade tab_content1-0" id="info-valuations-view" role="tabpanel" aria-labelledby="patient_record">
                    <div class="embed-responsive embed-responsive-16by9">
                        <iframe class="embed-responsive-item " id="iframeValuationsView" allowfullscreen="">
                        </iframe>
                    </div>
                    <br><br>
              </div>



              <div class="tab-pane fade tab_content1-0" id="info-preanestesia-view" role="tabpanel" aria-labelledby="patient_record">
                    <div class="embed-responsive embed-responsive-16by9">
                        <iframe class="embed-responsive-item " id="iframepPreanestesiaView" allowfullscreen="">

                        </iframe>
                    </div>
                    <br><br>
              </div>


              <div class="tab-pane fade tab_content1-0" id="info-cirugias-view" role="tabpanel" aria-labelledby="patient_record">
                <div class="embed-responsive embed-responsive-16by9">
                    <iframe class="embed-responsive-item " id="iframepCirugiaView" allowfullscreen="">
                    </iframe>
                </div>
                <br><br>
              </div>



              <div class="tab-pane fade tab_content1-0" id="info-revision-view" role="tabpanel" aria-labelledby="patient_record">
                <div class="embed-responsive embed-responsive-16by9">
                    <iframe class="embed-responsive-item " id="iframepRevisionView" allowfullscreen="">
                    </iframe>
                </div>
                <br><br>
              </div>

              <div class="tab-pane fade tab_content1-0" id="info-tracing-view" role="tabpanel" aria-labelledby="patient_record">
                <div class="embed-responsive embed-responsive-16by9">
                    <iframe class="embed-responsive-item " id="iframepTracingView" allowfullscreen="">
                    </iframe>
                </div>
                <br><br>
              </div>







              


        </div>


        

        <input type="hidden" name="id_user" class="id_user">
        <input type="hidden" name="token" class="token">
          <br>
        </div>
          <center>

            <button type="button"  class="btn btn-danger btn-user" onclick="prev('#cuadro3')">
                Cancelar
            </button>

          </center>
          <br>
          <br>
      </form>
      
    </div>

