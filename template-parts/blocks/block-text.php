<?php 
    $columns = get_sub_field("columns") ? get_sub_field("columns") : "one";
    $text = get_sub_field("text");
    $column_one = get_sub_field("column_one");
    $column_two = get_sub_field("column_two");
?>

<div class="grid-container">
    <div class="grid-x grid-margin-x">
        <?php if($columns == "one") : ?>
            <div class="cell small-12 medium-10 large-8 medium-offset-1 large-offset-2">
                <?php echo $text; ?>
                <?php get_template_part("template-parts/button"); ?>
            </div>
        <?php elseif($columns == "two") : ?>
            <div class="cell small-12 medium-5 large-4 medium-offset-1 large-offset-2">
                <?php echo $column_one; ?>
                <div class="show-for-medium"><?php get_template_part("template-parts/button"); ?></div>
            </div>
            <div class="cell small-12 medium-5 large-4 margin-top-small">
                <?php echo $column_two; ?>
                <div class="show-for-small-only"><?php get_template_part("template-parts/button"); ?></div>
            </div>
        <?php endif; ?>

    </div>
</div>