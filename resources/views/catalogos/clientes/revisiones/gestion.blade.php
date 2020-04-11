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


					@include('catalogos.clientes.revisiones.store')
					@include('catalogos.clientes.revisiones.view')
					@include('catalogos.clientes.revisiones.edit')


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
				$("#nav_revision-appointment, #modulo_Citas").addClass("active");

				verifyPersmisos(id_user, tokens, "revision-appointment");
			});



			function store(){
				enviarFormulario("#store", 'api/revision/appointment', '#cuadro2');
			}


			function update(){
				enviarFormularioPut("#form-update", 'api/revision/appointment', '#cuadro4', false, "#avatar-edit");
			}

			var option = {{$option}}
			



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
						 "url":''+url+'/api/revision/appointment/client/'+{{$id_client}},
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
						{"data":"name_client", 
							render: function(data, type, row){
								return row.name_client+" "+row.last_name_client
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
				//getPacientes("#paciente-store")
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

					//getPacientes("#paciente-view")
					GetClinic("#clinica-view")
					GetAsesoras("#asesora-view")

					$("#asesora-view").val(data.id_user_asesora).attr("disabled", "disabled")
					$("#paciente-view").val(data.id_paciente).attr("disabled", "disabled")
					$("#paciente-view").trigger("change");
					$("#clinica-view").attr("disabled", "disabled")
					$("#clinica-view").val(data.clinica).attr("disabled", "disabled")
					$("#numero_contrato-view").val(data.numero_contrato).attr("disabled", "disabled")
					$("#cirugia-view").val(data.cirugia).attr("disabled", "disabled")
					

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

					//getPacientes("#paciente-edit")
					GetClinic("#clinica-edit")
					GetAsesoras("#asesora-edit")

					$("#asesora-view").val(data.id_user_asesora).attr("disabled", "disabled")

					$("#paciente-edit").val(data.id_paciente).attr("disabled", "disabled")
					$("#paciente-edit").trigger("change");
					$("#clinica-edit").attr("disabled", "disabled")

					$("#numero_contrato-edit").val(data.numero_contrato)
					$("#cirugia-edit").val(data.cirugia)
					
					$("#asesora-edit").val(data.id_user_asesora).attr("disabled", "disabled")
					$("#clinica-edit").val(data.clinica)

					showSchedule(data.agenda, "#tableEdit", "edit")


					$("#id_edit").val(data.id_revision)
					cuadros('#cuadro1', '#cuadro4');
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

  

  

</body>

</html>
