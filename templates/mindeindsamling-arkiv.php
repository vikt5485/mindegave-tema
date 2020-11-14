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
                <div class="grid-container">
                    <div class="grid-x grid-margin-x grid-margin-y">
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
                                <?php 
                                    global $post;
                                    $image = get_field("ins_images");
                                    $for_who = get_field("ins_for_who");
                                    $total_donations = get_field("ins_total_donations");
                                    $donation_goal = get_field("ins_goal");
                                ?>
                                <div class="cell small-12 medium-6 large-4">
                                    <a href="<?php echo get_permalink( $post->ID ); ?>">
                                        <img src="<?php echo esc_url( $image['sizes']['thumbnail'] ); ?>" class="indsamling-img" alt="<?php echo esc_attr( $image['alt'] ); ?>" />
                                        <h2><?php echo the_title(); ?></h2>
                                        <p>Til minde om <?php echo $for_who; ?></p>
                                        <div class="donation-progress-wrapper archive-donation-wrapper">
                                            <div class="donation-progress" style="width:<?php echo $total_donations / $donation_goal * 100 ?>%;"></div>
                                        </div>
                                        <div class="total-donated"><p>kr. <?php echo $total_donations; ?>,- indsamlet</p></div>
                                    </a>
                                </div>
                            <?php endwhile;
                            wp_reset_postdata(); 
                        endif; ?>
                    </div>
                </div>
            </section>
        </main><!-- #main -->
    </div><!-- #primary -->
<?php get_footer();

