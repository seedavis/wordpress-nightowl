<?php 
/**
Made with the help of a tutorial at WPShout.com => http://wpshout.com.

Courtesy of the flowthemes theme - themeflowthemes.com

 * Adds the flowthemes Settings meta box on the Write Post/Page screeens
 *
 * @package flowthemes
 * @subpackage Admin
 */

/**
 * Function for adding meta boxes to the admin.
 * Separate the post and page meta boxes.
 *
 * @since 0.3
 */
function flowthemes_create_meta_box() {
	global $theme_name;

	add_meta_box( 'post-meta-boxes', __('Post Options', 'flowthemes'), 'post_meta_boxes', 'post', 'normal', 'high' );
	add_meta_box( 'page-meta-boxes', __('Page Options', 'flowthemes'), 'page_meta_boxes', 'page', 'normal', 'high' );
	add_meta_box( 'portfolio-meta-boxes', __('Project Settings', 'flowthemes'), 'portfolio_meta_boxes', 'portfolio', 'normal', 'high' );
	add_meta_box( 'slideshow-meta-boxes', __('Slide Options', 'flowthemes'), 'slideshow_meta_boxes', 'slideshow', 'normal', 'high' );
}

/**
 * Array of variables for post meta boxes.  Make the 
 * function filterable to add options through child themes.
 *
 * @since 0.3
 * @return array $meta_boxes
 */
function flowthemes_post_meta_boxes() {

	/* Array of the meta box options. */
	$meta_boxes = array(
		'flow_post_description' => array( 'name' => 'flow_post_description', 'title' => __('Description', 'flowthemes'), 'desc' => __('You can add description to your post using this custom field. It will be displayed below the title. It\'s optional.', 'flowthemes'), 'type' => 'textarea' ),
		'flow_post_layout' => array( 'name' => 'flow_post_layout', 'title' => __( 'Layout:', 'flowthemes' ), 'options' => array( 'no-sidebar' => __('No Sidebar', 'flowthemes'), 'sidebar-left' => __('Left Sidebar', 'flowthemes'), 'sidebar-right' => __('Right Sidebar', 'flowthemes') ), 'desc' => __( 'Pick post layout here.', 'flowthemes' ), 'type' => 'select' )
	);

	return apply_filters( 'flowthemes_post_meta_boxes', $meta_boxes );
}
function flowthemes_slideshow_meta_boxes() {

	/* Array of the meta box options. */
	$meta_boxes = array(
		'flow_post_description' => array( 'name' => 'flow_post_description', 'title' => __('Description', 'flowthemes'), 'desc' => __('Slide description.', 'flowthemes'), 'type' => 'textarea' ),
		'slide-image' => array( 'name' => 'slide-image', 'title' => __('Slide image:', 'flowthemes'), 'desc' => __('Put slide image here. Recommended size is around 700x300px and no more than 100-200kb.', 'flowthemes'), 'type' => 'upload' ),
		'slide-link' => array( 'name' => 'slide-link', 'title' => __('Button link', 'flowthemes'), 'desc' => 'Your slide button can link to post, page, portfolio project or external location.', 'type' => 'text' ),		
		'slide-link-name' => array( 'name' => 'slide-link-name', 'title' => __('Button link name', 'flowthemes'), 'desc' => 'Leave blank to disable button on this slide.', 'type' => 'text' ),
		
		/* Button */
		'slide-button-x-offset' => array( 'name' => 'slide-button-x-offset', 'title' => __('Buttons X axis offset', 'flowthemes'), 'desc' => 'Specify X offset of your button (starting from the right). Examples: <strong>10px</strong> will move it 10px to the left.', 'type' => 'text' ),		
		'slide-button-y-offset' => array( 'name' => 'slide-button-y-offset', 'title' => __('Buttons Y axis offset', 'flowthemes'), 'desc' => __('Specify Y offset of your button (starting from the top). Examples: <strong>10px</strong> will move it 10px to the bottom.', 'flowthemes'), 'type' => 'text' ),
		'slide-button-icon' => array( 'name' => 'slide-button-icon', 'title' => __('Buttons icon (optional)', 'flowthemes'), 'desc' => __('Button icon. You can put here UTF-8 icons - search engines will give you lists and codes of available icons.', 'flowthemes'), 'type' => 'text' ),
		
		/* Colors */
		'slide-color' => array( 'name' => 'slide-color', 'title' => __('Slide background color', 'flowthemes'), 'desc' => 'Since button is transparent with white glow it will also affect button\'s color.', 'type' => 'colorpicker' ),
		'slide-title-text-color' => array( 'name' => 'slide-title-text-color', 'title' => __('Title text color', 'flowthemes'), 'desc' => '', 'type' => 'colorpicker' ),
		'slide-description-text-color' => array( 'name' => 'slide-description-text-color', 'title' => __('Description text color', 'flowthemes'), 'desc' => '', 'type' => 'colorpicker' ),
		'slide-button-text-color' => array( 'name' => 'slide-button-text-color', 'title' => __('Button text color', 'flowthemes'), 'desc' => __('Default is #f1f1f1.', 'flowthemes'), 'type' => 'colorpicker' ),
		
		/* Image Offset */
		'slide-image-x-offset' => array( 'name' => 'slide-image-x-offset', 'title' => __('Image\'s X axis offset', 'flowthemes'), 'desc' => __('Specify left X offset of your slide image (starting from the middle of slide). Examples: <strong>10px</strong> will move it 10px to the right. <strong>-10px</strong> will move it 10px to the left. Technical limitation for this is ((1120px-(width_of_your_image))/2) so like 200-300px.', 'flowthemes'), 'type' => 'text' ),		
		'slide-image-y-offset' => array( 'name' => 'slide-image-y-offset', 'title' => __('Image\'s Y axis offset', 'flowthemes'), 'desc' => __('Specify top Y offset of your slide image. Examples: <strong>10px</strong> will move it 10px downwards. <strong>-10px</strong> will move it 10px to the top.', 'flowthemes'), 'type' => 'text' )
		
		/* Custom Code */
		//'slide-custom-code' => array( 'name' => 'slide-custom-code', 'title' => __('Custom Code', 'flowthemes'), 'desc' => __('Any custom HTML.', 'flowthemes'), 'type' => 'textarea' )
		
		/* Videos */
		/* 'slide-video' => array( 'name' => 'slide-video', 'title' => __('Slide video:', 'flowthemes'), 'desc' => 'Put <strong>a link or video ID</strong> to YouTube or Vimeo video here.', 'type' => 'text' ),
		'slide-video-mp4' => array( 'name' => 'slide-video-mp4', 'title' => __('Slide video (MP4):', 'flowthemes'), 'desc' => 'Put <strong>a link</strong> to MP4 format of your video.', 'type' => 'upload' ),
		'slide-video-ogg' => array( 'name' => 'slide-video-ogg', 'title' => __('Slide video (OGG):', 'flowthemes'), 'desc' => 'Put <strong>a link</strong> to OGV format of your video.', 'type' => 'upload' ),
		'slide-video-webm' => array( 'name' => 'slide-video-webm', 'title' => __('Slide video (WEBM):', 'flowthemes'), 'desc' => 'Put <strong>a link</strong> to WEBM format of your video. Not every WordPress installation supports WEBM videos in Media Library. Please upload it elsewhere.', 'type' => 'text' ),
		'slide-video-poster' => array( 'name' => 'slide-video-poster', 'title' => __('Slide video (Poster):', 'flowthemes'), 'desc' => 'Put <strong>a link</strong> to image poster of your video.', 'type' => 'upload' ), */
	);

	return apply_filters( 'flowthemes_slideshow_meta_boxes', $meta_boxes );
}
function flowthemes_portfolio_meta_boxes() {

	$list_of_pages_raw = get_pages();
	$list_of_pages['none'] = __('(main portfolio page)', 'flowthemes');
	foreach($list_of_pages_raw as $single_page){
		$list_of_pages[$single_page->ID] = $single_page->post_title; /* Must be [ID] => [display name] */
	}
	/* Array of the meta box options. */
	$meta_boxes = array(
		//'slides' => array( 'name' => 'slides', 'title' => __('Thumbnail image:', 'flowthemes'), 'desc' => __('Manage your slides here.', 'flowthemes'), 'type' => 'slidemanager' ),
		'300-160-image' => array( 'name' => '300-160-image', 'title' => __('Thumbnail', 'flowthemes'), 'desc' => __('Thumbnail link and mouse over color. See available sizes below. You can upload larger images for high pixel density displays.', 'flowthemes'), 'type' => 'imagesmapler' ),
		'thumbnail_hover_color' => array( 'name' => 'thumbnail_hover_color', 'title' => __('Thumbnail mouse over color:', 'flowthemes'), 'desc' => __('Pick some color that will be used as mouse over color for this project\'s thumbnail on front page.', 'flowthemes'), 'type' => 'imagesamplerhidden' ),
		'thumbnail_size' => array( 'name' => 'thumbnail_size', 'title' => __('Thumbnail size', 'flowthemes'), 'options' => array('0' => __('Random', 'flowthemes'), '1' => __('Large (670x305px)', 'flowthemes'), '2' => __('Medium (445x305px)', 'flowthemes'), '3' => __('Vertical (220x305px)', 'flowthemes'), '4' => __('Horizontal (445x150px)', 'flowthemes'), '5' => __('Small (220x150px)', 'flowthemes')), 'desc' => __('To avoid having empty gaps please use many small thumbnails.', 'flowthemes'), 'type' => 'select' ),
		'thumbnail_meta' => array( 'name' => 'thumbnail_meta', 'title' => __('Thumbnail meta data', 'flowthemes'), 'options' => array('0' => __('Don\'t display', 'flowthemes'), '1' => __('Display', 'flowthemes')), 'desc' => __('You can display thumbnail\'s meta data all the time. This is useful for solid color thumbnails.', 'flowthemes'), 'type' => 'select' ),
		'flow_post_description' => array( 'name' => 'flow_post_description', 'title' => __('Project description', 'flowthemes'), 'desc' => '', 'type' => 'textarea' ),
		'portfolio_date' => array( 'name' => 'portfolio_date', 'title' => __('Project date', 'flowthemes'), 'desc' => __('It will be displayed in the project description. Suggested format: dd.mm.yyyy (like 22.07.2013).', 'flowthemes'), 'type' => 'text' ),
		'portfolio_client' => array( 'name' => 'portfolio_client', 'title' => __('Project client', 'flowthemes'), 'desc' => __('It will be displayed in the project description.', 'flowthemes'), 'type' => 'text' ),
		'portfolio_agency' => array( 'name' => 'portfolio_agency', 'title' => __('Project agency', 'flowthemes'), 'desc' => __('It will be displayed in the project description.', 'flowthemes'), 'type' => 'text' ),
		'portfolio_ourrole' => array( 'name' => 'portfolio_ourrole', 'title' => __('Project role', 'flowthemes'), 'desc' => __('It will be displayed in the project description. Please use &lt;br&gt; HTML tag to add multiline roles.', 'flowthemes'), 'type' => 'text' ),
		'thumbnail_link' => array( 'name' => 'thumbnail_link', 'title' => __('Thumbnail External Link (optional)', 'flowthemes'), 'desc' => __('You can make the thumbnail link somewhere else (like a blog post or external website). Specifying a link here will exclude this project from being viewable.', 'flowthemes'), 'type' => 'text' ),
		'thumbnail_link_newwindow' => array( 'name' => 'thumbnail_link_newwindow', 'title' => __('Open link in a new window?', 'flowthemes'), 'desc' => __('This option works only if you have specified external link for this thumbnail.', 'flowthemes'), 'options' => array('0' => __('Same window', 'flowthemes'), '1' => __('New window', 'flowthemes')), 'type' => 'select' ),
		'portfolio_back_button' => array( 'name' => 'portfolio_back_button', 'title' => __('Parent portfolio', 'flowthemes'), 'desc' => __('Parent portfolio page for this project. Defaults to your main portfolio page.', 'flowthemes'), 'type' => 'select', 'options' => $list_of_pages )
	);

	return apply_filters( 'flowthemes_portfolio_meta_boxes', $meta_boxes );
}

/**
 * Array of variables for page meta boxes.  Make the 
 * function filterable to add options through child themes.
 *
 * @since 0.3
 * @return array $meta_boxes
 */
function flowthemes_page_meta_boxes() {

	/* Array of the meta box options. */
	$meta_boxes = array(

	);
	
	$page_portfolio_orderby = array('date' => 'date', 'none' => 'none', 'ID' => 'ID', 'author' => 'author', 'title' => 'title', 'modified' => 'modified', 'parent' => 'parent', 'rand' => 'rand', 'comment_count' => 'comment_count', 'menu_order' => 'menu_order');
	$page_portfolio_order = array('DESC' => 'DESC', 'ASC' => 'ASC');
	
	$page_portfolio_post_id = $_GET['post'] ? $_GET['post'] : $_POST['post_ID'];
	if($page_portfolio_post_id){
		$page_portfolio_templatefile = get_post_meta($page_portfolio_post_id, '_wp_page_template', true);
		if($page_portfolio_templatefile){
			if(in_array(strtolower($page_portfolio_templatefile), array('template-classic.php'))){
				$meta_boxes = array_merge($meta_boxes, array(
					'page_portfolio_welcome_text' => array( 'name' => 'page_portfolio_welcome_text', 'title' => __('Welcome Text', 'flowthemes'), 'desc' => __('Set welcome text for this portfolio page.', 'flowthemes'), 'type' => 'textarea'),
					'classic_slideshow' => array( 'name' => 'classic_slideshow', 'title' => __('Slideshow', 'flowthemes'), 'desc' => __('You can add slides under [Slideshow > Add New].', 'flowthemes'), 'options' => array('enable' => __('Enable', 'flowthemes'), 'disable' => __('Disable', 'flowthemes')), 'type' => 'select'),
					'classic_recent_portfolio' => array( 'name' => 'classic_recent_portfolio', 'title' => __('Recent Portfolio Entries ', 'flowthemes'), 'desc' => __('Lists recent portfolio entries from all portfolio pages.', 'flowthemes'), 'options' => array('enable' => __('Enable', 'flowthemes'), 'disable' => __('Disable', 'flowthemes')), 'type' => 'select'),
					'classic_recent_posts' => array( 'name' => 'classic_recent_posts', 'title' => __('Recent Posts ', 'flowthemes'), 'desc' => __('Lists recent posts from your blog.', 'flowthemes'), 'options' => array('enable' => __('Enable', 'flowthemes'), 'disable' => __('Disable', 'flowthemes')), 'type' => 'select'),
					
				));
			}else if(in_array(strtolower($page_portfolio_templatefile), array('template-portfolio.php')) || $page_portfolio_post_id == get_option('page_on_front')){
				$page_portfolio_options = array();
				$page_portfolio_categories = get_terms("portfolio_category", "hide_empty=0");
				for($h=0;$h<count($page_portfolio_categories);$h++){
					$page_portfolio_options[$page_portfolio_categories[$h]->slug] = $page_portfolio_categories[$h]->name;
				}
				$meta_boxes = array_merge($meta_boxes, array(
					'page_portfolio_tax_query_operator' => array( 'name' => 'page_portfolio_tax_query_operator', 'title' => __('Operator for categories box', 'flowthemes'), 'desc' => __('You can make below box INCLUDE only selected categories or EXCLUDE selected categories. When you\'re using INCLUDE you must select at least two categories. If you will not select any categories it\'s going to display everything.', 'flowthemes'), 'options' => array(false => __('Exclude', 'flowthemes'), true => __('Include', 'flowthemes')), 'type' => 'select'),
					'page_portfolio_exclude' => array( 'name' => 'page_portfolio_exclude', 'title' => __('Exclude portfolio categories', 'flowthemes'), 'desc' => __('Select categories that should be excluded from this portfolio page. You can select multiple categories if you hold Ctrl / CMD and click on them.', 'flowthemes'), 'type' => 'select', 'is_multiple' => true, 'options' => $page_portfolio_options),
					'page_portfolio_orderby' => array( 'name' => 'page_portfolio_orderby', 'title' => __('Thumbnails order by', 'flowthemes'), 'desc' => __('Default: date.', 'flowthemes'), 'type' => 'select', 'is_multiple' => false, 'options' => $page_portfolio_orderby),
					'page_portfolio_order' => array( 'name' => 'page_portfolio_order', 'title' => __('Thumbnails order', 'flowthemes'), 'desc' => __('Default: DESC.', 'flowthemes'), 'type' => 'select', 'is_multiple' => false, 'options' => $page_portfolio_order),
					'page_portfolio_shuffle' => array( 'name' => 'page_portfolio_shuffle', 'title' => __('Shuffle button', 'flowthemes'), 'options' => array(false => __('Disable', 'flowthemes'), true => __('Enable', 'flowthemes')), 'desc' => __('Enable or disable the shuffle button on this page.', 'flowthemes'), 'type' => 'select'),
					'page_portfolio_welcome_text' => array( 'name' => 'page_portfolio_welcome_text', 'title' => __('Welcome text', 'flowthemes'), 'desc' => __('Set welcome text for this portfolio page.', 'flowthemes'), 'type' => 'textarea'),
					'page_portfolio_loop_through' => array( 'name' => 'page_portfolio_loop_through', 'title' => __('Loop through selected category projects only?', 'flowthemes'), 'options' => array(false => __('No', 'flowthemes'), true => __('Yes', 'flowthemes')), 'desc' => __('By default entering project will make left/right arrows go to the next project regardless of what category is it in. Select this to yes if you want arrows to loop through projects from currently selected category only. This does not work for "Recent Projects" component because it does not have filter and thus it is always set to "all" categories (you can exlucde some of them on this page). Entering any project using that module will make left/right arrows go through entire portfolio.', 'flowthemes'), 'type' => 'select'),
					'page_portfolio_boundary_arrows' => array( 'name' => 'page_portfolio_boundary_arrows', 'title' => __('Boundary arrows disappear or loop from the start/end?', 'flowthemes'), 'options' => array(false => __('Loop', 'flowthemes'), true => __('Do not loop', 'flowthemes')), 'desc' => __('When user sees the first/last project in current projects set should the first/last arrow disappear or should it be looped?', 'flowthemes'), 'type' => 'select')
				));
			}else{
				$meta_boxes = array_merge($meta_boxes, array(
					'flow_post_description' => array( 'name' => 'flow_post_description', 'title' => __('Description', 'flowthemes'), 'desc' => __('You can add description to your page using this custom field. It will be displayed above page. It\'s optional.', 'flowthemes'), 'type' => 'textarea' ),
					'flow_post_layout' => array( 'name' => 'flow_post_layout', 'title' => __( 'Layout:', 'flowthemes' ), 'options' => array( 'no-sidebar' => __('No Sidebar', 'flowthemes'), 'sidebar-left' => __('Left Sidebar', 'flowthemes'), 'sidebar-right' => __('Right Sidebar', 'flowthemes'), 'no-boundaries' => __('No boundaries', 'flowthemes') ), 'desc' => __( 'Pick page layout here.', 'flowthemes' ), 'type' => 'select' )
				));
			}
		}
	}

	return apply_filters( 'flowthemes_page_meta_boxes', $meta_boxes );
}

/**
 * Displays meta boxes on the Write Post panel.  Loops 
 * through each meta box in the $meta_boxes variable.
 * Gets array from flowthemes_post_meta_boxes().
 *
 * @since 0.3
 */
function post_meta_boxes() {
	global $post;
	$meta_boxes = flowthemes_post_meta_boxes(); ?>

	<table class="form-table meta-boxes-table">
	<?php foreach ( $meta_boxes as $meta ) :
	
		// $value = get_post_meta( $post->ID, $meta['name'], true ); // original - no stripslashes()
		$value = get_post_meta( $post->ID, $meta['name'], true );
		if(is_array($value)){
			//foreach($value as $k => $v){
				//$value[$k] = stripslashes( $v );
			//}
		}else{
			$value = stripslashes( $value );
		}

		if ( $meta['type'] == 'text' )
			get_meta_text_input( $meta, $value );
		elseif ( $meta['type'] == 'upload' )
			get_meta_text_upload( $meta, $value );
		elseif ( $meta['type'] == 'textarea' )
			get_meta_textarea( $meta, $value );
		elseif ( $meta['type'] == 'select' )
			get_meta_select( $meta, $value );
		elseif ( $meta['type'] == 'imagesampler' )
			get_meta_imagesampler( $meta, $value );
		elseif ( $meta['type'] == 'imagesamplerhidden' )
			get_meta_imagesamplerhidden( $meta, $value );
		elseif ( $meta['type'] == 'slidemanager' )
			get_meta_slidemanager( $meta, $value );

	endforeach; ?>
	</table>
<?php 
}

/**
 * Displays meta boxes on the Write Page panel.  Loops 
 * through each meta box in the $meta_boxes variable.
 * Gets array from flowthemes_page_meta_boxes()
 *
 * @since 0.3
 */
function page_meta_boxes() {
	global $post;
	$meta_boxes = flowthemes_page_meta_boxes(); ?>

	<table class="form-table meta-boxes-table">
	<?php foreach ( $meta_boxes as $meta ) :
	
		// $value = stripslashes( get_post_meta( $post->ID, $meta['name'], true ) ); // original
		$value = get_post_meta( $post->ID, $meta['name'], true );
		if(is_array($value)){
			//foreach($value as $k => $v){
				//$value[$k] = stripslashes( $v );
			//}
		}else{
			$value = stripslashes( $value );
		}

		if ( $meta['type'] == 'text' )
			get_meta_text_input( $meta, $value );
		elseif ( $meta['type'] == 'upload' )
			get_meta_text_upload( $meta, $value );
		elseif ( $meta['type'] == 'textarea' )
			get_meta_textarea( $meta, $value );
		elseif ( $meta['type'] == 'select' )
			get_meta_select( $meta, $value );
		elseif ( $meta['type'] == 'colorpicker' )
			get_meta_colorpicker( $meta, $value );
		elseif ( $meta['type'] == 'imagesampler' )
			get_meta_imagesampler( $meta, $value );
		elseif ( $meta['type'] == 'imagesamplerhidden' )
			get_meta_imagesamplerhidden( $meta, $value );
		elseif ( $meta['type'] == 'slidemanager' )
			get_meta_slidemanager( $meta, $value );

	endforeach; ?>
	</table>
<?php 
}

/**
 * Displays meta boxes on the Write Page panel.  Loops 
 * through each meta box in the $meta_boxes variable.
 * Gets array from flowthemes_page_meta_boxes()
 *
 * @since 0.3
 */
function portfolio_meta_boxes() {
	global $post;
	$meta_boxes = flowthemes_portfolio_meta_boxes(); ?>

	<table class="form-table meta-boxes-table">
	<?php foreach ( $meta_boxes as $meta ) :

		// $value = stripslashes( get_post_meta( $post->ID, $meta['name'], true ) ); // original
		$value = get_post_meta( $post->ID, $meta['name'], true );
		if(is_array($value)){
			//foreach($value as $k => $v){
				//$value[$k] = stripslashes( $v );
			//}
		}else{
			$value = stripslashes( $value );
		}

		if ( $meta['type'] == 'text' )
			get_meta_text_input( $meta, $value );
		elseif ( $meta['type'] == 'upload' )
			get_meta_text_upload( $meta, $value );
		elseif ( $meta['type'] == 'textarea' )
			get_meta_textarea( $meta, $value );
		elseif ( $meta['type'] == 'select' )
			get_meta_select( $meta, $value );
		elseif ( $meta['type'] == 'colorpicker' )
			get_meta_colorpicker( $meta, $value );
		elseif ( $meta['type'] == 'imagesmapler' )
			get_meta_imagesampler( $meta, $value );
		elseif ( $meta['type'] == 'imagesamplerhidden' )
			get_meta_imagesamplerhidden( $meta, $value );
		elseif ( $meta['type'] == 'slidemanager' )
			get_meta_slidemanager( $meta, $value );

	endforeach; ?>
	</table>
<?php 
}

function slideshow_meta_boxes() {
	global $post;
	$meta_boxes = flowthemes_slideshow_meta_boxes(); ?>

	<table class="form-table meta-boxes-table">
	<?php foreach ( $meta_boxes as $meta ) :

		// $value = stripslashes( get_post_meta( $post->ID, $meta['name'], true ) ); // original
		$value = get_post_meta( $post->ID, $meta['name'], true );
		if(is_array($value)){
			//foreach($value as $k => $v){
				//$value[$k] = stripslashes( $v );
			//}
		}else{
			$value = stripslashes( $value );
		}

		if ( $meta['type'] == 'text' )
			get_meta_text_input( $meta, $value );
		elseif ( $meta['type'] == 'upload' )
			get_meta_text_upload( $meta, $value );
		elseif ( $meta['type'] == 'textarea' )
			get_meta_textarea( $meta, $value );
		elseif ( $meta['type'] == 'select' )
			get_meta_select( $meta, $value );
		elseif ( $meta['type'] == 'colorpicker' )
			get_meta_colorpicker( $meta, $value );
		elseif ( $meta['type'] == 'imagesmapler' )
			get_meta_imagesampler( $meta, $value );
		elseif ( $meta['type'] == 'imagesamplerhidden' )
			get_meta_imagesamplerhidden( $meta, $value );
		elseif ( $meta['type'] == 'slidemanager' )
			get_meta_slidemanager( $meta, $value );

	endforeach; ?>
	</table>
<?php 
}

function get_meta_text_input( $args = array(), $value = false ) {
	extract( $args ); ?>

	<tr>
		<th style="width:20%;">
			<label for="<?php echo $name; ?>"><?php echo $title; ?></label>
		</th>
		<td>
			<input type="text" name="<?php echo $name; ?>" id="<?php echo $name; ?>" value="<?php echo esc_html( $value ); ?>" size="30" tabindex="30" style="width: 97%;" />
			<input type="hidden" name="<?php echo $name; ?>_noncename" id="<?php echo $name; ?>_noncename" value="<?php echo wp_create_nonce( plugin_basename( __FILE__ ) ); ?>" />
			<p><?php echo $desc; ?></p>
		</td>
	</tr>
	<?php 
}

function get_meta_text_upload( $args = array(), $value = false ) {
	extract( $args ); ?>
	<tr>
		<th style="width:20%;">
			<label for="<?php echo $name; ?>"><?php echo $title; ?></label>
		</th>
		<td>
			<div class="flowuploader">
				<input class="flowuploader_media_url" type="text" name="<?php echo $name; ?>" value="<?php echo esc_html( $value ); ?>" />
				<span class="flowuploader_upload_button button">Upload</span>
				<div class="flowuploader_media_preview_image"></div>
			</div>
			<input type="hidden" name="<?php echo $name; ?>_noncename" id="<?php echo $name; ?>_noncename" value="<?php echo wp_create_nonce( plugin_basename( __FILE__ ) ); ?>" />
			<p><?php echo $desc; ?></p>
		</td>
	</tr>
	<?php 
}

function get_meta_colorpicker( $args = array(), $value = false ){
	extract( $args ); ?>
	<tr>
		<th style="width:20%;">
			<label for="<?php echo $name; ?>"><?php echo $title; ?></label>
		</th>
		<td>						
			<input id="<?php echo $name; ?>" type="text" class="" name="<?php echo $name; ?>" value="<?php echo esc_html( $value ); ?>">
			<script type="text/javascript">
				jQuery(document).ready(function(){
					if(typeof jQuery.wp === "object" && typeof jQuery.wp.wpColorPicker === "function"){
						var options = {
							palettes: false
						};
						jQuery('#<?php echo $name; ?>').wpColorPicker(options);
					}
				});
			</script>
			<input type="hidden" name="<?php echo $name; ?>_noncename" id="<?php echo $name; ?>_noncename" value="<?php echo wp_create_nonce( plugin_basename( __FILE__ ) ); ?>" />
			<p>
				<?php echo $desc; ?>
			</p>
		</td>
	</tr>
	<?php 
}
function get_meta_imagesamplerhidden( $args = array(), $value = false ){ extract( $args ); ?>
	<tr style="display:none;">
		<th></th>
		<td>
			<input id="<?php echo $name; ?>" type="text" name="<?php echo $name; ?>" value="<?php echo esc_html( $value ); ?>">
			<input type="hidden" name="<?php echo $name; ?>_noncename" id="<?php echo $name; ?>_noncename" value="<?php echo wp_create_nonce( plugin_basename( __FILE__ ) ); ?>" />
		</td>
	</tr>
	<?php 
}

$nonce_name = plugin_basename( __FILE__ );
include( dirname( __FILE__ ) . '/image-color-picker.php' );

function get_meta_select( $args = array(), $value = false ) {
	extract( $args );
		if(isset($is_multiple) && $is_multiple){
			$page_portfolio_post_id = $_GET['post'] ? $_GET['post'] : $_POST['post_ID'];
			if($page_portfolio_post_id){
				$value = get_post_meta($page_portfolio_post_id, $name, true);
			}
		}else{
			$is_multiple = false;
		}
	?>
	<tr>
		<th style="width:20%;">
			<label for="<?php echo $name; ?>"><?php echo $title; ?></label>
		</th>
		<td>
			<select <?php if($is_multiple){ echo ' multiple="multiple"'; } ?> name="<?php echo $name; if($is_multiple){ echo '[]'; } ?>" id="<?php echo $name; ?>">
				<?php foreach( $options as $optionkey => $optionval ){ ?>
					<option value="<?php echo $optionkey; ?>" <?php if((is_array($value) && in_array($optionkey, $value)) || (is_string($value) && $optionkey == $value)){ echo ' selected="selected"'; } ?>><?php echo $optionval; ?></option>
				<?php } ?>
			</select>
			<p>
				<?php echo $desc; ?>
			</p>
			<input type="hidden" name="<?php echo $name; ?>_noncename" id="<?php echo $name; ?>_noncename" value="<?php echo wp_create_nonce( plugin_basename( __FILE__ ) ); ?>" />
		</td>
	</tr>
	<?php 
}

function get_meta_textarea( $args = array(), $value = false ) {

	extract( $args ); ?>

	<tr>
		<th style="width:20%;">
			<label for="<?php echo $name; ?>"><?php echo $title; ?></label>
		</th>
		<td>
			<textarea name="<?php echo $name; ?>" id="<?php echo $name; ?>" cols="60" rows="4" tabindex="30" style="width: 97%;"><?php echo esc_html( $value ); ?></textarea>
			<input type="hidden" name="<?php echo $name; ?>_noncename" id="<?php echo $name; ?>_noncename" value="<?php echo wp_create_nonce( plugin_basename( __FILE__ ) ); ?>" />
			<p>
				<?php echo $desc; ?>
			</p>
		</td>
	</tr>
	<?php 
}

/* Add a new meta box to the admin menu. */
add_action( 'admin_menu', 'flowthemes_create_meta_box' );

/* Saves the meta box data. */
add_action( 'save_post', 'flowthemes_save_meta_data' );

/**
 * Loops through each meta box's set of variables.
 * Saves them to the database as custom fields.
 *
 * @since 0.3
 * @param int $post_id
 */
function flowthemes_save_meta_data( $post_id ) {
	global $post;
	$i = 0;

	if ( 'page' == $_POST['post_type'] )
		$meta_boxes = array_merge( flowthemes_page_meta_boxes() );
	elseif ( 'portfolio' == $_POST['post_type'] )
		$meta_boxes = array_merge( flowthemes_portfolio_meta_boxes() );
	elseif ( 'slideshow' == $_POST['post_type'] )
		$meta_boxes = array_merge( flowthemes_slideshow_meta_boxes() );
	else
		$meta_boxes = array_merge( flowthemes_post_meta_boxes() );
		
	foreach ( $meta_boxes as $meta_box ) :
		
		if ( !wp_verify_nonce( $_POST[$meta_box['name'] . '_noncename'], plugin_basename( __FILE__ ) ) )
			return $post_id;

		if ( 'page' == $_POST['post_type'] && !current_user_can( 'edit_page', $post_id ) )
			return $post_id;

		elseif ( 'post' == $_POST['post_type'] && !current_user_can( 'edit_post', $post_id ) )
			return $post_id;

		$data = $_POST[$meta_box['name']];
		if(!is_array($data)){
			$data = stripslashes($data);
		}

		// Update post		 
		if ( get_post_meta( $post_id, $meta_box['name'] ) == '' )
			add_post_meta( $post_id, $meta_box['name'], $data, true );

		elseif ( $data != get_post_meta( $post_id, $meta_box['name'], true ) )
			update_post_meta( $post_id, $meta_box['name'], $data );

		elseif ( $data == '' )
			delete_post_meta( $post_id, $meta_box['name'], get_post_meta( $post_id, $meta_box['name'], true ) );

	endforeach;
} ?>