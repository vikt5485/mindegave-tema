<?php 
    $text = get_sub_field("text");
    $video_placeholder = get_sub_field("video_placeholder");
    $image_pos = get_sub_field("image_position");
?>

<div class="grid-container">
    <div class="grid-x grid-margin-x align-middle align-center">
        <div class="cell small-12 medium-5 <?php echo $image_pos == "left" ? "small-order-2 medium-offset-1 margin-top-small" : ""; ?>">
            <?php echo $text; ?>
            <?php get_template_part("template-parts/button"); ?>
        </div>
        <div class="cell small-12 medium-6 <?php echo $image_pos == "right" ? "small-order-2 medium-offset-1 margin-top-small" : ""; ?>">
            <div class="square-video">
                <video playsinline loop poster="<?php echo $video_placeholder['url']; ?>" class="explainer" width="x" height="y">
                    <source src="<?php echo get_template_directory_uri() . "/assets/video/explainer.mp4" ?>" type="video/mp4">
                </video>
                <div class="play-btn">
                    <?php include(locate_template( 'assets/img/play-btn-white.svg' )); ?>
                </div>
            </div>
        </div>
    </div>
</div>