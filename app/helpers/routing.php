<?php
	class Routing 
	{
		public static function setRoutes()
		{
			// URL Routes 
			Routes::add('/', 'main', 'index');
			Routes::add('/view/(:tofuID)/', 'main', 'view');
			Routes::add('/create/', 'main', 'create');
			Routes::add('/update/(:tofuID)/', 'main', 'update');
			Routes::add('/remove/(:tofuID)/', 'main', 'remove');
		}
	}
