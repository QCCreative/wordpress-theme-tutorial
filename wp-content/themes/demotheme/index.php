<?php 
get_header();
?>

<div class="main-content">
<?php
if ( have_posts() ) :
	while ( have_posts() ) : the_post();
		get_template_part( 'content' );
	endwhile;
endif;
?>
</div>

<div class="sidebar-content">
<?php get_sidebar(); ?>
</div>

<?php
get_footer();