<?php 
    $intro = get_sub_field("intro");
    $second_color = get_sub_field("background_color") == "white" ? "#efefed" : "#f7f7f6";
?>

<div class="grid-container">
    <div class="grid-x grid-margin-x">
            <div class="cell small-12 medium-10 large-8 medium-offset-1 large-offset-2">
                <?php echo $intro; ?>

                    <div class="grid-x grid-margin-x grid-margin-y align-middle align-center statistics-container">
                    <?php if ( have_rows( 'charts' ) ) : ?>
                        <?php $i = 0; ?>
                        <?php while ( have_rows( 'charts' ) ) :
                            the_row(); ?>

                                <?php 
                                    $label = get_sub_field("label");
                                    $percentage = get_sub_field("percentage");
                                    $color = get_sub_field("color");
                                ?>
                                <div class="statistic cell small-12 medium-6 large-auto text-center">
                                    <h4><?php echo $label; ?></h4>
                                    <canvas id="myChart-<?php echo $i; ?>"></canvas>
                                    <p><?php echo $percentage . "%"; ?></p>
                                    <?php $i++; ?>
                                </div>
                                <div class="stat-data hidden" data-label="<?php echo $label; ?>" data-percentage="<?php echo $percentage; ?>" data-color="<?php echo $color; ?>" data-secondcolor="<?php echo $second_color; ?>"></div>
                        <?php endwhile; ?>
                    <?php endif; ?>
                    </div>                    
            </div>
    </div>
</div>