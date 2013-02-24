<?php
	/**
	* 
	*/
	class Controller
	{
		function __construct()
		{
			# code...
		}

		function render($viewName, $viewParam = null)
		{
			require_once(Path.'views/'.str_replace('Controller', '', get_class($this)).'/'.$viewName.'View.php');
		}

		function renderHome()
		{
			$controllerName = DefaultController.'Controller';
			$actionName = DefaultAction.'Action';
			require_once($controllerName.'.php');
			$controller = new $controllerName();
			call_user_func_array(array($controller, $actionName), array());
		}
	}	
?>