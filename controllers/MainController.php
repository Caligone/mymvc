<?php
	require_once('Controller.php');
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