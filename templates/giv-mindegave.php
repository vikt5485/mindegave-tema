<?php
/**
* Template Name: Giv Mindegave
*
 * @package mindegave
 */
get_header(); ?>
    <div id="primary" class="content-area">
        <main id="main" class="site-main">
            <section>
                <div class="grid-container giv-mindegave">
                    <div class="grid-x grid-margin-x grid-margin-y intro-card">
                        <div class="cell small-12 medium-6">
                            <h3>Mindegave med hilsen</h3>
                            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Laudantium, dolore perferendis officiis quos laboriosam debitis commodi mollitia perspiciatis earum sapiente? Temporibus dignissimos eveniet porro impedit tempore harum vitae inventore voluptatem?</p>
                            <a  class="button" id="with-greeting">Giv en Mindegave med hilsen</a>
                        </div>
                        <div class="cell small-12 medium-6">
                            <h3>Mindegave uden hilsen</h3>
                            <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Laudantium, dolore perferendis officiis quos laboriosam debitis commodi mollitia perspiciatis earum sapiente? Temporibus dignissimos eveniet porro impedit tempore harum vitae inventore voluptatem?</p>
                            <a  class="button" id="without-greeting">Giv en Mindegave uden hilsen</a>
                        </div>
                    </div>

                    <form method="post" data-create-mindegave-with id="giv-mindegave-form-with">
                        <input type="hidden" name="action" value="giv_mindegave_with">
                        <h2>Med hilsen</h2>
                        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Accusamus dignissimos delectus cupiditate! Repudiandae hic assumenda consequatur ducimus vitae. Quae numquam molestiae quam quas qui quidem blanditiis ad accusamus a optio. Lorem ipsum dolor sit, amet consectetur adipisicing elit. Excepturi eveniet, minima delectus impedit et, obcaecati explicabo molestiae cumque est, inventore voluptatum itaque aliquam possimus enim? Harum totam deleniti commodi nemo? Lorem ipsum dolor sit amet consectetur adipisicing elit. Laboriosam voluptas incidunt tempora optio obcaecati maiores architecto culpa fugit sed enim, consequuntur libero possimus doloribus? Animi repudiandae architecto mollitia consectetur molestias?</p>
                    </form>
                    <form method="post" data-create-mindegave-without id="giv-mindegave-form-without">
                        <input type="hidden" name="action" value="giv_mindegave_without">
                        <h2>Uden hilsen</h2>
                        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sit voluptatem facilis expedita, similique commodi accusamus, aspernatur corrupti eius, nostrum illo amet laborum? Deserunt unde numquam vel neque, soluta reprehenderit sapiente.lorem Lorem ipsum dolor sit amet consectetur adipisicing elit. Cupiditate repellendus mollitia ipsam sunt alias ea hic omnis! Magnam, nesciunt ullam, omnis autem a aperiam, cumque nostrum dolor inventore distinctio esse!</p>
                    </form>
                </div>
            </section>
        </main><!-- #main -->
    </div><!-- #primary -->
<?php get_footer();
