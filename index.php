<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 */
get_header(); ?>
	<div id="primary" class="content-area">
		<main id="main" class="site-main">
			<section>
				<div class="grid-container">
					<div class="grid-x grid-margin-x">
					<?php if( have_posts() ) : ?>
                        <?php while(have_posts()) : the_post(); ?>
                            <div class="cell small-6 medium-4 large-3">
                                <?php get_template_part('template-parts/postformat/content', get_post_format()); ?>
                            </div>
                        <?php endwhile; ?>
                    	</div>
                    <?php endif; ?>
				</div>
			</section>
			
		</main><!-- #main -->
	</div><!-- #primary -->
<?php get_footer();
