<?php
	require_once('Connection.php');
	/**
	* Classe Model
	* Représente une ligne dans la base de données sous forme d'objet
	*/
	class Model
	{
		public $id;
		protected $modelName;
		protected $connection = null;

		function __construct()
		{
			$this->modelName = get_class($this);
			$this->id = -1;
			$this->connection = Connection::getInstance();
		}

		function save()
		{
			$attributesArray = get_object_vars($this);
			unset($attributesArray["modelName"]);
			unset($attributesArray["connection"]);
			$columnsList = '';
			$valuesList = '';
			foreach($attributesArray as $key=>$value)
			{
				$columnsList .= $key.', ';
				if(!isset($value))
					$valuesList .= "NULL, ";
				if(is_string($value))
					$valuesList .= "'".$value."', ";
				else
					$valuesList .= $value.', ';
			}
			$columnsList = substr($columnsList, 0, strlen($columnsList)-2);
			$valuesList = substr($valuesList, 0, strlen($valuesList)-2);

			if($this->id == -1)
				$req = "INSERT INTO site_".str_replace('model', '', strtolower(get_class($this)))."(".$columnsList.") VALUES (".$valuesList.")";
			else
			{
				$columnsList = explode(', ', $columnsList);
				$valuesList = explode(', ', $valuesList);
				$param = '';
				foreach ($columnsList as $key => $value)
					$param .= $columnsList[$key]." = ".$valuesList[$key].", ";
				$param = substr($param, 0, strlen($param)-2);
				$req = "UPDATE site_".str_replace('model', '', strtolower(get_class($this)))." SET ".$param." WHERE id=".$this->id;
			}
			$this->connection->query($req);
		}

		function getBy($column, $value)
		{
			if(is_string($value))
				$value = "'".$value."'";
			
			$req = "SELECT * FROM site_".str_replace('model', '', strtolower(get_class($this)))." WHERE ".$column." = ".$value;
			$data = $this->connection->query($req);

			$results = array();
			$i = 0;

			if(!is_object($data))
				return array();
			foreach ($data as $row)
			{
				$results[$i] = new $this->modelName();
				foreach ($row as $key => $value)
				{
					if(is_string($key))
						$results[$i]->$key = $value;
				}
				$i++;
			}
			$data->closeCursor();
			if($i == 1)
				return $results[0];
			return $results;
		}

		function getAll($min = 0, $max = 1000)
		{
			$req = "SELECT * FROM site_".str_replace('model', '', strtolower(get_class($this)))." LIMIT ".$min.','.$max;
			$data = $this->connection->query($req);

			$results = array();
			$i = 0;

			if(!is_object($data))
				return array();
			foreach ($data as $row)
			{
				$results[$i] = new $this->modelName();
				foreach ($row as $key => $value)
				{
					if(is_string($key))
						$results[$i]->$key = $value;
				}
				$i++;
			}
			$data->closeCursor();
			if($i == 1)
				return $results[0];
			return $results;
		}

		function getCount()
		{
			$req = "SELECT count(1) FROM site_".str_replace('model', '', strtolower(get_class($this)));
			$data = $this->connection->query($req);
			foreach ($data as $value)
				return $value[0];
		}
	}
?>