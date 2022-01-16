<?php
	session_start();
	if(!isset($_SESSION['username']))
	{
		//echo 'No se inicio session';
		//header("location:./index.php");
	}
	else{
		header("location:./views/tareo.php");
	}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Login | Exploraciones Andinas</title>


    <!--STYLESHEET-->
    <!--=================================================-->

    <!--Open Sans Font [ OPTIONAL ]-->
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700' rel='stylesheet' type='text/css'>


    <!--Bootstrap Stylesheet [ REQUIRED ]-->
    <link href="css\bootstrap.min.css" rel="stylesheet">


    <!--Nifty Stylesheet [ REQUIRED ]-->
    <link href="css\nifty.min.css" rel="stylesheet">


    <!--Nifty Premium Icon [ DEMONSTRATION ]-->
    <link href="css\demo\nifty-demo-icons.min.css" rel="stylesheet">


    <!--=================================================-->



    <!--Pace - Page Load Progress Par [OPTIONAL]-->
    <link href="plugins\pace\pace.min.css" rel="stylesheet">
    <script src="plugins\pace\pace.min.js"></script>


        
    <!--Demo [ DEMONSTRATION ]-->
    <link href="css\demo\nifty-demo.min.css" rel="stylesheet">

    
    <!--=================================================

    REQUIRED
    You must include this in your project.


    RECOMMENDED
    This category must be included but you may modify which plugins or components which should be included in your project.


    OPTIONAL
    Optional plugins. You may choose whether to include it in your project or not.


    DEMONSTRATION
    This is to be removed, used for demonstration purposes only. This category must not be included in your project.


    SAMPLE
    Some script samples which explain how to initialize plugins or components. This category should not be included in your project.


    Detailed information and more samples can be found in the document.

    =================================================-->
        
</head>

<!--TIPS-->
<!--You may remove all ID or Class names which contain "demo-", they are only used for demonstration. -->

<body>
    <div id="container" class="cls-container">
        
		<!-- BACKGROUND IMAGE -->
		<!--===================================================-->
		<div id="bg-overlay"></div>
		
		
		<!-- LOGIN FORM -->
		<!--===================================================-->
		<div class="cls-content">
		    <div class="cls-content-sm panel">
		        <div class="panel-body">
					<div id="alert-login">
                    </div>
		            <div class="mar-ver pad-btm">
		                <h1 class="h3">Exploraciones Andinas S.A.C.</h1>
		                <p>Iniciar sesión en su cuenta</p>
		            </div>

		                <div class="form-group">
		                    <input name="usu" id="formipt-Usuario"type="text" class="form-control" placeholder="Usuario" autofocus="">
		                </div>
		                <div class="form-group">
		                    <input name="pass" id="formipt-Password"type="password" class="form-control" placeholder="Clave">
		                </div>
		                <div class="checkbox pad-btm text-left">
		                    <input id="demo-form-checkbox" class="magic-checkbox" type="checkbox">
		                    <label for="demo-form-checkbox">Recuérdame</label>
		                </div>
		                <button class="btn btn-primary btn-lg btn-block" id="btn-login">Iniciar sesión</button>
		        </div>
		
		        <div class="pad-all">
		            <!--<a href="pages-password-reminder.html" class="btn-link mar-rgt">Se te olvidó tu contraseña ?</a>
		            <a href="pages-register.html" class="btn-link mar-lft">Crea una cuenta nueva</a>
		
		            <div class="media pad-top bord-top">
		                <div class="pull-right">
		                    <a href="#" class="pad-rgt"><i class="demo-psi-facebook icon-lg text-primary"></i></a>
		                    <a href="#" class="pad-rgt"><i class="demo-psi-twitter icon-lg text-info"></i></a>
		                    <a href="#" class="pad-rgt"><i class="demo-psi-google-plus icon-lg text-danger"></i></a>
		                </div>
		                <div class="media-body text-left text-bold text-main">
                            Inicia con
		                </div>
		            </div>
-->
		        </div>
		    </div>
		</div>
		<!--===================================================-->
		
		
		<!-- DEMO PURPOSE ONLY -->
		<!--===================================================-->
		<div class="demo-bg">
		    <div id="demo-bg-list">
		        <div class="demo-loading"><i class="psi-repeat-2"></i></div>
		        <img class="demo-chg-bg bg-trans active" src="img\bg-img\thumbs\bg-trns.jpeg" alt="Background Image">
		        <img class="demo-chg-bg" src="img\bg-img\thumbs\bg-img-1.jpeg" alt="Background Image">
		        <img class="demo-chg-bg" src="img\bg-img\thumbs\bg-img-2.jpeg" alt="Background Image">
		        <img class="demo-chg-bg" src="img\bg-img\thumbs\bg-img-3.jpeg" alt="Background Image">
		        <img class="demo-chg-bg" src="img\bg-img\thumbs\bg-img-4.jpeg" alt="Background Image">
		        <img class="demo-chg-bg" src="img\bg-img\thumbs\bg-img-5.jpeg" alt="Background Image">
		        <img class="demo-chg-bg" src="img\bg-img\thumbs\bg-img-6.jpeg" alt="Background Image">
		        <img class="demo-chg-bg" src="img\bg-img\thumbs\bg-img-7.jpeg" alt="Background Image">
		    </div>
		</div>
		<!--===================================================-->
		
		
		
    </div>
    <!--===================================================-->
    <!-- END OF CONTAINER -->


        
    <!--JAVASCRIPT-->
    <!--=================================================-->

    <!--jQuery [ REQUIRED ]-->
    <script src="js\jquery.min.js"></script>


    <!--BootstrapJS [ RECOMMENDED ]-->
    <script src="js\bootstrap.min.js"></script>


    <!--NiftyJS [ RECOMMENDED ]-->
    <script src="js\nifty.min.js"></script>




    <!--=================================================-->
    
    <!--Background Image [ DEMONSTRATION ]-->
    <script src="./js/demo/bg-images.js"></script>

	<script>
		/**
		 * 
		 * LOGIN
		 * 
		 */

		// GUARDAMOS EN VARIABLE
		const btnLogin = document.getElementById("btn-login");

		//Ejecutamos funcion
		btnLogin.addEventListener("click", () => {
			
			//OBTENEMOS VALOR DE USUARIO Y CLAVE
			var textUsuario = document.getElementById('formipt-Usuario');
			var textPassword = document.getElementById('formipt-Password');

			//VALIDAMOS QUE NO ESTE VACIO
			if(textUsuario.value && textPassword.value){

				//Notificando validación
				$.niftyNoty({
					type: 'info',
					container : '#alert-login',
					html : '<strong>Aviso!</strong> Iniciando Sessión',
					focus: false,
					timer : 2000
				});

				//Creamos objeto
				var objectloginForm = {
					'usuario' : textUsuario.value,
					'clave' : textPassword.value,
				}

				// Enviando Datos
				requestLogin(objectloginForm)

			}
			else{

				//Notificando requisitos
				$.niftyNoty({
					type: 'warning',
					container : '#alert-login',
					html : '<strong>Aviso!</strong> Ingrese Usuario y Constraseña ',
					focus: false,
					timer : 2000
				});
			}
		});

		//Envio Solicitud
		const requestLogin = async (formLogin) => {
			const body = new FormData();

			//Preparamos parametros
			var data = {
			"accion" : 'login',
			"contenido" : formLogin
			};
			console.log(data);
			body.append("data", JSON.stringify(data));
			const returned = await fetch("./controllers/CtrlLogin.php", { method: "POST", body });
			const result = await returned.json();//await JSON.parse(returned);
			afterSendingFormLogin(result);
		};

		//Si necesitas hacer algo despues de que terminen las
		//consultas, hacelas aqui.
		const afterSendingFormLogin = (data) => {
			sqlValidador = data['sql']['val'];
			ctrlRespuesta = data['rptController'];

			//Validamos Acceso
			if( sqlValidador == true){
				console.log('Acceso concedido');
				window.location.href = './views/tareo.php';
			}
			else{
				console.log('Acceso denegado')
				//Notificando Acceso
				$.niftyNoty({
					type: 'danger',
					container : '#alert-login',
					html : '<strong>Oh cielos!</strong> Acceso denegado, motivo : ' + ctrlRespuesta,
					focus: false,
					timer : 2000
				});
			}    
		};
	</script>

</body>
</html>
