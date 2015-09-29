<!DOCTYPE html>
<html>
<head>
{% block head %}
	<title>{% block title %}{% endblock %} - Shops</title>
	<meta charset="utf-8"> 
	<meta name="keywords" content="" />
	<meta name="description" content="" />
	<link rel="shortcut icon" href="/assets/favicon.ico" rel="icon" type="image/x-icon" />
	<link rel="stylesheet" type="text/css" href="/min/?g=css.plain">
	<script type="text/javascript" src="/min/?g=js.plain"></script>
{% endblock %}
</head>
<body>
	{% include 'header.plain.html' %}
	<div class="container">
		<div class="row content">{% block layout %}{% endblock %}</div>
		<div class="clearfix"></div>
	</div>
	{% include 'footer.plain.html' %}
</body>
</html>