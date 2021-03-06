<?php
/**
* Template Name: Opret Mindeindsamling
*
 * @package mindegave
 */
get_header(); ?>
    <div id="primary" class="content-area">
        <main id="main" class="site-main">
            <?php 
                $today = date('Y-m-d');

                $datetime_tomorrow = new DateTime('tomorrow');
                $tomorrow = $datetime_tomorrow->format('Y-m-d');
            ?>
            <section>
                <div class="grid-container opret-mindeindsamling-container">
                    <h2 class="collection-header small-h1">Opret en indsamling</h2>
                    <p class="collection-text">Nedenstående info vil blive vist offentligt i forbindelse med din indsamling.</p>
                    <form method="post" class="margin-top-small" data-create-collection id="opret-mindeindsamling-form" name="opret-mindeindsamling-form" enctype="multipart/form-data">
                        <input type="hidden" name="action" value="create_collection">
                        <div class="step step-1 step-active show-step grid-x grid-margin-x">
                            <h4 class="small-12 cell">Hvem er indsamlingen til minde om?</h4>
                            <div class="cell small-12 medium-6"> 
                                <label for="ins_name" class="required">Til minde om</label>
                                <input type="text" name="ins_name" id="ins_name" placeholder="Til minde om" required>
                                
                                <div class="grid-x grid-margin-x">
                                    <div class="cell small-6">
                                        <label for="ins_born">Fødedato (valgfri)</label>
                                        <input type="date" name="ins_born" id="ins_born" max="<?php echo $today; ?>" placeholder="Født"></input>
                                    </div>
                                    <div class="cell small-6">
                                        <label class="cell small-6" for="ins_dead">Dødsdato (valgfri)</label>
                                        <input type="date" name="ins_dead" id="ins_dead" max="<?php echo $today; ?>" placeholder="Død"></input>                                    
                                    </div>

                                </div>
                            </div>
                            <div class="cell small-12 medium-6">
                                <label for="ins_desc" class="required">Hvorfor samler du ind til Kræftens Bekæmpelse?</label>
                                <textarea rows="4" name="ins_desc" id="ins_desc" placeholder="Skriv et par linjer, om hvorfor du samler ind til Kræftens Bekæmpelse" required></textarea>
                            </div>
                        </div>
                        <div class="step step-2 grid-x grid-margin-x remove-step">
                            <h4 class="small-12 cell">Hvad er målet for indsamlingen?</h4>
                            <div class="cell small-12 medium-4">
                                <label for="ins_goal" class="required">Indsamlingens mål i kr.</label>
                                <input type="number" name="ins_goal" id="ins_goal" placeholder="Indsamlingens mål i kr." required>
                            </div>
                            <div class="cell small-12 medium-4">
                                <label for="ins_own_donation">Din egen donation (min. kr. 50,-) (valgfri)</label>
                                <input type="number" name="ins_own_donation" id="ins_own_donation" min="50" placeholder="Din egen donation">
                            </div>
                            <div class="cell small-12 medium-4">
                                <label for="ins_end_date" class="required">Hvornår slutter din indsamling?</label>
                                <input type="date" name="ins_end_date" id="ins_end_date" min="<?php echo $tomorrow; ?>" required>
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
                            <h4 class="small-12 cell">Personliggør indsamlingen</h4>
                            <div class="cell small-12 medium-6">
                                <label for="ins_greeting">Personlig hilsen til donorer (valgfri)</label>
                                <textarea rows="4" name="ins_greeting" id="ins_greeting" placeholder="Skriv en hilsen, til dem der donerer til din indsamling"></textarea>
                                <label for="ins_images">Vælg dit eget billede til indsamlingen (valgfri)</label>
                                <input type="file" name="ins_images" size="1" id="ins_images">
                            </div>
                            <div class="cell small-12 medium-6">                        
                                <label class="small-12" for="">Valgt billede:</label>
                                <?php
                                $default_image = get_field( 'default_image' );
                                if ( $default_image ) : ?>
                                    <img class="ins-images-preview" src="<?php echo esc_url( $default_image['url'] ); ?>" alt="<?php echo esc_attr( $default_image['alt'] ); ?>">
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="step step-4 grid-x grid-margin-x align-middle remove-step">
                            <h4 class="small-12 cell">Forhåndsvisning af indsamlingen</h4>
                            <div class="cell small-12 medium-6">
                                <?php
                                $default_image = get_field( 'default_image' );
                                if ( $default_image ) : ?>
                                    <img class="ins-images-preview" src="<?php echo esc_url( $default_image['url'] ); ?>" alt="<?php echo esc_attr( $default_image['alt'] ); ?>">
                                <?php endif; ?>
                            </div>
                            <div class="cell small-12 medium-6 grid-x">
                               <p class="cell small-12 small">Til minde om</p>
                               <h2 class="cell small-12 preview-name"></h2>
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

                        <div class="step step-5 grid-x grid-margin-x remove-step">
                            <h4 class="small-12 cell">Personlige oplysninger</h4>
                            <div class="cell small-12 medium-6">
                                <label for="personal_first_name" class="required">Fornavn</label>
                                <input type="text" name="personal_first_name" id="personal_first_name" placeholder="Fornavn" required>
                                <label for="personal_last_name" class="required">Efternavn</label>
                                <input type="text" name="personal_last_name" id="personal_last_name" placeholder="Efternavn" required>
                                <label for="personal_email" class="required">E-mail</label>
                                <input type="email" name="personal_email" id="personal_email" placeholder="E-mail" required>
                            </div>
                            <div class="cell small-12 medium-6">
                                <label for="personal_phone" class="required">Telefonnr.</label>
                                <input type="tel" name="personal_phone" id="personal_phone" placeholder="Telefonnr." required>
                                <label for="personal_address" class="required">Adresse</label>
                                <input type="text" name="personal_address" id="personal_address" placeholder="Adresse" required>
                                <div class="grid-x grid-margin-x">
                                    <div class="cell small-4">
                                        <label for="personal_zip" class="required">Postnr.</label>
                                        <input type="number" name="personal_zip" id="personal_zip" placeholder="Postnr." required>
                                    </div>
                                    <div class="cell small-8">
                                        <label for="personal_city" class="required">By</label>
                                        <input type="text" name="personal_city" id="personal_city" placeholder="By" required>
                                    </div>
                                    <label for="personal_consent" class="required">
                                        <input type="checkbox" name="personal_consent" id="personal_consent" required>
                                        Jeg accepterer <a href="#">vilkår og betingelser</a> samt Kræftens Bekæmpelses <a href="#">privatlivspolitik</a>.
                                    </label>
                                </div>
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
                            <a class="button next small-order-3">Videre</a>
                            <button type="submit" class="button medium-order-3 remove-btn submit-btn">Opret</button>
                        </div>
                        <div class="error-container">

                        </div> 
                    </form>

                    <div class="dots grid-x align-center">
                        <div class="dot dot-1 dot-filled">1</div>
                        <div class="dot dot-2">2<div class="dot-divider"></div></div>
                        <div class="dot dot-3">3<div class="dot-divider"></div></div>
                        <div class="dot dot-4">4<div class="dot-divider"></div></div>
                        <div class="dot dot-5">5<div class="dot-divider"></div></div>
                    </div> 
                </div>
            </section>
        </main><!-- #main -->
    </div><!-- #primary -->
<?php get_footer();
