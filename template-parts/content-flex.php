<?php if ( have_rows( 'content' ) ) : ?>
	<div class="flex-wrapper">
		<?php while ( have_rows( 'content' ) ) : the_row(); ?>
			<section class="flex-block <?php echo get_row_layout(); ?>">
				<?php get_template_part('template-parts/blocks/block', get_row_layout()); ?>
			</section>
		<?php endwhile; ?>
	</div>
<?php endif; ?>