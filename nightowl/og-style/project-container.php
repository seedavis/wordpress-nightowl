<?php
/**
 * We load projects dynamically but for direct entrance it's advisable to print the content with PHP.
 * This improves search engine and sharing services compatibility.
 */
$title = $description = $slides = $sharing_url = $sharing_text = $date = $client = $agency = $ourrole = '';
if(is_singular('portfolio')){
	// TITLE
	$title = get_the_title();
	
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
		<div class="project-meta clearfix">
			<div class="project-meta-col-1">
				<div class="project-meta-data project-date clearfix" <?php if(!$date){ echo 'style="display: none;"'; } ?>>
					<div class="project-meta-heading"><?php _e('Date', 'flowthemes'); ?></div>
					<div class="project-meta-description project-exdate"><?php echo $date; ?></div>
				</div>
				<div class="project-meta-data project-client clearfix" <?php if(!$client){ echo 'style="display: none;"'; } ?>>
					<div class="project-meta-heading"><?php _e('Client', 'flowthemes'); ?></div>
					<div class="project-meta-description project-exclient"><?php echo $client; ?></div>
				</div>
				<div class="project-meta-data project-agency clearfix" <?php if(!$agency){ echo 'style="display: none;"'; } ?>>
					<div class="project-meta-heading"><?php _e('Agency', 'flowthemes'); ?></div>
					<div class="project-meta-description project-exagency"><?php echo $agency; ?></div>
				</div>
			</div>
			<div class="project-meta-col-2">
				<div class="project-meta-data project-ourrole clearfix" <?php if(!$ourrole){ echo 'style="display: none;"'; } ?>>
					<div class="project-meta-heading"><?php _e('Our Role', 'flowthemes'); ?></div>
					<div class="project-meta-description project-exourrole"><?php echo $ourrole; ?></div>
				</div>
			</div>
		</div>
		<div class="sharing-icons">
			<a href="https://twitter.com/share?url=<?php echo esc_url( get_home_url() ); ?>&amp;text=<?php echo urlencode( get_bloginfo('name') ); ?>" target="_blank" class="sharing-icons-twitter">
				<span class="sharing-icons-icon">t</span>
			</a>
			<a href="http://www.facebook.com/sharer.php?u=<?php echo esc_url( get_home_url() ); ?>&amp;t=<?php echo urlencode( get_bloginfo('name') ); ?>" target="_blank" class="sharing-icons-facebook">
				<span class="sharing-icons-icon">f</span>
			</a>
			<a href="https://plus.google.com/share?url=<?php echo esc_url( get_home_url() ); ?>" target="_blank" class="sharing-icons-googleplus">
				<span class="sharing-icons-icon">g</span>
			</a>
		</div>
		<h2 class="project-title"><?php echo $title; ?></h2>
		<div class="project-description"><?php echo $description; ?></div>
		<div class="project-slides clearfix"><?php echo $slides; ?></div>
	</div>
</div>

<div class="project-coverslide <?php if(is_singular('portfolio')){ echo 'project-coverslide-visible'; } ?>"></div>