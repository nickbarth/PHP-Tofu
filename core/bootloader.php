<?php
	class BootLoader
	{
		public static function loadHelpers()
		{
			// Load in Helper Classes
			require(BASEPATH.'/core/model.php');
			require(BASEPATH.'/core/registry.php');
			require(BASEPATH.'/core/autoload.php');
			require(BASEPATH.'/core/dbo.php');
			require(BASEPATH.'/core/queryob.php');
			require(BASEPATH.'/core/routes.php');
			require(BASEPATH.'/core/validation_core.php');
			require(BASEPATH.'/core/controller.php');
			require(BASEPATH.'/core/security_core.php');
			require(BASEPATH.'/core/template_core.php');
			require(BASEPATH.'/app/helpers/routing.php');
			require(BASEPATH.'/app/helpers/validation.php');
			require(BASEPATH.'/app/helpers/template.php');
			require(BASEPATH.'/app/helpers/security.php');
		}
	}
