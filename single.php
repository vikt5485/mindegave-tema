<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package mindegave
 */
global $post;
get_header(); ?>

    <div id="primary" class="content-area">
        <main id="main" class="site-main">
            <?php while(have_posts()) : the_post(); ?>
            <?php 
                // $title = get_field("ins_title"); 
                $desc = get_field("ins_desc");
                $name = get_field("ins_name"); 
                $donation_goal = get_field("ins_goal");
                $image = get_field("ins_images");
                $born = get_field("ins_born");
                $dead = get_field("ins_dead");
                $total_donated = 0;

                $end_date = get_field("ins_end_date");
                $end_date_unix = DateTime::createFromFormat('d/m/Y', $end_date)->getTimestamp();
                $today = time();
                $difference = $end_date_unix - $today;
            ?>
            <?php if ( have_rows( 'donations' ) ) : ?>
                <?php while ( have_rows( 'donations' ) ) : the_row(); ?>
                    <?php 
                        $total_donated = $total_donated + get_sub_field( 'amount' );
                    ?>
                <?php endwhile; ?>
            <?php endif; ?>
                <section class="single-top lightgray-bg">
                    <div class="grid-container">
                        <div class="grid-x grid-margin-x align-middle">
                            <div class="cell small-12 medium-5 grid-x small-order-2 medium-order-1">
                                <p class="small">Til minde om</p>
                                <h2 class="small-12"><?php echo $name; ?></h2>
                                <?php if($born && $dead) :  ?>
                                    <p class="cell small-12"><?php echo $born . ' - ' . $dead; ?></p>
                                <?php endif; ?>
                                <p class="small-12"><?php echo $desc; ?></p>
                                <div class="cell small-12 donation-progress-wrapper">
                                    <div class="donation-progress" style="width:<?php echo $total_donated / $donation_goal * 100 ?>%;"></div>
                                </div>
                                <div class="cell small-4 total-donations"><p><?php echo number_format($total_donated / $donation_goal * 100, 0, ",", "."); ?>%</p></div>
                                <div class="cell small-4 end-date-preview text-center "><p></p></div>
                                <div class="cell small-4 collection-goal text-right"><p>kr. <?php echo number_format($donation_goal, 0, ",", "."); ?>,-</p></div>
                                <?php if($difference > 0) : ?>
                                    <button class="button donate-btn">Støt indsamlingen her</button>
                                    <div class="cell small-12"><p><?php echo floor($difference/60/60/24)." dage tilbage."; ?></p></div>
                                <?php else: ?>
                                    <div class="cell small-12"><p>Indsamlingen er udløbet.</p></div>
                                <?php endif; ?>
                            </div>
                            <div class="cell small-12 medium-6 medium-offset-1 single-img-container grid-x align-center small-order-1 medium-order-2">
                                <img src="<?php echo esc_url( $image['sizes']['large'] ); ?>" class="indsamling-img" alt="<?php echo esc_attr( $image['alt'] ); ?>" />
                            </div>
                        </div>
                    </div>
                    <div class="scroll-indicator show-for-medium">
                        <?php include(locate_template( 'assets/img/scroll-arrow.svg' )); ?>
                    </div>
                    <div class="share-links grid-x grid-margin-x">
                        <div class="cell small-3 large-12 share-email">
                            <a title="Del via e-mail" href="mailto:?body=Link%20til%20indsamling:%20<?php echo the_permalink(); ?>&subject=Støt%20indsamlingen%20til%20til%20minde%20om%20<?php echo $name; ?>">
                              <i class="fas fa-envelope-square"></i>
                            </a>
                        </div>
                        <div class="cell small-3 large-12 share-facebook">
                            <a title="Del via Facebook" href="https://www.facebook.com/share.php?u=<?php echo the_permalink(); ?>" target="_blank">
                                <i class="fab fa-facebook-square"></i>
                            </a>
                        </div>
                        <div class="cell small-3 large-12 share-twitter">
                            <a title="Del via Twitter" href="https://www.twitter.com/share?url=<?php echo the_permalink(); ?>" target="_blank">
                                <i class="fab fa-twitter-square"></i>
                            </a>
                        </div>
                        <div class="cell small-3 large-12 share-linkedin">
                            <a title="Del via LinkedIn" href="https://www.linkedin.com/shareArticle?mini=true&url=<?php the_permalink(); ?>" target="_blank">
                                <i class="fab fa-linkedin"></i>
                            </a>
                        </div>
                    </div>
                </section>
                <?php if ( have_rows( 'donations' ) ) : ?>

                    <section class="single-donations white-bg">
                        <div class="grid-container">
                            <h2>Donationer</h2>
                            <div class="grid-x grid-margin-x grid-margin-y colcade-grid">
                                <?php while ( have_rows( 'donations' ) ) : the_row(); ?>
                                    <?php 
                                        $amount = get_sub_field( 'amount' );
                                        $donator_name = get_sub_field( 'name' );
                                        $message = get_sub_field( 'message' );
                                    ?>

                                    <div class="cell small-12 medium-6 large-4 grid-x lightgray-bg donation-box">
                                        <h4 class="small-8"><?php echo $donator_name; ?></h4>
                                        <h4 class="small-4 text-right donation-amount">kr. <?php echo number_format($amount, 0, ",", "."); ?>,-</h4>
                                        <p class="small-12"><?php echo $message; ?></p>
                                    </div>

                                <?php endwhile; ?>
                            </div>
                        </div>
                    </section>
                <?php endif; ?>

                <div class="donate-popup">
                    <div class="close-btn"><?php include(locate_template( 'assets/img/close-btn.svg' )); ?></div>
                    <div class="donate-content grid-container">
                        <form method="post" data-make-donation id="make-donation-form" name="make-donation-form">
                            <input type="hidden" name="action" value="make_donation">
                            <input type="hidden" name="post_id" id="post_id" value="<?php echo $post->ID; ?>">
                            <div class="donation-form-main">
                                <h3>Støt indsamlingen til minde om <?php echo $name; ?></h3>
                                <div class="grid-x grid-margin-x align-middle">
                                    <div class="cell small-8">
                                        <label for="donation_range">
                                            Brug slideren til at vælge din donation
                                            <input type="range" name="donation_range" id="donation_range" min="100" max="2000" step="50" value="100">
                                        </label>
                                        <label for="custom_donation">Eller skriv et valgfrit beløb                                
                                            <input type="number" name="custom_donation" min="50" id="custom_donation" placeholder="Skriv et valgfrit beløb">
                                        </label>
                                    </div>
                                    <div class="cell small-4 text-center">
                                        <h3 class="donation_preview">kr. 50,-</h3>
                                    </div>
                                </div>
                                <label for="personal_donation">
                                    <input type="radio" name="donation_type" id="personal_donation" value="personal_donation" checked="checked">
                                    Personlig donation
                                </label>
                                <label for="anonymous_donation">
                                    <input type="radio" name="donation_type" id="anonymous_donation" value="anonymous_donation">
                                    Anonym donation
                                </label>
                                <label for="donation_name">Dit navn
                                    <input type="text" name="donation_name" id="donation_name" placeholder="Dit navn" required>
                                </label>
                                <label for="donation_message">Besked på donation
                                    <textarea rows="4" name="donation_message" id="donation_message" placeholder="Besked på donation" required></textarea>
                                </label>
                                <button type="submit" class="button submit-btn">Donér</button>
                            </div>

                            <div class="form-thank-you remove-step">
                                <h2>Tak for din donation</h2>
                                <?php if(get_field("ins_greeting")) : ?>
                                    <strong>Hilsen fra indsamler:</strong>
                                    <p><?php echo get_field("ins_greeting"); ?></p>
                                <?php endif; ?>
                                <p>Genindlæs siden, for at se din donation.</p>
                            </div>

                            <div class="form-loader">
                                <div class="loader"></div>
                            </div>
                        </form>
                    </div>
                </div>
            <?php endwhile; ?>
        </main><!-- #main -->
    </div><!-- #primary -->
<?php get_footer();