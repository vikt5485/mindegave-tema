<?php 
    $headline = get_field('headline') ? get_field('headline') : get_the_title();
    $subheadline = get_field('subheadline');
    $graphic = get_field('graphic');
    $graphic_pos = get_field('graphic_position');
    $link = get_field( 'call_to_action' );
    $link_url = $link['url'];
    $link_title = $link['title'];
    $link_target = $link['target'] ? $link['target'] : '_self';
    $style = get_field('style');
?>
<?php if($style == "narrow") : ?>
    <div class="hero-banner narrow">
<?php else : ?>
    <section class="hero-banner">
<?php endif; ?>

    <div class="grid-container">
        <h1><?php echo $headline; ?></h1>
        <?php if($subheadline) : ?>
            <h3><?php echo $subheadline; ?></h3>
        <?php endif; ?>
        <?php if ( $link ) :?>
            <a class="button" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
        <?php endif; ?>
    </div>
    <?php if($graphic) : ?>
        <img class="graphic <?php echo $graphic_pos; ?>" src="<?php echo $graphic['url']; ?>" alt="<?php echo $graphic['alt']; ?>">
    <?php endif; ?>

<?php if($style == "narrow") : ?>
    </div>
<?php else : ?>
    </section>
<?php endif; ?>