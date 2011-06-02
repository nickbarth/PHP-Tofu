<?php
	class PHPTofu
	{
		public static function StartApp()
		{
			ob_start('ob_gzhandler');
			session_start();
			
			// Defines
			define('BASEURL', substr((empty($_SERVER['HTTPS']) ? 'http://' : 'https://' ) . $_SERVER['SERVER_NAME'] . $_SERVER['PHP_SELF'],0,-10));
			define('BASEPATH', substr($_SERVER['SCRIPT_FILENAME'],0,-10));
			
			// Helper Boot Loader
			require(BASEPATH.'/app/helpers/core/bootloader.php');
			
			// Initialize Helpers
			BootLoader::loadHelpers();
			Registry::getInstance();
			
			// Handle Errors
			Registry::setDebugMode(true);
			set_error_handler('Template::handleError');
			set_exception_handler('Template::handleException');
	
			// Initialize Database
			Model::$db = DBO::getInstance('sqlite:example.sqldb');
			
			// Init Autoloads
			spl_autoload_register('Autoload::controllers');
			spl_autoload_register('Autoload::models');
			
			// Determine Controllers and Methods
			Routes::getRoute();
			
			// Run Application
			Routes::run();
		}
	}
	
	PHPTofu::StartApp();
