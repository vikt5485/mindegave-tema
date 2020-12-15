<?php 
    $headline = get_field('headline') ? get_field('headline') : get_the_title();
    $subheadline = get_field('subheadline');
    $link = get_field( 'call_to_action' );
    $link_url = $link['url'];
    $link_title = $link['title'];
    $link_target = $link['target'] ? $link['target'] : '_self';

    $link_2 = get_field( 'call_to_action_2' );
    $link_url_2 = $link_2['url'];
    $link_title_2 = $link_2['title'];
    $link_target_2 = $link_2['target'] ? $link_2['target'] : '_self';

    $style = get_field('style');
    $text = get_field('text');

    $thumbnail = get_the_post_thumbnail_url();
    $video_placeholder = get_field('video_placeholder');
?>
<?php if($style == "narrow") : ?>
    <div class="hero-banner narrow <?php echo $thumbnail ? "has-thumbnail" : ""; ?>" <?php echo $thumbnail ? "style='background-image: url(" . $thumbnail . ");'" : ""; ?>>
<?php else : ?>
    <section class="hero-banner <?php echo $video_placeholder ? "has-video" : ""; ?> <?php echo $thumbnail ? "has-thumbnail" : ""; ?>" <?php echo $thumbnail && $video_placeholder == false ? "style='background-image: url(" . $thumbnail . ");'" : ""; ?>>
<?php endif; ?>
    <?php if(is_front_page()) : ?>
        <?php if($video_placeholder) : ?>
            <div id="hero">
                <video playsinline autoplay muted loop poster="<?php echo $video_placeholder['url']; ?>" id="bgvideo">
                    <source src="<?php echo get_template_directory_uri() . "/assets/video/splash-video.mp4" ?>" type="video/mp4">
                </video>
            </div>
            <div class="grid-container">
                <?php echo $text; ?>
                <?php if ( $link ) :?>
                    <a class="button" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
                <?php endif; ?>
                <?php if ( $link_2 ) :?>
                    <a class="button" href="<?php echo esc_url( $link_url_2 ); ?>" target="<?php echo esc_attr( $link_target_2 ); ?>"><?php echo esc_html( $link_title_2 ); ?></a>
                <?php endif; ?>
            </div>
        <?php else: ?>
            <div class="grid-container">
                <?php echo $text; ?>
                <?php if ( $link ) :?>
                    <a class="button" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
                <?php endif; ?>
                <?php if ( $link_2 ) :?>
                    <a class="button" href="<?php echo esc_url( $link_url_2 ); ?>" target="<?php echo esc_attr( $link_target_2 ); ?>"><?php echo esc_html( $link_title_2 ); ?></a>
                <?php endif; ?>
            </div>
        <?php endif; ?>
        <div class="scroll-indicator show-for-medium">
            <?php include(locate_template( 'assets/img/scroll-arrow.svg' )); ?>
        </div>
    <?php else: ?>
        <div class="grid-container">
            <h1><?php echo $headline; ?></h1>
            <?php if($subheadline) : ?>
                <h3><?php echo $subheadline; ?></h3>
            <?php endif; ?>
            <?php if ( $link ) :?>
                <a class="button" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
            <?php endif; ?>
        </div>
    <?php endif; ?>

<?php if($style == "narrow") : ?>
        <a href="https://www.cancer.dk" rel="noreferrer" target="_blank" class="kb-logo">
            <?php include(locate_template( 'assets/img/logo-kb.svg' )); ?>
            Kræftens<br>Bekæmpelse
        </a>
    </div>
<?php else : ?>
        <a href="https://www.cancer.dk" rel="noreferrer" target="_blank" class="kb-logo">
            <?php include(locate_template( 'assets/img/logo-kb.svg' )); ?>
            Kræftens<br>Bekæmpelse
        </a>
    </section>
<?php endif; ?>