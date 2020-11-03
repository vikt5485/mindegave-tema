<?php
global $post;
$thumbnail = get_the_post_thumbnail_url($post, 'hero-size');
if( $thumbnail ): ?>
    <section class="hero-banner">
        <div class="image" style="background-image: url(<?php echo $thumbnail; ?>);"></div>
        <div class="hero-content">
            <div class="grid-container">
                <div class="grid-x">
                    <div class="cell">
                        <h1><?php the_title(); ?></h1>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php endif; ?>