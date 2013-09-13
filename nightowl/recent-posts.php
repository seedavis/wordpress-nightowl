<?php
if ( is_page_template( 'template-classic.php' ) ) {

	// Recent Projects
	$portfolio_recent = get_post_meta($post->ID, 'classic_recent_portfolio', true); // Values: empty string|enable|disable
	
	if ( $portfolio_recent != 'disable' ) {
		$portfolio_page = get_option('flow_portfolio_page');
		$portfolio_page_link = get_permalink($portfolio_page); ?>
		<div class="recent-heading-container clearfix">
			<div class="recent-heading">
				<h2><?php _e('Recent Projects', 'flowthemes'); ?></h2>
				<span class="spacer"></span>
				<a href="<?php echo $portfolio_page_link; ?>"><?php _e('View Portfolio', 'flowthemes'); ?></a>
			</div>
			<div id="content-small" class="clearfix">
			
				<?php
				// Projects Loop
				$args = array(
					'post_type' => array( 'portfolio' ),
					'posts_per_page' => 5,
					'ignore_sticky_posts' => 1 // 0 to show stickies
				);
				
				$recent_projects = new WP_Query($args);
				
				if($recent_projects->have_posts()){
					while($recent_projects->have_posts()){ $recent_projects->the_post();
					
						$attachments = get_post_meta($post->ID, '300-160-image', true);
						$thumbnail_hover_color = get_post_meta($post->ID, 'thumbnail_hover_color', true);
						$thumb_title = get_the_title();
						$thumb_client = get_post_meta($post->ID, 'portfolio_client', true);
						
						$project_categories = array();
						$project_categories = wp_get_object_terms($post->ID, "portfolio_category");
						$project_categories_names_array = array();
						foreach($project_categories as $project_category_index => $project_category_object){
							$project_categories_names_array[] = $project_category_object->name;
						}
						$project_categories_names = implode(", ", $project_categories_names_array);
						
						$tmpdddisplay = get_post_meta($post->ID, 'thumbnail_meta', true);
						if($tmpdddisplay == 1){
							$tmpdddisplay = 'tn-display-meta';
						}else{
							$tmpdddisplay = '';
						}
						
						$tmpddlink = get_post_meta($post->ID, 'thumbnail_link', true);
						if($tmpddlink == ''){
							$tmpddlink = get_permalink();
						}
						$tmpddLinkNewWindow = get_post_meta($post->ID, 'thumbnail_link_newwindow', true);
						if($tmpddLinkNewWindow == 1){
							$tmpddLinkNewWindow = 'target="_blank"';
						}else{
							$tmpddLinkNewWindow = '';
						}
						?>
						
						<div class="element element-stand-alone <?php echo $tmpdddisplay; ?>">
							<?php if($tmpddlink){ ?>
								<a class="thumbnail-link" href="<?php echo $tmpddlink; ?>" <?php echo $tmpddLinkNewWindow; ?>></a>
							<?php } ?>
							<div class="thumbnail-meta-data-wrapper">
								<div class="symbol" style="z-index:3;"><?php echo $thumb_title; ?></div>
							</div>
							<div class="name" style="z-index:3;"><?php echo strip_tags( $thumb_client ); ?></div>
							<div class="categories" style="z-index:3;"><?php echo $project_categories_names; ?></div>
							<div style="background-color: <?php echo $thumbnail_hover_color; ?>; width: 100%; height: 100%; z-index: 2;" class="thumbnail-hover"></div>
							<?php if($attachments){ ?>
								<img class="project-img" style="z-index: 1;" src="<?php echo esc_attr( $attachments ); ?>" alt="<?php echo esc_attr( $thumb_title ); ?>">
							<?php } ?>
							<div style="background-color: <?php echo $thumbnail_hover_color; ?>; width: 100%; height: 100%; z-index: 0;"></div>
						</div>
						
						<?php
					}
				}
				wp_reset_postdata();
				?>
			</div>
		</div>
	<?php
	}
	
	// Recent Blog Posts
	$blog_recent = get_post_meta($post->ID, 'classic_recent_posts', true); // Values: empty string/enable/disable
	if ( $blog_recent != 'disable' ) {
		$blog_page = get_option('page_for_posts');
		$blog_page_link = get_permalink( $blog_page );
		$hide_button = '';
		if(!$blog_page){
			$hide_button = 'style="display: none;"';
		}
		$post_per_page = 4;
		$do_not_show_stickies = 1; // 0 to show stickies
		$args = array(
			'orderby' => 'date',
			'order' => 'DESC',
			'post_type' => array('post'),
			'posts_per_page' => $post_per_page,
			'ignore_sticky_posts' => $do_not_show_stickies
		);
		$recent_posts_query = new WP_Query($args); 
		if($recent_posts_query->have_posts()){ ?>
			<div class="recent-blog-container clearfix">
				<div class="recent-heading">
					<h2><?php _e('New Blog Posts', 'flowthemes'); ?></h2>
					<span class="spacer"></span>
					<a href="<?php echo $blog_page_link; ?>" <?php echo $hide_button; ?>><?php _e('View Blog', 'flowthemes'); ?></a>
				</div>
				<div style="margin-top: 15px; background-color:#eeeeee;" class="clearfix">
					<div class="related-posts clearfix">
					<?php while ($recent_posts_query->have_posts()){
							$recent_posts_query->the_post(); ?>
							<div class="related-posts-title">
								<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
								<small><?php echo esc_html( get_the_date() ); ?></small>
							</div>
					<?php }
			echo '</div></div></div>';
		}
		wp_reset_postdata();
	}
} else { ?>
	<div class="recent-posts-single-container clearfix">
		<?php
			$post_per_page = 4;
			$do_not_show_stickies = 1; // 0 to show stickies
			$args = array(
				'orderby' => 'date',
				'order' => 'DESC',
				'post__not_in' => array( get_the_ID() ), // excludes this post
				'post_type' => array('post'),
				'posts_per_page' => $post_per_page,
				'ignore_sticky_posts' => $do_not_show_stickies
			);
			$other_posts_query = new WP_Query($args); 
			if($other_posts_query->have_posts()){
				echo '<div class="related-posts clearfix">';
				while ($other_posts_query->have_posts()){
					$other_posts_query->the_post();
			?>
					<div class="related-posts-title">
						<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a>
						<small><?php echo esc_html( get_the_date() ); ?></small>
					</div>
			<?php 
				}
				echo '</div>';
			}
			wp_reset_postdata(); // restore original $post after looping through above posts
		?>
	</div>
<?php } ?>