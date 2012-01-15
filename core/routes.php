<?php
	class Routes 
	{
		private static	$url,
						$controller,
						$method,
						$params = array(),
		// URL Parsers
		$search = array( '/\//', '/\(\:(.+?)\)/', '/^/', '/$/'),
		$replace = array('\/', '([^\/]+?)', '/^', '$/i');

		public static function getController()
		{
			return self::$controller;
		}
		
		public static function getMethod()
		{
			return self::$method;
		}
		
		public static function run()
		{
			$controller = new self::$controller;
			call_user_func_array(array($controller, self::$method), self::$params);
			$controller->render();
		}
		
		public static function add($path, $controller, $method)
		{
			if (isset(self::$controller))
				return true;

			// Get URL Variables
			preg_match_all('/\(\:(.+?)\)/', $path, $matches);
			$URLVars = $matches[1];
			
			// Generate URL Parser - '/^\/example\/([^\/]+?)\/$/i'
			$path = preg_replace(self::$search, self::$replace, $path);
			
			if (preg_match($path, self::$url, $values))
			{
				// Path Found Set Vars and Route
				array_shift($values);
				self::$controller = $controller;
				self::$method = $method;
				
				// Add Params to Method Call
				if (!empty($values)) foreach(array_combine($URLVars, $values)
					as $key => $value)
						self::$params[] = $value;
			}
		}
		
		public static function getRoute()
		{
			self::$url = empty($_GET['url']) ? '/' : $_GET['url'];
			Routing::setRoutes();
			if (empty(self::$controller))
				trigger_error('Page Not Found');
			elseif (!method_exists(self::$controller, self::$method)) 
				trigger_error('Invalid Page Index');
			
			Security::check(self::$controller, self::$method);
			return array(self::$controller, self::$method);
		}
	}
