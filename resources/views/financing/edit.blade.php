<div class="card shadow mb-4 hidden" id="cuadro4">

    <ul class="nav nav-tabs p-2" id="myTab" role="tablist">
        <li class="nav-item">
            <a id="tab1-0" class="nav-link active" data-toggle="tab" href="#home-edit" role="tab" aria-controls="home" aria-selected="true">Editar Solicitud</a>
        </li>
        <li class="nav-item">
            <a id="tab2-1" class="nav-link" data-toggle="tab" href="#person-data-edit" role="tab" aria-controls="profile" aria-selected="false">Datos Personales</a>
        </li>
        <li class="nav-item">
            <a id="tab3-1" class="nav-link" data-toggle="tab" href="#activity-data-economic" role="tab" aria-controls="profile" aria-selected="false">Actividad Economica</a>
        </li>
        <li class="nav-item">
            <a id="tab4-1" class="nav-link" data-toggle="tab" href="#bienes-data" role="tab" aria-controls="profile" aria-selected="false">Bienes</a>
        </li>
        <li class="nav-item">
            <a id="tab5-1" class="nav-link" data-toggle="tab" href="#cuotas-data" role="tab" aria-controls="profile" aria-selected="false">Coutas</a>
        </li>
    </ul>

    <div class="tab-content" id="myTabContent">
        <div class="tab-pane fade show active tab_content1-0" id="home-edit" role="tabpanel" aria-labelledby="home-tab">
            <div class="card-body">
                <form class="user" autocomplete="off" method="post" id="form-update" enctype="multipart/form-data">

                    @csrf
                    <input type="hidden" name="_method" value="put">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for=""><b>Cliente</b></label>
                                        <input type="text" name="client" id="client" class="form-control" required>
                                    </div>
                                </div>
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
                                    <div class="form-group">
                                        <label for=""><b>Dependiente o independiente ?</b></label>
                                        <input type="text" name="dependent_independent" id="dependent_independent" class="form-control" required>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for=""><b>Tiene Inicial ?</b></label>
                                        <input type="text" name="have_initial" id="have_initial" class="form-control" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for=""><b>Esta Reportado ?</b></label>
                                        <input type="text" name="reported" id="reported" class="form-control" required>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for=""><b>Dias para Tomar el Credito</b></label>
                                        <input type="number" name="days_limit" id="days_limit" class="form-control" value="1">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">

                                    <div class="row">
                                        <div class="col-sm-12 text-center">
                                            <label for=""><b>Cotizacion</b></label>
                                            <div>
                                                <div class="file-loading">
                                                    <input id="file-input-edit" name="file" type="file">
                                                </div>
                                            </div>
                                            <div class="kv-avatar-hintss">
                                                <small>Seleccione una foto</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for=""><b>Estatus</b></label>
                                        <select name="status" id="status" class="form-control" required>
                                            <option value="">Seleccione</option>
                                            <option value="Pendiente">Pendiente</option>
                                            <option value="Aprobado">Aprobado</option>
                                            <option value="Rechazado">Rechazado</option>
                                            <option value="Desembolsado">Desembolsado</option>

                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <button type="button" class="btn btn-primary btn-user" id="view_plan_pays">
                                    Ver Plan de Pagos
                                </button>
                            </div>

                        </div>

                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="pay_to_study_credit"><b>Pago estudio de credito ?</b></label>
                                    <label class='container-check'>
                                        <input type='checkbox' name='pay_to_study_credit' class='checkitem chk-col-blue' id='pay_to_study_credit' value='1'>
                                        <span class='checkmark'></span>
                                        <label for=''></label>
                                    </label>
                                </div>

                                <div class="col-md-6">
                                    <label for="average_monthly_income"><b>Metodo de Pago</b></label>
                                    <input type="text" name="payment_method" id="payment_method" class="form-control form-control-user" id="method_pay_study_credit_edit" placeholder="PJ. Transferencia">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-5">
                                    <label for="average_monthly_income"><b>Fecha de Pago</b></label>
                                    <input type="text" class="form-control form-control-user" id="date_pay_study_credit_edit">
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
                            <!-- <button class="btn btn-primary btn-user" id="process_status">
                                Procesar
                            </button> -->
                            <br><br>
                            <br><br>
                            <div class="row">
                                <div class="col-md-12">
                                    <h4>Requisitos</h4>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <label for="average_monthly_income"><b>Con Incial de</b></label>
                                            <input type="text" class="form-control form-control-user" name="initial" id="initial">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-6">

                                            <br>
                                            <br>

                                            <div class="row">
                                                <h5>Dependientes</h5>
                                            </div>
                                            <div class="row">
                                                <label class='container-check'>
                                                    <input type='checkbox' name='working_letter' class='checkitem chk-col-blue' id='working_letter' value='1'>
                                                    <span class='checkmark'></span>
                                                    <label for="working_letter"><b>Carta Laboral</b></label>
                                                </label>
                                            </div>

                                            <div class="row">
                                                <label class='container-check'>
                                                    <input type='checkbox' name='payment_stubs' class='checkitem chk-col-blue' id='payment_stubs' value='1'>
                                                    <span class='checkmark'></span>
                                                    <label for="payment_stubs"><b>Ultimas tres colillas de pago</b></label>
                                                </label>
                                            </div>
                                            <div class="row">
                                                <label class='container-check'>
                                                    <input type='checkbox' name='extractos_bancarios_dependiente' class='checkitem chk-col-blue' id='extractos_bancarios_dependiente' value='1'>
                                                    <span class='checkmark'></span>
                                                    <label for="extractos_bancarios_dependiente"><b>Extractos bancarios último trimestre                                                    </b></label>
                                                </label>
                                            </div>


                                            <div class="row">
                                                <label class='container-check'>
                                                    <input type='checkbox' name='copy_of_id' class='checkitem chk-col-blue' id='copy_of_id' value='1'>
                                                    <span class='checkmark'></span>
                                                    <label for="copy_of_id"><b>Copia de la cedula</b></label>
                                                </label>
                                            </div>



                                        </div>
                                        <div class="col-6">
                                            <br>
                                            <br>
                                            <div class="row">
                                                <h5>Intependintes</h5>
                                            </div>


                                            <div class="row">
                                                <label class='container-check'>
                                                    <input type='checkbox' name='copy_of_id' class='checkitem chk-col-blue' id='copy_of_id2' value='1'>
                                                    <span class='checkmark'></span>
                                                    <label for="copy_of_id2"><b>Copia de la cedula</b></label>
                                                </label>
                                            </div>


                                            <div class="row">
                                                <label class='container-check'>
                                                    <input type='checkbox' name='bank_statements' class='checkitem chk-col-blue' id='bank_statements' value='1'>
                                                    <span class='checkmark'></span>
                                                    <label for="bank_statements"><b>Extractos bancarios del ultimo trimestre O Certificación de ingresos por parte de un contador</b></label>
                                                </label>
                                            </div>


                                            <div class="row">
                                                <label class='container-check'>
                                                    <input type='checkbox' name='rut_chamber_of_commerce' class='checkitem chk-col-blue' id='rut_chamber_of_commerce' value='1'>
                                                    <span class='checkmark'></span>
                                                    <label for="rut_chamber_of_commerce"><b>Rut o cámara de comercio
                                                    </b></label>
                                                </label>
                                            </div>


                                            <div class="row">
                                                <label class='container-check'>
                                                    <input type='checkbox' name='declaracion_renta' class='checkitem chk-col-blue' id='declaracion_renta' value='1'>
                                                    <span class='checkmark'></span>
                                                    <label for="declaracion_renta"><b>Declaración de Renta (si no declara, presentar una carta de un contador con la tarjeta profesional, certificando los ingresos)
                                                    </b></label>
                                                </label>
                                            </div>






                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <h4>Opcional</h4>

                                    <div class="row">
                                        <div class="col-6">
                                            <div class="row">
                                                <label class='container-check'>
                                                    <input type='checkbox' name='co_debtor' class='checkitem chk-col-blue' id='co_debtor' value='1'>
                                                    <span class='checkmark'></span>
                                                    <label for="co_debtor"><b>Codeudor</b></label>
                                                </label>
                                            </div>

                                            <div class="row">
                                                <label class='container-check'>
                                                    <input type='checkbox' name='property_tradition' class='checkitem chk-col-blue' id='property_tradition' value='1'>
                                                    <span class='checkmark'></span>
                                                    <label for="property_tradition"><b>Certificado de libertad y tradicion del inmueble</b></label>
                                                </label>
                                            </div>

                                            <div class="row">
                                                <label class='container-check'>
                                                    <input type='checkbox' name='license_plate_copy' class='checkitem chk-col-blue' id='license_plate_copy' value='1'>
                                                    <span class='checkmark'></span>
                                                    <label for="license_plate_copy"><b>Copia de la matriculas</b></label>
                                                </label>
                                            </div>

                                        </div>

                                    </div>
                                </div>


                                <div class="col-md-6">
                                    <h4>Codeudor Independiente</h4>

                                    <div class="row">
                                        <div class="col-12">

                                            <div class="row">
                                                <label class='container-check'>
                                                    <input type='checkbox' name='cedula_codeudor' class='checkitem chk-col-blue' id='cedula_codeudor' value='1'>
                                                    <span class='checkmark'></span>
                                                    <label for="cedula_codeudor"><b>Fotocopia de la cedula</b></label>
                                                </label>
                                            </div>

                                            <div class="row">
                                                <label class='container-check'>
                                                    <input type='checkbox' name='rut_camara_comercio_codeudor' class='checkitem chk-col-blue' id='rut_camara_comercio_codeudor' value='1'>
                                                    <span class='checkmark'></span>
                                                    <label for="rut_camara_comercio_codeudor"><b>Rut o cámara de comercio
                                                    </b></label>
                                                </label>
                                            </div>

                                            <div class="row">
                                                <label class='container-check'>
                                                    <input type='checkbox' name='extractos_bancarios_codeudor' class='checkitem chk-col-blue' id='extractos_bancarios_codeudor' value='1'>
                                                    <span class='checkmark'></span>
                                                    <label for="extractos_bancarios_codeudor"><b>Extractos bancarios último trimestre
                                                    </b></label>
                                                </label>
                                            </div>


                                            <div class="row">
                                                <label class='container-check'>
                                                    <input type='checkbox' name='declaracion_renta_codeudor' class='checkitem chk-col-blue' id='declaracion_renta_codeudor' value='1'>
                                                    <span class='checkmark'></span>
                                                    <label for="declaracion_renta_codeudor"><b>Declaración de renta (si no declara renta, presentar una carta de un contador con la tarjeta profesional, certificando los ingresos)

                                                    </b></label>
                                                </label>
                                            </div>

                                        </div>

                                    </div>
                                </div>



                            </div>


                            <div class="row">
                                <div class="col-md-12">
                                    <h4>Codeudor Empleado</h4>

                                    <div class="row">
                                        <div class="col-12">

                                            <div class="row">
                                                <label class='container-check'>
                                                    <input type='checkbox' name='cedula_codeudor' class='checkitem chk-col-blue' id='cedula_codeudor2' value='1'>
                                                    <span class='checkmark'></span>
                                                    <label for="cedula_codeudor2"><b>Fotocopia de la cedula</b></label>
                                                </label>
                                            </div>

                                            <div class="row">
                                                <label class='container-check'>
                                                    <input type='checkbox' name='carta_laboral_codeudor' class='checkitem chk-col-blue' id='carta_laboral_codeudor' value='1'>
                                                    <span class='checkmark'></span>
                                                    <label for="carta_laboral_codeudor"><b>Carta Laboral
                                                    </b></label>
                                                </label>
                                            </div>

                                            <div class="row">
                                                <label class='container-check'>
                                                    <input type='checkbox' name='extractos_bancarios_codeudor' class='checkitem chk-col-blue' id='extractos_bancarios_codeudor2' value='1'>
                                                    <span class='checkmark'></span>
                                                    <label for="extractos_bancarios_codeudor2"><b>Extractos bancarios último trimestre
                                                    </b></label>
                                                </label>
                                            </div>


                                            <div class="row">
                                                <label class='container-check'>
                                                    <input type='checkbox' name='colillas_nomina_codeudor' class='checkitem chk-col-blue' id='colillas_nomina_codeudor' value='1'>
                                                    <span class='checkmark'></span>
                                                    <label for="colillas_nomina_codeudor"><b>Colillas de los últimos tres (3) desprendibles de pago de nomina


                                                    </b></label>
                                                </label>
                                            </div>

                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <br><br>
                            <table id="table-2" style="width: 100%; text-align: right; border: 1px gray solid; border-collapse: collapse; display: none;">
                                <caption>Tabla de amortización</caption>
                                <tr>
                                    <th>Número</th>
                                    <th>Interés</th>
                                    <th>Abono al capital</th>
                                    <th>Valor de la cuota</th>
                                    <th>Saldo al capital</th>
                                </tr>
                                <tbody id="tbody_1">
                                </tbody>
                            </table>
                        </div>
                    </div>


                    <input type="hidden" name="inicial" id="inicial">
                    <input type="hidden" name="id_user" class="id_user">
                    <input type="hidden" id="id_cliente">
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
        <!--datos personales-->
        <div class="tab-pane fade tab_content2-1 p-4" id="person-data-edit" role="tabpanel" aria-labelledby="profile-tab">
            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label for=""><b>Primer Nombre:*</b></label>
                        <input type="text" disabled name="first_name" id="first_name" class="form-control" required>
                    </div>
                </div>


                <div class="col-md-3">
                    <div class="form-group">
                        <label for=""><b>Segundo Nombre:</b></label>
                        <input type="text" disabled name="second_name" id="second_name" class="form-control">
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <label for=""><b>Primer Apellido:*</b></label>
                        <input type="text" disabled name="first_last_name" id="first_last_name" class="form-control" required>
                    </div>
                </div>



                <div class="col-md-3">
                    <div class="form-group">
                        <label for=""><b>Segundo Apellido:</b></label>
                        <input type="text" disabled name="second_last_name" id="second_last_name" class="form-control">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label for=""><b>Tipo de Documento:*</b></label>
                        <select disabled name="type_document" id="type_document" class="form-control" required>
                            <option value="">Seleccione</option>
                            <option value="C.C">C.C</option>
                            <option value="C.E">C.E</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for=""><b>Nº Documento de Identidad:*</b></label>
                        <input type="text" disabled name="number_document" id="number_document" class="form-control" required>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <label for=""><b>Lugar de Expedicion:*</b></label>
                        <input type="text" disabled name="location_expedition_document" id="location_expedition_document" class="form-control" required>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for=""><b>Fecha de Expedicion:*</b></label>
                        <input type="date" disabled name="date_expedition_document" id="date_expedition_document" class="form-control" required>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label for=""><b>Fecha de Nacimiento:*</b></label>
                        <input type="date" disabled name="birthdate" id="birthdate" class="form-control" required>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for=""><b>Lugar de Nacimiento:*</b></label>
                        <input type="text" disabled name="birthplace" id="birthplace" class="form-control" required>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for=""><b>Sexo:*</b></label>
                        <select disabled name="sexo" id="sexo" class="form-control" required>
                            <option value="">Seleccione</option>
                            <option value="M">M</option>
                            <option value="F">F</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for=""><b>Estado Civil:*</b></label>
                        <select disabled name="state_civil" id="state_civil" class="form-control" required>
                            <option value="">Seleccione</option>
                            <option value="Casado(a)">Casado(a)</option>
                            <option value="Soltero(a)">Soltero(a)</option>
                            <option value="Viudo(a)">Viudo(a)</option>
                            <option value="Union Libre">Union Libre</option>
                            <option value="Divorciado(a)">Divorciado(a)</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">

                <div class="col-md-3">
                    <div class="form-group">
                        <label for=""><b>Nivel Educativo:*</b></label>
                        <select disabled name="level_education" id="level_education" class="form-control" required>
                            <option value="">Seleccione</option>
                            <option value="Primaria">Primaria</option>
                            <option value="Bachillerato">Bachillerato</option>
                            <option value="Tecnologia">Tecnologia</option>
                            <option value="Post-Grado">Post-Grado</option>
                            <option value="Universitario">Universitario</option>

                        </select>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <label for=""><b>Profesion/Ocupacion:*</b></label>
                        <input type="text" disabled name="profession" id="profession" class="form-control" required>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for=""><b>Nº De persona a Cargo:*</b></label>
                        <input type="number" disabled name="number_person_in_charge" id="number_person_in_charge" class="form-control" required>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for=""><b>Nº De Hijos:*</b></label>
                        <input type="number" disabled name="number_children" id="number_children" class="form-control" required>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for=""><b>Tipo de Vivienda:*</b></label>
                        <select disabled name="housing_type" id="housing_type" class="form-control" required>
                            <option value="">Seleccione</option>
                            <option value="Propia">Propia</option>
                            <option value="Familiar">Familiar</option>
                            <option value="Arrendada">Arrendada</option>
                        </select>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <label for=""><b>Nombre del Arrendador:*</b></label>
                        <input type="text" disabled name="name_lessor" id="name_lessor" class="form-control">
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-group">
                        <label for=""><b>Telefono del Arrendador:*</b></label>
                        <input type="text" disabled name="phone_lessor" id="phone_lessor" class="form-control">
                    </div>
                </div>
                <div class="row m-auto">
                    <div class="col-md-5">
                        <label for="average_monthly_income"><b>Foto de Cara</b></label>
                        <div>
                            <img class="mr-5" src="" id="photo_face" alt="" width="250px" height="200px">
                        </div>
                    </div>
                    <div class="col-md-5">
                        <label for="average_monthly_income"><b>Foto Identificación</b></label>
                        <div>
                            <img class="ml-5" src="" id="photo_identf" alt="" width="250px" height="200px">

                            <img class="ml-5" src="" id="photo_identf_rear" alt="" width="250px" height="200px">


                        </div>
                    </div>
                </div>

            </div>
        </div>

        <!--actividad economica-->
        <div class="tab-pane fade tab_content2-1 p-4" id="activity-data-economic" role="tabpanel" aria-labelledby="profile-tab">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for=""><b>Direccion de residencia: <small>espeficique Nº casa o apartamento</small> *</b></label>
                        <input type="text" disabled name="adress_client" id="adress_client" class="form-control" required>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label for=""><b>Barrio/ciudad*</b></label>
                        <input type="text" disabled name="city_client" id="city_client" class="form-control" required>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label for=""><b>Telefono residencia*</b></label>
                        <input type="text" disabled name="phone_client" id="phone_client" class="form-control" required>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <label for=""><b>Celular*</b></label>
                        <input type="text" disabled name="mobil_client" id="mobil_client" class="form-control" required>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <label for=""><b>E-Mail*</b></label>
                        <input type="text" disabled name="email_client" id="email_client" class="form-control" required>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <label for=""><b>Envio de Correspondencia:*</b></label>
                        <select name="mailing" disabled id="mailing" class="form-control" required>
                            <option value="">Seleccione</option>
                            <option value="Recidencia">Residencia</option>
                            <option value="E-Mail">E-Mail</option>
                            <option value="Trabajo">Trabajo</option>
                            <option value="Otra">Otra</option>
                        </select>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label for=""><b>Direccion <small>(Correspondencia)</small> *</b></label>
                        <input type="text" disabled name="address_mailing" id="address_mailing" class="form-control" required>
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <label for=""><b>Barrio/Ciudad <small>(Correspondencia)</small>*</b></label>
                        <input type="text" disabled name="city_mailing" id="city_mailing" class="form-control">
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <label for=""><b>Telefono <small>(Correspondencia)</small> </b></label>
                        <input type="text" disabled name="phone_mailing" id="phone_mailing" class="form-control">
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <label for=""><b>Tipo de Actividad Economica:*</b></label>
                        <select disabled name="type_activity_client" id="type_activity_client" class="form-control" required>
                            <option value="">Seleccione</option>
                            <option value="Empleado">Empleado</option>
                            <option value="Independiente">Independiente</option>
                            <option value="Ama de Casa">Ama de Casa</option>
                            <option value="Empresario(a)">Empresario(a)</option>
                            <option value="Estudiante">Estudiante</option>
                            <option value="Pensionado">Pensionado</option>
                            <option value="Rentista de Capital">Rentista de Capital</option>
                            <option value="Trabajador(a)">Trabajador(a)</option>
                            <option value="Administrador(a)">Administrador(a)</option>
                            <option value="Independiente">Independiente</option>
                            <option value="Otra">Otra</option>
                        </select>
                    </div>
                </div>

            </div>

            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label for=""><b>¿Cual? <small>(Otra Actividad Economica)</small> </b></label>
                        <input type="text" disabled name="oter_activity_client" id="oter_activity_client" class="form-control">
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <label for=""><b>Nombre de la Empresa </b></label>
                        <input type="text" disabled name="name_company_client" id="name_company_client" class="form-control">
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <label for=""><b>Direccion Trabajo</b></label>
                        <input type="text" disabled name="addres_worck_client" id="addres_worck_client" class="form-control">
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <label for=""><b>Barrio/Ciudad*</b></label>
                        <input type="text" disabled name="city_worck_clirnt" id="city_worck_clirnt" class="form-control">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="" chmod -R 775 bootstrap/cache> <b>Telefono <small>Trabajo</small> </b></label>
                        <input type="text" disabled name="phone_worck_client" id="phone_worck_client" class="form-control">
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="form-group">
                        <label for=""><b>Ext </b></label>
                        <input type="text" disabled name="ext_phone_worck_client" id="ext_phone_worck_client" class="form-control">
                    </div>
                </div>

                <div class="col-md-2">
                    <div class="form-grchmod -R 775 bootstrap/cacheoup">
                        <label for=""><b>Fax </b></label>
                        <input type="text" disabled name="fax_phone_worck_client" id="fax_phone_worck_client" class="form-control">
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <label for=""><b>Dependencia/Area</b></label>
                        <input type="text" disabled name="dependency_area" id="dependency_area" class="form-control">
                    </div>
                </div>

                <div class="col-md-3">
                    <div class="form-group">
                        <label for=""><b>Cargo</b></label>
                        <input type="text" disabled name="charge_company" id="charge_company" class="form-control">
                    </div>
                </div>

            </div>

            <div class="row">
                <div class="col-md-3">
                    <div class="form-group">
                        <label for=""><b>Tipo de Contrato:*</b></label>
                        <select disabled name="type_contrato" id="type_contrato" class="form-control" required>
                            <option value="">Seleccione</option>
                            <option value="Indefinido">Indefinido</option>
                            <option value="Independiente">Independiente</option>
                            <option value="Ama de Casa">Ama de Casa</option>
                            <option value="Termino Fijo">Termino Fijo</option>
                            <option value="Obra o labor">Obra o labor</option>
                            <option value="Por Servicios">Por Servicios</option>
                        </select>
                    </div>
                </div>


                <div class="col-md-3">
                    <div class="form-group">
                        <label for=""><b>Salario</b></label>
                        <input type="text" disabled name="salary" id="salary" class="form-control">
                    </div>
                </div>



                <div class="col-md-3">
                    <div class="form-group">
                        <label for=""><b>Fecha de Vinculacion</b></label>
                        <input disabled type="date" name="date_vinculacion" id="date_vinculacion" class="form-control">
                    </div>
                </div>
            </div>
        </div>
        <!-- bienes y raices-->
        <div class="tab-pane fade tab_content2-1 p-4" id="bienes-data" role="tabpanel" aria-labelledby="profile-tab">
            <div class="row">
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-12">
                            <h4>BIENES RAICES</h4>
                        </div>
                    </div>
                    <div class="row">



                        <div class="col-md-3">
                            <div class="form-group">
                                <label for=""><b>Ingresos</b></label>
                                <input type="text" disabled name="income" id="income" class="form-control">
                            </div>
                        </div>


                        <div class="col-md-3">
                            <div class="form-group">
                                <label for=""><b>Tipo de Apartamento:*</b></label>
                                <select disabled name="type_apartamento" id="type_apartamento" class="form-control">
                                    <option value="">Seleccione</option>
                                    <option value="Local">Local</option>
                                    <option value="Casa">Casa</option>
                                    <option value="Lote">Lote</option>
                                    <option value="Finca">Finca</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for=""><b>Direccion del Bien</b></label>
                                <input type="text" disabled name="address_bien" id="address_bien" class="form-control">
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for=""><b>Barrio</b></label>
                                <input type="text" disabled name="barrio" id="barrio" class="form-control">
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for=""><b>ciudad</b></label>
                                <input type="text" disabled name="city" id="city" class="form-control">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for=""><b>Valor Comercail</b></label>
                                <input type="text" disabled name="valor_comercail" id="valor_comercail" class="form-control">
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for=""><b>Hipoteca a favor de:</b></label>
                                <input type="text" disabled name="hipoteca" id="hipoteca" class="form-control">
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for=""><b>Afectacion Familiar:*</b></label>
                                <select disabled name="afectacion_familiar" id="afectacion_familiar" class="form-control">
                                    <option value="">Seleccione</option>
                                    <option value="Si">Si</option>
                                    <option value="No">No</option>
                                </select>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-12">
                            <h4>VEHICULO</h4>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for=""><b>Tipo:*</b></label>
                                <select disabled name="type_vehicule" id="type_vehicule" class="form-control">
                                    <option value="">Seleccione</option>
                                    <option value="Particular">Particular</option>
                                    <option value="Publico">Publico</option>
                                    <option value="Moto">Moto</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for=""><b>Placa</b></label>
                                <input type="text" disabled name="placa" id="placa" class="form-control">
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for=""><b>Transito De</b></label>
                                <input type="text" disabled name="transito" id="transito" class="form-control">
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for=""><b>Marca</b></label>
                                <input type="text" disabled name="marca" id="marca" class="form-control">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for=""><b>Modelo</b></label>
                                <input type="text" disabled name="modelo" id="modelo" class="form-control">
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for=""><b>Valor Comercial</b></label>
                                <input type="text" disabled name="valor_comercial" id="valor_comercial" class="form-control">
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for=""><b>Prenda a Valor de </b></label>
                                <input type="text" disabled name="prenda_valor" id="prenda_valor" class="form-control">
                            </div>
                        </div>

                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for=""><b>Otro: Cuales ?</b></label>
                                <input type="text" disabled name="otro_activos" id="otro_activos" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="tab-pane fade tab_content2-1 p-4" id="cuotas-data" role="tabpanel" aria-labelledby="profile-tab">
            <div class="table-responsive">
                <table class="table table-bordered" id="table-cuota" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Acciones</th>
                            <th>Número</th>
                            <th>Valor de la cuota</th>
                            <th>fecha</th>
                            <th>Estatus</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
            <input type="hidden" name="inicial" id="inicial">
            <input type="hidden" name="id_user" class="id_user">
            <input type="hidden" id="id_cliente">
            <input type="hidden" name="token" class="token">

            <!-- <input type="hidden" name="id_user_edit" id="id_edit"> -->

            <br>
            <br>
        </div>

        <div class="modal fade bd-example-modal-lg" id="modal-detail" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12" style="padding: 4%;">
                                Detalle de la Cuota
                            </div>
                        </div>
                        <div class="col">
                            <div class="row">
                                <div class="col-md-5">
                                    <label for="average_monthly_income"><b>Numero:</b></label>
                                    <div>
                                        <div id="number"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-5">
                                    <label for="average_monthly_income"><b>Metodo de pago:</b></label>
                                    <div>
                                        <div id="payment_method_quota"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="row mr-5 ml-5 py-2">
                                <div class="col-md-5 pt-3 mx-auto">
                                    <label for="average_monthly_income"><b>Soporte de Pago</b></label>
                                    <div>
                                        <img src="" id="load_img_quota" alt="" width="250px" height="200px">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
