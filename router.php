<?php
	include_once("config.php");

	// Traitement de l'URL
	$routingArray = explode('/', $_SERVER['REQUEST_URI']);

	if(isset($routingArray[2]) && !empty($routingArray[2]))
		$controllerName = $routingArray[2];
	if(isset($routingArray[3]) && !empty($routingArray[3]))
		$actionName = $routingArray[3];
	
	$i = 4;
	while(isset($routingArray[$i]) && !empty($routingArray[$i]))
	{
		$parameters[] = $routingArray[$i];
		$i++;
	}

	// Inclusion du controlleur
	if(!isset($controllerName) || empty($controllerName))
	{
		$controllerName = 'Main';
	}
	// Erreur 404
	if(!file_exists('controllers/'.$controllerName.'Controller.php'))
	{
		$error = 'Le controlleur <em>'.$controllerName.'</em> est introuvable !';
		include('404.php');
		die();
	}
	include_once('controllers/'.$controllerName.'Controller.php');

	$controllerName .= 'Controller';
	$controller = new $controllerName();

	// Execution de l'action
	if(!isset($actionName) || empty($actionName))
	{
		$actionName = 'index';
	}
	if(!is_callable(array($controller, $actionName.'Action')))
	{
		$error = 'L\'action <em>'.$actionName.'</em> est introuvable !';
		include('404.php');
		die();
	}
	$actionName .= 'Action';

	$controller->$actionName($parameters);
?>