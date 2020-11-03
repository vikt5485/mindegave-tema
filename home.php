<?php
/**
 * Home page for posts
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package mindegave
 */
get_header(); ?>
	<div id="primary" class="content-area">
		<main id="main" class="site-main">
			<section>
				<div class="grid-container">
					<?php the_archive_title('<h1 class="entry-title">', '</h1>'); ?>
					<posts-component endpoint="posts"></posts-component>
				</div>
			</section>
			
		</main><!-- #main -->
	</div><!-- #primary -->
<?php get_footer();
