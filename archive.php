<?php
/**
 * The template for displaying archive pages
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
                    <div class="grid-x grid-margin-x">
                        <div class="cell page-intro">
                            <?php the_archive_title('<h1 class="page-title">', '</h1>');
                            the_archive_description('<p class="archive-description">', '</p>'); ?>
                        </div>
                        <?php if( have_posts() ) : ?>
                            <?php while(have_posts()) : the_post(); ?>
                                <div class="cell small-6 medium-4 large-3">
                                    <?php get_template_part('template-parts/postformat/content', get_post_format()); ?>
                                </div>
                            <?php endwhile;
                        endif; ?>
                    </div>
                </div>
            </section>
        </main><!-- #main -->
    </div><!-- #primary -->
<?php get_footer();