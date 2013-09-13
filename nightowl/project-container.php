<?php
/**
 * We load projects dynamically but for direct entrance it's advisable to print the content with PHP.
 * This improves search engine and sharing services compatibility.
 */
$title = $description = $slides = $sharing_url = $sharing_text = $date = $client = $agency = $ourrole = '';
if(is_singular('portfolio')){
	// TITLE
	$title = get_the_title();
	
	// Thumbnail and its mouse over color
	$thumbnail_image = get_post_meta($post->ID, '300-160-image', true);
	
	// DESCRIPTION
	$description = apply_filters('the_content', get_post_meta($post->ID, 'flow_post_description', true));
	
	// SLIDES
	$slides = apply_filters('the_content', get_post_field('post_content', $post->ID));
	
	$date = get_post_meta($post->ID, 'portfolio_date', true);
	$client = get_post_meta($post->ID, 'portfolio_client', true);
	$agency = get_post_meta($post->ID, 'portfolio_agency', true);
	$ourrole = get_post_meta($post->ID, 'portfolio_ourrole', true);
}
?>
<div class="portfolio_box <?php if(is_singular('portfolio')){ echo 'portfolio_box-visible'; } ?>">

	<div class="content-projectc">
		<h2 class="project-title"><?php echo $title; ?></h2>
		<div class="project-description"><?php echo $description; ?></div>
		<div class="project-slides clearfix"><img class="project-img" src="<?php echo esc_url( $thumbnail_image ); ?>" alt="<?php echo esc_attr( $thumb_title ); ?>" /></div>
        <a class="buy-button rounded" href="#">Buy Now</a>
	</div>
</div>

<div class="project-coverslide <?php if(is_singular('portfolio')){ echo 'project-coverslide-visible'; } ?>"></div>