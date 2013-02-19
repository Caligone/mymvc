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
			require_once(Path.'views/Main/homeView.php');
		}
	}	
?>