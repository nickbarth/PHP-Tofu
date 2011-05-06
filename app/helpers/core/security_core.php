<?php
	abstract class Security_Core
	{
		public static $checks = array();
		
		public static function set()
		{
			// Add Security Check
			self::$checks[] = func_get_args();
		}
		
		public static function check($controller, $method)
		{
			// Do Security Checks
			foreach(self::$checks as $check)
			{
				if (count($check) == 3 && $check[0] == $controller && $check[1] == $method)
					Security::$check[2]();
				elseif (count($check) == 2 && $check[0] == $controller)
					Security::$check[1]();
			}
		}
	}