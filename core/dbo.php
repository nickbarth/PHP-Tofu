<?php
	class DBO extends PDO
	{
		public $database;
		private static $instance;
		
		public function __construct($dns, $username = '', $password = '', $driver_options = array())
		{
			// Create Database Connection
			parent::__construct($dns, $username, $password, $driver_options);
			
			// Set Error Mode
			$this->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			$this->database = $this;
		}
		
		// Singleton Object
	    public static function getInstance($dns = null, $username = '', $password = '', $driver_options = array())
    	{
			if (empty(self::$instance) && isset($dns))
				self::$instance = new DBO($dns, $username, $password, $driver_options);
			return self::$instance;
    	}
    	
		// Query Database
		public function query()
		{
			$query = new QueryOB(func_get_args());
			return $query;
		}
	}