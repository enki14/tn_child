<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Nineteen
 * @since Twenty Nineteen 1.0
 */
?><!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<link rel="profile" href="https://gmpg.org/xfn/11" />
	<link rel="shortcut icon" href="<?php $upload_dir = wp_upload_dir(); echo $upload_dir['baseurl'] . $upload_dir['subdir']; ?>/favicon.ico">
	<?php wp_head(); ?>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'twentynineteen' ); ?></a>

		<header id="masthead" class="align-items-center d-flex justify-content-between">
	
			<div class="site-branding-container">
				<?php get_template_part( 'template-parts/header/site', 'branding' ); ?>
			</div><!-- .site-branding-container -->

			<?php if ( is_singular() && twentynineteen_can_show_post_thumbnail() ) : ?>
				<div class="site-featured-image">
					<?php
						twentynineteen_post_thumbnail();
						the_post();
						$discussion = ! is_page() && twentynineteen_can_show_post_thumbnail() ? twentynineteen_get_discussion_data() : null;

						$classes = 'entry-header';
					if ( ! empty( $discussion ) && absint( $discussion->responses ) > 0 ) {
						$classes = 'entry-header has-discussion';
					}
					?>
					<div class="<?php echo $classes; ?>">
						<?php get_template_part( 'template-parts/header/entry', 'header' ); ?>
					</div><!-- .entry-header -->
					<?php rewind_posts(); ?>
				</div>
			<?php endif; ?>

			<!-- ナビゲーション部分 -->
			<nav id="Site-navigation" class="Main-navigation flex-row-reverse" aria-label="<?php esc_attr_e( 'Top Menu', 'twentynineteen' ); ?>">
					<ul id="nav-menu" class="main-menu row">
						<li id="item-41" class="col"><a href="#about">About</a></li>
						<li id="item-39" class="col"><a href="#works">Works</a></li>
						<li id="item-92" class="col"><a href="#news">News</a></li>
						<li id="item-38" class="col"><a href="#contact">Contact</a></li>
						<li id="item-99" class="col">
							<a href="https://www.instagram.com/" target="_blank">
								<img src="<?php $upload_dir = wp_upload_dir(); echo $upload_dir['baseurl'] . $upload_dir['subdir']; ?>/icon-instagram.png" />
							</a>
						</li>
					</ul>
			</nav>
			<?php if ( has_nav_menu( 'social' ) ) : ?>
				<nav class="social-navigation" aria-label="<?php esc_attr_e( 'Social Links Menu', 'twentynineteen' ); ?>">
					<?php
					wp_nav_menu(
						array(
							'theme_location' => 'social',
							'menu_class'     => 'social-links-menu',
							'link_before'    => '<span class="screen-reader-text">',
							'link_after'     => '</span>' . twentynineteen_get_icon_svg( 'link' ),
							'depth'          => 1
						)
					);
					?>
				</nav><!-- .social-navigation -->
			<?php endif; ?>
		</header><!-- #masthead -->

	<div id="content" class="site-content">
		<div id="mainvisual" class="mb-5">
			<picture>
				<source srcset="<?php $upload_dir = wp_upload_dir(); echo $upload_dir['baseurl'] . $upload_dir['subdir']; ?>/mainvisual-sp.jpg" media="(max-width: 600px)" />
				<img src="<?php $upload_dir = wp_upload_dir(); echo $upload_dir['baseurl'] . $upload_dir['subdir']; ?>/mainvisual-pc.jpg"/>
			</picture>
		</div>
