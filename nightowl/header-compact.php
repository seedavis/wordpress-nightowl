<?php
$portfolio_page = get_option( 'flow_portfolio_page' );
$back_link_class = 'back-link-external';
$back_link = home_url( '/' );

if ( is_singular( 'post' ) && get_option( 'page_for_posts' ) ) {
	$blog_page = get_option( 'page_for_posts' );
	$back_link = get_permalink( $blog_page );
}

if ( is_singular( 'portfolio' ) && ( $portfolio_back_button = get_post_meta( $post->ID, 'portfolio_back_button', true ) ) && $portfolio_back_button != 'none' ) {
	$back_link = get_permalink( $portfolio_back_button );
	if ( ! in_array( strtolower( get_post_meta( $portfolio_back_button, '_wp_page_template', true ) ), array( 'template-portfolio.php' ) ) ) {
		$back_link_class = 'back-link-external';
	}
} else if ( is_singular( 'portfolio' ) && ! empty( $portfolio_page ) ) {
	$back_link = get_permalink( $portfolio_page );
}

if ( is_page_template( 'template-portfolio.php' ) ) {
	$back_link_class = '';
}
?>
