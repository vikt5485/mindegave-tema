<?php 
    $text = get_sub_field("text");
    $image = get_sub_field("image");
    $image_pos = get_sub_field("image_position");
?>

<div class="grid-container">
    <div class="grid-x grid-margin-x align-middle align-center">
        <div class="cell small-12 medium-5 <?php echo $image_pos == "left" ? "small-order-2 medium-offset-1 margin-top-small" : ""; ?>">
            <?php echo $text; ?>
            <?php get_template_part("template-parts/button"); ?>
        </div>
        <div class="cell small-12 medium-6 <?php echo $image_pos == "right" ? "small-order-2 medium-offset-1 margin-top-small" : ""; ?>">
	        <img src="<?php echo esc_url( $image['url'] ); ?>" alt="<?php echo esc_attr( $image['alt'] ); ?>" />
        </div>
    </div>
</div>