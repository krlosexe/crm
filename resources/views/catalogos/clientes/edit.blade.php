<div class="card shadow mb-4 hidden" id="cuadro4">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Edicion de pacientes</h6>
  </div>
  <div class="card-body">
      <form class="user" autocomplete="off" method="post" id="form-update" enctype="multipart/form-data">
        @csrf

        <input type="hidden" name="_method" value="put">


        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li  class="nav-item">
                <a id="tab0" class="nav-link active" id="patient_record_edit" data-toggle="tab" href="#init_edit" role="tab" aria-controls="init" aria-selected="true">Ficha Paciente</a>
            </li>
            <li  class="nav-item">
                <a id="tab1" class="nav-link" id="information_aditionals_edit" data-toggle="tab" href="#info-add-edit" role="tab" aria-controls="info-add" aria-selected="false">Cirugia A Programar</a>
            </li>

            <li  class="nav-item">
                <a id="tab2" class="nav-link" id="init_history_edit" data-toggle="tab" href="#init-history-edit" role="tab" aria-controls="info-add" aria-selected="false">Historial Clinico Inicial</a>
            </li>

            <li  class="nav-item">
                <a id="tab3" class="nav-link" id="info_credit_patient_edit" data-toggle="tab" href="#info-credit-patient-edit" role="tab" aria-controls="info-add" aria-selected="false">Informacion Crediticia</a>
            </li>

            <li  class="nav-item">
                <a id="tab4" class="nav-link" id="info_credit_patient_edit" data-toggle="tab" href="#info-valuations-edit" role="tab" aria-controls="info-add" aria-selected="false">Valoraciones</a>
            </li>


        </ul>

        <br><br>


        <div class="tab-content" id="myTabContent">

            <div class="tab-pane fade show active tab_content0" id="init_edit" role="tabpanel" aria-labelledby="patient_record_edit">

                <div class="row">
                    <div class="col-md-6">


                    <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for=""><b>Estado</b></label>
                                    <select name="state" id="state_edit" class="form-control select2" required>
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
                                    <input type="text" name="nombres" class="form-control form-control-user" id="nombre_edit" placeholder="PJ. Carlos Javier" required>
                                </div>
                            </div>
                        
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for=""><b>Apellidos</b></label>
                                    <input type="text" name="apellidos" class="form-control form-control-user" id="apellido_edit" placeholder="PJ. Cardenas" required>
                                </div>
                            </div>
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
                                    <input type="date" name="fecha_nacimiento" class="form-control" id="fecha_nacimiento_edit" placeholder="PJ. Cardenas" >
                                </div>
                            </div>


                            <div class="col-sm-4">
                                <div class="form-group">
                                    <label for=""><b>Edad</b></label>
                                    <input type="text" name="year" class="form-control" id="year_edit"  disabled>
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


                    </div>



                    <div class="col-md-6">

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for=""><b>Telefono</b></label>
                                    <input type="number" name="telefono" class="form-control form-control-user" id="telefono_edit" placeholder="PJ. 315 2077862" required>
                                </div>


                                <div class="form-group">
                                    <label for=""><b>E-mail</b></label>
                                    <input type="text" name="email" class="form-control form-control-user" id="email_edit" placeholder="PJ. correo@dominio.com" required>
                                </div>

                                <div class="form-group">
                                    <label for=""><b>Linea de Negocio</b></label>
                                    <select name="id_line" id="linea-negocio-edit" class="form-control select2" required>
                                        <option value="">Seleccione</option>
                                    </select>
                                </div>


                                <div class="form-group">
                                    <label for=""><b>Asesora</b></label>
                                    <select name="id_user_asesora" id="asesora-edit" class="form-control select2" required>
                                        <option value="">Seleccione</option>
                                    </select>
                                </div>


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
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for=""><b>Nombre Cirugia</b></label>
                                <input type="text" name="name_surgery" class="form-control form-control-user" id="name_surgery_edit" placeholder="PJ. Mastopexia">
                            </div>
                        </div>
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
                                <input type="number" name="number_children" class="form-control form-control-user" disabled id="number_children_edit" placeholder="PJ. 1">
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
                                <input type="text" name="previous_surgery" class="form-control form-control-user" disabled id="previous_surgery_edit" placeholder="PJ. Mamaria">
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
                                <input type="text" name="major_disease" class="form-control form-control-user" disabled id="major_disease_edit" placeholder="PJ. Asma">
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
                                <input type="text" name="drink_medication" class="form-control form-control-user" disabled id="drink_medication_edit" placeholder="PJ. Asma">
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
                                <input type="text" name="allergic_medication" class="form-control form-control-user" disabled id="allergic_medication_edit" placeholder="PJ. Acetaminofen" >
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
                            <input type="text" name="dependent_independent" class="form-control form-control-user"  id="dependent_independent_edit" placeholder="PJ. Dependiente">
                        </div>

                        <div class="col-md-4">
                            <label for="type_contract"><b>Tipo de Contrato</b></label>
                            <input type="text" name="type_contract" class="form-control form-control-user"  id="type_contract_edit" placeholder="PJ. Contado">
                        </div>


                        <div class="col-md-4">
                            <label for="antiquity"><b>Antiguedad</b></label>
                            <input type="text" name="antiquity" class="form-control form-control-user"  id="antiquity_edit" placeholder="PJ. 1 Año">
                        </div>

                    </div>

                    <br><br>

                    <div class="row">

                        <div class="col-md-4">
                            <label for="average_monthly_income"><b>Promedio de Ingresos Mensuales</b></label>
                            <input type="text" name="average_monthly_income" class="form-control form-control-user"  id="average_monthly_income_edit" placeholder="PJ. 1 Año">
                        </div>


                        <div class="col-md-4">
                            <label for="previous_credits"><b>Créditos Anteriores</b></label>
                            <input type="text" name="previous_credits" class="form-control form-control-user"  id="previous_credits_edit" placeholder="PJ. 1 Año">
                        </div>


                        <div class="col-md-4">
                            <label for="previous_credits"><b>Esta reportado</b></label>
                            <input type="text" name="reported" class="form-control form-control-user"  id="reported_edit" placeholder="">
                        </div>

                    </div>

                    <br><br>




                    <div class="row">

                        <div class="col-md-8">
                            <label for="average_monthly_income"><b>Cuenta Bancaria</b></label>
                            <input type="text" name="bank_account" class="form-control form-control-user"  id="bank_account_edit" placeholder="PJ. 1 Año">
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
                    
              </div>








              <div class="tab-pane fade tab_content1-0" id="info-valuations-edit" role="tabpanel" aria-labelledby="patient_record">
              
                <div class="embed-responsive embed-responsive-16by9">

                    <iframe class="embed-responsive-item " id="iframeValuationsEdit" allowfullscreen="">

                    </iframe>

                </div>
                   
                    <br><br>
                    
              </div>


        </div>

        



        <input type="hidden" name="id_user" class="id_user">
        <input type="hidden" name="token" class="token">
        <input type="hidden" name="id_user_edit" id="id_edit">
          <br>
        </div>
          <center>

            <button type="button"  class="btn btn-danger btn-user" onclick="prev('#cuadro4')">
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

