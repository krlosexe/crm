@extends('layouts.app')

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
		            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
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
		                      <div class="h5 mb-0 font-weight-bold text-gray-800" id="cx_qty" >0</div>
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

		            <!-- Area Chart -->
		            <div class="col-xl-8 col-lg-7">
		              <div class="card shadow mb-4">
		                <!-- Card Header - Dropdown -->
		                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
		                  <h6 class="m-0 font-weight-bold text-primary">Earnings Overview</h6>
		                  <div class="dropdown no-arrow">
		                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		                      <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
		                    </a>
		                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
		                      <div class="dropdown-header">Dropdown Header:</div>
		                      <a class="dropdown-item" href="#">Action</a>
		                      <a class="dropdown-item" href="#">Another action</a>
		                      <div class="dropdown-divider"></div>
		                      <a class="dropdown-item" href="#">Something else here</a>
		                    </div>
		                  </div>
		                </div>
		                <!-- Card Body -->
		                <div class="card-body">
		                  <div class="chart-area">
		                    <canvas id="myAreaChart"></canvas>
		                  </div>
		                </div>
		              </div>
		            </div>

		            <!-- Pie Chart -->
		            <div class="col-xl-4 col-lg-5">
		              <div class="card shadow mb-4">
		                <!-- Card Header - Dropdown -->
		                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
		                  <h6 class="m-0 font-weight-bold text-primary">Encuestas</h6>
		                  <div class="dropdown no-arrow">
		                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
		                      <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
		                    </a>
		                  </div>
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
				login()
				prps()
				valorations()
				surgeries()
				calificationsGoogle()
				survey()
			});

			function login(){
				enviarFormulario("#login", 'auth', '#cuadro2', true);
			}


			function prps(){

				var url=document.getElementById('ruta').value;
		            $.ajax({
		                url:''+url+'/api/prp/qty/month/'+id_user,
		                type: 'GET',
		                dataType:'JSON',
		                
		                success: function(response){
		                   $("#prp_qty").text(response.qty)
		                }
		            });
			}







			function calificationsGoogle(){

				var url=document.getElementById('ruta').value;
				$.ajax({
					url:''+url+'/api/qty/califications/google/'+id_user,
					type: 'GET',
					dataType:'JSON',
					success: function(response){

						$("#google_qty").text(response.qty)

					}
				});
			}





			function valorations(){

				var url=document.getElementById('ruta').value;
				$.ajax({
					url:''+url+'/api/valorations/qty/month/'+id_user,
					type: 'GET',
					dataType:'JSON',
					success: function(response){

						$("#valoration_qty").text(response.qty)

					}
				});
			}



			function surgeries(){

				var url=document.getElementById('ruta').value;
				$.ajax({
					url:''+url+'/api/surgeries/qty/month/'+id_user,
					type: 'GET',
					dataType:'JSON',
					success: function(response){

						$("#cx_qty").text(response.qty)

					}
				});
			}




			function survey(){

				var url=document.getElementById('ruta').value;
				$.ajax({
					url:''+url+'/api/survey/adviser/'+id_user,
					type: 'GET',
					dataType:'JSON',
					success: function(response){

						var html = ""
						$.map(response.data, function (item, key) {
							
							html += '<li class="list-group-item">'
								html += '<img class="rounded" src="http://pdtclientsolutions.com/crm-public.dev/img/default-user.png" style="height: 2rem;width: 2rem; margin: 1%; border-radius: 50%!important;" title="Johana Andrea Londoño">'
								html += '<b>'+item.nombres+'</b><br> '+item.created_prp+'<br>'

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








		</script>


	@endsection


