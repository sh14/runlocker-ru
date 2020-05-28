<!doctype html>
<html lang="<?php echo Init::$page['lang'];?>">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
	<meta charset="UTF-8"/>
	<title><?php print Init::$page['title']; ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<meta property="og:locale" content="ru_RU"/>
	<meta property="og:type" content="article"/>
	<meta property="og:title" content="<?php echo Init::$page['title'];?>"/>
	<meta property="og:description" content="<?php print Init::$page['description']; ?>"/>
	<meta property="og:url" content="<?php print Init::$page['url'] .'/'. Init::$page['active']; ?>"/>
	<meta property="og:site_name" content="Unlocker"/>
	<meta property="og:image" content="<?php echo Init::$page['url']; ?>/assets/images/logo_small.png"/>
	<link rel="shortcut icon" href="<?php echo Init::$page['url']; ?>/assets/images/icon.png" type="image/x-icon"/>
	<link href="<?php echo Init::$page['url']; ?>/assets/styles/style.css" rel="stylesheet"/>
</head>
<body>
<header class="header">
	<a class="logo" href="<?php echo Init::$page['url']; ?>">
		<img src="<?php echo Init::$page['url']; ?>/assets/images/logo.png" alt="Unlocker"/>
	</a>
	<nav class="navigation">
		<?php print Init::$page['menu']; ?>
	</nav>
</header>
<div class="page">
	<div class="page__box">
		<?php
//		if ( Init::$page['p'] != 'main' )
		{ ?>
		<h1><?php print Init::$page['title']; ?></h1>
<?php } ?>
