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
                            <div class="form-row" style="margin-bottom: 26px;">

                           
                            <h4 style=" text-align: justify;">Tenemos interés en conocer el grado de satisfacción de las personas que, como usted,
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
                window.location.href = `<?= url('/') ?>/form_satisfaction_survey/${data.id_client}`;
            });


        });




        
	</script>

       
    


<!-- Template created and distributed by Colorlib -->
</body>
</html>





			


	



