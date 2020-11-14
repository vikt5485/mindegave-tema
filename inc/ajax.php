<?php 
add_action("wp_ajax_create_collection", "create_collection");
add_action("wp_ajax_nopriv_create_collection", "create_collection");

function create_collection() {
    $response = array(
        'status' => 'error'
    );

    $title = isset($_POST['ins-title']) ? sanitize_text_field($_POST['ins-title']) : null;
    $desc = isset($_POST['ins-desc']) ? sanitize_text_field($_POST['ins-desc']) : null;
    $name = isset($_POST['ins-name']) ? sanitize_text_field($_POST['ins-name']) : null;
    $born = isset($_POST['ins-born']) ? $_POST['ins-born'] : null;
    $dead = isset($_POST['ins-dead']) ? $_POST['ins-dead'] : null;
    $goal = isset($_POST['ins-goal']) ? $_POST['ins-goal'] : null;
    $own_donation = isset($_POST['ins-own-donation']) ? $_POST['ins-own-donation'] : null;
    $end_date = isset($_POST['ins-end-date']) ? $_POST['ins-end-date'] : null;
    $greeting = isset($_POST['ins-greeting']) ? $_POST['ins-greeting'] : null;
    $images = isset($_POST['ins-images']) ? $_POST['ins-images'] : null;

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

        update_field('ins_title', $title, $post_id);
        update_field('ins_desc', $desc, $post_id);
        update_field('ins_name', $name, $post_id);
        update_field('ins_born', $born, $post_id);
        update_field('ins_dead', $dead, $post_id);
        update_field('ins_goal', $goal, $post_id);
        update_field('ins_total_donations', $own_donation, $post_id);
        update_field('ins_end_date', $end_date, $post_id);
        update_field('ins_greeting', $greeting, $post_id);
        update_field('ins_images', $images, $post_id);



        //Overvej om der skal sendes en mail her



    } else {
        $response['message'] = $post_id->get_error_message();
    }


    echo json_encode($response);

    wp_die();

}