		</div><!-- #main -->

		<footer id="colophon" class="site-footer" role="contentinfo">

			<?php get_sidebar( 'footer' ); ?>

			<div class="site-info">
				<a href="<?php echo esc_url( __( 'http://wordpress.org/', 'wpgists' ) ); ?>"><?php printf( __( 'Proudly powered by %s', 'wpgists' ), 'WordPress' ); ?></a>
			</div><!-- .site-info -->
		</footer><!-- #colophon -->
	</div><!-- #page -->

	<?php wp_footer(); ?>
</body>
</html>