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
			          <h1 class="h3 mb-2 text-gray-800">Pre Anestesias</h1>

			          <div id="alertas"></div>
			          <input type="hidden" class="id_user">
			          <input type="hidden" class="token">

			          <!-- DataTales Example -->
			          <div class="card shadow mb-4" id="cuadro1">
			            <div class="card-header py-3">
			              <h6 class="m-0 font-weight-bold text-primary">Gestion de Citas de Pre Anestesias</h6>

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
								  <th>Hora desde</th>
								  <th>Hora hasta</th>
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


			          @include('catalogos.clientes.preanesthesia.store')
					  @include('catalogos.clientes.preanesthesia.view')
					  @include('catalogos.clientes.preanesthesia.edit')


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
				$("#nav_preanesthesia, #modulo_Citas").addClass("active");

				verifyPersmisos(id_user, tokens, "citys");
			});

			var  option = {{$option}};

			function update(){
				enviarFormularioPut("#form-update", 'api/preanesthesia', '#cuadro4', false, "#avatar-edit");
			}

			function store(){
				enviarFormulario("#store", 'api/preanesthesia', '#cuadro2');
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
						 "url":''+url+'/api/preanesthesia/client/'+{{ $id_client }},
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
								if(data.status == 1 && actualizar == 1  && option == 1)
									botones += "<span class='desactivar btn btn-sm btn-warning waves-effect' data-toggle='tooltip' title='Desactivar'><i class='fa fa-unlock' style='margin-bottom:5px'></i></span> ";
								else if(data.status == 2 && actualizar == 1  && option == 1)
									botones += "<span class='activar btn btn-sm btn-warning waves-effect' data-toggle='tooltip' title='Activar'><i class='fa fa-lock' style='margin-bottom:5px'></i></span> ";
								if(borrar == 1  && option == 1)
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
						{"data": "time"},
						{"data": "time_end"},
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


					$("#attempt-view").prop("checked", data.attempt ? true : false)


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


					$("#attempt-edit").prop("checked", data.attempt ? true : false)
              
              
					console.log(data.clinic)

					cuadros('#cuadro1', '#cuadro4');
					$("#id_edit").val(data.id_preanesthesias)
					cuadros('#cuadro1', '#cuadro4');
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

					
		/* ------------------------------------------------------------------------------- */
			/*
				Funcion que capta y envia los datos a desactivar
			*/
			function desactivar(tbody, table){
				$(tbody).on("click", "span.desactivar", function(){
					var data=table.row($(this).parents("tr")).data();
					statusConfirmacion('api/preanesthesia/status/'+data.id_preanesthesias+"/"+2,"¿Esta seguro de desactivar el registro?", 'desactivar');
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
					statusConfirmacion('api/preanesthesia/status/'+data.id_preanesthesias+"/"+1,"¿Esta seguro de desactivar el registro?", 'activar');
				});
			}
		/* ------------------------------------------------------------------------------- */



			function eliminar(tbody, table){
				$(tbody).on("click", "span.eliminar", function(){
					var data=table.row($(this).parents("tr")).data();
					statusConfirmacion('api/preanesthesia/status/'+data.id_preanesthesias+"/"+0,"¿Esta seguro de eliminar el registro?", 'Eliminar');
				});
			}

		</script>
  

  

</body>

</html>
