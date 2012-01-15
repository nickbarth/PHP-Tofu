<?php
	class Autoload 
	{
		public static function controllers($class)
		{
			// Autoload Controllers
			$file = BASEPATH.'/app/controllers/'.strtolower($class).'.php';
			if (file_exists($file)) require $file;
		}
		
		public static function models($class)
		{
			// Autoload Models
			$file = BASEPATH.'/app/models/'.strtolower($class).'.php';
			if (file_exists($file)) require $file;
		}
	}
