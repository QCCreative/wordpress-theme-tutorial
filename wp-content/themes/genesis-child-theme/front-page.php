<?php
/* Front Page */

function gce_homepage_banner() {
	$banner_image         = get_field('banner_image');
	$banner_headline      = get_field('banner_headline');
	$banner_text          = get_field('banner_text');
	$banner_button_text   = get_field('banner_button_text');
	$banner_url           = get_field('banner_url');
	
	$banner_url   = ( preg_match( '/https?:\/\//', $banner_url ) ) ? $banner_url : 'http://' . $banner_url;
	$banner_image = $banner_image['url'];

	$style = "";
	$style = ( ! empty( $banner_image ) ) ? "background-image: url('$banner_image')" : '';
	?>
	<div class="gce-banner-container">
		<div class="wrap">
			<div class="gce-banner" style="<?php echo $style; ?>">
				<div class="gce-banner_content">
					<h1 class="gce-banner_headline"><?php echo $banner_headline; ?></h1>
					<div class="gce-banner_text"><?php echo $banner_text; ?></div>
					<a class="gce-banner_button" href="<?php echo $banner_url; ?>"><?php echo $banner_button_text; ?></a>
				</div>
			</div>
		</div>
	</div>
	<?php

	remove_action( 'genesis_entry_header', 'genesis_do_post_title' );
}
add_action('genesis_after_header', 'gce_homepage_banner');

function gce_callouts() {
	$callouts = get_field( 'callouts' );
	?>

	<div class="gce-callouts">
		<?php foreach($callouts as $callout) {
		$callout_link = ( empty( $callout['link'] ) ) ? $callout['page_link'] : $callout['link'];
		$callout_link = ( preg_match( '/https?:\/\//', $callout_link ) ) ? $callout_link : 'http://' . $callout_link;
		?>
		<div class="gce-callout">
			<?php if( ! empty( $callout['thumbnail'] ) ) {
				echo '<img class="gce-thumb" src="' . $callout['thumbnail']['sizes']['medium'] . '" alt="' . $callout['thumbnail']['alt'] . '">';
			} else if ( ! empty( $callout['icon'] ) ) { ?>
			<div class="gce-icon-container">
				<i class="fa fa-<?php echo $callout['icon']; ?> fa-2x"></i>
			</div>
			<?php } ?>
			<h3><a href="<?php echo $callout_link; ?>"><?php echo $callout['headline']; ?></a></h3>
			<?php echo $callout['text']; ?>
		</div>
		<?php } ?>	
	</div>
	<?php
}
add_action('genesis_before_content', 'gce_callouts' );

genesis();