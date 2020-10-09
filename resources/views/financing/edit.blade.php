<div class="card shadow mb-4 hidden" id="cuadro4">

    <ul class="nav nav-tabs p-2" id="myTab" role="tablist">
        <li class="nav-item">
            <a id="tab1-0" class="nav-link active" data-toggle="tab" href="#home-edit" role="tab" aria-controls="home" aria-selected="true">Editar Solicitud</a>
        </li>
        <li class="nav-item">
            <a id="tab2-1" class="nav-link" data-toggle="tab" href="#person-data-edit" role="tab" aria-controls="profile" aria-selected="false">Datos Personales</a>
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
                                        <img src="" id="load_img" alt="">
                                    </div>
                                </div>
                            </div>
                            <br><br>
                            <div class="row">
                                <div class="col-md-12">
                                    <h4>Requisitos</h4>

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
                                                    <input type='checkbox' name='bank_statements' class='checkitem chk-col-blue' id='bank_statements' value='1'>
                                                    <span class='checkmark'></span>
                                                    <label for="bank_statements"><b>Extractos bancarios del ultimo trimestre O Certificación de ingresos por parte de un contador</b></label>
                                                </label>
                                            </div>

                                            <div class="row">
                                                <label class='container-check'>
                                                    <input type='checkbox' name='copy_of_id' class='checkitem chk-col-blue' id='copy_of_id2' value='1'>
                                                    <span class='checkmark'></span>
                                                    <label for="copy_of_id2"><b>Copia de la cedula</b></label>
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
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
                        <input type="number" disabled  name="number_children" id="number_children" class="form-control" required>
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
                            <img class="mr-5" src="" id="photo_face" alt="">
                        </div>
                    </div>
                    <div class="col-md-5">
                        <label for="average_monthly_income"><b>Foto Identificación</b></label>
                        <div>
                            <img class="ml-5" src="" id="photo_identf" alt="">
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</div>