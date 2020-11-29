<?php 
    $type = get_sub_field("type");
    $image = get_sub_field("image");
    $video = get_sub_field("video");
    $placeholder_img = get_sub_field("placeholder_image");
    $fit = get_sub_field("fit");
?>

<?php if($fit != "full_width") : ?>
    <div class="grid-container">
<?php endif; ?>

        <div class="grid-x align-middle align-center">
            <div class="small-12 <?php echo $fit == "narrow" ? "large-8" : "" ; ?>">
                <?php if($type == "image") : ?>
                    <img src="<?php echo esc_url( $image['url'] ); ?>" alt="<?php echo esc_attr( $image['alt'] ); ?>" />
                <?php elseif($type == "video") : ?>
                    <div class="video-placeholder" style="background-image:url(<?php echo $placeholder_img['url'] ?>);">
                        <div class="overlay"></div>
                        <div class="play-btn">
                            <?php include(locate_template( 'assets/img/play-btn.svg' )); ?>
                        </div>
                    </div>
                    <div class="video-popup">
                        <?php echo $video; ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>

<?php if($fit != "full_width") : ?>
    </div>
<?php endif; ?>