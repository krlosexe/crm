<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
	<link rel="icon" type="image/png" href="assets/img/favicon.png">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<title>Get Shit Done Bootstrap Wizard by Creative Tim</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />

	<!--     Fonts and icons     -->
    <link href="http://netdna.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.css" rel="stylesheet">


    <link href="<?= url('/') ?>/vendor/sweetalert/sweetalert.css" rel="stylesheet">

  <link href="<?= url('/') ?>/vendor/select2-4.0.11/dist/css/select2.min.css" rel="stylesheet" />


	<!-- CSS Files -->
    <link href="<?= url('/') ?>/css/wizard/bootstrap.min.css" rel="stylesheet" />
	<link href="<?= url('/') ?>/css/wizard/gsdk-bootstrap-wizard.css" rel="stylesheet" />

	<!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="<?= url('/') ?>/css/wizard/demo.css" rel="stylesheet" />
  

  @if($id_line == 6 )
    <style>

        
        .wizard-card[data-color="orange"] .moving-tab{
          background: #226fe2;
        }

        .btn-fill.btn-warning{
          background-color: #226fe2;
          border-color: #226fe2;
        }

        .btn-fill.btn-warning:hover{
          background-color: #226fe2;
          border-color: #226fe2;
        }

        .btn-warning{
          background-color: #226fe2 !important;
          border-color: #226fe2 !important;
        }


    </style>
  @endif


 
</head>

<body>


<!--      Wizard container        -->
<div class="wizard-container">
<input type="hidden" id="ruta" value="<?= url('/') ?>">
<div class="card wizard-card" data-color="orange" id="wizardProfile">
    <form action="" method="post" id="form-submit">
<!--        You can switch ' data-color="orange" '  with one of the next bright colors: "blue", "green", "orange", "red"          -->
      @csrf   


      <input type="hidden" name="id_line" value="{{$id_line}}">




     


      <div class="wizard-header">
          <h3>
             <b>SOLICITUD DE CREDITO</b><br>
             
          </h3>
      </div>

      <div class="wizard-navigation">     
          <ul>
              <li><a href="#about" data-toggle="tab">INFORMACION PERSONAL</a></li>
              <li><a href="#account" data-toggle="tab">INFORMACION DEL CONYUGE</a></li>
              <li><a href="#address" data-toggle="tab">ACTIVIDAD ECONÓMICA Y LOCALIZACIÓN CLIENTE</a></li>
              <li><a href="#tab4" data-toggle="tab">RELACIÓN DE INGRESOS Y EGRESOS</a></li>
              <li><a href="#tab5" data-toggle="tab">RELACIÓN DE ACTIVOS</a></li>
              <li><a href="#tab6" data-toggle="tab">REFERENCIAS</a></li>


          </ul>
      </div>

      

        <div class="tab-content">
            <div class="tab-pane" id="about">
              <div class="row">
                  <div class="col-md-3">
                    <div class="form-group">
                          <label for=""><b>Primer Nombre:*</b></label>
                          <input type="text" name="first_name" id="first_name" class="form-control" required >
                      </div>
                  </div>


                  <div class="col-md-3">
                    <div class="form-group">
                          <label for=""><b>Segundo Nombre:</b></label>
                          <input type="text" name="second_name" id="second_name" class="form-control" >
                      </div>
                  </div>

                  <div class="col-md-3">
                    <div class="form-group">
                          <label for=""><b>Primer Apellido:*</b></label>
                          <input type="text" name="first_last_name" id="first_last_name" class="form-control" required >
                      </div>
                  </div>



                  <div class="col-md-3">
                    <div class="form-group">
                          <label for=""><b>Segundo Apellido:</b></label>
                          <input type="text" name="second_last_name" id="second_last_name" class="form-control" >
                      </div>
                  </div>
              </div>



              <div class="row">

                <div class="col-md-3">
                  <div class="form-group">
                        <label for=""><b>Tipo de Documento:*</b></label>
                        <select name="type_document" id="type_document" class="form-control" required>
                          <option value="">Seleccione</option>
                          <option value="C.C">C.C</option>
                          <option value="C.E">C.E</option>
                        </select>
                    </div>
                </div>


                <div class="col-md-3">
                  <div class="form-group">
                        <label for=""><b>Nº Documento de Identidad:*</b></label>
                        <input type="text" name="number_document" id="number_document" class="form-control" required >
                    </div>
                </div>

                <div class="col-md-3">
                  <div class="form-group">
                        <label for=""><b>Lugar de Expedicion:*</b></label>
                        <input type="text" name="location_expedition_document" id="location_expedition_document" class="form-control" required >
                    </div>
                </div>



                <div class="col-md-3">
                  <div class="form-group">
                        <label for=""><b>Fecha de Expedicion:*</b></label>
                        <input type="date" name="date_expedition_document" id="date_expedition_document" class="form-control" required >
                    </div>
                </div>

            </div>


            <div class="row">
                <div class="col-md-3">
                  <div class="form-group">
                        <label for=""><b>Fecha de Nacimiento:*</b></label>
                        <input type="date" name="birthdate" id="birthdate" class="form-control" required >
                    </div>
                </div>


                <div class="col-md-3">
                  <div class="form-group">
                        <label for=""><b>Lugar de Nacimiento:*</b></label>
                        <input type="text" name="birthplace" id="birthplace" class="form-control" required >
                    </div>
                </div>


                <div class="col-md-3">
                  <div class="form-group">
                        <label for=""><b>Sexo:*</b></label>
                        <select name="sexo" id="sexo" class="form-control" required>
                          <option value="">Seleccione</option>
                          <option value="M">M</option>
                          <option value="F">F</option>
                        </select>
                    </div>
                </div>



                <div class="col-md-3">
                  <div class="form-group">
                        <label for=""><b>Estado Civil:*</b></label>
                        <select name="state_civil" id="state_civil" class="form-control" required>
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
                        <select name="level_education" id="level_education" class="form-control" required>
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
                        <input type="text" name="profession" id="profession" class="form-control" required >
                    </div>
                </div>



                <div class="col-md-3">
                  <div class="form-group">
                        <label for=""><b>Nº De persona a Cargo:*</b></label>
                        <input type="number" name="number_person_in_charge" id="number_person_in_charge" class="form-control" required >
                    </div>
                </div>


                <div class="col-md-3">
                  <div class="form-group">
                        <label for=""><b>Nº De Hijos:*</b></label>
                        <input type="number" name="number_children" id="number_children" class="form-control" required >
                    </div>
                </div>


                <div class="col-md-3">
                  <div class="form-group">
                        <label for=""><b>Tipo de Vivienda:*</b></label>
                        <select name="housing_type" id="housing_type" class="form-control" required>
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
                        <input type="text" name="name_lessor" id="name_lessor" class="form-control"  >
                    </div>
                </div>


                <div class="col-md-3">
                  <div class="form-group">
                        <label for=""><b>Telefono del Arrendador:*</b></label>
                        <input type="text" name="phone_lessor" id="phone_lessor" class="form-control"  >
                    </div>
                </div>




            </div>



            </div>
            <div class="tab-pane" id="account">
                <div class="row">
                  
                  <div class="col-md-3">
                    <div class="form-group">
                          <label for=""><b>Primer Nombre:*</b></label>
                          <input type="text" name="first_name_spouse" id="first_name_spouse" class="form-control" required >
                      </div>
                  </div>


                  <div class="col-md-3">
                    <div class="form-group">
                          <label for=""><b>Segundo Nombre:*</b></label>
                          <input type="text" name="second_name_spouse" id="second_name_spouse" class="form-control" >
                      </div>
                  </div>

                  <div class="col-md-3">
                    <div class="form-group">
                          <label for=""><b>Primer Apellido:*</b></label>
                          <input type="text" name="first_last_name_spouse" id="first_last_name_spouse" class="form-control" required >
                      </div>
                  </div>



                  <div class="col-md-3">
                    <div class="form-group">
                          <label for=""><b>Segundo Apellido:*</b></label>
                          <input type="text" name="second_last_name_spouse" id="second_last_name_spouse" class="form-control"  >
                      </div>
                  </div>


                  <div class="col-md-3">
                    <div class="form-group">
                          <label for=""><b>Tipo de Documento:*</b></label>
                          <select name="type_document_spouse" id="type_document_spouse" class="form-control" required>
                            <option value="">Seleccione</option>
                            <option value="C.C">C.C</option>
                            <option value="C.E">C.E</option>
                          </select>
                      </div>
                  </div>


                <div class="col-md-3">
                  <div class="form-group">
                        <label for=""><b>Nº Documento de Identidad:*</b></label>
                        <input type="text" name="number_document_spouse" id="number_document_spouse" class="form-control" required >
                    </div>
                </div>



                <div class="col-md-3">
                    <div class="form-group">
                          <label for=""><b>Tipo de Actividad:*</b></label>
                          <select name="type_activity_spouse" id="type_activity_spouse" class="form-control" required>
                            <option value="">Seleccione</option>
                            <option value="Empleado">Empleado</option>
                            <option value="Independiente">Independiente</option>
                            <option value="Ama de Casa">Ama de Casa</option>
                            <option value="Empresario(a)">Empresario(a)</option>
                            <option value="Estudiante">Estudiante</option>
                            <option value="Pensionado">Pensionado</option>
                            <option value="Rentista de Capital">Rentista de Capital</option>
                          </select>
                      </div>
                  </div>


                  <div class="col-md-3">
                    <div class="form-group">
                          <label for=""><b>Celular:*</b></label>
                          <input type="text" name="phone_spouse" id="phone_spouse" class="form-control" >
                      </div>
                  </div>


                  <div class="col-md-3">
                    <div class="form-group">
                          <label for=""><b>Empresa donde Labora:*</b></label>
                          <input type="text" name="company_work_spouse" id="company_work_spouse" class="form-control" >
                      </div>
                  </div>


                  <div class="col-md-3">
                    <div class="form-group">
                          <label for=""><b>Cargo:*</b></label>
                          <input type="text" name="charge_worck_spouse" id="charge_worck_spouse" class="form-control" >
                      </div>
                  </div>


                  <div class="col-md-3">
                    <div class="form-group">
                          <label for=""><b>Ingresos Mensuales:*</b></label>
                          <input type="text" name="monthly_income_spouse" id="monthly_income_spouse" class="form-control" >
                      </div>
                  </div>



                  
              </div>
            </div>
            <div class="tab-pane" id="address">
                    <div class="col-sm-12">
                       
                    </div>
                    


                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                              <label for=""><b>Direccion de Recidencia: <small>espeficique Nº casa o apartamento</small> *</b></label>
                              <input type="text" name="adress_client" id="adress_client" class="form-control" required >
                          </div>
                      </div>


                      <div class="col-md-6">
                        <div class="form-group">
                              <label for=""><b>Barrio/ciudad*</b></label>
                              <input type="text" name="city_client" id="city_client" class="form-control" required >
                          </div>
                      </div>

                    </div>


                    <div class="row">
                      <div class="col-md-3">
                        <div class="form-group">
                              <label for=""><b>Telefono Recidencia*</b></label>
                              <input type="text" name="phone_client" id="phone_client" class="form-control" required >
                          </div>
                      </div>


                      <div class="col-md-3">
                        <div class="form-group">
                              <label for=""><b>Celular*</b></label>
                              <input type="text" name="mobil_client" id="mobil_client" class="form-control" required >
                          </div>
                      </div>



                      <div class="col-md-3">
                        <div class="form-group">
                              <label for=""><b>E-Mail*</b></label>
                              <input type="text" name="email_client" id="email_client" class="form-control" required >
                          </div>
                      </div>



                      <div class="col-md-3">
                        <div class="form-group">
                              <label for=""><b>Envio de Correspondencia:*</b></label>
                              <select name="mailing" id="mailing" class="form-control" required>
                                <option value="">Seleccione</option>
                                <option value="Recidencia">Recidencia</option>
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
                              <input type="text" name="address_mailing" id="address_mailing" class="form-control" required >
                          </div>
                      </div>


                      <div class="col-md-3">
                        <div class="form-group">
                              <label for=""><b>Barrio/Ciudad <small>(Correspondencia)</small>*</b></label>
                              <input type="text" name="city_mailing" id="city_mailing" class="form-control" >
                          </div>
                      </div>



                      <div class="col-md-3">
                        <div class="form-group">
                              <label for=""><b>Telefono <small>(Correspondencia)</small> </b></label>
                              <input type="text" name="phone_mailing" id="phone_mailing" class="form-control" >
                          </div>
                      </div>


                      <div class="col-md-3">
                        <div class="form-group">
                              <label for=""><b>Tipo de Actividad Economica:*</b></label>
                              <select name="type_activity_client" id="type_activity_client" class="form-control" required>
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
                                <input type="text" name="oter_activity_client" id="oter_activity_client" class="form-control" >
                            </div>
                        </div>



                        <div class="col-md-3">
                          <div class="form-group">
                                <label for=""><b>Nombre de la Empresa </b></label>
                                <input type="text" name="name_company_client" id="name_company_client" class="form-control" >
                            </div>
                        </div>



                        <div class="col-md-3">
                          <div class="form-group">
                                <label for=""><b>Direccion Trabajo</b></label>
                                <input type="text" name="addres_worck_client" id="addres_worck_client" class="form-control" >
                            </div>
                        </div>


                        <div class="col-md-3">
                          <div class="form-group">
                                <label for=""><b>Barrio/Ciudad*</b></label>
                                <input type="text" name="city_worck_clirnt" id="city_worck_clirnt" class="form-control" >
                            </div>
                        </div>


                    </div>



                    <div class="row">
                        <div class="col-md-2">
                          <div class="form-group">
                                <label for=""><b>Telefono <small>Trabajo</small> </b></label>
                                <input type="text" name="phone_worck_client" id="phone_worck_client" class="form-control" >
                            </div>
                        </div>

                        <div class="col-md-2">
                          <div class="form-group">
                                <label for=""><b>Ext </b></label>
                                <input type="text" name="ext_phone_worck_client" id="ext_phone_worck_client" class="form-control" >
                            </div>
                        </div>

                        <div class="col-md-2">
                          <div class="form-group">
                                <label for=""><b>Fax </b></label>
                                <input type="text" name="fax_phone_worck_client" id="fax_phone_worck_client" class="form-control" >
                            </div>
                        </div>



                        <div class="col-md-3">
                          <div class="form-group">
                                <label for=""><b>Dependencia/Area</b></label>
                                <input type="text" name="dependency_area" id="dependency_area" class="form-control" >
                            </div>
                        </div>


                        <div class="col-md-3">
                            <div class="form-group">
                                <label for=""><b>Cargo</b></label>
                                <input type="text" name="charge_company" id="charge_company" class="form-control" >
                            </div>
                        </div>
 
                    </div>


                    <div class="row">


                      <div class="col-md-3">
                          <div class="form-group">
                                <label for=""><b>Tipo de Contrato:*</b></label>
                                <select name="type_contrato" id="type_contrato" class="form-control" required>
                                  <option value="">Seleccione</option>
                                  <option value="Empleado">Empleado</option>
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
                                <label for=""><b>Fecha de Vinculacion</b></label>
                                <input type="date" name="date_vinculacion" id="date_vinculacion" class="form-control" >
                          </div>
                        </div>

                    </div>

                
            </div>



            <div class="tab-pane" id="tab4">
                  <div class="row">
                      <div class="col-md-6">
                          <div class="row">
                            <div class="col-sm-12">
                              <h4 class="info-text"> RELACIÓN DE INGRESOS Y EGRESOS </h4>
                            </div>
                          </div>


                          <div class="row">

                              <div class="col-md-6">
                                  <div class="row">
                                    <div class="col-md-12">
                                       <h5>INGRESOS MENSUALES</h5>
                                    </div>
                                  </div><br>

                                  <div class="row">
                                    <div class="col-md-6">1. SALARIO BÁSICO Y/O HONORARIOS</div>
                                    <div class="col-md-6">
                                      <input type="text" class="form-control" name="salary_basic">
                                    </div>
                                  </div><br>



                                  <div class="row">
                                    <div class="col-md-6">2. COMISIONES</div>
                                    <div class="col-md-6">
                                      <input type="text" class="form-control" name="comisiones">
                                    </div>
                                  </div><br>


                                  <div class="row">
                                    <div class="col-md-6">3. ARRENDAMIENTOS</div>
                                    <div class="col-md-6">
                                      <input type="text" class="form-control" name="arrendamientos">
                                    </div>
                                  </div><br>


                                  <div class="row">
                                    <div class="col-md-6">4. OTROS</div>
                                    <div class="col-md-6">
                                      <input type="text" class="form-control" name="otros">
                                    </div>
                                  </div><br>


                                  <div class="row">
                                    <div class="col-md-6">¿CUÁLES?</div>
                                    <div class="col-md-6">
                                      <input type="text" class="form-control" name="cuales">
                                    </div>
                                  </div><br>


                                  <div class="row">
                                    <div class="col-md-6">TOTAL INGRESOS</div>
                                    <div class="col-md-6">
                                      <input type="text" class="form-control" name="total_ingresos">
                                    </div>
                                  </div><br>

                              </div>
                              <div class="col-md-6">

                                  <div class="row">
                                    <div class="col-md-12">
                                      <h5>EGRESOS MENSUALES</h5>
                                    </div>
                                  </div>


                                  <div class="row">
                                    <div class="col-md-6">1. PRÉSTAMO VIVIENDA</div>
                                    <div class="col-md-6">
                                      <input type="text" class="form-control" name="prestamos_vivienda">
                                    </div>
                                  </div><br>

                                  <div class="row">
                                    <div class="col-md-6">2. PRÉSTAMO VEHÍCULO U OTROS</div>
                                    <div class="col-md-6">
                                      <input type="text" class="form-control" name="prestamo_vehiculo_otros">
                                    </div>
                                  </div><br>

                                  <div class="row">
                                    <div class="col-md-6">3. TARJETA DE CRÉDITO</div>
                                    <div class="col-md-6">
                                      <input type="text" class="form-control" name="credit_card">
                                    </div>
                                  </div><br>


                                  <div class="row">
                                    <div class="col-md-6">4. ARRIENDO</div>
                                    <div class="col-md-6">
                                      <input type="text" class="form-control" name="arriendo">
                                    </div>
                                  </div><br>


                                  <div class="row">
                                    <div class="col-md-6">5. GASTOS FAMILIARES Y/O OTROS</div>
                                    <div class="col-md-6">
                                      <input type="text" class="form-control" name="gastos_familiaros_otros">
                                    </div>
                                  </div><br>


                                  <div class="row">
                                    <div class="col-md-6">Total</div>
                                    <div class="col-md-6">
                                      <input type="text" class="form-control" name="total_egresos">
                                    </div>
                                  </div><br>
                              </div>
                          </div>
                      </div>



                      <div class="col-md-6">
                         <div class="row">
                            <div class="col-sm-12">
                              <h4 class="info-text">INFORMACIÓN DEL CRÉDITO SOLICITADO </h4>
                            </div>
                          </div>

                          <div class="row">
                            <div class="col-md-12">
                              <h5>PROCEDIMIENTO QUE SE REALIZA (Puede seleccionar más de uno)</h5>
                            </div>
                          </div>

                  
                            <div class="row">
                              <div class="col-md-3">
                                <div class="row">
                                  <div class="col-md-8">
                                   <label for="Mamoplastia de Aumento">Mamoplastia de Aumento</label>
                                  </div>

                                  <div class="col-md-4">
                                    <input type="checkbox" class="form-control" id="Mamoplastia de Aumento" name="procedure[]" value="Mamoplastia de Aumento">
                                  </div>

                                </div>
                              </div>


                              <div class="col-md-3">
                                <div class="row">
                                  <div class="col-md-8">
                                    <label for="Mastopexia">Mastopexia</label>
                                  </div>

                                  <div class="col-md-4">
                                    <input type="checkbox" id="Mastopexia" class="form-control" name="procedure[]" value="Mastopexia">
                                  </div>

                                </div>
                              </div>



                              <div class="col-md-3">
                                <div class="row">
                                  <div class="col-md-8">
                                    <label for="Mentoplastia">Mentoplastia</label>
                                  </div>

                                  <div class="col-md-4">
                                    <input type="checkbox" id="Mentoplastia" class="form-control" name="procedure[]" value="Mentoplastia">
                                  </div>

                                </div>
                              </div>


                              <div class="col-md-3">
                                <div class="row">
                                  <div class="col-md-8">
                                    <label for="Ritidoplastia">Ritidoplastia</label>
                                  </div>

                                  <div class="col-md-4">
                                    <input type="checkbox" id="Ritidoplastia" class="form-control" name="procedure[]" value="Ritidoplastia">
                                  </div>

                                </div>
                              </div>
                            </div><br>



                            <div class="row">
                              <div class="col-md-3">
                                <div class="row">
                                  <div class="col-md-8">
                                    <label for="Mamoplastia de Reducción">Mamoplastia de Reducción</label>
                                  </div>

                                  <div class="col-md-4">
                                    <input type="checkbox" id="Mamoplastia de Reducción" class="form-control" name="procedure[]" value="Mamoplastia de Reducción">
                                  </div>

                                </div>
                              </div>


                              <div class="col-md-3">
                                <div class="row">
                                  <div class="col-md-8">
                                    <label for="Lipomoldeamiento">Lipomoldeamiento</label>
                                  </div>

                                  <div class="col-md-4">
                                    <input type="checkbox" id="Lipomoldeamiento" class="form-control" name="procedure[]" value="Lipomoldeamiento">
                                  </div>

                                </div>
                              </div>


                              <div class="col-md-3">
                                <div class="row">
                                  <div class="col-md-8">
                                    <label for="Blefaroplastia">Blefaroplastia</label>
                                  </div>

                                  <div class="col-md-4">
                                    <input type="checkbox" id="Blefaroplastia" class="form-control" name="procedure[]" value="Blefaroplastia">
                                  </div>

                                </div>
                              </div>



                              <div class="col-md-3">
                                <div class="row">
                                  <div class="col-md-8">
                                    <label for="Rinoplastia">Rinoplastia</label>
                                  </div>

                                  <div class="col-md-4">
                                    <input type="checkbox" id="Rinoplastia" class="form-control" name="procedure[]" value="Rinoplastia">
                                  </div>

                                </div>
                              </div>
                            </div>



                            <div class="row">
                              <div class="col-md-3">
                                <div class="row">
                                  <div class="col-md-8">
                                    <label for="Implantes Gluteos">Implantes Gluteos</label>
                                  </div>

                                  <div class="col-md-4">
                                    <input type="checkbox" id="Implantes Gluteos" class="form-control" name="procedure[]" value="Implantes Gluteos">
                                  </div>

                                </div>
                              </div>



                              <div class="col-md-3">
                                <div class="row">
                                  <div class="col-md-8">
                                    <label for="Abdominoplastia">Abdominoplastia</label>
                                  </div>

                                  <div class="col-md-4">
                                    <input type="checkbox" id="Abdominoplastia" class="form-control" name="procedure[]" value="Abdominoplastia">
                                  </div>

                                </div>
                              </div>



                              <div class="col-md-3">
                                <div class="row">
                                  <div class="col-md-8">
                                    <label for="Otoplastia">Otoplastia</label>
                                  </div>

                                  <div class="col-md-4">
                                    <input type="checkbox" id="Otoplastia" class="form-control" name="procedure[]" value="Otoplastia">
                                  </div>

                                </div>
                              </div>



                              <div class="col-md-3">
                                <div class="row">
                                  <div class="col-md-8">
                                  <label for="Otro">Otro</label>
                                  </div>

                                  <div class="col-md-4">
                                    <input type="checkbox" id="Otro" class="form-control" name="procedure[]" value="Otro">
                                  </div>

                                </div>
                              </div>
                            </div>


                            <br><br>



                            <div class="row">
                                <div class="col-md-6">
                                  <div class="form-group">
                                      <label for=""><b>Valor Cotizado</b></label>
                                      <input type="text" name="valor_cotizado" id="valor_cotizado" class="form-control">
                                  </div>
                                </div>



                                <div class="col-md-6">
                                  <div class="form-group">
                                      <label for=""><b>N° de Cuotas</b></label>
                                      <input type="text" name="numero_cuotas" id="numero_cuotas" class="form-control">
                                  </div>
                                </div>
                            </div>



                            <div class="row">
                                <div class="col-md-6">
                                  <div class="form-group">
                                      <label for=""><b>Valor Financiar</b></label>
                                      <input type="text" name="valor_financiar" id="valor_financiar" class="form-control">
                                  </div>
                                </div>

                                <div class="col-md-6">
                                  <div class="form-group">
                                      <label for=""><b>Fecha Cirugia</b></label>
                                      <input type="date" name="fecha_cirugia" id="fecha_cirugia" class="form-control">
                                  </div>
                                </div>
                            </div>


                      </div>

                  </div>
            </div>

            <div class="tab-pane" id="tab5">
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
                                  <label for=""><b>Tipo de Apartamento:*</b></label>
                                  <select name="type_apartamento" id="type_apartamento" class="form-control">
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
                                <input type="text" name="address_bien" id="address_bien" class="form-control">
                            </div>
                          </div>


                          <div class="col-md-3">
                            <div class="form-group">
                                <label for=""><b>Barrio</b></label>
                                <input type="text" name="barrio" id="barrio" class="form-control">
                            </div>
                          </div>



                          <div class="col-md-3">
                            <div class="form-group">
                                <label for=""><b>ciudad</b></label>
                                <input type="text" name="city" id="city" class="form-control">
                            </div>
                          </div>
                        </div>


                        <div class="row">
                          <div class="col-md-3">
                            <div class="form-group">
                                <label for=""><b>Valor Comercail</b></label>
                                <input type="text" name="valor_comercail" id="valor_comercail" class="form-control">
                            </div>
                          </div>


                          <div class="col-md-3">
                            <div class="form-group">
                                <label for=""><b>Hipoteca a favor de:</b></label>
                                <input type="text" name="hipoteca" id="hipoteca" class="form-control">
                            </div>
                          </div>


                          <div class="col-md-3">
                            <div class="form-group">
                                  <label for=""><b>Afectacion Familiar:*</b></label>
                                  <select name="afectacion_familiar" id="afectacion_familiar" class="form-control">
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
                                    <select name="type_vehicule" id="type_vehicule" class="form-control">
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
                                  <input type="text" name="placa" id="placa" class="form-control">
                              </div>
                            </div>



                            <div class="col-md-3">
                              <div class="form-group">
                                  <label for=""><b>Transito De</b></label>
                                  <input type="text" name="transito" id="transito" class="form-control">
                              </div>
                            </div>


                            <div class="col-md-3">
                              <div class="form-group">
                                  <label for=""><b>Marca</b></label>
                                  <input type="text" name="marca" id="marca" class="form-control">
                              </div>
                            </div>

                        </div>


                        <div class="row">
                           <div class="col-md-3">
                              <div class="form-group">
                                  <label for=""><b>Modelo</b></label>
                                  <input type="text" name="modelo" id="modelo" class="form-control">
                              </div>
                            </div>


                            <div class="col-md-3">
                              <div class="form-group">
                                  <label for=""><b>Valor Comercial</b></label>
                                  <input type="text" name="valor_comercial" id="valor_comercial" class="form-control">
                              </div>
                            </div>


                            <div class="col-md-3">
                              <div class="form-group">
                                  <label for=""><b>Prenda a Valor de </b></label>
                                  <input type="text" name="prenda_valor" id="prenda_valor" class="form-control">
                              </div>
                            </div>

                        </div>

                        <div class="row">

                           <div class="col-md-12">
                              <div class="form-group">
                                  <label for=""><b>Otro: Cuales ?</b></label>
                                  <input type="text" name="otro_activos" id="otro_activos" class="form-control">
                              </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



            <div class="tab-pane" id="tab6">
                
                <div class="col-md-6">
                    <div class="row">
                      <div class="col md-12">
                          <h4>FAMILIAR (Que no viva con usted)</h4>
                      </div>
                    </div>

                    <div class="row">
                       <div class="col-md-6">
                            <div class="form-group">
                                <label for=""><b>Nombres y Apellidos</b></label>
                                <input type="text" name="name_last_name1" id="name_last_name" class="form-control">
                            </div>
                        </div>


                        <div class="col-md-3">
                            <div class="form-group">
                                <label for=""><b>Parentezco</b></label>
                                <input type="text" name="parentezco1" id="parentezco" class="form-control">
                            </div>
                        </div>


                        <div class="col-md-3">
                            <div class="form-group">
                                <label for=""><b>Telefono de Recidencia</b></label>
                                <input type="text" name="phone_recidencia1" id="phone_recidencia" class="form-control">
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for=""><b>Telefono de Oficina</b></label>
                                <input type="text" name="phone_oficcina1" id="phone_oficcina" class="form-control">
                            </div>
                        </div>


                        <div class="col-md-3">
                            <div class="form-group">
                                <label for=""><b>Celular</b></label>
                                <input type="text" name="celular1" id="celular" class="form-control">
                            </div>
                        </div>

                    </div>



                    <div class="row">
                       <div class="col-md-6">
                            <div class="form-group">
                                <label for=""><b>Nombres y Apellidos</b></label>
                                <input type="text" name="name_last_name2" id="name_last_name" class="form-control">
                            </div>
                        </div>


                        <div class="col-md-3">
                            <div class="form-group">
                                <label for=""><b>Parentezco</b></label>
                                <input type="text" name="parentezco2" id="parentezco" class="form-control">
                            </div>
                        </div>


                        <div class="col-md-3">
                            <div class="form-group">
                                <label for=""><b>Telefono de Recidencia</b></label>
                                <input type="text" name="phone_recidencia2" id="phone_recidencia" class="form-control">
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for=""><b>Telefono de Oficina</b></label>
                                <input type="text" name="phone_oficcina2" id="phone_oficcina" class="form-control">
                            </div>
                        </div>



                        <div class="col-md-3">
                            <div class="form-group">
                                <label for=""><b>Celular</b></label>
                                <input type="text" name="celular2" id="celular" class="form-control">
                            </div>
                        </div>

                    </div>



                </div>

                <div class="col-md-6">
                    <div class="row">
                      <div class="col md-12">
                          <h4>PERSONAL (Que no viva con usted)</h4>
                      </div>
                    </div>



                    <div class="row">
                       <div class="col-md-6">
                            <div class="form-group">
                                <label for=""><b>Nombres y Apellidos</b></label>
                                <input type="text" name="refer_2_name_last_name1" id="refer_2_name_last_name" class="form-control">
                            </div>
                        </div>


                        <div class="col-md-3">
                            <div class="form-group">
                                <label for=""><b>Parentezco</b></label>
                                <input type="text" name="refer_2_parentezco1" id="refer_2_parentezco" class="form-control">
                            </div>
                        </div>


                        <div class="col-md-3">
                            <div class="form-group">
                                <label for=""><b>Telefono de Recidencia</b></label>
                                <input type="text" name="refer_2_phone_recidencia1" id="refer_2_phone_recidencia" class="form-control">
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for=""><b>Telefono de Oficina</b></label>
                                <input type="text" name="refer_2_phone_oficcina1" id="refer_2_phone_oficcina" class="form-control">
                            </div>
                        </div>


                        <div class="col-md-3">
                            <div class="form-group">
                                <label for=""><b>Celular</b></label>
                                <input type="text" name="refer_2_celular1" id="refer_2_celular" class="form-control">
                            </div>
                        </div>

                    </div>



                    <div class="row">
                       <div class="col-md-6">
                            <div class="form-group">
                                <label for=""><b>Nombres y Apellidos</b></label>
                                <input type="text" name="refer_2_name_last_name2" id="refer_2_name_last_name" class="form-control">
                            </div>
                        </div>


                        <div class="col-md-3">
                            <div class="form-group">
                                <label for=""><b>Parentezco</b></label>
                                <input type="text" name="refer_2_parentezco2" id="refer_2_parentezco" class="form-control">
                            </div>
                        </div>


                        <div class="col-md-3">
                            <div class="form-group">
                                <label for=""><b>Telefono de Recidencia</b></label>
                                <input type="text" name="refer_2_phone_recidencia2" id="refer_2_phone_recidencia" class="form-control">
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for=""><b>Telefono de Oficina</b></label>
                                <input type="text" name="refer_2_phone_oficcina2" id="refer_2_phone_oficcina" class="form-control">
                            </div>
                        </div>


                        <div class="col-md-3">
                            <div class="form-group">
                                <label for=""><b>Celular</b></label>
                                <input type="text" name="refer_2_celular2" id="refer_2_celular" class="form-control">
                            </div>
                        </div>

                    </div>
                </div>



                
            </div>
            
        </div>
        <div class="wizard-footer height-wizard">
            <div class="pull-right">
                <input type='button' class='btn btn-next btn-fill btn-warning btn-wd btn-sm' name='next' value='Siguiente' />
                <input type='submit' id="btn-submit" class='btn btn-finish btn-fill btn-warning btn-wd btn-sm' name='finish' value='Guardar' />

            </div>

            <div class="pull-left">
                <input type='button' class='btn btn-previous btn-fill btn-default btn-wd btn-sm' name='previous' value='Atras' />
            </div>
            <div class="clearfix"></div>
        </div>

    </form>
</div>
</div> <!-- wizard container -->




</body>

	<!--   Core JS Files   -->
	<script src="<?= url('/') ?>/js/wizard/jquery-2.2.4.min.js" type="text/javascript"></script>
	<script src="<?= url('/') ?>/js/wizard/bootstrap.min.js" type="text/javascript"></script>
	<script src="<?= url('/') ?>/js/wizard/jquery.bootstrap.wizard.js" type="text/javascript"></script>

	<!--  Plugin for the Wizard -->
	<script src="<?= url('/') ?>/js/wizard/gsdk-bootstrap-wizard.js"></script>

	<!--  More information about jquery.validate here: http://jqueryvalidation.org/	 -->
  <script src="<?= url('/') ?>/js/wizard/jquery.validate.min.js"></script>



  <script src="<?= url('/') ?>/vendor/sweetalert/sweetalert.min.js" type="text/javascript"></script>
    <script src="<?= url('/') ?>/vendor/sweetalert/sweetalert-dev.js" type="text/javascript"></script>

    <script src="<?= url('/') ?>/vendor/select2-4.0.11/dist/js/select2.min.js"></script>



  <script src="<?= url('/') ?>/js/funciones.js"></script>

  <script>
    enviarFormulario23("#form-submit", "api/form/credit")

  function enviarFormulario23(form, controlador){   
        $(form).submit(function(e){
            e.preventDefault(); //previene el comportamiento por defecto del formulario al darle click al input submit
            var url=document.getElementById('ruta').value; //obtiene la ruta del input hidden con la variable 
            var formData=new FormData($(form)[0]); //obtiene todos los datos de los inputs del formulario pasado por parametros
            var method = $(this).attr('method'); //obtiene el method del formulario
            $('input[type="submit"]').attr('disabled','disabled'); //desactiva el input submit
            $.ajax({
                url:''+url+'/'+controlador+'',
                type:method,
                dataType:'JSON',
                data:formData,
                cache:false,
                contentType:false,
                processData:false,
                beforeSend: function(){
                    
                },
                error: function (repuesta) {
                  $('#btn-submit').removeAttr('disabled'); 
                },
                 success: function(respuesta){
                   warning("Operacion Exitosa")
                   $("#form-submit")[0].reset();

                   $('#btn-submit').removeAttr('disabled'); 

                   setTimeout(function(){ location.reload(); }, 5000);






                }

            });
        });
    }
  </script>

</html>
