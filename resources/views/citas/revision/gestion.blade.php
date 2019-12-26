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
			          <h1 class="h3 mb-2 text-gray-800">Citas de Revision</h1>

			          <div id="alertas"></div>
			          <input type="hidden" class="id_user">
			          <input type="hidden" class="token">

			          <!-- DataTales Example -->
			          <div class="card shadow mb-4" id="cuadro1">
			            <div class="card-header py-3">
			              <h6 class="m-0 font-weight-bold text-primary">Gestion Citas de Revision</h6>

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
								  <th>Nombre</th>
			                      <th>Fecha de registro</th>
								  <th>Registrado por</th>
			                    </tr>
			                  </thead>
			                  <tbody></tbody>
			                </table>
			              </div>
			            </div>
			          </div>


			          @include('citas.revision.store')
					  @include('citas.revision.view')
					  @include('citas.revision.edit')


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

				$("#collapse_Citas").addClass("show");
				$("#nav_revision-appointment, #modulo_Citas").addClass("active");

				verifyPersmisos(id_user, tokens, "revision-appointment");
			});



			function store(){
				enviarFormulario("#store", 'api/revision/appointment', '#cuadro2');
			}


			function update(){
				enviarFormularioPut("#form-update", 'api/revision/appointment', '#cuadro4', false, "#avatar-edit");
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
						 "url":''+url+'/api/revision/appointment',
						 "data": {
							"id_user": id_user,
							"token"  : tokens,
						},
						"dataSrc":""
					},
					"columns":[
						{"data": null,
							render : function(data, type, row) {
								var botones = "";
								if(consultar == 1)
									botones += "<span class='consultar btn btn-xs btn-info waves-effect' data-toggle='tooltip' title='Consultar'><i class='fa fa-eye' style='margin-bottom:5px'></i></span> ";
								if(actualizar == 1)
									botones += "<span class='editar btn btn-xs btn-primary waves-effect' data-toggle='tooltip' title='Editar'><i class='fas fa-edit' style='margin-bottom:5px'></i></span> ";
								if(data.status == 1 && actualizar == 1)
									botones += "<span class='desactivar btn btn-xs btn-warning waves-effect' data-toggle='tooltip' title='Desactivar'><i class='fa fa-unlock' style='margin-bottom:5px'></i></span> ";
								else if(data.status == 2 && actualizar == 1)
									botones += "<span class='activar btn btn-xs btn-warning waves-effect' data-toggle='tooltip' title='Activar'><i class='fa fa-lock' style='margin-bottom:5px'></i></span> ";
								if(borrar == 1)
									botones += "<span class='eliminar btn btn-xs btn-danger waves-effect' data-toggle='tooltip' title='Eliminar'><i class='fas fa-trash-alt' style='margin-bottom:5px'></i></span>";
								return botones;
							}
						},
						{"data":"nombre"},
						{"data": "fec_regins"},
						{"data": "email_regis"}
						
					],
					"language": idioma_espanol,
					"dom": 'Bfrtip',
					"responsive": true,
					"buttons":[
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

				$("#tableRegistrar tbody tr").remove()
				getPacientes("#paciente-store")
				GetClinic("#clinica-store")
				GetAsesoras("#asesora-store")
				cuadros("#cuadro1", "#cuadro2");

				SelectClinic("#paciente-store", "#clinica-store")

				SelectAsesora("#paciente-store", "#asesora-store")

			}
			
			function SelectClinic(select_cliente, select_clinica) {  

				$(select_cliente).change(function (e) { 

					var id_client = $(this).val()
					var url       = document.getElementById('ruta').value;
					$.ajax({
						url:''+url+'/api/clients/'+id_client,
						type:'get',
						data: {
							"id_user": id_user,
							"token"  : tokens,
						},
						dataType:'JSON',
						async: false,
						success: function(data){
							$(select_clinica).val(data.clinic)
							$(select_clinica  ).select2({
								width: '100%'
							});
						}
					});
				});
			}




			function SelectAsesora(select_cliente, select_asesora) {  
				$(select_cliente).change(function (e) { 

					var id_client = $(this).val()
					var url       = document.getElementById('ruta').value;
					$.ajax({
						url:''+url+'/api/clients/'+id_client,
						type:'get',
						data: {
							"id_user": id_user,
							"token"  : tokens,
						},
						dataType:'JSON',
						async: false,
						success: function(data){
							$(select_asesora).val(data.id_user_asesora)
							$(select_asesora).select2({
								width: '100%',
								disabled: true
							});
						}
					});
				});
			}




			/* ------------------------------------------------------------------------------- */
			/* 
				Funcion que muestra el cuadro3 para la consulta del banco.
			*/
			function ver(tbody, table){
				$(tbody).on("click", "span.consultar", function(){
					$("#alertas").css("display", "none");
					var data = table.row( $(this).parents("tr") ).data();

					$("#nombre-view").val(data.nombre).attr("disabled", "disabled")
					
					cuadros('#cuadro1', '#cuadro3');
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

					$("#nombre-edit").val(data.nombre)
					cuadros('#cuadro1', '#cuadro4');
					$("#id_edit").val(data.id_city)
					cuadros('#cuadro1', '#cuadro4');
				});
			}



					
		/* ------------------------------------------------------------------------------- */
			/*
				Funcion que capta y envia los datos a desactivar
			*/
			function desactivar(tbody, table){
				$(tbody).on("click", "span.desactivar", function(){
					var data=table.row($(this).parents("tr")).data();
					statusConfirmacion('api/status-city/'+data.id_city+"/"+2,"¿Esta seguro de desactivar el registro?", 'desactivar');
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
					statusConfirmacion('api/status-city/'+data.id_city+"/"+1,"¿Esta seguro de desactivar el registro?", 'activar');
				});
			}
		/* ------------------------------------------------------------------------------- */



			function eliminar(tbody, table){
				$(tbody).on("click", "span.eliminar", function(){
					var data=table.row($(this).parents("tr")).data();
					statusConfirmacion('api/status-city/'+data.id_city+"/"+0,"¿Esta seguro de eliminar el registro?", 'Eliminar');
				});
			}





			function addAppointment(tabla){

				var fecha       = $("#fecha-store").val()
				var cirujano    = $("#cirujano-store").val()
				var enfermera   = $("#enfermera-store").val()
				var descripcion = $("#descripcion-store").val()

				var valid = true

				$(tabla+" tbody tr").each(function(){
					
					if($(this).find('.fecha').val() == fecha){
						valid =  false;
					}
				})

				if(valid){

					var html = "";
					html += "<tr id='tr"+fecha+"'>"
						html += "<td>"+fecha+"<input type='hidden' name='fecha[]' class='fecha' value='"+fecha+"'></td>"
						html += "<td>"+descripcion+"<input type='hidden' name='descripcion[]' value='"+descripcion+"'></td>"
						html += "<td>"+cirujano+"<input type='hidden' name='cirujano[]' value='"+cirujano+"'></td>"
						html += "<td>"+enfermera+"<input type='hidden' name='enfermera[]' value='"+enfermera+"'></td>"
						html += "<td><button type='button' class='btn btn-danger waves-effect' onclick='eliminarTr(\"" + "#tr" + fecha + "\")'>Eliminar</button></td></tr>";
					html += "</tr>"
					
					$(tabla+" tbody").append(html)
				}else{
					warning("La fecha ya esta registrada")
				}
			}

		</script>
		



	@endsection


