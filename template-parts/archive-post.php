<?php 
    global $post;
    $title = get_field("ins_title"); 
    $image = get_field("ins_images");
    $name = get_field("ins_name");
    $total_donations = get_field("ins_total_donations");
    $donation_goal = get_field("ins_goal");
?>
<div class="cell small-12 medium-6 large-4">
    <a href="<?php echo get_permalink( $post->ID ); ?>">
        <img src="<?php echo esc_url( $image['sizes']['thumbnail'] ); ?>" class="indsamling-img" alt="<?php echo esc_attr( $image['alt'] ); ?>" />
        <h2><?php echo $title; ?></h2>
        <p>Til minde om <?php echo $name; ?></p>
        <div class="donation-progress-wrapper archive-donation-wrapper">
            <div class="donation-progress" style="width:<?php echo $total_donations / $donation_goal * 100 ?>%;"></div>
        </div>
        <div class="total-donated"><p>kr. <?php echo number_format($total_donations, 0, ",", "."); ?>,- indsamlet</p></div>
    </a>
</div>