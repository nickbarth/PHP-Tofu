<?php
	class Model
	{
		public static $db;
		
		protected static function parseQuery($statement, $args)
		{
			// Parse and Create a Query
			return call_user_func_array(array(self::$db, 'query'), 
				array_merge((array)$statement, $args));
		}
		
		protected static function validateObject($values)
		{
			// Create and Check Test Object
			$object = new static::$to();
			$args = array_combine(static::getVars(), $values);
			foreach($args as $key => $value)
				$object->$key = $value;
			if (!$object->validate())
				$object->setInvalid();
			return $object;
		}
		
		protected static function getVars()
		{
			// Get Object Variables
			$variables = get_class_vars(static::$to);
			return array_keys(array_splice($variables, 0, -3));
		}
		
		public static function create()
		{
			// Create an Object
			$object = self::validateObject(func_get_args());
			if (!$object->isValid())
				return $object;
			$query = 'INSERT INTO '.static::$to.' ('.
				implode(', ', self::getVars()). 
				') VALUES (:'.implode(', :', self::getVars()).');';
			self::parseQuery($query, func_get_args());
			$object->id = self::$db->lastInsertId();
			return $object;
		}
		
		public static function update($object)
		{
			// Update an Object
			$values = array();
			$varset = array();
			$vars = self::getVars();
			
			foreach($vars as $var)
				$values[] = $object->{$var};
			foreach($vars as $var)
				$varset[] = $var.' = :'.$var;
			$query = 'UPDATE '.static::$to.' SET '.
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
			$statement = 'SELECT * FROM '.static::$to;
			$args = func_get_args();
			$where = array_shift($args);
			
			// Append to SELECT Statement
			if (!empty($where))
				$statement .= ' WHERE '.$where;
			$query = self::parseQuery($statement, $args);
			return $query->getObjects(static::$to);
		}
		
		public static function count()
		{
			// Required Variables
			$statement = 'SELECT count(*) as count FROM '.static::$to;
			$args = func_get_args();
			$where = array_shift($args);
			
			// Append to SELECT Statement
			if (!empty($where))
				$statement .= ' WHERE '.$where;
			$query = self::parseQuery($statement, $args);
			return $query->getRow('count');
		}
		
		public static function delete()
		{
			// Remove Object
			self::parseQuery('DELETE FROM '.static::$to.
							 ' WHERE id = :id', func_get_args());
		}
	}