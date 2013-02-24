<?php
	// Paramètres automatiques
	define("Root", str_replace("Router.php", "", $_SERVER['SCRIPT_NAME']));
	define("Path", str_replace("Router.php", "", $_SERVER['SCRIPT_FILENAME']));
	define("Homepage", $_SERVER['SERVER_NAME'].Root);

	// Paramètres manuels
	define("DebugMode", "true");
	define("DBHost", "localhost");
	define("DBLogin", "root");
	define("DBPassword", "root");
	define("DBName", "dbname");

	define("Password", "mdp");

	define("DefaultController", "Main");
	define("DefaultAction", "index");

	// Activation du mode debug
	if(DebugMode)
	{
		error_reporting(E_ALL);
		ini_set('display_errors', true);
	}
?>