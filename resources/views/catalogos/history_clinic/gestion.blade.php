@extends('layouts.app')


	@section('CustomCss')




	 <!-- include summernote css/js -->
	 <link href="<?= url('/') ?>/vendor/summernote-master/dist/summernote.min.css" rel="stylesheet">
     <script src="<?= url('/') ?>/vendor/summernote-master/dist/summernote.min.js"></script>



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
			          <h1 class="h3 mb-2 text-gray-800">Pacientes</h1>

			          <div id="alertas"></div>
			          <input type="hidden" class="id_user">
			          <input type="hidden" class="token">

			          <!-- DataTales Example -->
			          <div class="card shadow mb-4" id="cuadro1">
			            <div class="card-header py-3">
			              <h6 class="m-0 font-weight-bold text-primary">Gestion de pacientes</h6>

			              {{-- <button onclick="nuevo()" class="btn btn-primary btn-icon-split" style="float: right;">
		                    <span class="icon text-white-50">
		                      <i class="fas fa-plus"></i>
		                    </span>
		                    <span class="text">Nuevo registro</span>
		                  </button> --}}
			            </div>
			            <div class="card-body">

			              <div class="table-responsive dataTables_wrapper dt-bootstrap4 no-footer">

			                <table class="table table-bordered " id="table" width="100%" cellspacing="0">

							<div class="dt-buttons"></div>

							<div id="table_filter" class="dataTables_filter"><label>Buscar:
								<input type="search" id="search" class="form-control form-control-sm" placeholder="" aria-controls="table"></label>
							</div>


			                  <thead>
			                    <tr>
								  <th>Acciones</th>
								  <th>Datos</th>
                                  <th>Info</th>
								  <th>Identificacion</th>
								  <th style="width: 150px;">Origen</th>
								  <th style="width: 150px;">Linea</th>
								  <th style="width: 150px;">Ciudad</th>
								  <th style="width: 150px;">Estado</th>
			                      <th style="width: 180px;">Fecha de registro</th>
								  <th style="width: 140px;">Asesora Responsable</th>
			                    </tr>
			                  </thead>
			                  <tbody>

			                  </tbody>
			                </table>

							<div class="dataTables_info" id="table_info" role="status" aria-live="polite"></div>


							<div class="dataTables_paginate paging_simple_numbers">
								<ul class="pagination"></ul>
							</div>

			              </div>
			            </div>
			          </div>
					  @include('catalogos.history_clinic.edit')


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
	 		//	list();
				update();

				list("",1)

				$("#collapse_Catálogos").addClass("show");
				$("#nav_clients, #modulo_Catálogos").addClass("active");

				GetAsesorasValoracion("#id_asesora_valoracion-filter")
				GetBusinessLine("#linea-negocio-filter");


				//GetAsesorasbyBusisnessLine2("#linea-negocio-filter", "#id_asesora_valoracion-filter");


				verifyPersmisos(id_user, tokens, "clients");

				GetUsersTasksclient(".getUsers")


				getProcedures("#procedure-filter");

				// getStatus()

			});



			function getProcedures(select, select_default){

				var url=document.getElementById('ruta').value;
				$.ajax({
					url:''+url+'/api/procedures/all',
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

							$(select).append($('<option>',
							{
							value: item.id,
							text : item.name,
							selected : select_default == item.id ? true : false
							}));

						});



						$(select).select2({
							width: '100%'
						});



					}
				});
			}




			function GetUsersTasksclient(select, select_default){

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
							if (item.status == 1) {
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



			function GetAsesorasbyBusisnessLine2(line_business, asesoras){

				$(line_business).change(function (e) {

					var id_line_business = $(this).val()
					var url=document.getElementById('ruta').value;
					$.ajax({
						url:''+url+'/api/get-asesoras-business-line',
						type:'POST',
						data: {
							"id_user": id_user,
							"token"  : tokens,
							"array_line" : id_line_business
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

								}));

								if(item.id == id_user){
									//$(asesoras+" option").not(':selected').remove();
									//return false;
								}

								}
							});

						}
					});
				});

			}






			$("#linea-negocio-filter, #id_asesora_valoracion-filter, #origen-filter, #date_init, #date_finish, #state-filter, #city-filter, #procedure-filter, #to_prp, #use_app, #cumple").change(function (e) {

				list("", 1)

			});


			$("#search").keyup(function (e) {
				list("", 1)
			});


			$("#have_initial").change(function (e) {
				list("", 1)

			});


			var code_client = 0
			$("#search_reffered").click(function (e) {
				code_client = $("#code_affiliate").val()
				if(code_client.length < 4){

					$("#code_affiliate").focus()
					code_client = 0
					alert("Debe Ingresar un Codigo Valido")

				}else{
					listRefferers("", 1)
				}

			});




			function update(){
				enviarFormularioPutClient("#form-update", 'api/clients', '#cuadro4');
			}


			function store(){
				enviarFormulario("#store", 'api/clients', '#cuadro2');
            }



            function enviarFormularioPutClient(form, controlador, cuadro, auth = false, inputFile){
                $(form).submit(function(e){
                    e.preventDefault(); //previene el comportamiento por defecto del formulario al darle click al input submit
                    var url=document.getElementById('ruta').value; //obtiene la ruta del input hidden con la variable
                    var formData=new FormData($(form)[0]); //obtiene todos los datos de los inputs del formulario pasado por parametros

                    var method = $(this).attr('method'); //obtiene el method del formulario
                    console.log(method)


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
                            if (respuesta.success == false) {
                                mensajes('danger', respuesta.message);
                                $('input[type="submit"]').removeAttr('disabled'); //activa el input submit
                            }else{
                                $('input[type="submit"]').removeAttr('disabled'); //activa el input submit
                                mensajes('success', respuesta.mensagge);

                                if (auth) {
                                localStorage.setItem('token', respuesta.token);
                                localStorage.setItem('email', respuesta.email);
                                localStorage.setItem('user_id', respuesta.user_id);
                                window.location.href = url+"/dashboard";
                                }else{

                                    list(cuadro, number_page);
                                }

                            }

                        }

                    });
                });
            }



            var number_page = 1
			function list(cuadro = "", page = 1){



                number_page = page

				var url=document.getElementById('ruta').value;

				cuadros(cuadro, "#cuadro1");



				if($("#search").val() != ""){

					var search = $("#search").val()

				}else{
					var search = null
				}



				$.ajax({
					url:''+url+'/api/clients/',
					type:'GET',
					data: {
						"id_user": id_user,
						"token"  : tokens,
						"page"   : page,
						"business_line" : 0,
						"adviser"       : 0,
						"origen"        : 0,
						"search"        : search,
						"city"          : 0,
						"date_init"     : 0,
						"date_finish"   : 0,
						"state"         : 0,
						"code_client"   : 0,
						"to_prp"        : 0,
						"have_inital"   : 0,
						"procedure"     : 0,
						"use_app"       : 0,
						"cumple"        : 0
					},
					dataType:'JSON',

					beforeSend: function(){

						var html = ""
						 html += "<tr>"
								html += "<td colspan='8'> Cargando...</td>"
							html += "</tr>"

						$("#table tbody").html(html)
					},
					error: function (data) {
					},
					success: function(result){

						var html = ""

						if(result.data.length == 0){

							html += "<tr>"
								html += "<td colspan='8'> No se encontraron Resultados...</td>"
							html += "</tr>"

						$("#table tbody").html(html)


							return false;
						}
						$.map(result.data, function (item, key) {

							var botones = "";
							if(consultar == 1)
								//botones += "<span data='"+JSON.stringify(item)+"' class='consultar btn btn-sm btn-info waves-effect' data-toggle='tooltip' title='Consultar'><i class='fa fa-eye' style='margin-bottom:5px'></i></span> ";
							if(actualizar == 1)
								botones += "<span data='"+JSON.stringify(item)+"' class='editar btn btn-sm btn-primary waves-effect' data-toggle='tooltip' title='Editar'><i class='fas fa-edit' style='margin-bottom:5px'></i></span> ";


							if(item.prp == "Si"){
								var code = "<i class='fa fa-barcode'></i> "+item.code_client
							}else{
								var code = ""
							}

							if(item.name_update != null){
								var name_update = "Por: "+item.name_update+" "+item.apellido_update
							}else{
								var name_update = ""
							}

							let refer = ""
							if(item.name_affiliate != null){
								refer = `Referido por: ${item.name_affiliate}`
							}


							let have_initial = ""
							if(item.have_initial != null){
								have_initial = `Tiene Inicial :  ${item.have_initial}`
							}

							let authapp = ""

							if(item.auth_app){
								authapp = '<i class="fab fa-android" style="font-size: 44px; color: #5fce5f"></i>'
							}


                            let code_verify = ""
                            if(item.code_verify){
                                code_verify = "Codigo de Seguridad : "+item.code_verify
                            }




							let link = item.count_sactfication_suvarvy_count > 0 ? 'Encuesta Diligenciada':"<i class='fa fa-link'></i> <a href='"+url+"/form_satisfaction_survey/intro/"+item.id_cliente+"' target='_blank'> Link de Encuesta</a>"


                            let linkVlr = item.count_sactfication_suvarvy_vlr_count > 0 ? 'Encuesta VLR Diligenciada':"<i class='fa fa-link'></i> <a href='"+url+"/form_satisfaction_survey_vlr/intro/"+item.id_cliente+"' target='_blank'> Link de Encuesta VLR</a>"

                            let surgeries = ""
                            $.map(item.surgeries, function (surgerie, key) {
                                surgeries += surgerie.name+"<br>"
                            });

                            let date_surgerie
                            if(item.date_surgerie){
                                 date_surgerie = item.date_surgerie.fecha
                            }else{
                                 date_surgerie = ""
                            }


                            let date_valoration
                            if(item.date_valoration){
                                 date_valoration = item.date_valoration.fecha
                            }else{
                                 date_valoration = ""
                            }


							html += "<tr>"
								html += "<td>"+botones+"</td>"
								html += "<td><b>"+item.nombres+"</b><br><i class='fa fa-phone'></i> <a href='#'>"+item.telefono+"</a><br><i class='fa fa-envelope'></i> <a href='#'>"+item.email+"</a><br>"+code+"<br>  "+authapp+"  <br>   "+refer+" <br> "+have_initial+"<br>"+link+"<br>"+linkVlr+"<br>"+code_verify+"</td>"
								html += `<td>
                                    <b>Nombre de CX:</b> ${surgeries}<br>
                                    <b>Fecha de CX:</b>  ${date_surgerie}<br><br>
                                    <b>Fecha de VLR:</b>  ${date_valoration}<br><br>
                                    <b>Instagram:</b>  ${item.instagram}<br><br>
                                    <b>Forma Pago:</b>  ${item.forma_pago}
                                </td>`
                                html += "<td>"+item.identificacion+"</td>"
								html += "<td>"+item.origen+"</td>"
								html += "<td>"+item.nombre_line+"</td>"
								html += "<td>"+item.name_city+"</td>"
								html += "<td>"+item.state+"</td>"
								html += "<td>"+item.fec_regins+"<br><b>Ultima modificacion</b><br>"+item.fec_update+" <b>"+name_update+"</b></td>"
								html += "<td><b>"+item.name_register+" "+item.apellido_register+"</b></td>"
							html += "</tr>"

						});

						var table = $("#table tbody").html(html)

						if(result.next_page_url != null){
							var next = result.next_page_url.split("page=")[1]
							var className = ''
						}else{
							var next = result.last_page
							var className = 'disabled'
						}


						if(result.prev_page_url != null){
							var prev = result.prev_page_url.split("page=")[1]
							var className = ''
						}else{
							var prev = 1;
							var className = 'disabled'
						}


						var li = ""
						li  += '<li class="paginate_button page-item previous '+className+'" onclick="list(\'\', '+prev+')" id="table_previous"><a href="javascript:void(0)" aria-controls="table" data-dt-idx="0" tabindex="0" class="page-link">Anterior</a></li>'

						li += '<li class="paginate_button page-item next" onclick="list(\'\', '+next+')" id="table_next"><a href="javascript:void(0)" aria-controls="table" data-dt-idx="8" tabindex="0" class="page-link">Siguiente</a></li>'

						$(".pagination").html(li)


						$("#table_info").text("Mostrando registros del "+result.from+" al  "+result.to+" de un total de "+result.total+" registros")

					}
				});

				ver("#table tbody")
				edit("#table tbody")
				activar("#table tbody")
				desactivar("#table tbody")
				eliminar("#table tbody")

			}






			$("#create_task_client").change(function (e) {

				if($('#create_task_client').is(':checked') ) {
					$("#content_create_task").css("display", "block")
					$("#responsable, #issue-store, #fecha-store, #time-store, #followers-store").attr("required", "required")
				}else{
					$("#content_create_task").css("display", "none")
					$("#responsable, #issue-store, #fecha-store, #time-store, #followers-store").removeAttr("required")
				}
			});



			$("#create_valorations_client").change(function (e) {

				if($('#create_valorations_client').is(':checked') ) {
					$("#content_create_valoration").css("display", "block")
					GetClinic2("#clinic_valoration")

					$("#fecha-store-valoration, #time-store-valoration, #time-end-store, #surgeon-store, #type-store, #clinic_valoration, #way_to_pay-store").attr("required", "required")

				}else{
					$("#content_create_valoration").css("display", "none")

					$("#fecha-store-valoration, #time-store-valoration, #time-end-store, #surgeon-store, #type-store, #clinic_valoration, #way_to_pay-store").removeAttr("required")

				}
            });




            function prevClient(cuadroOcultar){
                console.log(number_page)
                $(cuadroOcultar).slideUp("slow"); //oculta el cuadro.
                $("#cuadro1").slideDown("slow"); //muestra el cuadro.
                list(cuadroOcultar, number_page);
            }






			function listRefferers(cuadro = "", page = 1){


				var url=document.getElementById('ruta').value;

				cuadros(cuadro, "#cuadro1");



				if($("#search").val() != ""){

					var search = $("#search").val()

				}else{
					var search = null
				}


				$.ajax({
					url:''+url+'/api/clients/refferes/code/'+code_client,
					type:'GET',
					dataType:'JSON',

					beforeSend: function(){

						var html = ""
						 html += "<tr>"
								html += "<td colspan='8'> Cargando...</td>"
							html += "</tr>"

						$("#table tbody").html(html)
					},
					error: function (data) {
					},
					success: function(result){

						var html = ""

						if(result.data.length == 0){

							html += "<tr>"
								html += "<td colspan='8'> No se encontraron Resultados...</td>"
							html += "</tr>"

						$("#table tbody").html(html)


							return false;
						}
						$.map(result.data, function (item, key) {

							var botones = "";
							if(consultar == 1)
								//botones += "<span data='"+JSON.stringify(item)+"' class='consultar btn btn-sm btn-info waves-effect' data-toggle='tooltip' title='Consultar'><i class='fa fa-eye' style='margin-bottom:5px'></i></span> ";
							if(actualizar == 1)
								botones += "<span data='"+JSON.stringify(item)+"' class='editar btn btn-sm btn-primary waves-effect' data-toggle='tooltip' title='Editar'><i class='fas fa-edit' style='margin-bottom:5px'></i></span> ";
							if(item.status == 1 && actualizar == 1)
								botones += "<span data='"+JSON.stringify(item)+"' class='desactivar btn btn-sm btn-warning waves-effect' data-toggle='tooltip' title='Desactivar'><i class='fa fa-unlock' style='margin-bottom:5px'></i></span> ";
							else if(item.status == 2 && actualizar == 1)
								botones += "<span data='"+JSON.stringify(item)+"' class='activar btn btn-sm btn-warning waves-effect' data-toggle='tooltip' title='Activar'><i class='fa fa-lock' style='margin-bottom:5px'></i></span> ";

							if((item.id_user_asesora == id_user) || borrar == 1)
								botones += "<span data='"+JSON.stringify(item)+"' class='eliminar btn btn-sm btn-danger waves-effect' data-toggle='tooltip' title='Eliminar'><i class='fas fa-trash-alt' style='margin-bottom:5px'></i></span>";
						//	return botones;




							if(item.prp == "Si"){
								var code = "<i class='fa fa-barcode'></i> "+item.code_client
							}else{
								var code = ""
							}

							if(item.name_update != null){
								var name_update = "Por: "+item.name_update+" "+item.apellido_update
							}else{
								var name_update = ""
							}


							html += "<tr>"
								html += "<td>"+botones+"</td>"
								html += "<td><b>"+item.nombres+"</b><br><i class='fa fa-phone'></i> <a href='#'>"+item.telefono+"</a><br><i class='fa fa-envelope'></i> <a href='#'>"+item.email+"</a><br>"+code+" </td>"
								html += "<td>"+item.identificacion+"</td>"
								html += "<td>"+item.origen+"</td>"
								html += "<td>"+item.nombre_line+"</td>"
								html += "<td>"+item.name_city+"</td>"
								html += "<td>"+item.state+"</td>"
								html += "<td>"+item.fec_regins+"<br><b>Ultima modificacion</b><br>"+item.fec_update+" <b>"+name_update+"</b></td>"
								html += "<td><b>"+item.name_register+" "+item.apellido_register+"</b></td>"
							html += "</tr>"

						});

						var table = $("#table tbody").html(html)

						if(result.next_page_url != null){
							var next = result.next_page_url.split("page=")[1]
							var className = ''
						}else{
							var next = result.last_page
							var className = 'disabled'
						}


						if(result.prev_page_url != null){
							var prev = result.prev_page_url.split("page=")[1]
							var className = ''
						}else{
							var prev = 1;
							var className = 'disabled'
						}


						var li = ""
						li  += '<li class="paginate_button page-item previous '+className+'" onclick="list(\'\', '+prev+')" id="table_previous"><a href="javascript:void(0)" aria-controls="table" data-dt-idx="0" tabindex="0" class="page-link">Anterior</a></li>'

						li += '<li class="paginate_button page-item next" onclick="list(\'\', '+next+')" id="table_next"><a href="javascript:void(0)" aria-controls="table" data-dt-idx="8" tabindex="0" class="page-link">Siguiente</a></li>'

						$(".pagination").html(li)


						$("#table_info").text("Mostrando registros del "+result.from+" al  "+result.to+" de un total de "+result.total+" registros")

					}
				});


				ver("#table tbody")
				edit("#table tbody")
				activar("#table tbody")
				desactivar("#table tbody")
				eliminar("#table tbody")





				var business_line = $("#linea-negocio-filter").val()
				var adviser       = $("#id_asesora_valoracion-filter").val()
				var origen        = $("#origen-filter").val()

				var date_init     = $("#date_init").val()
				var date_finish   = $("#date_finish").val()
				var search        = $("#search").val()
				var city          = $("#city-filter").val()


				if(business_line.length == 0){
					business_line = 0
				}else{
					business_line  = business_line.join()
				}


				if(adviser.length == 0){
					adviser = 0
				}else{
					adviser  = adviser.join()
				}



				if(date_init.length == 0){
					date_init = 0
				}

				if(date_finish.length == 0){
					date_finish = 0
				}


				if(search.length === 0){
					search = 5
				}

				$("#xls").remove();
				$("#view_xls").remove();

				var a = '<button id="xls" class="dt-button buttons-excel buttons-html5">Excel</button>';
				$('.dt-buttons').append(a);

				var b = '<button id="view_xls" target="_blank" style="opacity: 0" href="api/clients/export/excel/'+business_line+'/'+adviser+'/'+origen+'/'+date_init+'/'+date_finish+'/'+$("#state-filter").val()+'/'+search+'/'+city+'" class="dt-button buttons-excel buttons-html5">xls</button>';
				$('.dt-buttons').append(b);

				$("#xls").click(function (e) {
					url = $("#view_xls").attr("href");

					console.log(url)
					window.open(url, '_blank');
				});

			}


			function GetComments(comment_content, id_client){
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
									html += '<div class="col-md-10" style="background: #eee;padding: 2%;border-radius: 17px;overflow: scroll">'
										html += '<div>'+item.comment+'</div>'

										html += '<div><b>'+item.name_user+" "+item.last_name_user+'</b> <span style="float: right;overflow: scroll">'+item.create_at+'</span></div>'


									html += '</div>'
								html += '</div>'
							html += '</div>'

						});


						$(comment_content).html(html)
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
							html += '<div class="col-md-10" style="background: #eee;padding: 2%;border-radius: 17px;overflow: scroll">'
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

			function nuevo() {
				$("#alertas").css("display", "none");
				$("#store")[0].reset();

				GetCity("#city");
				GetClinic("#city", "#clinic")
			//	GetAsesorasbyBusisnessLine("#linea-negocio", "#asesora");
			//	GetAsesorasValoracion("#id_asesora_valoracion")
				GetBusinessLine("#linea-negocio");
				Children("#children", "#number_children")
				Surgery("#surgery", "#previous_surgery")
				Disease("#disease", "#major_disease")
				Drugs("#drugs_check", "#drugs")
				Medication("#medication", "#drink_medication")
				Allergic("#allergic ", "#allergic_medication")
				$("#clinic").attr("disabled", "disabled")


				$("#tablecx tbody").html("");
				getCategory("#category", 124124124)
				ChangeCategory("#category", "#sub_category")
				$("#tablecx tbody").html("");


				$('#summernote, #summernote_valorations').summernote('reset');
				$('#summernote, #summernote_valorations').summernote({
					'height' : 200
				});



				$("#acquittance").fileinput('destroy');
				$("#acquittance").fileinput({
					theme: "fas",
					overwriteInitial: true,
					maxFileSize: 21500,
					showClose: false,
					showCaption: false,
					browseLabel: '',
					removeLabel: '',
					browseIcon: '<i class="fa fa-folder-open"></i>',
					removeIcon: '<i class="fas fa-trash-alt"></i>',
					previewFileIcon: '<i class="fas fa-file"></i>',
					removeTitle: 'Cancel or reset changes',
					elErrorContainer: '#kv-avatar-errors-1',
					msgErrorClass: 'alert alert-block alert-danger',

					layoutTemplates: {main2: '{preview}  {remove} {browse}'},
					allowedFileExtensions: ["jpg", "jpeg", "png", "gif", "pdf", "docs"],
				});







				GetAsesorasValoracion2("#asesora")



				cuadros("#cuadro1", "#cuadro2");
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





			var count_phone = 0
			$("#add_phone").click(function (e) {
				e.preventDefault();

				count_phone++

				var html = ""


				html += '<div class="col-md-10 phone_add_'+count_phone+'">'
					html += '<div class="form-group">'
						html += '<label for=""><b>Telefono</b></label>'
						html += '<input type="number" name="telefono2[]" class="form-control form-control-user"  placeholder="PJ. 315 2077862">'
					html += '</div>'
				html += '</div>'


				html += '<div class="col-md-2 phone_add_'+count_phone+'"">'
				html += '<br>'
					html += '<button type="button" id="add_phone" onclick="deletePhone('+count_phone+')" class="btn btn-danger"><i class="fa fa-trash"></i></button>'
				html += '</div>'



				$("#add_phone_content").append(html)
			});





			var count_phone_edit = 0
			$("#add_phone_edit").click(function (e) {
				e.preventDefault();

				count_phone_edit++

				var html = ""


				html += '<div class="col-md-10 phone_add_'+count_phone_edit+'">'
					html += '<div class="form-group">'
						html += '<label for=""><b>Telefono</b></label>'
						html += '<input type="number" name="telefono2[]" class="form-control form-control-user"  placeholder="PJ. 315 2077862">'
					html += '</div>'
				html += '</div>'


				html += '<div class="col-md-2 phone_add_'+count_phone_edit+'"">'
				html += '<br>'
					html += '<button type="button" id="add_phone" onclick="deletePhone('+count_phone_edit+')" class="btn btn-danger"><i class="fa fa-trash"></i></button>'
				html += '</div>'



				$("#phone_add_content_edit").append(html)
			});


			function deletePhone(id){
				$(".phone_add_"+id).remove()
			}


			function deletePhoneEdit(id){
				$(".phone_add_edit_"+id).remove()
			}














			var count_emal = 0
			$("#add_email").click(function (e) {
				e.preventDefault();

				count_emal++

				var html = ""


				html += '<div class="col-md-10 email_add_'+count_emal+'">'
					html += '<div class="form-group">'
						html += '<label for=""><b>E-mail</b></label>'
						html += '<input type="email" name="email2[]" class="form-control form-control-user disabled"  placeholder="PJ. correo@dominio.com" required>'
					html += '</div>'
				html += '</div>'


				html += '<div class="col-md-2 email_add_'+count_emal+'"">'
				html += '<br>'
					html += '<button type="button" id="add_email" onclick="deleteemail('+count_emal+')" class="btn btn-danger"><i class="fa fa-trash"></i></button>'
				html += '</div>'



				$("#add_email_content").append(html)
			});





			var count_email_edit = 0
			$("#add_email_edit").click(function (e) {
				e.preventDefault();

				count_email_edit++

				var html = ""


				html += '<div class="col-md-10 email_add_'+count_email_edit+'">'
					html += '<div class="form-group">'
						html += '<label for=""><b>E-mail</b></label>'
						html += '<input type="email" name="email2[]" class="form-control form-control-user"  placeholder="PJ. correo@dominio.com">'
					html += '</div>'
				html += '</div>'


				html += '<div class="col-md-2 email_add_'+count_email_edit+'"">'
				html += '<br>'
					html += '<button type="button" id="add_email" onclick="deleteemail('+count_email_edit+')" class="btn btn-danger"><i class="fa fa-trash"></i></button>'
				html += '</div>'



				$("#email_add_content_edit").append(html)
			});


			function deleteemail(id){
				$(".email_add_"+id).remove()
			}


			function deleteemailEdit(id){
				$(".email_add_edit_"+id).remove()
			}






			/* ------------------------------------------------------------------------------- */
			/*
				Funcion que muestra el cuadro3 para la consulta del banco.
			*/
			let iden = null;
			function ver(tbody, table){
				$(tbody).unbind().on("click", "span.consultar", function(){
					$("#alertas").css("display", "none");

					var data = JSON.parse($(this).attr("data"))

					GetCity("#city_view");
					GetClinic("#city_view", "#clinic_view")
					GetBusinessLine("#linea-negocio-view");
					GetAsesorasbyBusisnessLine("#linea-negocio-view", "#asesora-view");

					GetAsesorasValoracion("#id_asesora_valoracion-view")
					GetComments("#comments", data.id_cliente)




					$("#id_asesora_valoracion-view").val(data.id_asesora_valoracion).attr("disabled", "disabled")

					$("#code-view").text(data.code_client)
					$("#state_view").val(data.state)
					$("#state_view").trigger("change");
					$("#state_view").attr("disabled", "disabled")
					$("#nombre_view").val(data.nombres).attr("disabled", "disabled")
					$("#apellido_view").val("").attr("disabled", "disabled")
					$("#identificacion_view").val(data.identificacion).attr("disabled", "disabled")
					$("#telefono_view").val(data.telefono).attr("disabled", "disabled")
					$("#email_view").val(data.email).attr("disabled", "disabled")
					$("#direccion_view").val(data.direccion).attr("disabled", "disabled")
					$("#fecha_nacimiento_view").val(data.fecha_nacimiento).attr("disabled", "disabled")
					$("#origen_view").val(data.origen).attr("disabled", "disabled")
					$("#forma_pago_view").val(data.forma_pago).attr("disabled", "disabled")


					$("#facebook_view").val(data.facebook).attr("disabled", "disabled")
					$("#instagram_view").val(data.instagram).attr("disabled", "disabled")
					$("#twitter_view").val(data.twitter).attr("disabled", "disabled")
					$("#youtube_view").val(data.youtube).attr("disabled", "disabled")
					$("#prp_view").val(data.prp).attr("disabled", "disabled")
					$("#prp_view").trigger("change");


					$("#city_view").val(data.city).attr("disabled", "disabled")
					$("#city_view").trigger("change")

					$("#clinic_view").val(data.clinic).attr("disabled", "disabled")

					$("#year_view").val(calcularEdad(data.fecha_nacimiento))

					$("#identificacion_verify_view").prop("checked", data.identificacion_verify ? true : false)

					$("#name_surgery_view").val(data.name_surgery).attr("disabled", "disabled")
					$("#current_size_view").val(data.current_size).attr("disabled", "disabled")
					$("#desired_size_view").val(data.desired_size).attr("disabled", "disabled")
					$("#implant_volumem_view").val(data.implant_volumem).attr("disabled", "disabled")

					$("#eps_view").val(data.eps).attr("disabled", "disabled")
					$("#height_view").val(data.height).attr("disabled", "disabled")
					$("#weight_view").val(data.weight).attr("disabled", "disabled")

					$("#children_view").prop("checked", data.children ? true : false)
					$("#smoke_view").prop("checked", data.smoke ? true : false)
					$("#alcohol_view").prop("checked", data.alcohol ? true : false)
					$("#surgery_view").prop("checked", data.surgery ? true : false)
					$("#disease_view").prop("checked", data.disease ? true : false)
					$("#medication_view").prop("checked", data.medication ? true : false)
					$("#allergic_view").prop("checked", data.allergic ? true : false)

					$("#number_children_view").val(data.number_children).attr("disabled", "disabled")
					$("#previous_surgery_view").val(data.previous_surgery).attr("disabled", "disabled")
					$("#major_disease_view").val(data.major_disease).attr("disabled", "disabled")
					$("#drink_medication_view").val(data.drink_medication).attr("disabled", "disabled")
					$("#allergic_medication_view").val(data.allergic_medication).attr("disabled", "disabled")


					$("#dependent_independent_view").val(data.dependent_independent).attr("disabled", "disabled")
					$("#type_contract_view").val(data.type_contract).attr("disabled", "disabled")
					$("#antiquity_view").val(data.antiquity).attr("disabled", "disabled")
					$("#average_monthly_income_view").val(data.average_monthly_income).attr("disabled", "disabled")
					$("#previous_credits_view").val(data.previous_credits).attr("disabled", "disabled")
					$("#reported_view").val(data.reported).attr("disabled", "disabled")
					$("#bank_account_view").val(data.bank_account).attr("disabled", "disabled")

					$("#properties_view").prop("checked", data.properties ? true : false)
					$("#vehicle_view").prop("checked", data.vehicle ? true : false)


					$("#linea-negocio-view").val(data.id_line).attr("disabled", "disabled")
					$("#linea-negocio-view").trigger("change");
					$("#asesora-view").val(data.id_user_asesora).attr("disabled", "disabled")


					var url=document.getElementById('ruta').value;
					var html = "";
					$.map(data.logs, function (item, key) {
						html += '<div class="col-md-12" style="margin-bottom: 15px">'
							html += '<div class="row">'
								html += '<div class="col-md-2">'
									html += "<img class='rounded' src='"+url+"/img/usuarios/profile/"+item.img_profile+"' style='height: 4rem;width: 4rem; margin: 1%; border-radius: 50%!important;' title='"+item.name_follower+" "+item.last_name_follower+"'>"

								html += '</div>'
								html += '<div class="col-md-10" style="background: #eee;padding: 2%;border-radius: 17px;overflow: scroll">'
									html += '<div>'+item.event+'</div>'

									html += '<div><b>'+item.name_user+" "+item.last_name_user+'</b> <span style="float: right">'+item.create_at+'</span></div>'


								html += '</div>'
							html += '</div>'
						html += '</div>'

					});

					$("#logs_view").html(html)



					var html = ""
					var count_phone = 0
					$.map(data.phones, function (item, key) {
						count_phone++
						html += '<div class="col-md-12 phone_add_'+count_phone+'">'
							html += '<div class="form-group">'
								html += '<label for=""><b>Telefono</b></label>'
								html += '<input type="number" name="telefono2[]" class="form-control form-control-user"  placeholder="PJ. 315 2077862" value="'+item.phone+'" disabled>'
							html += '</div>'
						html += '</div>'


						html += '<div class="col-md-2 phone_add_'+count_phone+'"">'
						html += '<br>'
						//	html += '<button type="button" id="add_phone" onclick="deletePhone('+count_phone+')" class="btn btn-danger"><i class="fa fa-trash"></i></button>'
						html += '</div>'


					});

					$("#phone_add_content_view").html(html)




					var html = ""
					var count_email = 0
					$.map(data.emails, function (item, key) {
						count_email++
						html += '<div class="col-md-12 email_add_'+count_email+'">'
							html += '<div class="form-group">'
								html += '<label for=""><b>E-mail</b></label>'
								html += '<input type="email" name="email2[]" class="form-control form-control-user"  value="'+item.email+'" disabled>'
							html += '</div>'
						html += '</div>'


						html += '<div class="col-md-2 email_add_'+count_email+'"">'
						html += '<br>'
						//	html += '<button type="button" id="add_email" onclick="deleteemail('+count_email+')" class="btn btn-danger"><i class="fa fa-trash"></i></button>'
						html += '</div>'


					});

					$("#email_add_content_view").html(html)









					cuadros('#cuadro1', '#cuadro3');
/*

					var url = document.getElementById('ruta').value+"/valuations/client/"+data.id_cliente+"/0"
					$('#iframeValuationsView').attr('src', url);


					var url = document.getElementById('ruta').value+"/preanesthesia/client/"+data.id_cliente+"/0"
					$('#iframepPreanestesiaView').attr('src', url);


					var url = document.getElementById('ruta').value+"/surgeries/client/"+data.id_cliente+"/0"
					$('#iframepCirugiaView').attr('src', url);


					var url = document.getElementById('ruta').value+"/revision-appointment/client/"+data.id_cliente+"/0"
					$('#iframepRevisionView').attr('src', url);


					var url = document.getElementById('ruta').value+"/clients/tasks/"+data.id_cliente+"/0"
					$('#iframepTracingView').attr('src', url);


*/
				valuations("#tab4_view", "#iframeValuationsView", data)
				preanestesias("#tab5_view", "#iframepPreanestesiaView", data)
				surgeries("#tab6_view", "#iframepCirugiaView", data)
				revisiones("#tab7_view", "#iframepRevisionView", data)
				tasks("#tab8_view", "#iframepTracingView", data)


				});
			}



			function GetAsesorasValoracion2(select, select_default = false){
				console.log(select_default)
				var url=document.getElementById('ruta').value;
				$.ajax({
					url:''+url+'/api/get-asesoras',
					type:'GET',
					data: {
						"id_user": id_user,
						"token"  : tokens,
					},
					dataType:'JSON',
				//	async: false,
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
								value: item.id,
								text : item.nombres+" "+item.apellido_p+" "+item.apellido_m,
								selected: select_default == item.id ? true : false
							}));

						}
					});

					}
				});
			}
			/* ------------------------------------------------------------------------------- */
			/*
				Funcion que muestra el cuadro3 para la consulta del banco.
			*/
			function edit(tbody){
				$(tbody).on("click", "span.editar", function(){
					$("#alertas").css("display", "none");


					var data = JSON.parse($(this).attr("data"))

					$("#id_edit").val(data.id_cliente)


					getPreanestesia()



					cuadros('#cuadro1', '#cuadro4');
				});
			}




			function getTasksAdvisers(id_client){


				var url=document.getElementById('ruta').value;
				$.ajax({
					url:''+url+'/api/clients/tasks/advisers/'+id_client,
					type:'GET',
					dataType:'JSON',

					success: function(data){
						//$("#testimony").prop("checked", data.testimony ? true : false)
						//$("#testimony_date").val(data.testimony_date)

						$("#before_and_after").prop("checked", data.before_and_after ? true : false)
						$("#before_and_after_date").val(data.before_and_after_date)

						//$("#califications").prop("checked", data.califications ? true : false)
						//$("#califications_date").val(data.califications_date)

						$("#survey").prop("checked", data.survey ? true : false)
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



			function masajes(tab, iframe, data){
				$(tab).click(function (e) {
					var url = document.getElementById('ruta').value+"/masajes/client/"+data.id_cliente+"/1"
					$(iframe).attr('src', url);

				});
			}


			function reffered(tab, iframe, data){
				$(tab).click(function (e) {
					var url = document.getElementById('ruta').value+"/clients/reffereds/"+data.id_cliente+""
					$(iframe).attr('src', url);

				});
			}










			function copyToClipboard(element) {
				var $temp = $("<input>");
				$("body").append($temp);
				$temp.val($(element).text()).select();
				document.execCommand("copy");
				$temp.remove();

				mensajes('success', "Codigo: "+$(element).text()+" Copiado");


			}




			$("#add-comments").click(function (e) {
				/*
				var html = ""


				html += '<div class="col-md-12" style="margin-bottom: 15px">'
					html += "<input type='hidden' name='comments[]' value='"+$("#summernote_edit").val()+"'>"
					html += '<div class="row">'
						html += '<div class="col-md-2">'
							//html += "<img class='rounded' src='/img/usuarios/profile/"+item.img_profile+"' style='height: 4rem;width: 4rem; margin: 1%; border-radius: 50%!important;' title='"+item.name_follower+" "+item.last_name_follower+"'>"

						html += '</div>'
						html += '<div class="col-md-10" style="background: #eee;padding: 2%;border-radius: 17px;">'
							html += '<div>'+$("#summernote_edit").val()+'</div>'

							html += '<div><b></b> <span style="float: right">Ahora Mismo</span></div>'

						html += '</div>'
					html += '</div>'
				html += '</div>'

				$("#comments_edit").append(html)

				$('#summernote_edit').summernote('reset');

				*/
			});







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
						$(input).val("").attr("readonly", "readonly");
					}
				});
			}



			function Surgery(checkbox, input){
				$(checkbox).change(function (e) {
					if ($(checkbox).is(':checked')){
						$(input).removeAttr("readonly").focus();
					}else{
						$(input).val("").attr("readonly", "readonly");
					}
				});
			}



			function Disease(checkbox, input){
				$(checkbox).change(function (e) {
					if ($(checkbox).is(':checked')){
						$(input).removeAttr("readonly").focus();
					}else{
						$(input).val("").attr("readonly", "readonly");
					}
				});
			}

			function Drugs(checkbox, input){
				$(checkbox).change(function (e) {
					if ($(checkbox).is(':checked')){
						$(input).removeAttr("readonly").focus();
					}else{
						$(input).val("").attr("readonly", "readonly");
					}
				});
			}


			function Medication(checkbox, input){
				$(checkbox).change(function (e) {
					if ($(checkbox).is(':checked')){
						$(input).removeAttr("readonly").focus();
					}else{
						$(input).val("").attr("readonly", "readonly");
					}
				});
			}

			function Allergic(checkbox, input){
				$(checkbox).change(function (e) {
					if ($(checkbox).is(':checked')){
						$(input).removeAttr("readonly").focus();
					}else{
						$(input).val("").attr("readonly", "readonly");
					}
				});
			}




			$("#identificacion").change(function (e) {

				var url=document.getElementById('ruta').value;
				$.ajax({
					url:''+url+'/api/clients/identification/'+$(this).val(),
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
						$(".disabled").removeAttr("disabled")
						//$(".disabled").val("")

						$("#state").trigger("change")
						$("#city").trigger("change")
						$("#linea-negocio").trigger("change");


						$(".tabs-remove").css("display", "none")
						$("#btn-store").removeAttr("disabled")


					},
					success: function(data){

						$(".disabled").attr("disabled", "disabled")

						$("#state").val(data.state).trigger("change")

						$("#nombre").val(data.nombres)
						$("#apellido").val(data.apellidos)
						$("#telefono").val(data.telefono)
						$("#email").val(data.email)
						$("#direccion").val(data.direccion)
						$("#fecha_nacimiento").val(data.fecha_nacimiento)

						$("#origen").val(data.origen)
						$("#forma_pago").val(data.forma_pago)


						$("#city").val(data.city)
						$("#city").trigger("change")

						$("#clinic").val(data.clinic)

						$("#year").val(calcularEdad(data.fecha_nacimiento))

						$("#identificacion_verify").prop("checked", data.identificacion_verify ? true : false)

						$("#name_surgery").val(data.name_surgery)


						$("#linea-negocio").val(data.id_line)
						$("#linea-negocio").trigger("change");

						$("#asesora").val(data.id_user_asesora)


						$(".tabs-remove").css("display", "block")

						$("#btn-store").attr("disabled", "disabled")


						var url = document.getElementById('ruta').value+"/valuations/client/"+data.id_cliente+"/0"
						$('#iframeValuationsStore').attr('src', url);

						var url = document.getElementById('ruta').value+"/preanesthesia/client/"+data.id_cliente+"/0"
						$('#iframepPreanestesiaStore').attr('src', url);


						var url = document.getElementById('ruta').value+"/surgeries/client/"+data.id_cliente+"/0"
						$('#iframepCirugiaStore').attr('src', url);


						var url = document.getElementById('ruta').value+"/revision-appointment/client/"+data.id_cliente+"/0"
						$('#iframepRevisionStore').attr('src', url);

					}
				});
			});




		/* ------------------------------------------------------------------------------- */
			/*
				Funcion que capta y envia los datos a desactivar
			*/
			function desactivar(tbody, table){
				$(tbody).on("click", "span.desactivar", function(){
					var data = JSON.parse($(this).attr("data"))
					statusConfirmacion('api/status-cliente/'+data.id_cliente+"/"+2,"¿Esta seguro de desactivar el registro?", 'desactivar');
				});
			}
		/* ------------------------------------------------------------------------------- */

		/* ------------------------------------------------------------------------------- */
			/*
				Funcion que capta y envia los datos a desactivar
			*/
			function activar(tbody, table){
				$(tbody).on("click", "span.activar", function(){
					var data = JSON.parse($(this).attr("data"))
					statusConfirmacion('api/status-cliente/'+data.id_cliente+"/"+1,"¿Esta seguro de desactivar el registro?", 'activar');
				});
			}
		/* ------------------------------------------------------------------------------- */



			function eliminar(tbody, table){
				$(tbody).on("click", "span.eliminar", function(){
					var data = JSON.parse($(this).attr("data"))
					statusConfirmacionClient('api/status-cliente/'+data.id_cliente+"/"+0,"¿Esta seguro de eliminar el registro?", 'Eliminar');
				});
            }




            function statusConfirmacionClient(controlador,  title, confirmButton){

                var data = {
                "id_user": id_user,
                "token"  : tokens,
                };


                swal({
                    title: title,
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "Si, "+confirmButton+"!",
                    cancelButtonText: "No, Cancelar!",
                    closeOnConfirm: true,
                    closeOnCancel: false
                },
                function(isConfirm){
                    if (isConfirm) {
                        var url=document.getElementById('ruta').value; //obtiene la ruta del input hidden con la variable
                        $.ajax({
                            url:''+url+'/'+controlador+'/',
                            type: 'GET',
                            dataType: 'JSON',
                        //  data: data,
                            beforeSend: function(){
                                mensajes('info', '<span>Guardando cambios, espere por favor... <i class="fa fa-spinner fa-spin" aria-hidden="true"></i></span>');
                            },
                            error: function (repuesta) {
                                var errores=repuesta.responseText;
                                mensajes('danger', errores);
                            },
                            success: function(respuesta){
                            mensajes('success', respuesta.mensagge);
                            list('', number_page);
                            }
                        });
                    } else {
                        swal("Cancelado", "Proceso cancelado", "error");
                    }
                });
            }



		  $("#fecha_nacimiento").change(function (e) {
			  $("#year").val(calcularEdad($(this).val()))
		  });


		  $("#fecha_nacimiento_edit").change(function (e) {
			  $("#year_edit").val(calcularEdad($(this).val()))
		  });




		  function getCategory(select, select_default = false){

			$.ajax({
				url: ''+document.getElementById('ruta').value+'/api/category',
				type:'GET',
				data: {
					"id_user": id_user,
					"token"  : tokens,
				},
				dataType:'JSON',
				async: false,
				error: function() {

				},
				success: function(data){
					$(select+" option").remove();
					$(select).append($('<option>',
					{
						value: "",
						text : "Seleccione"
					}));

					$.each(data, function(i, item){


						$(select).append($('<option>',
						{
							value: item.id,
							text : item.name,
							selected : select_default == item.id ? true : false

						}));


					});

				}

			});
		}


		function ChangeCategory(select, select_sub, select_default = false){
			$(select).change(function (e) {

				$.ajax({

					url: ''+document.getElementById('ruta').value+'/api/category/sub/'+$(select).val(),
					type:'GET',
					data: {
						"id_user": id_user,
						"token"  : tokens,
					},
					dataType:'JSON',
					async: false,
					error: function() {

					},
					success: function(data){
						console.log(data)
						$(select_sub+" option").remove();
						$(select_sub).append($('<option>',
						{
							value: "",
							text : "Seleccione"
						}));

						$.each(data, function(i, item){


							$(select_sub).append($('<option>',
							{
								value: item.id,
								text : item.name,
								selected : select_default == item.id ? true : false

							}));


						});

					}

				});

			});
		}


		var count = 0
		$("#btn-add-surgerie").click(function (e) {
			count++
			var html
			html += "<tr id='tr_procedure_"+count+"'>"
				html += "<td>"+$("#sub_category option:selected").text()+"<input type='hidden' name='sub_category[]' value='"+$("#sub_category").val()+"'></td>"
				html += "<td><span onclick='eliminarTr(\""+'#tr_procedure_'+count+"\")' class='eliminar btn btn-sm btn-danger waves-effect' data-toggle='tooltip' title='Eliminar'><i class='fas fa-trash-alt' style='margin-bottom:5px'></i></span></td>"
			html += "</tr>"

			$("#tablecx tbody").append(html);

		});


		var count2 = 0
		$("#btn-servicios").click(function (e) {
			count2++
			var html
			var nomser_edit = $("#nomser_edit").val()
			var obser_edit = $("#obser_edit").val()
			var cantidadser_edit = $("#cantidadser_edit").val()
			var fechaser_edit = $("#fechaser_edit").val()

			console.log(nomser_edit)
			console.log(obser_edit)
			console.log(cantidadser_edit)
			console.log(fechaser_edit)

			html += "<tr id='tr_procedure_edit2_"+count2+"'>"
				html += "<td><input type='text' name='nomser[]' value='"+nomser_edit+"'></td>"
				html += "<td><input type='text' name='obser[]' value='"+obser_edit+"'></td>"
				html += "<td><input type='text' name='cantidadser[]' value='"+cantidadser_edit+"'></td>"
				html += "<td><input type='date' name='fechaser[]' value='"+fechaser_edit+"'></td>"

				html += "<td><span onclick='eliminarTr(\""+'#tr_procedure_edit2_'+count2+"\")' class='eliminar btn btn-sm btn-danger waves-effect' data-toggle='tooltip' title='Eliminar'><i class='fas fa-trash-alt' style='margin-bottom:5px'></i></span></td>"
			html += "</tr>"

			$("#tableser_edit tbody").append(html);
			$("#fechaser_edit,#cantidadser_edit,#obser_edit,#nomser_edit").val("");

		});


		$("#btn-consultas").click(function (e) {
			count2++
			var html
			var paraclinico_edit = $("#paraclinico_edit").val()
			var valorp_edit = $("#valorp_edit").val()
			var resultadop_edit = $("#resultadop_edit").val()

			console.log(paraclinico_edit)
			console.log(valorp_edit)
			console.log(resultadop_edit)

			html += "<tr id='tr_procedure_edit2_"+count2+"'>"
				html += "<td><input type='text' name='paraclinico[]' value='"+paraclinico_edit+"'></td>"
				html += "<td><input type='text' name='valorp[]' value='"+valorp_edit+"'></td>"
				html += "<td><input type='text' name='resultadop[]' value='"+resultadop_edit+"'></td>"

				html += "<td><span onclick='eliminarTr(\""+'#tr_procedure_edit2_'+count2+"\")' class='eliminar btn btn-sm btn-danger waves-effect' data-toggle='tooltip' title='Eliminar'><i class='fas fa-trash-alt' style='margin-bottom:5px'></i></span></td>"
			html += "</tr>"

			$("#tableconsul_edit tbody").append(html);
			$("#paraclinico_edit,#valorp_edit,#resultadop_edit").val("");
			
		});

		$("#btn-especialista").click(function (e) {
			count2++
			var html
			var nomespe_edit = $("#nomespe_edit").val()
			var remision_edit = $("#remision_edit").val()
			var fechacreacion_edit = $("#fechacreacion_edit").val()

			console.log(nomespe_edit)
			console.log(remision_edit)
			console.log(fechacreacion_edit)
		

			html += "<tr id='tr_procedure_edit2_"+count2+"'>"
				html += "<td><input type='text' name='nomespe[]' value='"+nomespe_edit+"'></td>"
				html += "<td><input type='text' name='remision[]' value='"+remision_edit+"'></td>"
				html += "<td><input type='date' name='fechacreacion[]' value='"+fechacreacion_edit+"'></td>"

				html += "<td><span onclick='eliminarTr(\""+'#tr_procedure_edit2_'+count2+"\")' class='eliminar btn btn-sm btn-danger waves-effect' data-toggle='tooltip' title='Eliminar'><i class='fas fa-trash-alt' style='margin-bottom:5px'></i></span></td>"
			html += "</tr>"

			$("#tablesp_edit tbody").append(html);
			$("#fechacreacion_edit,#remision_edit,#nomespe_edit").val("");

		});


		$("#btn-incapacidad").click(function (e) {
			count2++
			var html
			var incapacidad_edit = $("#incapacidad_edit").val()
			var diasin_edit = $("#diasin_edit").val()
			var tipoin_edit = $("#tipoin_edit").val()
			var fechain_edit = $("#fechain_edit").val()

			console.log(incapacidad_edit)
			console.log(diasin_edit)
			console.log(tipoin_edit)
			console.log(fechain_edit)

			html += "<tr id='tr_procedure_edit2_"+count2+"'>"
				html += "<td><input type='text' name='incapacidad[]' value='"+incapacidad_edit+"'></td>"			
				html += "<td><input type='text' name='diasin[]' value='"+diasin_edit+"'></td>"
				html += "<td><input type='text' name='tipoin[]' value='"+tipoin_edit+"'></td>"
				html += "<td><input type='date' name='fechain[]' value='"+fechain_edit+"'></td>"

				html += "<td><span onclick='eliminarTr(\""+'#tr_procedure_edit2_'+count2+"\")' class='eliminar btn btn-sm btn-danger waves-effect' data-toggle='tooltip' title='Eliminar'><i class='fas fa-trash-alt' style='margin-bottom:5px'></i></span></td>"
			html += "</tr>"

			$("#tablin_edit tbody").append(html);

			$("#incapacidad_edit,#tipoin_edit,#diasin_edit,#fechain_edit").val("");

		});

		$("#btn-pre_medicamento").click(function (e) {
			count2++
			var html
			var pre_medicamento = $("#pre_medicamento").val()

			console.log(pre_medicamento)

			html += "<tr id='tr_procedure_edit2_"+count2+"'>"
				html += "<td><input type='text' name='medicamento[]' value='"+pre_medicamento+"'></td>"			

				html += "<td><span onclick='eliminarTr(\""+'#tr_procedure_edit2_'+count2+"\")' class='eliminar btn btn-sm btn-danger waves-effect' data-toggle='tooltip' title='Eliminar'><i class='fas fa-trash-alt' style='margin-bottom:5px'></i></span></td>"
			html += "</tr>"

			$("#tablprem_edit tbody").append(html);

			$("#pre_medicamento").val("");

		});

		$("#eventos_intraoperatorios").click(function (e) {
			count2++
			var html
			var nevento_edit = $("#nevento_edit").val()
			var descripcion = $("#descripcion").val()

			console.log(nevento_edit)
			console.log(descripcion)

			html += "<tr id='tr_procedure_edit2_"+count2+"'>"
				html += "<td><input type='text' name='nevento[]' value='"+nevento_edit+"'></td>"	
				html += "<td><input type='text' name='desc[]' value='"+descripcion+"'></td>"			

				html += "<td><span onclick='eliminarTr(\""+'#tr_procedure_edit2_'+count2+"\")' class='eliminar btn btn-sm btn-danger waves-effect' data-toggle='tooltip' title='Eliminar'><i class='fas fa-trash-alt' style='margin-bottom:5px'></i></span></td>"
			html += "</tr>"

			$("#intraoperatorio tbody").append(html);

			$("#nevento_edit,#descripcion").val("");

		});

		$("#btn_farmacos").click(function (e) {
			count2++
			var html
			var time_edit = $("#time_edit").val()
			var Farmaco_edit = $("#Farmaco_edit").val()
			var dosis_edit = $("#dosis_edit").val()
			var ta_edit = $("#ta_edit").val()
			var Fc_edit = $("#Fc_edit").val()
			var sat02_edit = $("#sat02_edit").val()
			var ramsay_edit = $("#ramsay_edit").val()

			console.log(time_edit)
			console.log(Farmaco_edit)
			console.log(dosis_edit)
			console.log(ta_edit)
			console.log(Fc_edit)
			console.log(sat02_edit)
			console.log(ramsay_edit)

			html += "<tr id='tr_procedure_edit2_"+count2+"'>"
				html += "<td><input type='text' name='time[]' value='"+time_edit+"'></td>"
				html += "<td><input type='text' name='Farmaco[]' value='"+Farmaco_edit+"'></td>"	
				html += "<td><input type='text' name='dosis[]' value='"+dosis_edit+"'></td>"	
				html += "<td><input type='text' name='ta[]' value='"+ta_edit+"'></td>"	
				html += "<td><input type='text' name='Fc[]' value='"+Fc_edit+"'></td>"	
				html += "<td><input type='text' name='sat02[]' value='"+sat02_edit+"'></td>"	
				html += "<td><input type='text' name='ramsay[]' value='"+ramsay_edit+"'></td>"		

				html += "<td><span onclick='eliminarTr(\""+'#tr_procedure_edit2_'+count2+"\")' class='eliminar btn btn-sm btn-danger waves-effect' data-toggle='tooltip' title='Eliminar'><i class='fas fa-trash-alt' style='margin-bottom:5px'></i></span></td>"
			html += "</tr>"

			$("#table_farmacos tbody").append(html);

			$("#time_edit,#Farmaco_edit,#dosis_edit,#ta_edit,#Fc_edit,#sat02_edit,#ramsay_edit").val("");

		});

		$("#btn_consultas").click(function (e) {
			count2++
			var html
			var consultas_edit = $("#consultas_edit").val()
			var valorconsult_edit = $("#valorconsult_edit").val()
			var resultadoconsult_edit = $("#resultadoconsult_edit").val()

			console.log(consultas_edit)
			console.log(valorconsult_edit)
			console.log(resultadoconsult_edit)

			html += "<tr id='tr_procedure_edit2_"+count2+"'>"
				html += "<td><input type='text' name='consultas[]' value='"+consultas_edit+"'></td>"
				html += "<td><input type='text' name='valorconsult[]' value='"+valorconsult_edit+"'></td>"				
				html += "<td><input type='text' name='resultadoconsult[]' value='"+resultadoconsult_edit+"'></td>"		

				html += "<td><span onclick='eliminarTr(\""+'#tr_procedure_edit2_'+count2+"\")' class='eliminar btn btn-sm btn-danger waves-effect' data-toggle='tooltip' title='Eliminar'><i class='fas fa-trash-alt' style='margin-bottom:5px'></i></span></td>"
			html += "</tr>"

			$("#table_consultas tbody").append(html);

			$("#consultas_edit,#valorconsult_edit,#resultadoconsult_edit").val("");

		});

		$("#btn_sistema").click(function (e) {
			count2++
			var html
			var sistema_edit = $("#sistema_edit").val()
			var hallazgo_edit = $("#hallazgo_edit").val()

			console.log(sistema_edit)
			console.log(hallazgo_edit)

			html += "<tr id='tr_procedure_edit2_"+count2+"'>"
				html += "<td><input type='text' name='sistema[]' value='"+sistema_edit+"'></td>"
				
				html += "<td><input type='text' name='hallazgo[]' value='"+hallazgo_edit+"'></td>"		

				html += "<td><span onclick='eliminarTr(\""+'#tr_procedure_edit2_'+count2+"\")' class='eliminar btn btn-sm btn-danger waves-effect' data-toggle='tooltip' title='Eliminar'><i class='fas fa-trash-alt' style='margin-bottom:5px'></i></span></td>"
			html += "</tr>"

			$("#table_sistema tbody").append(html);

			$("#sistema_edit,#hallazgo_edit").val("");

		});

		$("#btn_toxicologicos").click(function (e) {
			count2++
			var html
			var toxicologicos_edit = $("#toxicologicos_edit").val()
			var obs_toxico_edit = $("#obs_toxico_edit").val()

			console.log(toxicologicos_edit)
			console.log(obs_toxico_edit)

			html += "<tr id='tr_procedure_edit2_"+count2+"'>"
				html += "<td><input type='text' name='toxicologicos[]' value='"+toxicologicos_edit+"'></td>"
				
				html += "<td><input type='text' name='obstoxico[]' value='"+obs_toxico_edit+"'></td>"		

				html += "<td><span onclick='eliminarTr(\""+'#tr_procedure_edit2_'+count2+"\")' class='eliminar btn btn-sm btn-danger waves-effect' data-toggle='tooltip' title='Eliminar'><i class='fas fa-trash-alt' style='margin-bottom:5px'></i></span></td>"
			html += "</tr>"

			$("#table_toxicologicos tbody").append(html);

			$("#toxicologicos_edit,#obs_toxico_edit").val("");

		});

		$("#btn_quirurgicos").click(function (e) {
			count2++
			var html
			var quirurgicos_edit = $("#quirurgicos_edit").val()
			var quirur_edit = $("#quirur_edit").val()

			console.log(quirurgicos_edit)
			console.log(quirur_edit)

			html += "<tr id='tr_procedure_edit2_"+count2+"'>"
				html += "<td><input type='text' name='quirurgicos[]' value='"+quirurgicos_edit+"'></td>"
				html += "<td><input type='text' name='quir[]' value='"+quirur_edit+"'></td>"		

				html += "<td><span onclick='eliminarTr(\""+'#tr_procedure_edit2_'+count2+"\")' class='eliminar btn btn-sm btn-danger waves-effect' data-toggle='tooltip' title='Eliminar'><i class='fas fa-trash-alt' style='margin-bottom:5px'></i></span></td>"
			html += "</tr>"

			$("#table_quirurgicos tbody").append(html);

			$("#quirurgicos_edit,#quirur_edit").val("");

		});

		$("#btn_patologicos").click(function (e) {
			count2++
			var html
			var patologicos_edit = $("#patologicos_edit").val()
			var pato_edit = $("#pato_edit").val()

			console.log(patologicos_edit)
			console.log(pato_edit)

			html += "<tr id='tr_procedure_edit2_"+count2+"'>"
				html += "<td><input type='text' name='patologicos[]' value='"+patologicos_edit+"'></td>"
				html += "<td><input type='text' name='patolo[]' value='"+pato_edit+"'></td>"		

				html += "<td><span onclick='eliminarTr(\""+'#tr_procedure_edit2_'+count2+"\")' class='eliminar btn btn-sm btn-danger waves-effect' data-toggle='tooltip' title='Eliminar'><i class='fas fa-trash-alt' style='margin-bottom:5px'></i></span></td>"
			html += "</tr>"

			$("#table_patologicos tbody").append(html);

			$("#patologicos_edit,#pato_edit").val("");

		});

		$("#btn_familiares").click(function (e) {
			count2++
			var html
			var familiares_edit = $("#familiares_edit").val()
			var fami_edit = $("#fami_edit").val()

			console.log(familiares_edit)
			console.log(fami_edit)

			html += "<tr id='tr_procedure_edit2_"+count2+"'>"
				html += "<td><input type='text' name='familiares[]' value='"+familiares_edit+"'></td>"		
				html += "<td><input type='text' name='fami[]' value='"+fami_edit+"'></td>"	

				html += "<td><span onclick='eliminarTr(\""+'#tr_procedure_edit2_'+count2+"\")' class='eliminar btn btn-sm btn-danger waves-effect' data-toggle='tooltip' title='Eliminar'><i class='fas fa-trash-alt' style='margin-bottom:5px'></i></span></td>"
			html += "</tr>"

			$("#table_familiares tbody").append(html);

			$("#familiares_edit,#fami_edit").val("");

		});

		$("#btn_alergicos").click(function (e) {
			count2++
			var html
			var alergicos_edit = $("#alergicos_edit").val()
			var aler_edit = $("#aler_edit").val()

			console.log(alergicos_edit)
			console.log(aler_edit)

			html += "<tr id='tr_procedure_edit2_"+count2+"'>"
				html += "<td><input type='text' name='alergicos[]' value='"+alergicos_edit+"'></td>"		
				html += "<td><input type='text' name='aler[]' value='"+aler_edit+"'></td>"

				html += "<td><span onclick='eliminarTr(\""+'#tr_procedure_edit2_'+count2+"\")' class='eliminar btn btn-sm btn-danger waves-effect' data-toggle='tooltip' title='Eliminar'><i class='fas fa-trash-alt' style='margin-bottom:5px'></i></span></td>"
			html += "</tr>"

			$("#table_alergicos tbody").append(html);

			$("#alergicos_edit,#aler_edit").val("");

		});

		$("#btn-traslado").click(function (e) {
			count2++
			var html
			var traslado_edit = $("#traslado_edit").val()

			console.log(traslado_edit)

			html += "<tr id='tr_procedure_edit2_"+count2+"'>"
				html += "<td><input type='text' name='traslado[]' value='"+traslado_edit+"'></td>"		

				html += "<td><span onclick='eliminarTr(\""+'#tr_procedure_edit2_'+count2+"\")' class='eliminar btn btn-sm btn-danger waves-effect' data-toggle='tooltip' title='Eliminar'><i class='fas fa-trash-alt' style='margin-bottom:5px'></i></span></td>"
			html += "</tr>"

			$("#table-traslado tbody").append(html);

			$("#traslado_edit").val("");

		});

		
		$("#btn-monitoria").click(function (e) {
			count2++
			var html
			var monitoria_edit = $("#monitoria_edit").val()

			console.log(monitoria_edit)

			html += "<tr id='tr_procedure_edit2_"+count2+"'>"
				html += "<td><input type='text' name='monitoria[]' value='"+monitoria_edit+"'></td>"			

				html += "<td><span onclick='eliminarTr(\""+'#tr_procedure_edit2_'+count2+"\")' class='eliminar btn btn-sm btn-danger waves-effect' data-toggle='tooltip' title='Eliminar'><i class='fas fa-trash-alt' style='margin-bottom:5px'></i></span></td>"
			html += "</tr>"

			$("#tablmonito_edit tbody").append(html);

			$("#monitoria_edit").val("");

		});



		$("#btn-medicamento").click(function (e) {
			count2++
			var html
			var nommed_edit = $("#nomed_edit").val()
			var obmed_edit = $("#posologia_edit").val()
			var cantidadmed_edit = $("#cantidadmed_edit").val()
			var fechamed_edit = $("#fecha_edit").val()

			console.log(nomed_edit)
			console.log(posologia_edit)
			console.log(cantidadmed_edit)
			console.log(fecha_edit)

			html += "<tr id='tr_procedure_edit2_"+count2+"'>"
				html += "<td><input type='text' name='nommed[]' value='"+nommed_edit+"'></td>"
				html += "<td><input type='text' name='obmed[]' value='"+obmed_edit+"'></td>"
				html += "<td><input type='text' name='cantidadmed[]' value='"+cantidadmed_edit+"'></td>"
				html += "<td><input type='date' name='fechamed[]' value='"+fechamed_edit+"'></td>"

				html += "<td><span onclick='eliminarTr(\""+'#tr_procedure_edit2_'+count2+"\")' class='eliminar btn btn-sm btn-danger waves-effect' data-toggle='tooltip' title='Eliminar'><i class='fas fa-trash-alt' style='margin-bottom:5px'></i></span></td>"
			html += "</tr>"

			$("#tablemed_edit tbody").append(html);
			$("#fecha_edit,#cantidadmed_edit,#posologia_edit,#nomed_edit").val("");

		});

		$("#pay_consultation").change(function (e) {

			if(!$('#pay_consultation').is(':checked') ) {
				$("#code_prp-store").removeAttr("disabled").focus()
				$("#code_prp-store").attr("required", "required")
				$("#way_to_pay-store").removeAttr("required")
			}else{
				$("#code_prp-store").removeAttr("required")
				$("#code_prp-store").attr("disabled", "disabled")
				$("#way_to_pay-store").attr("required", "required")
			}

			});



			$("#way_to_pay-store").change(function (e) {

			if($(this).val() == "Transferencia"){
				$("#content_acquittance").css("display", "block")
				$("#acquittance").attr("required", "required")
			}else{
				$("#content_acquittance").css("display", "none")
				$("#acquittance").removeAttr("required")
			}

		});
		$("#process_status").click(function(e) {
		    ProcesStatus()
	     });

		 function getStatus(id_cliente){
			try {
				var url = document.getElementById('ruta').value;
				$.ajax({
					url: '' + url + '/api/clients/request/financing/status/credit/'+id_cliente,
					type:'GET',
					dataType:'JSON',
					error: function() {},
					success: function(data){
                        console.log(data, "CREDIT")
						$("#id_cliente").val(data.id_client)
						if(data.status == 'Pendiente'){
							$("#process_status").css('display','block')
						}else{
							$("#process_status").css('display','none')
						}

                        $("#method_pay_study_credit_edit").val(data.payment_method)
                        $("#date_pay_study_credit_edit").val(data.created_at)
                        $("#id_transaccion").val(data.id_transactions)


						if(data.photo_recived){
						    $("#load_img").attr('src', `img/credit/comprobantes/${data.photo_recived}`)
						}else{
						$("#load_img").attr('src', ``)
						}
					}
				});
			} catch (e) {
				console.log(e)
			}
		}
		function ProcesStatus() {
		try {
			var url = document.getElementById('ruta').value;
			$.ajax({
				url: '' + url + '/api/clients/request/financing/updated/status',
				type: 'POST',
				data:{ id:$("#id_cliente").val() },
				error: function() {},
					success: function(data){
						alert("La solicitud fue procesada correctamente");
						$("#process_status").css('display','none')
					}
			});
		} catch (e) {
			console.log(e)
		}
	}



	$("#state_edit").change(function (e) {

		if($(this).val() == "Operada"){
			$("#section_procedure").css("display", "block")
			$("#procedure_px_edit").removeAttr("disabled").attr("required", "required")
			$("#date_procedure_edit").removeAttr("disabled").attr("required", "required")
		}else{
			$("#section_procedure").css("display", "none")
			$("#procedure_px_edit").removeAttr("required").attr("disabled", "disabled")
			$("#date_procedure_edit").removeAttr("required").attr("disabled", "disabled")
		}

	});





	$("#btn-preanestesia").click(function (e) {
		
			const data = {
				id_client :  $("#id_edit").val(),
				pre_fecha: $("#fecha_preanestesia").val(),
				pre_nombre : $("#nombre_edit").val(),
				pre_identificacion : $("#identificacion_edit").val(),
				pre_genero : $("#gener").val(),
				pre_edad : $("#year_edit").val(),
				pre_estado : $("#estado_civil_edit").val(),
				pre_espquirurgica : $("#especialidades_quirurgica").val(),
				pre_procedimiento : $("#procedure").val(),
				pre_anestesicos : $("#anestesicos_edit").val(),
				pre_complicaciones : $("#Complicaciones_edit").val(),
				pre_alergicos : $("#Alergicos_edit").val(),
				pre_farmacologicos : $("#Farmacologicos_edit").val(),
				homorragicos : $("#Hemorragicos_edit").val(),
				pre_patologicos : $("#Patologicos_edit").val(),
				pre_quirurgicos: $("#Quirurgicos_edit").val(),
				pre_toxicos : $("#Toxicos_edit").val(),
				pre_transfuncionales : $("#Transfuncionales_edit").val(),
				pre_aleotros : $("#Otros_edit").val(),
				pre_arterial : $("#Tarterial_edit").val(),
				pre_cardio : $("#fcardiaca_edit").val(),
				pre_respiratorio : $("#Frespiratoria_edit").val(),
				pre_pulso : $("#Pulsometria_edit").val(),
				pre_temperatura : $("#Temperatura_edit").val(),
				pre_peso : $("#peso_edit").val(),
				pre_talla : $("#talla_edit").val(),
				pre_imc : $("#imc_edit").val(),
				pre_abdomen : $("#perimetro_edit").val(),
				pre_interpretacion : $("#interpretacion_edit").val(),
				pre_dominante : $("#dominante_edit").val(),
				pre_pulmonar : $("#pulmonar_edit").val(),
				pre_caracteristicas : $("#soplo_edit").val(),
				pre_ruidos : $("#rcardiacos_edit").val(),
				pre_soplos : $("#Soplos_edit").val(),
				pre_apertura : $("#Apertura_edit").val(),
				pre_cuello	 : $("#cnormal_edit").val(),
				pre_dientes : $("#dflojos_edit").val(),
				pre_lentes : $("#lcontacto_edit").val(),
				pre_masas : $("#masas_edit").val(),
				pre_protesis : $("#Protesis_edit").val(),
				pre_pulsos	:	$("#pulsos_edit").val(),
				pre_removible : $("#removible_edit").val(),
				pre_obsabdomen : $("#obsabdomen_edit").val(),
				pre_obsextremidades : $("#obsextremidades_edit").val(),
				pre_otroshalla : $("#obsotros_edit").val(),
				pre_hematocrito : $("#hematocrito_edit").val(),
				pre_creatina : $("#creatinina_edit").val(),
				pre_ureico : $("#Nureico_edit").val(),
				pre_glicemia : $("#glicemia_edit").val(),
				pre_albumina : $("#albúmina_edit").val(),
				pre_plaquetas : $("#plaquetas_edit").val(),
				pre_tp : $("#tp_edit").val(),
				pre_ptt : $("#ptt_edit").val(),
				pre_bun : $("#bun_edit").val(),
				pre_transaminas : $("#transaminasas_edit").val(),
				pre_pcr : $("#pcr_edit").val(),
				pre_igg1 : $("#igg1_edit").val(),
				pre_igg2 : $("#igg2_edit").val(),
				pre_electro : $("#electrocardiograma_edit").val(),
				pre_felectro : $("#electro_date").val(),
				pre_rx : $("#rtorax_edit").val(),
				pre_frx : $("#torax_date").val(),
				pre_otrostudios : $("#estudios_date").val(),
				pre_fotrostudios : $("#otrostudios_edit").val(),
				pre_asa : $("#asa_edit").val(),
				pre_recomendaciones : $("#recomendaciones_edit").val()
			}

			console.log(data)



			var url = document.getElementById('ruta').value;
			$.ajax({
				url: '' + url + '/api/save/preanestesia',
				type: 'POST',
				data: data,
				error: function() {},
					success: function(data){
						alert("La solicitud fue procesada correctamente");
					}
			});



		});



	
		$("#btn-quirurgica").click(function (e) {
		
		const data = {
			id_client :  $("#id_edit").val(),
				qui_cie10: $("#cie10_edit").val(),
				qui_diagnostico : $("#diagnostico_edit").val(),
				qui_tipo : $("#tipo_edit").val(),
				qui_anestesia : $("#tanestesia_edit").val(),
				qui_procedimiento : $("#pqp_edit").val(),
				qui_cirujano : $("#cirujano1_edit").val(),
				qui_cirujano2 : $("#cirujano2_edit").val(),
				qui_anestesiologo : $("#anesteciologo_edit").val(),
				qui_ayudante : $("#ayudante1_edit").val(),
				qui_ayudante2 : $("#ayudante2_edit").val(),
				qui_instrumentador : $("#instrumentador_edit").val(),
				qui_auxiliares : $("#auxiliares_edit").val(),
				qui_fecha : $("#fechaini_date").val(),
				qui_hora: $("#horaini_date").val(),
				qui_descripcion : $("#descripcion_edit").val(),
				qui_complicaciones : $("#complicacion_edit").val()
		
		}

		console.log(data)



		var url = document.getElementById('ruta').value;
		$.ajax({
			url: '' + url + '/api/save/quirurgica',
			type: 'POST',
			data: data,
			error: function() {},
				success: function(data){
					alert("La solicitud fue procesada correctamente");
				}
		});

	});


	
	
	$("#btn-historia").click(function (e) {
		
		const data = {

				id_client :  $("#id_edit").val(),
				his_motivo: $("#motivo_edit").val(),
				his_enfermedades : $("#enfermedad_edit").val(),
				his_patologicos : $("#patologicos_edit").val(),
				his_procedimientos	 : $("#pep_edit").val(),
				his_quirurgicos : $("#quiruant_edit").val(),
				his_hospitalarios	 : $("#hospitalarios").val(),
				his_farmacologicos	 : $("#farmante_edit").val(),
				his_alergicos : $("#alergicos_edit").val(),
				his_toxicos : $("#Toxicologicos_edit").val(),
				his_transfuncionales : $("#Transante_edit").val(),
				his_habitos : $("#Habitos_edit").val(),
				his_familiares : $("#Familiares_edit").val(),
				his_escleroterapia : $("#esclero_edit").val(),
				his_planificacion: $("#Planificación_edit").val(),
				his_factores : $("#Factores_edit").val(),
				his_otros : $("#otrante_edit").val(),
				his_gestaciones: $("#Gestaciones_edit").val(),
				his_partos : $("#partos_edit").val(),
				his_cesareas : $("#cesareas_edit").val(),
				his_abortos : $("#abortos_edit").val(),
				his_ectopicos : $("#ectopico_edit").val(),
				his_fmestruacion : $("#Fechamestruacion_edit").val(),
				his_ciclos : $("#ciclos_edit").val(),
				his_metodos : $("#planificacion_edit").val(),
				his_cardiobasculas : $("#cardio_edit").val(),
				his_digestivo : $("#digestivo_edit").val(),
				his_genitourinario : $("#Genitourinario_edit").val(),
				his_neurologico : $("#Neurologico_edit").val(),
				his_ocular : $("#Ocular_edit").val(),
				his_osteomuscular: $("#Osteomuscular_edit").val(),
				his_respiratorio : $("#Respiratorio_edit").val(),
				his_abdomen : $("#Abdomen_edit").val(),
				his_boca : $("#Boca_edit").val(),
				his_cabeza : $("#cabezacuello_edit").val(),
				his_cara: $("#cara_edit").val(),
				his_general : $("#general_edit").val(),
				his_nariz : $("#nariz_edit").val(),
				his_exameneurologico: $("#neurologicoexa_edit").val(),
				his_oidos	 : $("#oidos_edit").val(),
				his_ojos : $("#ojos_edit").val(),
				his_piel : $("#piel_edit").val(),
				his_musculoesqueletico	 : $("#musculoesqueletico_edit").val(),
				his_periferico : $("#vascular_edit").val(),
				his_torax	 : $("#torax_edit").val(),
				his_nombreservi : $("#cient_edit").val(),
				his_origenser : $("#origenant_edit").val(),
				his_resultadoser : $("#resultado_edit").val(),
				his_diagnosticoser:$("#cienconclusion_edit").val(),				

				
				consultas_data : $("input[name='consultas[]']")
              		.map(function(){return $(this).val();}).get(),
				valorconsult_data : $("input[name='valorconsult[]']")
					.map(function(){return $(this).val();}).get(),
				resultadoconsult_data : $("input[name='resultadoconsult[]']")
					.map(function(){return $(this).val();}).get(),


				
				
				his_med_nombre: $("input[name='nomed[]']")
              		.map(function(){return $(this).val();}).get(),
				his_med_posologia : $("input[name='obmed[]']")
              		.map(function(){return $(this).val();}).get(),
				his_med_cantidad : $("input[name='cantidadmed[]']")
					.map(function(){return $(this).val();}).get(),
				his_med_fecha : $("input[name='fechamed[]']")
              		.map(function(){return $(this).val();}).get(),

				
				remision_data : $("input[name='nomespe[]']")
              		.map(function(){return $(this).val();}).get(),
				his_rem_remision : $("input[name='remision[]']")
              		.map(function(){return $(this).val();}).get(),
				his_rem_fecha : $("input[name='fechacreacion[]']")
					.map(function(){return $(this).val();}).get(),

				
				incapacidad_data : $("input[name='incapacidad[]']")
              		.map(function(){return $(this).val();}).get(),
				his_inc_tipo : $("input[name='tipoin[]']")
              		.map(function(){return $(this).val();}).get(),
				his_inc_dias : $("input[name='diasin[]']")
					.map(function(){return $(this).val();}).get(),
				his_inc_fecha : $("input[name='fechain[]']")
					.map(function(){return $(this).val();}).get(),


				

				nombre_data : $("input[name='nomser[]']")
              		.map(function(){return $(this).val();}).get(),
				his_ser_observaciones : $("input[name='obser[]']")
              		.map(function(){return $(this).val();}).get(),
				his_ser_cantidad : $("input[name='cantidadser[]']")
					.map(function(){return $(this).val();}).get(),
				his_ser_fecha : $("input[name='fechaser[]']")
					.map(function(){return $(this).val();}).get()


		}

		console.log(data)

		var url = document.getElementById('ruta').value;
		$.ajax({
			url: '' + url + '/api/save/historia',
			type: 'POST',
			data: data,
			error: function() {},
				success: function(data){
					alert("La solicitud fue procesada correctamente");
				}
		});

	});


	$("#btn-notas").click(function (e) {
		
		const data = {
			id_client :  $("#id_edit").val(),
			not_enfermeria: $("#descripcion_enfermeria").val()
		
		}

		console.log(data)



		var url = document.getElementById('ruta').value;
		$.ajax({
			url: '' + url + '/api/save/notas',
			type: 'POST',
			data: data,
			error: function() {},
				success: function(data){
					alert("La solicitud fue procesada correctamente");
				}
		});
			

	});



	$("#btn-anestesia").click(function (e) {
		
		const data = {

			id_client :  $("#id_edit").val(),
				ane_anestesiologo : $("#anestesiologo_principal_edit").val(),
				ane_anestesiologo2 : $("#anestesiologo_secundario_edit").val(),
				ane_cirujano	 : $("#cirujano_principal_edit").val(),
				ane_cirujano2 : $("#segundo_cirujano_edit").val(),
				ane_instrumentador	 : $("#instrument_edit").val(),
				ane_auxiliar	 : $("#aux_sala_edit").val(),
				ane_principal : $("#anesteintra_principal_edit").val(),
				ane_diagnostico : $("#diagnóstico_edit").val(),
				ane_ayuno : $("#ayuno_edit").val(),
				ane_deficit : $("#Deficit_edit").val(),
				ane_mantenimiento : $("#mante_edit").val(),
				ane_volemia : $("#volemia_edit").val(),
				ane_pps: $("#pps_edit").val(),
				ane_anesteciatec : $("#anestesia_edit").val(),
				ane_aguja : $("#aguja_edit").val(),
				ane_cateter: $("#cateter_edit").val(),
				ane_puncion : $("#puncion_edit").val(),
				ane_antiseptico : $("#antiseptico_edit").val(),
				ane_bloqueo : $("#bloqueo_edit").val(),
				ane_metodo : $("#metodo_edit").val(),
				ane_neumo : $("#neumo_edit").val(),
				ane_numeroneumo : $("#neumon_edit").val(),
				ane_tubo : $("#tdl_edit").val(),
				ane_numerotubo : $("#tdln_edit").val(),
				ane_fechatoma : $("#fechatoma_edit").val(),
				ane_ph : $("#ph_edit").val(),
				ane_pco2 : $("#pco2_edit").val(),
				ane_pao2 : $("#pao2_edit").val(),
				ane_hco2: $("#hco2_edit").val(),
				ane_sat : $("#sat_edit").val(),
				ane_be	 : $("#be_edit").val(),
				ane_lact : $("#lact_edit").val(),
				ane_defict : $("#deficiteli_edit").val(),
				ane_perdidas: $("#perdidas_edit").val(),
				ane_diueresis : $("#diueresis_edit").val(),
				ane_sangrado : $("#Sangrado_edit").val(),
				ane_otroseliminados: $("#otroseli_edit").val(),
				ane_totaleliminados	 : $("#total_eliminados_edit").val(),
				ane_ringer : $("#ringer_edit").val(),
				ane_salina : $("#salinas_edit").val(),
				ane_coloies	 : $("#coloides_edit").val(),
				ane_sangre : $("#sangre_edit").val(),
				ane_rojos	 : $("#rojos_edit").val(),
				ane_otrosmetodo : $("#Otrosmed_edit").val(),
				ane_totalmetodo : $("#total_metodo_edit").val(),
				ane_traslado : $("#descripcion_traslado").val(),


				ane_premedicacion_id : $("#id_edit").val(),
				ane_premedicacion : $("input[name='medicamento[]']")
              		.map(function(){return $(this).val();}).get(),



				ane_monitoria_id : $("#id_edit").val(),
				mon_monitoria : $("input[name='monitoria[]']")
              		.map(function(){return $(this).val();}).get(),



				ane_intraoperatorio_id : $("#id_edit").val(),
				int_numero : $("input[name='nevento[]']")
              		.map(function(){return $(this).val();}).get(),
				int_descripcion : $("input[name='desc[]']")
              		.map(function(){return $(this).val();}).get(),


		}

		console.log(data)

		var url = document.getElementById('ruta').value;
		$.ajax({
			url: '' + url + '/api/save/anestesia',
			type: 'POST',
			data: data,
			error: function() {},
				success: function(data){
					alert("La solicitud fue procesada correctamente");
				}
		});

	});



	$("#btn-enfermeria").click(function (e) {
		
		const data = {
			id_client :  $("#id_edit").val(),
			enf_quirofano: $("#quirofano_edit").val(),
			enf_fechaini: $("#fechainicio_edit").val(),
			enfe_horaini: $("#horainicio_edit").val(),
			enf_fechafin: $("#fechafin_principal_edit").val(),
			enf_horafin: $("#horafin_principal_edit").val(),
			enf_fecha: $("#fechag_edit").val(),
			enf_hora: $("#hora_edit").val(),
			enf_tension: $("#tensionarterial_edit").val(),
			enf_cardiaca: $("#frecuencia_edit").val(),
			enf_oxigeno: $("#saturacion_edit").val(),
			enf_creacion: $("#creacion_edit").val()
		
		}

		console.log(data)



		var url = document.getElementById('ruta').value;
		$.ajax({
			url: '' + url + '/api/save/enfermeria',
			type: 'POST',
			data: data,
			error: function() {},
				success: function(data){
					alert("La solicitud fue procesada correctamente");
				}
		});
			

	});

	$("#btn-sedacion").click(function (e) {
		
		const data = {
			id_client :  $("#id_edit").val(),
			sed_solidos: $("#solidos1_edit").val(),
			sed_solidos2: $("#solidos2_edit").val(),
			sed_consulta: $("#motivo_consulta_edit").val(),
			sed_arterial: $("#tension_arteria_edit").val(),
			sed_cardiaca: $("#frecuencia_cardiaca_edit").val(),
			sed_peso: $("#peso_inicio_edit").val(),
			sed_talla: $("#talla_inicio_edit").val(),
			sed_imc: $("#imcdata_edit").val(),
			sed_asa: $("#clasificacion_asa_edit").val(),
			sed_4extremidades: $("#extremidades4_edit").val(),
			sed_4ok: $("#extr4_verify").val(),
			sed_2extremidades: $("#extremidades2_edit").val(),
			sed_2ok: $("#extre2_verify").val(),
			sed_koextremidades: $("#extremidades_edit").val(),
			sed_ko: $("#extre_verify").val(),
			sed_respira: $("#libre_edit").val(),
			sed_respiraok: $("#libre_verify").val(),
			sed_disnea: $("#limitada_edit").val(),
			sed_okdisnea: $("#respiracion_verify").val(),
			sed_apnea: $("#apnea_edit").val(),
			sed_okapnea: $("#apnea_verify").val(),
			sed_presedacion: $("#sedacion_edit").val(),
			sed_okpresedacion: $("#sedacion_verify").val(),
			sed_mediosedacion: $("#presed_edit").val(),
			sed_okmediosed: $("#pre_sedacion_edit").val(),
			sed_sensa: $("#pre_sedacion_verify").val(),
			sed_despierto: $("#despierto_edit").val(),
			sed_okdespierto: $("#despierto_verify").val(),
			sed_responde: $("#responde_edit").val(),
			sed_okresponde: $("#responde_verify").val(),
			sed_sinrespuesta: $("#noresponde_edit").val(),
			sed_oksinrespuesta: $("#noresponde_verify").val(),
			sed_observaciones: $("#observaciones_edit").val(),


		
			aler_item : $("input[name='alergicos[]']")
            	.map(function(){return $(this).val();}).get(),
			aler_observacion : $("input[name='aler[]']")
            	.map(function(){return $(this).val();}).get(),
				

				fam_item : $("input[name='familiares[]']")
              		.map(function(){return $(this).val();}).get(),
				fam_observacion : $("input[name='fami[]']")
              		.map(function(){return $(this).val();}).get(),

			
				pat_item : $("input[name='patologicos[]']")
              		.map(function(){return $(this).val();}).get(),
				pat_observacion : $("input[name='patolo[]']")
              		.map(function(){return $(this).val();}).get(),


	
				qui_item : $("input[name='quirurgicos[]']")
              		.map(function(){return $(this).val();}).get(),
				qui_observacion : $("input[name='quir[]']")
              		.map(function(){return $(this).val();}).get(),


			
				tox_item : $("input[name='toxicologicos[]']")
              		.map(function(){return $(this).val();}).get(),
				tox_observacion : $("input[name='obstoxico[]']")
              		.map(function(){return $(this).val();}).get(),


	
			incapacidad_data : $("input[name='time[]']")
              		.map(function(){return $(this).val();}).get(),
				mon_farmaco : $("input[name='Farmaco[]']")
              		.map(function(){return $(this).val();}).get(),
				mon_dosis : $("input[name='dosis[]']")
					.map(function(){return $(this).val();}).get(),
				mon_ta : $("input[name='ta[]']")
					.map(function(){return $(this).val();}).get(),
				mon_fc : $("input[name='Fc[]']")
					.map(function(){return $(this).val();}).get(),
				mon_sat : $("input[name='sat02[]']")
					.map(function(){return $(this).val();}).get(),
				mon_ramsay : $("input[name='ramsay[]']")
					.map(function(){return $(this).val();}).get(),


					

		}

		console.log(data)



		var url = document.getElementById('ruta').value;
		$.ajax({
			url: '' + url + '/api/save/sedacion',
			type: 'POST',
			data: data,
			error: function() {},
				success: function(data){
					alert("La solicitud fue procesada correctamente");
				}
		});
			

	});


	$("#btn-preoperatorio").click(function (e) {
		
		const data = {
			id_client :  $("#id_edit").val(),
			pro_cirugia: $("#programada_edit").val(),
			pro_quirofano: $("#quiro_edit").val(),
			pro_alimento: $("#alineamiento_edit").val(),
			pro_cirujano: $("#programadacirujano_edit").val(),
			pro_anestesiologo: $("#anestesiologo_edit").val(),
			pro_enfermera: $("#enfermera_edit").val(),
			pro_pertenencias: $("#pertenencias_edit").val(),
			pro_entrega: $("#entrega_edit").val(),
			pro_recibe: $("#recibe_edit").val(),
			

			pro_sistemas_id: $("#id_edit").val(),
			sis_nombre : $("input[name='sistema[]']")
              		.map(function(){return $(this).val();}).get(),
			sis_hallazgo : $("input[name='hallazgo[]']")
              		.map(function(){return $(this).val();}).get(),
		
		}

		console.log(data)



		var url = document.getElementById('ruta').value;
		$.ajax({
			url: '' + url + '/api/save/preoperatorio',
			type: 'POST',
			data: data,
			error: function() {},
				success: function(data){
					alert("La solicitud fue procesada correctamente");
				}
		});

	});




	function getPreanestesia(){
		

		var url = document.getElementById('ruta').value;
		$.ajax({
			url: '' + url + '/api/get/preanestesia/'+ $("#id_edit").val() ,
			type: 'GET',
			error: function() {},
			success: function(data){
				$("#fecha_preanestesia").val(data.pre_fecha),
				$("#gener").val(data.pre_genero),
				$("#estado_civil_edit").val(data.pre_estado),
				$("#year_edit").val(data.pre_edad),
				$("#especialidades_quirurgica").val(data.pre_espquirurgica),
				$("#procedure").val(data.pre_procedimiento),
				$("#anestesicos_edit").val(data.pre_anestesicos),
				$("#Complicaciones_edit").val(data.pre_complicaciones),
				$("#Alergicos_edit").val(data.pre_alergicos),
				$("#Farmacologicos_edit").val(data.pre_farmacologicos),
				$("#Hemorragicos_edit").val(data.homorragicos),
				$("#Patologicos_edit").val(data.pre_patologicos),
				$("#Quirurgicos_edit").val(data.pre_quirurgicos),
				$("#Toxicos_edit").val(data.pre_toxicos),
				$("#Transfuncionales_edit").val(data.pre_transfuncionales),
				$("#Otros_edit").val(data.pre_aleotros),
				$("#Tarterial_edit").val(data.pre_arterial),
				$("#fcardiaca_edit").val(data.pre_cardio),
				$("#Frespiratoria_edit").val(data.pre_respiratorio),
				$("#Pulsometria_edit").val(data.pre_pulso),
				$("#Temperatura_edit").val(data.pre_temperatura),
				$("#peso_edit").val(data.pre_peso),
				$("#talla_edit").val(data.pre_talla),
				$("#imc_edit").val(data.pre_imc),
				$("#perimetro_edit").val(data.pre_abdomen),
				$("#interpretacion_edit").val(data.pre_interpretacion),
				$("#dominante_edit").val(data.pre_dominante),
				$("#pulmonar_edit").val(data.pre_pulmonar),
				$("#soplo_edit").val(data.pre_caracteristicas),
				$("#rcardiacos_edit").val(data.pre_ruidos),
				$("#Apertura_edit").val(data.pre_apertura),
				$("#Soplos_edit").val(data.pre_soplos),
				$("#cnormal_edit").val(data.pre_cuello),
				$("#dflojos_edit").val(data.pre_dientes),
				$("#lcontacto_edit").val(data.pre_lentes),
				$("#masas_edit").val(data.pre_masas),
				$("#Protesis_edit").val(data.pre_protesis),
				$("#pulsos_edit").val(data.pre_pulsos),
				$("#removible_edit").val(data.pre_removible),
				$("#obsabdomen_edit").val(data.pre_obsabdomen),
				$("#obsextremidades_edit").val(data.pre_obsextremidades),
				$("#obsotros_edit").val(data.pre_otroshalla),
				$("#hematocrito_edit").val(data.pre_hematocrito),
				$("#creatinina_edit").val(data.pre_imc),
				$("#Nureico_edit").val(data.pre_ureico),
				$("#glicemia_edit").val(data.pre_glicemia),
				$("#albúmina_edit").val(data.pre_albumina),
				$("#plaquetas_edit").val(data.pre_plaquetas),
				$("#tp_edit").val(data.pre_tp),
				$("#ptt_edit").val(data.pre_ptt),
				$("#bun_edit").val(data.pre_bun),
				$("#transaminasas_edit").val(data.pre_transaminas),
				$("#pcr_edit").val(data.pre_pcr),
				$("#igg1_edit").val(data.pre_igg1),
				$("#igg2_edit").val(data.pre_igg2),
				$("#electrocardiograma_edit").val(data.pre_electro),
				$("#electro_date").val(data.pre_felectro),
				$("#rtorax_edit").val(data.pre_rx),
				$("#torax_date").val(data.pre_frx),
				$("#estudios_date").val(data.pre_otrostudios),
				$("#otrostudios_edit").val(data.pre_fotrostudios),
				$("#asa_edit").val(data.pre_asa),
				$("#recomendaciones_edit").val(data.pre_recomendaciones)
			}
		});


	}


function getFormQuirurgica(){


	var url = document.getElementById('ruta').value;
		$.ajax({
			url: '' + url + '/api/get/quirurgica/'+ $("#id_edit").val() ,
			type: 'GET',
			error: function() {},
			success: function(data){
				$("#cie10_edit").val(data.qui_cie10),
				$("#diagnostico_edit").val(data.qui_diagnostico),
				$("#tipo_edit").val(data.qui_tipo),
				$("#tanestesia_edit").val(data.qui_anestesia),
				$("#pqp_edit").val(data.qui_procedimiento),
				$("#cirujano1_edit").val(data.qui_cirujano),
				$("#cirujano2_edit").val(data.qui_cirujano2),
				$("#anesteciologo_edit").val(data.qui_anestesiologo),
				$("#ayudante1_edit").val(data.qui_ayudante),
				$("#ayudante2_edit").val(data.qui_ayudante2),
				$("#instrumentador_edit").val(data.qui_instrumentador),
				$("#auxiliares_edit").val(data.qui_auxiliares),
				$("#fechaini_date").val(data.qui_fecha),
				$("#horaini_date").val(data.qui_hora),
				$("#descripcion_edit").val(data.qui_descripcion),
				$("#complicacion_edit").val(data.qui_complicaciones)
			}
		});
}


function getFormhistroia(){


	var url = document.getElementById('ruta').value;
		$.ajax({
			url: '' + url + '/api/get/historia/'+ $("#id_edit").val() ,
			type: 'GET',
			error: function() {},
			success: function(data){
				$("#motivo_edit").val(data.his_motivo),
				$("#enfermedad_edit").val(data.his_enfermedades),
				$("#patologicos_edit").val(data.his_patologicos),
				$("#pep_edit").val(data.his_procedimientos),
				$("#quiruant_edit").val(data.his_quirurgicos),
				$("#hospitalarios").val(data.his_hospitalarios),
				$("#farmante_edit").val(data.his_farmacologicos),
				$("#alergicos_edit").val(data.his_alergicos),
				$("#Toxicologicos_edit").val(data.his_toxicos),
				$("#Transante_edit").val(data.his_transfuncionales),
				$("#Habitos_edit").val(data.his_habitos),
				$("#Familiares_edit").val(data.his_familiares),
				$("#esclero_edit").val(data.his_escleroterapia),
				$("#Planificación_edit").val(data.his_planificacion),
				$("#Factores_edit").val(data.his_factores),
				$("#otrante_edit").val(data.his_otros),
				$("#Gestaciones_edit").val(data.his_gestaciones),
				$("#partos_edit").val(data.his_partos),
				$("#cesareas_edit").val(data.his_cesareas),
				$("#abortos_edit").val(data.his_abortos),
				$("#ectopico_edit").val(data.his_ectopicos),
				$("#Fechamestruacion_edit").val(data.his_fmestruacion),
				$("#ciclos_edit").val(data.his_ciclos),
				$("#planificacion_edit").val(data.his_metodos),
				$("#cardio_edit").val(data.his_cardiobasculas),
				$("#digestivo_edit").val(data.his_digestivo),
				$("#Genitourinario_edit").val(data.his_genitourinario),
				$("#Neurologico_edit").val(data.his_neurologico),
				$("#Ocular_edit").val(data.his_ocular),
				$("#Osteomuscular_edit").val(data.his_osteomuscular),
				$("#Respiratorio_edit").val(data.his_respiratorio),
				$("#Abdomen_edit").val(data.his_abdomen),
				$("#Boca_edit").val(data.his_boca),
				$("#cabezacuello_edit").val(data.his_cabeza),
				$("#cara_edit").val(data.his_cara),
				$("#general_edit").val(data.his_general),
				$("#nariz_edit").val(data.his_nariz),
				$("#neurologicoexa_edit").val(data.his_exameneurologico),
				$("#oidos_edit").val(data.his_oidos),
				$("#ojos_edit").val(data.his_ojos),
				$("#piel_edit").val(data.his_piel),
				$("#musculoesqueletico_edit").val(data.his_musculoesqueletico),
				$("#vascular_edit").val(data.his_periferico),
				$("#torax_edit").val(data.his_torax),
				$("#cient_edit").val(data.his_abdomen),
				$("#cienconclusion_edit").val(data.his_diagnosticoser),
				$("#origenant_edit").val(data.his_origenser),
				$("#resultado_edit").val(data.his_resultadoser)



				CreateTableConsutlas(data.consultas)
				CreateTableMedicamento(data.medicamentos)
				CreateTableServicios(data.servicios)
				CreateTableRemision(data.Remision)
				CreateTableInacapacidad(data.incapacidad)
			
			}
		});
}


	function CreateTableConsutlas(data){
		var html
		$.map(data, function (item, key) {
			var consultas_edit = item.his_cons_consulta
			var valorconsult_edit = item.his_cons_resultado
			var resultadoconsult_edit =  item.his_cons_valor

			html += "<tr id='tr_procedure_edit2_"+count2+"'>"
				html += "<td><input type='text' name='consultas[]' value='"+consultas_edit+"'></td>"
				html += "<td><input type='text' name='valorconsult[]' value='"+valorconsult_edit+"'></td>"				
				html += "<td><input type='text' name='resultadoconsult[]' value='"+resultadoconsult_edit+"'></td>"		

				html += "<td><span onclick='eliminarTr(\""+'#tr_procedure_edit2_'+count2+"\")' class='eliminar btn btn-sm btn-danger waves-effect' data-toggle='tooltip' title='Eliminar'><i class='fas fa-trash-alt' style='margin-bottom:5px'></i></span></td>"
			html += "</tr>"

			$("#table_consultas tbody").append(html);
		});
		console.log(data)
	}

	
	
	function CreateTableMedicamento(data){
		var html
		$.map(data, function (item, key) {

			var nommed_edit = item.his_cons_valor
			var obmed_edit = item.his_cons_valor
			var cantidadmed_edit = item.his_cons_valor
			var fechamed_edit = item.his_cons_valor

			html += "<tr id='tr_procedure_edit2_"+count2+"'>"
				html += "<td><input type='text' name='nommed[]' value='"+nommed_edit+"'></td>"
				html += "<td><input type='text' name='obmed[]' value='"+obmed_edit+"'></td>"
				html += "<td><input type='text' name='cantidadmed[]' value='"+cantidadmed_edit+"'></td>"
				html += "<td><input type='date' name='fechamed[]' value='"+fechamed_edit+"'></td>"

				html += "<td><span onclick='eliminarTr(\""+'#tr_procedure_edit2_'+count2+"\")' class='eliminar btn btn-sm btn-danger waves-effect' data-toggle='tooltip' title='Eliminar'><i class='fas fa-trash-alt' style='margin-bottom:5px'></i></span></td>"
			html += "</tr>"

			$("#tablemed_edit tbody").append(html);		
		});
		console.log(data)
	}



	function CreateTableServicios(data){
		var html
		$.map(data, function(item,key){

			var nomser_edit = item.his_ser_nombre
			var obser_edit = item.his_ser_observaciones
			var cantidadser_edit = item.his_ser_cantidad
			var fechaser_edit = item.his_ser_fecha

			html += "<tr id='tr_procedure_edit2_"+count2+"'>"
				html += "<td><input type='text' name='nomser[]' value='"+nomser_edit+"'></td>"
				html += "<td><input type='text' name='obser[]' value='"+obser_edit+"'></td>"
				html += "<td><input type='text' name='cantidadser[]' value='"+cantidadser_edit+"'></td>"
				html += "<td><input type='date' name='fechaser[]' value='"+fechaser_edit+"'></td>"

				html += "<td><span onclick='eliminarTr(\""+'#tr_procedure_edit2_'+count2+"\")' class='eliminar btn btn-sm btn-danger waves-effect' data-toggle='tooltip' title='Eliminar'><i class='fas fa-trash-alt' style='margin-bottom:5px'></i></span></td>"
			html += "</tr>"

			$("#tableser_edit tbody").append(html);
		});
		console.log(data)
	}


	function CreateTableRemision(data){
		var html
		$.map(data,function(item,key){

			var nomespe_edit = item.his_rem_nombre
			var remision_edit = item.his_rem_remision
			var fechacreacion_edit = item.his_rem_fecha

			html += "<tr id='tr_procedure_edit2_"+count2+"'>"
				html += "<td><input type='text' name='nomespe[]' value='"+nomespe_edit+"'></td>"
				html += "<td><input type='text' name='remision[]' value='"+remision_edit+"'></td>"
				html += "<td><input type='date' name='fechacreacion[]' value='"+fechacreacion_edit+"'></td>"

				html += "<td><span onclick='eliminarTr(\""+'#tr_procedure_edit2_'+count2+"\")' class='eliminar btn btn-sm btn-danger waves-effect' data-toggle='tooltip' title='Eliminar'><i class='fas fa-trash-alt' style='margin-bottom:5px'></i></span></td>"
			html += "</tr>"

			$("#tablesp_edit tbody").append(html);
		});
		console.log(data)
	}

	function CreateTableInacapacidad(data){
		var html
		$.map(data,function (item,key){
			var incapacidad_edit = item.his_inc_motivo
			var diasin_edit = item.his_inc_dias
			var tipoin_edit = item.his_inc_tipo
			var fechain_edit = item.his_inc_fecha

			html += "<tr id='tr_procedure_edit2_"+count2+"'>"
				html += "<td><input type='text' name='incapacidad[]' value='"+incapacidad_edit+"'></td>"			
				html += "<td><input type='text' name='diasin[]' value='"+diasin_edit+"'></td>"
				html += "<td><input type='text' name='tipoin[]' value='"+tipoin_edit+"'></td>"
				html += "<td><input type='date' name='fechain[]' value='"+fechain_edit+"'></td>"

				html += "<td><span onclick='eliminarTr(\""+'#tr_procedure_edit2_'+count2+"\")' class='eliminar btn btn-sm btn-danger waves-effect' data-toggle='tooltip' title='Eliminar'><i class='fas fa-trash-alt' style='margin-bottom:5px'></i></span></td>"
			html += "</tr>"

			$("#tablin_edit tbody").append(html);
		});
		console.log(data)
	}


function getFormNotas(){
	var url = document.getElementById('ruta').value;
		$.ajax({
			url: '' + url + '/api/get/notas/'+ $("#id_edit").val() ,
			type: 'GET',
			error: function() {},
			success: function(data){
				$("descripcion_enfermeria").val(data.not_enfermeria)

				CreateTableNotas(data)
			}
		});
}

function CreateTableNotas(data){
	var html
	$.map(data,function (item,key){
		var data = item.not_enfermeria
		

			html += "<tr id='tr_procedure_edit2_"+count2+"'>"
				html += "<td><input type='text' name='notas_enferme[]' value='"+notas_edit+"'></td>"

				html += "<td><span onclick='eliminarTr(\""+'#tr_procedure_edit2_'+count2+"\")' class='eliminar btn btn-sm btn-danger waves-effect' data-toggle='tooltip' title='Eliminar'><i class='fas fa-trash-alt' style='margin-bottom:5px'></i></span></td>"
			html += "</tr>"

			$("#tablenfemeria_edit tbody").append(html);

	});
	console.log(data)
}



function getFormRegistros(){

	var url = document.getElementById('ruta').value;
	$.ajax({
		url: '' + url + '/api/get/registros/'+ $("#id_edit").val() ,
		type: 'GET',
		error: function() {},
		success: function(data){			

				$("#anestesiologo_principal_edit").val(data.ane_anestesiologo),
				$("#anestesiologo_secundario_edit").val(data.ane_anestesiologo2),
				$("#cirujano_principal_edit").val(data.ane_cirujano),
				$("#segundo_cirujano_edit").val(data.ane_cirujano2),
				$("#instrument_edit").val(data.ane_instrumentador),
				$("#aux_sala_edit").val(data.ane_auxiliar),
				$("#anesteintra_principal_edit").val(data.ane_principal),
				$("#diagnóstico_edit").val(data.ane_diagnostico),
				$("#ayuno_edit").val(data.ane_ayuno),
				$("#Deficit_edit").val(data.ane_defict),
				$("#mante_edit").val(data.ane_mantenimiento),
				$("#volemia_edit").val(data.ane_volemia),
				$("#pps_edit").val(data.ane_pps),
				$("#anestesia_edit").val(data.ane_anesteciatec),
				$("#aguja_edit").val(data.ane_aguja),
				$("#cateter_edit").val(data.ane_cateter),
				$("#puncion_edit").val(data.ane_puncion),
				$("#antiseptico_edit").val(data.ane_antiseptico),
				$("#bloqueo_edit").val(data.ane_bloqueo),
				$("#metodo_edit").val(data.ane_metodo),
				$("#neumo_edit").val(data.ane_neumo),
				$("#neumon_edit").val(data.ane_numeroneumo),
				$("#tdln_edit").val(data.ane_numerotubo),
				$("#tdl_edit").val(data.ane_tubo),
				$("#fechatoma_edit").val(data.ane_fechatoma),
				$("#ph_edit").val(data.ane_ph),
				$("#pco2_edit").val(data.ane_pco2),
				$("#pao2_edit").val(data.ane_pao2),
				$("#hco2_edit").val(data.ane_hco2),
				$("#sat_edit").val(data.ane_sat),
				$("#be_edit").val(data.ane_be),
				$("#lact_edit").val(data.ane_lact),
				$("#deficiteli_edit").val(data.ane_defict),
				$("#perdidas_edit").val(data.ane_perdidas),
				$("#diueresis_edit").val(data.ane_diueresis),
				$("#Sangrado_edit").val(data.ane_sangrado),
				$("#otroseli_edit").val(data.ane_otroseliminados),
				$("#total_eliminados_edit").val(data.ane_totaleliminados),
				$("#ringer_edit").val(data.ane_ringer),
				$("#salinas_edit").val(data.ane_salina),
				$("#coloides_edit").val(data.ane_coloies),
				$("#sangre_edit").val(data.ane_sangre),
				$("#rojos_edit").val(data.ane_rojos),
				$("#total_metodo_edit").val(data.ane_totalmetodo),
				$("#Otrosmed_edit").val(data.ane_traslado),
				$("#descripcion_traslado").val(data.ane_traslado)


				CreateTablePremedicacion(data.pre_medicacion)
				CreateTableMonitoria(data.monitoria)
				CreateTableOperatorio(data.operatorio)

		}
	});
}

function CreateTablePremedicacion(data){
	var html
	$.map(data,function(item,key){
		var pre_medicamento = item.ane_premedicacion

			html += "<tr id='tr_procedure_edit2_"+count2+"'>"
				html += "<td><input type='text' name='medicamento[]' value='"+pre_medicamento+"'></td>"			

				html += "<td><span onclick='eliminarTr(\""+'#tr_procedure_edit2_'+count2+"\")' class='eliminar btn btn-sm btn-danger waves-effect' data-toggle='tooltip' title='Eliminar'><i class='fas fa-trash-alt' style='margin-bottom:5px'></i></span></td>"
			html += "</tr>"

		$("#tablprem_edit tbody").append(html);
	});
	console.log(data)
}

function CreateTableMonitoria(data){
	var html
	$.map(data,function(item,key){

		var monitoria_edit = item.mon_monitoria

			html += "<tr id='tr_procedure_edit2_"+count2+"'>"
				html += "<td><input type='text' name='monitoria[]' value='"+monitoria_edit+"'></td>"			

				html += "<td><span onclick='eliminarTr(\""+'#tr_procedure_edit2_'+count2+"\")' class='eliminar btn btn-sm btn-danger waves-effect' data-toggle='tooltip' title='Eliminar'><i class='fas fa-trash-alt' style='margin-bottom:5px'></i></span></td>"
			html += "</tr>"

		$("#tablmonito_edit tbody").append(html);
	});
	console.log(data)
}


function CreateTableOperatorio(data){
	var html
	$.map(data,function(item,key){

		var nevento_edit = item.int_descripcion
		var descripcion = item.int_numero


			html += "<tr id='tr_procedure_edit2_"+count2+"'>"
				html += "<td><input type='text' name='nevento[]' value='"+nevento_edit+"'></td>"	
				html += "<td><input type='text' name='desc[]' value='"+descripcion+"'></td>"			

				html += "<td><span onclick='eliminarTr(\""+'#tr_procedure_edit2_'+count2+"\")' class='eliminar btn btn-sm btn-danger waves-effect' data-toggle='tooltip' title='Eliminar'><i class='fas fa-trash-alt' style='margin-bottom:5px'></i></span></td>"
			html += "</tr>"

		$("#intraoperatorio tbody").append(html);
	});
	console.log(data)
}


function getFormEnfermeria(){
	var url = document.getElementById('ruta').value;
	$.ajax({
		url: '' + url + '/api/get/enfermeria/'+ $("#id_edit").val() ,
		type: 'GET',
		error: function() {},
		success: function(data){
			$("#quirofano_edit").val(data.enf_quirofano),
			$("#fechainicio_edit").val(data.enf_fechaini),
			$("#horainicio_edit").val(data.enfe_horaini),
			$("#fechafin_principal_edit").val(data.enf_fechafin),
			$("#horafin_principal_edit").val(data.enf_horafin),
			$("#fecha_edit").val(data.enf_fecha),
			$("#hora_edit").val(data.enf_hora),
			$("#tensionarterial_edit").val(data.enf_tension),
			$("#frecuencia_edit").val(data.enf_cardiaca),
			$("#saturacion_edit").val(data.enf_oxigeno),
			$("#creacion_edit").val(data.enf_creacion)
		}
	});
}



function getFormSedacion(){
	var url = document.getElementById('ruta').value;
	$.ajax({
		url: '' + url + '/api/get/sedacion/'+ $("#id_edit").val() ,
		type: 'GET',
		error: function() {},
		success: function(data){
			$("#motivo_consulta_edit").val(data.sed_consulta),
			$("#tension_arteria_edit").val(data.sed_arterial),
			$("#frecuencia_cardiaca_edit").val(data.sed_cardiaca),
			$("#peso_inicio_edit").val(data.sed_peso),
			$("#talla_inicio_edit").val(data.sed_talla),
			$("#imcdata_edit").val(data.sed_imc),
			$("#clasificacion_asa_edit").val(data.sed_asa),
			$("#extremidades4_edit").val(data.sed_4extremidades),
			$("#extremidades2_edit").val(data.sed_2extremidades),
			$("#extremidades_edit").val(data.sed_koextremidades),
			$("#libre_edit").val(data.sed_respira),
			$("#limitada_edit").val(data.sed_disnea),
			$("#apnea_edit").val(data.sed_apnea),
			$("#sedacion_edit").val(data.sed_presedacion),
			$("#presed_edit").val(data.sed_mediosedacion),
			$("#pre_sedacion_edit").val(data.sed_okmediosed),
			$("#despierto_edit").val(data.sed_despierto),
			$("#responde_edit").val(data.sed_responde),
			$("#noresponde_edit").val(data.sed_sinrespuesta),
			$("#observaciones_edit").val(data.sed_observaciones)


			CreateTableConsutas(data.consulta)
			createTableFamiliares(data.familiares)
			CreateTablePatologicos(data.patologico)
			createTableQuirurgicos(data.quirurgicos)
			CreateTableToxicologicos(data.toxicologico)
			CreateTableMonitoria(data.monitoria)
			

		}
	});
}

	function CreateTableConsutas(data){
		var html
		$.map(data,function(item,key){

			var alergicos_edit = item.aler_item
			var aler_edit = item.aler_observacion

			html += "<tr id='tr_procedure_edit2_"+count2+"'>"
				html += "<td><input type='text' name='alergicos[]' value='"+alergicos_edit+"'></td>"		
				html += "<td><input type='text' name='aler[]' value='"+aler_edit+"'></td>"

				html += "<td><span onclick='eliminarTr(\""+'#tr_procedure_edit2_'+count2+"\")' class='eliminar btn btn-sm btn-danger waves-effect' data-toggle='tooltip' title='Eliminar'><i class='fas fa-trash-alt' style='margin-bottom:5px'></i></span></td>"
			html += "</tr>"

			$("#table_alergicos tbody").append(html);

		});
		console.log(data)
	}

	function createTableFamiliares(data){
	var html
	$.map(data, function(item,key){

		    var fam_item = item.fam_item
			var fam_observacion = item.fam_observacion

			html += "<tr id='tr_procedure_edit2_"+count2+"'>"
				html += "<td><input type='text' name='familiares[]' value='"+familiares_edit+"'></td>"		
				html += "<td><input type='text' name='fami[]' value='"+fami_edit+"'></td>"	

				html += "<td><span onclick='eliminarTr(\""+'#tr_procedure_edit2_'+count2+"\")' class='eliminar btn btn-sm btn-danger waves-effect' data-toggle='tooltip' title='Eliminar'><i class='fas fa-trash-alt' style='margin-bottom:5px'></i></span></td>"
			html += "</tr>"

			$("#table_familiares tbody").append(html);
		});

		console.log(data)
	}

function CreateTablePatologicos(data){
	var html
	$.map(data,function (item,key){

		var patologicos_edit = item.pat_item
		var pato_edit = item.pat_observacion

			html += "<tr id='tr_procedure_edit2_"+count2+"'>"
				html += "<td><input type='text' name='patologicos[]' value='"+patologicos_edit+"'></td>"
				html += "<td><input type='text' name='patolo[]' value='"+pato_edit+"'></td>"		

				html += "<td><span onclick='eliminarTr(\""+'#tr_procedure_edit2_'+count2+"\")' class='eliminar btn btn-sm btn-danger waves-effect' data-toggle='tooltip' title='Eliminar'><i class='fas fa-trash-alt' style='margin-bottom:5px'></i></span></td>"
			html += "</tr>"

		$("#table_patologicos tbody").append(html);

	});
	console.log(data)
}

function createTableQuirurgicos(data){
	var html
	$.map(data,function(item,key){
		var quirurgicos_edit = item.qui_item
		var quirur_edit = item.qui_observacion

			html += "<tr id='tr_procedure_edit2_"+count2+"'>"
				html += "<td><input type='text' name='quirurgicos[]' value='"+quirurgicos_edit+"'></td>"
				html += "<td><input type='text' name='quir[]' value='"+quirur_edit+"'></td>"		

				html += "<td><span onclick='eliminarTr(\""+'#tr_procedure_edit2_'+count2+"\")' class='eliminar btn btn-sm btn-danger waves-effect' data-toggle='tooltip' title='Eliminar'><i class='fas fa-trash-alt' style='margin-bottom:5px'></i></span></td>"
			html += "</tr>"

		$("#table_quirurgicos tbody").append(html);


	});
	console.log(data)
}

function CreateTableToxicologicos(data){
	var html 
	$.map(data,function(item,key){
		var toxicologicos_edit = item.tox_item
		var obs_toxico_edit = item.tox_observacion

			console.log(toxicologicos_edit)
			console.log(obs_toxico_edit)

			html += "<tr id='tr_procedure_edit2_"+count2+"'>"
				html += "<td><input type='text' name='toxicologicos[]' value='"+toxicologicos_edit+"'></td>"
				
				html += "<td><input type='text' name='obstoxico[]' value='"+obs_toxico_edit+"'></td>"		

				html += "<td><span onclick='eliminarTr(\""+'#tr_procedure_edit2_'+count2+"\")' class='eliminar btn btn-sm btn-danger waves-effect' data-toggle='tooltip' title='Eliminar'><i class='fas fa-trash-alt' style='margin-bottom:5px'></i></span></td>"
			html += "</tr>"

		$("#table_toxicologicos tbody").append(html);

	});
	console.log(data)
}



	function CreateTableMonitoria(data){
		var html
		$.map(data, function (item,key){

			var time_edit = item.mon_tiempo
			var Farmaco_edit = item.mon_farmaco
			var dosis_edit = item.mon_dosis
			var ta_edit = item.mon_ta
			var Fc_edit = item.mon_fc
			var sat02_edit = item.mon_sat
			var ramsay_edit = item.mon_ramsay

			html += "<tr id='tr_procedure_edit2_"+count2+"'>"
				html += "<td><input type='text' name='time[]' value='"+time_edit+"'></td>"
				html += "<td><input type='text' name='Farmaco[]' value='"+Farmaco_edit+"'></td>"	
				html += "<td><input type='text' name='dosis[]' value='"+dosis_edit+"'></td>"	
				html += "<td><input type='text' name='ta[]' value='"+ta_edit+"'></td>"	
				html += "<td><input type='text' name='Fc[]' value='"+Fc_edit+"'></td>"	
				html += "<td><input type='text' name='sat02[]' value='"+sat02_edit+"'></td>"	
				html += "<td><input type='text' name='ramsay[]' value='"+ramsay_edit+"'></td>"		

				html += "<td><span onclick='eliminarTr(\""+'#tr_procedure_edit2_'+count2+"\")' class='eliminar btn btn-sm btn-danger waves-effect' data-toggle='tooltip' title='Eliminar'><i class='fas fa-trash-alt' style='margin-bottom:5px'></i></span></td>"
			html += "</tr>"

			$("#table_farmacos tbody").append(html);

		});
		console.log(data)
	}

	


function getFormPreoperatorio(){
	var url = document.getElementById('ruta').value;
	$.ajax({
		url: '' + url + '/api/get/preoperatorio/'+ $("#id_edit").val() ,
		type: 'GET',
		error: function() {},
		success: function(data){
			$("#programada_edit").val(data.pro_cirugia),
			$("#quiro_edit").val(data.pro_quirofano),
			$("#alineamiento_edit").val(data.pro_alimento),
			$("#programadacirujano_edit").val(data.pro_cirujano),
			$("#anestesiologo_edit").val(data.pro_anestesiologo),
			$("#enfermera_edit").val(data.pro_enfermera),
			$("#pertenencias_edit").val(data.pro_pertenencias),
			$("#entrega_edit").val(data.pro_entrega),
			$("#recibe_edit").val(data.pro_recibe)

			CreateTableOperatorio(data.operatorio)
		}
	});
}

function CreateTableOperatorio(data){
	var html
	$.map(data,function (item,key){

		var sistema_edit = item.sis_nombre
		var hallazgo_edit = item.sis_hallazgo

			html += "<tr id='tr_procedure_edit2_"+count2+"'>"
				html += "<td><input type='text' name='sistema[]' value='"+sistema_edit+"'></td>"
				
				html += "<td><input type='text' name='hallazgo[]' value='"+hallazgo_edit+"'></td>"		

				html += "<td><span onclick='eliminarTr(\""+'#tr_procedure_edit2_'+count2+"\")' class='eliminar btn btn-sm btn-danger waves-effect' data-toggle='tooltip' title='Eliminar'><i class='fas fa-trash-alt' style='margin-bottom:5px'></i></span></td>"
			html += "</tr>"

		$("#table_sistema tbody").append(html);

	});

	console.log(data)
}


	</script>

	@endsection


