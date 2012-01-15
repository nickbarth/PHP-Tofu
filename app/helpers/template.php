<?php
	class Template extends Template_Core
	{	
		public static function post($var, $object)
		{
			// Output and Escape a POST Variable if Set
			if (isset($_POST[$object][$var]))
				print Template::escape($_POST[$object][$var]);
		}
		
		public static function error($object, $var)
		{
			// Output and Escape a POST Variable if Set
			if (isset($object->errors[$var]))
        print $object->errors[$var][0];
		}

		public static function postf(&$var, $post)
		{
			// Output User POST Input if set or Default Variable
			if (isset($_POST[$post]))
				print Template::escape($_POST[$post]);
			elseif (!empty($var))
				print Template::escape($var);
		}
		
		public static function get($var)
		{
			// Output and Escape a GET Variable if Set
			if (isset($_GET[$var]))
				print Template::escape($_GET[$var]);
		}
		
		public static function getf(&$var, $post)
		{
			// Output User GET Input if set or Default Variable
			if (isset($_GET[$post]))
				print Template::escape($_GET[$post]);
			elseif (!empty($var))
				print Template::escape($var);
		}
		// sprintf %s
		public static function escape()
		{
			// Short HTML Entities Call
			return call_user_func_array('htmlentities', func_get_args());
		}
		
		public static function output(&$var, $before = '', $after = '')
		{
			// Output and Escape a Variable if Set
			if (!empty($var))
				print $before.Template::escape($var).$after;
		}
		
		public static function layout($file)
		{
			// Short REQUIRE LAYOUT Call
			require(BASEPATH.'/app/views/layout/'.$file.'.php');
		}
	}
