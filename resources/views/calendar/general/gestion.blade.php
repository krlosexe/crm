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



			#slide{
				position: absolute;
				top: 0;
				right: 0;
				bottom: 0;
				left: 0;
				z-index: 3000;
				display: none;
				/* background-color: rgba(0,0,0,.4); */
				transform: translateZ(0);
				-webkit-transform: translateZ(0);
				-moz-transform: translateZ(0);
				-ms-transform: translateZ(0);
				-o-transform: translateZ(0);
				overflow: hidden;
				 -webkit-transition: 3s;
					-moz-transition: 3s;
					-ms-transition: 3s;
					-o-transition: 3s;
					transition: 3s;
			}

			#slide.show{
				display: block;
    			pointer-events: auto;
				z-index: 3000;
				left: 0px;
				top: 0px;
				right: 0px;
				height: 912px;
				background-color: rgba(0, 0, 0, 0.4);
				-webkit-transition: 3s;
				-moz-transition: 3s;
				-ms-transition: 3s;
				-o-transition: 3s;
				transition: 3s;
				
			}


			.side-panel-container {
				position: absolute;
				top: 0;
				right: 0;
				bottom: 0;
				z-index: 3001;
				display: block;
				width: calc(100% - 300px);
				background: #ebf1f4;
				transform: translateX(100%);
				 -webkit-transition: 3s;
					-moz-transition: 3s;
					-ms-transition: 3s;
					-o-transition: 3s;
					transition: 3s;

			}

			.slide-show{
				z-index: 3001;
				width: calc(100% - 65px);
				height: 912px;
				max-width: 1200px;
				-webkit-transform: translateX(0%);
				-moz-transform: translateX(0%);
				-ms-transform: translateX(0%);
				-o-transform: translateX(0%);
				transform: translateX(0%);
			
			}


			.side-panel-label {
				display: flex;
				position: absolute;
				left: 0;
				top: 21px;
				min-width: 30px;
				height: 38px;
				padding-right: 5px;
				background: rgba(47,198,246,.95);
				border-top-left-radius: 19px;
				border-bottom-left-radius: 19px;
				white-space: nowrap;
				overflow: hidden;
				transition: top .3s;
				box-shadow: inset -6px 0 8px -10px rgba(0,0,0,0.95);
				z-index: 1;
				transform: translateX(-100%);
				cursor: pointer;
			}

			.side-panel-close-btn-inner:before {
				-webkit-transform: translateX(-50%) translateY(-50%) rotate(-45deg);
				-moz-transform: translateX(-50%) translateY(-50%) rotate(-45deg);
				-ms-transform: translateX(-50%) translateY(-50%) rotate(-45deg);
				-o-transform: translateX(-50%) translateY(-50%) rotate(-45deg);
				transform: translateX(-50%) translateY(-50%) rotate(-45deg);
			}


			.side-panel-close-btn-inner:after, .side-panel-close-btn-inner:before {
				position: absolute;
				top: 50%;
				left: 50%;
				width: 14px;
				height: 2px;
				background-color: #fff;
				content: "";
			}


			.side-panel-close-btn-inner:after {
				-webkit-transform: translateX(-50%) translateY(-50%) rotate(45deg);
				-moz-transform: translateX(-50%) translateY(-50%) rotate(45deg);
				-ms-transform: translateX(-50%) translateY(-50%) rotate(45deg);
				-o-transform: translateX(-50%) translateY(-50%) rotate(45deg);
				transform: translateX(-50%) translateY(-50%) rotate(45deg);
			}


			.side-panel-close-btn-inner:after, .side-panel-close-btn-inner:before {
				position: absolute;
				top: 50%;
				left: 50%;
				width: 14px;
				height: 2px;
				background-color: #fff;
				content: "";
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
									
									<div class="row">
										<div class="col-md-3">
											<div class="form-group">
												<label for=""><b>Clinica</b></label>
												<select name="" id="clinic" class="form-control">
													<option value="All">Todas</option>
												</select>
											</div>
										</div>


										<div class="col-md-3">
											<div class="form-group">
												<label for=""><b>Asesora</b></label>
												<select name="" id="consultant" name="data[]" class="form-control select2" multiple>
													<option value="All">Todas</option>
												</select>
											</div>
										</div>

									</div>
									<div id='calendar'></div>
								</div>
							</div>

			            </div>
			          </div>


			        </div>
					<!-- /.container-fluid -->
					



					<!-- Modal -->
					<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
						<div class="modal-dialog modal-lg" role="document" style="max-width: 75% !important;">
							<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title" id="exampleModalLongTitle">Actividad</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">

								<form method="POST" id="update_event">

									<input type="hidden" name="_method" value="put">

									<div class="row">

										<div class="col-md-5">

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
														<input type="text" name="issue" id="issue-view" class="form-control input-disabled"  >
													</div>
												</div>
											</div>


											<div class="row" id="paciente-input">
												<div class="col-md-12">
													<div class="form-group">
														<label for=""><b>Paciente</b></label>
														<a href="javascript:void(0)" id="name_paciente"></a>
														<!--<input type="text" name="paciente" id="paciente-view" class="form-control"  >-->
													</div>
												</div>
											</div>




											<div class="row">
												<div class="col-md-12">
													<div class="form-group">
														<label for=""><b>Fecha</b></label>
														<input type="date" name="fecha" id="fecha-view" class="form-control input-disabled" min="<?= date("Y-m-d")?>">
													</div>
												</div>
											</div>

											<div class="row">
												<div class="col-md-6">
													<div class="form-group">
														<label for=""><b>Hora desde</b></label>
														<input type="time" name="time" id="time-view" class="form-control input-disabled">
													</div>
												</div>

												<div class="col-md-6">
													<div class="form-group">
														<label for=""><b>Hora hasta</b></label>
														<input type="time" name="time_end" id="time-end-view" class="form-control input-disabled">
													</div>
												</div>
											</div>


											<center>
												<button id="send_usuario" class="btn btn-primary btn-user">
													Repogramar
												</button>
											</center>



										</div>


										<div class="col-md-7">
											<div class="row">
												<div class="col-md-12" id="adviser-input">
													<div class="form-group">
														<label for=""><b>Asesora de Valoracion</b></label>
														<input type="text"  id="adviser" class="form-control">
													</div>
												</div>


												<div class="col-md-12" id="clinic-input">
													<div class="form-group">
														<label for=""><b>Clinica</b></label>
														<input type="text"  id="clinic_cite" class="form-control" required>
													</div>
												</div>


												<div class="col-md-12" id="observations-input">
													<div class="form-group">
														<label for=""><b>Obervaciones</b></label>
														<textarea name="observaciones" id="observaciones-view" class="form-control input-disabled" cols="30" rows="5"></textarea>
													</div>
												</div>


												<div class="col-md-12" id="comments-input">
													<div class="row" id="comments">
														<div class="col-md-12">
															<div class="row">
																<div class="col-md-2">
																Foto
																</div>
																<div class="col-md-10">
																Text
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>


											<div class="row">
												<div class="col-md-12" id="comments2-input">
													<div class="form-group">
														<label for=""><b>Comentarios</b></label>
														<textarea id="summernote"></textarea>
													</div>
												</div>
											</div>


											<div class="row">
												<div class="col-md-12" id="comments3-input">
													<button type="button" id="add-comments"  class="btn btn-primary">
														Comentar
													</button>
												</div>
											</div>

											<br><br>

											<div class="row">
												<div class="col-md-12">
												<label for=""><b>Seguidores</b></label>
												<ul class="list-group" id=list_followers>
												</ul>
											</div>


										</div>
										</div>


										<input type="hidden" name="inicial" id="inicial">
										<input type="hidden" name="id_user" class="id_user">
										<input type="hidden" name="token" class="token">

										<input type="hidden" name="id_user_edit" id="id_edit">


										

									</form>
								</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
							</div>
							</div>
						</div>
					</div>



		      </div>
		      <!-- End of Main Content -->




				<div id="slide">
					
					<div class="side-panel-container">


						<div id="content">
							<h3 style="text-align: center;margin: 22% 0;">AQUI TODOS LOS DATOS DEL PACIENTE</h3>
						</div>

						<div class="side-panel-label" style="max-width: 40px; top: 21px;" onclick="closeSlide()">
							<div class="side-panel-close-btn" title="Cerrar">
								<div class="side-panel-close-btn-inner"></div>
							</div>
						</div>
					</div>


				</div>
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
	<link href="<?= url('/') ?>/vendor/summernote-master/dist/summernote.min.css" rel="stylesheet">
    <script src="<?= url('/') ?>/vendor/summernote-master/dist/summernote.min.js"></script>
		<script>
		  	var asesoras = []
			$(document).ready(function(){
				
				store();
				$(".fc-next-button").html('<i class="fas fa-angle-right"></i>')
				$(".fc-prev-button").html('<i class="fas fa-angle-left"></i>')
				
				$("#collapse_Calendarios").addClass("show");
				$("#nav_calendar, #modulo_Calendarios").addClass("active");

				verifyPersmisos(id_user, tokens, "citys");

				ListTasksToday("#tasks-today")

				GetClinicFilter("#clinic")
				GetAsesorasValoracion("#consultant")

				initCalendar(asesoras)

			});


			$("#clinic").change(function (e) { 
				$("#calendar").html("");
				initCalendar(asesoras)
			});

			$("#consultant").change(function (e) { 
				$("#calendar").html("");
				asesoras = $(this).val()
				initCalendar(asesoras)
			});


			function closeSlide(){
				$("#slide").removeClass("show")
				$(".side-panel-container").removeClass("slide-show")
			}
			
			function initCalendar(asesoras) {

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
							// {
							// 	url: 'api/calendar/tasks', 
							// 	color: '#4e73df',    
							// 	textColor: 'white'  ,
							// 	extraParams: {
							// 		rol      : name_rol,
							// 		id_user  : id_user,
							// 		asesoras : asesoras.length > 0 ? asesoras : 0
							// 	},
								
							// },


							{
								url: 'api/calendar/tasks/clients', 
								color: '#4e73df',    
								textColor: 'white'  ,
								extraParams: {
									rol      : name_rol,
									id_user  : id_user,
									asesoras : asesoras.length > 0 ? asesoras : 0
								},
								
							},



						
							{
								url: 'api/calendar/valuations', 
								color: '#FFAAD4',   
								textColor: 'white',
								extraParams: {
									rol     : name_rol,
									id_user : id_user,
									clinic  : $("#clinic").val(),
									asesoras : asesoras.length > 0 ? asesoras : 0
								},
							},
							{
								url: 'api/calendar/surgeries', 
								color: '#7F55FF',   
								textColor: 'white',
								extraParams: {
									rol: name_rol,
									id_user: id_user,
									clinic  : $("#clinic").val(),
									asesoras : asesoras.length > 0 ? asesoras : 0
									
								}
							},
							{
								url: 'api/calendar/revision', 
								color: '#FF7F7F',   
								textColor: 'white',
								extraParams: {
									rol: name_rol,
									id_user: id_user,
									clinic  : $("#clinic").val(),
									asesoras : asesoras.length > 0 ? asesoras : 0
								}
							},


							{
								url: 'api/calendar/preanesthesia', 
								color: '#FF7F00',   
								textColor: 'white',
								extraParams: {
									rol: name_rol,
									id_user: id_user,
									clinic  : $("#clinic").val(),
									asesoras : asesoras.length > 0 ? asesoras : 0
								}
							}



						],


						eventDrop: function(info) {

							console.log(info.oldEvent._def.extendedProps)
							//alert(info.event.title + " was dropped on " + info.event.start.toISOString());

							if (!confirm("Are you sure about this change?")) {
								info.revert();
							}
						},


						eventClick: function(calEvent, jsEvent, view) {
							
							$("#issue-view").val(calEvent.event.title)
							$("#fecha-view").val(calEvent.event.extendedProps.fecha)
							$("#time-view").val(calEvent.event.extendedProps.time)
							$("#time-end-view").val(calEvent.event.extendedProps.time_end)
							$("#clinic_cite").val(calEvent.event.extendedProps.name_clinic).attr("disabled", "disabled");
							
							$("#observaciones-view").val(calEvent.event.extendedProps.observaciones)




							$("#clinic-input, #observations-input").css("display", "block")
							$("#comments-input").css("display", "none")
							$("#paciente-input").css("display", "none")
							$("#comments2-input").css("display", "none")
							$("#comments3-input").css("display", "none")
							$("#add-comments").css("display", "none")
							$("#observations-input").css("display", "none")
								

							var img = "<img class='rounded' style='height: 8rem; width: 8rem; margin: 1%; border-radius: 50%!important;' src='img/usuarios/profile/"+calEvent.event.extendedProps.img_profile+"'>"
						
							$("#img_profile_responsable").html(img)
							
							var name_responsable = '<br><span><b>'+calEvent.event.extendedProps.nombres+" "+calEvent.event.extendedProps.apellido_p+'</b></span>'
							$("#name_responsable").html(name_responsable)

							var html = "";
							$.each(calEvent.event.extendedProps.followers, function (key, item) { 
								html += '<li class="list-group-item"><img class="rounded" src="img/usuarios/profile/'+item.img_profile+'" style="height: 2rem;width: 2rem; margin: 1%; border-radius: 50%!important;" title="'+item.name_follower+''+item.last_name_follower+'"><b>'+item.name_follower+' '+item.last_name_follower+'</b></li>'
							});

							
							if(calEvent.event.extendedProps.valuations == true){
								$("#observations-input").css("display", "none")
								$("#comments-input").css("display", "block")
								$("#paciente-input").css("display", "block")
								$("#comments2-input").css("display", "block")
								$("#comments3-input").css("display", "block")
								$("#add-comments").css("display", "block")
								$('#summernote').summernote("reset");
								
							//	$("#paciente-view").val(calEvent.event.extendedProps.name_client+" "+calEvent.event.extendedProps.last_name_client)
								$("#name_paciente").text(calEvent.event.extendedProps.name_client)
								$("#name_paciente").attr("onclick")

								$("#name_paciente").unbind().click(function (e) { 
									//$("#slide").toggleClass("show")
									//$(".side-panel-container").toggleClass("slide-show")
									
								});
								var html_comments = "";


								GetComments("/api/comments/valuations","#comments", calEvent.event.extendedProps.id_valuations, calEvent.event.extendedProps.observaciones)
								SubmitComment(calEvent.event.extendedProps.id_valuations, "api/comments/valuations", "surgerie", "#add-comments")


								enviarFormularioPutEvent("#update_event", 'api/valuations', '#cuadro4', false, "#avatar-edit");
								$("#id_edit").val(calEvent.event.extendedProps.id_valuations)

								$("#adviser-input").css("display", "block")

								if(calEvent.event.extendedProps.name_asesora != null){
									var name_asesora = calEvent.event.extendedProps.name_asesora+" "+calEvent.event.extendedProps.apellido_asesora
								}else{
									var name_asesora = ""
								}


								if(id_user == calEvent.event.extendedProps.usr_regins){
									$(".input-disabled").removeAttr("disabled")
								}else{
									$(".input-disabled").attr("disabled", "disabled")
								}



								
								$("#adviser").val(name_asesora).attr("disabled", "disabled")



						//		AddComment(calEvent.event.extendedProps.id_valuations, "api/comment/", "clients", "#add-comments", "valuations")


							}else{
								$("#adviser-input").css("display", "none")
							}


							if(calEvent.event.extendedProps.task == true){
								$("#id_edit").val(calEvent.event.extendedProps.id_tasks)

								if(id_user == calEvent.event.extendedProps.responsable){
									$(".input-disabled").removeAttr("disabled")
								}else{
									$(".input-disabled").attr("disabled", "disabled")
								}


								enviarFormularioPutEvent("#update_event", 'api/tasks', '#cuadro4', false, "#avatar-edit");
							}


							if(calEvent.event.extendedProps.task_cient == true){
								$("#clinic-input, #observations-input").css("display", "none")
								$("#comments-input").css("display", "block")
								$("#paciente-input").css("display", "block")
								$("#comments2-input").css("display", "block")
								$("#add-comments").css("display", "block")
								$('#summernote').summernote("reset");
							//	$("#paciente-view").val(calEvent.event.extendedProps.name_client+" "+calEvent.event.extendedProps.last_name_client)
								$("#name_paciente").text(calEvent.event.extendedProps.name_client)

								GetCommentsTask("/api/tasks/comments","#comments", calEvent.event.extendedProps.id_clients_tasks)


								
								$("#comments3-input").css("display", "block")

								$("#id_edit").val(calEvent.event.extendedProps.id_clients_tasks)

								enviarFormularioPutEvent("#update_event", 'api/client/tasks', '#cuadro4', false, "#avatar-edit");

								SubmitComment(calEvent.event.extendedProps.id_clients_tasks, "api/comment/task/client", "clients", "#add-comments")

								if(id_user == calEvent.event.extendedProps.responsable){
									$(".input-disabled").removeAttr("disabled")
								}else{
									$(".input-disabled").attr("disabled", "disabled")
								}


							}else{
								
							}


							if(calEvent.event.extendedProps.preanesthesias == true){
								$("#id_edit").val(calEvent.event.extendedProps.id_preanesthesias)
								enviarFormularioPutEvent("#update_event", 'api/preanesthesia', '#cuadro4', false, "#avatar-edit");


								$("#comments2-input").css("display", "block")
								$("#comments3-input").css("display", "block")
								$("#comments-input").css("display", "block")
								$("#add-comments").css("display", "block")
								
								$('#summernote').summernote("reset");


								GetComments("/api/comments/preanesthesias","#comments", calEvent.event.extendedProps.id_preanesthesias, calEvent.event.extendedProps.observaciones)

								SubmitComment(calEvent.event.extendedProps.id_preanesthesias, "api/comments/preanesthesias", "preanesthesias", "#add-comments")





								if(id_user == calEvent.event.extendedProps.usr_regins){
									$(".input-disabled").removeAttr("disabled")
								}else{
									$(".input-disabled").attr("disabled", "disabled")
								}


							}


							if(calEvent.event.extendedProps.surgeries == true){

								$("#comments2-input").css("display", "block")
								$("#comments3-input").css("display", "block")
								$("#comments-input").css("display", "block")
								$("#add-comments").css("display", "block")
								
								$('#summernote').summernote("reset");


								$("#id_edit").val(calEvent.event.extendedProps.id_surgeries)
								enviarFormularioPutEvent("#update_event", 'api/surgeries', '#cuadro4', false, "#avatar-edit");

								if(id_user == calEvent.event.extendedProps.usr_regins){
									$(".input-disabled").removeAttr("disabled")
								}else{
									$(".input-disabled").attr("disabled", "disabled")
								}

								GetComments("/api/comments/surgerie","#comments", calEvent.event.extendedProps.id_surgeries, calEvent.event.extendedProps.observaciones)

								SubmitComment(calEvent.event.extendedProps.id_surgeries, "api/comments/surgerie", "surgerie", "#add-comments")
							}





							$("#list_followers").html(html)
							
							$("#exampleModalCenter").modal('show');
						}

					});

					calendar.render();

			}



			function SubmitComment(id, api, table, btn){

				$(btn).unbind().click(function (e) { 

					var html = ""

					html += '<div class="col-md-12" style="margin-bottom: 15px">'
						html += '<div class="row">'
							html += '<div class="col-md-2">'
							html += '</div>'
							html += '<div class="col-md-10" style="background: #eee;padding: 2%;border-radius: 17px;">'
								html += '<div>'+$("#summernote").val()+'</div>'

								html += '<div><b></b> <span style="float: right">Ahora Mismo</span></div>'

							html += '</div>'
						html += '</div>'
					html += '</div>'

					$("#comments").append(html)


					var url=document.getElementById('ruta').value;

					$.ajax({
						url:''+url+"/"+api,
						type:'POST',
						data: {
							"id_user" : id_user,
							"token"   : tokens,
							"id"      : id,
							"comment" : $("#summernote").val(),
							
						},
						dataType:'JSON',
						beforeSend: function(){
							$("#add-comments").text("espere...").attr("disabled", "disabled")
						},
						error: function (data) {
							$("#add-comments").text("Comentar").removeAttr("disabled")
						},
						success: function(data){
							$("#add-comments").text("Comentar").removeAttr("disabled")
							
							$('#summernote').summernote("reset");
							$("#calendar").html("");
							var asesoras = []
							initCalendar(asesoras)

						}
					});



					
				});
				
			}








			function GetComments(api, comment_content, id, observaciones){
				$(comment_content).html("Cargando...")
				var url=document.getElementById('ruta').value;	
				$.ajax({
					url:''+url+'/'+api+'/'+id,
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
									html += '<div class="col-md-10" style="background: #eee;padding: 2%;border-radius: 17px;">'
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




			



			function GetCommentsTask(api, comment_content, id){
				$(comment_content).html("Cargando...")
				var url=document.getElementById('ruta').value;	
				$.ajax({
					url:''+url+'/'+api+'/'+id,
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
										html += '<div>'+item.comments+'</div>'

										html += '<div><b>'+item.name_user+" "+item.last_name_user+'</b> <span style="float: right">'+item.create_at+'</span></div>'


									html += '</div>'
								html += '</div>'
							html += '</div>'
							
						});

						
						$(comment_content).html(html)
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
				$("#fecha-view").val(data.fecha)
				$("#time-view").val(data.time)
				$("#time-end-view").val(data.time_end).attr("disabled", "disabled");
			
				$("#observaciones-view").val(data.observaciones)

				var img = "<img class='rounded' style='height: 8rem; width: 8rem; margin: 1%; border-radius: 50%!important;' src='img/usuarios/profile/"+data.img_profile+"'>"
		
				$("#img_profile_responsable").html(img)
				
				var name_responsable = '<br><span><b>'+data.nombres+" "+data.apellido_p+'</b></span>'
				$("#name_responsable").html(name_responsable)

				var html = "";
				$.each(data.followers, function (key, item) { 
					html += '<li class="list-group-item"><img class="rounded" src="img/usuarios/profile/'+item.img_profile+'" style="height: 2rem;width: 2rem; margin: 1%; border-radius: 50%!important;" title="'+item.name_follower+''+item.last_name_follower+'"><b>'+item.name_follower+' '+item.last_name_follower+'</b></li>'
				});

				$("#list_followers").html(html)


				if(data.valuations == true){

					enviarFormularioPutEvent("#update_event", 'api/valuations', '#cuadro4', false, "#avatar-edit");
					$("#id_edit").val(data.id_valuations)

					$("#adviser-input").css("display", "block")

					if(data.name_asesora != null){
						var name_asesora = data.name_asesora+" "+data.apellido_asesora
					}else{
						var name_asesora = ""
					}

					$("#adviser").val(name_asesora).attr("disabled", "disabled")
					}else{
						$("#adviser-input").css("display", "none")
					}


					if(data.task == true){
						$("#id_edit").val(data.id_tasks)
						enviarFormularioPutEvent("#update_event", 'api/tasks', '#cuadro4', false, "#avatar-edit");
					}


					if(data.task_cient == true){
						$("#clinic-input, #observations-input").css("display", "none")
						$("#comments-input").css("display", "block")
						$("#paciente-input").css("display", "block")
						$("#paciente-view").val(data.name_client+" "+data.last_name_client)

					var html_comments = "";
					$.map(data.comments, function (item, key) {
						html_comments += '<div class="col-md-12" style="margin-bottom: 15px">'
							html_comments += '<div class="row">'
								html_comments += '<div class="col-md-2">'
									html_comments += "<img class='rounded' src='img/usuarios/profile/"+item.img_profile+"' style='height: 2rem;width: 2rem; margin: 1%; border-radius: 50%!important;' title='"+item.name_follower+" "+item.last_name_follower+"'>"
									
								html_comments += '</div>'
								html_comments += '<div class="col-md-10" style="background: #eee;padding: 2%;border-radius: 17px;font-size: 11px">'
									html_comments += '<div>'+item.comments+'</div>'

									html_comments += '<div><b>'+item.name_user+" "+item.last_name_user+'</b> <span style="float: right">'+item.create_at+'</span></div>'


								html_comments += '</div>'
							html_comments += '</div>'
						html_comments += '</div>'
						
					});

					$("#comments").html(html_comments)


					$("#id_edit").val(data.id_clients_tasks)

					enviarFormularioPutEvent("#update_event", 'api/client/tasks', '#cuadro4', false, "#avatar-edit");




					}else{
						$("#clinic-input, #observations-input").css("display", "block")
						$("#comments-input").css("display", "none")
						$("#paciente-input").css("display", "none")
					}


					if(data.preanesthesias == true){
						$("#id_edit").val(data.id_preanesthesias)
						enviarFormularioPutEvent("#update_event", 'api/preanesthesia', '#cuadro4', false, "#avatar-edit");
					}


					if(data.surgeries == true){
						$("#id_edit").val(data.id_surgeries)
						enviarFormularioPutEvent("#update_event", 'api/surgeries', '#cuadro4', false, "#avatar-edit");
					}

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


			function GetClinicFilter(select){
				var url=document.getElementById('ruta').value;
				$.ajax({
					url:''+url+'/api/clinic',
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
						$(select+" option").remove();
						$(select).append($('<option>',
						{
							value: "All",
							text : "Todas"
						}));
						$.each(data, function(i, item){
							if (item.status == 1) {
							$(select).append($('<option>',
							{
								value: item.id_clinic,
								text : item.nombre
							}));
							}
						});

					}
				});
			}







			function enviarFormularioPutEvent(form, controlador, cuadro, auth = false, inputFile){
				$(form).unbind().submit(function(e){
					e.preventDefault(); //previene el comportamiento por defecto del formulario al darle click al input submit
					var url=document.getElementById('ruta').value; 
					var formData=new FormData($(form)[0]); //obtiene todos los datos de los inputs del formulario pasado por parametros
					
					var method = $(this).attr('method'); //obtiene el method del formulario


					$('input[type="submit"]').attr('disabled','disabled'); //desactiva el input submit
					$.ajax({
						url:''+url+'/'+controlador+'/'+$("#id_edit").val(),
						type:method,
						dataType:'JSON',
						data:formData,
						cache:false,
							contentType:false,
							processData:false,
						beforeSend: function(){
							mensajes('info', '<span>Espere por favor... <i class="fa fa-spinner fa-spin" aria-hidden="true"></i></span>');
						},
						error: function (repuesta) {
							$('input[type="submit"]').removeAttr('disabled'); //activa el input submit
							var errores=repuesta.responseText;
							if(errores!="")
								mensajes('danger', errores);
							else
								mensajes('danger', "<span>Ha ocurrido un error, por favor intentelo de nuevo.</span>");        
						},
						success: function(respuesta){

							mensajes('success', "El evento se actualizo exitosamente");


							$("#calendar").html("");

							
							var asesoras = []
							initCalendar(asesoras)
						}

					});
				});
			}




			

		</script>



		



	@endsection


