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
			require(Path.'views/'.$viewName.'.php');
		}
	}	
?>