<?php
	// Paramètres
	define("Root", str_replace("router.php", "", $_SERVER['SCRIPT_NAME']));
	define("Path", str_replace("router.php", "", $_SERVER['SCRIPT_FILENAME']));
	define("Homepage", $_SERVER['SERVER_NAME'].Root);
	define("DebugMode", "true");
	define("DBHost", "localhost");
	define("DBLogin", "root");
	define("DBPassword", "root");
	define("DBName", "mydb");

	if(DebugMode)
	{
		error_reporting(E_ALL);
		ini_set('display_errors', true);
	}
?>