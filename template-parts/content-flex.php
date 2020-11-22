<?php if ( have_rows( 'content' ) ) : ?>
	<div class="flex-wrapper">
		<?php while ( have_rows( 'content' ) ) : the_row(); ?>
		<?php 
			$background_color = get_sub_field("background_color") ? get_sub_field("background_color") . "-bg" : "white-bg";
			$fit = get_sub_field("fit");
		?>
			<section class="flex-block <?php echo get_row_layout(); ?> <?php echo $background_color; ?> <?php echo $fit == "full_width" ? "section-no-padding" : ""; ?>">
				<?php get_template_part('template-parts/blocks/block', get_row_layout()); ?>
			</section>
		<?php endwhile; ?>
	</div>
<?php endif; ?>