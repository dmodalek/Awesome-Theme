<? get_header(); ?>

<?php
	// Start the Loop.
	while ( have_posts() ) : the_post(); ?>

	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<?php
			the_title( '<header class="entry-header"><h2 class="entry-title">', '</h2></header><!-- .entry-header -->' );
		?>

		<div class="entry-content">
			<?php
				the_content();
			?>
		</div>
	</article>
<?
	endwhile;
?>

<? get_sidebar(); ?>

<? get_footer(); ?>
