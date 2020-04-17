<!DOCTYPE html>
<html lang="es">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>App</title>

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

  @if($id_line == 8)
     <style>
        h6.text-primary, label{
          color: #800080 !important;
        }
     </style>
  @endif
</head>


  <body class="{{ Request::path() != '/' ? 'dasboard-body' : ''}} bg-gradient-primary" style="{{ $id_line != 17 ? 'overflow: hidden;' : ''}} background: #fff !important;
  ">

<div class="card shadow mb-4 " id="cuadro2">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Trabaja con Nosotros</h6>
  </div>
  <div class="card-body">
      <form class="user" autocomplete="off" method="post" id="store" enctype="multipart/form-data">
        @csrf

        <input type="hidden" name="_method" value="post">

        <div class="row">
			
			
           <div class="col-md-12">
              
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                        <label for=""><b>INGRESA TU NOMBRE COMPLETO:*</b></label>
                        <input type="text" name="nombres" id="nombres" class="form-control" required >
                    </div>
                </div>
              </div>


              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                        <label for=""><b> NÚMERO DE WHATSAPP O CELULAR *</b></label>
                        <input type="number" name="telefono" id="telefono" class="form-control" required >
                    </div>
                </div>
              </div>


              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                        <label for=""><b>CORREO ELECTRONICO *</b></label>
                        <input type="email" name="email" id="email" class="form-control" required >
                    </div>
                </div>
              </div>


              
			        <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                        <label for=""><b>INGRESA LA FECHA EN LA QUE TE OPERASTE CON NOSOTROS (si no eres paciente operado aun selecciona la fecha de hoy):*</b></label>
                        <input type="date" name="fecha_opero" id="fecha_opero" class="form-control" required >
                    </div>
                </div>
              </div>



			       <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                        <label for=""><b>¿QUE CIRUGÍA TE PRACTICASTE?(si aun no eres nuestro paciente deja este campo en blanco)</b></label>
                        <input type="text" name="surgeri" id="surgeri" class="form-control" >
                    </div>
                </div>
              </div>




              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                        <label for=""><b>¿DESEAS QUE TE PROGRAMEMOS UNA CITA DE CONTROL? (si aun no eres nuestro paciente selecciona "NO")</b></label>

                        <div class="row">
                            <div class="col-md-12">
                              <div class="form-check">
                                <input class="form-check-input" type="radio" name="radios" id="exampleRadios1" value="SI" checked>
                                <label class="form-check-label" for="exampleRadios1">
                                  Si
                                  </label>
                              </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-check">
                                  <input class="form-check-input" type="radio" name="radios" id="exampleRadios2" value="NO" checked>
                                  <label class="form-check-label" for="exampleRadios2">
                                    No
                                  </label>
                                </div>
                            </div>
                        </div>

                        <p>*La cita de revisión sera asignada de acuerdo a disponibilidad en agenda*</p>
                        
                    </div>
                </div>
              </div>






              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                        <label for=""><b>EL PAGO DE LA BONIFICACION PREFIERES QUE SEA:</b></label>

                        <div class="row">
                            <div class="col md-12">
                                <div class="form-check">
                                  <input class="form-check-input" type="radio" name="radiosPago" id="radiosPago1" value="Efectivo" required>
                                  <label class="form-check-label" for="radiosPago1">
                                  Efectivo
                                  </label>
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-check">
                                  <input class="form-check-input" type="radio" name="radiosPago" id="radiosPago2" value="Transferencia" required> 
                                  <label class="form-check-label" for="radiosPago2">
                                  Transferencia Bancaria (Bancolombia)
                                  </label>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
              </div>



              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                        <label for=""><b>SI ELEGISTE PAGO POR TRANSFERENCIA INGRESA</b></label>
                        <br>
                        <label for=""><b>Nombre del Titular</b></label>
                        <input type="text" name="name_titular" class="form-control"  >
                        <br>
                        <label for=""><b>Numero de Cedula</b></label>
                        <input type="text" name="cedula_titular" class="form-control"  >
                        <br>
                        <label for=""><b>Número de Cuenta</b></label>
                        <input type="text" name="cuenta_titular" class="form-control"  >
                    </div>
                </div>
              </div>




              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                        <label for=""><b>¿TIENES ALGUNA SUGERENCIA PARA NUESTRO GRUPO?</b></label>
                        <textarea name="sugrencias" id="" cols="30" rows="10" class="form-control"></textarea>
                    </div>
                </div>
              </div>






	
              
           </div>

        </div>

       		<input type="hidden" name="state" value="No Contactada">
			   <input type="hidden" name="origen" value="Formulario Web">
		    	<input type="hidden" name="id_line" id="id_line" value="{{$id_line}}">
          <input type="hidden" name="adviser" id="adviser" value="{{$id_asesora}}">
          <br>
          <br>
        </div>
          <center>
            <button id="btn-submit" class="btn btn-primary btn-user">
                Enviar
            </button>

          </center>
          <br>
          <br>
      </form>
      
    </div>

	
		  
	<input type="hidden" id="ruta" value="<?= url('/') ?>">


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
    //var user_id = localStorage.getItem('user_id');
	

	$(document).ready(function(){
		store();
	});


	function store(){
		id_user = 69;
		enviarFormularioForm("#store", 'api/clients/forms/prp/adviser', '#cuadro2');
	}



	function enviarFormularioForm(form, controlador, cuadro, auth = false){
        $(form).submit(function(e){
            e.preventDefault(); //previene el comportamiento por defecto del formulario al darle click al input submit
            var url=document.getElementById('ruta').value; //obtiene la ruta del input hidden con la variable
            var formData=new FormData($(form)[0]); //obtiene todos los datos de los inputs del formulario pasado por parametros
            var method = $(this).attr('method'); //obtiene el method del formulario
            $('input[type="submit"]').attr('disabled','disabled'); //desactiva el input submit
            $.ajax({
                url:''+url+'/'+controlador+'',
                type:method,
                dataType:'JSON',
                data:formData,
                cache:false,
                contentType:false,
                processData:false,
                beforeSend: function(){
                    mensajes('info', '<span>Espere por favor... <i class="fa fa-spinner fa-spin" aria-hidden="true"></i></span>');

                    $('#btn-submit').attr("disabled", "disabled")
                    $('#btn-submit').text("Espere...")


                },
                error: function (repuesta) {
                    $('#btn-submit').removeAttr('disabled'); //activa el input submit
                    $('#btn-submit').text("Enviar")
                    var errores=repuesta.responseText;
                    if(errores!=""){
                    mensajes('danger', errores);
                    warning(respuesta.errores)
                            }else{
                    mensajes('danger', "<span>Ha ocurrido un error, por favor intentelo de nuevo.</span>");  
                    warning("Ha ocurrido un error, por favor intentelo de nuevo.")
                  }
					   
                },
                 success: function(respuesta){
                   $('#btn-submit').removeAttr('disabled'); //activa el input submit
                    $('#btn-submit').text("Enviar")
                  warning(respuesta.mensagge)
                  $("#store")[0].reset();
                 // enviarEmail()
                }	

            });
        });
    }



    function enviarEmail(){
        
        var url=document.getElementById('ruta').value; //obtiene la ruta del input hidden con la variable
        $('input[type="submit"]').attr('disabled','disabled'); //desactiva el input submit
        $.ajax({
            url:''+url+'/api/email/forms/',
            type:"GET",
            dataType:'JSON',
            data:{
              nombres : $("#nombres").val(),
              apellidos : $("#apellidos").val(),
              identificacion : $("#identificacion").val(),
              fecha_nacimiento : $("#fecha_nacimiento").val(),
              direccion : $("#direccion").val(),
              telefono : $("#telefono").val(),
              email : $("#email").val(),
              user_id : $("#id_user").val()
            },
            beforeSend: function(){
                mensajes('info', '<span>Espere por favor... <i class="fa fa-spinner fa-spin" aria-hidden="true"></i></span>');
            },
            error: function (repuesta) {
                $('input[type="submit"]').removeAttr('disabled'); //activa el input submit
                var errores=repuesta.responseText;
                if(errores!=""){
                mensajes('danger', errores);
                warning(respuesta.errores)
                        }else{
                mensajes('danger', "<span>Ha ocurrido un error, por favor intentelo de nuevo.</span>");  
                warning("Ha ocurrido un error, por favor intentelo de nuevo.")
              }
          
            },
              success: function(respuesta){
                
                 $("#store")[0].reset();
            }	

        });
       
    }

  </script>

  

  

</body>

</html>



