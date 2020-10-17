<!-- @extends('layouts.app')

	@section('content')
	     <!-- Page Wrapper -->
<div id="wrapper">

	@include('layouts.sidebar'):

	<!-- Content Wrapper -->
	<div id="content-wrapper" class="d-flex flex-column">

		<!-- Main Content -->
		<div id="content">

			@include('layouts.topBar')


			<!-- Begin Page Content -->
			<div class="container-fluid">

				<!-- Page Heading -->
				<div class="d-sm-flex align-items-center justify-content-between mb-4">
					<h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
					<a href="<?= url('/') ?>/api/report/general" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Reporte General</a>
				</div>

				<!-- Content Row -->
				<div class="row">

					<!-- Earnings (Monthly) Card Example -->
					<div class="col-xl-3 col-md-6 mb-4">
						<div class="card border-left-primary shadow h-100 py-2">
							<div class="card-body">
								<div class="row no-gutters align-items-center">
									<div class="col mr-2">
										<div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Mis PRP (Del Mes)</div>
										<div class="h5 mb-0 font-weight-bold text-gray-800" id="prp_qty">0</div>
									</div>
									<div class="col-auto">
										<i class="fas fa-users fa-2x text-gray-300"></i>
									</div>
								</div>
							</div>
						</div>
					</div>

					<!-- Earnings (Monthly) Card Example -->
					<div class="col-xl-3 col-md-6 mb-4">
						<div class="card border-left-success shadow h-100 py-2">
							<div class="card-body">
								<div class="row no-gutters align-items-center">
									<div class="col mr-2">
										<div class="text-xs font-weight-bold text-success text-uppercase mb-1">Calificaciones Google (Del Mes)</div>
										<div class="h5 mb-0 font-weight-bold text-gray-800" id="google_qty">0</div>
									</div>
									<div class="col-auto">
										<i class="fab fa-google fa-2x text-gray-300"></i>
									</div>
								</div>
							</div>
						</div>
					</div>

					<!-- Earnings (Monthly) Card Example -->
					<div class="col-xl-3 col-md-6 mb-4">
						<div class="card border-left-info shadow h-100 py-2">
							<div class="card-body">
								<div class="row no-gutters align-items-center">
									<div class="col mr-2">
										<div class="text-xs font-weight-bold text-info text-uppercase mb-1">Valoradas del Mes</div>
										<div class="row no-gutters align-items-center">
											<div class="col-auto">
												<div class="h5 mb-0 mr-3 font-weight-bold text-gray-800" id="valoration_qty">0</div>
											</div>
											<div class="col">
												<div class="progress progress-sm mr-2">
													<div class="progress-bar bg-info" role="progressbar" style="width: 0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
												</div>
											</div>
										</div>
									</div>
									<div class="col-auto">
										<i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
									</div>
								</div>
							</div>
						</div>
					</div>

					<!-- Pending Requests Card Example -->
					<div class="col-xl-3 col-md-6 mb-4">
						<div class="card border-left-warning shadow h-100 py-2">
							<div class="card-body">
								<div class="row no-gutters align-items-center">
									<div class="col mr-2">
										<div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Operadas del Mes</div>
										<div class="h5 mb-0 font-weight-bold text-gray-800" id="cx_qty">0</div>
									</div>
									<div class="col-auto">
										<i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

				<!-- Content Row -->

				<div class="row">
					<!-- prueba-->
					<div class="col-xl-8 col-lg-7">
						<div class="card shadow mb-4">
							<!-- Card Header - Dropdown -->
							<div class="col-auto">
								<h6 class="m-0 py-3 ml-2 font-weight-bold text-primary">Programadas</h6>
								<div>
									<div class="card-header py-6 flex-row align-items-center justify-content-between">
										<h6 class="m-0 font-weight-bold mx-1 text-primary">Mes</h6>
										<select id="id_date_filter" class="form-control disabled">
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

										<h6 class="m-0 font-weight-bold mx-2 text-primary">Asesor</h6>

										<select name="adviser[]" id="id_asesor_filter" class="form-control select2 disabled">
											<option value="">Filtrar por Asesor:</option>
										</select>

									</div>
									<!-- Card Body -->
									<div class="card-body">
										<div id="survey">
											<div class="row">
												<div class="col-md-12">
													<!-- <ul style="height: 209px;overflow: scroll;" class="list-group" id="list_filter"></ul> -->
													<table class="table table-bordered " id="list_filter" width="100%" cellspacing="0">
														<thead>
															<tr>

																<th>Estado</th>
																<th>Fecha de Cirugia</th>
																<th style="width: 150px;">Cliente</th>
															</tr>
														</thead>
														<tbody>

														</tbody>
													</table>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!--fin prueba -->
					<div class="col-xl-4 col-lg-5">
						<div class="card shadow mb-4">
							<!-- Card Header - Dropdown -->
							<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
								<h6 class="m-0 font-weight-bold text-primary">Encuestas</h6>

								&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;


								<select name="adviser[]" id="id_asesora_filter" class="form-control select2 disabled">
									<option value="">Filtrar por Asesora:</option>
								</select>



							</div>
							<!-- Card Body -->
							<div class="card-body">
								<div id="survey">
									<div class="row">
										<div class="col-md-12">
											<ul style="height: 209px;overflow: scroll;" class="list-group" id="list_followers"></ul>
										</div>
									</div>

									<div id="average_general" style="text-align: center;padding: 8%;font-size: 35px;">
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

				<!-- Area Chart -->
				<div class="col-auto">
					<!-- <div class="col-xl-8 col-lg-7"> -->
					<div class="card shadow mb-4">
						<!-- Card Header - Dropdown -->
						<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
							<h6 class="m-0 font-weight-bold text-primary">Ingreso Mensuales</h6>

							<h6 class="m-0 ml-auto mx-3 font-weight-bold text-primary">Asesor</h6>
							<div class="dropdown no-arrow">
								&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;

								<select name="adviser[]" id="id_asesor_filter_dashboard" class="form-control select2 disabled">
									<option value="">Filtrar por Asesora:</option>
								</select>
							</div>
						</div>
						<!-- <div class="dropdown no-arrow">
		                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		                      <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
		                    </a>
							<div class="card-header py-3 d-flex flex-row align-items-center justify-content-between"> -->
						<!-- <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
		                      <div class="dropdown-header">Dropdown Header:</div>
		                      <a class="dropdown-item" href="#">Action</a>
		                      <a class="dropdown-item" href="#">Another action</a>
		                      <div class="dropdown-divider"></div>
		                      <a class="dropdown-item" href="#">Something else here</a>
		                    </div> -->
					</div>
				</div>
				<!-- Card Body -->
				<div class="card-body">
					<div class="chart-area">
						<canvas id="mychart"></canvas>
						<div id="mensaje">

						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- Pie Chart -->

		<!-- Content Row -->
		<div class="row">

			<!-- Content Column -->
			<div class="col-lg-6 mb-4">

				<!-- Project Card Example -->
				<div class="card shadow mb-4">
					<div class="card-header py-3">
						<h6 class="m-0 font-weight-bold text-primary">Projects</h6>
					</div>
					<div class="card-body">
						<h4 class="small font-weight-bold">Server Migration <span class="float-right">20%</span></h4>
						<div class="progress mb-4">
							<div class="progress-bar bg-danger" role="progressbar" style="width: 20%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
						</div>
						<h4 class="small font-weight-bold">Sales Tracking <span class="float-right">40%</span></h4>
						<div class="progress mb-4">
							<div class="progress-bar bg-warning" role="progressbar" style="width: 40%" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
						</div>
						<h4 class="small font-weight-bold">Customer Database <span class="float-right">60%</span></h4>
						<div class="progress mb-4">
							<div class="progress-bar" role="progressbar" style="width: 60%" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
						</div>
						<h4 class="small font-weight-bold">Payout Details <span class="float-right">80%</span></h4>
						<div class="progress mb-4">
							<div class="progress-bar bg-info" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
						</div>
						<h4 class="small font-weight-bold">Account Setup <span class="float-right">Complete!</span></h4>
						<div class="progress">
							<div class="progress-bar bg-success" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
						</div>
					</div>
				</div>

				<!-- Color System -->
				<div class="row">
					<div class="col-lg-6 mb-4">
						<div class="card bg-primary text-white shadow">
							<div class="card-body">
								Primary
								<div class="text-white-50 small">#4e73df</div>
							</div>
						</div>
					</div>
					<div class="col-lg-6 mb-4">
						<div class="card bg-success text-white shadow">
							<div class="card-body">
								Success
								<div class="text-white-50 small">#1cc88a</div>
							</div>
						</div>
					</div>
					<div class="col-lg-6 mb-4">
						<div class="card bg-info text-white shadow">
							<div class="card-body">
								Info
								<div class="text-white-50 small">#36b9cc</div>
							</div>
						</div>
					</div>
					<div class="col-lg-6 mb-4">
						<div class="card bg-warning text-white shadow">
							<div class="card-body">
								Warning
								<div class="text-white-50 small">#f6c23e</div>
							</div>
						</div>
					</div>
					<div class="col-lg-6 mb-4">
						<div class="card bg-danger text-white shadow">
							<div class="card-body">
								Danger
								<div class="text-white-50 small">#e74a3b</div>
							</div>
						</div>
					</div>
					<div class="col-lg-6 mb-4">
						<div class="card bg-secondary text-white shadow">
							<div class="card-body">
								Secondary
								<div class="text-white-50 small">#858796</div>
							</div>
						</div>
					</div>
				</div>

			</div>

			<div class="col-lg-6 mb-4">

				<!-- Illustrations -->
				<div class="card shadow mb-4">
					<div class="card-header py-3">
						<h6 class="m-0 font-weight-bold text-primary">Illustrations</h6>
					</div>
					<div class="card-body">
						<div class="text-center">
							<img class="img-fluid px-3 px-sm-4 mt-3 mb-4" style="width: 25rem;" src="img/undraw_posting_photo.svg" alt="">
						</div>
						<p>Add some quality, svg illustrations to your project courtesy of <a target="_blank" rel="nofollow" href="https://undraw.co/">unDraw</a>, a constantly updated collection of beautiful svg images that you can use completely free and without attribution!</p>
						<a target="_blank" rel="nofollow" href="https://undraw.co/">Browse Illustrations on unDraw &rarr;</a>
					</div>
				</div>

				<!-- Approach -->
				<div class="card shadow mb-4">
					<div class="card-header py-3">
						<h6 class="m-0 font-weight-bold text-primary">Development Approach</h6>
					</div>
					<div class="card-body">
						<p>SB Admin 2 makes extensive use of Bootstrap 4 utility classes in order to reduce CSS bloat and poor page performance. Custom CSS classes are used to create custom components and custom utility classes.</p>
						<p class="mb-0">Before working with this theme, you should become familiar with the Bootstrap framework, especially the utility classes.</p>
					</div>
				</div>

			</div>
		</div>

	</div>
	<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->




<div class="modal fade bd-example-modal-lg" id="modal_survey" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">

			<div class="modal-body">
				<div class="row">
					<div class="col-md-12" style="padding: 4%;">
						modal <div id="question1"></div>
					</div>
				</div>


				<div class="row">
					<div class="col-md-12" style="padding: 4%;">
						<h6>2 - Asesoría personalizada</h6>
						<div id="question2"></div>
					</div>
				</div>


				<div class="row">
					<div class="col-md-12" style="padding: 4%;">
						<h6>3 - La confianza (seguridad) que el personal transmite a los pacientes</h6>
						<div id="question3"></div>
					</div>
				</div>


				<div class="row">
					<div class="col-md-12" style="padding: 4%;">
						<h6>4 - Tiempo para organizar el proceso quirúrgico</h6>
						<div id="question4"></div>
					</div>
				</div>


				<div class="row">
					<div class="col-md-12" style="padding: 4%;">
						<h6>5 - Cómo fue la atención que recibió por parte de la asesora antes, durante y después de la intervención</h6>
						<div id="question5"></div>
					</div>
				</div>


				<div class="row">
					<div class="col-md-12" style="padding: 4%;">
						<h6>6 - Amabilidad (cortesía) del personal en el trato con los pacientes</h6>
						<div id="question6"></div>
					</div>
				</div>



				<div class="row">
					<div class="col-md-12" style="padding: 4%;">
						<h6>7 - Interés del personal para organizar las citas de revisión</h6>
						<div id="question7"></div>
					</div>
				</div>



				<div class="row">
					<div class="col-md-12" style="padding: 4%;">
						<h6>8 - Tiempo en responder mensajes, llamadas</h6>
						<div id="question8"></div>
					</div>
				</div>



				<div class="row">
					<div class="col-md-12" style="padding: 4%;">
						<h6>9 - El trato personalizado que tiene con los pacientes</h6>
						<div id="question9"></div>
					</div>
				</div>



				<div class="row">
					<div class="col-md-12" style="padding: 4%;">
						<h6>10 - Atención y seguridad que brinda todo el personal de la clínica</h6>
						<div id="question10"></div>
					</div>
				</div>

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
@endsection


@section('CustomJs')

<script>
	$(document).ready(function() {
		$.fn.dataTable.ext.errMode = 'none';
		login()
		prps()
		valorations()
		surgeries()
		calificationsGoogle()
		survey(id_user)
		GetAsesorasValoracion("#id_asesora_filter")
		GetAsesorasValoracion("#id_asesor_filter")
		GetAsesorasValoracion("#id_asesor_filter_dashboard")
		$("#id_date_filter").val(<?= date("m") ?>)
		GetSurgeriedate()
		GetSurgerieDasboard()
		GetDashboard(month = null, amount_month = null)
	});

	function login() {
		enviarFormulario("#login", 'auth', '#cuadro2', true);
	}

	$("#id_asesora_filter").change(function(e) {

		survey($(this).val())

	});

	$("#id_asesor_filter").change(function(e) {
		GetSurgeriedate()
	});

	$("#id_asesor_filter_dashboard").change(function(e) {
		GetSurgerieDasboard()
	});

	$("#id_date_filter").change(function(e) {
		GetSurgeriedate()
	})

	function prps() {

		var url = document.getElementById('ruta').value;
		$.ajax({
			url: '' + url + '/api/prp/qty/month/' + id_user,
			type: 'GET',
			dataType: 'JSON',

			success: function(response) {
				$("#prp_qty").text(response.qty)
			}
		});
	}







	function calificationsGoogle() {

		var url = document.getElementById('ruta').value;
		$.ajax({
			url: '' + url + '/api/qty/califications/google/' + id_user,
			type: 'GET',
			dataType: 'JSON',
			success: function(response) {

				$("#google_qty").text(response.qty)

			}
		});
	}





	function valorations() {

		var url = document.getElementById('ruta').value;
		$.ajax({
			url: '' + url + '/api/valorations/qty/month/' + id_user,
			type: 'GET',
			dataType: 'JSON',
			success: function(response) {

				$("#valoration_qty").text(response.qty)

			}
		});
	}



	function surgeries() {

		var url = document.getElementById('ruta').value;
		$.ajax({
			url: '' + url + '/api/surgeries/qty/month/' + id_user,
			type: 'GET',
			dataType: 'JSON',
			success: function(response) {

				$("#cx_qty").text(response.qty)

			}
		});
	}




	function survey(adviser) {

		var url = document.getElementById('ruta').value;
		$.ajax({
			url: '' + url + '/api/survey/adviser/' + adviser,
			type: 'GET',
			dataType: 'JSON',
			success: function(response) {

				var html = ""
				$.map(response.data, function(item, key) {

					html += "<li class='list-group-item' style='cursor: pointer' onclick='showSurvery(" + JSON.stringify(item) + ")'>"
					html += '<img class="rounded" src="http://pdtclientsolutions.com/crm-public.dev/img/default-user.png" style="height: 2rem;width: 2rem; margin: 1%; border-radius: 50%!important;" title="Johana Andrea Londoño">'
					html += '<b>' + item.nombres + '</b><br> ' + item.created_prp + '<br>'

					for (var i = 0; i < item.average; i++) {
						html += "<i class='fa fa-star' style='color: #feba03'></i>";
					}

					const difference = 5 - item.average

					for (var i = 0; i < difference; i++) {
						html += "<i class='fa fa-star'></i>";
					}

					html += '</li>'
				});



				$("#list_followers").html(html)


				var html2 = ""
				for (var i = 0; i < response.total_average; i++) {
					html2 += "<i class='fa fa-star' style='color: #feba03'></i>";
				}

				const difference_total = 5 - response.total_average

				for (var i = 0; i < difference_total; i++) {
					html2 += "<i class='fa fa-star'></i>";
				}


				$("#average_general").html(html2)

			}
		});
	}


	function showSurvery(data) {

		$("#modal_survey").modal("show")

		var html = ""
		for (var i = 0; i < data.question1; i++) {
			html += "<i class='fa fa-star' style='color: #feba03'></i>";
		}

		var difference = 5 - data.question1

		for (var i = 0; i < difference; i++) {
			html += "<i class='fa fa-star'></i>";
		}

		$("#question1").html(html)






		var html = ""
		for (var i = 0; i < data.question2; i++) {
			html += "<i class='fa fa-star' style='color: #feba03'></i>";
		}

		var difference = 5 - data.question2

		for (var i = 0; i < difference; i++) {
			html += "<i class='fa fa-star'></i>";
		}

		$("#question2").html(html)





		var html = ""
		for (var i = 0; i < data.question3; i++) {
			html += "<i class='fa fa-star' style='color: #feba03'></i>";
		}

		var difference = 5 - data.question3

		for (var i = 0; i < difference; i++) {
			html += "<i class='fa fa-star'></i>";
		}

		$("#question3").html(html)





		var html = ""
		for (var i = 0; i < data.question4; i++) {
			html += "<i class='fa fa-star' style='color: #feba03'></i>";
		}

		var difference = 5 - data.question4

		for (var i = 0; i < difference; i++) {
			html += "<i class='fa fa-star'></i>";
		}

		$("#question4").html(html)






		var html = ""
		for (var i = 0; i < data.question5; i++) {
			html += "<i class='fa fa-star' style='color: #feba03'></i>";
		}

		var difference = 5 - data.question5

		for (var i = 0; i < difference; i++) {
			html += "<i class='fa fa-star'></i>";
		}

		$("#question5").html(html)

		var html = ""
		for (var i = 0; i < data.question6; i++) {
			html += "<i class='fa fa-star' style='color: #feba03'></i>";
		}

		var difference = 5 - data.question6

		for (var i = 0; i < difference; i++) {
			html += "<i class='fa fa-star'></i>";
		}

		$("#question6").html(html)





		var html = ""
		for (var i = 0; i < data.question7; i++) {
			html += "<i class='fa fa-star' style='color: #feba03'></i>";
		}

		var difference = 5 - data.question7

		for (var i = 0; i < difference; i++) {
			html += "<i class='fa fa-star'></i>";
		}

		$("#question7").html(html)








		var html = ""
		for (var i = 0; i < data.question8; i++) {
			html += "<i class='fa fa-star' style='color: #feba03'></i>";
		}

		var difference = 5 - data.question8

		for (var i = 0; i < difference; i++) {
			html += "<i class='fa fa-star'></i>";
		}

		$("#question8").html(html)









		var html = ""
		for (var i = 0; i < data.question9; i++) {
			html += "<i class='fa fa-star' style='color: #feba03'></i>";
		}

		var difference = 5 - data.question9

		for (var i = 0; i < difference; i++) {
			html += "<i class='fa fa-star'></i>";
		}

		$("#question9").html(html)










		var html = ""
		for (var i = 0; i < data.question10; i++) {
			html += "<i class='fa fa-star' style='color: #feba03'></i>";
		}

		var difference = 5 - data.question10

		for (var i = 0; i < difference; i++) {
			html += "<i class='fa fa-star'></i>";
		}

		$("#question10").html(html)



	}

	function GetSurgeriedate() {
		var url = document.getElementById('ruta').value;

		let params = {
			id_user: $('#id_asesor_filter').val(),
			month: $('#id_date_filter').val(),
		}






		var table = $("#list_filter").DataTable({
			"destroy": true,
			"stateSave": true,
			"serverSide": false,
			"ajax": {
				"method": "POST",
				"url": `${url}/api/surgeries/date/month`,
				"data": params,
				"dataSrc": ""
			},
			"columns": [{
					"data": "status_surgeries",
					render: function(data, type, row) {
						return row.status_surgeries_name = row.status_surgeries == 0 ? row.status_surgeries_name = 'Pendiente' : '';
					}
				},
				{
					"data": "fecha",
					render: function(data, type, row) {
						return row.fecha;
					}
				},
				{
					"data": "nombres",
					render: function(data, type, row) {
						return row.nombres_cliente = row.nombres ? row.nombres : 'Sin nombre';
					}
				}

			],
			"language": idioma_espanol,
			"dom": 'Bfrtip',
			"responsive": true,
			"buttons": [
				'copy', 'csv', 'excel', 'pdf', 'print'
			]
		});

		// return false

	}

	function GetSurgerieDasboard() {

		var url = document.getElementById('ruta').value;

		let params = {
			id_user: $('#id_asesor_filter_dashboard').val(),
		}
		$.ajax({
			url: '' + url + '/api/surgeries/dashboard/amount/month',
			type: 'POST',
			data: params,
			success: function(response) {
				let = month = [];
				let = amount_month = [];
				response.forEach(element => {
					switch (element.month) {
						case 1:
							element.month_name = 'Enero';
							break;

						case 2:
							element.month_name = 'Febrero';
							break;

						case 3:
							element.month_name = 'Marzo';
							break;

						case 4:
							element.month_name = 'Abril';
							break;

						case 5:
							element.month_name = 'Mayo';
							break;

						case 6:
							element.month_name = 'Junio';
							break;

						case 7:
							element.month_name = 'Julio';
							break;

						case 8:
							element.month_name = 'Agosto';
							break;

						case 9:
							element.month_name = 'Septiembre';
							break;

						case 10:
							element.month_name = 'Octubre';
							break;

						case 11:
							element.month_name = 'Noviembre';
							break;

						case 12:
							element.month_name = 'Diciembre';
							break;

						default:
							break;
					}

					month.push(element.month_name);
					amount_month.push(element.amount_month ? element.amount_month : element.amount);

				});

				GetDashboard(month, amount_month)

			}
		});
	}

	function GetDashboard(label, month) {
		try {
			let ctx = document.getElementById("mychart");

			let myLineChart = new Chart(ctx, {
				type: 'line',
				data: {
					labels: label,
					datasets: [{
						label: "Monto",
						// lineTension: 0.3,
						backgroundColor: "rgba(78, 115, 223, 0.05)",
						borderColor: "rgba(78, 115, 223, 1)",
						pointRadius: 3,
						pointBackgroundColor: "rgba(78, 115, 223, 1)",
						pointBorderColor: "rgba(78, 115, 223, 1)",
						// pointHoverRadius: 3,
						pointHoverBackgroundColor: "rgba(78, 115, 223, 1)",
						pointHoverBorderColor: "rgba(78, 115, 223, 1)",
						// pointHitRadius: 10,
						pointBorderWidth: 2,
						data: month,
					}],
				},
				options: {
					maintainAspectRatio: false,
					layout: {
						padding: {
							left: 10,
							right: 25,
							top: 25,
							bottom: 0
						}
					},
					scales: {
						xAxes: [{
							time: {
								unit: 'date'
							},
							gridLines: {
								display: false,
								drawBorder: false
							},
							ticks: {
								maxTicksLimit: 7
							}
						}],
						yAxes: [{
							ticks: {
								maxTicksLimit: 5,
								padding: 10,
								// Include a dollar sign in the ticks
								callback: function(value, index, values) {
									return '$' + number_format(value);
								}
							},
							gridLines: {
								color: "rgb(234, 236, 244)",
								zeroLineColor: "rgb(234, 236, 244)",
								// drawBorder: false,
								borderDash: [2],
								zeroLineBorderDash: [2]
							}
						}],
					},
					legend: {
						display: false
					},
					tooltips: {
						backgroundColor: "rgb(255,255,255)",
						bodyFontColor: "#858796",
						titleMarginBottom: 10,
						titleFontColor: '#6e707e',
						titleFontSize: 14,
						borderColor: '#dddfeb',
						borderWidth: 1,
						xPadding: 15,
						yPadding: 15,
						displayColors: false,
						// intersect: true,
						mode: 'index',
						caretPadding: 10,
						callbacks: {
							label: function(tooltipItem, chart) {
								var datasetLabel = chart.datasets[tooltipItem.datasetIndex].label || '';
								return datasetLabel + ': $' + number_format(tooltipItem.yLabel);
							}
						}
					}
				}
			});

		} catch (e) {
			console.log(e)
		}
	}
</script>


@endsection

-->