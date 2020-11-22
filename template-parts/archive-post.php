<?php 
    global $post;
    // $title = get_field("ins_title"); 
    $image = get_field("ins_images");
    $name = get_field("ins_name");
    $desc = get_field("ins_desc");
    $donation_goal = get_field("ins_goal");
    $total_donated = 0;
?>

<?php if ( have_rows( 'donations' ) ) : ?>
    <?php while ( have_rows( 'donations' ) ) : the_row(); ?>
        <?php 
            $total_donated = $total_donated + get_sub_field( 'amount' );
        ?>
    <?php endwhile; ?>
<?php endif; ?>
 
<div class="cell small-12 medium-6 large-4 archive-post">
    <a href="<?php echo get_permalink( $post->ID ); ?>">
        <img src="<?php echo esc_url( $image['sizes']['thumbnail'] ); ?>" class="indsamling-img" alt="<?php echo esc_attr( $image['alt'] ); ?>" />
        <p class="small">Til minde om</p>
        <h3><?php echo $name; ?></h3>
        <p><?php echo $desc; ?></p>
        <div class="donation-progress-wrapper archive-donation-wrapper">
            <div class="donation-progress" style="width:<?php echo $total_donated / $donation_goal * 100 ?>%;"></div>
        </div>
        <div class="total-donated"><p>kr. <?php echo number_format($total_donated, 0, ",", "."); ?>,- indsamlet</p></div>
    </a>
</div>