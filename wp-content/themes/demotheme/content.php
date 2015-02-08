<?php
/**
 * The default template for displaying content
 *
 * Used for both single and index/archive/search.
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php the_post_thumbnail(); ?>
	<header class="entry-header">
		<?php
			if ( is_single() ) :
				the_title( '<h1 class="entry-title">', '</h1>' );
			else :
				the_title( '<h2 class="entry-title"><a href=" ' . esc_url( get_permalink() ) '" rel="bookmark">', '</a></h2>' );
			endif;
		?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php
			the_content();
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php edit_post_link( __( 'Edit', 'demotheme' ), '<span class="edit-link">', '</span>' ); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
