<?php
	class Routing 
	{
		public static function setRoutes()
		{
			// URL Routes 
			Routes::add('/', 'apples', 'index');
			Routes::add('/view/(:tofuID)/', 'apples', 'view');
			Routes::add('/create/', 'apples', 'create');
			Routes::add('/update/(:tofuID)/', 'apples', 'update');
			Routes::add('/remove/(:tofuID)/', 'apples', 'remove');
		}
	}
