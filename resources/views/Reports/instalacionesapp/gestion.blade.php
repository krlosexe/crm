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
			          <h1 class="h3 mb-2 text-gray-800">Inatalaciones APPSS</h1>

			          <div id="alertas"></div>
			          <input type="hidden" class="id_user">
			          <input type="hidden" class="token">

			          <!-- DataTales Example -->
			          <div class="card shadow mb-4" id="cuadro1">
			            <div class="card-header py-3">
			              <h6 class="m-0 font-weight-bold text-primary">Gestion de inatalacion APP</h6>

<!--			              <button onclick="nuevo()" class="btn btn-primary btn-icon-split" style="float: right;">
		                    <span class="icon text-white-50">
		                      <i class="fas fa-plus"></i>
		                    </span>
		                    <span class="text">Nuevo registro</span>
		                  </button>-->
			            </div>
			            <div class="card-body">

							<div class="row">
								<div class="col-md-3">
									<div class="form-group">
										<label for=""><b>Filtrar por : Asesoror</b></label>
										<select name="adviser" id="id_asesora_valoracion-filter"  class="form-control select2 disabled">
											<option value="0">Seleccione</option>
										</select>
									</div>
								</div>
						

							
							<div class="col-md-3">
								<div class="form-group">
									<label for=""><b>Filtrar por : Mes</b></label>
									<select name="adviser" id="month-filter"  class="form-control select2 disabled">
									
											<option value="0">Seleccione</option>
											<option value="1">Enero</option>
											<option value="2">Febrero</option>
											<option value="3">Marzo</option>
											<option value="4">Abril</option>
											<option value="5">Mayo</option>
											<option value="6">Junio</option>
											<option value="7">Julio</option>
											<option value="8">Agosto</option>
											<option value="9">Septiembre</option>
											<option value="10">Octubre</option>
											<option value="11">Noviembre</option>
											<option value="12">Diciembre</option>
										
									</select>
								</div>
							</div>
						</div>
						


			              <div class="table-responsive">
			                <table class="table table-bordered" id="table" width="100%" cellspacing="0">
			                  <thead>
			                    <tr>
								 <!-- <th>Evento</th>-->
								  <th>Asesora</th>
								  <th>Paciente</th>
								  <th>Fecha y Hora</th>
								 <!-- <th>Estatus</th>
								  <th>Fecha de Registro</th>-->
			                    </tr>
			                  </thead>
			                  <tbody></tbody>
			                </table>
			              </div>
			            </div>
			          </div>
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
				list();

				$("#collapse_Reportes").addClass("show");
				$("#nav_ReportEventAsesora, #modulo_Reportes").addClass("active");

				verifyPersmisos(id_user, tokens, "citys");

				GetUsers("#id_asesora_valoracion-filter")

			});


			$("#id_asesora_valoracion-filter").change(function (e) { 
				list()
			});


			$("#month-filter").change(function (e) {
				list()
			});


			function list(cuadro, adviser) {
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
						 "url":''+url+'/api/instalacionesapp',
						 "data": {
							"adviser"       : $("#id_asesora_valoracion-filter").val(),
							"mes"       : $("#month-filter").val()
						},

						"dataSrc":""
					},
					"columns":[
					//	{"data": "event"},

						{"data": "name_asesora",
							render : function(data, type, row){
								return row.name_asesora	+" "+row.apellido_asesora
							}
						},

						{"data": "nombres"},

						{"data": "date_auth"},



					],
					"language": idioma_espanol,
					"dom": 'Bfrtip',
					"bSort" : false,
					"responsive": true,
					"buttons":[
						'copy', 'csv', 'excel', 'pdf', 'print'
					]
				});


			}

		</script>
		



	@endsection


