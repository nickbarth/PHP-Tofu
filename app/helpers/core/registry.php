<?php
	// Maybe Get Rid OF THIS
	class Registry
	{
		public $vars = array();
		private static $instance;
	
		public static function getInstance()
		{
			self::$instance = new Registry();
		}
		
		public static function __callStatic($name, $args)
		{
			// Registry::setVar() Syntax
			$action = substr($name, 0, 3);
			$variable = substr($name, 3);
			
			switch ($action)
			{
				default:
					throw new Exception('Invalid registry action.');
				break;
				case 'all':
					return self::$instance->vars;
					break;
				case 'get':
					if (array_key_exists($variable, self::$instance->vars))
						return self::$instance->vars[$variable];
					else trigger_error('Invalid registry property "'.$variable.'"');
				break;
				case 'set':
					self::$instance->vars[$variable] = $args[0];
				break;
			}
		}
	}