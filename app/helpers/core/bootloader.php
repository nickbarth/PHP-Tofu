<?php
	class BootLoader
	{
		public static function loadHelpers()
		{
			// Load in Helper Classes
			require(BASEPATH.'/app/helpers/core/model.php');
			require(BASEPATH.'/app/helpers/core/object.php');
			require(BASEPATH.'/app/helpers/core/registry.php');
			require(BASEPATH.'/app/helpers/core/autoload.php');
			require(BASEPATH.'/app/helpers/core/dbo.php');
			require(BASEPATH.'/app/helpers/core/queryob.php');
			require(BASEPATH.'/app/helpers/core/routes.php');
			require(BASEPATH.'/app/helpers/core/validation_core.php');
			require(BASEPATH.'/app/helpers/core/controller.php');
			require(BASEPATH.'/app/helpers/core/security_core.php');
			require(BASEPATH.'/app/helpers/core/template_core.php');
			require(BASEPATH.'/app/helpers/routing.php');
			require(BASEPATH.'/app/helpers/validation.php');
			require(BASEPATH.'/app/helpers/template.php');
			require(BASEPATH.'/app/helpers/security.php');
			require(BASEPATH.'/app/objects/tofu.php');
		}
	}
