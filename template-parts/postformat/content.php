<?php global $post;
$thumbnail = get_the_post_thumbnail($post, 'thumbnail'); ?>
<a href="<?php the_permalink(); ?>" class="post-teaser <?php echo get_post_format(); ?>">
    <?php if( $thumbnail ): ?>
        <div class="image">
            <?php echo $thumbnail; ?>
        </div>
    <?php endif ?>
    <div class="content">
        <p class="post-date"><?php echo get_the_date(); ?></p>
        <p class="post-title"><?php the_title() ?></p>
        <p class="post-desc"><?php the_excerpt(); ?></p>
    </div>
</a>