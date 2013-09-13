<?php
/* Template Name: Classic Homepage */ 

get_header();

// Data of this page
$id = $wp_query->queried_object->ID;
$content = $wp_query->queried_object->post_content;

// Welcome Text
$welcome_text = get_post_meta($id, 'page_portfolio_welcome_text', true);
if($welcome_text){ ?>
	<div class="welcome-text"><?php echo stripslashes($welcome_text); ?></div>
<?php }

// Slideshow
$flow_slideshow = get_option('flow_featured_slideshow');
if(!$flow_slideshow){ 
	get_template_part('slideshow'); 
}

// Optional page title and description
/* if(false && (get_the_title() || get_post_meta($id, 'flow_post_description', true))){ ?>
	<header class="page-header">
		<?php if(false && get_the_title()){ ?>
			<h1 class="page-title"><?php the_title(); ?></h1>
		<?php } ?>
		<?php if($page_description = get_post_meta($id, 'flow_post_description', true)){ ?>
			<div class="page-description"><?php echo $page_description; ?></div>
		<?php } ?>
	</header>
<?php } */

// Optional static page content
if(have_posts()){
	while(have_posts()){ the_post(); ?>
		<div class="site-content clearfix"><?php the_content(); ?></div>
<?php }
}

get_template_part('recent', 'posts');

get_footer();
?>