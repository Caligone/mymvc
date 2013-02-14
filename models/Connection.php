<?php
	class Connection
	{
	    private static $instance;
	 
		private function __construct()
		{
			self::$instance = new PDO('mysql:host='.DBHost.';dbname='.DBName, DBLogin, DBPassword);
		}
	 
		public static function getInstance()
		{
			if(!isset(self::$instance) || self::$instance == null)
				new Connection();
			return self::$instance; 
		}
	}
?>