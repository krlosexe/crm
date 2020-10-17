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



				overflow-x: auto;
				overflow-y: auto;
				position: fixed;
				top: 0;
				left: 0;
				z-index: 1050;
				/* display: none; */
				width: 100%;
				height: 100%;
				overflow: hidden;
				outline: 0;
				overflow: scroll;




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
				background: #fff;

				transform: translateX(100%);
				 -webkit-transition: 3s;
					-moz-transition: 3s;
					-ms-transition: 3s;
					-o-transition: 3s;
					transition: 3s;

			}

			.slide-show{
				z-index: 3001;
				width: 90%;
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
			          <h1 class="h3 mb-2 text-gray-800">Cirugias</h1>

			          <div id="alertas"></div>
			          <input type="hidden" class="id_user">
			          <input type="hidden" class="token">

			          <!-- DataTales Example -->
			          <div class="card shadow mb-4" id="cuadro1">
			            <div class="card-header py-3">
			              <h6 class="m-0 font-weight-bold text-primary">Gestion de Cirugias</h6>

			              <button onclick="nuevo()" class="btn btn-primary btn-icon-split" style="float: right;">
		                    <span class="icon text-white-50">
		                      <i class="fas fa-plus"></i>
		                    </span>
		                    <span class="text">Nuevo registro</span>
		                  </button>
			            </div>
			            <div class="card-body">
			              <div class="table-responsive">

						  	<div class="row">

							  <div class="col-md-3">
									<div class="form-group">
										<label for=""><b>Filtrar por : Asesora</b></label>
										<select name="adviser[]" id="id_asesora_valoracion-filter" class="form-control select2 disabled" multiple>
											<option value="">Seleccione</option>
										</select>
									</div>
								</div>

							  <div class="col-md-3">
									<div class="form-group">
										<label for=""><b>Fecha desde</b></label>
										<input type="date" class="form-control" id="date_init">
									</div>
								</div>

								<div class="col-md-3">
									<div class="form-group">
										<label for=""><b>Fecha hasta</b></label>
										<input type="date" class="form-control" id="date_finish">
									</div>
								</div>
							</div>

			                <table class="table table-bordered" id="table" width="100%" cellspacing="0">
			                  <thead>
			                    <tr>
								  <th>Acciones</th>
								  <th>Nombres</th>
								  <th>Fecha</th>
								  <th>Procedimientos</th>
								  <th>Cirujano</th>
								  <th>Clinica</th>
								  <th>Seguidores</th>
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


			          @include('citas.surgeries.store')
					  @include('citas.surgeries.view')
					  @include('citas.surgeries.edit')


			        </div>
			        <!-- /.container-fluid -->

		      </div>
		      <!-- End of Main Content -->

			 	 <div id="slide">

					<div class="side-panel-container">


						<div id="content">
							@include('ficha_paciente')
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
				list();
				update();

				$("#collapse_Citas").addClass("show");
				$("#nav_surgeries, #modulo_Citas").addClass("active");

				verifyPersmisos(id_user, tokens, "citys");

				GetUsersTasksclient2(".getUsers")
				GetAsesorasValoracion("#id_asesora_valoracion-filter")



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

			function update(){
				enviarFormularioPut("#form-update", 'api/surgeries', '#cuadro4', false, "#avatar-edit");
			}

			function store(){
				enviarFormulario("#store", 'api/surgeries', '#cuadro2');
			}

			$("#date_init, #date_finish").change(function (e) {
				list();
			});

			$("#id_asesora_valoracion-filter").change(function (e) {
				list();
			});


			function list(cuadro) {
				var data = {
					"id_user": id_user,
					"token"  : tokens,
				};

				const adviser = $("#id_asesora_valoracion-filter").val()

				const date_init   = $("#date_init").val()
				const date_finish = $("#date_finish").val()


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
						 "url":''+url+'/api/surgeries',
						 "data": {
							"rol"         : name_rol,
							"id_user"     : id_user,
							"token"       : tokens,
							"adviser" : adviser,
							"date_init"   : date_init,
							"date_finish" : date_finish
						},
						"dataSrc":""
					},
					"columns":[
						{"data": null,
							render : function(data, type, row) {
								var botones = "";
								if(consultar == 1)
									//botones += "<span class='consultar btn btn-sm btn-info waves-effect' data-toggle='tooltip' title='Consultar'><i class='fa fa-eye' style='margin-bottom:5px'></i></span> ";
								if(actualizar == 1)
									botones += "<span class='editar btn btn-sm btn-primary waves-effect' data-toggle='tooltip' title='Editar'><i class='fas fa-edit' style='margin-bottom:5px'></i></span> ";
								if(data.status == 1 && actualizar == 1)
									botones += "<span class='desactivar btn btn-sm btn-warning waves-effect' data-toggle='tooltip' title='Desactivar'><i class='fa fa-unlock' style='margin-bottom:5px'></i></span> ";
								else if(data.status == 2 && actualizar == 1)
									botones += "<span class='activar btn btn-sm btn-warning waves-effect' data-toggle='tooltip' title='Activar'><i class='fa fa-lock' style='margin-bottom:5px'></i></span> ";
								if(borrar == 1)
									botones += "<span class='eliminar btn btn-sm btn-danger waves-effect' data-toggle='tooltip' title='Eliminar'><i class='fas fa-trash-alt' style='margin-bottom:5px'></i></span>";
								return botones;
							}
						},
						{"data":"nombres",
							render : function(data, type, row) {

								if(row.surgerie_rental == 1){
									return row.name_paciente
								}else{
									return "<a href='javascript:void(0)' onclick='ViewClient("+row.id_cliente+")'>"+data+"</a>"
								}

							}
						},
						{"data": "fecha"},
						{"data": null,
							render : function(data, type, row) {

								var string = ""
								$.map(row.procedures, function (item, key) {
									string += item.name+", "
								});
								return string
							}
						},
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



						{"data": "status_surgeries",
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
				.search("").draw()


				ver("#table tbody", table)
				edit("#table tbody", table)
				activar("#table tbody", table)
				desactivar("#table tbody", table)
				eliminar("#table tbody", table)




				if(id_rol == 21){
					$(".dt-buttons").remove()
				}




			}



			function nuevo() {
				$("#alertas").css("display", "none");
				$("#store")[0].reset();

				GetClinic2("#clinic-store")

				SelectClinic("#paciente-store", "#clinic-store")


				$("#paciente-store option").remove();
				$('#summernote').summernote("reset");

				$("#paciente_alquiler").css("display", "none")
				$("#paciente").css("display", "block")



				getPacientes("#paciente-store")
				cuadros("#cuadro1", "#cuadro2");
			}



			function GetClinic2(select, select_default = false){
				var url=document.getElementById('ruta').value;
				$.ajax({
					url:''+url+'/api/clinic',
					type:'GET',
					data: {
						"id_user": id_user,
						"token"  : tokens,
					},
					dataType:'JSON',
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
						value: "",
						text : "Seleccione"
					}));
					$.each(data, function(i, item){
						if (item.status == 1) {
						$(select).append($('<option>',
						{
							value: item.id_clinic,
							text : item.nombre,
							selected: select_default == item.id_clinic ? true : false
						}));
						}
					});

					}
				});
			}


			$("#surgerie_rental").change(function (e) {

				if($(this).prop("checked") == true){
					$("#paciente_alquiler").css("display", "block")
					$("#name_paciente-store").focus()
					$("#paciente").css("display", "none")
				}
				else if($(this).prop("checked") == false){
					$("#paciente_alquiler").css("display", "none")
					$("#paciente").css("display", "block")
				}

			});

			/* ------------------------------------------------------------------------------- */
			/*
				Funcion que muestra el cuadro3 para la consulta del banco.
			*/
			function ver(tbody, table){
				$(tbody).on("click", "span.consultar", function(){
					$("#alertas").css("display", "none");
					var data = table.row( $(this).parents("tr") ).data();

					getPacientes("#paciente-view", data.id_cliente)
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

				//	getPacientes("#paciente-edit", data.id_cliente)


					if(data.surgerie_rental == 1){
						data.nombres =  data.name_paciente
					}

					$("#surgerie_rental_edit").prop("checked", data.surgerie_rental ? true : false)



					$("#name_client-edit").val(data.nombres)

					GetClinic2("#clinic-edit")


				//	SelectClinic("#paciente-edit", "#clinic-edit")


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




					$("#amount-edit").val(data.amount)
					var html = ""
					$.map(data.aditionals, function (item, key) {
						html += "<div class='col-md-2'></div>"
						html += "<div class='col-md-6'><input type='text' value='"+item.description+"' class='form-control' name='aditional[]' placeholder='Descripcion del adicional'></div>"
						html += "<div class='col-md-4'><input type='text' value='"+item.price_aditional+"'  class='form-control monto_formato_decimales' name='price_aditional[]' placeholder='Precio del adicional'></div>"
						html += "<br><br>"
					});


					$("#additional_edit").html(html)







					cuadros('#cuadro1', '#cuadro4');
					$("#id_edit").val(data.id_surgeries)
					cuadros('#cuadro1', '#cuadro4');
				});
			}



			function GetClinic2(select){

				console.log("adasd")
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
						value: "",
						text : "Seleccione"
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








			function ViewClient(id_paciente){
				var url=document.getElementById('ruta').value;
				$.ajax({
					url:''+url+'/api/clients/'+id_paciente,
					type:'GET',
					dataType:'JSON',
					data: {
						"id_user": id_user,
						"token"  : tokens,
					},

					beforeSend: function(){

					},
					error: function (data) {
					},
					success: function(data){

						$("#slide").toggleClass("show")
						$(".side-panel-container").toggleClass("slide-show")


						GetCity("#city_edit");
						GetClinic("#city_edit", "#clinic_edit")
						GetAsesorasbyBusisnessLine("#linea-negocio-edit", "#asesora-edit");
						GetBusinessLine("#linea-negocio-edit");


						Children("#children_edit", "#number_children_edit")
						Surgery("#surgery_edit", "#previous_surgery_edit")
						Disease("#disease_edit", "#major_disease_edit")
						Medication("#medication_edit", "#drink_medication_edit")
						Allergic("#allergic_edit ", "#allergic_medication_edit")


						GetAsesorasValoracion("#id_asesora_valoracion-edit")




						$("#id_asesora_valoracion-edit").val(data.id_asesora_valoracion)
						$("#code-edit").text(data.code_client)

						$("#state_edit").val(data.state).trigger("change")

						$("#nombre_edit").val(data.nombres)
						$("#apellido_edit").val("")
						$("#identificacion_edit").val(data.identificacion)
						$("#telefono_edit").val(data.telefono)
						$("#email_edit").val(data.email)
						$("#direccion_edit").val(data.direccion)
						$("#fecha_nacimiento_edit").val(data.fecha_nacimiento)

						$("#origen_edit").val(data.origen)
						$("#forma_pago_edit").val(data.forma_pago)


						$("#city_edit").val(data.city)
						$("#city_edit").trigger("change")

						$("#clinic_edit").val(data.clinic)

						$("#year_edit").val(calcularEdad(data.fecha_nacimiento))

						$("#identificacion_verify_edit").prop("checked", data.identificacion_verify ? true : false)

						$("#name_surgery_edit").val(data.name_surgery)
						$("#current_size_edit").val(data.current_size)
						$("#desired_size_edit").val(data.desired_size)
						$("#implant_volumem_edit").val(data.implant_volumem)



						$("#facebook_edit").val(data.facebook)
						$("#instagram_edit").val(data.instagram)
						$("#twitter_edit").val(data.twitter)
						$("#youtube_edit").val(data.youtube)

						$("#photos_google_edit").val(data.photos_google)



						$("#prp_edit").val(data.prp)
						$("#prp_edit").trigger("change");


						$("#eps_edit").val(data.eps)
						$("#height_edit").val(data.height)
						$("#weight_edit").val(data.weight)

						$("#children_edit").prop("checked", data.children ? true : false)
						$("#smoke_edit").prop("checked", data.smoke ? true : false)
						$("#alcohol_edit").prop("checked", data.alcohol ? true : false)
						$("#surgery_edit").prop("checked", data.surgery ? true : false)
						$("#disease_edit").prop("checked", data.disease ? true : false)
						$("#medication_edit").prop("checked", data.medication ? true : false)
						$("#allergic_edit").prop("checked", data.allergic ? true : false)

						$("#number_children_edit").val(data.number_children).prop("readonly", data.children ? false : true)
						$("#previous_surgery_edit").val(data.previous_surgery).prop("readonly", data.surgery ? false : true)
						$("#major_disease_edit").val(data.major_disease).prop("readonly", data.disease ? false : true)
						$("#drink_medication_edit").val(data.drink_medication).prop("readonly", data.medication ? false : true)
						$("#allergic_medication_edit").val(data.allergic_medication).prop("readonly", data.allergic ? false : true)


						$("#dependent_independent_edit").val(data.dependent_independent)
						$("#type_contract_edit").val(data.type_contract)
						$("#antiquity_edit").val(data.antiquity)
						$("#average_monthly_income_edit").val(data.average_monthly_income)
						$("#previous_credits_edit").val(data.previous_credits)
						$("#reported_edit").val(data.reported)
						$("#bank_account_edit").val(data.bank_account)

						$("#properties_edit").prop("checked", data.properties ? true : false)
						$("#vehicle_edit").prop("checked", data.vehicle ? true : false)


						$("#linea-negocio-edit").val(data.id_line)
						$("#linea-negocio-edit").trigger("change");

						$("#asesora-edit").val(data.id_user_asesora)


						SubmitComment(data.id_cliente, "api/comments/clients", "#comments_edit", "#add-comments", "#summernote_edit")




						$("#id_edit").val(data.id_cliente)



						var url=document.getElementById('ruta').value;
						var html = "";
						$.map(data.logs, function (item, key) {
							html += '<div class="col-md-12" style="margin-bottom: 15px">'
								html += '<div class="row">'
									html += '<div class="col-md-2">'
										html += "<img class='rounded' src='"+url+"/img/usuarios/profile/"+item.img_profile+"' style='height: 4rem;width: 4rem; margin: 1%; border-radius: 50%!important;' title='"+item.name_follower+" "+item.last_name_follower+"'>"

									html += '</div>'
									html += '<div class="col-md-10" style="background: #eee;padding: 2%;border-radius: 17px;">'
										html += '<div>'+item.event+'</div>'

										html += '<div><b>'+item.name_user+" "+item.last_name_user+'</b> <span style="float: right">'+item.create_at+'</span></div>'


									html += '</div>'
								html += '</div>'
							html += '</div>'

						});

						$("#logs_edit").html(html)



						var html = ""
						var count_phone = 0
						$.map(data.phones, function (item, key) {
							count_phone++
							html += '<div class="col-md-10 phone_add_edit_'+count_phone+'">'
								html += '<div class="form-group">'
									html += '<label for=""><b>Telefono</b></label>'
									html += '<input type="number" name="telefono2[]" class="form-control form-control-user"  placeholder="PJ. 315 2077862" value="'+item.phone+'">'
								html += '</div>'
							html += '</div>'


							html += '<div class="col-md-2 phone_add_edit_'+count_phone+'"">'
							html += '<br>'
								html += '<button type="button" id="add_phone" onclick="deletePhoneEdit('+count_phone+')" class="btn btn-danger"><i class="fa fa-trash"></i></button>'
							html += '</div>'


						});

						$("#phone_add_content_edit").html(html)




						var html = ""
						var count_email = 0
						$.map(data.emails, function (item, key) {
							count_email++
							html += '<div class="col-md-10 email_add_edit_'+count_email+'">'
								html += '<div class="form-group">'
									html += '<label for=""><b>E-mail</b></label>'
									html += '<input type="email" name="email2[]" class="form-control form-control-user"  value="'+item.email+'">'
								html += '</div>'
							html += '</div>'


							html += '<div class="col-md-2 email_add_edit_'+count_email+'"">'
							html += '<br>'
								html += '<button type="button" id="add_email" onclick="deleteemailEdit('+count_email+')" class="btn btn-danger"><i class="fa fa-trash"></i></button>'
							html += '</div>'


						});

						$("#email_add_content_edit").html(html)





						$('#summernote_edit').summernote('reset');
						$('#summernote_edit').summernote({
							'height' : 200
						});
						var url=document.getElementById('ruta').value;
						var html = "";




					//	GetComments("#comments_edit", data.id_cliente)

						GetCommentsClients("#comments_edit_client", data.id_cliente)

						valuations("#btrx_tab4_edit", "#iframeValuationsEdit", data)
						preanestesias("#btrx_tab5_edit", "#iframepPreanestesiaEdit", data)
						surgeries("#btrx_tab6_edit", "#iframepCirugiaEdit", data)
						revisiones("#btrx_tab7_edit", "#iframepRevisionEdit", data)
						tasks("#btrx_tab8_edit", "#iframepTracingEdit", data)
					}
				});
			}









			function GetClinic(city, select){
				$(city).unbind().change(function (e) {
					GetClinicByCity(select, $(this).val())
				});
			}

			function Children(checkbox, input){
				$(checkbox).change(function (e) {
					if ($(checkbox).is(':checked')){
						$(input).removeAttr("readonly").focus();
					}else{
						$(input).val("0").attr("readonly", "readonly");
					}
				});
			}



			function Surgery(checkbox, input){
				$(checkbox).change(function (e) {
					if ($(checkbox).is(':checked')){
						$(input).removeAttr("readonly").focus();
					}else{
						$(input).val("0").attr("readonly", "readonly");
					}
				});
			}



			function Disease(checkbox, input){
				$(checkbox).change(function (e) {
					if ($(checkbox).is(':checked')){
						$(input).removeAttr("readonly").focus();
					}else{
						$(input).val("0").attr("readonly", "readonly");
					}
				});
			}


			function Medication(checkbox, input){
				$(checkbox).change(function (e) {
					if ($(checkbox).is(':checked')){
						$(input).removeAttr("readonly").focus();
					}else{
						$(input).val("0").attr("readonly", "readonly");
					}
				});
			}

			function Allergic(checkbox, input){
				$(checkbox).change(function (e) {
					if ($(checkbox).is(':checked')){
						$(input).removeAttr("readonly").focus();
					}else{
						$(input).val("0").attr("readonly", "readonly");
					}
				});
			}





			function tasks(tab, iframe, data){
				$(tab).click(function (e) {
					var url = document.getElementById('ruta').value+"/clients/tasks/"+data.id_cliente+"/1"
					$(iframe).attr('src', url);

				});
			}



			function revisiones(tab, iframe, data){
				$(tab).click(function (e) {
					var url = document.getElementById('ruta').value+"/revision-appointment/client/"+data.id_cliente+"/1"
					$(iframe).attr('src', url);

				});
			}


			function surgeries(tab, iframe, data){
				$(tab).click(function (e) {
					var url = document.getElementById('ruta').value+"/surgeries/client/"+data.id_cliente+"/1"
					$(iframe).attr('src', url);

				});
			}


			function valuations(tab, iframe, data){
				$(tab).click(function (e) {
					var url = document.getElementById('ruta').value+"/valuations/client/"+data.id_cliente+"/1"
					$(iframe).attr('src', url);

				});
			}


			function preanestesias(tab, iframe, data){
				$(tab).click(function (e) {
					var url = document.getElementById('ruta').value+"/preanesthesia/client/"+data.id_cliente+"/1"
					$(iframe).attr('src', url);

				});
			}




			function GetCommentsClients(comment_content, id_client){
				var url=document.getElementById('ruta').value;
				$.ajax({
					url:''+url+'/api/clients/comments/'+id_client,
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






			$("#additional").html("")
			$("#add-additional").click(function (e) {

				var html = ""

				html += "<div class='col-md-6'><input type='text' class='form-control' name='aditional[]' placeholder='Descripcion del adicional'></div>"
				html += "<div class='col-md-6'><input type='number' class='form-control' onkeydown='noPuntoComa( event )' name='price_aditional[]' placeholder='Precio del adicional'></div>"
				html += "<br><br>"


				$("#additional").append(html)


				$(".monto_formato_decimales").change(function() {

					if($(this).val() != ""){
						$(this).val(number_format($(this).val(), 2));
					}
				});


                function noPuntoComa( event ) {

                    var e = event || window.event;
                    var key = e.keyCode || e.which;
                    console.log(key)
                    if ( key === 110 || key === 190 || key === 188 || key === 222 || key === 229  || key === 50) {

                        e.preventDefault();
                    }
                    }

			});



			$("#add-additional_edit").click(function (e) {

				var html = ""

				html += "<div class='col-md-2'></div>"
				html += "<div class='col-md-6'><input type='text' class='form-control' name='aditional[]' placeholder='Descripcion del adicional'></div>"
				html += "<div class='col-md-4'><input type='number' class='form-control' onkeydown='noPuntoComa( event )' name='price_aditional[]' placeholder='Precio del adicional'></div>"
				html += "<br><br>"


				$("#additional_edit").append(html)


				$(".monto_formato_decimales").change(function() {

					if($(this).val() != ""){
						$(this).val(number_format($(this).val(), 2));
					}
				});


                function noPuntoComa( event ) {

                    var e = event || window.event;
                    var key = e.keyCode || e.which;
                    console.log(key)
                    if ( key === 110 || key === 190 || key === 188 || key === 222 || key === 229  || key === 50) {

                        e.preventDefault();
                    }
                    }

			});





			function closeSlide(){
				$("#slide").removeClass("show")
				$(".side-panel-container").removeClass("slide-show")
			}








            function noPuntoComa( event ) {

                var e = event || window.event;
                var key = e.keyCode || e.which;

                if ( key === 110 || key === 190 || key === 188 || key === 222 || key === 229  || key === 50) {

                    e.preventDefault();
                }
                }


		</script>




	@endsection


