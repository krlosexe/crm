@extends('layouts.app')
	

	@section('CustomCss')

		<style>
			.kv-avatar .krajee-default.file-preview-frame,.kv-avatar .krajee-default.file-preview-frame:hover {
			    margin: 0;
			    padding: 0;
			    border: none;
			    box-shadow: none;
			    text-align: center;
			}
			.kv-avatar {
			    display: inline-block;
			}
			.kv-avatar .file-input {
			    display: table-cell;
			    width: 213px;
			}
			.kv-reqd {
			    color: red;
			    font-family: monospace;
			    font-weight: normal;
			}
		</style>


	@endsection


	@section('content')
	     <!-- Page Wrapper -->
		  <div id="wrapper">

		    @include('layouts.sidebar')

		    <!-- Content Wrapper -->
		    <div id="content-wrapper" class="d-flex flex-column">

		      <!-- Main Content -->
		      <div id="content">

				@include('layouts.topBar') 
		       

		        <!-- Begin Page Content -->
			        <div class="container-fluid">

			          <!-- Page Heading -->
			          <h1 class="h3 mb-2 text-gray-800">Pacientes</h1>

			          <div id="alertas"></div>
			          <input type="hidden" class="id_user">
			          <input type="hidden" class="token">

			          <!-- DataTales Example -->
			          <div class="card shadow mb-4" id="cuadro1">
			            <div class="card-header py-3">
			              <h6 class="m-0 font-weight-bold text-primary">Gestion de pacientes</h6>

			              <button onclick="nuevo()" class="btn btn-primary btn-icon-split" style="float: right;">
		                    <span class="icon text-white-50">
		                      <i class="fas fa-plus"></i>
		                    </span>
		                    <span class="text">Nuevo registro</span>
		                  </button>
			            </div>
			            <div class="card-body">
			              <div class="table-responsive">
			                <table class="table table-bordered" id="table" width="100%" cellspacing="0">
			                  <thead>
			                    <tr>
								  <th>Acciones</th>
								  <th>Datos</th>
								  <th>Identificacion</th>
								  <th style="width: 150px;">Origen</th>
								  <th style="width: 150px;">Estado</th>
			                      <th style="width: 180px;">Fecha de registro</th>
								  <th style="width: 140px;">Asesora Responsable</th>
			                    </tr>
			                  </thead>
			                  <tbody>
			                    
			                  </tbody>
			                </table>
			              </div>
			            </div>
			          </div>


			          @include('catalogos.clientes.store')
					  @include('catalogos.clientes.view')
					  @include('catalogos.clientes.edit')


			        </div>
			        <!-- /.container-fluid -->

		      </div>
		      <!-- End of Main Content -->

		      <!-- Footer -->
		      <footer class="sticky-footer bg-white">
		        <div class="container my-auto">
		          <div class="copyright text-center my-auto">
		            <span>Copyright &copy; Your Website 2019</span>
		          </div>
		        </div>
		      </footer>
		      <!-- End of Footer -->

		    </div>
		    <!-- End of Content Wrapper -->

		  </div>
		  <input type="hidden" id="ruta" value="<?= url('/') ?>">
	@endsection





	@section('CustomJs')

		<script>
		
			$(document).ready(function(){
				store();
				list();
				update();

				$("#collapse_Catálogos").addClass("show");
				$("#nav_clients, #modulo_Catálogos").addClass("active");

				verifyPersmisos(id_user, tokens, "clients");
			});



			function update(){
				enviarFormularioPut("#form-update", 'api/clients', '#cuadro4');
			}


			function store(){
				enviarFormulario("#store", 'api/clients', '#cuadro2');
			}




			function list(cuadro) {
				
				var data = {
					"id_user": id_user,
					"token"  : tokens,
				};
				$('#table tbody').off('click');
				var url=document.getElementById('ruta').value; 
				cuadros(cuadro, "#cuadro1");

				var table=$("#table").DataTable({
					"destroy":true,
					
					"stateSave": true,
					"serverSide":false,
					"ajax":{
						"method":"GET",
						 "url":''+url+'/api/clients',
						 "data": {
							"id_user": id_user,
							"token"  : tokens,
							"rol"    : name_rol,
						},
						"dataSrc":""
					},
					"columns":[
						{"data": null,
							render : function(data, type, row) {
								var botones = "";
								if(consultar == 1)
									botones += "<span class='consultar btn btn-sm btn-info waves-effect' data-toggle='tooltip' title='Consultar'><i class='fa fa-eye' style='margin-bottom:5px'></i></span> ";
								if(actualizar == 1)
									botones += "<span class='editar btn btn-sm btn-primary waves-effect' data-toggle='tooltip' title='Editar'><i class='fas fa-edit' style='margin-bottom:5px'></i></span> ";
								if(data.status == 1 && actualizar == 1)
									botones += "<span class='desactivar btn btn-sm btn-warning waves-effect' data-toggle='tooltip' title='Desactivar'><i class='fa fa-unlock' style='margin-bottom:5px'></i></span> ";
								else if(data.status == 2 && actualizar == 1)
									botones += "<span class='activar btn btn-sm btn-warning waves-effect' data-toggle='tooltip' title='Activar'><i class='fa fa-lock' style='margin-bottom:5px'></i></span> ";
								if(borrar == 1)
									botones += "<span class='eliminar btn btn-sm btn-danger waves-effect' data-toggle='tooltip' title='Eliminar'><i class='fas fa-trash-alt' style='margin-bottom:5px'></i></span>";
								return botones;
							}
						},
						{"data":"nombres",
							render : function(data, type, row){
								return "<b>"+data+" "+row.apellidos+"</b><br><i class='fa fa-phone'></i> <a href='#' >"+row.telefono+"</a><br><i class='fa fa-envelope'></i><a href='#'> "+row.email+"</a>"
							}
						},
						{"data":"identificacion"},
						{"data":"origen"},
						{"data":"state"},
						{"data": "fec_regins"},
						{"data": "name_register",
							render : function(data, type, row){
								return "<b>"+data+" "+row.apellido_register+"</b>"
							}
						}
						
					],
					"language": idioma_espanol,
					"responsive": true,
					"dom": 'Bfrtip',
					"buttons": [
						'copy', 'csv', 'excel', 'pdf', 'print'
					]
				});


				ver("#table tbody", table)
				edit("#table tbody", table)
				activar("#table tbody", table)
				desactivar("#table tbody", table)
				eliminar("#table tbody", table)


			}



			function nuevo() {
				$("#alertas").css("display", "none");
				$("#store")[0].reset();

				GetCity("#city");
				GetClinic("#city", "#clinic")
				GetAsesorasbyBusisnessLine("#linea-negocio", "#asesora");
				GetAsesorasValoracion("#id_asesora_valoracion")
				GetBusinessLine("#linea-negocio");
				Children("#children", "#number_children")
				Surgery("#surgery", "#previous_surgery")
				Disease("#disease", "#major_disease")
				Medication("#medication", "#drink_medication")
				Allergic("#allergic ", "#allergic_medication")
				$("#clinic").attr("disabled", "disabled")

				cuadros("#cuadro1", "#cuadro2");
			}


			

			/* ------------------------------------------------------------------------------- */
			/* 
				Funcion que muestra el cuadro3 para la consulta del banco.
			*/
			function ver(tbody, table){
				$(tbody).on("click", "span.consultar", function(){
					$("#alertas").css("display", "none");
					var data = table.row( $(this).parents("tr") ).data();

					GetCity("#city_view");
					GetClinic("#city_view", "#clinic_view")
					GetBusinessLine("#linea-negocio-view");
					GetAsesorasbyBusisnessLine("#linea-negocio-view", "#asesora-view");

					GetAsesorasValoracion("#id_asesora_valoracion-view")

					$("#id_asesora_valoracion-view").val(data.id_asesora_valoracion).attr("disabled", "disabled")

					$("#state_view").val(data.state)
					$("#state_view").trigger("change");
					$("#state_view").attr("disabled", "disabled")
					$("#nombre_view").val(data.nombres).attr("disabled", "disabled")
					$("#apellido_view").val(data.apellidos).attr("disabled", "disabled")
					$("#identificacion_view").val(data.identificacion).attr("disabled", "disabled")
					$("#telefono_view").val(data.telefono).attr("disabled", "disabled")
					$("#email_view").val(data.email).attr("disabled", "disabled")
					$("#direccion_view").val(data.direccion).attr("disabled", "disabled")
					$("#fecha_nacimiento_view").val(data.fecha_nacimiento).attr("disabled", "disabled")
					$("#origen_view").val(data.origen).attr("disabled", "disabled")
					$("#forma_pago_view").val(data.forma_pago).attr("disabled", "disabled")
					
					$("#city_view").val(data.city).attr("disabled", "disabled")
					$("#city_view").trigger("change")

					$("#clinic_view").val(data.clinic).attr("disabled", "disabled")

					$("#year_view").val(calcularEdad(data.fecha_nacimiento))

					$("#identificacion_verify_view").prop("checked", data.identificacion_verify ? true : false)

					$("#name_surgery_view").val(data.name_surgery).attr("disabled", "disabled")
					$("#current_size_view").val(data.current_size).attr("disabled", "disabled")
					$("#desired_size_view").val(data.desired_size).attr("disabled", "disabled")
					$("#implant_volumem_view").val(data.implant_volumem).attr("disabled", "disabled")

					$("#eps_view").val(data.eps).attr("disabled", "disabled")
					$("#height_view").val(data.height).attr("disabled", "disabled")
					$("#weight_view").val(data.weight).attr("disabled", "disabled")

					$("#children_view").prop("checked", data.children ? true : false)
					$("#smoke_view").prop("checked", data.smoke ? true : false)
					$("#alcohol_view").prop("checked", data.alcohol ? true : false)
					$("#surgery_view").prop("checked", data.surgery ? true : false)
					$("#disease_view").prop("checked", data.disease ? true : false)
					$("#medication_view").prop("checked", data.medication ? true : false)
					$("#allergic_view").prop("checked", data.allergic ? true : false)

					$("#number_children_view").val(data.number_children).attr("disabled", "disabled")
					$("#previous_surgery_view").val(data.previous_surgery).attr("disabled", "disabled")
					$("#major_disease_view").val(data.major_disease).attr("disabled", "disabled")
					$("#drink_medication_view").val(data.drink_medication).attr("disabled", "disabled")
					$("#allergic_medication_view").val(data.allergic_medication).attr("disabled", "disabled")


					$("#dependent_independent_view").val(data.dependent_independent).attr("disabled", "disabled")
					$("#type_contract_view").val(data.type_contract).attr("disabled", "disabled")
					$("#antiquity_view").val(data.antiquity).attr("disabled", "disabled")
					$("#average_monthly_income_view").val(data.average_monthly_income).attr("disabled", "disabled")
					$("#previous_credits_view").val(data.previous_credits).attr("disabled", "disabled")
					$("#reported_view").val(data.reported).attr("disabled", "disabled")
					$("#bank_account_view").val(data.bank_account).attr("disabled", "disabled")
					
					$("#properties_view").prop("checked", data.properties ? true : false)
					$("#vehicle_view").prop("checked", data.vehicle ? true : false)
					
					
					$("#linea-negocio-view").val(data.id_line).attr("disabled", "disabled")
					$("#linea-negocio-view").trigger("change");
					$("#asesora-view").val(data.id_user_asesora).attr("disabled", "disabled")
					cuadros('#cuadro1', '#cuadro3');


					var url = document.getElementById('ruta').value+"/valuations/client/"+data.id_cliente+"/0"
					$('#iframeValuationsView').attr('src', url);


					var url = document.getElementById('ruta').value+"/preanesthesia/client/"+data.id_cliente+"/0"
					$('#iframepPreanestesiaView').attr('src', url);


					var url = document.getElementById('ruta').value+"/surgeries/client/"+data.id_cliente+"/0"
					$('#iframepCirugiaView').attr('src', url);


					var url = document.getElementById('ruta').value+"/revision-appointment/client/"+data.id_cliente+"/0"
					$('#iframepRevisionView').attr('src', url);


				});
			}


			/* ------------------------------------------------------------------------------- */
			/* 
				Funcion que muestra el cuadro3 para la consulta del banco.
			*/
			function edit(tbody, table){
				$(tbody).on("click", "span.editar", function(){
					$("#alertas").css("display", "none");
					var data = table.row( $(this).parents("tr") ).data();

					
					GetCity("#city_edit");
					GetClinic("#city_edit", "#clinic_edit")
					GetAsesorasbyBusisnessLine("#linea-negocio-edit", "#asesora-edit");
					GetBusinessLine("#linea-negocio-edit");


					Children("#children_edit", "#number_children_edit")
					Surgery("#surgery_edit", "#previous_surgery_edit")
					Disease("#disease_edit", "#major_disease_edit")
					Medication("#medication_edit", "#drink_medication_edit")
					Allergic("#allergic_edit ", "#allergic_medication_edit")


					GetAsesorasValoracion("#id_asesora_valoracion-edit")

					$("#id_asesora_valoracion-edit").val(data.id_asesora_valoracion)


					$("#state_edit").val(data.state).trigger("change")

					$("#nombre_edit").val(data.nombres)
					$("#apellido_edit").val(data.apellidos)
					$("#identificacion_edit").val(data.identificacion)
					$("#telefono_edit").val(data.telefono)
					$("#email_edit").val(data.email)
					$("#direccion_edit").val(data.direccion)
					$("#fecha_nacimiento_edit").val(data.fecha_nacimiento)
					
					$("#origen_edit").val(data.origen)
					$("#forma_pago_edit").val(data.forma_pago)


					$("#city_edit").val(data.city)
					$("#city_edit").trigger("change")

					$("#clinic_edit").val(data.clinic)

					$("#year_edit").val(calcularEdad(data.fecha_nacimiento))

					$("#identificacion_verify_edit").prop("checked", data.identificacion_verify ? true : false)

					$("#name_surgery_edit").val(data.name_surgery)
					$("#current_size_edit").val(data.current_size)
					$("#desired_size_edit").val(data.desired_size)
					$("#implant_volumem_edit").val(data.implant_volumem)

					$("#eps_edit").val(data.eps)
					$("#height_edit").val(data.height)
					$("#weight_edit").val(data.weight)

					$("#children_edit").prop("checked", data.children ? true : false)
					$("#smoke_edit").prop("checked", data.smoke ? true : false)
					$("#alcohol_edit").prop("checked", data.alcohol ? true : false)
					$("#surgery_edit").prop("checked", data.surgery ? true : false)
					$("#disease_edit").prop("checked", data.disease ? true : false)
					$("#medication_edit").prop("checked", data.medication ? true : false)
					$("#allergic_edit").prop("checked", data.allergic ? true : false)

					$("#number_children_edit").val(data.number_children).prop("disabled", data.children ? false : true)
					$("#previous_surgery_edit").val(data.previous_surgery).prop("disabled", data.surgery ? false : true)
					$("#major_disease_edit").val(data.major_disease).prop("disabled", data.disease ? false : true)
					$("#drink_medication_edit").val(data.drink_medication).prop("disabled", data.medication ? false : true)
					$("#allergic_medication_edit").val(data.allergic_medication).prop("disabled", data.allergic ? false : true)


					$("#dependent_independent_edit").val(data.dependent_independent)
					$("#type_contract_edit").val(data.type_contract)
					$("#antiquity_edit").val(data.antiquity)
					$("#average_monthly_income_edit").val(data.average_monthly_income)
					$("#previous_credits_edit").val(data.previous_credits)
					$("#reported_edit").val(data.reported)
					$("#bank_account_edit").val(data.bank_account)
					
					$("#properties_edit").prop("checked", data.properties ? true : false)
					$("#vehicle_edit").prop("checked", data.vehicle ? true : false)
					
					
					$("#linea-negocio-edit").val(data.id_line)
					$("#linea-negocio-edit").trigger("change");

					$("#asesora-edit").val(data.id_user_asesora)


					cuadros('#cuadro1', '#cuadro4');

					$("#id_edit").val(data.id_cliente)

				

					var url = document.getElementById('ruta').value+"/valuations/client/"+data.id_cliente+"/1"
					$('#iframeValuationsEdit').attr('src', url);


					var url = document.getElementById('ruta').value+"/preanesthesia/client/"+data.id_cliente+"/1"
					$('#iframepPreanestesiaEdit').attr('src', url);


					var url = document.getElementById('ruta').value+"/surgeries/client/"+data.id_cliente+"/1"
					$('#iframepCirugiaEdit').attr('src', url);


					var url = document.getElementById('ruta').value+"/revision-appointment/client/"+data.id_cliente+"/1"
					$('#iframepRevisionEdit').attr('src', url);

					cuadros('#cuadro1', '#cuadro4');
				});
			}



			function GetClinic(city, select){
				$(city).change(function (e) { 
					GetClinicByCity(select, $(this).val())
				});
			}

			function Children(checkbox, input){
				$(checkbox).change(function (e) { 
					if ($(checkbox).is(':checked')){
						$(input).removeAttr("disabled").focus();
					}else{
						$(input).val("0").attr("readonly", "readonly");
					}
				});
			}



			function Surgery(checkbox, input){
				$(checkbox).change(function (e) { 
					if ($(checkbox).is(':checked')){
						$(input).removeAttr("disabled").focus();
					}else{
						$(input).val("0").attr("readonly", "readonly");
					}
				});
			}



			function Disease(checkbox, input){
				$(checkbox).change(function (e) { 
					if ($(checkbox).is(':checked')){
						$(input).removeAttr("disabled").focus();
					}else{
						$(input).val("0").attr("readonly", "readonly");
					}
				});
			}


			function Medication(checkbox, input){
				$(checkbox).change(function (e) { 
					if ($(checkbox).is(':checked')){
						$(input).removeAttr("disabled").focus();
					}else{
						$(input).val("0").attr("readonly", "readonly");
					}
				});
			}

			function Allergic(checkbox, input){
				$(checkbox).change(function (e) { 
					if ($(checkbox).is(':checked')){
						$(input).removeAttr("disabled").focus();
					}else{
						$(input).val("0").attr("readonly", "readonly");
					}
				});
			}

			


			$("#identificacion").keyup(function (e) { 

				var url=document.getElementById('ruta').value;
				$.ajax({
					url:''+url+'/api/clients/identification/'+$(this).val(),
					type:'GET',
					data: {
						"id_user": id_user,
						"token"  : tokens,
					},
					dataType:'JSON',
					
					beforeSend: function(){
					// mensajes('info', '<span>Buscando, espere por favor... <i class="fa fa-spinner fa-spin" aria-hidden="true"></i></span>');
					},
					error: function (data) {
						$(".disabled").removeAttr("disabled")
						$(".disabled").val("")

						$("#state").trigger("change")
						$("#city").trigger("change")
						$("#linea-negocio").trigger("change");


					},
					success: function(data){
						
						$(".disabled").attr("disabled", "disabled")



						$("#state").val(data.state).trigger("change")

						$("#nombre").val(data.nombres)
						$("#apellido").val(data.apellidos)
						$("#telefono").val(data.telefono)
						$("#email").val(data.email)
						$("#direccion").val(data.direccion)
						$("#fecha_nacimiento").val(data.fecha_nacimiento)
						
						$("#origen").val(data.origen)
						$("#forma_pago").val(data.forma_pago)


						$("#city").val(data.city)
						$("#city").trigger("change")

						$("#clinic").val(data.clinic)

						$("#year").val(calcularEdad(data.fecha_nacimiento))

						$("#identificacion_verify").prop("checked", data.identificacion_verify ? true : false)

						$("#name_surgery").val(data.name_surgery)


						$("#linea-negocio").val(data.id_line)
						$("#linea-negocio").trigger("change");

						$("#asesora").val(data.id_user_asesora)



						
					}
				});
			});




		/* ------------------------------------------------------------------------------- */
			/*
				Funcion que capta y envia los datos a desactivar
			*/
			function desactivar(tbody, table){
				$(tbody).on("click", "span.desactivar", function(){
					var data=table.row($(this).parents("tr")).data();
					statusConfirmacion('api/status-cliente/'+data.id_cliente+"/"+2,"¿Esta seguro de desactivar el registro?", 'desactivar');
				});
			}
		/* ------------------------------------------------------------------------------- */

		/* ------------------------------------------------------------------------------- */
			/*
				Funcion que capta y envia los datos a desactivar
			*/
			function activar(tbody, table){
				$(tbody).on("click", "span.activar", function(){
					var data=table.row($(this).parents("tr")).data();
					statusConfirmacion('api/status-cliente/'+data.id_cliente+"/"+1,"¿Esta seguro de desactivar el registro?", 'activar');
				});
			}
		/* ------------------------------------------------------------------------------- */



			function eliminar(tbody, table){
				$(tbody).on("click", "span.eliminar", function(){
					var data=table.row($(this).parents("tr")).data();
					statusConfirmacion('api/status-cliente/'+data.id_cliente+"/"+0,"¿Esta seguro de eliminar el registro?", 'Eliminar');
				});
			}



		  $("#fecha_nacimiento").change(function (e) { 
			  $("#year").val(calcularEdad($(this).val()))
		  });


		  $("#fecha_nacimiento_edit").change(function (e) { 
			  $("#year_edit").val(calcularEdad($(this).val()))
		  });



		 



		</script>
		



	@endsection


