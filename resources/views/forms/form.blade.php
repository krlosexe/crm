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
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">
  <link href="css/custom.css" rel="stylesheet">



  <link href="vendor/bootstrap-fileinput/css/fileinput.css" media="all" rel="stylesheet" type="text/css"/>
  <link href="vendor/bootstrap-fileinput/themes/explorer-fas/theme.css" media="all" rel="stylesheet" type="text/css"/>

  <script src="vendor/jquery/jquery.min.js"></script>
    <!-- Custom styles for this page -->
  <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
  <link href="vendor/sweetalert/sweetalert.css" rel="stylesheet">


  <link href="vendor/select2-4.0.11/dist/css/select2.min.css" rel="stylesheet" />


</head>


<body class="{{ Request::path() != '/' ? 'dasboard-body' : ''}} bg-gradient-primary" style="overflow: hidden;background: #fff !important;
">


<div class="card shadow mb-4 " id="cuadro2">
  <div class="card-header py-3">
    <h6 class="m-0 font-weight-bold text-primary">Registre su Cita de Valoración</h6>
  </div>
  <div class="card-body">
      <form class="user" autocomplete="off" method="post" id="store" enctype="multipart/form-data">
        @csrf

        <div class="row">

           <div class="col-md-12">
              
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                        <label for=""><b>Nombres:*</b></label>
                        <input type="text" name="names" id="names-store" class="form-control" required >
                    </div>
                </div>
              </div>


			  <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                        <label for=""><b>Apellidos:*</b></label>
                        <input type="text" name="last_names" id="last_names-store" class="form-control" required >
                    </div>
                </div>
              </div>



			  <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                        <label for=""><b>Numero de Cedula:*</b></label>
                        <input type="text" name="identification" id="identification-store" class="form-control" required >
                    </div>
                </div>
              </div>


			  <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                        <label for=""><b>Fecha de Nacimiento:*</b></label>
                        <input type="date" name="date" id="date-store" class="form-control" required >
                    </div>
                </div>
              </div>


			  <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                        <label for=""><b>Ciudad *</b></label>
                        <input type="text" name="city" id="city-store" class="form-control" required >
                    </div>
                </div>
              </div>


			  <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                        <label for=""><b>Telefono *</b></label>
                        <input type="number" name="phone" id="phone-store" class="form-control" required >
                    </div>
                </div>
              </div>


			  <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                        <label for=""><b>Email *</b></label>
                        <input type="email" name="email" id="email-store" class="form-control" required >
                    </div>
                </div>
              </div>


			  <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                        <label for=""><b>¿Que cirugía se quiere realizar? *</b></label>
                        <input type="text" name="surgerie" id="surgerie-store" class="form-control" required >
                    </div>
                </div>
              </div>

			  <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                        <label for=""><b>Forma de pago (Contado/Financiación): *</b></label>
                        <input type="text" name="way_to_pay" id="way_to_pay-store" class="form-control" required >
                    </div>
                </div>
              </div>
              
           </div>

        </div>

        <input type="hidden" name="id_user" class="id_user">
        <input type="hidden" name="token" class="token">
          <br>
          <br>
        </div>
          <center>
            <button id="send_usuario" class="btn btn-primary btn-user">
                Enviar
            </button>

          </center>
          <br>
          <br>
      </form>
      
    </div>




  <!-- Bootstrap core JavaScript-->

  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>
  


   <!-- Page level plugins -->
  <script src="vendor/chart.js/Chart.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/chart-area-demo.js"></script>
  <script src="js/demo/chart-pie-demo.js"></script>

  


 <!-- Page level plugins -->
    <script src="vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/datatables-demo.js"></script>

  


    <script src="vendor/bootstrap-fileinput/js/plugins/piexif.js" type="text/javascript"></script>
    <script src="vendor/bootstrap-fileinput/js/plugins/sortable.js" type="text/javascript"></script>
    <script src="vendor/bootstrap-fileinput/js/fileinput.js" type="text/javascript"></script>
    <script src="vendor/bootstrap-fileinput/js/locales/fr.js" type="text/javascript"></script>
    <script src="vendor/bootstrap-fileinput/js/locales/es.js" type="text/javascript"></script>
    <script src="vendor/bootstrap-fileinput/themes/fas/theme.js" type="text/javascript"></script>
    <script src="vendor/bootstrap-fileinput/themes/explorer-fas/theme.js" type="text/javascript"></script>





    <script src="vendor/sweetalert/sweetalert.min.js" type="text/javascript"></script>
    <script src="vendor/sweetalert/sweetalert-dev.js" type="text/javascript"></script>

    <script src="vendor/select2-4.0.11/dist/js/select2.min.js"></script>


  <script src="js/funciones.js"></script>
  

  <script>
    var user_id = localStorage.getItem('user_id');
    $("#logout").attr("href", "logout/"+user_id)
  </script>

  

  

</body>

</html>



