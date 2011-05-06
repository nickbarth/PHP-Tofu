<!DOCTYPE HTML>
<html lang="en">
	<head>
		<meta charset="UTF-8">
		<title>Tofu Manager</title>
		<link rel="StyleSheet" href="{{ STYLE }}/reset.css" type="text/css" media="screen" />
		<link rel="StyleSheet" href="{{ STYLE }}/style.css" type="text/css" media="screen" />
		<script type="text/javascript" src="{{ JS }}/main.js" ></script>
	</head>
	<body>
	<h1>Tofu Manager</h1>
		{{ layout('common/nav') }}
		{{ CONTENT }}
		{{ layout('common/footer') }}
	</body>
</html>
