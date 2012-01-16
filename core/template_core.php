<?php
	class Template
	{
    public static function render($vars, $displayContents = true)
    {
			// Get Templating Vars
			extract($vars, EXTR_SKIP);

      // Include Helper Functions
      require(BASEPATH.'/app/helpers/template.php');

			// Render View File
			ob_start();
			include(BASEPATH.'/app/views/'.Routes::getController().'/'.Routes::getMethod().'.php');
			$contents = ob_get_contents();
			ob_end_clean();

			// Render Layout File
			ob_start();
			include(BASEPATH.'/app/views/layouts/'.Routes::getController().'.php');
			$view = ob_get_contents();
			ob_end_clean();

      foreach($templates as $key => $value)
        $view = str_ireplace($key, $value, $view);
  
      // Render View
      if ($displayContents)
        print $view;
      return $view;
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
        include_once(BASEPATH.'/app/helpers/template.php');

				ob_start();
				include($file);
				$contents = ob_get_contents();
				ob_end_clean();

        foreach($templates as $key => $value)
          $view = str_ireplace($key, $value, $view);
			  print $contents;	
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
