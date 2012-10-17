<?php
	class Model
	{
		public static $db;
		public
			// Primary Key
			$id = 0,
			$errors = array();

		protected
			// Valid Object
			$isValid = false,
			$isRemoved = false,
			$isUpdated = false;
		
		protected static function parseQuery($statement, $args)
		{
			// Parse and Create a Query
			return call_user_func_array(array(self::$db, 'query'), 
				array_merge((array)$statement, $args));
		}
		
		protected static function createObject($args)
		{
			// Create and populate Object
			$object = get_called_class();
			$object = new $object();
			foreach($args[0] as $key => $value)
				if (in_array($key, static::getVars()))
					$object->$key = $value;
			if ($object->validate())
				$object->setValid();
			return $object;
		}

		public static function getVars()
		{
			// Get Object Variables
			$variables = get_class_vars(get_called_class());
			return array_keys(array_splice($variables, 0, -7));
		}
		
		public static function create(&$obj)
		{
			$object = new self();
			if (func_get_args() != array(0 => null))
			$object = self::createObject(func_get_args());
			if (!$object->isValid())
				return $object;
			$query = 'INSERT INTO '.get_called_class().' ('.
				implode(', ', self::getVars()). 
				') VALUES (:'.implode(', :', self::getVars()).');';
			self::parseQuery($query, $obj);
			$object->id = self::$db->lastInsertId();
			return $object;
		}
		
		public static function change($object)
		{
			// Update an Object
			$values = array();
			$varset = array();
			$vars = self::getVars();
			
			foreach($vars as $var)
				$values[] = $object->{$var};
			foreach($vars as $var)
				$varset[] = $var.' = :'.$var;
			$query = 'UPDATE '.get_called_class().' SET '.
				     ' '.implode(', ', $varset).
				     ' WHERE id = :id';
			array_push($values, $object->id);
			self::parseQuery($query, $values);
		}
		
		public static function find($id)
		{
			// Read Single
			$object = self::findWhere('id = :id', $id);
			return isset($object[0]) ? $object[0] : null;
		}
		
		public static function findAll()
		{
			// Read All
			return self::findWhere(null);
		}
		
		public static function findWhere()
		{
			// Required Variables
			$statement = 'SELECT * FROM '.get_called_class();
			$args = func_get_args();
			$where = array_shift($args);
			
			// Append to SELECT Statement
			if (!empty($where))
				$statement .= ' WHERE '.$where;
			$query = self::parseQuery($statement, $args);
			return $query->getObjects(get_called_class());
		}
		
		public static function count()
		{
			// Required Variables
			$statement = 'SELECT count(*) as count FROM '.get_called_class();
			$args = func_get_args();
			$where = array_shift($args);
			
			// Append to SELECT Statement
			if (!empty($where))
				$statement .= ' WHERE '.$where;
			$query = self::parseQuery($statement, $args);
			return $query->getRow('count');
		}
		
		public static function delete($args)
		{
			// Remove Object
			self::parseQuery('DELETE FROM '.get_called_class().
                       ' WHERE id = :id', $args[0]);
		}
    
		// Object Instance Functions
		public function __toString()
		{
			// To String
			return get_called_class();
		}
		
		public function isValid()
		{
			// Check if Valid
			return $this->isValid;
		}
		
		public function isRemoved()
		{
			// Check if Removed
			return $this->isRemoved;
		}
		
		public function isUpdated()
		{
			// Check was Updated
			return $this->isUpdated;
		}
		
		public function setInvalid()
		{
			// Set Invalid Object
			$this->isValid = false;
		}

		public function setValid()
		{
			// Set Invalid Object
			$this->isValid = true;
		}
		
		public function getLog($var = null)
		{
			// Get Error Log
			return Validation::getErrors((string)$this, $var);
		}
		
		public function getObject()
		{
			// Get Called Class
			return get_parent_class($this);
		}
		
		public function remove(&$args)
		{
			// Delete Object From Database
			if (func_get_args() != array(0 => null))
			{
				call_user_func(array(get_class(), "delete"), func_get_args());
				$this->isRemoved = true;
			}
		}
		
		public function update(&$update)
		{
			// Update Object 
			if (func_get_args() != array(0 => null))
			{
				// Make a Update Object Function
				foreach($update as $key => $value)
				$this->{$key} = $value;
				if ($this->Validate())
				{
					call_user_func(array(get_class(), "change"), $this);
					$this->isUpdated = true;
				} else $this->setInvalid();
			}
		}
		
		public function Validate()
		{
			if (empty($this->validate))
				return true;
			$validators = explode(',', 
				preg_replace('/\s/', '', $this->validate));
			array_unshift($validators, $this);
			return call_user_func_array('Validation::check', $validators);
		}
	}