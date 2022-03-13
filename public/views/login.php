<?php
	$ipUsuario_notSession = $_SERVER['REMOTE_ADDR'];
	$vldclass_OAuthProvider = method_exists('OAuthProvider','read') ? (new OAuthProvider('')) : ('Error de version, debe ser PHP 7.4.19');

	/*
	$p = new OAuthProvider();

	$t = $p->generateToken(4);

	echo strlen($t),  PHP_EOL;
	echo bin2hex($t), PHP_EOL;*/
	//$ipPublic = file_get_contents('https://api.ipify.org') ? file_get_contents('https://api.ipify.org') : FALSE;
	$ipPublic = '';
	$namePageCurrent = array_key_exists('PHP_SELF', $_SERVER) ? $_SERVER['PHP_SELF'] : FALSE;
	$nameServer = $_SERVER['SERVER_NAME'] ? $_SERVER['SERVER_NAME'] : FALSE;
	$pageProcedente = array_key_exists('HTTP_REFERER', $_SERVER)  ? $_SERVER['HTTP_REFERER'] : "No se encontro";
	$portConnect = $_SERVER['REMOTE_PORT'] ? $_SERVER['REMOTE_PORT'] : FALSE;
	$agentNavegation = $_SERVER['HTTP_USER_AGENT'] ? $_SERVER['HTTP_USER_AGENT'] : FALSE;
	$nameHost = $_SERVER['HTTP_HOST'];
	$ipConnected = isset($_SERVER['HTTP_CLIENT_IP']) ? $_SERVER['HTTP_CLIENT_IP'] : (isset($_SERVER['HTTP_X_FORWARDED_FOR']) ? $_SERVER['HTTP_X_FORWARDED_FOR'] : $_SERVER['REMOTE_ADDR']);
	echo $ipConnected;


	session_start();
	if(!isset($_SESSION['username']))
	{
		//echo 'No se inicio session';
		//header("location:./index.php");
	}
	else{
		header("location:./views/inicio/main.php");
	}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Login | Exploraciones Andinas</title>
	<meta name="description" content="sistema para Mina">
    <meta name="keywords" content="EA, Exploraciones Andinas">
    <meta name="author" content="Frank Sitft">
	<meta name="application-name" content="Exploraciones Andinas">
	<link rel="shortcut icon" type="image/x-icon" href="./../img/favicon.ico">
	<!-- Android -->
	<meta name="mobile-web-app-capable" content="yes">
	<!-- IOS -->
	<meta name="apple-mobile-web-app-capable" content="yes">
	<!-- <meta http-equiv="Content-Security-Policy" content="script-src 'self'; object-src 'none'"> -->
	<meta name="color-scheme" content="dark">
	<!-- <link rel="manifest" href="./manifest.json"> -->
	<!-- Android -->
	<meta name="theme-color" content="black">
	<!-- IOS -->
	<meta name="apple-mobile-web-app-status-bar-style" content="black">
	<div id="list"></div>  

    <!--STYLESHEET-->
    <!--=================================================-->

    <!--Open Sans Font [ OPTIONAL ]-->
    <link href='.\..\bootstrap_3\css\css.css' rel='stylesheet' type='text/css'>


    <!--Bootstrap Stylesheet [ REQUIRED ]-->
    <link href=".\..\bootstrap_3\css\bootstrap.min.css" rel="stylesheet">


    <!--Nifty Stylesheet [ REQUIRED ]-->
    <link href=".\..\css\nifty.min.css" rel="stylesheet">


    <!--Nifty Premium Icon [ DEMONSTRATION ]-->
    <link href=".\..\css\demo\nifty-demo-icons.min.css" rel="stylesheet">


    <!--=================================================-->



    <!--Pace - Page Load Progress Par [OPTIONAL]-->
    <link href=".\..\plugins\pace\pace.min.css" rel="stylesheet">
    <script src=".\..\plugins\pace\pace.min.js"></script>


        
    <!--Demo [ DEMONSTRATION ]-->
    <link href=".\..\css\demo\nifty-demo.min.css" rel="stylesheet">

    
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
		<div id="bg-overlay" class="bg-img" style='background-image: url("./../img/bg-img/bg-img-3.jpeg");'></div>
		
		
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
		                <button class="btn btn-primary btn-lg btn-block" id="btn-login">Ingresar</button>
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
		    <div id="demo-bg-list" class="">
		        <div class="demo-loading"><i class="psi-repeat-2"></i></div>
		        <img class="demo-chg-bg bg-trans" src="./../img/bg-img/thumbs/bg-trns.jpeg" alt="Background Image">
		        <img class="demo-chg-bg" src="./../img/bg-img/thumbs/bg-img-1.jpg" alt="Background Image">
		        <img class="demo-chg-bg active" src="./../img/bg-img/thumbs/bg-img-2.jpeg" alt="Background Image">
		        <img class="demo-chg-bg" src="./../img/bg-img/thumbs/bg-img-3.jpeg" alt="Background Image">
		        <img class="demo-chg-bg" src="./../img/bg-img/thumbs/bg-img-4.jpeg" alt="Background Image">
		        <img class="demo-chg-bg" src="./../img/bg-img/thumbs/bg-img-5.jpg" alt="Background Image">
		        <img class="demo-chg-bg" src="./../img/bg-img/thumbs/bg-img-6.jpg" alt="Background Image">
		        <img class="demo-chg-bg" src="./../img/bg-img/thumbs/bg-img-7.jpg" alt="Background Image">
		    </div>
		</div>
		<!--===================================================-->
		
		
		
    </div>
    <!--===================================================-->
    <!-- END OF CONTAINER -->


        
    <!--JAVASCRIPT-->
    <!--=================================================-->

    <!--jQuery [ REQUIRED ]-->
    <script src=".\..\js\jquery.min.js"></script>


    <!--BootstrapJS [ RECOMMENDED ]-->
    <script src=".\..\js\bootstrap.min.js"></script>


    <!--NiftyJS [ RECOMMENDED ]-->
    <script src=".\..\js\nifty.min.js"></script>




    <!--=================================================-->
    
    <!--Background Image [ DEMONSTRATION ]-->
    <script src="./../js/demo/bg-images.js"></script>

	<script>
		/**
		 * 
		 * LOGIN
		 * 
		 */

		// GUARDAMOS EN VARIABLE
		const btnLogin = document.getElementById("btn-login");
		var idUsuario = '';
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
					'ipPrivado' : textPassword.value,
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
			body.append("data", JSON.stringify(data));
			const returned = await fetch("./../controllers/CtrlLogin.php", { method: "POST", body });
			const result = await returned.json();//await JSON.parse(returned);
			afterSendingFormLogin(result);
		};

		//Si necesitas hacer algo despues de que terminen las
		//consultas, hacelas aqui.
		const afterSendingFormLogin = (data) => {
			sqlRpt = data['sql'];
			idUsuario = data['sql']['Id'];
			ctrlRespuesta = data['rptController'];
			//Validamos Acceso
			if (sqlRpt['Estado'] == 0) {
				$.niftyNoty({
					type: 'danger',
					container : '#alert-login',
					html : '<strong>Oh cielos!</strong> ' + ctrlRespuesta,
					focus: false,
					//timer : 4000
				});
			}
			else if (sqlRpt['Estado'] == 1 && sqlRpt['Sesion'] == 1){
				$.niftyNoty({
					type: 'danger',
					container : '#alert-login',
					html : '<strong>Oh cielos!</strong> ' + ctrlRespuesta,
					focus: false,
					//timer : 4000
				});
			}
			else {
				$.niftyNoty({
					type: 'success',
					container : '#alert-login',
					html : '<strong>¡Bien hecho!</strong> ' + ctrlRespuesta,
					focus: false,
					timer : 4000
				});
				request(idUsuario);
				window.location.href = './views/inicio/main.php';
			}
		};

		const getIpInfor =  async (data) =>{
			var requestOptions = {
			method: 'GET',
			redirect: 'follow'
			};
			const returned = await fetch("https://ipinfo.io/json", requestOptions)
			return await returned.json();
		}

		//Registrar Detalles de Session
		const request = async (requestForm) => {
	
			const rptIpInfor = await getIpInfor();
			const rpttypeDevice = await typeDevice();		
			console.log('Se obtuvo Api');
			//Preparamos parametros
			var detalleSession = {
				"accion" : "insert",
				"data" : {
					"id_usuario": idUsuario,
					"infoPhp" : {
						"ipPublica" : '<?= $nameServer;?>',
						"nombreServer" : '<?= $nameServer;?>',
						"paginaProcedente" : '<?= $pageProcedente;?>',
						"puertoConectado" : '<?= $portConnect;?>',
						"agenteNavegacion" : '<?= $agentNavegation;?>',
						"nombreHost" : '<?= $nameHost;?>',
						"ipConnected" : '<?= $ipConnected?>'
					},
					"infoJs" : {
						"tipoDispositivo" : rpttypeDevice,
						"ipInfo" : rptIpInfor,
					}
				}

			};
			console.log(detalleSession);
			const body = new FormData();
			body.append("data", JSON.stringify(detalleSession));
			const returned = await fetch("./../controllers/controllerDetalleSession.php", { method: "POST", body });
			const result = await returned.json();//await JSON.parse(returned);
			if(returned){
				window.location.href = './views/inicio/main.php';
			}
			
			
			//afterSendingFormLogin(result);
		};

		//Detectar Tipo de Dispositivo
		const typeDevice = async () => {

			// Clase para detectar tipo de dispositivo
			class Dispositivo {
				esMovil = false;
				esTablet = false;
				esAndroid = false;
				esiPhone = false;
				esiPad = false;
				esOrdenador = false;
				esWindows = false;
				esLinux = false;
				esMac = false;
			}

			dispositivo = new Dispositivo()

			if (navigator.userAgent.toLowerCase().match(/mobile/)) {
				dispositivo.esMovil = true
			} else {
				if (navigator.userAgent.toLowerCase().match(/tablet/))
					dispositivo.esTablet = true
				else
					dispositivo.esOrdenador = true
			}

			// console.log(navigator.userAgent.toLocaleLowerCase())

			if (dispositivo.esMovil == true) {
				if (navigator.userAgent.toLowerCase().match(/android/)) {
					dispositivo.esAndroid = true
					return await "Celular Android";
					/* dispositivo__texto.innerText = "Celular Android" */
				} else if (navigator.userAgent.toLowerCase().match(/ipad/)) {
					dispositivo.esiPad = true
					return await "iPad";
					/* dispositivo__texto.innerText = "iPad" */
				} else {
					dispositivo.esiPhone = true
					return await "Celular iPhone";
					/* dispositivo__texto.innerText = "Celular iPhone" */
				}
			} else if (dispositivo.esTablet == true) {
				dispositivo__texto.innerText = "Tablet"
				return await "Tablet";
			} else {
				if (navigator.userAgent.toLowerCase().match(/mac/)) {
					dispositivo.esMac = true
					return await "Ordenador Ma";
					/* dispositivo__texto.innerText = "Ordenador Mac" */
				} else if (navigator.userAgent.toLowerCase().match(/linux/)) {
					dispositivo.esLinux = true
					return await "Ordenador Linux";
					/* dispositivo__texto.innerText = "Ordenador Linux" */
				} else {
					dispositivo.esWindows = true
					return await "Ordenador Windows";
					/* dispositivo__texto.innerText = "Ordenador Windows" */
				}
			}
		}

	</script>

</body>
</html>
