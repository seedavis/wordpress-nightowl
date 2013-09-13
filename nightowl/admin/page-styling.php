<?php
function flow_styling_admin_tabs( $current = 'general' ){ /* Define available tabs */
	//$tabs = array( 'general' => 'General', 'header' => 'Header', 'portfolio' => 'Portfolio' );
	$tabs = array( 'general' => 'General', 'header' => 'Header' );
	echo '<div class="wrap"><div id="icon-options-general" class="icon32"><br></div>';
	echo '<h2 class="nav-tab-wrapper">';
	foreach( $tabs as $tab => $name ){
		$class = ( $tab == $current ) ? ' nav-tab-active' : '';
		echo "<a class='nav-tab$class' href='?page=sub-page41&tab=$tab'>$name</a>";
	}
	echo '</h2>';
}

$styling_options = array(
	'group-label-background-styles' => array(
		'group' => 'general',
		'options' => array(
			array(
				'title' => __('Global Background', 'flowthemes'),
				'type' => 'group-label'
			)
		)
	),
	'body' => array(
		'group' => 'general',
		'options' => array(
			array(
				'title' => __('Background Color', 'flowthemes'),
				'description' => '',
				'css_property' => 'background-color',
				'type' => 'colorpicker',
				'placeholder' => '#ffffff'
			),
			array(
				'title' => __('Background Image', 'flowthemes'),
				'description' => '',
				'css_property' => 'background-image',
				'type' => 'upload',
				'placeholder' => 'none'
			),
			array(
				'title' => __('Background Repeat', 'flowthemes'),
				'css_property' => 'background-repeat',
				'type' => 'select',
				'options' => array('repeat' => 'Repeat', 'repeat-x' => 'Repeat-x', 'repeat-y' => 'Repeat-y', 'no-repeat' => 'No-repeat')
			),
			array(
				'title' => __('Background Position (vertiacal)', 'flowthemes'),
				'css_property' => 'background-position-y',
				'type' => 'select',
				'options' => array('top' => 'Top', 'center' => 'Center', 'bottom' => 'Bottom')
			),
			array(
				'title' => __('Background Position (horizontal)', 'flowthemes'),
				'css_property' => 'background-position-x',
				'type' => 'select',
				'options' => array('left' => 'Left', 'center' => 'Center', 'right' => 'Right')
			),
			array(
				'title' => __('Background Attachment', 'flowthemes'),
				'css_property' => 'background-attachment',
				'type' => 'select',
				'options' => array('fixed' => 'Fixed', 'scroll' => 'Scroll')
			)
		)
	),
	'group-label-page-styles' => array(
		'group' => 'general',
		'options' => array(
			array(
				'title' => __('Pages', 'flowthemes'),
				'type' => 'group-label'
			)
		)
	),
	'.page-title' => array(
		'group' => 'general',
		'options' => array(
			array(
				'title' => __('Page Title Color', 'flowthemes'),
				'description' => '',
				'css_property' => 'color',
				'type' => 'colorpicker',
				'placeholder' => '#000000'
			),
			array(
				'title' => __('Page Title Font Size', 'flowthemes'),
				'css_property' => 'font-size',
				'type' => 'slider',
				'placeholder' => '32px',
				'options' => array('min' => '10', 'max' => '70', 'unit' => 'px')
			),
			array(
				'title' => __('Page Title Line Height', 'flowthemes'),
				'css_property' => 'line-height',
				'type' => 'slider',
				'placeholder' => '26px',
				'options' => array('min' => '10', 'max' => '70', 'unit' => 'px')
			),
			array(
				'title' => __('Page Title Bottom Margin', 'flowthemes'),
				'css_property' => 'margin-bottom',
				'type' => 'slider',
				'placeholder' => '50px',
				'options' => array('min' => '0', 'max' => '120', 'unit' => 'px')
			),
			array(
				'title' => __('Page Title Bottom Padding', 'flowthemes'),
				'css_property' => 'padding-bottom',
				'type' => 'slider',
				'placeholder' => '20px',
				'options' => array('min' => '0', 'max' => '120', 'unit' => 'px')
			)
		)
	),
	'.page-description' => array(
		'group' => 'general',
		'options' => array(
			array(
				'title' => __('Page Description Color', 'flowthemes'),
				'description' => '',
				'css_property' => 'color',
				'type' => 'colorpicker',
				'placeholder' => '#707070'
			),
			array(
				'title' => __('Page Description Font Size', 'flowthemes'),
				'css_property' => 'font-size',
				'type' => 'slider',
				'placeholder' => '32px',
				'options' => array('min' => '10', 'max' => '70', 'unit' => 'px')
			),
			array(
				'title' => __('Page Description Line Height', 'flowthemes'),
				'css_property' => 'line-height',
				'type' => 'slider',
				'placeholder' => '120%',
				'options' => array('min' => '10', 'max' => '250', 'unit' => '%')
			),
			array(
				'title' => __('Page Description Bottom Margin', 'flowthemes'),
				'css_property' => 'margin-bottom',
				'type' => 'slider',
				'placeholder' => '50px',
				'options' => array('min' => '0', 'max' => '120', 'unit' => 'px')
			),
			array(
				'title' => __('Page Description Bottom Padding', 'flowthemes'),
				'css_property' => 'padding-bottom',
				'type' => 'slider',
				'placeholder' => '20px',
				'options' => array('min' => '0', 'max' => '120', 'unit' => 'px')
			)
		)
	),


	'group-label-info-box-styles' => array(
		'group' => 'header',
		'options' => array(
			array(
				'title' => __('Info Box', 'flowthemes'),
				'group' => 'header',
				'type' => 'group-label'
			)
		)
	),
	'.info-box' => array(
		'group' => 'header',
		'options' => array(
			array(
				'title' => __('Info Box Background Color', 'flowthemes'),
				'description' => __('Changing background color and text color of "Info Box" is not enough - there is also a raster arrow in /images/ folder that needs manual color change.', 'flowthemes'),
				'group' => 'header',
				'css_property' => 'background-color',
				'type' => 'colorpicker',
				'placeholder' => '#121217'
			)
		)
	),
	'.info-box .info-box-inner' => array(
		'group' => 'header',
		'options' => array(
			array(
				'title' => __('Info Box Text Color', 'flowthemes'),
				'group' => 'header',
				'css_property' => 'color',
				'type' => 'colorpicker',
				'placeholder' => '#ffffff'
			)
		)
	),
	'.info-box .info-box-inner h1, .info-box .info-box-inner h2, .info-box .info-box-inner h3, .info-box .info-box-inner h4, .info-box .info-box-inner h5, .info-box .info-box-inner h6' => array(
		'group' => 'header',
		'options' => array(
			array(
				'title' => __('Info Box Headings Color', 'flowthemes'),
				'description' => '',
				'group' => 'header',
				'css_property' => 'color',
				'type' => 'colorpicker',
				'placeholder' => '#ffffff'
			)
		)
	),
	
	'group-label-logo-styles' => array(
		'group' => 'header',
		'options' => array(
			array(
				'title' => __('Logo', 'flowthemes'),
				'type' => 'group-label'
			)
		)
	),
	'.site-title' => array(
		'group' => 'header',
		'options' => array(
			array(
				'title' => __('Text Logo Color', 'flowthemes'),
				'description' => '',
				'group' => 'header',
				'css_property' => 'color',
				'type' => 'colorpicker',
				'placeholder' => '#000000'
			)
		)
	),
	'.site-title:hover' => array(
		'group' => 'header',
		'options' => array(
			array(
				'title' => __('Mouse Over Text Logo Color', 'flowthemes'),
				'description' => '',
				'group' => 'header',
				'css_property' => 'color',
				'type' => 'colorpicker',
				'placeholder' => '#000000'
			)
		)
	),
	'.conatainer_language_selector' => array(
		'group' => 'header',
		'options' => array(
			array(
				'title' => __('Language Switcher Vertical Position', 'flowthemes'),
				'description' => __('It starts centered. Negative value (like -10px) moves it up and positive value (like 10px) moves it down.', 'flowthemes'),
				'css_property' => 'top',
				'type' => 'slider',
				'placeholder' => '10px',
				'options' => array('min' => '-50', 'max' => '50', 'unit' => 'px')
			),
			array(
				'title' => __('Language Switcher Horizontal Position', 'flowthemes'),
				'description' => __('Negative value (like -10px) moves it to the left and positive value (like 10px) moves it to the right.', 'flowthemes'),
				'css_property' => 'left',
				'type' => 'slider',
				'placeholder' => '170px',
				'options' => array('min' => '100', 'max' => '250', 'unit' => 'px')
			)
		)
	),
	
	'group-label-menu-styles' => array(
		'group' => 'header',
		'options' => array(
			array(
				'title' => __('Menu', 'flowthemes'),
				'type' => 'group-label'
			)
		)
	),
	/* '.flow_smart_menu li a span.menu-icon' => array(
		'group' => 'header',
		'options' => array(
			array(
				'title' => __('Hide Menu Icons', 'flowthemes'),
				'css_property' => 'display',
				'type' => 'select',
				'options' => array('none' => 'Hide')
			)
		)
	), */
	'.site-navigation' => array(
		'group' => 'header',
		'options' => array(
			array(
				'title' => __('Navigation Top Spacing', 'flowthemes'),
				'description' => __('It is useful especially to position your menu vertically in relation to the logo or when you decide to remove icons.', 'flowthemes'),
				'css_property' => 'top',
				'type' => 'slider',
				'placeholder' => '45px',
				'options' => array('min' => '0', 'max' => '150', 'unit' => 'px')
			)
		)
	),
	'.nav-menu li a, .menu-item[class^="modernpicrograms-icon-"] > a, .menu-item[class*=" modernpicrograms-icon-"] > a' => array(
		'group' => 'header',
		'options' => array(
			array(
				'title' => __('Menu Text Color', 'flowthemes'),
				'description' => '',
				'group' => 'header',
				'css_property' => 'color',
				'type' => 'colorpicker',
				'placeholder' => '#000000'
			)
		)
	),
	'.nav-menu > .current_page_item > a, .nav-menu > .current-menu-item > a' => array(
		'group' => 'header',
		'options' => array(
			array(
				'title' => __('Menu Text and Icon Colors - Current Item', 'flowthemes'),
				'description' => '',
				'css_property' => 'color',
				'type' => 'colorpicker',
				'placeholder' => '#00A4A7'
			)
		)
	),
	'.nav-menu li:hover > a, .nav-menu li a:hover, .nav-menu .menu-item[class^="modernpicrograms-icon-"] > a:before:hover, .menu-item[class*=" modernpicrograms-icon-"] > a:before:hover, .nav-menu .menu-item[class^="modernpicrograms-icon-"]:hover > a:before, .menu-item[class*=" modernpicrograms-icon-"]:hover > a:before' => array(
		'group' => 'header',
		'options' => array(
			array(
				'title' => __('Menu Text Color - Mouse Over', 'flowthemes'),
				'description' => '',
				'css_property' => 'color',
				'type' => 'colorpicker',
				'placeholder' => '#00A4A7'
			)
		)
	),
	/* '.flow_smart_menu li:hover > a span:first-child' => array(
		'group' => 'header',
		'options' => array(
			array(
				'title' => __('Menu Icon Color - Hover', 'flowthemes'),
				'description' => '',
				'group' => 'header',
				'css_property' => 'color',
				'type' => 'colorpicker',
				'placeholder' => '#00A4A7'
			)
		)
	), */
	/* '.flow_smart_menu > li.menu-item-has-submenu:hover > a span:last-child' => array(
		'group' => 'header',
		'options' => array(
			array(
				'title' => __('Menu Item Background Color - Hover', 'flowthemes'),
				'description' => '',
				'group' => 'header',
				'css_property' => 'background-color',
				'type' => 'colorpicker',
				'placeholder' => '#00A4A7'
			)
		)
	), */
	
	/* 'group-label-welcome-text-styles' => array(
		'group' => 'header',
		'options' => array(
			array(
				'title' => __('Welcome Text', 'flowthemes'),
				'type' => 'group-label'
			)
		)
	),
	'.welcome-text' => array(
		'group' => 'header',
		'options' => array(
			array(
				'title' => __('Welcome Text Top Spacing', 'flowthemes'),
				'description' => '',
				'css_property' => 'padding-top',
				'type' => 'slider',
				'placeholder' => '35px',
				'options' => array('min' => '0', 'max' => '80', 'unit' => 'px')
			),
			array(
				'title' => __('Welcome Text Bottom Spacing', 'flowthemes'),
				'description' => '',
				'css_property' => 'padding-bottom',
				'type' => 'slider',
				'placeholder' => '40px',
				'options' => array('min' => '0', 'max' => '80', 'unit' => 'px')
			),
			array(
				'title' => __('Welcome Text Font Size', 'flowthemes'),
				'description' => '',
				'css_property' => 'font-size',
				'type' => 'slider',
				'placeholder' => '50px',
				'options' => array('min' => '0', 'max' => '100', 'unit' => 'px')
			)
		)
	), */
	
	/* 'group-label-portfolio-grid-styles' => array(
		'group' => 'portfolio',
		'options' => array(
			array(
				'title' => __('Portfolio Grid', 'flowthemes'),
				'type' => 'group-label'
			)
		)
	),
	'#options ul' => array(
		'group' => 'portfolio',
		'options' => array(
			array(
				'title' => __('Hide Size Sorter', 'flowthemes'),
				'css_property' => 'display',
				'type' => 'select',
				'options' => array('none' => 'Hide')
			)
		)
	),
	'#filters' => array(
		'group' => 'portfolio',
		'options' => array(
			array(
				'title' => __('Hide Categories Filter', 'flowthemes'),
				'css_property' => 'display',
				'type' => 'select',
				'options' => array('none' => 'Hide')
			)
		)
	),
	'#filters li:first-child' => array(
		'group' => 'portfolio',
		'options' => array(
			array(
				'title' => __('Hide "All Works" link', 'flowthemes'),
				'description' => __('This will still show all works on start and not the next item selected.', 'flowthemes'),
				'css_property' => 'display',
				'type' => 'select',
				'options' => array('none' => 'Hide')
			)
		)
	),
	'.element, .element *' => array(
		'group' => 'portfolio',
		'options' => array(
			array(
				'title' => __('Thumbnails Border Radius', 'flowthemes'),
				'description' => __('Not all browsers are capable of doing this. And browsers such as Chrome require thumbnails to be in 1:1 scale because they scale radius as well.', 'flowthemes'),
				'css_property' => 'border-radius',
				'type' => 'slider',
				'placeholder' => '0px',
				'options' => array('min' => '0', 'max' => '45', 'unit' => 'px')
			)
		)
	),
	'.project-title' => array(
		'group' => 'portfolio',
		'options' => array(
			array(
				'title' => __('Project Title Size', 'flowthemes'),
				'css_property' => 'font-size',
				'type' => 'slider',
				'placeholder' => '160px',
				'options' => array('min' => '30', 'max' => '250', 'unit' => 'px')
			)
		)
	),
	'#options li a' => array(
		'group' => 'portfolio',
		'options' => array(
			array(
				'title' => __('Filter Text Color', 'flowthemes'),
				'description' => '',
				'css_property' => 'color',
				'type' => 'colorpicker',
				'placeholder' => '#000000'
			)
		)
	),
	'#options li a.selected' => array(
		'group' => 'portfolio',
		'options' => array(
			array(
				'title' => __('Filter Text Color (Selected Item)', 'flowthemes'),
				'description' => '',
				'css_property' => 'color',
				'type' => 'colorpicker',
				'placeholder' => '#ffffff'
			),
			array(
				'title' => __('Filter Background Color (Selected Item)', 'flowthemes'),
				'description' => '',
				'css_property' => 'background-color',
				'type' => 'colorpicker',
				'placeholder' => '#00A4A7'
			),
			array(
				'title' => __('Filter Border Radius (Selected Item)', 'flowthemes'),
				'css_property' => 'border-radius',
				'type' => 'slider',
				'placeholder' => '12px',
				'options' => array('min' => '0', 'max' => '25', 'unit' => 'px')
			)
		)
	),
	'#options li a:hover' => array(
		'group' => 'portfolio',
		'options' => array(
			array(
				'title' => __('Filter Text Color (Mouse Over)', 'flowthemes'),
				'description' => '',
				'css_property' => 'color',
				'type' => 'colorpicker',
				'placeholder' => '#ffffff'
			),
			array(
				'title' => __('Filter Background Color (Mouse Over)', 'flowthemes'),
				'description' => '',
				'css_property' => 'background-color',
				'type' => 'colorpicker',
				'placeholder' => '#00A4A7'
			),
			array(
				'title' => __('Filter Border Radius (Mouse Over)', 'flowthemes'),
				'css_property' => 'border-radius',
				'type' => 'slider',
				'placeholder' => '12px',
				'options' => array('min' => '0', 'max' => '25', 'unit' => 'px')
			)
		)
	),
	'.sharing-icons a' => array(
		'group' => 'portfolio',
		'options' => array(
			array(
				'title' => __('Sharing Icons Color', 'flowthemes'),
				'description' => '',
				'css_property' => 'color',
				'type' => 'colorpicker',
				'placeholder' => '#000000'
			)
		)
	),
	'.sharing-icons-tooltip:after' => array(
		'group' => 'portfolio',
		'options' => array(
			array(
				'title' => __('Tooltip Text Color', 'flowthemes'),
				'description' => '',
				'css_property' => 'color',
				'type' => 'colorpicker',
				'placeholder' => '#ffffff'
			),
			array(
				'title' => __('Tooltip Background Color', 'flowthemes'),
				'description' => '',
				'css_property' => 'background-color',
				'type' => 'colorpicker',
				'placeholder' => '#000000'
			),
			array(
				'title' => __('Filter Border Radius (Mouse Over)', 'flowthemes'),
				'css_property' => 'border-radius',
				'type' => 'slider',
				'placeholder' => '4px',
				'options' => array('min' => '0', 'max' => '15', 'unit' => 'px')
			)
		)
	) */
);

function flow_styling_generate_fields($styling_options, $this_group, $field_values){
	if(is_array($styling_options) && isset($this_group)){
		$i = 0;
		$all_fields = '';
		foreach($styling_options as $key_main => $value_main){
			if($value_main['group'] == $this_group){
				foreach($value_main['options'] as $key => $value){
					$description = '';
					if(isset($value['description'])){
						$description = '<p>'.$value['description'].'</p>';
					}
					if($value['type'] == 'colorpicker2'){
						$color = '';
						$this_value = '';
						if(isset($field_values[$key_main][$value['css_property']])){
							$color = 'style="background-color:'.$field_values[$key_main][$value['css_property']].';"';
							$this_value = $field_values[$key_main][$value['css_property']];
						}
						$field = '
							<tr>
								<th><span class="flow-styling-title">'.$value['title'].'</span><span class="flow-styling-subtitle">(<b>'.$value['css_property'].'</b> for: '.$key_main.')</span></th>
								<td>
									<input type="text" class="attcolorpicker flow_styling_input" name="flow_styling_'.$i.'" placeholder="'.$value['placeholder'].'" value="'.$this_value.'">
									<div class="colorSelector">
										<div '.$color.'></div>
									</div>
									'.$description.'
								</td>
							</tr>
						';
					}else if($value['type'] == 'colorpicker'){
						$color = '';
						$this_value = '';
						if(isset($field_values[$key_main][$value['css_property']])){
							$color = 'style="background-color:'.$field_values[$key_main][$value['css_property']].';"';
							$this_value = $field_values[$key_main][$value['css_property']];
						}
						$field = '
							<tr>
								<th><span class="flow-styling-title">'.$value['title'].'</span><span class="flow-styling-subtitle">(<b>'.$value['css_property'].'</b> for: '.$key_main.')</span></th>
								<td>
									<input class="flow_styling_input_color" type="text" name="flow_styling_'.$i.'" placeholder="'.$value['placeholder'].'" value="'.$this_value.'" />
									'.$description.'
								</td>
							</tr>
						';
					}else if($value['type'] == 'upload2'){
						$this_value = '';
						if(isset($field_values[$key_main][$value['css_property']])){
							$this_value = $field_values[$key_main][$value['css_property']];
						}
						$field = '
							<tr>
								<th><span class="flow-styling-title">'.$value['title'].'</span><span class="flow-styling-subtitle">(<b>'.$value['css_property'].'</b> for: '.$key_main.')</span></th>
								<td>
									<input class="flow_styling_input" name="flow_styling_'.$i.'" type="text" placeholder="'.$value['placeholder'].'" value="'.$this_value.'">
									<span href="#" title="" class="briskuploader button">'.__('Upload', 'flowthemes').'</span><br/><div class="briskuploader_preview"></div>
									'.$description.'
								</td>
							</tr>
						';
					}else if($value['type'] == 'upload'){
						$this_value = '';
						if(isset($field_values[$key_main][$value['css_property']])){
							$this_value = $field_values[$key_main][$value['css_property']];
						}
						$field = '
							<tr>
								<th><span class="flow-styling-title">'.$value['title'].'</span><span class="flow-styling-subtitle">(<b>'.$value['css_property'].'</b> for: '.$key_main.')</span></th>
								<td>
									<div class="flowuploader">
										<input class="flowuploader_media_url flow_styling_input" type="text" name="flow_styling_'.$i.'" type="text" placeholder="'.$value['placeholder'].'" value="'.$this_value.'" />
										<span class="flowuploader_upload_button button">' . __('Upload', 'flowthemes') . '</span>
										<div class="flowuploader_media_preview_image"></div>
									</div>
									'.$description.'
								</td>
							</tr>
						';
					}else if($value['type'] == 'select'){
						if(is_array($value['options'])){
							$this_value = '';
							if(isset($field_values[$key_main][$value['css_property']])){
								$this_value = $field_values[$key_main][$value['css_property']];
							}
							$field = '
								<tr>
									<th><span class="flow-styling-title">'.$value['title'].'</span><span class="flow-styling-subtitle">(<b>'.$value['css_property'].'</b> for: '.$key_main.')</span></th>
									<td>
										<select class="flow_styling_input" name="flow_styling_'.$i.'">';
											if(empty($this_value)){
												$field .= '<option value="disabled" selected="selected">(none)</option>';
											}else{
												$field .= '<option value="disabled">Disable</option>';
											}
											foreach($value['options'] as $key_inner => $value_inner){
												if($key_inner == $this_value){
													$field .= '<option value="'.$key_inner.'" selected="selected">'.$value_inner.'</option>';
												}else{
													$field .= '<option value="'.$key_inner.'">'.$value_inner.'</option>';
												}
											}
										$field .= '</select>
										'.$description.'
									</td>
								</tr>
							';
						}
					}else if($value['type'] == 'slider'){
						if(is_array($value['options'])){
							$this_value = '';
							if(isset($field_values[$key_main][$value['css_property']])){
								$this_value = $field_values[$key_main][$value['css_property']];
							}
							unset($number, $unit, $input_number, $input_unit, $min, $max);
							$number = $unit = $input_number = $input_unit = $min = $max = '';
							$max = $value['options']['max'] ? $value['options']['max'] : '100'; //superglobal
							$min = $value['options']['min'] ? $value['options']['min'] : '1'; //superglobal
							$unit = $value['options']['unit'] ? $value['options']['unit'] : 'px'; //superglobal
							if($this_value){
								$arr = preg_split('/(?<=[0-9])(?=[a-z%]+)/i', $field_values[$key_main][$value['css_property']]);
								$number = $arr[0];
								$unit = $arr[1];
							}
							if(!isset($unit) || empty($unit)){
								$unit = 'px'; //superglobal
							}
							$input_number = $number;
							$input_unit = $unit;
							if(!isset($number) || empty($number)){
								$number = $min-1; //superglobal
								$input_number = ''; //superglobal
								$input_unit = '';
							}
							if($number > $max){
								$max = $number;
							}
							if($number < ($min-1)){
								$min = $number;
							}
							$field = '
								<tr>
									<th><span class="flow-styling-title">'.$value['title'].'</span><span class="flow-styling-subtitle">(<b>'.$value['css_property'].'</b> for: '.$key_main.')</span></th>
									<td>
										<script>
											jQuery(document).ready(function() {
												var unit_'.$i.' = "'.$unit.'";
												jQuery( "#flow_styling_slider-range-min_'.$i.'" ).slider({
													range: "min",
													value: '.$number.',
													min: '.($min-1).',
													max: '.$max.',
													slide: function( event, ui ) {
														var min = jQuery(this).slider( "option", "min" );
														if(min == ui.value){
															jQuery( "#flow_styling_amount_'.$i.'" ).val("");
														}else{
															jQuery( "#flow_styling_amount_'.$i.'" ).val( ui.value + unit_'.$i.' );
														}
													}
												});
												//jQuery( "#flow_styling_amount_'.$i.'" ).val( jQuery( "#flow_styling_slider-range-min_'.$i.'" ).slider( "value" ) + unit_'.$i.' );
											});
										</script>
										<input type="text" id="flow_styling_amount_'.$i.'" class="flow_styling_input" name="flow_styling_'.$i.'" placeholder="'.$value['placeholder'].'" value="'.$input_number.$input_unit.'">
										<div id="flow_styling_slider-range-min_'.$i.'"></div>
										'.$description.'
									</td>
								</tr>
							';
						}
					}else if($value['type'] == 'group-label'){
						$field = '
							<tr>
								<th colspan="2"><h2>'.$value['title'].'</h2></th>
							</tr>
						';
					}else{
						$this_value = '';
						if(isset($field_values[$key_main][$value['css_property']])){
							$this_value = $field_values[$key_main][$value['css_property']];
						}
						$field = '
							<tr>
								<th><span class="flow-styling-title">'.$value['title'].'</span><span class="flow-styling-subtitle">(<b>'.$value['css_property'].'</b> for: '.$key_main.')</span></th>
								<td>
									<input class="flow_styling_input" name="flow_styling_'.$i.'" type="text" placeholder="'.$value['placeholder'].'" value="'.$this_value.'">
									'.$description.'
								</td>
							</tr>
						';
					}
					$all_fields .= $field;
					$i++;
				}
			}
		}
		return $all_fields;
	}
	return;
}
function flow_styling_field_names($styling_options, $this_group, $settings){
	if(is_array($styling_options) && isset($this_group) && is_array($settings)){
		$i = 0;
		foreach($styling_options as $key_main => $value_main){
			if(is_array($value_main) && ($value_main['group'] == $this_group && $value['options']['type'] != 'group-label')){
				foreach($value_main['options'] as $key => $value){
					if($_POST['flow_styling_'.$i] == '' || ($value['type'] == 'select' && $_POST['flow_styling_'.$i] == 'disabled')){
						unset($settings[$key_main][$value['css_property']]);
						if(empty($settings[$key_main])){
							unset($settings[$key_main]);
						}
					}else{
						if(!current_user_can('unfiltered_html')){
							$settings[$key_main][$value['css_property']] = stripslashes( esc_textarea( wp_filter_post_kses( $_POST['flow_styling_'.$i] ) ) );
						}else{
							$settings[$key_main][$value['css_property']] = $_POST['flow_styling_'.$i];
						}
					}
					$i++;
				}
			}
		}
		return $settings;
	}
	return;
}
function flow_save_styling_settings(){
	global $pagenow;
	global $styling_options;
	$settings = get_option("flow_styling");
	if(!is_array($settings)){ $settings = array(); }
	
	if($pagenow == 'admin.php' && $_GET['page'] == 'sub-page41'){
		if(isset($_GET['tab'])){
			$tab = $_GET['tab'];
		}else{
			$tab = 'general';
		}

		switch($tab){
			case 'header':
				$settings = flow_styling_field_names($styling_options, $tab, $settings);
			break;
			case 'portfolio':
				$settings = flow_styling_field_names($styling_options, $tab, $settings);
			break;
			case 'footer':
			
			break;
			case 'general':
				$settings = flow_styling_field_names($styling_options, $tab, $settings);
			break;
			case 'skins':
				
			break;
			case 'info':
				
			break;
		}
	}

	$updated = update_option( "flow_styling", $settings );
	return $updated;
	//return $settings;
}
function flow_styling_menu(){
    if(!current_user_can('manage_options')){
		wp_die(__('You do not have sufficient permissions to access this page.', 'flowthemes'));
    }
	
	// variables for the field and option names 
	$hidden_field_name = 'mt_submit_hidden';
	
	$opt_name = 'custom_css_style';
    $data_field_name = 'custom_css_style';
	
    // Read in existing option value from database
    $opt_val = get_option( $opt_name );
	
	if(isset($_POST['flow_styling_nonce_security']) && $_POST['flow_styling_nonce_security'] == "Y"){
		check_admin_referer("flow_styling_nonce_security");
		// Read their posted value
		$opt_val = $_POST[ $data_field_name ];
		
		 // Save the posted value in the database
        update_option( $opt_name, $opt_val );
		
		// Save other styling options
		$settings = flow_save_styling_settings();
		?>
		<div class="updated"><p><strong><?php _e('Settings saved.', 'flowthemes' ); ?></strong></p></div>
		<?php 
	}
		
	global $pagenow;

	if(isset($_GET['tab'])){
		flow_styling_admin_tabs($_GET['tab']);
	}else{
		flow_styling_admin_tabs('general');
	}
		
	?>
	<form method="post" action="<?php admin_url('admin.php?page=sub-page41'); ?>">
		<?php
		if($pagenow == 'admin.php' && $_GET['page'] == 'sub-page41'){
			if(isset($_GET['tab'])){
				$tab = $_GET['tab'];
			}else{
				$tab = 'general';
			}
			
			$show_update_button = true;
			
			global $styling_options;
			$saved_options = get_option("flow_styling");
			if(!is_array($saved_options)){ $saved_options = array(); }

			echo '<table class="form-table flow-styling-table flow-admin-table">';
			switch($tab){
				case 'header':
					echo flow_styling_generate_fields($styling_options, $tab, $saved_options);
				break;
				case 'portfolio':
					echo flow_styling_generate_fields($styling_options, $tab, $saved_options);
				break;
				case 'footer':
				
				break;
				case 'info': ?>
					<div class="flow-styling-info">
						<p style="font-size: 15px; line-height: 150%;">This is <b>Styling Tool</b>. It will generate simple <abbr title="Cascading Style Sheets">CSS</abbr> styling rules and put them into the <code>&lt;head&gt;</code> section of your website into <code>wp_head();</code>.</p>
						<ul class="flow-styling-info-list">
							<li>It is obviously recommended and more efficient to use "Custom CSS Code" under [Daisho > General] to add custom CSS code...</li>
							<li>... or to put custom CSS directly in style.css and other style files...</li>
							<li>... or even better - use <a href="http://codex.wordpress.org/Child_Themes" target="_blank">Child Themes</a> to do any modifications...</li>
							<li>... but this tool is convenience utility that lists the most common and basic options that you may want to change. It generates only 1 database request, so it's fast and well optimized.</li>
							<li>If something is not on the list then it is probably not a general setting. You should rather consider <a href="http://support.forcg.com/bb-templates/kakumei-flow/help/daisho/index.html#customModifications" target="_blank">Custom Modifications guide</a> for more extensive changes.</li>
						</ul>
						<?php 
							$show_update_button = false;
							if(is_array($saved_options) && !empty($saved_options)){
								echo 'Styling Tool generated the following code based on your settings and will put that into the <code>&lt;head&gt;</code> section of your website:';
								echo '<pre><code>&lt;style type="text/css"&gt;';
								foreach($saved_options as $key => $value){
									$style_output .= "\n";
									$style_output .= $key . ' { ';
									if(array_key_exists('background-position-x', $value) || array_key_exists('background-position-y', $value)){
										$repeat_x = $value['background-position-x'];
										$repeat_y = $value['background-position-y'];
										if($repeat_x == ''){
											$repeat_x = '0';
										}
										if($repeat_y == ''){
											$repeat_y = '0';
										}
										$style_output .= "\n&#09;";
										$style_output .= 'background-position: ' . $repeat_x .' '. $repeat_y . '; ';
									}
									foreach($value as $key_1 => $value_1){
										if($key_1 == 'background-image'){
											$value_1 = 'url("'.$value_1.'")';
										}
										if($key_1 == 'background-position-x' || $key_1 == 'background-position-y'){
											
										}else{
											$style_output .= "\n&#09;";
											$style_output .= $key_1 . ': ' . $value_1 . '; ';
										}
									}
									$style_output .= "\n";
									$style_output .= '}';
									$style_output .= "\n";
								}
								echo $style_output;
								echo '&lt;/style&gt;</code></pre>';
							}
						?>
					</div>
				<?php break;
				case 'general':
					?>
						<tr valign="top">
							<th scope="row"><?php _e('Custom CSS Code', 'flowthemes'); ?></th>
							<td id="custom_css">
								<textarea id="custom_css_style" class="custom-css-field" rows="6" cols="50" name="<?php echo $data_field_name; ?>"><?php echo stripslashes( esc_textarea( $opt_val ) ); ?></textarea>
								<?php _e('Custom CSS code that will be printed after all other stylesheets. Child themes should be generally used instead of this field and instead of options on this page.', 'flowthemes'); ?>
							</td>
						</tr>
					<?php
					echo flow_styling_generate_fields($styling_options, $tab, $saved_options);
				break;
			}
			echo '</table>';
		}
		?>
		<?php if($show_update_button){ ?>
			<p class="submit" style="clear: both;">
				<input type="submit" name="Submit" class="button-primary" value="<?php esc_attr_e('Update Settings'); ?>" />
				<input type="hidden" name="flow_styling_nonce_security" value="Y" />
				<?php wp_nonce_field("flow_styling_nonce_security"); ?>
			</p>
		<?php } ?>
	</form>
</div> <!-- /.wrap -->
<?php
}

	function add_bg_changerstyle(){
		$saved_options = get_option("flow_styling");
		if(is_array($saved_options) && !empty($saved_options)){
			echo '<style type="text/css">';
			foreach($saved_options as $key => $value){
				$style_output .= ' ' . $key . ' { ';
				if(array_key_exists('background-position-x', $value) || array_key_exists('background-position-y', $value)){
					$repeat_x = $value['background-position-x'];
					$repeat_y = $value['background-position-y'];
					if($repeat_x == ''){
						$repeat_x = '0';
					}
					if($repeat_y == ''){
						$repeat_y = '0';
					}
					$style_output .= 'background-position: ' . $repeat_x .' '. $repeat_y . '; ';
				}
				foreach($value as $key_1 => $value_1){
					if($key_1 == 'background-image'){
						$value_1 = 'url("'.$value_1.'")';
					}
					if($key_1 == 'background-position-x' || $key_1 == 'background-position-y'){
						
					}else{
						$style_output .= $key_1 . ': ' . $value_1 . '; ';
					}
				}
				$style_output .= '}';
			}
			echo $style_output;
			echo '</style>';
		}
	}
	add_action( 'wp_head', 'add_bg_changerstyle' );
	
	/*
	 * 1. Prints background CSS for pages.
	 * 2. Prints "Custom CSS Code".
	 */
	function flow_add_custom_css(){
		global $wp_query;
		
		/* if ( is_singular() ) {
			$id = $wp_query->queried_object_id;
			$page_image = get_post_meta($id, 'bg_image', true);
			$page_color = get_post_meta($id, 'bg_color', true);
			$page_repeat = get_post_meta($id, 'bg_repeat', true);
			$page_position = get_post_meta($id, 'bg_position', true);
			$page_attachment = get_post_meta($id, 'bg_attachment', true);
			$page_size = get_post_meta($id, 'bg_size', true);
			if($page_image){ $style_output = 'background-image: url("'.$page_image.'"); '; }
			if($page_color){ $style_output .= 'background-color: '.$page_color.'; '; }
			if($page_repeat){ $style_output .= 'background-repeat: '.$page_repeat.'; '; }
			if($page_position){ $style_output .= 'background-position: '.$page_position.'; '; }
			if($page_attachment){ $style_output .= 'background-attachment: '.$page_attachment.'; '; }
			if($page_size){ $style_output .= 'background-size: '.$page_size.'; '; }
			if(!empty($style_output)){ print("<style type=\"text/css\">body{ ".$style_output." }</style>"); }
		} */
		$custom_css_style = get_option( 'custom_css_style' );
		if($custom_css_style){
			print("<style type=\"text/css\" id=\"custom-css\">".stripslashes($custom_css_style)."</style>");
		}
	}
	add_action( 'wp_head', 'flow_add_custom_css', 11 );
?>