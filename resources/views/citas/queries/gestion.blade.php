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
			          <h1 class="h3 mb-2 text-gray-800">Consultas</h1>

			          <div id="alertas"></div>
			          <input type="hidden" class="id_user">
			          <input type="hidden" class="token">

			          <!-- DataTales Example -->
			          <div class="card shadow mb-4" id="cuadro1">
			            <div class="card-header py-3">
			              <h6 class="m-0 font-weight-bold text-primary">Gestion de Consultas</h6>

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
								  <th>Nombres</th>
								  <th>Fecha</th>
			                      <th>Fecha de registro</th>
								  <th>Registrado por</th>
			                    </tr>
			                  </thead>
			                  <tbody></tbody>
			                </table>
			              </div>
			            </div>
			          </div>


			          @include('citas.queries.store')
					  @include('citas.queries.view')
					  @include('citas.queries.edit')


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
				$("#nav_queries, #modulo_Citas").addClass("active");

				verifyPersmisos(id_user, tokens, "citys");
			});


			function update(){
				enviarFormularioPut("#form-update", 'api/queries', '#cuadro4', false, "#avatar-edit");
			}

			function store(){
				enviarFormulario("#store", 'api/queries', '#cuadro2');
			}


			function list(cuadro) {
				var data = {
					"id_user": id_user,
					"token"  : tokens,
				};


				$("#div-input-edit").css("display", "none")
				$('#table tbody').off('click');
				var url=document.getElementById('ruta').value; 
				cuadros(cuadro, "#cuadro1");

				var table=$("#table").DataTable({
					"destroy":true,
					
					"stateSave": true,
					"serverSide":false,
					"ajax":{
						"method":"GET",
						 "url":''+url+'/api/queries',
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
						{"data":"nombres", 
							render : function(data, type, row) {
								return data+" "+row.apellidos;
							}
						},
						{"data": "fecha"},
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

				getPacientes("#paciente-store")
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

					getPacientes("#paciente-view")

					$("#paciente-view").val(data.id_cliente).attr("disabled", "disabled")
					$("#fecha-view").val(data.fecha).attr("disabled", "disabled")
					$("#observaciones-view").val(data.observaciones).attr("disabled", "disabled")
					$("#status-view").val(data.status_queries).attr("disabled", "disabled")

					
					
					cuadros('#cuadro1', '#cuadro3');
				});
			}



			/* ------------------------------------------------------------------------------- */
			/* 
				Funcion que muestra el cuadro3 para la consulta del banco.
			*/
			var file_name = "";
			function edit(tbody, table){
				$(tbody).on("click", "span.editar", function(){
					$("#alertas").css("display", "none");
					var data = table.row( $(this).parents("tr") ).data();

					$("#file-input-edit").fileinput('destroy');
					getPacientes("#paciente-edit")

					file_name = data.file_cotizacion

					$("#paciente-edit").val(data.id_cliente)
					$("#fecha-edit").val(data.fecha)
					$("#observaciones-edit").val(data.observaciones)
					$("#status-edit").val(data.status_queries)
					$("#status-edit").trigger("change");
					cuadros('#cuadro1', '#cuadro4');
					$("#id_edit").val(data.id_queries)
					cuadros('#cuadro1', '#cuadro4');
				});
			}


			$("#status-edit").change(function (e) { 
				$(this).val() == 1 ? showInputFile("#div-input-edit", "#file-input-edit", "block", file_name) : showInputFile("#div-input-edit", "#file-input-edit", "none", file_name)
			});


			function showInputFile(div, input, option, file_name){
				$(div).css("display", option)

				var url_imagen = '/img/queries/cotizaciones/'
				var url        = document.getElementById('ruta').value; 

				
				if(file_name != ""){

					var ext = file_name.split('.');

					if (ext[1] == "pdf") {
						img = '<embed class="kv-preview-data file-preview-pdf" src="'+url_imagen+file_name+'" type="application/pdf" style="width:213px;height:160px;" internalinstanceid="174">'
					}else{
						img = '<img src="'+url_imagen+file_name+'" class="file-preview-image kv-preview-data">'
					}
						
				}else{img = ""}


				if(option == "block"){
					$(input).attr("required", "required")
					$(input).fileinput('destroy');
					$(input).fileinput({
						theme: "fas",
						overwriteInitial: true,
						maxFileSize: 1500,
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
						allowedFileExtensions: ["jpg", "png", "gif", "pdf", "docs"],
						initialPreview: [ 
							img
						],

						initialPreviewConfig: [
							{caption: file_name , downloadUrl: url_imagen+file_name  ,url: url+"uploads/delete", key: file_name}
						],
					});
				}else{
					$(input).fileinput('destroy');
					$(input).removeAttr("required")
				}
			}
					
		/* ------------------------------------------------------------------------------- */
			/*
				Funcion que capta y envia los datos a desactivar
			*/
			function desactivar(tbody, table){
				$(tbody).on("click", "span.desactivar", function(){
					var data=table.row($(this).parents("tr")).data();
					statusConfirmacion('api/status-queries/'+data.id_queries+"/"+2,"¿Esta seguro de desactivar el registro?", 'desactivar');
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
					statusConfirmacion('api/status-queries/'+data.id_queries+"/"+1,"¿Esta seguro de desactivar el registro?", 'activar');
				});
			}
		/* ------------------------------------------------------------------------------- */



			function eliminar(tbody, table){
				$(tbody).on("click", "span.eliminar", function(){
					var data=table.row($(this).parents("tr")).data();
					statusConfirmacion('api/status-queries/'+data.id_queries+"/"+0,"¿Esta seguro de eliminar el registro?", 'Eliminar');
				});
			}

		</script>
		



	@endsection


