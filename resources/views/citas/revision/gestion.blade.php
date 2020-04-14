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

	<link href="<?= url('/') ?>/vendor/summernote-master/dist/summernote.min.css" rel="stylesheet">
    <script src="<?= url('/') ?>/vendor/summernote-master/dist/summernote.min.js"></script>


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
								  <th>Paciente</th>
								  <th>Clinica</th>
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
							"rol"    : name_rol,
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
									//botones += "<span class='consultar btn btn-sm btn-info waves-effect' data-toggle='tooltip' title='Consultar'><i class='fa fa-eye' style='margin-bottom:5px'></i></span> ";
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
						{"data":"name_client", 
							render: function(data, type, row){
								return row.name_client
							}
						},
						{"data": "name_clinic"},
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

				table
				.search("").draw()


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

				$("#paciente-store option").remove();

				
				getPacientes("#paciente-store")
				GetClinic("#clinica-store")
				GetAsesoras("#asesora-store")
				cuadros("#cuadro1", "#cuadro2");

				SelectClinic("#paciente-store", "#clinica-store")
				SelectAsesora("#paciente-store", "#asesora-store")

				$('#summernote').summernote("reset");



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

					getPacientes("#paciente-view", data.id_paciente)
					GetClinic("#clinica-view")
					GetAsesoras("#asesora-view")

					SelectClinic("#paciente-view", "#clinica-view")
					SelectAsesora("#paciente-view", "#asesora-view")

					$("#paciente-view").val(data.id_paciente).attr("disabled", "disabled")
					$("#paciente-view").trigger("change");
					$("#clinica-view").attr("disabled", "disabled")

					$("#numero_contrato-view").val(data.numero_contrato).attr("disabled", "disabled")
					$("#cirugia-view").val(data.cirugia).attr("disabled", "disabled")
					
					$("#clinica-view").val(data.clinica).attr("disabled", "disabled")

					showSchedule(data.agenda, "#tableView", "view")
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

					//getPacientes("#paciente-edit", data.id_paciente)
					GetClinic("#clinica-edit")
					GetAsesoras("#asesora-edit")

					SelectClinic("#paciente-edit", "#clinica-edit")
					SelectAsesora("#paciente-edit", "#asesora-edit")

					$("#name_paciente-edit").val(data.nombres)
					$("#paciente-edit").val(data.id_paciente).attr("disabled", "disabled")
					$("#paciente-edit").trigger("change");
					$("#clinica-edit").attr("disabled", "disabled")

					$("#numero_contrato-edit").val(data.numero_contrato)
					$("#cirugia-edit").val(data.cirugia)
					
					showSchedule(data.agenda, "#tableEdit", "edit")


					GetComments("#comments_edit", data.id_revision)

					$('#summernote_edit').summernote("reset");

					SubmitComment(data.id_revision, "api/comments/revision_appointment", "#comments_edit", "#add-comments", "#summernote_edit")




					$("#id_edit").val(data.id_revision)
					cuadros('#cuadro1', '#cuadro4');
				});
			}



			function SubmitComment(id, api, table, btn, summer){

				$(btn).unbind().click(function (e) { 

					var html = ""

					html += '<div class="col-md-12" style="margin-bottom: 15px">'
						html += '<div class="row">'
							html += '<div class="col-md-2">'
							html += '</div>'
							html += '<div class="col-md-10" style="background: #eee;padding: 2%;border-radius: 17px;">'
								html += '<div>'+$(summer).val()+'</div>'

								html += '<div><b></b> <span style="float: right">Ahora Mismo</span></div>'

							html += '</div>'
						html += '</div>'
					html += '</div>'

					$(table).append(html)


					var url=document.getElementById('ruta').value;

					$.ajax({
						url:''+url+"/"+api,
						type:'POST',
						data: {
							"id_user" : id_user,
							"token"   : tokens,
							"id"      : id,
							"comment" : $(summer).val(),
							
						},
						dataType:'JSON',
						beforeSend: function(){
							$(btn).text("espere...").attr("disabled", "disabled")
						},
						error: function (data) {
							$(btn).text("Comentar").removeAttr("disabled")
						},
						success: function(data){
							$(btn).text("Comentar").removeAttr("disabled")
							$(summer).summernote("reset");
						}
					});



					
				});

			}


			function GetComments(comment_content, id){
				$(comment_content).html("Cargando...")
				var url=document.getElementById('ruta').value;	
				$.ajax({
					url:''+url+'/api/comments/revision_appointment/'+id,
					type:'GET',
					dataType:'JSON',
					
					beforeSend: function(){

					},
					error: function (data) {
					},
					success: function(result){
						
						var url=document.getElementById('ruta').value; 
						var html = "";
						
						$.map(result, function (item, key) {
							html += '<div class="col-md-12" style="margin-bottom: 15px">'
								html += '<div class="row">'
									html += '<div class="col-md-2">'
										html += "<img class='rounded' src='"+url+"/img/usuarios/profile/"+item.img_profile+"' style='height: 4rem;width: 4rem; margin: 1%; border-radius: 50%!important;' title='"+item.name_follower+" "+item.last_name_follower+"'>"
										
									html += '</div>'
									html += '<div class="col-md-10" style="background: #eee;padding: 2%;border-radius: 17px;">'
										html += '<div>'+item.comment+'</div>'

										html += '<div><b>'+item.name_user+" "+item.last_name_user+'</b> <span style="float: right">'+item.create_at+'</span></div>'


									html += '</div>'
								html += '</div>'
							html += '</div>'
							
						});

						
						$(comment_content).html(html)
					}
				});
			}


			function showSchedule(schedule, table, option){

				var html = "";
				$.each(schedule, function (key, item) { 

					var btn = option == "view" ? '' : "<button type='button' class='btn btn-danger waves-effect' onclick='eliminarTr(\"" + "#tr2_" + item.id_appointments_agenda + "\")'>Eliminar</button>"

					html += "<tr id='tr2_"+item.id_appointments_agenda+"'>"
						html += "<td>"+item.fecha+"<input type='hidden' name='fecha[]' class='fecha' value='"+item.fecha+"'></td>"
						html += "<td>"+item.time+"<input type='hidden' name='time[]' class='time' value='"+item.time+"'></td>"
						html += "<td>"+item.time_end+"<input type='hidden' name='time_end[]' class='time_end' value='"+item.time_end+"'></td>"
						html += "<td>"+item.descripcion+"<input type='hidden' name='descripcion[]' value='"+item.descripcion+"'></td>"
						html += "<td>"+item.cirujano+"<input type='hidden' name='cirujano[]' value='"+item.cirujano+"'></td>"
						html += "<td>"+item.enfermera+"<input type='hidden' name='enfermera[]' value='"+item.enfermera+"'></td>"
						html += "<td>"+btn+"</td>";
					html += "</tr>"
				});

				$(table+" tbody").html(html)

			}

					
		/* ------------------------------------------------------------------------------- */
			/*
				Funcion que capta y envia los datos a desactivar
			*/
			function desactivar(tbody, table){
				$(tbody).on("click", "span.desactivar", function(){
					var data=table.row($(this).parents("tr")).data();
					statusConfirmacion('api/revision/appointment/status/'+data.id_revision+"/"+2,"¿Esta seguro de desactivar el registro?", 'desactivar');
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
					statusConfirmacion('api/revision/appointment/status/'+data.id_revision+"/"+1,"¿Esta seguro de desactivar el registro?", 'activar');
				});
			}
		/* ------------------------------------------------------------------------------- */



			function eliminar(tbody, table){
				$(tbody).on("click", "span.eliminar", function(){
					var data=table.row($(this).parents("tr")).data();
					statusConfirmacion('api/revision/appointment/status/'+data.id_revision+"/"+0,"¿Esta seguro de eliminar el registro?", 'Eliminar');
				});
			}





			function addAppointment(tabla, option){

				var fecha       = $("#fecha-"+option).val()
				var time        = $("#time-"+option).val()
				var time_end    = $("#time-end-"+option).val()
				var cirujano    = $("#cirujano-"+option).val()
				var enfermera   = $("#enfermera-"+option).val()
				var descripcion = $("#descripcion-"+option).val()

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
						html += "<td>"+time+"<input type='hidden' name='time[]' class='time' value='"+time+"'></td>"
						html += "<td>"+time_end+"<input type='hidden' name='time_end[]' class='time_end' value='"+time_end+"'></td>"
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


