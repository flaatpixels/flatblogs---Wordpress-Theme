<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package flatblogs
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php //body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'flatblogs' ); ?></a>

	<header id="masthead" class="site-header <?= is_home() && is_front_page() || is_archive() ? 'is-home' : '' ?>" style="background-image:url('<?= get_theme_mod("banner_image_load", get_template_directory_uri() . '/img/header.jpg'); ?>')">

		<div class="site-header_top">

			<div class="site-main">
				<!--<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>-->

				<nav id="site-navigation" class="main-navigation">
					<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false">
						<svg>
					     <use xlink:href="<?php echo esc_url( get_template_directory_uri() . '/img/menu.svg#menu' ); ?>"></use>
					</button>
					<?php
					wp_nav_menu( array(
						'theme_location' => 'menu-1',
						'menu_id'        => 'primary-menu',
					) );
					?>
				</nav>
			</div>

		</div>
		
		<?php if(is_home() && is_front_page() || is_archive()) : ?>
		<div class="site-banner site-main">
			<div class="site-branding">
				<h1 class="site-title"><?php bloginfo( 'name' ); ?></h1>
				<?php
					$flatblogs_description = get_bloginfo( 'description', 'display' );
					if ( $flatblogs_description || is_customize_preview() ) :
				?>
					<p class="site-description"><?php echo $flatblogs_description; /* WPCS: xss ok. */ ?></p>
				<?php endif; ?>
			</div><!-- .site-branding -->

			<div class="categories">
				

				<?php
					$current_category = get_category( get_query_var( 'cat' ) );

					$categories = get_categories( array(
					    'orderby' => 'name',
					    'order'   => 'ASC'
					) );

					//Show a category for all posts -->
					$defaultCategory = sprintf(
						'<a href="%1s" rel="home" class="category %2s">Tout</a>',
						esc_url( home_url( '/' ) ),
						!$current_category->cat_ID ? 'current_tag' : ''
					);
					echo $defaultCategory;

					foreach( $categories as $category ) {
					    $category_link = sprintf( 
					        '<a href="%1$s" alt="%2$s" class="category %4$s">%3$s</a>',
					        esc_url( get_category_link( $category->term_id ) ),
					        esc_attr( sprintf( __( 'View all posts in %s', 'textdomain' ), $category->name ) ),
					        esc_html( $category->name ),
					        $current_category && $current_category->cat_ID == $category->cat_ID ? 'current_tag' : ''
					    );

					    echo $category_link;
					} 
				 ?>
			</div>
		</div>
	<?php endif; ?>

	</header><!-- #masthead -->

	<div id="content" class="site-content">
