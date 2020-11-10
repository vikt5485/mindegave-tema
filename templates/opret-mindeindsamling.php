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
                    <h2>Info om Mindeindsamlingen</h2>
                    <p>Nedenstående info vil blive vist offentligt i forbindelse med din indsamling.</p>
                    <form action="" id="opret-mindeindsamling-form">
                        <div class="step step-1 step-active grid-x grid-margin-x">
                            <div class="cell small-12 medium-6">
                                <label for="ins-name">Indsamlingens navn
                                    <input type="text" name="ins-name" id="ins-name" placeholder="Indsamlingens navn">
                                </label>
                                <label for="ins-why">Hvorfor samler du ind til Kræftens Bekæmpelse?
                                    <textarea rows="4" name="ins-why" id="ins-why" placeholder="Skriv et par linjer, om hvorfor du samler ind til Kræftens Bekæmpelse"></textarea>
                                </label>
                            </div>
                            <div class="cell small-12 medium-6">
                                <label for="ins-for-who">Til minde om
                                    <input type="text" name="ins-for-who" id="ins-for-who" placeholder="Til minde om">
                                </label>
                                <div class="grid-x grid-margin-x">
                                    <label class="cell small-6" for="ins-born">Født
                                        <input type="date" name="ins-born" id="ins-born" placeholder="Født"></input>
                                    </label>
                                    <label class="cell small-6" for="ins-dead">Død
                                        <input type="date" name="ins-dead" id="ins-dead" placeholder="Død"></input>
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="step step-2 grid-x grid-margin-x">
                            <div class="cell small-12 medium-4">
                                <label for="ins-goal">Indsamlingens mål i kr.
                                    <input type="number" name="ins-goal" id="ins-goal" placeholder="Indsamlingens mål i kr." >
                                </label>
                            </div>
                            <div class="cell small-12 medium-4">
                                <label for="ins-own-donation">Din egen donation
                                    <input type="number" name="ins-own-donation" id="ins-own-donation" placeholder="Din egen donation" >
                                </label>
                            </div>
                            <div class="cell small-12 medium-4">
                                <label for="ins-end-date">Hvornår slutter din indsamling?
                                    <input type="date" name="ins-end-date" id="ins-end-date">
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
                        <div class="step step-3 grid-x grid-margin-x">
                            <div class="cell small-12 medium-6">
                                <label for="ins-greeting">Personlig hilsen til donorer
                                    <textarea rows="4" name="ins-greeting" id="ins-greeting" placeholder="Skriv en hilsen, til dem der donerer til din indsamling"></textarea>
                                </label>
                                <label for="ins-images">Sæt et (eller flere) billede på indsamlingen
                                   <input type="file" name="ins-images" id="ins-images">
                                </label>
                            </div>
                            <div class="cell small-12 medium-6">
                               <!-- Show image when its been uploaded -->
                            </div>
                        </div>
                        <div class="step step-4 grid-x grid-margin-x align-middle">
                            <div class="cell small-12 medium-6">
                                <img src="https://picsum.photos/1000" alt="">
                            </div>
                            <div class="cell small-12 medium-6 grid-x">
                               <h2 class="cell small-12 preview-title">Vælg venligst en titel på indsamlingen</h2>
                               <h3 class="cell small-12 preview-for-who"></h3>
                                <p class="cell small-12 preview-why">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quaerat eligendi ab consequatur corporis! Distinctio facere aperiam illo neque ea? Officiis deleniti laboriosam quisquam perferendis. Est eligendi veritatis quia at repellendus?</p>
                                <div class="cell small-6"><p>Start</p></div>
                                <div class="cell small-6 text-right"><p>Mål</p></div>
                                <div class="cell small-12 donation-progress-wrapper">
                                    <div class="donation-progress"></div>
                                </div>
                                <div class="cell small-4 own-donation-preview "><p>kr. 0,-</p></div>
                                <div class="cell small-4 end-date-preview text-center "><p>Slutter 24/12/2020</p></div>
                                <div class="cell small-4 ins-goal-preview text-right"><p>kr. 0,-</p></div>
                            </div>
                        </div>

                        <div class="grid-x align-justify">
                            <a class="button remove-btn hollow prev">Tilbage</a>
                            <a class="button next">Videre</a>
                        </div>
                    </form>

                    <div class="dots">

                    </div>
                </div>
            </section>
        </main><!-- #main -->
    </div><!-- #primary -->
<?php get_footer();
