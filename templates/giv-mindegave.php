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
                        <div class="cell small-12 medium-6">
                            <?php echo $with_greeting_text; ?>
                            <a  class="button" id="with-greeting">Giv en Mindegave med hilsen</a>
                        </div>
                        <div class="cell small-12 medium-6">
                            <?php echo $without_greeting_text; ?>
                            <a  class="button" id="without-greeting">Giv en Mindegave uden hilsen</a>
                        </div>
                    </div>

                    <form method="post" data-create-mindegave-with id="giv-mindegave-form-with">
                        <input type="hidden" name="action" value="giv_mindegave_with">
                       
                       
                    </form>
                    <div class="mindegave-without-container">
                        <div class="collection-header">
                            <h2>Mindegave uden hilsen</h2>
                            <p>Giv en Mindegave uden en personlig hilsen.</p>
                        </div>
                        <form method="post" data-create-mindegave-without id="giv-mindegave-form-without">
                            <input type="hidden" name="action" value="giv_mindegave_without">
                            <div class="step step-1 step-active show-step grid-x grid-margin-x">
                                <h4 class="small-12 cell">Dine personlige informationer</h4>
                                <div class="cell small-12 medium-6">
                                    <label for="mindegave_first_name">Fornavn
                                        <input type="text" name="mindegave_first_name" id="mindegave_first_name" placeholder="Fornavn" required>
                                    </label>
                                    <label for="mindegave_last_name">Efternavn
                                        <input type="text" name="mindegave_last_name" id="mindegave_last_name" placeholder="Efternavn" required>
                                    </label>
                                    <label for="mindegave_email">E-mail
                                        <input type="email" name="mindegave_email" id="mindegave_email" placeholder="E-mail" required>
                                    </label>
                                </div>
                                <div class="cell small-12 medium-6">
                                    <label for="mindegave_phone">Telefonnr.
                                        <input type="tel" name="mindegave_phone" id="mindegave_phone" placeholder="Telefonnr." required>
                                    </label>
                                    <label for="mindegave_address">Adresse
                                        <input type="text" name="mindegave_address" id="mindegave_address" placeholder="Adresse" required>
                                    </label>
                                    <div class="grid-x grid-margin-x">
                                        <div class="cell small-4">
                                            <label for="mindegave_zip">Postnr.
                                                <input type="number" name="mindegave_zip" id="mindegave_zip" placeholder="Postnr." required>
                                            </label>
                                        </div>
                                        <div class="cell small-8">
                                            <label for="mindegave_city">By
                                                <input type="text" name="mindegave_city" id="mindegave_city" placeholder="By" required>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="step step-2 remove-step grid-x grid-margin-x">
                                <h4 class="small-12 cell">Din donation</h4>
                                <div class="cell small-12 medium-6">
                                    <label for="mindegave_donation">Jeg vil gerne donere
                                        <input type="number" name="mindegave_donation" id="mindegave_donation" placeholder="Donation i kr." required>
                                    </label>
                                    <label for="mindegave_name_dead">Navn på afdøde
                                        <input type="text" name="mindegave_name_dead" id="mindegave_name_dead" placeholder="Navn på afdøde" required>
                                    </label>
                                    <label for="mindegave_name_relative">Navn på nærmeste pårørende
                                        <input type="text" name="mindegave_name_relative" id="mindegave_name_relative" placeholder="Navn på nærmeste pårørende" required>
                                    </label>
                                </div>
                                <div class="cell small-12 medium-6">
                                    <label for="mindegave_relative_address">Adresse på nærmeste pårørende
                                        <input type="text" name="mindegave_relative_address" id="mindegave_relative_address" placeholder="Adresse på nærmeste pårørende" required>
                                    </label>
                                    <div class="grid-x grid-margin-x">
                                        <div class="cell small-4">
                                            <label for="mindegave_relative_zip">Postnr.
                                                <input type="number" name="mindegave_relative_zip" id="mindegave_relative_zip" placeholder="Postnr." required>
                                            </label>
                                        </div>
                                        <div class="cell small-8">
                                            <label for="mindegave_relative_city">By
                                                <input type="text" name="mindegave_relative_city" id="mindegave_relative_city" placeholder="By" required>
                                            </label>
                                        </div>
                                        <label for="mindegave_consent" class="cell">
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
                            <h2 class="small-12">Tak! Din Mindegave er blevet taget godt imod.</h2>
                            <p>Nærmeste pårørende har fået besked om donationen, og du har selv modtaget en e-mail med detaljer.</p>
                        </div>
                    </div>
                </div>
            </section>
        </main><!-- #main -->
    </div><!-- #primary -->
<?php get_footer();
