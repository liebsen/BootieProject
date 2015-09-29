<!DOCTYPE html>
<html>
<head>
	<title>Caldero</title>
	<meta charset="utf-8"> 
	<meta name="keywords" content="" />
	<meta name="description" content="" />
	<link rel="shortcut icon" href="/assets/favicon.ico" rel="icon" type="image/x-icon" />
	<link rel="stylesheet" type="text/css" href="/min/?g=css.default"> 
	<script type="text/javascript" src="/min/?g=js.default"></script>
</head>
<body class="default">
<?php if($_SERVER['REMOTE_ADDR'] != "127.0.0.1"):?>
	<?php include SP . 'app/views/shared/analytics.php';?>
<?php endif;?>
	<?php include SP . 'app/views/shared/header.php';?>
	<div class="container">
		<div class="row content"><?php echo $content;?></div>
	</div>
	<?php include SP . 'app/views/shared/footer.php';?>
</body>
</html>