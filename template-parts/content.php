<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package mindegave
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <section>
        <div class="grid-container">
            <div class="grid-x grid-margin-x">
                <div class="cell small-12 medium-8 large-8">
                    <?php the_title('<h1 class="entry-title">', '</h1>'); ?>
                    <?php the_content(); ?>
                </div>
                <div class="cell small-12 medium-4 large-3 large-offset-1">
                    <?php get_sidebar(); ?>
                </div>
            </div>
        </div>
    </section>
</article><!-- #post-<?php the_ID(); ?> -->