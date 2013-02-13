<!doctype html>
<html class="four-oh-four-page">
<head>
	<title>Erreur 404</title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/> 
	<!--[if lt IE 9]>
	<script src="asserts/js/404.js"></script>
	<![endif]-->
	<link rel="stylesheet" href="<?php echo $path; ?>/asserts/css/reset404.css">
	<link rel="stylesheet" href="<?php echo $path; ?>/asserts/css/fonts404.css">
	<link rel="stylesheet" href="<?php echo $path; ?>/asserts/css/screen404.css">
</head>
<body>
	<img src="<?php echo $path; ?>/asserts/img/404.png" alt="404" width="610" height="213" />
	<a href="<?php echo $domaineName; ?>">
		<span class="text">Vous êtes perdu? Cliquez ici.</span>
		<span class="hover"></span>
	</a>
	<?php if($debugMode) { ?>
		<div class="debugMode">
			<h3>DebugMode</h3>
			<?php 
				echo $error.'<br/>';
			?>
		</div>
	<?php } ?>
</body>
</html>
