<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>#Encuesta de Satisfaccion</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="author" content="colorlib.com">

		<!-- MATERIAL DESIGN ICONIC FONT -->
		<link rel="stylesheet" href="<?= url('/') ?>/satisfaction_survey/fonts/material-design-iconic-font/css/material-design-iconic-font.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

		<!-- STYLE CSS -->
        <link rel="stylesheet" href="<?= url('/') ?>/satisfaction_survey/css/style.css">



        <style>
            .actions li:last-child a {
                width: 163px;
            }
            @media (max-width: 767px){
                .wrapper {
                    height: 700px;
                    padding: 30px 20px;
                }
            }



        </style>

    </head>

	<body>


		<div class="wrapper">

            <form action="" style="margin: 0 auto;">
            	<div class="form-header">
            		<a href="#">#Encuesta de Satisfacción</a>
            		<!--<h3>Register for the course online</h3> -->
                </div>
                <br><br>
            	<div id="wizard2">
                    <form action="af" method="POST" id="formss">
                        <!-- SECTION 1 -->
                        <h4></h4>
                        <section>
                        <h2>Bienvenid@ <?= $data_client->name_client ?></h2>
                        <br><br>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for=""><b>Telefono</b></label>
                                        <input type="text" class="form-control" value="{{$data_client->telefono}}">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for=""><b>Correo</b></label>
                                        <input type="text" class="form-control" value="{{$data_client->email}}">
                                    </div>
                                </div>
                            </div>

                            <br>


                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for=""><b>Facebook (*)</b></label>
                                        <input type="text" required class="form-control" id="facebook" name="facebook" value="{{$data_client->facebook}}">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for=""><b>Instagram (*)</b></label>
                                        <input type="text" required class="form-control" id="instagram" name="instagram" value="{{$data_client->instagram}}">
                                    </div>
                                </div>
                            </div>

                            <br>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for=""><b>Twitter (*)</b></label>
                                        <input type="text" required class="form-control" id="twitter" name="twitter" value="{{$data_client->twitter}}">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for=""><b>Youtube (*)</b></label>
                                        <input type="text" required class="form-control" id="youtube" name="youtube" value="{{$data_client->youtube}}">
                                    </div>
                                </div>
                            </div>


                            <input type="hidden" name="_method" value="put">



                            <br><br>
                            <div class="form-row" style="margin-bottom: 26px; ">

                            <h4 style=" text-align: justify;font-size : 14px">Tenemos interés en conocer el grado de satisfacción de las personas que, como usted,
                                 utilizan los servicios de nuestra clínica. Para ello, hemos preparado este cuestionario en el que le pedimos una valoración de los servicios prestados y el
                                 trato recibido de nuestro personal antes, durante y después de su procedimiento.
                                 <br><br>
                                 La información que usted suministre aquí, es con el objetivo de conocer su percepción como paciente de la <?= $data_client->name_clinic ?>
                            </h4>


                            <div class="form-row" style="margin-bottom: 26px;">

                            </div>


                        </section>


                        <input type="hidden" name="id_client" id="id_client" value="<?= $data_client->id_cliente ?>">
                        <input type="hidden" name="id_user" id="id_user" value="<?= $data_client->id_user_asesora ?>">

                    </form>




            	</div>
            </form>
		</div>


        <input type="hidden" id="ruta" value="<?= url('/') ?>">

		<script src="<?= url('/') ?>/satisfaction_survey/js/jquery-3.3.1.min.js"></script>

		<!-- JQUERY STEP -->
		<script src="<?= url('/') ?>/satisfaction_survey/js/jquery.steps.js"></script>

        <script src="<?= url('/') ?>/satisfaction_survey/js/main.js"></script>

        <script src="<?= url('/') ?>/satisfaction_survey/js/star-rating.js?ver=3.2.0"></script>
	<script>




        $(document).ready(function(){
            var destroyed = false;
            var starratings = new StarRating( '.star-rating', {
                onClick: function( el ) {
                    console.log( 'Selected: ' + el[el.selectedIndex].text );
                },

                'initialText' : 'Califique'
            });



            $(".actions a[href$='#finish']").click(function (e) {

                const data = {
                    'id_client'  : $("#id_client").val(),
                    'id_user'    : $("#id_user").val()
                }


                if($("#facebook").val() == "" || $("#instagram").val() == "" || $("#twitter").val() == "" || $("#youtube").val() == ""){
                    alert("Todos los campos son obligatorios")

                    return false
                }
                var url=document.getElementById('ruta').value;
                var formData=new FormData($("#formss")[0]);

                formData.append("facebook", $("#facebook").val())
                formData.append("instagram", $("#instagram").val())
                formData.append("twitter", $("#twitter").val())
                formData.append("youtube", $("#youtube").val())
                formData.append("_method", "put")




                $.ajax({
                    url:''+url+'/api/update/clients/encuesta/'+$("#id_client").val(),
                    type: "POST",
                    dataType:'JSON',
                    data:formData,
                    cache:false,
                        contentType:false,
                        processData:false,
                    beforeSend: function(){

                    },
                    error: function (repuesta) {},
                    success: function(respuesta){
                        console.log("SUCCESS")
                        window.location.href = `<?= url('/') ?>/form_satisfaction_survey_vlr/${data.id_client}`;
                    }

                });


                return false


            });


        });






	</script>





<!-- Template created and distributed by Colorlib -->
</body>
</html>












