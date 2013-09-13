<?php
	/* Template Name: Portfolio Thumbnail Grid */ 
	
	get_header();
	
	// Data of this page
	$id = $wp_query->queried_object->ID;
	$main_portfolio_page = get_option('flow_portfolio_page');
	
	if($welcome_text){ ?>
	<?php }

	get_template_part( 'project', 'container' );
	get_template_part( 'project', 'loop' );
	
	get_footer();
?>