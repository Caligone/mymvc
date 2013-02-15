<!doctype html>
<html class="four-oh-four-page">
<head>
	<title>Erreur 404</title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/> 
	<!--[if lt IE 9]>
	<script src="asserts/js/404.js"></script>
	<![endif]-->
	<link rel="stylesheet" href="<?php echo Root; ?>asserts/css/reset404.css">
	<link rel="stylesheet" href="<?php echo Root; ?>asserts/css/fonts404.css">
	<link rel="stylesheet" href="<?php echo Root; ?>asserts/css/screen404.css">
</head>
<body>
	<img src="<?php echo Root; ?>asserts/img/404.png" alt="404" width="610" height="213" />
	<a href="<?php echo "http://".Homepage; ?>">
		<span class="text">Vous êtes perdu? Cliquez ici.</span>
		<span class="hover"></span>
	</a>
	<?php if(DebugMode) { ?>
		<div class="debugMode">
			<h3>DebugMode</h3>
			<?php 
				echo $viewParam['errorMessage'].'<br/>';
				echo 'Request URI : '.$_SERVER['REQUEST_URI'].'<br/>';
				echo 'Root : '.Root.'<br/>';
				echo 'Path : '.Path.'<br/>';
			?>
		</div>
	<?php } ?>
</body>
</html>
