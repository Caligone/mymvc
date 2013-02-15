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
			require(Path.'views/'.str_replace('Controller', '', get_class($this)).'/'.$viewName.'View.php');
		}
	}	
?>