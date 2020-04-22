<!DOCTYPE html>
<html lang="es">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>CRM - PDT</title>

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



  
  @if(Request::path() != '/')

    <script>
      $(document).ready(function(){

        var url = $(location).attr('href').split("/").splice(-3);
        validAuth(false, url[0]);

        GetNotifications();

      });
    </script>

  @endif

</head>

<body class="{{ Request::path() != '/' ? 'dasboard-body' : ''}} bg-gradient-primary">
  <div id="page-loader"  ><span class="preloader-interior"></span></div>

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

          @include('catalogos.clientes.edit2')


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
<input type="hidden" id="id_cliente" value="{{ $id }}">
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
    <script src="https://cdn.datatables.net/buttons/1.6.1/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.1/js/buttons.print.min.js"></script>
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
                list();

                update();


            });

                /* ------------------------------------------------------------------------------- */
                /*
                    Funcion que envia los datos de los formularios.
                */
            function enviarFormularioPut2(form, controlador, cuadro, auth = false, inputFile){
                $(form).submit(function(e){
                    e.preventDefault(); //previene el comportamiento por defecto del formulario al darle click al input submit
                    var url=document.getElementById('ruta').value; 
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

                                    window.location.href = url+"/clients";
                                }
                            
                            }

                        }

                    });
                });
            }


            function update(){
				enviarFormularioPut2("#form-update", 'api/clients', '#cuadro4');
            }
            

            function list(){
                var url=document.getElementById('ruta').value;
                $.ajax({
                    url:`${url}/api/clients/${$("#id_cliente").val()}`,
                    type:'GET',
                    data: {
                        "id_user": id_user,
                        "token"  : tokens
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
                        

                        GetCity("#city_edit");
                        GetClinic("#city_edit", "#clinic_edit")
                    //	GetAsesorasbyBusisnessLine("#linea-negocio-edit", "#asesora-edit");
                        GetBusinessLine("#linea-negocio-edit");

                        GetAsesorasValoracion2("#asesora-edit", data.id_user_asesora)

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


				

					GetComments("#comments_edit", data.id_cliente)




				

					/*var url = document.getElementById('ruta').value+"/valuations/client/"+data.id_cliente+"/1"
					$('#iframeValuationsEdit').attr('src', url);


					var url = document.getElementById('ruta').value+"/preanesthesia/client/"+data.id_cliente+"/1"
					$('#iframepPreanestesiaEdit').attr('src', url);


					var url = document.getElementById('ruta').value+"/surgeries/client/"+data.id_cliente+"/1"
					$('#iframepCirugiaEdit').attr('src', url);


					var url = document.getElementById('ruta').value+"/revision-appointment/client/"+data.id_cliente+"/1"
					$('#iframepRevisionEdit').attr('src', url);


					var url = document.getElementById('ruta').value+"/clients/tasks/"+data.id_cliente+"/1"
					$('#iframepTracingEdit').attr('src', url);



*/
					valuations("#tab4_edit", "#iframeValuationsEdit", data)
					preanestesias("#tab5_edit", "#iframepPreanestesiaEdit", data)
					surgeries("#tab6_edit", "#iframepCirugiaEdit", data)
					revisiones("#tab7_edit", "#iframepRevisionEdit", data)
					tasks("#tab8_edit", "#iframepTracingEdit", data)
                 
                    }
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




			function copyToClipboard(element) {
				var $temp = $("<input>");
				$("body").append($temp);
				$temp.val($(element).text()).select();
				document.execCommand("copy");
				$temp.remove();

				mensajes('success', "Codigo: "+$(element).text()+" Copiado");


			}





      </script>
  

</body>

</html>
