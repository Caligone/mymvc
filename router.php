<?php
	session_start();
	require_once("Configuration.php");

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
		require_once("controllers/ErrorController.php");
		call_user_func_array(array(new ErrorController(), 'unknownControllerAction'), array($controllerName));
		die();
	}
	require_once('controllers/'.$controllerName.'Controller.php');

	$controllerName .= 'Controller';
	$controller = new $controllerName();

	// Vérification de l'action
	if(!is_callable(array($controller, $actionName.'Action')))
	{
		require_once("controllers/ErrorController.php");
		call_user_func_array(array(new ErrorController(), 'unknownActionAction'), array($controllerName, $actionName));
		die();
	}
	$actionName .= 'Action';

	// Vérification du nombre de paramètres
	if((new ReflectionMethod($controllerName, $actionName))->getNumberOfRequiredParameters() > count($parameters))
	{
		require_once("controllers/ErrorController.php");
		$error = 'Les paramètres de <em>'.$controllerName.'->'.$actionName.'</em> sont incorrects !';
		call_user_func_array(array(new ErrorController(), 'mainAction'), array($error));
		die();
	}
	call_user_func_array(array($controller, $actionName), $parameters);
?>