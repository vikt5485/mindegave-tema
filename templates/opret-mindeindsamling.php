<?php
/**
* Template Name: Opret Mindeindsamling
*
 * @package mindegave
 */
get_header(); ?>
    <div id="primary" class="content-area">
        <main id="main" class="site-main">
            <?php get_template_part('template-parts/hero', 'banner'); ?>
            <section>
                <div class="grid-container opret-mindeindsamling-container">
                    <h2 class="collection-header">Info om Mindeindsamlingen</h2>
                    <p class="collection-text">Nedenstående info vil blive vist offentligt i forbindelse med din indsamling.</p>
                    <form method="post" data-create-collection id="opret-mindeindsamling-form" name="opret-mindeindsamling-form" enctype="multipart/form-data">
                        <input type="hidden" name="action" value="create_collection">
                        <div class="step step-1 step-active show-step grid-x grid-margin-x">
                            <div class="cell small-12 medium-6">
                                <label for="ins_title">Indsamlingens navn
                                    <input type="text" name="ins_title" id="ins_title" placeholder="Indsamlingens navn" required>
                                </label>
                                <label for="ins_desc">Hvorfor samler du ind til Kræftens Bekæmpelse?
                                    <textarea rows="4" name="ins_desc" id="ins_desc" placeholder="Skriv et par linjer, om hvorfor du samler ind til Kræftens Bekæmpelse" required></textarea>
                                </label>
                            </div>
                            <div class="cell small-12 medium-6">
                                <label for="ins_name">Til minde om
                                    <input type="text" name="ins_name" id="ins_name" placeholder="Til minde om" required>
                                </label>
                                <div class="grid-x grid-margin-x">
                                    <label class="cell small-6" for="ins_born">Født
                                        <input type="date" name="ins_born" id="ins_born" placeholder="Født"></input>
                                    </label>
                                    <label class="cell small-6" for="ins_dead">Død
                                        <input type="date" name="ins_dead" id="ins_dead" placeholder="Død"></input>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="step step-2 grid-x grid-margin-x remove-step">
                            <div class="cell small-12 medium-4">
                                <label for="ins_goal">Indsamlingens mål i kr.
                                    <input type="number" name="ins_goal" id="ins_goal" placeholder="Indsamlingens mål i kr." required>
                                </label>
                            </div>
                            <div class="cell small-12 medium-4">
                                <label for="ins_own_donation">Din egen donation
                                    <input type="number" name="ins_own_donation" id="ins_own_donation" placeholder="Din egen donation">
                                </label>
                            </div>
                            <div class="cell small-12 medium-4">
                                <label for="ins_end_date">Hvornår slutter din indsamling?
                                    <input type="date" name="ins_end_date" id="ins_end_date" required>
                                </label>
                            </div>
                            <div class="cell small-6"><p>Start</p></div>
                            <div class="cell small-6 text-right"><p>Mål</p></div>
                            <div class="cell small-12 donation-progress-wrapper">
                                <div class="donation-progress"></div>
                            </div>
                            <div class="cell small-4 own-donation-preview "><p>kr. 0,-</p></div>
                            <div class="cell small-4 end-date-preview text-center "><p></p></div>
                            <div class="cell small-4 ins-goal-preview text-right"><p>kr. 0,-</p></div>
                        </div>
                        <div class="step step-3 grid-x grid-margin-x remove-step">
                            <div class="cell small-12 medium-6">
                                <label for="ins_greeting">Personlig hilsen til donorer
                                    <textarea rows="4" name="ins_greeting" id="ins_greeting" placeholder="Skriv en hilsen, til dem der donerer til din indsamling"></textarea>
                                </label>
                                <label for="ins_images">Sæt et (eller flere) billede på indsamlingen
                                   <input type="file" name="ins_images" id="ins_images">
                                </label>
                            </div>
                            <div class="cell small-12 medium-6 grid-x ">
                                <!-- <label for="image_1" class="grid-x align-center cell small-6">
                                    <?php
                                    $image_1 = get_field( 'image_1' );
                                    if ( $image_1 ) : ?>
                                        <?php echo wp_get_attachment_image( $image_1, 'medium' ); ?>
                                        <input type="radio" name="image_option" id="image_1" value="<?php echo $image_1; ?>">
                                    <?php endif; ?>
                                </label>
                                <label for="image_2" class="grid-x align-center cell small-6">
                                    <?php
                                    $image_2 = get_field( 'image_2' );
                                    if ( $image_2 ) : ?>
                                        <?php echo wp_get_attachment_image( $image_2, 'medium' ); ?>
                                    <?php endif; ?>
                                    <input type="radio" name="image_option" id="image_2" value="<?php echo $image_2; ?>">
                                </label>
                                <label for="image_3" class="grid-x align-center cell small-6">
                                    <?php
                                    $image_3 = get_field( 'image_3' );
                                    if ( $image_3 ) : ?>
                                        <?php echo wp_get_attachment_image( $image_3, 'medium' ); ?>
                                    <?php endif; ?>
                                    <input type="radio" name="image_option" id="image_3" value="<?php echo $image_3; ?>">
                                </label> -->
                               


                                <label for="">Valgt billede:</label>
                               <img class="ins-images-preview" src="" alt="">
                            </div>
                        </div>
                        <div class="step step-4 grid-x grid-margin-x align-middle remove-step">
                            <div class="cell small-12 medium-6">
                                <img class="ins-images-preview" src="" alt="">
                            </div>
                            <div class="cell small-12 medium-6 grid-x">
                               <h2 class="cell small-12 preview-title">Vælg venligst en titel på indsamlingen</h2>
                               <p class="cell small-12 preview-name light-large"></p>
                                <p class="cell small-12 preview-desc">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quaerat eligendi ab consequatur corporis! Distinctio facere aperiam illo neque ea? Officiis deleniti laboriosam quisquam perferendis. Est eligendi veritatis quia at repellendus?</p>
                                <div class="cell small-6"><p>Start</p></div>
                                <div class="cell small-6 text-right"><p>Mål</p></div>
                                <div class="cell small-12 donation-progress-wrapper">
                                    <div class="donation-progress"></div>
                                </div>
                                <div class="cell small-4 own-donation-preview "><p>kr. 0,-</p></div>
                                <div class="cell small-4 end-date-preview text-center "><p></p></div>
                                <div class="cell small-4 ins-goal-preview text-right"><p>kr. 0,-</p></div>
                            </div>
                        </div>

                        <div class="thank-you-step align-center grid-x text-center remove-step">
                            <h2 class="small-12">Tak! Din mindeindsamling er nu oprettet.</h2>
                            <a href="" class="collection-link">Klik her for at gå direkte til indsamlingen.</a>
                        </div>

                        <div class="form-loader">
                            <div class="loader"></div>
                        </div>

                        <div class="grid-x align-justify button-container">
                            <a class="button hide-btn hollow prev">Tilbage</a>
                            <a class="button next">Videre</a>
                            <button type="submit" class="button remove-btn submit-btn">Opret</button>
                        </div>
                        <div class="error-container">

                        </div> 
                    </form>

                    <div class="dots">
                        <div class="dot dot-1 dot-filled">1</div>
                        <div class="dot dot-2">2<div class="dot-divider"></div></div>
                        <div class="dot dot-3 ">3<div class="dot-divider"></div></div>
                        <div class="dot dot-4">4<div class="dot-divider"></div>
                    </div>
                </div>
            </section>
        </main><!-- #main -->
    </div><!-- #primary -->
<?php get_footer();
