@extends('layouts.app')


@section('CustomCss')

<style>
	.kv-avatar .krajee-default.file-preview-frame,
	.kv-avatar .krajee-default.file-preview-frame:hover {
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



	#slide {
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

	#slide.show {
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

	.slide-show {
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
		background: rgba(47, 198, 246, .95);
		border-top-left-radius: 19px;
		border-bottom-left-radius: 19px;
		white-space: nowrap;
		overflow: hidden;
		transition: top .3s;
		box-shadow: inset -6px 0 8px -10px rgba(0, 0, 0, 0.95);
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


	.side-panel-close-btn-inner:after,
	.side-panel-close-btn-inner:before {
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


	.side-panel-close-btn-inner:after,
	.side-panel-close-btn-inner:before {
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
				<h1 class="h3 mb-2 text-gray-800">Solicitudes de Credito</h1>

				<div id="alertas"></div>
				<input type="hidden" class="id_user">
				<input type="hidden" class="token">

				<!-- DataTales Example -->
				<div class="card shadow mb-4" id="cuadro1">
					<div class="card-header py-3">
						<h6 class="m-0 font-weight-bold text-primary">Gestion de Solicitudes de Credito</h6>
					</div>
					<div class="card-body">

						<div class="row">

							<div class="col-md-3">
								<div class="form-group">
									<label for=""><b>Filtrar por : Tipo</b></label>
									<select name="type" id="type-filter" class="form-control disabled">
										<option value="0">Seleccione</option>
										<option value="Calificacion">Calificacion de Google</option>
										<option value="Testimonio">Testimonio</option>
									</select>
								</div>
							</div>

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

						<div class="table-responsive">
							<table class="table table-bordered" id="table" width="100%" cellspacing="0">
								<thead>
									<tr>
										<th>Acciones</th>
										<th>Cliente</th>
										<th>Monto Solicitado</th>
										<th>Cuotas Mensuales</th>
										<th>Plazos</th>
										<th>Estatus</th>
										<th>Fecha de registro</th>
									</tr>
								</thead>
								<tbody></tbody>
							</table>
						</div>
					</div>
				</div>

				@include('financing.edit')

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
	$(document).ready(function() {
		store();
		list();
		update();

		$("#collapse_Tareas").addClass("show");
		$("#nav_califications, #modulo_Tareas").addClass("active");

		verifyPersmisos(id_user, tokens, "citys");

		GetAsesorasValoracion("#id_asesora_valoracion-filter")

	});


	$("#date_init, #date_finish, #type-filter").change(function(e) {
		list();
	});


	function update() {
		enviarFormularioPut("#form-update", 'api/clients/request/financing', '#cuadro4', false, "#avatar-edit");
	}

	function store() {
		enviarFormulario("#store", 'api/califications/advisers', '#cuadro2');
	}

	$("#id_asesora_valoracion-filter").change(function(e) {
		list();
	});


	function list(cuadro) {
		var data = {
			"id_user": id_user,
			"token": tokens,
		};

		var adviser = $("#id_asesora_valoracion-filter").val()
		var type = $("#type-filter").val()

		const date_init = $("#date_init").val()
		const date_finish = $("#date_finish").val()

		$("#div-input-edit").css("display", "none")
		$('#table tbody').off('click');
		var url = document.getElementById('ruta').value;
		cuadros(cuadro, "#cuadro1");

		var table = $("#table").DataTable({
			"destroy": true,

			"stateSave": true,
			"serverSide": false,
			"ajax": {
				"method": "GET",
				"url": '' + url + '/api/clients/request/financing',
				"data": {
					"rol": name_rol,
					"id_user": id_user,
					"token": tokens,
					"adviser": adviser,
					"type": type,
					"date_init": date_init,
					"date_finish": date_finish
				},
				"dataSrc": ""
			},
			"columns": [{
					"data": null,
					render: function(data, type, row) {
						var botones = "";
						if (consultar == 1)
							//botones += "<span class='consultar btn btn-sm btn-info waves-effect' data-toggle='tooltip' title='Consultar'><i class='fa fa-eye' style='margin-bottom:5px'></i></span> ";
							if (actualizar == 1)
								botones += "<span class='editar btn btn-sm btn-primary waves-effect' data-toggle='tooltip' title='Editar'><i class='fas fa-edit' style='margin-bottom:5px'></i></span> ";
						if (data.status == 1 && actualizar == 1)
							botones += "<span class='desactivar btn btn-sm btn-warning waves-effect' data-toggle='tooltip' title='Desactivar'><i class='fa fa-unlock' style='margin-bottom:5px'></i></span> ";
						else if (data.status == 2 && actualizar == 1)
							botones += "<span class='activar btn btn-sm btn-warning waves-effect' data-toggle='tooltip' title='Activar'><i class='fa fa-lock' style='margin-bottom:5px'></i></span> ";
						if (borrar == 1)
							//botones += "<span class='eliminar btn btn-sm btn-danger waves-effect' data-toggle='tooltip' title='Eliminar'><i class='fas fa-trash-alt' style='margin-bottom:5px'></i></span>";
							return botones;
					}
				},
				{
					"data": "nombres"
				},
				{
					"data": "required_amount",
					render: (data, type, row) => {
						return number_format(data, 2)
					}
				},
				{
					"data": "monthly_fee",
					render: (data, type, row) => {
						return number_format(data, 2)
					}
				},
				{
					"data": "period"
				},
				{
					"data": "status"
				},
				{
					"data": "created_at"
				}

			],
			"language": idioma_espanol,
			"dom": 'Bfrtip',
			"responsive": true,
			"buttons": [
				'copy', 'csv', 'excel', 'pdf', 'print'
			]
		});

		table
			.search("").draw()

		edit("#table tbody", table)
		activar("#table tbody", table)
		desactivar("#table tbody", table)
		eliminar("#table tbody", table)


		if (id_rol == 21) {
			$(".dt-buttons").remove()
		}


	}

	function nuevo() {
		$("#alertas").css("display", "none");
		$("#store")[0].reset();



		cuadros("#cuadro1", "#cuadro2");
	}

	/* ------------------------------------------------------------------------------- */
	/*
		Funcion que muestra el cuadro3 para la consulta del banco.
	*/

	function edit(tbody, table) {
		$(tbody).on("click", "span.editar", function() {
			$("#alertas").css("display", "none");
			var data = table.row($(this).parents("tr")).data();
			$("#client").val(data.nombres).attr("readonly", "readonly")
			$("#required_amount").val(data.required_amount)
			$("#monthly_fee").val(data.monthly_fee).attr("readonly", "readonly")
			$("#dependent_independent").val(data.dependent_independent)
			$("#have_initial").val(data.have_initial)
			$("#reported").val(data.reported)
			if (data.photo_recived) {
				$("#load_img").attr('src', `img/credit/comprobantes/${data.photo_recived}`)
			} else {
				$("#load_img").attr('src', ``)
			}
			$("#pay_to_study_credit").prop("checked", data.pay_to_study_credit ? true : false)
			$("#payment_method").val(data.payment_method)
			$("#date_pay_study_credit_edit").val(data.date_pay)

			$("#working_letter").prop("checked", data.working_letter ? true : false)
			$("#payment_stubs").prop("checked", data.payment_stubs ? true : false)
			$("#copy_of_id").prop("checked", data.copy_of_id ? true : false)
			$("#bank_statements").prop("checked", data.bank_statements ? true : false)
			$("#co_debtor").prop("checked", data.co_debtor ? true : false)
			$("#property_tradition").prop("checked", data.property_tradition ? true : false)
			$("#license_plate_copy").prop("checked", data.license_plate_copy ? true : false)

			$("#status").val(data.status)

			$("#period").val(data.period).trigger("change")

			$("#id_cliente").val(data.id_client)
			$("#id_edit").val(data.id)
			cuadros('#cuadro1', '#cuadro4');
		});
	}

	function SubmitComment(id, api, table, btn, summer) {

		$(btn).unbind().click(function(e) {

			var html = ""

			html += '<div class="col-md-12" style="margin-bottom: 15px">'
			html += '<div class="row">'
			html += '<div class="col-md-2">'
			html += '</div>'
			html += '<div class="col-md-10" style="background: #eee;padding: 2%;border-radius: 17px;">'
			html += '<div>' + $(summer).val() + '</div>'

			html += '<div><b></b> <span style="float: right">Ahora Mismo</span></div>'

			html += '</div>'
			html += '</div>'
			html += '</div>'

			$(table).append(html)


			var url = document.getElementById('ruta').value;

			$.ajax({
				url: '' + url + "/" + api,
				type: 'POST',
				data: {
					"id_user": id_user,
					"token": tokens,
					"id": id,
					"comment": $(summer).val(),

				},
				dataType: 'JSON',
				beforeSend: function() {
					$(btn).text("espere...").attr("disabled", "disabled")
				},
				error: function(data) {
					$(btn).text("Comentar").removeAttr("disabled")
				},
				success: function(data) {
					$(btn).text("Comentar").removeAttr("disabled")
					$(summer).summernote("reset");
				}
			});

		});

	}

	/* ------------------------------------------------------------------------------- */
	/*
		Funcion que capta y envia los datos a desactivar
	*/
	function desactivar(tbody, table) {
		$(tbody).on("click", "span.desactivar", function() {
			var data = table.row($(this).parents("tr")).data();
			statusConfirmacion('api/tasks/status/' + data.id_clients_tasks + "/" + 2, "¿Esta seguro de desactivar el registro?", 'desactivar');
		});
	}
	/* ------------------------------------------------------------------------------- */

	/* ------------------------------------------------------------------------------- */
	/*
		Funcion que capta y envia los datos a desactivar
	*/
	function activar(tbody, table) {
		$(tbody).on("click", "span.activar", function() {
			var data = table.row($(this).parents("tr")).data();
			statusConfirmacion('api/tasks/status/' + data.id_clients_tasks + "/" + 1, "¿Esta seguro de desactivar el registro?", 'activar');
		});
	}
	/* ------------------------------------------------------------------------------- */

	function eliminar(tbody, table) {
		$(tbody).on("click", "span.eliminar", function() {
			var data = table.row($(this).parents("tr")).data();
			statusConfirmacion('api/tasks/status/' + data.id_clients_tasks + "/" + 0, "¿Esta seguro de eliminar el registro?", 'Eliminar');
		});
	}

	function ViewClient(id_paciente) {
		var url = document.getElementById('ruta').value;
		$.ajax({
			url: '' + url + '/api/clients/' + id_paciente,
			type: 'GET',
			dataType: 'JSON',
			data: {
				"id_user": id_user,
				"token": tokens,
			},

			beforeSend: function() {

			},
			error: function(data) {},
			success: function(data) {

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


				$("#id_edit").val(data.id_cliente)

				var url = document.getElementById('ruta').value;
				var html = "";
				$.map(data.logs, function(item, key) {
					html += '<div class="col-md-12" style="margin-bottom: 15px">'
					html += '<div class="row">'
					html += '<div class="col-md-2">'
					html += "<img class='rounded' src='" + url + "/img/usuarios/profile/" + item.img_profile + "' style='height: 4rem;width: 4rem; margin: 1%; border-radius: 50%!important;' title='" + item.name_follower + " " + item.last_name_follower + "'>"

					html += '</div>'
					html += '<div class="col-md-10" style="background: #eee;padding: 2%;border-radius: 17px;">'
					html += '<div>' + item.event + '</div>'

					html += '<div><b>' + item.name_user + " " + item.last_name_user + '</b> <span style="float: right">' + item.create_at + '</span></div>'


					html += '</div>'
					html += '</div>'
					html += '</div>'

				});

				$("#logs_edit").html(html)

				var html = ""
				var count_phone = 0
				$.map(data.phones, function(item, key) {
					count_phone++
					html += '<div class="col-md-10 phone_add_edit_' + count_phone + '">'
					html += '<div class="form-group">'
					html += '<label for=""><b>Telefono</b></label>'
					html += '<input type="number" name="telefono2[]" class="form-control form-control-user"  placeholder="PJ. 315 2077862" value="' + item.phone + '">'
					html += '</div>'
					html += '</div>'


					html += '<div class="col-md-2 phone_add_edit_' + count_phone + '"">'
					html += '<br>'
					html += '<button type="button" id="add_phone" onclick="deletePhoneEdit(' + count_phone + ')" class="btn btn-danger"><i class="fa fa-trash"></i></button>'
					html += '</div>'


				});

				$("#phone_add_content_edit").html(html)

				var html = ""
				var count_email = 0
				$.map(data.emails, function(item, key) {
					count_email++
					html += '<div class="col-md-10 email_add_edit_' + count_email + '">'
					html += '<div class="form-group">'
					html += '<label for=""><b>E-mail</b></label>'
					html += '<input type="email" name="email2[]" class="form-control form-control-user"  value="' + item.email + '">'
					html += '</div>'
					html += '</div>'


					html += '<div class="col-md-2 email_add_edit_' + count_email + '"">'
					html += '<br>'
					html += '<button type="button" id="add_email" onclick="deleteemailEdit(' + count_email + ')" class="btn btn-danger"><i class="fa fa-trash"></i></button>'
					html += '</div>'
				});

				$("#email_add_content_edit").html(html)

				$('#summernote_edit').summernote('reset');
				$('#summernote_edit').summernote({
					'height': 200
				});
				var url = document.getElementById('ruta').value;
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

	function GetClinic(city, select) {
		$(city).unbind().change(function(e) {
			GetClinicByCity(select, $(this).val())
		});
	}

	function Children(checkbox, input) {
		$(checkbox).change(function(e) {
			if ($(checkbox).is(':checked')) {
				$(input).removeAttr("readonly").focus();
			} else {
				$(input).val("0").attr("readonly", "readonly");
			}
		});
	}

	function Surgery(checkbox, input) {
		$(checkbox).change(function(e) {
			if ($(checkbox).is(':checked')) {
				$(input).removeAttr("readonly").focus();
			} else {
				$(input).val("0").attr("readonly", "readonly");
			}
		});
	}

	function Disease(checkbox, input) {
		$(checkbox).change(function(e) {
			if ($(checkbox).is(':checked')) {
				$(input).removeAttr("readonly").focus();
			} else {
				$(input).val("0").attr("readonly", "readonly");
			}
		});
	}


	function Medication(checkbox, input) {
		$(checkbox).change(function(e) {
			if ($(checkbox).is(':checked')) {
				$(input).removeAttr("readonly").focus();
			} else {
				$(input).val("0").attr("readonly", "readonly");
			}
		});
	}

	function Allergic(checkbox, input) {
		$(checkbox).change(function(e) {
			if ($(checkbox).is(':checked')) {
				$(input).removeAttr("readonly").focus();
			} else {
				$(input).val("0").attr("readonly", "readonly");
			}
		});
	}

	function tasks(tab, iframe, data) {
		$(tab).click(function(e) {
			var url = document.getElementById('ruta').value + "/clients/tasks/" + data.id_cliente + "/1"
			$(iframe).attr('src', url);

		});
	}

	function revisiones(tab, iframe, data) {
		$(tab).click(function(e) {
			var url = document.getElementById('ruta').value + "/revision-appointment/client/" + data.id_cliente + "/1"
			$(iframe).attr('src', url);

		});
	}

	function surgeries(tab, iframe, data) {
		$(tab).click(function(e) {
			var url = document.getElementById('ruta').value + "/surgeries/client/" + data.id_cliente + "/1"
			$(iframe).attr('src', url);

		});
	}

	function valuations(tab, iframe, data) {
		$(tab).click(function(e) {
			var url = document.getElementById('ruta').value + "/valuations/client/" + data.id_cliente + "/1"
			$(iframe).attr('src', url);

		});
	}

	function preanestesias(tab, iframe, data) {
		$(tab).click(function(e) {
			var url = document.getElementById('ruta').value + "/preanesthesia/client/" + data.id_cliente + "/1"
			$(iframe).attr('src', url);

		});
	}

	function GetCommentsClients(comment_content, id_client) {
		var url = document.getElementById('ruta').value;
		$.ajax({
			url: '' + url + '/api/clients/comments/' + id_client,
			type: 'GET',
			dataType: 'JSON',

			beforeSend: function() {

			},
			error: function(data) {},
			success: function(result) {

				var url = document.getElementById('ruta').value;
				var html = "";

				$.map(result, function(item, key) {
					html += '<div class="col-md-12" style="margin-bottom: 15px">'
					html += '<div class="row">'
					html += '<div class="col-md-2">'
					html += "<img class='rounded' src='" + url + "/img/usuarios/profile/" + item.img_profile + "' style='height: 4rem;width: 4rem; margin: 1%; border-radius: 50%!important;' title='" + item.name_follower + " " + item.last_name_follower + "'>"

					html += '</div>'
					html += '<div class="col-md-10" style="background: #eee;padding: 2%;border-radius: 17px;">'
					html += '<div>' + item.comment + '</div>'

					html += '<div><b>' + item.name_user + " " + item.last_name_user + '</b> <span style="float: right">' + item.create_at + '</span></div>'


					html += '</div>'
					html += '</div>'
					html += '</div>'

				});


				$(comment_content).html(html)
			}
		});
	}

	function closeSlide() {
		$("#slide").removeClass("show")
		$(".side-panel-container").removeClass("slide-show")
	}

	function calcular() {

		var monto = inNum(document.getElementById("required_amount").value)
		var cuotas = document.getElementById("period").value
		var tasa = 2.65584

		var periodo = "mensual";
		var tasa_tipo = "mensual";

		var items = getAmortizacion(monto, tasa, cuotas, periodo, tasa_tipo);


		if (parseInt(cuotas) > 3000) {
			alert("Ha indicado una cantidad excesiva de cuotas, porfavor reduzcala a menos de 3000");
			return;
		}

		var div1 = document.getElementById("div-valor-cuota");

		valor = setMoneda(items[0][3]);

		$("#monthly_fee").val(valor)

		var tbody = document.getElementById("tbody_1");
		tbody.innerHTML = "";
		for (i = 0; i < items.length; i++) {
			item = items[i];
			tr = document.createElement("tr");
			//console.log(item)
			for (e = 0; e < item.length; e++) {
				value = item[e];

				if (e > 0) {
					value = setMoneda(value);
				}
				td = document.createElement("td");


				if (e == 0) {
					var html = `<input class='form-contorl' name="number[]" readonly value='${value}'>`
				}

				if (e == 1) {
					var html = `<input class='form-contorl' name="interest[]" readonly value='${value}'>`
				}

				if (e == 2) {
					var html = `<input class='form-contorl' name="credit_to_capital[]" readonly value='${value}'>`
				}

				if (e == 3) {
					var html = `<input class='form-contorl' name="monthly_fees[]" readonly value='${value}'>`
				}

				if (e == 4) {
					var html = `<input class='form-contorl' name="balance[]" readonly value='${value}'>`
				}

				textCell = document.createTextNode(value);

				td.appendChild(textCell);
				td.innerHTML = html
				tr.appendChild(td);
			}
			tbody.appendChild(tr);
		}

	}

	function getTasa(tasa, tasa_tipo, periodo) {
		if (tasa_tipo == "ANUAL") {
			tasa = tasa / 12
		}
		tasa = tasa / 100.0
		if (periodo == "DIARIO") {
			tasa = tasa / 30.4167
		};
		if (periodo == "SEMANAL") {
			tasa = tasa / 4.34524
		};
		if (periodo == "QUINCENAL") {
			tasa = tasa / 2
		};
		if (periodo == "MENSUAL") {};
		if (periodo == "BIMESTRAL") {
			tasa = tasa * 2
		};
		if (periodo == "TRIMESTRAL") {
			tasa = tasa * 3
		};
		if (periodo == "CUATRIMESTRAL") {
			tasa = tasa * 4
		};
		if (periodo == "SEMESTRAL") {
			tasa = tasa * 6
		};
		if (periodo == "ANUAL") {
			tasa = tasa * 12
		};
		return tasa;
	}

	function getValorDeCuotaFija(monto, tasa, cuotas, periodo, tasa_tipo) {
		tasa = getTasa(tasa, tasa_tipo, periodo);
		valor = monto * ((tasa * Math.pow(1 + tasa, cuotas)) / (Math.pow(1 + tasa, cuotas) - 1));
		return valor.toFixed(2);
	}

	function getAmortizacion(monto, tasa, cuotas, periodo, tasa_tipo) {
		var valor_de_cuota = getValorDeCuotaFija(monto, tasa, cuotas, periodo, tasa_tipo);
		var saldo_al_capital = monto;
		var items = new Array();

		for (i = 0; i < cuotas; i++) {
			interes = saldo_al_capital * getTasa(tasa, tasa_tipo, periodo);
			abono_al_capital = valor_de_cuota - interes;
			saldo_al_capital -= abono_al_capital;
			numero = i + 1;

			interes = interes.toFixed(2);
			abono_al_capital = abono_al_capital.toFixed(2);
			saldo_al_capital = saldo_al_capital.toFixed(2);

			item = [numero, interes, abono_al_capital, valor_de_cuota, saldo_al_capital];
			items.push(item);
		}
		return items;
	}

	function setMoneda(num) {
		num = num.toString().replace(/\$|\,/g, '');
		if (isNaN(num)) num = "0";
		sign = (num == (num = Math.abs(num)));
		num = Math.floor(num * 100 + 0.50000000001);
		cents = num % 100;
		num = Math.floor(num / 100).toString();
		if (cents < 10) cents = "0" + cents;
		for (var i = 0; i < Math.floor((num.length - (1 + i)) / 3); i++)
			num = num.substring(0, num.length - (4 * i + 3)) + ',' + num.substring(num.length - (4 * i + 3));
		return (((sign) ? '' : '-') + '' + num + ((cents == "00") ? '' : '.' + cents));
	}

	$("#view_plan_pays").click(function(e) {
		$("#table-2").show()
	});

	$("#tab2-1").click(function(e) {
		PersonData()
	});

	$("#tab3-1").click(function(e) {
		ActivityEconomic()
	});

	$("#tab4-1").click(function(e) {
		Getbienes()
	});

	$("#tab5-1").click(function(e) {
		GetQuotas()
	});

	//personas datos personales
	function PersonData() {
		try {
			var url = document.getElementById('ruta').value;
			$.ajax({
				url: '' + url + '/api/clients/request/financing/persons/data/' + $("#id_cliente").val(),
				type: 'GET',
				dataType: 'JSON',
				beforeSend: function() {},
				error: function(data) {},
				success: function(data) {
					$("#first_name").val(data ? data.first_name : '')
					$("#second_name").val(data ? data.second_name : '')
					$("#first_last_name").val(data ? data.first_last_name : '')
					$("#second_last_name").val(data ? data.second_last_name : '')
					$("#type_document").val(data ? data.type_document : '')
					$("#number_document").val(data ? data.number_document : '')
					$("#location_expedition_document").val(data ? data.location_expedition_document : '')
					$("#date_expedition_document").val(data ? data.date_expedition_document : '')
					$("#birthdate").val(data ? data.birthdate : '')
					$("#birthplace").val(data ? data.birthplace : '')
					$("#sexo").val(data ? data.sexo : '')
					$("#state_civil").val(data ? data.state_civil : '')
					$("#level_education").val(data ? data.level_education : '')
					$("#profession").val(data ? data.profession : '')
					$("#number_person_in_charge").val(data ? data.number_person_in_charge : '')
					$("#number_children").val(data ? data.number_children : '')
					$("#housing_type").val(data ? data.housing_type : '')
					$("#name_lessor").val(data ? data.name_lessor : '')
					$("#phone_lessor").val(data ? data.phone_lessor : '')
					if (data.photo_face) {
						$("#photo_face").attr('src', `img/credit/faces/${data.photo_face}`)
					} else {
						$("#photo_face").attr('src', ``)
					}



					if (data.photo_identf) {
						$("#photo_identf").attr('src', `img/credit/cedulas/${data.photo_identf}`)
					} else {
						$("#photo_identf").attr('src', ``)
					}


                    if (data.photo_identf_rear) {
						$("#photo_identf_rear").attr('src', `img/credit/cedulas/${data.photo_identf_rear}`)
					} else {
						$("#photo_identf_rear").attr('src', ``)
					}





				}
			});
		} catch (e) {
			console.log(e)
		}
	}
	//actividad economica
	function ActivityEconomic() {
		try {
			var url = document.getElementById('ruta').value;
			$.ajax({
				url: '' + url + '/api/clients/request/financing/activity/economic/' + $("#id_cliente").val(),
				type: 'GET',
				dataType: 'JSON',
				beforeSend: function() {},
				error: function(data) {},
				success: function(data) {

					$("#adress_client").val(data ? data.adress_client : '')
					$("#city_client").val(data ? data.adress_client : '')
					$("#phone_client").val(data ? data.phone_client : '')
					$("#mobil_client").val(data ? data.mobil_client : '')
					$("#email_client").val(data ? data.email_client : '')
					$("#number_document").val(data ? data.number_document_spouse : '')
					$("#mailing").val(data ? data.mailing : '')
					$("#address_mailing").val(data ? data.address_mailing : '')
					$("#city_mailing").val(data ? data.city_mailing : '')
					$("#phone_mailing").val(data ? data.phone_mailing : '')
					$("#type_activity_client").val(data ? data.type_activity_client : '')
					$("#oter_activity_client").val(data ? data.oter_activity_client : '')
					$("#name_company_client").val(data ? data.name_company_client : '')
					$("#addres_worck_client").val(data ? data.addres_worck_client : '')
					$("#city_worck_clirnt").val(data ? data.city_worck_clirnt : '')
					$("#phone_worck_client").val(data ? data.phone_worck_client : '')
					$("#ext_phone_worck_client").val(data ? data.ext_phone_worck_client : '')
					$("#fax_phone_worck_client").val(data ? data.fax_phone_worck_client : '')
					$("#dependency_area").val(data ? data.dependency_area : '')
					$("#charge_company").val(data ? data.charge_company : '')
					$("#type_contrato").val(data ? data.type_contrato : '')
                    $("#salary").val(data ? data.salary : '')

					$("#date_vinculacion").val(data ? data.date_vinculacion : '')
				}
			});
		} catch (e) {
			console.log(e)
		}
	}
	//bienes
	function Getbienes() {
		try {
			var url = document.getElementById('ruta').value;
			$.ajax({
				url: '' + url + '/api/clients/request/financing/bienes/' + $("#id_cliente").val(),
				type: 'GET',
				dataType: 'JSON',
				beforeSend: function() {},
				error: function(data) {},
				success: function(data) {

					$("#type_apartamento").val(data ? data.type_apartamento : '')
					$("#address_bien").val(data ? data.address_bien : '')
					$("#barrio").val(data ? data.barrio : '')
					$("#city").val(data ? data.city : '')
					$("#valor_comercail").val(data ? data.valor_comercial : '')
					$("#hipoteca").val(data ? data.hipoteca : '')
					$("#afectacion_familiar").val(data ? data.afectacion_familiar : '')
					$("#type_vehicule").val(data ? data.type_vehicule : '')
					$("#placa").val(data ? data.placa : '')
					$("#transito").val(data ? data.transito : '')
					$("#marca").val(data ? data.marca : '')
					$("#modelo").val(data ? data.modelo : '')
					$("#valor_comercial").val(data ? data.valor_comercail : '')
					$("#prenda_valor").val(data ? data.prenda_valor : '')
					$("#otro_activos").val(data ? data.otro_activos : '')
                    $("#income").val(data ? data.income : '')
				}
			});
		} catch (e) {
			console.log(e)
		}
	}

	function GetQuotas() {
		try {
			var data = {
				"id_user": id_user,
				"token": tokens,
			};
			$('#table-cuota tbody').off('click');
			var url = document.getElementById('ruta').value;
			var table = $("#table-cuota").DataTable({
				"destroy": true,
				"stateSave": true,
				"serverSide": false,
				"ajax": {
					"method": "GET",
					"url": '' + url + '/api/clients/request/financing/get/quotas/' + $("#id_cliente").val(),
					"dataSrc": ""
				},
				"columns": [{
						"data": null,
						render: function(data, type, row) {

							let botones = "";
							if (consultar == 1)
								if (actualizar == 1)
									botones += "<span class='detalle btn btn-sm btn-primary waves-effect' data-toggle='tooltip' title='Ver Detalles'><i class='far fa-images' style='margin-bottom:5px'></i></span> ";
							if (row.status == 'Verificando')
								botones += "<span class='verificar btn btn-sm btn-warning waves-effect' data-toggle='tooltip' title='Verificar'><i class='fa fa-user-check' style='margin-bottom:5px'></i></span> ";
							return botones;
						}
					},
					{
						"data": "number"
					},
					{
						"data": "balance",
						render: (data, type, row) => {
							return number_format(data, 2)
						}
					},
					// {
					// 	"data": "monthly_fees"
					// 	// ,
					// 	// render: (data, type, row) => {
					// 	// 	return number_format(data, 2)
					// 	// }
					// },
					{
						"data": "date",
						render: (data, type, row)=>{
                            return row.date.split("-").reverse().join("-");
						}
					},
					{
						"data": "status"
					},
				],
				"language": idioma_espanol,
				"dom": 'Bfrtip',
				"responsive": true,
				"buttons": [
					'copy', 'csv', 'excel', 'pdf', 'print'
				]
			});
			ShowModal("#table-cuota tbody", table)
			ProcesStatus("#table-cuota tbody", table)
		} catch (e) {
			console.log(e)
		}

	}

	function ShowModal(tbody, table) {
		try {
			$(tbody).on("click", "span.detalle", function() {
				$("#modal-detail").modal("show")
				let data = table.row($(this).parents("tr")).data();
				$("#number").text(data.number ? data.number : '')
				$("#payment_method_quota").text(data.payment_method ? data.payment_method : 'sin metodo de pago')
				if (data.photo_recived && data.payment_method == 'OTHER') {
					$("#load_img_quota").attr('src', `img/credit/comprobantes/${data.photo_recived}`)
				} else {
					$("#load_img_quota").attr('src', ``)
				}
			});
		} catch (e) {
			console.log(e)
		}
	}

	function ProcesStatus(tbody, table) {
		try {
			$(tbody).on("click", "span.verificar", function() {
				let data = table.row($(this).parents("tr")).data();
				let url = document.getElementById('ruta').value;
				$.ajax({
					url: '' + url + '/api/clients/request/financing/updated/status/quota',
					type: 'POST',
					data: {
						id: data.id
					},
					async: false,
					error: function() {},
					success: function(data) {
						alert("La solicitud fue Procesada Correctamente");
						GetQuotas()
					}
				});
			});
		} catch (e) {
			console.log(e)
		}
	}
</script>

@endsection
