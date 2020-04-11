<!DOCTYPE html>
<html lang="es">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>App</title>

  <!-- Custom fonts for this template-->
  <link href="<?= url('/') ?>/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="<?= url('/') ?>/css/sb-admin-2.min.css" rel="stylesheet">
  <link href="<?= url('/') ?>/css/custom.css" rel="stylesheet">



  <link href="<?= url('/') ?>/vendor/bootstrap-fileinput/css/fileinput.css" media="all" rel="stylesheet" type="text/css"/>
  <link href="<?= url('/') ?>/vendor/bootstrap-fileinput/themes/explorer-fas/theme.css" media="all" rel="stylesheet" type="text/css"/>

  <script src="<?= url('/') ?>/vendor/jquery/jquery.min.js"></script>
    <!-- Custom styles for this page -->
  <link href="<?= url('/') ?>/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
  <link href="<?= url('/') ?>/vendor/sweetalert/sweetalert.css" rel="stylesheet">


  <link href="<?= url('/') ?>/vendor/select2-4.0.11/dist/css/select2.min.css" rel="stylesheet" />


  <link href="<?= url('/') ?>/vendor/summernote-master/dist/summernote.min.css" rel="stylesheet">
    <script src="<?= url('/') ?>/vendor/summernote-master/dist/summernote.min.js"></script>


	

  
  @if(Request::path() != '/')

    <script>
      $(document).ready(function(){

		var url = $(location).attr('href').split("/").splice(-4);
		
        validAuth(false, url[0]);

        GetNotifications();

      });
    </script>

  @endif

</head>

<body class="{{ Request::path() != '/' ? 'dasboard-body' : ''}} bg-gradient-primary" style="background: #fff !important">
  <div id="page-loader"  ><span class="preloader-interior"></span></div>

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

	     <!-- Page Wrapper -->
		  <div id="wrapper">


		    <!-- Content Wrapper -->
		    <div id="content-wrapper" class="d-flex flex-column">

		      <!-- Main Content -->
		      <div id="content">

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
								  <th>Codigo</th>
								  <th>Nombres</th>
								  <th>Fecha</th>
								  <th>Hora Desde</th>
								  <th>Hora Hasta</th>
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


			          @include('catalogos.clientes.valuations.store')
					  @include('catalogos.clientes.valuations.view')
					  @include('catalogos.clientes.valuations.edit')


			        </div>
			        <!-- /.container-fluid -->

		      </div>
		      <!-- End of Main Content -->
				


				<!-- Logout Modal-->
				<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
					<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
						<h5 class="modal-title" id="exampleModalLabel">¿Preparado para irme?</h5>
						<button class="close" type="button" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">×</span>
						</button>
						</div>
						<div class="modal-body">Seleccione "Cerrar sesión" a continuación si está listo para finalizar su sesión actual.</div>
						<div class="modal-footer">
						<button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
						<a class="btn btn-primary" id="logout" href="logout">Cerrar Sesion</a>
						</div>
					</div>
					</div>
				</div>


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




  <!-- Bootstrap core JavaScript-->

  <script src="<?= url('/') ?>/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?= url('/') ?>/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="<?= url('/') ?>/js/sb-admin-2.min.js"></script>
  


   <!-- Page level plugins -->
  <script src="<?= url('/') ?>/vendor/chart.js/Chart.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="<?= url('/') ?>/js/demo/chart-area-demo.js"></script>
  <script src="<?= url('/') ?>/js/demo/chart-pie-demo.js"></script>

  


 <!-- Page level plugins -->
    <script src="<?= url('/') ?>/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="<?= url('/') ?>/vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="<?= url('/') ?>/js/demo/datatables-demo.js"></script>

  


    <script src="<?= url('/') ?>/vendor/bootstrap-fileinput/js/plugins/piexif.js" type="text/javascript"></script>
    <script src="<?= url('/') ?>/vendor/bootstrap-fileinput/js/plugins/sortable.js" type="text/javascript"></script>
    <script src="<?= url('/') ?>/vendor/bootstrap-fileinput/js/fileinput.js" type="text/javascript"></script>
    <script src="<?= url('/') ?>/vendor/bootstrap-fileinput/js/locales/fr.js" type="text/javascript"></script>
    <script src="<?= url('/') ?>/vendor/bootstrap-fileinput/js/locales/es.js" type="text/javascript"></script>
    <script src="<?= url('/') ?>/vendor/bootstrap-fileinput/themes/fas/theme.js" type="text/javascript"></script>
    <script src="<?= url('/') ?>/vendor/bootstrap-fileinput/themes/explorer-fas/theme.js" type="text/javascript"></script>





    <script src="<?= url('/') ?>/vendor/sweetalert/sweetalert.min.js" type="text/javascript"></script>
    <script src="<?= url('/') ?>/vendor/sweetalert/sweetalert-dev.js" type="text/javascript"></script>

    <script src="<?= url('/') ?>/vendor/select2-4.0.11/dist/js/select2.min.js"></script>


  <script src="<?= url('/') ?>/js/funciones.js"></script>
  

  <script>
    var user_id = localStorage.getItem('user_id');
    $("#logout").attr("href", "logout/"+user_id)
  </script>


<script>
			$(document).ready(function(){
				store();
				list();
				update();

				$("#collapse_Citas").addClass("show");
				$("#nav_valuations, #modulo_Citas").addClass("active");

				verifyPersmisos(id_user, tokens, "citys");


				$('#summernote').summernote({
					'height' : 200
				});



			});

			var  option = {{$option}};

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
						 "url":''+url+'/api/valuations/client/'+{{ $id_client }},
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
									//botones += "<span class='consultar btn btn-sm btn-info waves-effect' data-toggle='tooltip' title='Consultar'><i class='fa fa-eye' style='margin-bottom:5px'></i></span> ";
								if(actualizar == 1 && option == 1)
									botones += "<span class='editar btn btn-sm btn-primary waves-effect' data-toggle='tooltip' title='Editar'><i class='fas fa-edit' style='margin-bottom:5px'></i></span> ";
								if(data.status == 1 && actualizar == 1 && option == 1)
									botones += "<span class='desactivar btn btn-sm btn-warning waves-effect' data-toggle='tooltip' title='Desactivar'><i class='fa fa-unlock' style='margin-bottom:5px'></i></span> ";
								else if(data.status == 2 && actualizar == 1 && option == 1)
									botones += "<span class='activar btn btn-sm btn-warning waves-effect' data-toggle='tooltip' title='Activar'><i class='fa fa-lock' style='margin-bottom:5px'></i></span> ";
								if(borrar == 1 && option == 1)
									botones += "<span class='eliminar btn btn-sm btn-danger waves-effect' data-toggle='tooltip' title='Eliminar'><i class='fas fa-trash-alt' style='margin-bottom:5px'></i></span>";
								return botones;
							}
						},
						{"data": "code"},
						{"data":"nombres", 
							render : function(data, type, row) {
								return data+" "+row.apellidos;
							}
						},
						{"data": "fecha"},
						{"data": "time"},
						{"data": "time_end"},
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
				.search("").draw(); 
				ver("#table tbody", table)
				edit("#table tbody", table)
				activar("#table tbody", table)
				desactivar("#table tbody", table)
				eliminar("#table tbody", table)


			}



			function nuevo() {
				$("#alertas").css("display", "none");
				$("#store")[0].reset();
				GetAsesorasValoracion("#id_asesora_valoracion")
				GetClinic("#clinic")
				cuadros("#cuadro1", "#cuadro2");

				$('#summernote').summernote("reset");
			}



			function copyToClipboard(element) {
				var $temp = $("<input>");
				$("body").append($temp);
				$temp.val($(element).text()).select();
				document.execCommand("copy");
				$temp.remove();

				mensajes('success', "Codigo: "+$(element).text()+" Copiado");


			}



			/* ------------------------------------------------------------------------------- */
			/* 
				Funcion que muestra el cuadro3 para la consulta del banco.
			*/
			function ver(tbody, table){
				$(tbody).on("click", "span.consultar", function(){
					$("#alertas").css("display", "none");
					var data = table.row( $(this).parents("tr") ).data();
					GetAsesorasValoracion("#id_asesora_valoracion_view")

					GetClinic("#clinic_view")

					$("#paciente-view").val(data.id_cliente).attr("disabled", "disabled")
					$("#fecha-view").val(data.fecha).attr("disabled", "disabled")

					//alert(data.id_asesora_valoracion)
					$("#id_asesora_valoracion_view").val(data.id_asesora).attr("disabled", "disabled")
					$("#time-view").val(data.time).attr("disabled", "disabled")
					$("#time-end-view").val(data.time_end).attr("disabled", "disabled")
					$("#type-view").val(data.type).attr("disabled", "disabled")
					$("#clinic_view").val(data.id_clinic).attr("disabled", "disabled")
					$("#observaciones-view").val(data.observaciones).attr("disabled", "disabled")
					$("#status-view").val(data.status_valuations).attr("disabled", "disabled")

					$("#code-view").text(data.code)



					var url_imagen = '/img/valuations/cotizaciones/'
					var url        = document.getElementById('ruta').value; 
					
					if((data.cotizacion != "" ) &&  (data.cotizacion != null)){
						var ext = data.cotizacion.split('.');
						if (ext[1] == "pdf") {
							img = '<embed class="kv-preview-data file-preview-pdf" src="'+url+url_imagen+data.cotizacion+'" type="application/pdf" style="width:213px;height:160px;" internalinstanceid="174">'
						}else{
							img = '<img src="'+url+url_imagen+data.cotizacion+'" class="file-preview-image kv-preview-data">'
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
							{caption: data.cotizacion , downloadUrl: url+url_imagen+data.cotizacion  ,url: url+"uploads/delete", key: data.cotizacion}
						],
					});




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


					
					$.map(data.comments, function (item, key) {
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

					
					$("#comments").html(html)




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
					GetAsesorasValoracion("#id_asesora_valoracion_edit")
					GetClinic("#clinic_edit")

					$("#surgeon-edit").val(data.surgeon)

					
					$("#id_asesora_valoracion_edit").val(data.id_asesora)
					$("#paciente-edit").val(data.id_cliente)
					$("#fecha-edit").val(data.fecha)
					$("#time-edit").val(data.time)
					$("#time-end-edit").val(data.time_end)
					$("#type-edit").val(data.type)
					$("#observaciones-edit").val(data.observaciones)
					$("#status-edit").val(data.status_valuations)

					$("#code-edit").text(data.code)

					$("#clinic_edit").val(data.id_clinic)
					var url_imagen = '/img/valuations/cotizaciones/'
					var url        = document.getElementById('ruta').value; 
					
					
					if((data.cotizacion != "" ) &&  (data.cotizacion != null)){
						var ext = data.cotizacion.split('.');
						if (ext[1] == "pdf") {
							img = '<embed class="kv-preview-data file-preview-pdf" src="'+url+url_imagen+data.cotizacion+'" type="application/pdf" style="width:213px;height:160px;" internalinstanceid="174">'
						}else{
							img = '<img src="'+url+url_imagen+data.cotizacion+'" class="file-preview-image kv-preview-data">'
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
							{caption: data.cotizacion , downloadUrl: url+url_imagen+data.cotizacion  ,url: url+"uploads/delete", key: data.cotizacion}
						],
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


					$.map(data.comments, function (item, key) {
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
					$("#comments_edit").html(html)
					

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

  

  

</body>

</html>
