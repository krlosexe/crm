@extends('layouts.app')
	

	@section('CustomCss')
	   

	    <link href='vendor/fullcalendar/packages/core/main.css' rel='stylesheet' />
		<link href='vendor/fullcalendar/packages/daygrid/main.css' rel='stylesheet' />
		<link href='vendor/fullcalendar/packages/timegrid/main.css' rel='stylesheet' />
		<link href='vendor/fullcalendar/packages/list/main.css' rel='stylesheet' />
		<script src='vendor/fullcalendar/packages/core/main.js'></script>
		<script src='vendor/fullcalendar/packages/core/locales-all.js'></script>
		<script src='vendor/fullcalendar/packages/interaction/main.js'></script>
		<script src='vendor/fullcalendar/packages/daygrid/main.js'></script>
		<script src='vendor/fullcalendar/packages/timegrid/main.js'></script>
		<script src='vendor/fullcalendar/packages/list/main.js'></script>


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



			
			.fc th {
				text-align: center;
				padding: 15px;
				background-color: transparent;
				color: #888da8 !important;
				font-size: 12px;
				text-transform: uppercase;
				border-right-width: 0;
				border-left-width: 0;
			}


			.fc button.fc-button-primary {
				border-color: #e6ecf5 !important;
				box-shadow: none;
			}



			.fc button {
				background-color: #ffffff;
				background-image: none;
				height: 37px;
				padding: 0 15px;
				color: #6b7192;
			}

			.fc button:hover{
				background-color: #4e73df;
			}


			.fc button.fc-button-active {
				box-shadow: none;
				background-color: #e6ecf5 !important;
				color: #888da8 !important;
			}



			.fc-event-container .fc-day-grid-event {
				margin: 1px 5px 5px !important;
			}



			.fc-event-container .fc-event {
				border-radius: 0px;
				border: 0px;
				font-size: 12px;
				line-height: 2.5;
				padding: 0px 15px;
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
			          <div id="alertas"></div>
			          <input type="hidden" class="id_user">
			          <input type="hidden" class="token">

			          <!-- DataTales Example -->
			          <div class="card shadow mb-4" id="cuadro1">
			            <div class="card-header py-3">
			              <h6 class="m-0 font-weight-bold text-primary">Gestion del Calendario</h6>
			            </div>
			            <div class="card-body">
							<center>
							<ul style="list-style:none">
								<li style="display: inline-block; margin: 2%"> <span style="color: #4e73df"><i class="fas fa-circle"></i></span> Tareas</li>
								<!-- <li style="display: inline-block; margin: 2%"> <span style="color: #E5F4FD"><i class="fas fa-circle"></i></span> Consultas</li> -->
								<li style="display: inline-block; margin: 2%"> <span style="color: #FFAAD4"><i class="fas fa-circle"></i></span> Valoraciones</li>
								<li style="display: inline-block; margin: 2%"> <span style="color: #FF7F00"><i class="fas fa-circle"></i></span> Pre Anestesias</li>
								<li style="display: inline-block; margin: 2%"> <span style="color: #7F55FF"><i class="fas fa-circle"></i></span> Cirugias</li>
								<li style="display: inline-block; margin: 2%"> <span style="color: #FF2A55"><i class="fas fa-circle"></i></span> Fecha Tentativa</li>
								<li style="display: inline-block; margin: 2%"> <span style="color: #FF7F7F"><i class="fas fa-circle"></i></span> Revision</li>
							</ul>
							</center>
							<div class="row">
							
								<div class="col-md-4">
									
								
									<div class="card calendar-event">
										<div class="card-block overlay-dark bg" style="background-image: url('img/img-8.jpg')">
											<div class="text-center">
												<h1 class="font-size-65 text-light mrg-btm-5 lh-1"><?= date("d") ?></h1>
												<h2 class="no-mrg-top"><?= date('l', strtotime(date("d"))); ?></h2>
											</div>
										</div>
										<div class="card-block">
											<!-- <button type="button" class="add-event btn-warning">
												<i class="fas fa-plus"></i>
											</button> -->
											<ul class="event-list" id="tasks-today" style="height: 400px;overflow: auto;"> 
												
											</ul>
										</div>
									</div>
								</div>

								
								<div class="col-md-8">
									
									<div id='calendar'></div>
								</div>
							</div>

			            </div>
			          </div>


			        </div>
					<!-- /.container-fluid -->
					



					<!-- Modal -->
					<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
						<div class="modal-dialog modal-lg" role="document">
							<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title" id="exampleModalLongTitle">Actividad</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">

								<div class="row">

									<div class="col-md-6">
									
										<div class="row">
											<div class="col-md-12">
												<center>
													<label for=""><b>Responsable</b></label>
													<div id="img_profile_responsable"></div>
													<div id="name_responsable"></div>
												</center>
											</div>
										</div>
										<br>


										<div class="row">
											<div class="col-md-12">
												<div class="form-group">
													<label for=""><b>Asunto</b></label>
													<input type="text" name="issue" id="issue-view" class="form-control" required >
												</div>
											</div>
										</div>


										<div class="row">
											<div class="col-md-12">
												<div class="form-group">
													<label for=""><b>Fecha</b></label>
													<input type="date" name="fecha" id="fecha-view" class="form-control" required min="<?= date("Y-m-d")?>">
												</div>
											</div>
										</div>

										<div class="row">
											<div class="col-md-6">
												<div class="form-group">
													<label for=""><b>Hora desde</b></label>
													<input type="time" name="time" id="time-view" class="form-control" required>
												</div>
											</div>

											<div class="col-md-6">
												<div class="form-group">
													<label for=""><b>Hora hasta</b></label>
													<input type="time" name="time_end" id="time-end-view" class="form-control" required>
												</div>
											</div>
										</div>
									
									</div>


									<div class="col-md-6">
										<div class="row">
											<div class="col-md-12">
												<div class="form-group">
													<label for=""><b>Obervaciones</b></label>
													<textarea name="observaciones" id="observaciones-view" class="form-control" cols="30" rows="5"></textarea>
												</div>
											</div>
										</div>

										<div class="row">
											<div class="col-md-12">
											<label for=""><b>Seguidores</b></label>
											<ul class="list-group" id=list_followers>
											</ul>
										</div>


									</div>
								</div>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
							</div>
							</div>
						</div>
					</div>



		      </div>
		      <!-- End of Main Content -->

		      <!-- Footer -->
		      <footer class="sticky-footer bg-white">
		        <div class="container my-auto">
		          <div class="copyright text-center my-auto">
		            <span>Copyright &copy; Your Website 2020</span>
		          </div>
		        </div>
		      </footer>
		      <!-- End of Footer -->

		    </div>
		    <!-- End of Content Wrapper -->

		  </div>
		  <input type="hidden" id="ruta" value="<?= url('/') ?>">
		  <input type="hidden" id="rol_calendar">
		  <input type="hidden" id="user_calendar">
	@endsection





	@section('CustomJs')

		<script>
		  
			$(document).ready(function(){
				
				store();
				$(".fc-next-button").html('<i class="fas fa-angle-right"></i>')
				$(".fc-prev-button").html('<i class="fas fa-angle-left"></i>')
				
				$("#collapse_Calendarios").addClass("show");
				$("#nav_calendar, #modulo_Calendarios").addClass("active");

				verifyPersmisos(id_user, tokens, "citys");

				ListTasksToday("#tasks-today")

				initCalendar()


			});
			
			function initCalendar() {
				var initialLocaleCode = 'es';
					var localeSelectorEl = document.getElementById('locale-selector');
					var calendarEl = document.getElementById('calendar');

					var calendar = new FullCalendar.Calendar(calendarEl, {

						loading: function (bool) {
							console.log('events are being rendered'); // Add your script to show loading
						},

						plugins: [ 'interaction', 'dayGrid', 'timeGrid', 'list' ],
						header: {
							right: 'today prev,next',
							center: 'title',
							left: 'dayGridMonth,timeGridWeek,timeGridDay,listMonth'
						},

						height: 800,
						
					//	defaultDate: '2020-08-12',
						locale: initialLocaleCode,
						buttonIcons: false,
						navLinks: true, 
						editable: true,
						eventLimit: true, 
						eventSources: [
							{
								url: 'api/calendar/tasks', 
								color: '#4e73df',    
								textColor: 'white'  ,
								extraParams: {
									rol: name_rol,
									id_user: id_user
								},
							},
							// {
							// 	url: 'api/calendar/queries', 
							// 	color: '#E5F4FD',   
							// 	textColor: '#31B5F4' 
							// },
							{
								url: 'api/calendar/valuations', 
								color: '#FFAAD4',   
								textColor: 'white',
								extraParams: {
									rol: name_rol,
									id_user: id_user
								},
							},
							{
								url: 'api/calendar/surgeries', 
								color: '#7F55FF',   
								textColor: 'white',
								extraParams: {
									rol: name_rol,
									id_user: id_user
								}
							},
							{
								url: 'api/calendar/revision', 
								color: '#FF7F7F',   
								textColor: 'white',
								extraParams: {
									rol: name_rol,
									id_user: id_user
								}
							},


							{
								url: 'api/calendar/preanesthesia', 
								color: '#FF7F00',   
								textColor: 'white',
								extraParams: {
									rol: name_rol,
									id_user: id_user
								}
							}



						],
						eventClick: function(calEvent, jsEvent, view) {

							$("#issue-view").val(calEvent.event.title).attr("disabled", "disabled");
							$("#fecha-view").val(calEvent.event.extendedProps.fecha).attr("disabled", "disabled");
							$("#time-view").val(calEvent.event.extendedProps.time).attr("disabled", "disabled");
							$("#time-end-view").val(calEvent.event.extendedProps.time_end).attr("disabled", "disabled");
							
							$("#observaciones-view").val(calEvent.event.extendedProps.observaciones).attr("disabled", "disabled");

							var img = "<img class='rounded' style='height: 8rem; width: 8rem; margin: 1%; border-radius: 50%!important;' src='img/usuarios/profile/"+calEvent.event.extendedProps.img_profile+"'>"
						
							$("#img_profile_responsable").html(img)
							
							var name_responsable = '<br><span><b>'+calEvent.event.extendedProps.nombres+" "+calEvent.event.extendedProps.apellido_p+'</b></span>'
							$("#name_responsable").html(name_responsable)

							var html = "";
							$.each(calEvent.event.extendedProps.followers, function (key, item) { 
								html += '<li class="list-group-item"><img class="rounded" src="/img/usuarios/profile/'+item.img_profile+'" style="height: 2rem;width: 2rem; margin: 1%; border-radius: 50%!important;" title="'+item.name_follower+''+item.last_name_follower+'"><b>'+item.name_follower+' '+item.last_name_follower+'</b></li>'
							});

							$("#list_followers").html(html)

							$("#exampleModalCenter").modal('show');
						}

					});

					calendar.render();

					// build the locale selector's options
					calendar.getAvailableLocaleCodes().forEach(function(localeCode) {
						var optionEl = document.createElement('option');
						optionEl.value = localeCode;
						optionEl.selected = localeCode == initialLocaleCode;
						optionEl.innerText = localeCode;
						localeSelectorEl.appendChild(optionEl);
					});

					// when the selected option changes, dynamically change the calendar option
					localeSelectorEl.addEventListener('change', function() {
						if (this.value) {
						calendar.setOption('locale', this.value);
						}
					});
			}
			
	
			function ListTasksToday(list){

				var url=document.getElementById('ruta').value;
				$.ajax({
					url:''+url+'/api/tasks/today',
					type:'POST',
					data: {
						"id_user": id_user,
						"token"  : tokens,
					},
					dataType:'JSON',
					async: false,
					beforeSend: function(){
					
					},
					error: function (data) {
						
					},
					success: function(data){
						var html = ""

						var array = []
						$.each(data, function (key, item) { 
							$.each(item, function (key2, event) { 
								array.push(event)
							});
						});	


						array.sort(function(a,b){
							return  new Date(a.start) - new Date(b.start);
						});

						$.each(array, function (key, event) { 
							html += '<li class="event-items">'
									html += '<a href="javascript:void(0);" data-event=\''+JSON.stringify(event)+'\' onclick="showEvent(this)"  data-toggle="modal" data-target="#calendar-edit">'
										html += '<span class="bullet success"></span>'
										html += '<span class="event-name">'+event.title+'</span>'
										html += '<div class="event-detail">'
											html += '<span>'+event.fecha+' - </span>'
											html += '<i>'+event.time+'</i>'
										html += '</div>'
									html += '</a>'
									
								html += '</li>'
						});

						$(list).html(html)


					}
				});

			}

			

			function showEvent(data){
				var data = JSON.parse($(data).attr("data-event"));

				$("#issue-view").val(data.title).attr("disabled", "disabled");
				$("#fecha-view").val(data.fecha).attr("disabled", "disabled");
				$("#time-view").val(data.time).attr("disabled", "disabled");
				$("#time-end-view").val(data.time_end).attr("disabled", "disabled");
			
				$("#observaciones-view").val(data.observaciones).attr("disabled", "disabled");

				var img = "<img class='rounded' style='height: 8rem; width: 8rem; margin: 1%; border-radius: 50%!important;' src='/img/usuarios/profile/"+data.img_profile+"'>"
		
				$("#img_profile_responsable").html(img)
				
				var name_responsable = '<br><span><b>'+data.nombres+" "+data.apellido_p+'</b></span>'
				$("#name_responsable").html(name_responsable)

				var html = "";
				$.each(data.followers, function (key, item) { 
					html += '<li class="list-group-item"><img class="rounded" src="/img/usuarios/profile/'+item.img_profile+'" style="height: 2rem;width: 2rem; margin: 1%; border-radius: 50%!important;" title="'+item.name_follower+''+item.last_name_follower+'"><b>'+item.name_follower+' '+item.last_name_follower+'</b></li>'
				});

				$("#list_followers").html(html)

				$("#exampleModalCenter").modal('show');

			}

			function store(){
				enviarFormulario("#store", 'api/tasks', '#cuadro2');
			}


			function nuevo() {
				$("#alertas").css("display", "none");
				$("#store")[0].reset();

				GetUsers("#responsable-store")
				GetUsers("#followers-store")
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

					GetUsers("#responsable-view")
					GetUsers("#followers-view")
					
					$("#responsable-view").val(data.responsable).attr("disabled", "disabled")
					$("#issue-view").val(data.issue).attr("disabled", "disabled")
					$("#fecha-view").val(data.fecha).attr("disabled", "disabled")
					$("#time-view").val(data.time).attr("disabled", "disabled")
					$("#observaciones-view").val(data.observaciones).attr("disabled", "disabled")
					$("#status_task-view").val(data.status_task).attr("disabled", "disabled")

					var followers = []
					$.each(data.followers, function (key, item) { 
						followers.push(item.id_follower)
					});

					$("#followers-view").val(followers).attr("disabled", "disabled")
					$("#followers-view").trigger("change");

					cuadros('#cuadro1', '#cuadro3');
				});
			}

		</script>









		<script>
			

			

			

		</script>


		



	@endsection


