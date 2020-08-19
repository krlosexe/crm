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
					<h1 class="h3 mb-2 text-gray-800">Procedimientos</h1>

					<div id="alertas"></div>
					<input type="hidden" class="id_user">
					<input type="hidden" class="token">

					<!-- DataTales Example -->
					<div class="card shadow mb-4" id="cuadro1">
					<div class="card-header py-3">
						<h6 class="m-0 font-weight-bold text-primary">Gestion de Procedimientos</h6>

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
								<th>Cirujano</th>
								<th>Clinica</th>
								<th>Seguidores</th>
								<th>Fecha de registro</th>
								<th>Registrado por</th>
							</tr>
							</thead>
							<tbody></tbody>
						</table>
						</div>
					</div>
					</div>


					@include('catalogos.clientes.surgeries.store')
					@include('catalogos.clientes.surgeries.view')
					@include('catalogos.clientes.surgeries.edit')


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
				$("#nav_surgeries, #modulo_Citas").addClass("active");

				verifyPersmisos(id_user, tokens, "citys");

				GetUsersTasksclient2(".getUsers")


			});


			function GetUsersTasksclient2(select, select_default){

				var url=document.getElementById('ruta').value;
				$.ajax({
					url:''+url+'/api/user',
					type:'GET',
					data: {
						"id_user": id_user,
						"token"  : tokens,
						},
					dataType:'JSON',
					async: false,
					beforeSend: function(){
						$('#page-loader').css("display", "block");
					},
					error: function (data) {
						$('#page-loader').css("display", "none");
					},
					success: function(data){
						$('#page-loader').css("display", "none");
						$(select+" option").remove();
						$(select).append($('<option>',
						{
						value: "",
						text : "Seleccione"
						}));
						$.each(data, function(i, item){
							if (item.status == 1 && item.id != id_user) {
								$(select).append($('<option>',
								{
								value: item.id,
								text : item.nombres+" "+item.apellido_p+" "+item.apellido_m,
								selected : select_default == item.id ? true : false
								}));
							}
						});

						$(select).select2({
							width: '100%'
						});




					}
				});
			}
			
			function GetUsersTasksclient2(select, select_default){

				var url=document.getElementById('ruta').value;
				$.ajax({
					url:''+url+'/api/user',
					type:'GET',
					data: {
						"id_user": id_user,
						"token"  : tokens,
						},
					dataType:'JSON',
					async: false,
					beforeSend: function(){
						$('#page-loader').css("display", "block");
					},
					error: function (data) {
						$('#page-loader').css("display", "none");
					},
					success: function(data){
						$('#page-loader').css("display", "none");
						$(select+" option").remove();
						$(select).append($('<option>',
						{
						value: "",
						text : "Seleccione"
						}));
						$.each(data, function(i, item){
							if (item.status == 1 && item.id != id_user) {
								$(select).append($('<option>',
								{
								value: item.id,
								text : item.nombres+" "+item.apellido_p+" "+item.apellido_m,
								selected : select_default == item.id ? true : false
								}));
							}
						});

						$(select).select2({
							width: '100%'
						});




					}
				});
			}

			function update(){
				enviarFormularioPut("#form-update", 'api/surgeries', '#cuadro4', false, "#avatar-edit");
			}

			function store(){
				enviarFormulario("#store", 'api/surgeries', '#cuadro2');
			}

			var  option = {{$option}};


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
						 "url":''+url+'/api/surgeries/client/'+{{$id_client}},
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
						{"data":"nombres", 
							render : function(data, type, row) {
								return data+" "+row.apellidos;
							}
						},
						{"data": "fecha"},
						{"data": "surgeon"},
						{"data": "name_clinic"},

						{"data": null,
							render : function(data, type, row) {
								
								var html = ""
								$.each(row.followers, function (key, item) { 
									html += "<img class='rounded' src='"+url+"/img/usuarios/profile/"+item.img_profile+"' style='height: 2rem;width: 2rem; margin: 1%; border-radius: 50%!important;' title='"+item.name_user+" "+item.name_user+"'>"
								});
								
								return html
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

				GetClinic("#clinic-store")

				SelectClinic("#paciente-store", "#clinic-store")
				$('#summernote').summernote("reset");
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

					GetClinic("#clinic-view")
					$("#paciente-view").val(data.id_cliente).attr("disabled", "disabled")
					$("#fecha-view").val(data.fecha).attr("disabled", "disabled")
					$("#time-view").val(data.time).attr("disabled", "disabled")
					$("#time-end-view").val(data.time_end).attr("disabled", "disabled")
					$("#surgeon-view").val(data.surgeon).attr("disabled", "disabled")
					$("#operating_room-view").val(data.operating_room).attr("disabled", "disabled")
					$("#clinic-view").val(data.id_clinic).attr("disabled", "disabled")
					$("#observaciones-view").val(data.observaciones).attr("disabled", "disabled")
					$("#status-view").val(data.status_surgeries).attr("disabled", "disabled")
					$("#type-view").val(data.type).attr("disabled", "disabled")
					$("#amount-view").val(data.amount).trigger("change").attr("disabled", "disabled")


					$("#attempt-view").prop("checked", data.attempt ? true : false)


					ShowPayments("#tableView",data.payments, "view")


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

					GetClinic("#clinic-edit")
					SelectClinic("#paciente-edit", "#clinic-edit")
					$("#paciente-edit").val(data.id_cliente)
					$("#fecha-edit").val(data.fecha)
					$("#time-edit").val(data.time)
					$("#time-end-edit").val(data.time_end)
					$("#surgeon-edit").val(data.surgeon)
					$("#operating_room-edit").val(data.operating_room)
					$("#clinic-edit").val(data.id_clinic)
					$("#observaciones-edit").val(data.observaciones)
					$("#status-edit").val(data.status_surgeries)
					$("#type-edit").val(data.type)
					$("#amount-edit").val(data.amount).trigger("change")
					$("#attempt-edit").prop("checked", data.attempt ? true : false)

					ShowPayments("#tableRegistrar",data.payments, "edit")


					GetComments("#comments_edit", data.id_surgeries, data.observaciones)

					$('#summernote_edit').summernote("reset");

					SubmitComment(data.id_surgeries, "api/comments/surgerie", "#comments_edit", "#add-comments", "#summernote_edit")



					var followers = []
					$.each(data.followers, function (key, item) { 
						followers.push(item.id_user)
					});

			
					$("#followers-edit").val(followers)
					$("#followers-edit").trigger("change");



					cuadros('#cuadro1', '#cuadro4');
					$("#id_edit").val(data.id_surgeries)
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
							html += '<div class="col-md-10" style="background: #eee;padding: 2%;border-radius: 17px;overflow: scroll">'
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


			function GetComments(comment_content, id, observaciones){
				$(comment_content).html("Cargando...")
				var url=document.getElementById('ruta').value;	
				$.ajax({
					url:''+url+'/api/comments/surgerie/'+id,
					type:'GET',
					dataType:'JSON',
					
					beforeSend: function(){

					},
					error: function (data) {
					},
					success: function(result){
						
						var url=document.getElementById('ruta').value; 
						var html = "";


						if(observaciones != null){
							html += '<div class="col-md-12" style="margin-bottom: 15px">'
								html += '<div class="row">'
									html += '<div class="col-md-2">'
										
									html += '</div>'
									html += '<div class="col-md-10" style="background: #eee;padding: 2%;border-radius: 17px;overflow: scroll">'
										html += '<div>'+observaciones+'</div>'
									html += '</div>'
								html += '</div>'
							html += '</div>'
						}
						$(comment_content).html(html)

						$.map(result, function (item, key) {
							html += '<div class="col-md-12" style="margin-bottom: 15px">'
								html += '<div class="row">'
									html += '<div class="col-md-2">'
										html += "<img class='rounded' src='"+url+"/img/usuarios/profile/"+item.img_profile+"' style='height: 4rem;width: 4rem; margin: 1%; border-radius: 50%!important;' title='"+item.name_follower+" "+item.last_name_follower+"'>"
										
									html += '</div>'
									html += '<div class="col-md-10" style="background: #eee;padding: 2%;border-radius: 17px;overflow: scroll">'
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

			function SelectClinic(select_pacient, select_clinic){
				$(select_pacient).change(function (e) { 

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
							$(select_clinic).val(data.clinic)
							$(select_clinic).select2({
								width: '100%'
							});
						}
					});					
				});
			}









			function addPayment(tabla, option){

				var fecha       = $("#date-pay-"+option).val()
				var way_to_pay  = $("#way-to-pay-"+option).val()
				var amount      = $("#amount-payment-"+option).val()


				var html = "";
				html += "<tr id='tr"+fecha+"'>"
					html += "<td>"+fecha+"<input type='hidden' name='dates[]' class='fecha' value='"+fecha+"'></td>"
					html += "<td>"+way_to_pay+"<input type='hidden' name='way_to_pays[]' class='time' value='"+way_to_pay+"'></td>"
					html += "<td>"+amount+"<input type='hidden' name='amounts[]' class='amount' value='"+amount+"'></td>"
					html += "<td><button type='button' class='btn btn-danger waves-effect' onclick='eliminarTr(\"" + "#tr" + fecha + "\")'>Eliminar</button></td></tr>";
				html += "</tr>"
				
				$(tabla+" tbody").append(html)
				
			}

			function ShowPayments(table, data, option){

				var html = "";
				$.each(data, function (key, item) { 

					html += "<tr id='tr"+item.date+"'>"
						html += "<td>"+item.date+"<input type='hidden' name='dates[]' class='fecha' value='"+item.date+"'></td>"
						html += "<td>"+item.way_to_pay+"<input type='hidden' name='way_to_pays[]' class='time' value='"+item.way_to_pay+"'></td>"
						html += "<td>"+number_format(item.amount, 2)+"<input type='hidden' name='amounts[]' class='amount' value='"+item.amount+"'></td>"
						if(option == "edit"){
							html += "<td><button type='button' class='btn btn-danger waves-effect' onclick='eliminarTr(\"" + "#tr" + item.date + "\")'>Eliminar</button></td>";
						}else{
							html += "<td></tr>";
						}
						
					html += "</tr>"

				});

				$(table+" tbody").html(html)
				
			}


			$("#additional").html("")
			$("#add-additional").click(function (e) { 
				
				var html = ""
				
				html += "<div class='col-md-6'><input type='text' class='form-control' name='aditional[]' placeholder='Descripcion del adicional'></div>"
				html += "<div class='col-md-6'><input type='text' class='form-control' name='price_aditional[]' placeholder='Precio del adicional'></div>"
				html += "<br><br>"
				

				$("#additional").append(html)
				
			});


					
		/* ------------------------------------------------------------------------------- */
			/*
				Funcion que capta y envia los datos a desactivar
			*/
			function desactivar(tbody, table){
				$(tbody).on("click", "span.desactivar", function(){
					var data=table.row($(this).parents("tr")).data();
					statusConfirmacion('api/surgeries/status/'+data.id_surgeries+"/"+2,"¿Esta seguro de desactivar el registro?", 'desactivar');
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
					statusConfirmacion('api/surgeries/status/'+data.id_surgeries+"/"+1,"¿Esta seguro de desactivar el registro?", 'activar');
				});
			}
		/* ------------------------------------------------------------------------------- */



			function eliminar(tbody, table){
				$(tbody).on("click", "span.eliminar", function(){
					var data=table.row($(this).parents("tr")).data();
					statusConfirmacion('api/surgeries/status/'+data.id_surgeries+"/"+0,"¿Esta seguro de eliminar el registro?", 'Eliminar');
				});
			}

		</script>
  

  

</body>

</html>
