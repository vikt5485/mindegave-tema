<?php
/**
* Template Name: Giv Mindegave
*
 * @package mindegave
 */
get_header(); ?>
<?php 
    $with_greeting_text = get_field("with_greeting_text");
    $without_greeting_text = get_field("without_greeting_text");
    
?>
    <div id="primary" class="content-area">
        <main id="main" class="site-main">
            <section>
                <div class="grid-container giv-mindegave">
                    <div class="grid-x grid-margin-x grid-margin-y intro-card">
                        <div class="cell small-12 medium-6 first-col">
                            <?php echo $with_greeting_text; ?>
                            <a  class="button" id="with-greeting">Giv en Mindegave med hilsen</a>
                        </div>
                        <div class="cell small-12 medium-6 second-col">
                            <?php echo $without_greeting_text; ?>
                            <a  class="button" id="without-greeting">Giv en Mindegave uden hilsen</a>
                        </div>
                    </div>
                    <div class="mindegave-with-container">
                        <div class="collection-header">
                            <h2>Mindegave med hilsen</h2>
                            <p>Giv en Mindegave med en personlig hilsen.</p>
                        </div>
                        <form method="post" data-create-mindegave-with id="giv-mindegave-form-with">
                            <input type="hidden" name="action" value="giv_mindegave">
                            <div class="step step-1 step-active show-step grid-x grid-margin-x grid-margin-y">
                                <h4 class="small-12 cell">Vælg motiv</h4>
                                <?php if ( have_rows( 'card_options' ) ) : ?>
                                    <?php while ( have_rows( 'card_options' ) ) :
                                        the_row(); ?>
                                        
                                        <?php
                                        $image = get_sub_field( 'image' );
                                        if ( $image ) : ?>
                                            <div class="cell small-6 medium-3"><img class="card-option" data-image-id="<?php echo $image['id']; ?>" src="<?php echo esc_url( $image['url'] ); ?>" alt="<?php echo esc_attr( $image['alt'] ); ?>" /></div>
                                        <?php endif; ?>

                                    <?php endwhile; ?>
                                <?php endif; ?>
                            </div>
                            <div class="step step-2 remove-step">
                                <div class="flip-card" style="display:none;">
                                    <div class="se-kort-btn"><?php include(locate_template( 'assets/img/se-kort-btn.svg' )); ?></div>
                                    <div class="ret-kort-btn" style="display:none;"><?php include(locate_template( 'assets/img/ret-kort-btn.svg' )); ?></div>
                                    <p>Se kort</p>
                                </div>

                                <div class="flip-card-inactive card-preview flip-card-toggle grid-x cell">
                                    <div class="small-12 large-6">
                                        <img class="selected-image" src="" alt="">
                                    </div>
                                    <div class="small-12 large-6 card-content grid-x align-center-middle">
                                        <div class="cell small-12 grid-x align-center-middle part">
                                            <h3>Mindegave | </h3>
                                            <img class="kb_logo" src="<?php echo get_template_directory_uri() . "/assets/img/kb_logo.png"; ?>" alt="kræftens bekæmpelse logo">
                                        </div>
                                        <div class="cell small-12 part">
                                            <p class="text-center small">Til minde om</p>
                                            <p class="big text-center name-preview">Kurt Kurtsen</p>
                                        </div>
                                        <div class="cell small-12 part">
                                            <p class="greeting-preview text-center"></p>
                                        </div>
                                        <div class="cell small-12 part">
                                            <p class="text-center small">Givere</p>
                                            <p class="medium text-center from-preview">Viktor Kjeldal, Jenny Sila</p>
                                        </div>
                                        <div class="cell small-12 part">
                                            <p class="text-center big donation-preview"></p>
                                            <p class="text-center small colledted-text"></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="flip-card-active grid-x grid-margin-x flip-card-toggle cell">
                                    <h4 class="small-12 cell">Vælg beløb og hilsen</h4>
                                    <div class="cell small-12 medium-6">
                                        <label for="mindegave_name" class="required">Til minde om</label>
                                        <input type="text" name="mindegave_name" id="mindegave_name" placeholder="Til minde om" required>
                                        <label for="mindegave_greeting" class="required">Hilsen</label>
                                        <textarea maxlength="150" rows="4" name="mindegave_greeting" id="mindegave_greeting" placeholder="Skriv din hilsen her" required></textarea>
                                    </div>
                                    <div class="cell small-12 medium-6">
                                        <label for="mindegave_from" class="required">Givere</label>
                                        <textarea maxlength="60" rows="2" name="mindegave_from" id="mindegave_from" placeholder="Her kan du skrive, hvem mindegaven er fra" required></textarea>
                                        <label for="mindegave_donation" class="required">Beløb (min. kr. 50,-)</label>
                                        <input type="number" name="mindegave_donation" id="mindegave_donation" min="50" placeholder="Donation i kr." required>
                                        
                                        <label for="mindegave_hide_donation" class="cell">
                                            <input type="checkbox" name="mindegave_hide_donation" id="mindegave_hide_donation">
                                            Jeg ønsker ikke, at donationsbeløbet fremgår af mindekortet (valgfri).
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="step step-3 remove-step grid-x grid-margin-x">
                                <h4 class="small-12 cell">Dine personlige informationer</h4>
                                <div class="cell small-12 medium-6">
                                    <label for="mindegave_first_name" class="required">Fornavn</label>
                                    <input type="text" name="mindegave_first_name" id="mindegave_first_name" placeholder="Fornavn" required>
                                    <label for="mindegave_last_name" class="required">Efternavn</label>
                                    <input type="text" name="mindegave_last_name" id="mindegave_last_name" placeholder="Efternavn" required>
                                    <label for="mindegave_email" class="required">E-mail</label>
                                    <input type="email" name="mindegave_email" id="mindegave_email" placeholder="E-mail" required>
                                </div>
                                <div class="cell small-12 medium-6">
                                    <label for="mindegave_phone" class="required">Telefonnr.</label>
                                    <input type="tel" name="mindegave_phone" id="mindegave_phone" placeholder="Telefonnr." required>
                                    <label for="mindegave_address" class="required">Adresse</label>
                                    <input type="text" name="mindegave_address" id="mindegave_address" placeholder="Adresse" required>
                                    <div class="grid-x grid-margin-x">
                                        <div class="cell small-4">
                                            <label for="mindegave_zip" class="required">Postnr.</label>
                                            <input type="number" name="mindegave_zip" id="mindegave_zip" placeholder="Postnr." required>
                                        </div>
                                        <div class="cell small-8">
                                            <label for="mindegave_city" class="required">By</label>
                                            <input type="text" name="mindegave_city" id="mindegave_city" placeholder="By" required>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="form-loader">
                                <div class="loader"></div>
                            </div>

                            <div class="grid-x align-justify button-container">
                                <a class="button hide-btn hollow prev">Tilbage</a>
                                <a class="button next small-order-3">Videre</a>
                                <button type="submit" class="button medium-order-3 remove-btn submit-btn">Bekræft og betal</button>
                            </div>
                            <div class="error-container">

                            </div> 
                        
                        </form>
                        <div class="thank-you-step align-center grid-x text-center remove-step">
                            <h2 class="small-12">Tak for din Mindegave.</h2>
                            <p>Dit mindekort er blevet sendt på e-mail. Herfra kan du vidersende eller printe kortet.</p>
                        </div>
                    </div>
                    <div class="mindegave-without-container">
                        <div class="collection-header">
                            <h2>Mindegave uden hilsen</h2>
                            <p>Giv en Mindegave uden en personlig hilsen.</p>
                        </div>
                        <form method="post" data-create-mindegave-without id="giv-mindegave-form-without">
                            <input type="hidden" name="action" value="giv_mindegave">
                            <div class="step step-1 step-active show-step grid-x grid-margin-x">
                                <h4 class="small-12 cell">Dine personlige informationer</h4>
                                <div class="cell small-12 medium-6">
                                    <label for="mindegave_first_name" class="required">Fornavn</label>
                                    <input type="text" name="mindegave_first_name" id="mindegave_first_name" placeholder="Fornavn" required>
                                    <label for="mindegave_last_name" class="required">Efternavn</label>
                                    <input type="text" name="mindegave_last_name" id="mindegave_last_name" placeholder="Efternavn" required>
                                    <label for="mindegave_email" class="required">E-mail</label>
                                    <input type="email" name="mindegave_email" id="mindegave_email" placeholder="E-mail" required>
                                </div>
                                <div class="cell small-12 medium-6">
                                    <label for="mindegave_phone" class="required">Telefonnr.</label>
                                    <input type="tel" name="mindegave_phone" id="mindegave_phone" placeholder="Telefonnr." required>
                                    <label for="mindegave_address" class="required">Adresse</label>
                                    <input type="text" name="mindegave_address" id="mindegave_address" placeholder="Adresse" required>
                                    <div class="grid-x grid-margin-x">
                                        <div class="cell small-4">
                                            <label for="mindegave_zip" class="required">Postnr.</label>
                                            <input type="number" name="mindegave_zip" id="mindegave_zip" placeholder="Postnr." required>
                                        </div>
                                        <div class="cell small-8">
                                            <label for="mindegave_city" class="required">By</label>
                                            <input type="text" name="mindegave_city" id="mindegave_city" placeholder="By" required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="step step-2 remove-step grid-x grid-margin-x">
                                <h4 class="small-12 cell">Din donation</h4>
                                <div class="cell small-12 medium-6">
                                    <label for="mindegave_donation" class="required">Jeg vil gerne donere (min. kr. 50,-)</label>
                                    <input type="number" name="mindegave_donation" id="mindegave_donation" min="50" placeholder="Donation i kr." required>
                                    <label for="mindegave_name_dead" class="required">Navn på afdøde</label>
                                    <input type="text" name="mindegave_name_dead" id="mindegave_name_dead" placeholder="Navn på afdøde" required>
                                    <label for="mindegave_name_relative" class="required">Navn på nærmeste pårørende</label>
                                    <input type="text" name="mindegave_name_relative" id="mindegave_name_relative" placeholder="Navn på nærmeste pårørende" required>
                                </div>
                                <div class="cell small-12 medium-6">
                                    <label for="mindegave_relative_address" class="required">Adresse på nærmeste pårørende</label>
                                    <input type="text" name="mindegave_relative_address" id="mindegave_relative_address" placeholder="Adresse på nærmeste pårørende" required>
                                    <div class="grid-x grid-margin-x">
                                        <div class="cell small-4">
                                            <label for="mindegave_relative_zip" class="required">Postnr.</label>
                                            <input type="number" name="mindegave_relative_zip" id="mindegave_relative_zip" placeholder="Postnr." required>
                                        </div>
                                        <div class="cell small-8">
                                            <label for="mindegave_relative_city" class="required">By</label>
                                            <input type="text" name="mindegave_relative_city" id="mindegave_relative_city" placeholder="By" required>
                                        </div>
                                        <label for="mindegave_consent" class="cell required">
                                            <input type="checkbox" name="mindegave_consent" id="mindegave_consent" required>
                                            Jeg accepterer <a href="#">vilkår og betingelser</a> samt Kræftens Bekæmpelses <a href="#">privatlivspolitik</a>.
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-loader">
                                <div class="loader"></div>
                            </div>

                            <div class="grid-x align-justify button-container">
                                <a class="button hide-btn hollow prev">Tilbage</a>
                                <a class="button next small-order-3">Videre</a>
                                <button type="submit" class="button medium-order-3 remove-btn submit-btn">Bekræft og betal</button>
                            </div>
                            <div class="error-container">

                            </div> 
                        </form>
                        <div class="thank-you-step align-center grid-x text-center remove-step">
                            <h2 class="small-12">Tak for din Mindegave.</h2>
                            <p>Nærmeste pårørende har fået besked om donationen, og du har selv modtaget en e-mail med detaljer.</p>
                        </div>
                    </div>
                </div>
            </section>
        </main><!-- #main -->
    </div><!-- #primary -->
<?php get_footer();
