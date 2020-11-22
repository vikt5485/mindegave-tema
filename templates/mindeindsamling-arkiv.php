<?php
/**
* Template Name: Arkivside for mindeindsamlinger
*
 * @package mindegave
 */
get_header(); ?>
 <div id="primary" class="content-area">
        <main id="main" class="site-main">
            <?php get_template_part('template-parts/hero', 'banner'); ?>
            <section class="indsamling-archive white-bg">
                <div class="grid-container grid-x align-right">
                    <form class="small-12 medium-6 large-4" method="post" data-search-collection id="search-collection">
                        <input type="hidden" name="action" value="search_collection">
                        <input type="search" name="search_input" id="search_input" placeholder="Søg på navn eller indsamlingens titel">
                        <button type="submit" class="button submit-btn"><div class="search-icon">Søg</div><div class='search-loader'></div></button>
                    </form>
                    <div class="small-12 grid-x grid-margin-x grid-margin-y collections-wrapper">
                        <?php
                            $args = array(
                                'post_type' => 'indsamlinger',
                                'post_status' => 'publish',
                                'posts_per_page' => -1,
                                'orderby' => 'date',
                                'order' => 'DESC'
                            );
                            $loop = new WP_Query( $args ); 
                        ?>

                        <?php if( $loop->have_posts() ) : ?>   
                            <?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
                                <?php get_template_part('template-parts/archive-post'); ?>
                            <?php endwhile;
                            wp_reset_postdata(); 
                        endif; ?>
                    </div>
                </div> 
            </section>
        </main><!-- #main -->
    </div><!-- #primary -->
<?php get_footer();

