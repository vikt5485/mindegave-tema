<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package mindegave
 */

get_header(); ?>
    <div id="primary" class="content-area">
        <main id="main" class="site-main">
            <section class="error-404 not-found">
                <div class="content">
                    <div class="grid-container">
                        <div class="small-12 cell">
                            <h1>Siden findes ikke.</h1>
                            <a href="<?php echo get_home_url(); ?>">Gå til forsiden.</a>
                        </div>
                    </div>
                </div>
            </section><!-- .error-404 -->
        </main><!-- #main -->
    </div><!-- #primary -->
<?php get_footer();