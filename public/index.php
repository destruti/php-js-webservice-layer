<!DOCTYPE html>
<html lang="en" class="no-js">
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
		<meta name="viewport" content="width=device-width, initial-scale=1.0"> 
		<title>Web Service Layer</title>
		<meta name="description" content="Web Service Layer" />
		<meta name="keywords" content="web, service, layer, webservice, layer, php, phpunit, slim, restful" />
		<meta name="author" content="Eduardo Destruti" />

		<meta name="google-site-verification" content="ZEWqJw1uvxJF8QGEM9YE7xVF_3RU1EPZSQRTogZIRhs" />

		<link rel="apple-touch-icon" sizes="57x57" href="img/favicon/apple-icon-57x57.png">
		<link rel="apple-touch-icon" sizes="60x60" href="img/favicon/apple-icon-60x60.png">
		<link rel="apple-touch-icon" sizes="72x72" href="img/favicon/apple-icon-72x72.png">
		<link rel="apple-touch-icon" sizes="76x76" href="img/favicon/apple-icon-76x76.png">
		<link rel="apple-touch-icon" sizes="114x114" href="img/favicon/apple-icon-114x114.png">
		<link rel="apple-touch-icon" sizes="120x120" href="img/favicon/apple-icon-120x120.png">
		<link rel="apple-touch-icon" sizes="144x144" href="img/favicon/apple-icon-144x144.png">
		<link rel="apple-touch-icon" sizes="152x152" href="img/favicon/apple-icon-152x152.png">
		<link rel="apple-touch-icon" sizes="180x180" href="img/favicon/apple-icon-180x180.png">
		<link rel="icon" type="image/png" sizes="192x192"  href="img/favicon/android-icon-192x192.png">
		<link rel="icon" type="image/png" sizes="32x32" href="img/favicon/favicon-32x32.png">
		<link rel="icon" type="image/png" sizes="96x96" href="img/favicon/favicon-96x96.png">
		<link rel="icon" type="image/png" sizes="16x16" href="img/favicon/favicon-16x16.png">
		<link rel="manifest" href="/manifest.json">
		<meta name="msapplication-TileColor" content="#ffffff">
		<meta name="msapplication-TileImage" content="img/favicon/ms-icon-144x144.png">
		<meta name="theme-color" content="#ffffff">

		<link rel="stylesheet" type="text/css" href="css/normalize.css" />
		<link rel="stylesheet" type="text/css" href="css/demo.css" />
		<link rel="stylesheet" type="text/css" href="css/icons.css" />
		<link rel="stylesheet" type="text/css" href="css/component.css" />

		<script src="js/modernizr.custom.js"></script>
		<script src="https://code.jquery.com/jquery-1.10.2.js"></script>
		<script src="js/wsl_website/webservicelayer.singleCall.js"></script>

	</head>
	<body>
		<div class="container">

			<input type="hidden" id="hashClient" value="wsl_website">

			<!-- Top Navigation -->
			<header>
				<h1>
					<img src="img/logo_WSL.png" style="width: 200px;" />
					<br/>Web Service Layer
				</h1>
			</header>

			<section class="col-2 ss-style-triangles">
				<div class="column text">
					<h2 id="organize_title"></h2>
					<p id="organize_content"></p>
				</div>
				<div class="column">
					<span class="icon icon-headphones"></span>
				</div>
			</section>


			<section class="color">
				<h2 id="servicelayer_title"></h2>
				<p id="servicelayer_content"></p>
			</section>


			<section class="col-3 ss-style-doublediagonal">
				<div class="column">
					<span class="icon icon-home"></span>
					<p id="datalayer_step_content"></p>
				</div>
				<div class="column">
					<span class="icon icon-bullhorn"></span>
					<p id="datadomain_step_content"></p>
				</div>
				<div class="column">
					<span class="icon icon-blog"></span>
					<p id="servicelayer_step_content"></p>
				</div>
			</section>

			<section class="col-2 ss-style-halfcircle">
				<div class="column">
					<span class="icon icon-images"></span>
				</div>
				<div class="column text">
					<h2 id="online_title"></h2>
					<p id="online_content"></p>
				</div>
			</section>

			<section class="color ss-style-bigtriangle">
				<h2 id="security_title"></h2>
				<p id="security_content"></p>
			</section>

			<svg id="bigTriangleShadow" xmlns="http://www.w3.org/2000/svg" version="1.1" width="100%" height="100" viewBox="0 0 100 100" preserveAspectRatio="none">
				<path id="trianglePath1" d="M0 0 L50 100 L100 0 Z" />
				<path id="trianglePath2" d="M50 100 L100 40 L100 0 Z" />
			</svg>
			<section>
				<h2 id="nosql_title"></h2>
				<p id="nosql_content"></p>
			</section>
			<svg id="clouds" xmlns="http://www.w3.org/2000/svg" version="1.1" width="100%" height="100" viewBox="0 0 100 100" preserveAspectRatio="none">
				<path d="M-5 100 Q 0 20 5 100 Z
						 M0 100 Q 5 0 10 100
						 M5 100 Q 10 30 15 100
						 M10 100 Q 15 10 20 100
						 M15 100 Q 20 30 25 100
						 M20 100 Q 25 -10 30 100
						 M25 100 Q 30 10 35 100
						 M30 100 Q 35 30 40 100
						 M35 100 Q 40 10 45 100
						 M40 100 Q 45 50 50 100
						 M45 100 Q 50 20 55 100
						 M50 100 Q 55 40 60 100
						 M55 100 Q 60 60 65 100
						 M60 100 Q 65 50 70 100
						 M65 100 Q 70 20 75 100
						 M70 100 Q 75 45 80 100
						 M75 100 Q 80 30 85 100
						 M80 100 Q 85 20 90 100
						 M85 100 Q 90 50 95 100
						 M90 100 Q 95 25 100 100
						 M95 100 Q 100 15 105 100 Z">
				</path>
			</svg>
			<section class="related">
				<p>WHO WE ARE?</p>
				<p><a href="http://destruti.com/">Eduardo Destruti</a></p>
				<p><a href="https://maquinadobem.com">Máquina do Bem</a></p>
			</section>
		</div><!-- /container -->
	</body>
</html>