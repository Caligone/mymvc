<?php
	require('Controller.php');
	/**
	* 
	*/
	class MainController extends Controller
	{
		function indexAction()
		{
			$this->render('home');
		}
	}
?>