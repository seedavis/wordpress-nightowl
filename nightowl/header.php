<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
		
	<title><?php wp_title( '-', true, 'right' ); ?></title>
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<!--[if lt IE 9]>
		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js" type="text/javascript"></script>
	<![endif]-->
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<header id="header" class="site-header" role="banner">
		<div class="site-header-inner">
            <ul id="main-box">
				<li class="logo"><a class="logo" href="http://onedollargraphics.com/" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home">One Dollar Graphics</a></li>
				<li><a class="menu selected" href="#popular">popular</a></li>
				<li><a class="menu" href="#everyone">everyone</a></li>
				<li><a class="menu" href="#debuts">debuts</a> </li>
			</ul>

		<section id="options" class="clearfix">
		<ul id="etc" class="clearfix">
			<li id="toggle-sizes">
				<a href="#toggle-sizes" class="toggle-selected">
					<svg version="1.1" class="toggle-sizes-large-svg" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="28px" height="18px" viewBox="0 0 28 18" enable-background="new 0 0 28 18" xml:space="preserve">
						<g>
							<path fill-rule="evenodd" clip-rule="evenodd" fill="none" d="M2,0h14c1.105,0,2,0.895,2,2V16c0,1.104-0.895,2-2,2H2
								c-1.105,0-2-0.895-2-2V2C0,0.895,0.895,0,2,0z"/>
							<path fill-rule="evenodd" clip-rule="evenodd" fill="none" d="M22.001,0H26c1.105,0,2,0.895,2,2V6C28,7.104,27.105,8,26,8h-3.999
								C20.895,8,20,7.104,20,6V2C20,0.895,20.895,0,22.001,0z"/>
							<path fill-rule="evenodd" clip-rule="evenodd" fill="none" d="M22.001,10H26c1.105,0,2,0.895,2,1.999V16c0,1.104-0.895,2-2,2
								h-3.999C20.895,18,20,17.105,20,16V12C20,10.896,20.895,10,22.001,10z"/>
						</g>
					</svg>						
				</a>
				<a href="#toggle-sizes">
					<svg version="1.1" class="toggle-sizes-small-svg" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="28px" height="18px" viewBox="0 0 28 18" enable-background="new 0 0 28 18" xml:space="preserve">
						<g>
							<path fill-rule="evenodd" clip-rule="evenodd" fill="none" d="M2.001,0h4C7.104,0,8,0.895,8,2V6c0,1.104-0.896,2-1.999,2h-4
								C0.896,8,0,7.104,0,6V2C0,0.895,0.896,0,2.001,0z"/>
							<path fill-rule="evenodd" clip-rule="evenodd" fill="none" d="M12,0h4.001C17.105,0,18,0.895,18,2V6c0,1.104-0.895,2-1.998,2H12
								c-1.105,0-2-0.896-2-2V2C10,0.895,10.895,0,12,0z"/>
							<path fill-rule="evenodd" clip-rule="evenodd" fill="none" d="M22.001,0h4C27.104,0,28,0.895,28,2V6c0,1.104-0.896,2-1.999,2h-4
								C20.896,8,20,7.104,20,6V2C20,0.895,20.896,0,22.001,0z"/>
							<path fill-rule="evenodd" clip-rule="evenodd" fill="none" d="M2.001,10h4C7.104,10,8,10.895,8,12V16c0,1.104-0.896,2-1.999,2h-4
								C0.896,18,0,17.105,0,16V12C0,10.895,0.896,10,2.001,10z"/>
							<path fill-rule="evenodd" clip-rule="evenodd" fill="none" d="M12,10h4.001C17.105,10,18,10.895,18,12V16c0,1.104-0.895,2-1.998,2
								H12c-1.105,0-2-0.895-2-2V12C10,10.895,10.895,10,12,10z"/>
							<path fill-rule="evenodd" clip-rule="evenodd" fill="none" d="M22.001,10h4C27.104,10,28,10.895,28,12V16c0,1.104-0.896,2-1.999,2
								h-4C20.896,18,20,17.105,20,16V12C20,10.895,20.896,10,22.001,10z"/>
						</g>
					</svg>
				</a>
			</li>
			<?php if ( $shuffle_button ) { ?>
				<li id="shuffle"><a href='#shuffle'><?php _e( 'Shuffle', 'flowthemes' ); ?></a></li>
			<?php } ?>
		</ul>
	</section> <!-- #options -->
		</div>
	</header>
	
	<?php get_header( 'compact' ); ?>