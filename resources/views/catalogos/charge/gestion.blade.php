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
			          <h1 class="h3 mb-2 text-gray-800">Cambios</h1>

			          <div id="alertas"></div>
			          <input type="hidden" class="id_user">
			          <input type="hidden" class="token">

			          <!-- DataTales Example -->
			          <div class="card shadow mb-4" id="cuadro1">
			            <div class="card-header py-3">
			              <h6 class="m-0 font-weight-bold text-primary">Gestion de Cambios</h6>
			            </div>
			            <div class="card-body">
			              <div class="table-responsive">
			                <table class="table table-bordered" id="table" width="100%" cellspacing="0">
			                  <thead>
			                    <tr>
								  <th>Acciones</th>
								  <th>Afiliado</th>
								  <th>Solicitud</th>
								  <th>Estatus</th>
			                      <th>Fecha de registro</th>
			                    </tr>
			                  </thead>
			                  <tbody>
			                    
			                  </tbody>
			                </table>
			              </div>
			            </div>
			          </div>


			          @include('catalogos.charge.store')
					  @include('catalogos.charge.view')
					  @include('catalogos.charge.edit')


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

				$("#collapse_Pacientes").addClass("show");
				$("#nav_commissions, #modulo_Pacientes").addClass("active");

				verifyPersmisos(id_user, tokens, "clinics");
			});



			function update(){
				enviarFormularioPut("#form-update", 'api/update/request/charge', '#cuadro4', false, "#avatar-edit");
			}


			function store(){
				enviarFormulario("#store", 'api/create/comission', '#cuadro2');
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
						 "url":''+url+'/api/get/request/charge',
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
								if(actualizar == 1)
									botones += "<span class='editar btn btn-sm btn-primary waves-effect' data-toggle='tooltip' title='Editar'><i class='fas fa-edit' style='margin-bottom:5px'></i></span> ";
								return botones;
							}
						},
						{"data":"nombres"},
						{"data":"amount"},
						{"data":"status"},
						{"data": "created_at"}
						
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
				GetCity("#city-store")

				$("#file-input-edit").fileinput('destroy');
				$("#file-input-edit").fileinput({
					theme: "fas",
					overwriteInitial: true,
					//maxFileSize: 1500,
					showClose: false,
					showCaption: false,
					browseLabel: '',
					removeLabel: '',
					browseIcon: '<i class="fa fa-folder-open"></i>',
					removeIcon: '<i class="fas fa-trash-alt"></i>',
					previewFileIcon: '<i class="fas fa-file"></i>',
					removeTitle: 'Cancel or reset changes',
					elErrorContainer: '#kv-avatar-errors-1',
					msgErrorClass: 'alert alert-block alert-danger',
					
					layoutTemplates: {main2: '{preview}  {remove} {browse}'},
					allowedFileExtensions: ["jpg", "jpeg", "png", "gif", "pdf", "docs"],
					
				});



				cuadros("#cuadro1", "#cuadro2");
			}



			$("#search_affiliate").click(function (e) { 
				e.preventDefault();

				var url=document.getElementById('ruta').value;
				$.ajax({
					url:''+url+'/api/get/affiliate/'+$("#code_affiliate").val(),
					type:'GET',
					data: {
							"id_user": id_user,
							"token"  : tokens,
						},
					dataType:'JSON',
					async: false,
					beforeSend: function(){
					// mensajes('info', '<span>Buscando, espere por favor... <i class="fa fa-spinner fa-spin" aria-hidden="true"></i></span>');
					},
					error: function (data) {
						mensajes('danger', '<span>'+data.responseText+'</span>');         
					},
					success: function(data){
						console.log(data)

						$("#nombre").val(data.nombres)
						$("#telefono").val(data.telefono)
						$("#email").val(data.email)
						$("#percentege").val(data.comission_percentaje)
						$("#id_client").val(data.id_cliente)


					}
				});	

			});

			function GetCity(select){
				
				var url=document.getElementById('ruta').value;
				$.ajax({
					url:''+url+'/api/city',
					type:'GET',
					data: {
							"id_user": id_user,
							"token"  : tokens,
						},
					dataType:'JSON',
					async: false,
					beforeSend: function(){
					// mensajes('info', '<span>Buscando, espere por favor... <i class="fa fa-spinner fa-spin" aria-hidden="true"></i></span>');
					},
					error: function (data) {
						//mensajes('danger', '<span>Ha ocurrido un error, por favor intentelo de nuevo</span>');         
					},
					success: function(data){
						$(select+" option").remove();
						$(select).append($('<option>',
						{
							value: "null",
							text : "Seleccione"
						}));
						$.each(data, function(i, item){
							if (item.status == 1) {
								$(select).append($('<option>',
								{
									value: item.id_city,
									text : item.nombre
								}));
							}
						});

					}
				});
			}




			$("#amount_procedure").keyup(function (e) { 
				const amount_comission = ($(this).val() / 100) * $("#percentege").val()
				$("#amount_comission").val(amount_comission)
			});


			/* ------------------------------------------------------------------------------- */
			/* 
				Funcion que muestra el cuadro3 para la consulta del banco.
			*/
			function ver(tbody, table){
				$(tbody).on("click", "span.consultar", function(){
					$("#alertas").css("display", "none");
					var data = table.row( $(this).parents("tr") ).data();

					$("#nombre-view").val(data.nombre).attr("disabled", "disabled")
					GetCity("#city-view")
					$("#city-view").val(data.id_city).attr("disabled", "disabled")
					$("#direccion-view").val(data.direccion).attr("disabled", "disabled")
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
					
					$("#nombre-edit").val(data.nombres)
					$("#amount-edit").val(data.amount)
					$("#status").val(data.status)
					$("#balance-edit").val(data.balance)
					$("#id_edit").val(data.id)
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
					statusConfirmacion('api/status-clinic/'+data.id_clinic+"/"+2,"¿Esta seguro de desactivar el registro?", 'desactivar');
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
					statusConfirmacion('api/status-clinic/'+data.id_clinic+"/"+1,"¿Esta seguro de desactivar el registro?", 'activar');
				});
			}
		/* ------------------------------------------------------------------------------- */



			function eliminar(tbody, table){
				$(tbody).on("click", "span.eliminar", function(){
					var data=table.row($(this).parents("tr")).data();
					statusConfirmacion('api/status-clinic/'+data.id_clinic+"/"+0,"¿Esta seguro de eliminar el registro?", 'Eliminar');
				});
			}

					


		</script>
		



	@endsection


