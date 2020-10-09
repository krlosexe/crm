<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
	<link rel="icon" type="image/png" href="assets/img/favicon.png">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<title>Get Shit Done Bootstrap Wizard by Creative Tim</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />

	<!--     Fonts and icons     -->
    <link href="http://netdna.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.css" rel="stylesheet">


    <link href="<?= url('/') ?>/vendor/sweetalert/sweetalert.css" rel="stylesheet">

  <link href="<?= url('/') ?>/vendor/select2-4.0.11/dist/css/select2.min.css" rel="stylesheet" />


	<!-- CSS Files -->
    <link href="<?= url('/') ?>/css/wizard/bootstrap.min.css" rel="stylesheet" />
	<link href="<?= url('/') ?>/css/wizard/gsdk-bootstrap-wizard.css" rel="stylesheet" />

	<!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="<?= url('/') ?>/css/wizard/demo.css" rel="stylesheet" />
  

  @if($id_line == 6 )
    <style>

        
        .wizard-card[data-color="orange"] .moving-tab{
          background: #226fe2;
        }

        .btn-fill.btn-warning{
          background-color: #226fe2;
          border-color: #226fe2;
        }

        .btn-fill.btn-warning:hover{
          background-color: #226fe2;
          border-color: #226fe2;
        }

        .btn-warning{
          background-color: #226fe2 !important;
          border-color: #226fe2 !important;
        }


    </style>
  @endif


 
</head>

<body>


<!--      Wizard container        -->
<div class="wizard-containersss" style="width: 80%;margin: 8% auto 0;">
<input type="hidden" id="ruta" value="<?= url('/') ?>">
<div class="card wizard-cardsss" data-color="orange" id="wizardProfile" style="padding: 2%">
    <form action="" method="post" id="form-submit">
<!--        You can switch ' data-color="orange" '  with one of the next bright colors: "blue", "green", "orange", "red"          -->
      @csrf   


        <input type="hidden" name="id_line" value="{{$id_line}}">


        <div class="wizard-header">
            <h6>
              <b>AUTORIZACIÓN PARA CONSULTA Y REPORTE A CENTRALES DE BANCOS DE DATOS E INFORMACIÓN COMERCIAL</b><br>
              
            </h6>



            <div class="row">
              <div class="col-md-4">
                <div class="form-group">
                    <label for=""><b>Nombres</b></label>
                    <input type="text" name="names" id="names" class="form-control" required>
                </div>
              </div>

              <div class="col-md-4">
                <div class="form-group">
                    <label for=""><b>Apellidos</b></label>
                    <input type="text" name="last_names" id="last_names" class="form-control" required>
                </div>
              </div>


              <div class="col-md-4">
                <div class="form-group">
                    <label for=""><b>Número de Cédula</b></label>
                    <input type="text" name="number_document" id="number_document" class="form-control" required>
                </div>
              </div>



            </div>



            <div class="row">
              <div class="col-md-4">
                <div class="form-group">
                    <label for=""><b>Teléfono fijo</b></label>
                    <input type="text" name="phone_house" id="phone_house" class="form-control" required>
                </div>
              </div>

              <div class="col-md-4">
                <div class="form-group">
                    <label for=""><b>Teléfono de trabajo</b></label>
                    <input type="text" name="phone_mobil" id="phone_mobil" class="form-control" required>
                </div>
              </div>

              <div class="col-md-4">
                <div class="form-group">
                    <label for=""><b>E-mail</b></label>
                    <input type="email" name="email" id="email" class="form-control" required>
                </div>
              </div>
            </div>



            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                    <label for=""><b>Dirección</b></label>
                    <textarea name="address" id="" cols="30" rows="10" class="form-control" required></textarea>
                </div>
              </div>

            </div>


            <div class="row">
                <div class="col-md-12">
                  <div class="pull-right">
                    <input type='submit' id="btn-submit" class='btn  btn-fill btn-warning btn-sm' name='finish' value='Guardar' />
                  </div>

                  <div class="pull-left">
                      <input type='checkbox' class='form-comtrol' name='accept' value='1'  id="accept" required/>
                      @if($id_line == 6)
                        <label for="accept">He leído y acepto los </label> <a href="<?= url('/') ?>/autorizacion.pdf" target="_blank">términos y condiciones</a>
                      @endif


                      @if($id_line == 3)
                        <label for="accept">He leído y acepto los </label> <a href="<?= url('/') ?>/autorizacion.pdf" target="_blank">términos y condiciones</a>
                      @endif




                      @if($id_line == 16)
                        <label for="accept">He leído y acepto los </label> <a href="<?= url('/') ?>/Autorizacion_planmed.pdf" target="_blank">términos y condiciones</a>
                      @endif


                      
                  </div>
              </div>
            </div>






        </div>


        

    </form>
</div>
</div> <!-- wizard container -->




</body>

	<!--   Core JS Files   -->
	<script src="<?= url('/') ?>/js/wizard/jquery-2.2.4.min.js" type="text/javascript"></script>
	<script src="<?= url('/') ?>/js/wizard/bootstrap.min.js" type="text/javascript"></script>
	<script src="<?= url('/') ?>/js/wizard/jquery.bootstrap.wizard.js" type="text/javascript"></script>

	<!--  Plugin for the Wizard -->
	<script src="<?= url('/') ?>/js/wizard/gsdk-bootstrap-wizard.js"></script>

	<!--  More information about jquery.validate here: http://jqueryvalidation.org/	 -->
  <script src="<?= url('/') ?>/js/wizard/jquery.validate.min.js"></script>



  <script src="<?= url('/') ?>/vendor/sweetalert/sweetalert.min.js" type="text/javascript"></script>
    <script src="<?= url('/') ?>/vendor/sweetalert/sweetalert-dev.js" type="text/javascript"></script>

    <script src="<?= url('/') ?>/vendor/select2-4.0.11/dist/js/select2.min.js"></script>



  <script src="<?= url('/') ?>/js/funciones.js"></script>

  <script>
    enviarFormulario23("#form-submit", "api/form/authorization/studio/credit")

  function enviarFormulario23(form, controlador){   
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
                    
                },
                error: function (repuesta) {
                  $('#btn-submit').removeAttr('disabled'); 
                },
                 success: function(respuesta){

                  console.log(respuesta)
                   warning("Los datos fueron enviados exitosamente, en breve sera atendido por uno de nuestros asesores")
                   $("#form-submit")[0].reset();

                   $('#btn-submit').removeAttr('disabled'); 

                 //  setTimeout(function(){ location.reload(); }, 5000);

                }

            });
        });
    }
  </script>

</html>
