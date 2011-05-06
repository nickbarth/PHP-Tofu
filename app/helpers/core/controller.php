<?php
	abstract class Controller
	{
		protected $vars = array();
		
		public function render()
		{
			// Get Templating Vars
			extract($this->vars, EXTR_SKIP);
			
			// Get Template and Page
			if (!file_exists(BASEPATH.'/app/views/'.Routes::getController().'/'.Routes::getMethod().'.php'))
				trigger_error('View file "'.Routes::getController().'/'.Routes::getMethod().'.php" was not found.');
			
			// Render View
			ob_start();
			include(BASEPATH.'/app/views/'.Routes::getController().'/'.Routes::getMethod().'.php');
			$contents = ob_get_contents();
			ob_end_clean();
			
			Template::display($contents);
		}
		
		public function __set($name, $value)
		{
			$this->vars[$name] = $value;
		}
		
		public function __get($name)
		{		
			if (isset($this->vars[$name]))
				return $this->vars[$name];
			return null;
		}
	}