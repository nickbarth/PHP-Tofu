<?php
	abstract class Validation_Core
	{
		protected static	$object = null,
                      $validVars = array();
		
		protected static function setError($var, $value, $msg)
		{
			// Only Set Error if Not Already Set
			self::$object->errors[$var][] = $msg;
		}
		
		public static function isValid($object)
		{
			// Has Any Errors
			return !empty(self::$object['errors']);
		}
		
		public static function getErrors($object, $var = null)
		{
			// Get Errors
			if (empty(self::$errors[$object])) return array();
			elseif ($var) return self::$errors[$object][$var];
			return self::$errors[$object];
		}
		
		public static function check()
		{
			// Perform Valid Check
			$args = func_get_args();
			self::$object = array_shift($args);
			self::$validVars = self::$object->getVars();

			// Init Error Array
			self::$object->errors = array();
			
			// Check Object is Valid
			$isValid = true;
			foreach($args as $call)
				$isValid = Validation::doValidation($call) && $isValid;
			return $isValid;
		}
		
		public static function __callStatic($call, $args)
		{
			// Add Call to array
			return $call;
		}
		
		protected static function getVariables($varString, $call)
		{
			// Get and Check Variables
			$vars = explode('And', $varString);
			
			// Return All
			if ($vars[0] == 'all')
				return self::$validVars;
		
			// Return Select Vars
			$selectVars = array();
			foreach($vars as $var)
				if ($var == $call || !in_array(lcfirst($var), self::$validVars))
					trigger_error('Invalid validation variable "'.$var.'" given.');	
				else $selectVars[] = lcfirst($var);
			return $selectVars;
		}
		
		public static function doValidation($call)
		{
			// Initialize new Function Call
			$params = array();
			$parse = preg_split('/(Are|Is)/', $call);
			$vars = self::getVariables($parse[0], $call);
			
			// Determine Extra Parameters
			$parse = explode('Than', $parse[1]);
			if (isset($parse[1]))
			{
				$params[] = $parse[1];
				$parsedCall = $parse[0].'Than';
			} else $parsedCall = $parse[0];
			$parsedCall = 'is'.$parsedCall;
			
			// Check all Vars
			$isValid = true;
			foreach($vars as $var)
			{
				// Create Param
				$setParams = array_merge(array($var, self::$object->$var),  $params);
				
				// Check Valid Function
				if (!method_exists('Validation', $parsedCall))
					trigger_error('Invalid validation call to "'.$parsedCall.'" method.');
				
				// Make Call
				$result = call_user_func_array("Validation::$parsedCall", $setParams);
				$isValid = $isValid && $result;
			}
			
			// Return Result
			return $isValid;
		}
	}
