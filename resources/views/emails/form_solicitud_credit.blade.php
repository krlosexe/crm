
<p><b>Mensaje:</b> {{$msg}}</p>

<h2>Datos Generales</h2>
<p><b>Nombres y Apellidos:</b> {{$first_name}}  {{$second_name}}  {{$first_last_name}}  {{$second_last_name}}</p>
<p><b>Tipo de Documento:</b> {{$type_document}}</p>
<p><b>Nº Documento de Identidad:</b> {{$number_document}}</p>
<p><b>Lugar de Expedicion:</b> {{$location_expedition_document}}</p>
<p><b>Fecha de Expedicion:</b> {{$date_expedition_document}}</p>
<p><b>Fecha de Nacimiento:</b> {{$birthdate}}</p>
<p><b>Lugar de Nacimiento:</b> {{$birthplace}}</p>
<p><b>Sexo:</b> {{$sexo}}</p>
<p><b>Estado Civil:</b> {{$state_civil}}</p>
<p><b>Nivel Educativo:</b> {{$level_education}}</p>
<p><b>Profesion/Ocupacion:</b> {{$profession}}</p>
<p><b>Nº De persona a Cargo:</b> {{$number_person_in_charge}}</p>
<p><b>Nº De Hijos:</b> {{$number_children}}</p>
<p><b>Tipo de Vivienda:</b> {{$housing_type}}</p>
<p><b>Nombre del Arrendador:</b> {{$name_lessor}}</p>
<p><b>Telefono del Arrendador:</b> {{$phone_lessor}}</p>

<br><br>
<hr>



<h2>Informacion del Conyuge</h2>


<p><b>Primer Nombre:</b> {{$first_name_spouse}}</p>
<p><b>Segundo Nombre::</b> {{$second_name_spouse}}</p>
<p><b>Primer Apellido:</b> {{$first_last_name_spouse}}</p>
<p><b>Segundo Apellido:</b> {{$second_last_name_spouse}}</p>
<p><b>Tipo de Documento:</b> {{$type_document_spouse}}</p>
<p><b>Nº Documento de Identidad:</b> {{$number_document_spouse}}</p>
<p><b>Tipo de Actividad:</b> {{$type_activity_spouse}}</p>
<p><b>Celular:</b> {{$phone_spouse}}</p>
<p><b>Empresa donde Labora:</b> {{$company_work_spouse}}</p>
<p><b>Cargo:</b> {{$charge_worck_spouse}}</p>
<p><b>Ingresos Mensuales:</b> {{$monthly_income_spouse}}</p>




<br><br>
<hr>



<h2>ACTIVIDAD ECONÓMICA Y LOCALIZACIÓN CLIENTE</h2>


<p><b>Direccion de Recidencia:</b> {{$adress_client}}</p>
<p><b>Barrio/ciudad:</b> {{$city_client}}</p>
<p><b>Telefono Recidencia:</b> {{$phone_client}}</p>
<p><b>Celular:</b> {{$mobil_client}}</p>
<p><b>E-Mail:</b> {{$email_client}}</p>
<p><b>Envio de Correspondencia:</b> {{$mailing}}</p>
<p><b>Direccion:</b> {{$address_mailing}}</p>
<p><b>Barrio/Ciudad:</b> {{$city_mailing}}</p>
<p><b>Telefono:</b> {{$phone_mailing}}</p>
<p><b>Tipo de Actividad Economica:</b> {{$type_activity_client}}</p>
<p><b>¿Cual?:</b> {{$oter_activity_client}}</p>
<p><b>Nombre de la Empresa:</b> {{$name_company_client}}</p>
<p><b>Direccion Trabajo:</b> {{$addres_worck_client}}</p>
<p><b>Barrio/Ciudad:</b> {{$city_worck_clirnt}}</p>
<p><b>Telefono <small>Trabajo:</b> {{$phone_worck_client}}</p>
<p><b>Ext:</b> {{$ext_phone_worck_client}}</p>
<p><b>Fax:</b> {{$fax_phone_worck_client}}</p>
<p><b>Dependencia/Area:</b> {{$dependency_area}}</p>
<p><b>Cargo:</b> {{$charge_company}}</p>
<p><b>Tipo de Contrato:</b> {{$type_contrato}}</p>
<p><b>Fecha de Vinculacion:</b> {{$date_vinculacion}}</p>





<br><br>
<hr>



<h2>RELACIÓN DE INGRESOS Y EGRESOS</h2>


<br>
<h3>INGRESOS MENSUALES</h3>
<p><b>1. SALARIO BÁSICO Y/O HONORARIOS:</b> {{$salary_basic}}</p>
<p><b>2. COMISIONES<:</b> {{$comisiones}}</p>
<p><b>3. ARRENDAMIENTOS:</b> {{$arrendamientos}}</p>
<p><b>4. OTROS:</b> {{$otros}}</p>
<p><b>¿CUÁLES?:</b> {{$cuales}}</p>
<p><b>TOTAL INGRESOS:</b> {{$total_ingresos}}</p>



<br><br>
<h3>EGRESOS MENSUALES</h3>
<p><b>1. PRÉSTAMO VIVIENDA:</b> {{$prestamos_vivienda}}</p>
<p><b>2. PRÉSTAMO VEHÍCULO U OTROS:</b> {{$prestamo_vehiculo_otros}}</p>
<p><b>3. TARJETA DE CRÉDITO:</b> {{$credit_card}}</p>
<p><b>4. ARRIENDO:</b> {{$arriendo}}</p>
<p><b>5. GASTOS FAMILIARES Y/O OTROS:</b> {{$gastos_familiaros_otros}}</p>
<p><b>Total:</b> {{$total_egresos}}</p>




<br><br>
<h3>INFORMACIÓN DEL CRÉDITO SOLICITADO</h3>

<p><b>PROCEDIMIENTO QUE SE REALIZA:</b> <?= implode(",", $procedure); ?></p>
<p><b>Valor Cotizado:</b> {{$valor_cotizado}}</p>
<p><b>N° de Cuotas:</b> {{$numero_cuotas}}</p>
<p><b>Valor Financiar:</b> {{$valor_financiar}}</p>
<p><b>Fecha Cirugia:</b> {{$fecha_cirugia}}</p>





<br><br>
<hr>


<h2>RELACIÓN DE ACTIVOS</h2>

<br>
<h3>BIENES RAICES</h3>
<p><b>Tipo de Apartamento:</b> {{$type_apartamento}}</p>
<p><b>Direccion del Bien:</b> {{$address_bien}}</p>
<p><b>Barrio:</b> {{$barrio}}</p>
<p><b>ciudad:</b> {{$city}}</p>
<p><b>Valor Comercail:</b> {{$valor_comercail}}</p>
<p><b>Hipoteca a favor de:</b> {{$hipoteca}}</p>
<p><b>afectacion Familiar:</b> {{$afectacion_familiar}}</p>



<br><br>
<h3>VEHICULO</h3>
<p><b>Tipo:</b> {{$type_vehicule}}</p>
<p><b>Placa:</b> {{$placa}}</p>
<p><b>Transito De:</b> {{$transito}}</p>
<p><b>Marca:</b> {{$marca}}</p>
<p><b>Modelo:</b> {{$modelo}}</p>
<p><b>Valor Comercial:</b> {{$valor_comercial}}</p>
<p><b>Prenda a Valor de:</b> {{$prenda_valor}}</p>
<p><b>Otro: Cuales ?:</b> {{$otro_activos}}</p>




<br><br>
<hr>


<h2>REFERENCIAS</h2>

<br>
<h3>FAMILIAR (Que no viva con usted)</h3>
<p><b>Nombres y Apellidos:</b> {{$name_last_name1}}</p>
<p><b>Parentezco:</b> {{$parentezco1}}</p>
<p><b>Telefono de Recidencia:</b> {{$phone_recidencia1}}</p>
<p><b>Telefono de Oficina:</b> {{$phone_oficcina1}}</p>
<p><b>Celular:</b> {{$celular1}}</p>
<p><b>Nombres y Apellidos:</b> {{$name_last_name2}}</p>
<p><b>Parentezco:</b> {{$parentezco2}}</p>
<p><b>elefono de Recidencia:</b> {{$phone_recidencia2}}</p>
<p><b>Telefono de Oficina:</b> {{$phone_oficcina2}}</p>
<p><b>Celular:</b> {{$celular2}}</p>


<br>
<h3>PERSONAL (Que no viva con usted)</h3>
<p><b>Nombres y Apellidos:</b> {{$refer_2_name_last_name1}}</p>
<p><b>Parentezco:</b> {{$refer_2_parentezco1}}</p>
<p><b>Telefono de Recidencia:</b> {{$refer_2_phone_recidencia1}}</p>
<p><b>Telefono de Oficina:</b> {{$refer_2_phone_oficcina1}}</p>
<p><b>Celular:</b> {{$refer_2_celular1}}</p>
<p><b>Nombres y Apellidos:</b> {{$refer_2_name_last_name2}}</p>
<p><b>Parentezco:</b> {{$refer_2_parentezco2}}</p>
<p><b>elefono de Recidencia:</b> {{$refer_2_phone_recidencia2}}</p>
<p><b>Telefono de Oficina:</b> {{$refer_2_phone_oficcina2}}</p>
<p><b>Celular:</b> {{$refer_2_celular2}}</p>






