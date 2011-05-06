<?php
	class Security extends Security_Core
	{
		public static function setSimpleAuth()
		{
			// Simple Auth Function
			if (!$_SESSION['admin'])
				trigger_error('Authorization Required');
		}
		
		public static function setBasicAuth()
		{
			// Basic Auth Function
			$authorized = false;

			if (empty($_SESSION['auth'])) 
				$_SESSION['auth'] = false;
			elseif ($_SESSION['auth'])
				$authorized = true;

			if (empty($_SESSION['session_id'])) {
			    session_regenerate_id();
			    $_SESSION['session_id'] = session_id();
			}
			
			if(!$_SESSION['auth'] && isset($_SERVER['PHP_AUTH_USER'],$_SERVER['PHP_AUTH_PW']) &&
			   $_SERVER['PHP_AUTH_USER'] == 'admin' && $_SERVER['PHP_AUTH_PW'] == 'password')
			{
				$authorized = true;
				$_SESSION['auth'] = true;
			}
			
			if (!$authorized)
			{
			    header('WWW-Authenticate: Basic Realm="Authorization Required - '.$_SESSION['session_id'].'"');
			    header('HTTP/1.0 401 Unauthorized');
			    $_SESSION['auth'] = false;
			    trigger_error('Authorization Required');
			}
		}
	}
