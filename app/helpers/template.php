<?php
	$templates = array(
		'<<IMAGES>>'  => BASEURL.'/style/images',
		'<<CSS>>'     => BASEURL.'/style',
		'<<JS>>'      => BASEURL.'/style/js',
		'<<BASEURL>>' => BASEURL);

	function post($var, $object)
	{
		// Output and Escape a POST Variable if Set
		if (isset($_POST[$object][$var]))
			print escape($_POST[$object][$var]);
	}

	function error($object, $var)
	{
		// Output and Escape a POST Variable if Set
		if (isset($object->errors[$var]))
			print $object->errors[$var][0];
	}

	function postf(&$var, $post)
	{
		// Output User POST Input if set or Default Variable
		if (isset($_POST[$post]))
			print escape($_POST[$post]);
		elseif (!empty($var))
			print escape($var);
	}

	function escape()
	{
		// Short HTML Entities Call
		return call_user_func_array('htmlentities', func_get_args());
	}