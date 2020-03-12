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
			          <h1 class="h3 mb-2 text-gray-800">Pacientes.</h1>

			          <div id="alertas"></div>
			          <input type="hidden" class="id_user">
			          <input type="hidden" class="token">

					  <div class="card shadow mb-4 hidden" id="cuadro1">
						<div class="card-header py-3">
							<h6 class="m-0 font-weight-bold text-primary">Importar Pacientes</h6>
						</div>
						<div class="card-body">
							<form class="user" autocomplete="off" method="post" id="store" enctype="multipart/form-data">
								@csrf
								<br><br>
								<div class="tab-content" id="myTabContent">

									<div class="tab-pane fade show active tab_content0-0" id="init" role="tabpanel" aria-labelledby="patient_record">

										<div class="row">

											<div class="col-md-12">

												<div class="row">
														
													<div class="col-md-4">
														<label for=""><b>Adjuntar Archivo (XML) *</b></label>
														<input type="file" name="file_import" id="file" class="form-control" required>
													</div>



													<div class="col-md-4">
														<label for=""><b>Linea de Negocio</b></label>
														<select name="id_line" id="linea-negocio" class="form-control select2 disabled" required>
															<option value="">Seleccione</option>
														</select>
													</div>

													<div class="col-md-4">
														<label for=""><b>Asesora Responsable</b></label>
														<select name="id_user_asesora" id="asesora" class="form-control select2 disabled" required>
															<option value="">Seleccione</option>
														</select>
													</div>
													
												</div>
											</div>

										</div>


								</div>

								

								<input type="hidden" name="id_user" class="id_user">
								<input type="hidden" name="token" class="token">

								<input type="hidden" name="id_modulo_vista_hidden" id="id_modulo_vista_hidden">
								<br>
								</div>
								<center>

									<button type="button"  class="btn btn-danger btn-user" onclick="prev('#cuadro2')">
										Cancelar
									</button>
									<button id="btn-store" class="btn btn-primary btn-user">
										Registrar
									</button>

								</center>
								<br>
								<br>
							</form>
							
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
				store();
				$("#collapse_Catálogos").addClass("show");
				$("#nav_client-import, #modulo_Catálogos").addClass("active");

				verifyPersmisos(id_user, tokens, "clients");


				GetAsesorasbyBusisnessLine2("#linea-negocio", "#asesora");
				GetBusinessLine("#linea-negocio");

				cuadros("", "#cuadro1");

			});





			function GetAsesorasbyBusisnessLine2(line_business, asesoras){

				$(line_business).change(function (e) { 
				
					var id_line_business = $(this).val()
					var url=document.getElementById('ruta').value;
					$.ajax({
						url:''+url+'/api/get-asesoras-business-line/'+id_line_business,
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
						$(asesoras+" option").remove();
						$(asesoras).append($('<option>',
						{
							value: "",
							text : "Seleccione"
						}));
					
						$.each(data, function(i, item){
							if (item.status == 1) {
								$(asesoras).append($('<option>',
								{
									value: item.id,
									text : item.nombres+" "+item.apellido_p+" "+item.apellido_m,
									selected: item.id == id_user ? true : false
								}));
							}
						});

						}
					});
				});

			}





			function store(){
				enviarFormulario("#store", 'api/clients/import', '#cuadro2');
			}


		</script>
		



	@endsection


