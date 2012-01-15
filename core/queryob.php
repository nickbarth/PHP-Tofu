<?php
	class QueryOB extends PDOStatement
	{
		private $query,
            $queryText,
            $database;
		
		public function __construct($query) 
		{
			// Setup Database Connection
			$this->database = DBO::getInstance();
			
			// Prepare and Bind Query
			$this->queryText = array_shift($query);
			$this->query = $this->database->prepare($this->queryText);
			preg_match_all('/(:[^,)\s]+)/', $this->queryText, $binds);
			if ($binds) foreach($binds[0] as $bind) 
			{
				$value = array_shift($query);
				if (is_null($value)) $this->query->bindValue($bind, $value, PDO::PARAM_NULL);
				else $this->query->bindValue($bind, $value);
			}
			
			// Update Database
			$this->query->execute();
		}
		
		public function __toString()
		{
			// Return String Query
			return $this->queryText;
		}
		
		public function getObject($objectType)
		{
			// Return Object
			return $this->database->fetch(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, $objectType);
		}
		
		public function getObjects($objectType)
		{
			// Return Object Array
			return $this->query->fetchAll(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, $objectType);
		}
		
		public function getRow($var = null)
		{
			// Return Result
			if (!$var)
				return $this->query->fetch();
			$row = $this->query->fetch();
			return $row[$var];
		}
		
		public function getRows()
		{
			// Return Array
			return $this->query->fetchAll();
		}
	}
