<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>#Encuesta de Satisfaccion</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="author" content="colorlib.com">

		<!-- MATERIAL DESIGN ICONIC FONT -->
		<link rel="stylesheet" href="<?= url('/') ?>/satisfaction_survey/fonts/material-design-iconic-font/css/material-design-iconic-font.css">


		<!-- STYLE CSS -->
        <link rel="stylesheet" href="<?= url('/') ?>/satisfaction_survey/css/style.css">

        <!-- STAR-RATING CSS -->
        <link rel="stylesheet" href="<?= url('/') ?>/satisfaction_survey/css/star-rating.css">
        <link href="<?= url('/') ?>/vendor/sweetalert/sweetalert.css" rel="stylesheet">

        <style>
            .gl-star-rating-text {
                display: inline-block;
                position: relative;
                height: 34px;
                line-height: 34px;
                font-size: 14px;
                font-weight: 400;
                color: #fff;
                background-color: #212121;
                white-space: nowrap;
                vertical-align: middle;
                padding: 0 12px 0 6px;
                margin: 0 0 0 185px;
            }

            .image-holder {
                align-self: center;
                text-align: center;
            }


            .image-holder img{
                border-radius: 100%;
                width: 300px;
                height: 300px;
            }



            .actions li a {
                padding: 0;
                border: none;
                display: inline-flex;
                height: 54px;
                width: 189px;
                letter-spacing: 1.3px;
                align-items: center;
                background: #e4bd37;
                font-family: "Muli-Bold";
                cursor: pointer;
                position: relative;
                padding-left: 34px;
                text-transform: uppercase;
                color: #fff;
                border-radius: 27px;
                -webkit-transform: perspective(1px) translateZ(0);
                transform: perspective(1px) translateZ(0);
                -webkit-transition-duration: 0.3s;
                transition-duration: 0.3s;
            }




            @media (max-width: 991px){
                .image-holder, .wrapper {
                    display: block !important;
                }
                .image-holder{
                    width: 100%;
                }


                .image-holder img{
                    width: 100px;
                    height: 100px;
                    margin-bottom: 100px;
                }
            }






        </style>
    </head>

	<body>


		<div class="wrapper">
			<div class="image-holder">
                <div class="form-header">
                    <a href="#">#Asesor</a>
                    <br><br>
            		<h3><?=  $data_client->nombres ?> <?=  $data_client->apellido_p ?></h3>
                </div>

				<img src="<?= url('/') ?>/img/usuarios/profile/<?=  $data_client->img_profile ?>" alt="">
            </div>


            <form action="">


            	<div class="form-header">
            		<a href="#">#Encuesta de Satisfacción</a>
            		<!--<h3>Register for the course online</h3> -->
                </div>
                <br><br>
            	<div id="wizard">
                    <form action="af" method="POST" id="formss">

                        <input type="hidden" id="name_clinic" value="<?= $data_client->name_clinic ?>">
                        <!-- SECTION 1 -->
                        <h4></h4>
                        <section>
                            <div class="form-row" style="margin-bottom: 26px;">
                                <h4>1 - Información que brinda la asesora sobre el procedimiento a realizar</h4>
                            </div>


                            <div class="form-row" style="margin-bottom: 26px;">

                                <div class="form-field" style="width: 100%">
                                    <select name="question1" id="question1" class="star-rating">
                                        <option value="">Select a rating</option>
                                        <option value="5">Exelente</option>
                                        <option value="4">Muy Bueno</option>
                                        <option value="3">Bueno</option>
                                        <option value="2">Regular</option>
                                        <option value="1">Malo</option>
                                    </select>
                                </div>
                            </div>



                        </section>

                        <!-- SECTION 2 -->
                        <h4></h4>
                        <section>
                            <div class="form-row" style="margin-bottom: 26px;">
                                <h4>2 - Asesoría personalizada </h4>
                            </div>

                            <div class="form-row" style="margin-bottom: 26px;">

                                <div class="form-field" style="width: 100%">
                                    <select name="question2" id="question2" class="star-rating">
                                        <option value="">Select a rating</option>
                                        <option value="5">Exelente</option>
                                        <option value="4">Muy Bueno</option>
                                        <option value="3">Bueno</option>
                                        <option value="2">Regular</option>
                                        <option value="1">Malo</option>
                                    </select>
                                </div>
                            </div>
                        </section>

                        <!-- SECTION 3 -->
                        <h4></h4>
                        <section>
                            <div class="form-row" style="margin-bottom: 26px;">
                                <h4>3 - La confianza (seguridad) que el personal transmite a los pacientes</h4>
                            </div>

                            <div class="form-row" style="margin-bottom: 26px;">

                                <div class="form-field" style="width: 100%">
                                    <select name="question3" id="question3" class="star-rating">
                                        <option value="">Select a rating</option>
                                        <option value="5">Exelente</option>
                                        <option value="4">Muy Bueno</option>
                                        <option value="3">Bueno</option>
                                        <option value="2">Regular</option>
                                        <option value="1">Malo</option>
                                    </select>
                                </div>
                            </div>
                        </section>


                        <!-- SECTION 4 -->
                        <h4></h4>
                        <section>
                            <div class="form-row" style="margin-bottom: 26px;">
                                <h4>4 - Amabilidad (cortesía) del personal en el trato con los pacientes</h4>
                            </div>

                            <div class="form-row" style="margin-bottom: 26px;">

                                <div class="form-field" style="width: 100%">
                                    <select name="question4" id="question4" class="star-rating">
                                        <option value="">Select a rating</option>
                                        <option value="5">Exelente</option>
                                        <option value="4">Muy Bueno</option>
                                        <option value="3">Bueno</option>
                                        <option value="2">Regular</option>
                                        <option value="1">Malo</option>
                                    </select>
                                </div>
                            </div>
                        </section>



                        <!-- SECTION 5 -->
                        <h4></h4>
                        <section>
                            <div class="form-row" style="margin-bottom: 26px;">
                                <h4>5 - Tiempo en responder mensajes, llamadas</h4>
                            </div>

                            <div class="form-row" style="margin-bottom: 26px;">

                                <div class="form-field" style="width: 100%">
                                    <select name="question5" id="question5" class="star-rating">
                                        <option value="">Select a rating</option>
                                        <option value="5">Exelente</option>
                                        <option value="4">Muy Bueno</option>
                                        <option value="3">Bueno</option>
                                        <option value="2">Regular</option>
                                        <option value="1">Malo</option>
                                    </select>
                                </div>
                            </div>
                        </section>


                        <!-- SECTION 6 -->
                        <h4></h4>
                        <section>
                            <div class="form-row" style="margin-bottom: 26px;">
                                <h4>6 - El trato personalizado que tiene con los pacientes</h4>
                            </div>

                            <div class="form-row" style="margin-bottom: 26px;">

                                <div class="form-field" style="width: 100%">
                                    <select name="question6" id="question6" class="star-rating">
                                        <option value="">Select a rating</option>
                                        <option value="5">Exelente</option>
                                        <option value="4">Muy Bueno</option>
                                        <option value="3">Bueno</option>
                                        <option value="2">Regular</option>
                                        <option value="1">Malo</option>
                                    </select>
                                </div>
                            </div>
                        </section>




                        <!-- SECTION 7 -->
                        <h4></h4>
                        <section>
                            <div class="form-row" style="margin-bottom: 26px;">
                                <h4>7 - Atención y seguridad que brinda todo el personal de la clínica</h4>
                            </div>

                            <div class="form-row" style="margin-bottom: 26px;">

                                <div class="form-field" style="width: 100%">
                                    <select name="question7" id="question7" class="star-rating">
                                        <option value="">Select a rating</option>
                                        <option value="5">Exelente</option>
                                        <option value="4">Muy Bueno</option>
                                        <option value="3">Bueno</option>
                                        <option value="2">Regular</option>
                                        <option value="1">Malo</option>
                                    </select>
                                </div>
                            </div>
                        </section>


                        <input type="hidden" name="id_client" id="id_client" value="<?= $data_client->id_cliente ?>">
                        <input type="hidden" name="id_user" id="id_user" value="<?= $data_client->id_user_asesora ?>">

                    </form>




            	</div>
            </form>
		</div>




		<script src="<?= url('/') ?>/satisfaction_survey/js/jquery-3.3.1.min.js"></script>

		<!-- JQUERY STEP -->
		<script src="<?= url('/') ?>/satisfaction_survey/js/jquery.steps.js"></script>

        <script src="<?= url('/') ?>/satisfaction_survey/js/main.js"></script>

        <script src="<?= url('/') ?>/satisfaction_survey/js/star-rating.js?ver=3.2.0"></script>


        <script src="<?= url('/') ?>/vendor/sweetalert/sweetalert.min.js" type="text/javascript"></script>
        <script src="<?= url('/') ?>/vendor/sweetalert/sweetalert-dev.js" type="text/javascript"></script>


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
                    'question1'  : $("#question1").val(),
                    'question2'  : $("#question2").val(),
                    'question3'  : $("#question3").val(),
                    'question4'  : $("#question4").val(),
                    'question5'  : $("#question5").val(),
                    'question6'  : $("#question6").val(),
                    'question7'  : $("#question7").val(),

                    'id_client'  : $("#id_client").val(),
                    'id_user'    : $("#id_user").val()
                }



                $.ajax({
                    url:'<?= url('/') ?>/api/satisfaction_survey_vlr',
                    type:"POST",
                    dataType:'JSON',
                    data:data,

                    beforeSend: function(){

                    },
                    error: function (repuesta) {

                    },
                    success: function(respuesta){

                        swal(`En ${$("#name_clinic").val()}, agradecemos su calificación, esto con el fin de mejorar para ustedes`, "Encuesta Enviada", "success");
                        setTimeout(function(){ location.reload(); }, 5000);

                    }

                });
            });


        });





	</script>





<!-- Template created and distributed by Colorlib -->
</body>
</html>












