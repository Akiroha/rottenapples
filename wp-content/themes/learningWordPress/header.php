<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo('charset'); ?>">
		<meta name="viewport" content="width=device-width">
		<title><?php bloginfo('name'); ?></title>
		<?php wp_head(); ?>
	</head>

<body <?php body_class(); ?>>

	<div class="container">

		<!-- site-header -->
		<header class="site-header">

			<!-- hd-search -->
			<div class="hd-search">
				<?php get_search_form(); ?>
			</div><!-- /hd-search -->
				<span class="home_img_holder">
					<a href="<?php echo home_url(); ?>"><img class="header-logo" src="<?php echo get_template_directory_uri() . "/photos/rottenApple.png"; ?>" alt="Rotten Apples"></a>
				</span>
			<h5><?php bloginfo('description'); ?>

			<!-- <?php if (is_page(10)) { ?>
				- Thank you for viewing our work
			<?php }?></h5> -->

			<!-- <nav class="site-nav">

				<?php

				$args = array('theme_location' => 'primary');

				?>
				<?php wp_nav_menu( $args ); ?>
			</nav> -->

			<nav class="site-nav">
				<?php wp_nav_menu(array(
				'menu' => 'Primary Menu Links', 
				'container_id' => 'cssmenu', 
				'walker' => new CSS_Menu_Walker()
			)); ?>
			</nav>
		</header><!-- /site-header -->