<?php if ( have_rows( 'content' ) ) : ?>
	<div class="flex-wrapper">
		<?php while ( have_rows( 'content' ) ) : the_row(); ?>
		<?php 
			$background_color = get_sub_field("background_color") ? get_sub_field("background_color") . "-bg" : "white-bg";
		
		?>
			<section class="flex-block <?php echo get_row_layout(); ?> <?php echo $background_color; ?>">
				<?php get_template_part('template-parts/blocks/block', get_row_layout()); ?>
			</section>
		<?php endwhile; ?>
	</div>
<?php endif; ?>