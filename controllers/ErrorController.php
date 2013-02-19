<?php
	require_once('Controller.php');
	/**
	* 
	*/
	class ErrorController extends Controller
	{
		function mainAction($errorMessage = "Erreur inconnue")
		{
			$this->render('Main', array("errorMessage" => $errorMessage));
		}

		function unknownControllerAction($controllerName)
		{
			$this->render('Main', array("errorMessage" => 'Impossible de trouver le contrôleur '.$controllerName));
		}

		function unknownActionAction($controllerName, $actionName)
		{
			$this->render('Main', array("errorMessage" => 'Impossible de trouver l\'action '.$actionName.' dans le controleur ma'.$controllerName));
		}
	}
?>