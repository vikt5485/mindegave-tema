<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package mindegave
 */
?>
<?php 
    // // get theme variabes
    // $social_media = get_social_media(); 
    // $address = get_theme_address();
    // $company_name = get_theme_company_name();
    // $post_number = get_theme_postalnumber();
    // $city = get_theme_city();
    // $phone = get_theme_company_phone();
    // $email = get_theme_company_email();
?>
</div><!-- #content -->
<footer id="colophon" class="site-footer">
    <div class="grid-container">
        <div class="grid-x grid-margin-x ">
            <div class="cell small-12 medium-4 large-3 large-offset-3">
            <h4>Mindegave</h4>
                <nav >
                    <?php wp_nav_menu(array(
                        'theme_location' => 'menu-2',
                        'menu_id' => 'footer-1',
                        'menu_class' => 'menu vertical'
                    )); ?>
                </nav>
            </div>
            <div class="cell small-12 medium-4 large-3">
            <h4>Mindeindsamling</h4>
                <nav >
                    <?php wp_nav_menu(array(
                        'theme_location' => 'menu-3',
                        'menu_id' => 'footer-2',
                        'menu_class' => 'menu vertical'
                    )); ?>
                </nav>
            </div>
            <div class="cell small-12 medium-4 large-3">
            <h4>Om Mindegave</h4>
                <nav >
                    <?php wp_nav_menu(array(
                        'theme_location' => 'menu-4',
                        'menu_id' => 'footer-3',
                        'menu_class' => 'menu vertical'
                    )); ?>
                </nav>
            </div>
        </div>
    </div>
</footer><!-- #colophon -->
</div><!-- #page -->
<?php wp_footer(); ?>
</body>
</html>