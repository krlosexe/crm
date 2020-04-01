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
			          <h1 class="h3 mb-2 text-gray-800">Valoraciones</h1>

			          <div id="alertas"></div>
			          <input type="hidden" class="id_user">
			          <input type="hidden" class="token">

			          <!-- DataTales Example -->
			          <div class="card shadow mb-4" id="cuadro1">
			            <div class="card-header py-3">
			              <h6 class="m-0 font-weight-bold text-primary">Gestion de Valoraciones</h6>

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
								  <th>Hora Desde</th>
								  <th>Hora Hasta</th>
								  <th>Tipo</th>
								  <th>Estatus</th>
			                      <th>Fecha de registro</th>
								  <th>Registrado por</th>
			                    </tr>
			                  </thead>
			                  <tbody></tbody>
			                </table>
			              </div>
			            </div>
			          </div>


			          @include('citas.valuations.store')
					  @include('citas.valuations.view')
					  @include('citas.valuations.edit')


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
				$("#nav_valuations, #modulo_Citas").addClass("active");

				verifyPersmisos(id_user, tokens, "citys");
			});


			function update(){
				enviarFormularioPut("#form-update", 'api/valuations', '#cuadro4', false, "#avatar-edit");
			}

			function store(){
				enviarFormulario("#store", 'api/valuations', '#cuadro2');
			}


			function list(cuadro) {

				var data = {
					"id_user" : id_user,
					"token"   : tokens,
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
						 "url":''+url+'/api/valuations',
						 "data": {
							"rol"    : name_rol,
							"id_user": id_user,
							"token"  : tokens
							
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
							render : function(data, type, row) {
								return data;
							}
						},
						{"data": "fecha"},
						{"data": "time"},
						{"data": "time_end"},
						{"data": "type"},
						{"data": "status_valuations",
							render : function(data, type, row){
								if(data == 1){
									return "Procesado"
								}

								if(data == 0){
									return "Pendiente"
								}

								if(data == 2){
									return "Cancelado"
								}



							}
						},
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

					getPacientes("#paciente-view", data.id_cliente)

					$("#paciente-view").val(data.id_cliente).attr("disabled", "disabled")
					$("#fecha-view").val(data.fecha).attr("disabled", "disabled")
					$("#time-view").val(data.time).attr("disabled", "disabled")
					$("#time-end-view").val(data.time_end).attr("disabled", "disabled")
					$("#type-view").val(data.type).attr("disabled", "disabled")
					$("#observaciones-view").val(data.observaciones).attr("disabled", "disabled")
					$("#status-view").val(data.status_valuations).attr("disabled", "disabled")



					var url_imagen = 'img/valuations/cotizaciones/'
					var url        = document.getElementById('ruta').value; 
					
					if((data.cotizacion != "" ) &&  (data.cotizacion != null)){
						var ext = data.cotizacion.split('.');
						if (ext[1] == "pdf") {
							img = '<embed class="kv-preview-data file-preview-pdf" src="'+url_imagen+data.cotizacion+'" type="application/pdf" style="width:213px;height:160px;" internalinstanceid="174">'
						}else{
							img = '<img src="'+url_imagen+data.cotizacion+'" class="file-preview-image kv-preview-data">'
						}
							
					}else{img = ""}


					$("#file-input-view").fileinput('destroy');
					$("#file-input-view").fileinput({
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
							{caption: data.cotizacion , downloadUrl: url_imagen+data.cotizacion  ,url: url+"uploads/delete", key: data.cotizacion}
						],
					});




					$(".photo_valoration").fileinput('destroy');
					$("#photos_view").html("")
					var count = 0
					$.map(data.photos, function (item, key) {
						
						var html  = ""
						html += "<div class='col-md-4'>"
							html += "<input type='file' class='photo_valoration' id='photo_view_"+count+"'>" 
						html += "</div>"
						count++

						$("#photos_view").append(html)
					});

					

					var count = 0
					$.map(data.photos, function (item, key) {
						
					
						var url_imagen = '/img/valuations/'
						var url        = document.getElementById('ruta').value; 
						img = '<img src="'+url+url_imagen+item.foto+'" class="file-preview-image kv-preview-data">'

						$("#photo_view_"+count).fileinput('destroy');
						$("#photo_view_"+count).fileinput({
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
								{caption: data.foto , downloadUrl: url+url_imagen+data.foto  ,url: url+"uploads/delete", key: data.foto}
							],
						});


						count++
					});



					




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

					getPacientes("#paciente-edit", data.id_cliente)

					$("#paciente-edit").val(data.id_cliente)
					$("#fecha-edit").val(data.fecha)
					$("#time-edit").val(data.time)
					$("#time-end-edit").val(data.time_end)
					$("#type-edit").val(data.type)
					$("#observaciones-edit").val(data.observaciones)
					$("#status-edit").val(data.status_valuations)


					var url_imagen = 'img/valuations/cotizaciones/'
					var url        = document.getElementById('ruta').value; 
					
					if((data.cotizacion != "" ) &&  (data.cotizacion != null)){
						var ext = data.cotizacion.split('.');
						if (ext[1] == "pdf") {
							img = '<embed class="kv-preview-data file-preview-pdf" src="'+url_imagen+data.cotizacion+'" type="application/pdf" style="width:213px;height:160px;" internalinstanceid="174">'
						}else{
							img = '<img src="'+url_imagen+data.cotizacion+'" class="file-preview-image kv-preview-data">'
						}
							
					}else{img = ""}


					$("#file-input-edit").fileinput('destroy');
					$("#file-input-edit").fileinput({
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
							{caption: data.cotizacion , downloadUrl: url_imagen+data.cotizacion  ,url: url+"uploads/delete", key: data.cotizacion}
						],
					});





					$(".photo_valoration").fileinput('destroy');
					$("#photos_view").html("")
					var count = 0
					$.map(data.photos, function (item, key) {
						
						var html  = ""
						html += "<div class='col-md-4'>"
							html += "<input type='file' class='photo_valoration' id='photo_view_"+count+"'>" 
						html += "</div>"
						count++

						$("#photos_view").append(html)
					});

					

					var count = 0
					$.map(data.photos, function (item, key) {
						
					
						var url_imagen = '/img/valuations/'
						var url        = document.getElementById('ruta').value; 
						img = '<img src="'+url+url_imagen+item.foto+'" class="file-preview-image kv-preview-data">'

						$("#photo_view_"+count).fileinput('destroy');
						$("#photo_view_"+count).fileinput({
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
								{caption: data.foto , downloadUrl: url+url_imagen+data.foto  ,url: url+"uploads/delete", key: data.foto}
							],
						});


						count++
					});



					$(".photo_valoration").fileinput('destroy');
					$("#photos_edit").html("")
					var count = 0
					$.map(data.photos, function (item, key) {
						
						var html  = ""
						html += "<div class='col-md-4'>"
							html += "<input type='file' class='photo_valoration' id='photo_edit_"+count+"'>" 
						html += "</div>"
						count++

						$("#photos_edit").append(html)
					});

					

					var count = 0
					$.map(data.photos, function (item, key) {
						
					
						var url_imagen = '/img/valuations/'
						var url        = document.getElementById('ruta').value; 
						img = '<img src="'+url+url_imagen+item.foto+'" class="file-preview-image kv-preview-data">'

						$("#photo_edit_"+count).fileinput('destroy');
						$("#photo_edit_"+count).fileinput({
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
								{caption: data.foto , downloadUrl: url+url_imagen+data.foto  ,url: url+"uploads/delete", key: data.foto}
							],
						});


						count++


					});


					cuadros('#cuadro1', '#cuadro4');
					$("#id_edit").val(data.id_valuations)
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
					statusConfirmacion('api/valuations/status/'+data.id_valuations+"/"+2,"¿Esta seguro de desactivar el registro?", 'desactivar');
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
					statusConfirmacion('api/valuations/status/'+data.id_valuations+"/"+1,"¿Esta seguro de desactivar el registro?", 'activar');
				});
			}
		/* ------------------------------------------------------------------------------- */



			function eliminar(tbody, table){
				$(tbody).on("click", "span.eliminar", function(){
					var data=table.row($(this).parents("tr")).data();
					statusConfirmacion('api/valuations/status/'+data.id_valuations+"/"+0,"¿Esta seguro de eliminar el registro?", 'Eliminar');
				});
			}

		</script>
		



	@endsection


