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
								  <th>Code</th>
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
								//	botones += "<span class='consultar btn btn-sm btn-info waves-effect' data-toggle='tooltip' title='Consultar'><i class='fa fa-eye' style='margin-bottom:5px'></i></span> ";
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
						{"data": "code"},
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

				 $("#paciente-store option").remove();
				 $('#summernote').summernote("reset");

				getPacientes("#paciente-store")

				GetClinic2("#clinic")


				cuadros("#cuadro1", "#cuadro2");
			}



			function GetClinic2(select, select_default = false){
				var url=document.getElementById('ruta').value;
				$.ajax({
					url:''+url+'/api/clinic',
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
					//mensajes('danger', '<span>Ha ocurrido un error, por favor intentelo de nuevo</span>');         
					},
					success: function(data){
					$(select+" option").remove();
					$(select).append($('<option>',
					{
						value: "",
						text : "Seleccione"
					}));
					$.each(data, function(i, item){
						if (item.status == 1) {
						$(select).append($('<option>',
						{
							value: item.id_clinic,
							text : item.nombre,
							selected: select_default == item.id_clinic ? true : false
						}));
						}
					});

					}
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

					//getPacientes("#paciente-edit", data.id_cliente)

					GetClinic2("#clinic-edit", data.id_clinic)

					$("#paciente-edit").val(data.id_cliente)
					$("#surgeon-edit").val(data.surgeon)
					$("#name_client").val(data.nombres)
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






					$('#summernote_edit').summernote("reset");
					var url=document.getElementById('ruta').value; 
					var html = "";


					if(data.observaciones != null){
						html += '<div class="col-md-12" style="margin-bottom: 15px">'
							html += '<div class="row">'
								html += '<div class="col-md-2">'
									
								html += '</div>'
								html += '<div class="col-md-10" style="background: #eee;padding: 2%;border-radius: 17px;">'
									html += '<div>'+data.observaciones+'</div>'
								html += '</div>'
							html += '</div>'
						html += '</div>'
					}


					SubmitComment(data.id_valuations, "api/comments/valuations", "#comments_edit", "#add-comments", "#summernote_edit")


					GetComments("#comments_edit", data.id_valuations)


					cuadros('#cuadro1', '#cuadro4');
					$("#id_edit").val(data.id_valuations)
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


			function GetComments(comment_content, id_valuation){
				$(comment_content).html("Cargando...")
				var url=document.getElementById('ruta').value;	
				$.ajax({
					url:''+url+'/api/comments/valuations/'+id_valuation,
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


