<?php get_header(); ?>

	<?php render_mustache( 'templates/gist-import' ); ?>

	<?php if ( have_posts() ) : ?>

	<?php while ( have_posts() ) : the_post(); ?>

	<?php endwhile; ?>

	<?php endif; ?>


<?php get_footer(); ?>
