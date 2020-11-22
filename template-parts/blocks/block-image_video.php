<?php 
    $type = get_sub_field("type");
    $image = get_sub_field("image");
    $video = get_sub_field("video");
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
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Praesentium earum optio sapiente laboriosam, cumque quasi harum tempore, enim impedit necessitatibus, at consectetur eligendi modi! Quo consectetur magni dolorum earum eius.lorem Lorem, ipsum dolor sit amet consectetur adipisicing elit. Distinctio dolorem, sunt, nostrum exercitationem nemo a aspernatur rerum sit eum necessitatibus nobis minus, laudantium ipsa eius eveniet dolor labore? Error, minus. Lorem ipsum dolor sit amet consectetur adipisicing elit. Sint omnis, maxime ipsa nemo totam minus debitis alias libero ullam itaque, rerum, consequatur a quidem! Ex tempora corrupti alias nobis optio!</p>
                <?php endif; ?>
            </div>
        </div>

<?php if($fit != "full_width") : ?>
    </div>
<?php endif; ?>