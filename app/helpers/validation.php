<?php
	class Validation extends Validation_Core
	{
		protected static function isNotEmpty($var, $value)
		{
			// Check if Variable is Empty
			if (!empty($value))
				return true;
			self::setError($var, $value, ucfirst($var).' cannot be empty.');
			return false;
		}
		
		protected static function isInteger($var, $value)
		{
			// Check if Variable is an Integer
			if (is_numeric($value))
				return true;
			self::setError($var, $value, ucfirst($var).' must be an integer.');
			return false;
		}
		
		protected static function isValidInput($var, $value)
		{
			// Check if Variable contains only letters, numbers, and underscores
			if (preg_match('/^[A-Za-z0-9]*$/', $value))
				return true;
			self::setError($var, $value, ucfirst($var).' must contain only numbers and letters.');
			return false;
		}
		
		protected static function isTrimmed($var, $value)
		{
			// Check if Variable has extra spaces on the start and end
			if ($value == trim($value))
				return true;
			self::setError($var, $value, ucfirst($var).' cannot start or end with spaces.');
			return false;
		}
		
		protected static function isUnique($var, $value)
		{
			// Check if Variable is unique in the database table
			$class = get_class(self::$object);
			if (!$class::findWhere($var.' = :'.$var.' AND id != :id', 
					$value, self::$object->id ? self::$object->id : -1))
				return true;
			self::setError($var, $value, ucfirst($var).' must be unique');
			return false;
		}
		
		protected static function isShorterThan($var, $value, $size)
		{
			// Check if Variable is a string shorter than X characters
			if (strlen($value) < $size)
				return true;
			self::setError($var, $value, ucfirst($var).' must be shorter than '.
				$size.' characters.');
			return false;
		}
		
		protected static function isLongerThan($var, $value, $size)
		{
			// Check if Variable is a string longer than X characters
			if (strlen($value) > $size)
				return true;
			self::setError($var, $value, ucfirst($var).' must be greater than '.
				$size.' characters.');
			return false;
		}
		
		protected static function isSmallerThan($var, $value, $size)
		{
			// Check if Variable is a number smaller in value than X
			if ($value < $size)
				return true;
			self::setError($var, $value, ucfirst($var).' must be less than '.$size.'.');
			return false;
		}
		
		protected static function isGreaterThan($var, $value, $size)
		{
			// Check if Variable is a number greater in value than X
			if ($value > $size)
				return true;
			self::setError($var, $value, ucfirst($var).' must be greater than '.$size.'.');
			return false;
		}
		
		protected static function isValidEmail($var, $value)
		{
			// Check if Variable is a valid email
			if (preg_match('/^[A-Za-z][A-Za-z0-9]*(?:_[A-Za-z0-9]+)*$/', $value))
				return true;
			self::setError($var, $value, ucfirst($var).' must be a valid.');
			return false;
		}
		
		protected static function isValidPhone($var, $value)
		{
			// Check if Variable is a valid phone number
			if (preg_match('/^[A-Za-z][A-Za-z0-9]*(?:_[A-Za-z0-9]+)*$/', $value))
				return true;
			self::setError($var, $value, ucfirst($var).' must be a valid phone number.');
			return false;
		}
	}
