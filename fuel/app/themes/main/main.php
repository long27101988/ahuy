<!DOCTYPE html>
<html>
<head>
	<title><?php echo (@$titlepage != "") ? @$titlepage : "Dien lanh Dai Phu"  ?></title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="apple-touch-icon" sizes="57x57" href="assets/img/favico/apple-touch-icon-57x57.png">
	<link rel="apple-touch-icon" sizes="60x60" href="assets/img/favico/apple-touch-icon-60x60.png">
	<link rel="apple-touch-icon" sizes="72x72" href="assets/img/favico/apple-touch-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="76x76" href="assets/img/favico/apple-touch-icon-76x76.png">
	<link rel="apple-touch-icon" sizes="114x114" href="assets/img/favico/apple-touch-icon-114x114.png">
	<link rel="apple-touch-icon" sizes="120x120" href="assets/img/favico/apple-touch-icon-120x120.png">
	<link rel="apple-touch-icon" sizes="144x144" href="assets/img/favico/apple-touch-icon-144x144.png">
	<link rel="apple-touch-icon" sizes="152x152" href="assets/img/favico/apple-touch-icon-152x152.png">
	<link rel="icon" type="image/png" href="assets/img/favico/favicon-32x32.png" sizes="32x32">
	<link rel="icon" type="image/png" href="assets/img/favico/favicon-96x96.png" sizes="96x96">
	<link rel="icon" type="image/png" href="assets/img/favico/favicon-16x16.png" sizes="16x16">
	<link rel="manifest" href="assets/img/favico/manifest.json">
	<link rel="mask-icon" href="assets/img/favico/safari-pinned-tab.svg" color="#5bbad5">
	<meta name="msapplication-TileColor" content="#da532c">
	<meta name="msapplication-TileImage" content="assets/img/favico/mstile-144x144.png">
	<meta name="theme-color" content="#ffffff">
	<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,700,700italic' rel='stylesheet' type='text/css'>

	<?php echo \Theme::instance()->asset->css(['style.css', 'custom.css', 'media.css'], ["rel" => "stylesheet"])?>
</head>
<div id="fb-root"></div>
<body>
	<div id="fb-root"></div>
<main id="main" class="main">
	<div id="<?php echo @$mainClass;?>" class="<?php echo @$mainClass;?>">
<!-- 	   	<?php //echo @$partials['banner'];?>
		<?php //echo @$partials['brearcrumbs'];?> -->
		<?php echo @$content?>
	</div>
</main><!-- main -->
<?php echo $partials['footer'];?>
