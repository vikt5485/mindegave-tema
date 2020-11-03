<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package mindegave
 */
?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <section>
        <div class="grid-container">
            <div class="grid-x grid-margin-x">
                <div class="cell">
                    <?php the_title('<h1 class="entry-title">', '</h1>');
                    the_content(); ?>
                </div>
            </div>
        </div>
    </section>
</article>