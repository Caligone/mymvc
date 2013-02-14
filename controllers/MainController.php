<?php
	require('Controller.php');
	/**
	* 
	*/
	class MainController extends Controller
	{
		function __construct()
		{
		
		}

		function indexAction()
		{
			$this->render('home');
		}
	}
?>