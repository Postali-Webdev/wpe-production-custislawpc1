<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<?php 
global $qode_options_passage;
global $wp_query;
$disable_qode_seo = "";
$seo_title = "";
if (isset($qode_options_passage['disable_qode_seo'])) $disable_qode_seo = $qode_options_passage['disable_qode_seo'];
if ($disable_qode_seo != "yes") {
	$seo_title = get_post_meta($wp_query->get_queried_object_id(), "qode_seo_title", true);
	$seo_description = get_post_meta($wp_query->get_queried_object_id(), "qode_seo_description", true);
	$seo_keywords = get_post_meta($wp_query->get_queried_object_id(), "qode_seo_keywords", true);
}
?>
<head>

	<!-- Google Tag Manager -->
	<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
	new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
	j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
	'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
	})(window,document,'script','dataLayer','GTM-TGPXT8L');</script>
	<!-- End Google Tag Manager -->

	<?php
	$global_schema = get_field('global_schema', 'options');
	$single_schema = get_field('single_schema');

	if ( !empty($global_schema) ) :
		echo '<script type="application/ld+json">' . strip_tags($global_schema) . '</script>';
	endif;


	if ( !empty($single_schema) ) :
		echo '<script type="application/ld+json">' . strip_tags($single_schema) . '</script>';
	endif;
	?>

	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<?php
	$responsiveness = "yes";
	if (isset($qode_options_passage['responsiveness'])) $responsiveness = $qode_options_passage['responsiveness'];
	if($responsiveness != "no"):
	?>
	<meta name=viewport content="width=device-width,initial-scale=1">
	<?php 
	endif;
	?>
	<title><?php if($seo_title) { ?><?php bloginfo('name'); ?> | <?php echo $seo_title; ?><?php } else {?><?php bloginfo('name'); ?> | <?php is_front_page() ? bloginfo('description') : wp_title(''); ?><?php } ?></title>
	<?php if ($disable_qode_seo != "yes") { ?>
	<?php if($seo_description) { ?>
	<meta name="description" content="<?php echo $seo_description; ?>">
	<?php } else if($qode_options_passage['meta_description']){ ?>
	<meta name="description" content="<?php echo $qode_options_passage['meta_description'] ?>">
	<?php } ?>
	<?php if($seo_keywords) { ?>
	<meta name="keywords" content="<?php echo $seo_keywords; ?>">
	<?php } else if($qode_options_passage['meta_keywords']){ ?>
	<meta name="keywords" content="<?php echo $qode_options_passage['meta_keywords'] ?>">
	<?php } ?>
	<?php } ?>
	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	<link rel="shortcut icon" type="image/x-icon" href="<?php echo $qode_options_passage['favicon_image']; ?>">
	<?php wp_head(); ?>
	
</head>

<body <?php body_class(); ?>>

	<!-- Google Tag Manager (noscript) -->
	<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-TGPXT8L"
	height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
	<!-- End Google Tag Manager (noscript) -->

<div class="wrapper">
	<header>
		<div class="head-top">
			<div class="big-container"><div class="container_inner">				
				<p class="head-contact">Free Consultation: <a href="tel:213-863-4276" title="Call Custis Law PC Today">(213) 863-4276</a></p>
				<ul class="social-links">
					<li>
						<a href="https://www.facebook.com/custislawpc" target="_blank" class="head-social head-social-facebook"><i class="wp-svg-custom-header-facebook-icon header-facebook-icon"></i></a>
					</li>
					<li>
						<a href="https://www.linkedin.com/in/keithcustis/" target="_blank" class="head-social head-social-linkedin"><i class="wp-svg-custom-header-linkedin-icon header-linkedin-icon"></i></a>
					</li>
					<li>
						<a href="https://twitter.com/custislawpc" target="_blank" class="head-social head-social-twitter"><i class="wp-svg-custom-header-twitter-icon header-twitter-icon"></i></a>
					</li>
				</ul>
			</div></div>
		</div>

		<div class="head-bottom">
			<div class="big-container">
				<div class="head-bottom-container"><div class="container_inner">
					<div class="logo">
						<a href="<?php echo home_url(); ?>/"><img src="<?php echo $qode_options_passage['logo_image']; ?>" alt="Logo"/></a>
					</div>
					<div class="head-menu">
						<div class="head-search"><?php get_search_form(); ?></div>
						<?php
					        // The parent theme menu has way too many complications, lets use a simple wp_menu, primary-nav, set in the functions.php file
					        $args = array(
					          'container' => false,
					          'theme_location' => 'primary-nav'
					        );
					        wp_nav_menu( $args );
					    ?>
					</div>
					<div id="head-mobile" class="mobile">
						<a href="#" id="menu-icon"><hr><hr><hr></a>
					</div>
				</div>
			</div></div>
		</div>
	</header>
			<div id="mobile-nav" class="mobile">
			<?php
		        // The parent theme menu has way too many complications, lets use a simple wp_menu, mobile-nav, set in the functions.php file
		        $args = array(
		          'container' => false,
		          'theme_location' => 'mobile-nav'
		        );
		        wp_nav_menu( $args );
		    ?>
		</div>
		<div class="content">
				<div class="content_inner">
				
			