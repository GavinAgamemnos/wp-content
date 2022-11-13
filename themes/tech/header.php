<?php
/**
 * Header template
 *
 * @author   <Author>
 * @version  1.0.0
 * @package  <Package>
 */
?>

<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Tech Test</title>
	<meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;700;900&display=swap" rel="stylesheet">

	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<header class="header"></header>
<nav class="navigation">
	<div class="hamburger">
			<div class="line"></div>
			<div class="line"></div>
			<div class="line"></div>
	</div>

	<?php wp_nav_menu(array( 'theme_location'=>'primary', 'container' => 'div', 'menu_id' => false, 'container_class'=>'navbar',  )); ?>

</nav>
<main class="main">
