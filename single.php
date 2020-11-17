<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package mindegave
 */

get_header(); ?>
    <div id="primary" class="content-area">
        <main id="main" class="site-main">
            <?php while(have_posts()) : the_post(); ?>
                <section class="single-top lightgray-bg">
                    <div class="grid-container">
                        <div class="grid-x grid-margin-x align-middle">
                            <div class="cell small-12 medium-6 grid-x">
                            <?php 
                                $title = get_field("ins_title"); 
                                $desc = get_field("ins_desc");
                                $name = get_field("ins_name"); 
                                $donation_goal = get_field("ins_goal");
                                $total_donations = get_field("ins_total_donations");
                                $image = get_field("ins_images");
                                $born = get_field("ins_born");
                                $dead = get_field("ins_dead");
                            ?>
                                <h1 class="small-12"><?php echo $title; ?></h1>
                                <h3 class="small-12">Til minde om <?php echo $name; ?></h3>
                                <p class="small-12"><?php echo $desc; ?></p>
                                <div class="cell small-12 donation-progress-wrapper">
                                    <div class="donation-progress" style="width:<?php echo $total_donations / $donation_goal * 100 ?>%;"></div>
                                </div>
                                <div class="cell small-4 total-donations"><p>kr. <?php echo number_format($total_donations, 0, ",", "."); ?>,-</p></div>
                                <div class="cell small-4 end-date-preview text-center "><p></p></div>
                                <div class="cell small-4 collection-goal text-right"><p>kr. <?php echo number_format($donation_goal, 0, ",", "."); ?>,-</p></div>
                                <a href="#" class="button">Støt indsamlingen her</a>
                            </div>
                            <div class="cell small-12 medium-6 grid-x">
                            <?php if($born) :  ?>
                                <p class="cell small-6">Født: <?php echo $born; ?></p>
                            <?php endif; ?>
                            <?php if($dead) : ?>
                                <p class="cell small-6 text-right">Død: <?php echo $dead; ?></p>
                            <?php endif; ?>
                                <img src="<?php echo esc_url( $image['sizes']['large'] ); ?>" class="indsamling-img" alt="<?php echo esc_attr( $image['alt'] ); ?>" />
                            </div>
                        </div>
                    </div>
                </section>
                <section class="single-donations white-bg">
                    <div class="grid-container">
                        <h2>Donationer</h2>
                        <div class="grid-x grid-margin-x grid-margin-y">
                            <div class="cell small-12 medium-6 large-4 grid-x lightgray-bg donation-box">
                                <h4 class="small-8">Hans Hansen</h4>
                                <h4 class="small-4 text-right donation-amount">kr. 600,-</h4>
                                <p class="small-12">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quasi, modi, rerum reiciendis assumenda placeat, laboriosam minus eligendi optio omnis voluptatem ex eos quos laudantium esse odio in similique? Illo, corporis!</p>
                            </div>
                            <div class="cell small-12 medium-6 large-4 grid-x lightgray-bg donation-box">
                                <h4 class="small-8">Hans Hansen</h4>
                                <h4 class="small-4 text-right donation-amount">kr. 600,-</h4>
                                <p class="small-12">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quasi, modi, rerum reiciendis assumenda placeat, laboriosam minus eligendi optio omnis voluptatem ex eos quos laudantium esse odio in similique? Illo, corporis!</p>
                            </div>
                            <div class="cell small-12 medium-6 large-4 grid-x lightgray-bg donation-box">
                                <h4 class="small-8">Hans Hansen</h4>
                                <h4 class="small-4 text-right donation-amount">kr. 600,-</h4>
                                <p class="small-12">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quasi, modi, rerum reiciendis assumenda placeat, laboriosam minus eligendi optio omnis voluptatem ex eos quos laudantium esse odio in similique? Illo, corporis!</p>
                            </div>
                        </div>
                    </div>
                </section>
            <?php endwhile; ?>
        </main><!-- #main -->
    </div><!-- #primary -->
<?php get_footer();