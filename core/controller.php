<?php
	abstract class Controller
	{
		protected $vars = array();
  
		public function render()
		{
			// Get Template and Page
			if (!file_exists(BASEPATH.'/app/views/'.Routes::getController().'/'.Routes::getMethod().'.php'))
				trigger_error('View file "'.Routes::getController().'/'.Routes::getMethod().'.php" was not found.');
      Template::render($this->vars, true);
		}

		public function __get($name)
		{		
			if (isset($this->vars[$name]))
				return $this->vars[$name];
			return null;
		}
		
		public function __set($name, $value)
		{
			$this->vars[$name] = $value;
		}
	}
