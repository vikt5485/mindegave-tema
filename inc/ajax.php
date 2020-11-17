<?php 
add_action("wp_ajax_create_collection", "create_collection");
add_action("wp_ajax_nopriv_create_collection", "create_collection");

function create_collection() {
    $response = array(
        'status' => 'error'
    );

    $title = isset($_POST['ins_title']) ? sanitize_text_field($_POST['ins_title']) : null;
    $desc = isset($_POST['ins_desc']) ? sanitize_text_field($_POST['ins_desc']) : null;
    $name = isset($_POST['ins_name']) ? sanitize_text_field($_POST['ins_name']) : null;
    $born = isset($_POST['ins_born']) ? $_POST['ins_born'] : null;
    $dead = isset($_POST['ins_dead']) ? $_POST['ins_dead'] : null;
    $goal = isset($_POST['ins_goal']) ? $_POST['ins_goal'] : null;
    $own_donation = isset($_POST['ins_own_donation']) ? $_POST['ins_own_donation'] : null;
    $end_date = isset($_POST['ins_end_date']) ? $_POST['ins_end_date'] : null;
    $greeting = isset($_POST['ins_greeting']) ? $_POST['ins_greeting'] : null;
    $image_id = isset($_POST['img_id']) ? $_POST['img_id'] : null;

    $response['data'] = $_POST;

    $args = array(
        'post_type' => 'indsamlinger',
        'post_title' => $title,
        'post_status' => 'publish'
    );

    $post_id = wp_insert_post($args);

    if(!is_wp_error($post_id)){
        $response['status'] = 'success';
        $response['post_id'] = $post_id;
        $response['permalink'] = get_permalink($post_id);

        update_field('ins_title', $title, $post_id);
        update_field('ins_desc', $desc, $post_id);
        update_field('ins_name', $name, $post_id);
        update_field('ins_born', $born, $post_id);
        update_field('ins_dead', $dead, $post_id);
        update_field('ins_goal', $goal, $post_id);
        update_field('ins_total_donations', $own_donation, $post_id);
        update_field('ins_end_date', $end_date, $post_id);
        update_field('ins_greeting', $greeting, $post_id);
        update_field('ins_images', $image_id, $post_id);

        //Overvej om der skal sendes en mail her


    } else {
        $response['message'] = $post_id->get_error_message();
    }


    echo json_encode($response);

    wp_die();

}


add_action("wp_ajax_search_collection", "search_collection");
add_action("wp_ajax_nopriv_search_collection", "search_collection");

function search_collection() {
    $response = array(
        'status' => 'error'
    );

    $search_query = isset($_POST['search_input']) ? sanitize_text_field($_POST['search_input']) : "";

    $args = array(
        'post_type' => 'indsamlinger',
        'post_status' => 'publish',
        'posts_per_page' => -1,
        'meta_query'    => array(
            array( 'key' => 'ins_title', 'value' => $search_query, 'compare' => 'LIKE' ),
            array( 'key' => 'ins_desc', 'value' => $search_query, 'compare' => 'LIKE' ),
            array( 'key' => 'ins_name', 'value' => $search_query, 'compare' => 'LIKE' ),
            'relation' => 'OR'
        )
    );

    $loop = new WP_Query( $args ); 

    if( $loop->have_posts() ) {
        while ( $loop->have_posts() ) {
            $loop->the_post();
                global $post;
                $title = get_field("ins_title"); 
                $image = get_field("ins_images");
                $name = get_field("ins_name");
                $total_donations = get_field("ins_total_donations");
                $donation_goal = get_field("ins_goal");

                $response['html'] .= '

                <div class="cell small-12 medium-6 large-4">
                    <a href="' . get_permalink( $post->ID ) . '">
                        <img src="' . esc_url( $image["sizes"]["thumbnail"] ) . '" class="indsamling-img" alt="' . esc_attr( $image["alt"] ) . '" />
                        <h2>' . $title . '</h2>
                        <p>Til minde om ' . $name . '</p>
                        <div class="donation-progress-wrapper archive-donation-wrapper">
                            <div class="donation-progress" style="width:' . $total_donations / $donation_goal * 100 . '%;"></div>
                        </div>
                        <div class="total-donated"><p>kr. ' . number_format($total_donations, 0, ",", ".") . ',- indsamlet</p></div>
                    </a>
                </div>
                
                ';
        }
    }   

    $response['status'] = 'success';
    $response['data'] = $search_query;

    echo json_encode($response);

    wp_die();
}