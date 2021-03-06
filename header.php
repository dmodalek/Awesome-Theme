<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>" />
		<!--

		Created by
		 __  __           _       _      _     __          __  _               _       _   _
		|  \/  |         | |     | |    | |    \ \        / / | |             | |     | | (_)
		| \  / | ___   __| | __ _| | ___| | __  \ \  /\  / /__| |__  ___  ___ | |_   _| |_ _  ___  _ __  ___
		| |\/| |/ _ \ / _` |/ _` | |/ _ \ |/ /   \ \/  \/ / _ \ '_ \/ __|/ _ \| | | | | __| |/ _ \| '_ \/ __|
		| |  | | (_) | (_| | (_| | |  __/   <     \  /\  /  __/ |_) \__ \ (_) | | |_| | |_| | (_) | | | \__ \
		|_|  |_|\___/ \__,_|\__,_|_|\___|_|\_\     \/  \/ \___|_.__/|___/\___/|_|\__,_|\__|_|\___/|_| |_|___/

		Hi there, nice to meet you!

		Visit our website at http://www.modalek.ch and send us an email :)

		-->
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width,initial-scale=1">

		<title><?php wp_title( '|', true, 'right' ); ?></title>
		<meta name="description" content="<?= bloginfo('description') ?>">
		<meta name="keywords" content="keyword1, keyword2, keyword3">

		<link rel="apple-touch-icon" href="<?php echo get_template_directory_uri(); ?>/img/apple-touch-icon-precomposed.png">
		<link href="//www.google-analytics.com" rel="dns-prefetch">
		<link href="//ajax.googleapis.com" rel="dns-prefetch">

		<?php wp_head(); ?>
	</head>
	<body <?php body_class(); ?>>

		<?= partial('google-analytics'); ?>

		<div class="site-wrapper">

			<header class="site-header" role="banner">
				<div class="inner">
					<div class="row">
						<?php echo module('main-nav')->template('toggle')->skin('toggle') ?>
						<?php echo module('logo') ?>
						<?php echo module('main-nav')->template('items')->skin('items') ?>
					</div>
				</div>
			</header>

			<div class="site-main" role="main">
				<div class="inner">
