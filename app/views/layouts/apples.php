<!DOCTYPE HTML>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Apple Manager</title>
		<link rel="StyleSheet" href="{{ STYLE }}/reset.css" type="text/css" media="screen" />
		<link rel="StyleSheet" href="{{ STYLE }}/style.css" type="text/css" media="screen" />
		<script type="text/javascript" src="{{ JS }}/main.js" ></script>
	</head>
	<body>
	<h1>Apple Manager</h1>
    <a href="<?php print BASEURL ?>/">Home</a>
    <a href="<?php print BASEURL ?>/create/">Create Apple</a>
    <br/>
    <?php print $contents ?>
    Apple Manager &copy; 2011 by Nick Barth
	</body>
</html>
