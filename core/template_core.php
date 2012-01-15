<?php
	abstract class Template_Core
	{
		public static function display($contents)
		{
			// Output Content
			$contents = str_ireplace('<<IMAGES>>', BASEURL . '/style/images', $contents);
			$contents = str_ireplace('<<CSS>>', BASEURL . '/style', $contents);
			$contents = str_ireplace('<<JS>>', BASEURL . '/style/js', $contents);
			$contents = str_ireplace('<<BASEURL>>', BASEURL, $contents);
			print $contents;
		}
		
		public static function handleError($errno, $errstr, $errfile, $errline)
		{
			print $errstr;
			// Set Error Message
			if (Registry::getDebugMode())
				$errorMessage = 'Error Number '.$errno.'. "'.$errstr.'" on '.
							    'line '.$errline.' in file "'.$errfile.'"';
			else $errorMessage = $errstr;
		
			// Display Error File
			$file = BASEPATH.'/app/views/error.php';
			if (file_exists($file))
			{
				ob_start();
				include($file);
				$contents = ob_get_contents();
				ob_end_clean();
				self::display($contents);
			} else print 'Error template not found';
			exit;
		}
		
		public static function handleException($exception)
		{
			if (Registry::getDebugMode())
				trigger_error('Exception: '.$exception->getMessage());
			else trigger_error('Internal Server Error'); 
		}
	}
