<? get_header(); ?>

<h1 class="richtext">Frontpage Template</h1>

<section class="richtext">
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
</section>

<?= module('example')->attrib('class', 'richtext') ?>

<? get_sidebar(); ?>

<? get_footer(); ?>
