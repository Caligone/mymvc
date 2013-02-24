<?php
	/**
	 * Classe Connection
	 * Implémente le design patern singleton
	 * Permet d'obtenir une connexion valide et unique vers la base de données
	 */
	class Connection
	{
	    private static $instance;
	 
	 	/**
	 	 * Constructeur privé
	 	 */
		private function __construct()
		{
			self::$instance = new PDO('mysql:host='.DBHost.';dbname='.DBName, DBLogin, DBPassword);
		}

	 	/**
	 	 * Methode getInstance permettant d'obtenir une objet de la classe Connection
	 	 * @return Connection
	 	 */
		public static function getInstance()
		{
			if(!isset(self::$instance) || self::$instance == null)
				new Connection();
			return self::$instance; 
		}
	}
?>