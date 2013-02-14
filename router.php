<?php
	require("config.php");

	// Traitement de l'URL
	$routingArray = explode('/', $_GET['parameters']);

	if(isset($routingArray[0]) && !empty($routingArray[0]))
		$controllerName = $routingArray[0];
	else
		$controllerName = 'Main';
	if(isset($routingArray[1]) && !empty($routingArray[1]))
		$actionName = $routingArray[1];
	else
		$actionName = 'Index';


	$i = 2;
	$parameters = array();
	while(isset($routingArray[$i]) && !empty($routingArray[$i]))
	{
		$parameters[] = $routingArray[$i];
		$i++;
	}

	// Vérification du controlleur
	if(!file_exists('controllers/'.$controllerName.'Controller.php'))
	{
		$error = 'Le controlleur <em>'.$controllerName.'</em> est introuvable !';
		require('404.php');
		die();
	}
	require('controllers/'.$controllerName.'Controller.php');

	$controllerName .= 'Controller';
	$controller = new $controllerName();

	// Vérification de l'action
	if(!is_callable(array($controller, $actionName.'Action')))
	{
		$error = 'L\'action <em>'.$actionName.'</em> est introuvable !';
		require('404.php');
		die();
	}
	$actionName .= 'Action';

	if((new ReflectionMethod($controllerName, $actionName))->getNumberOfRequiredParameters() > count($parameters))
	{
		$error = 'Les paramètres de <em>'.$controllerName.'->'.$actionName.'</em> sont incorrects !';
		require('404.php');
		die();
	}
	call_user_func_array(array($controller, $actionName), $parameters);
?>