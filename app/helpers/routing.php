<?php
	class Routing 
	{
		public static function setRoutes()
		{
			// URL - NOTE: always end with '/'
			Routes::add('/', 'main', 'index');
			Routes::add('/view/(:tofuID)/', 'main', 'view');
			Routes::add('/create/', 'main', 'create');
			Routes::add('/update/(:tofuID)/', 'main', 'update');
			Routes::add('/remove/(:tofuID)/', 'main', 'remove');
			
			// Security
			Security::set('main', 'setBasicAuth');
			Security::set('main', 'create', 'setBasicAuth');
		}
	}
