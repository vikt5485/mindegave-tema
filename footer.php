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
        <!-- <div class="site-branding text-center">
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
                <?php include(locate_template( 'assets/img/logo.svg' )); ?>
            </a>
        </div> -->
    </div>
</footer><!-- #colophon -->
</div><!-- #page -->
<?php wp_footer(); ?>
</body>
</html>