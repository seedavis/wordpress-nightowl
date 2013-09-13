<?php
$portfolio_page = get_option('flow_portfolio_page'); // empty on none

if(is_page_template('template-portfolio.php')){
	$exclude_include = get_post_meta($wp_query->queried_object_id, 'page_portfolio_tax_query_operator', true); // Operator for exclude box, false = exlude, true = include
	$flow_portfolio_home_exclude = get_post_meta($wp_query->queried_object_id, 'page_portfolio_exclude', true); // Array of portfolio categories slugs
	$orderby = get_post_meta($wp_query->queried_object_id, 'page_portfolio_orderby', true);
	$order = get_post_meta($wp_query->queried_object_id, 'page_portfolio_order', true);
	$shuffle_button = get_post_meta($wp_query->queried_object_id, 'page_portfolio_shuffle', true);
	$loop_through = get_post_meta($wp_query->get_queried_object_id(), 'page_portfolio_loop_through', true);
	$boundary_arrows = get_post_meta($wp_query->get_queried_object_id(), 'page_portfolio_boundary_arrows', true);
}else if(is_singular('portfolio') && ($parent_page = get_post_meta($post->ID, 'portfolio_back_button', true)) && !empty($parent_page) && ($parent_page != 'none')){ // we assume that parent page is portfolio
	$exclude_include = get_post_meta($parent_page, 'page_portfolio_tax_query_operator', true);
	$flow_portfolio_home_exclude = get_post_meta($parent_page, 'page_portfolio_exclude', true);
	$orderby = get_post_meta($parent_page, 'page_portfolio_orderby', true);
	$order = get_post_meta($parent_page, 'page_portfolio_order', true);
	$shuffle_button = get_post_meta($parent_page, 'page_portfolio_shuffle', true);
	$loop_through = get_post_meta($parent_page, 'page_portfolio_loop_through', true);
	$boundary_arrows = get_post_meta($parent_page, 'page_portfolio_boundary_arrows', true);
}else if(is_singular() && !empty($portfolio_page)){ // load main portfolio page if no parent page is set for this item
	$exclude_include = get_post_meta($portfolio_page, 'page_portfolio_tax_query_operator', true);
	$flow_portfolio_home_exclude = get_post_meta($portfolio_page, 'page_portfolio_exclude', true);
	$orderby = get_post_meta($portfolio_page, 'page_portfolio_orderby', true);
	$order = get_post_meta($portfolio_page, 'page_portfolio_order', true);
	$shuffle_button = get_post_meta($portfolio_page, 'page_portfolio_shuffle', true);
	$loop_through = get_post_meta($portfolio_page, 'page_portfolio_loop_through', true);
	$boundary_arrows = get_post_meta($portfolio_page, 'page_portfolio_boundary_arrows', true);
}else{
	$exclude_include = false;
	$flow_portfolio_home_exclude = array();
	$orderby = 'date';
	$order = 'DESC';
	$shuffle_button = false;
	$loop_through = false;
	$boundary_arrows = false;
}

if(empty($orderby)){
	$orderby = 'date';
}
if(empty($order)){
	$order = 'DESC';
}
if(empty($exclude_include)){
	$exclude_include = false; //exclude - default, include = true
}
if(empty($loop_through)){
	$loop_through = false; // false = Loop, true = Do not loop
}
if(empty($boundary_arrows)){
	$boundary_arrows = false;
}
?>
<div class="tn-grid-container clearfix">
	
	
	<div id="container" class="variable-sizes clearfix">
		<?php
		// Set variables
		$i = -1;
		$projectsArray = array();
		
		// Projects Loop
		$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
		$post_per_page = -1;
		$do_not_show_stickies = 1; // 0 to show stickies
		
		$args = array(
			'post_type' => array('portfolio'),
			'orderby' => $orderby,
			'order' => $order,
			'paged' => $paged,
			'posts_per_page' => $post_per_page,
			'ignore_sticky_posts' => $do_not_show_stickies
		);
		
		// Exclude or Include categories
		if($exclude_include){ // include
			$exclude_include_sign = 'IN';
		}else{ // exclude - default
			$exclude_include_sign = 'NOT IN';
		}
		if(isset($flow_portfolio_home_exclude) && is_array($flow_portfolio_home_exclude)){
			$args['tax_query'] = array(
				array(
					'taxonomy' => 'portfolio_category',
					'field' => 'slug',
					'terms' => $flow_portfolio_home_exclude,
					'operator' => $exclude_include_sign
				)
			);
		}

		$portfolio_query = new WP_Query($args);
		if($portfolio_query->have_posts()){
			while($portfolio_query->have_posts()){ $portfolio_query->the_post();
				
				// Thumbnail and its mouse over color
				$thumbnail_image = get_post_meta($post->ID, '300-160-image', true);
				
				/*
				 * Get project categories
				 *
				 * 1. Get project categories display names (for thumbnails)
				 * 2. Get project categories slugs (for PHP/JS/CSS use)
				 */
				$project_categories = array();
				$project_categories = wp_get_object_terms($post->ID, "portfolio_category");

				$project_categories_ids_array = array();
				$project_categories_names_array = array();
				foreach($project_categories as $project_category_index => $project_category_object){
					$project_categories_ids_array[] = $project_category_object->term_id;
					$project_categories_names_array[] = $project_category_object->name;
				}
				$project_categories_ids = array();
				foreach($project_categories_ids_array as $k => $v){
					$project_categories_ids[$k] = 'portfolio-category-' . $v;
				}
				$project_categories_ids = implode(" ", $project_categories_ids);
				$project_categories_names = implode(", ", $project_categories_names_array);
					
				// Project title
				$thumb_title = get_the_title();
				
				// Project description
				$thumb_descr = '';
				if ( ! post_password_required() && ( $thumb_descr = get_post_meta( $post->ID, 'flow_post_description', true ) ) ) {
					$thumb_descr = apply_filters( 'the_content', $thumb_descr );
				}
				
				// Project slides
				$project_content = apply_filters( 'the_content', get_the_content() );
				
				// Project meta data
				$tmpdddisplay = get_post_meta($post->ID, 'thumbnail_meta', true);
				if($tmpdddisplay == 1){
					$tmpdddisplay = 'tn-display-meta';
				}else{
					$tmpdddisplay = '';
				}
				$thumb_ourrole = get_post_meta($post->ID, 'portfolio_ourrole', true);
				$thumb_date = get_post_meta($post->ID, 'portfolio_date', true);
				$thumb_client = get_post_meta($post->ID, 'portfolio_client', true);
				$thumb_agency = get_post_meta($post->ID, 'portfolio_agency', true);
				
				// Thumbnail link
				$thumb_link = get_post_meta($post->ID, 'thumbnail_link', true);
				$thumb_link_target_blank = get_post_meta($post->ID, 'thumbnail_link_newwindow', true);
				if($thumb_link_target_blank == 1){
					$thumb_link_target_blank = 'target="_blank"';
				}else{
					$thumb_link_target_blank = '';
				}
				if ( ! $thumb_link ) {
					$i++;
				}
				
				// Thumbnail size
				// 0 = random, 1 = large, 2 = medium, 3 = vertical, 4 = horizontal, 5 = small
				$thumb_size = get_post_meta( $post->ID, 'thumbnail_size', true );
				if ( $thumb_size == 0 || empty( $thumb_size ) ) {
					$thumb_size = rand( 0, 99 );
					if ( $thumb_size < 3 ) {
						$thumb_size = 1;
					} else if ( $thumb_size < 9) {
						$thumb_size = 2;
					} else if ( $thumb_size < 16) {
						$thumb_size = 3;
					} else if ( $thumb_size < 24) {
						$thumb_size = 4;
					} else {
						$thumb_size = 5;
					}
				}
				?>
				
				<div id="post-<?php the_ID(); ?>" <?php post_class( array( 'element', $project_categories_ids, $tmpdddisplay ) ); ?> data-number="<?php echo esc_attr( $thumb_size ); ?>" data-id="<?php if ( ! $thumb_link ) { echo esc_attr( $i ); } ?>">
					<?php 
					if ( $thumb_link ) {
						echo '<a class="thumbnail-link" href="' . esc_url( $thumb_link ) . '" ' . $thumb_link_target_blank . '></a>'; 
					} else {
						echo '<a class="thumbnail-project-link" href="' . get_permalink() . '">' . $thumb_title . '</a>';
					} 
					?>
					
					<?php if ( esc_url( $thumbnail_image ) ) { ?>
							<img class="project-img" src="<?php echo esc_url( $thumbnail_image ); ?>" alt="<?php echo esc_attr( $thumb_title ); ?>" />
					<?php } ?>
				</div>
					
				<?php
				if ( ! $thumb_link ) {
					$projectsArray[ $i ] = array( $thumb_title, $thumb_descr, $thumb_date, $thumb_client, $thumb_agency, $thumb_ourrole, $project_content, get_permalink( $post->ID ), $thumb_link, $project_categories_ids_array, $post->ID );
				} // Exclude external link thumbnails
			}
		}
		wp_reset_postdata(); ?>
	</div>
</div>

<script>
<?php echo 'var projectsArray = ' . json_encode( $projectsArray ) . ';'; ?>
var portfolio_page_title = jQuery('title').text();
var portfolio_page_url = location.href;
var boundary_arrows = <?php echo json_encode( $boundary_arrows ); ?>;
var loop_through = <?php echo json_encode( $loop_through ); ?>;
var global_current_id = false;
var project_url = '';
<?php if ( is_singular( 'portfolio' ) ) { ?>
	var project_url = <?php echo json_encode( esc_url( get_permalink( $post->ID ) ) ); ?>;
	<?php foreach ( $projectsArray as $k => $v ) { ?>
		<?php if ( $v[10] == $post->ID ) { ?>
			var global_current_id = <?php echo json_encode( $k ); ?>;
		<?php } ?>
	<?php } ?>
<?php } ?>
</script>