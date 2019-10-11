<?php

namespace MM\Github;

function github_plugins_widget() {
    global $wp_meta_boxes;
    add_meta_box('github_plugin_widget', __('Github Repositories', 'mm-github'), 'MM\Github\github_dashboard_repositories', 'dashboard', 'side', 'high');
}

function github_dashboard_repositories() {
    $url = 'https://api.wordpress.org/plugins/update-check/1.1/';

    $ch = curl_init();
    $timeout = 5;
    curl_setopt($ch, CURLOPT_URL, $url);
    #curl_setopt($ch, CURLOPT_USERPWD, $username . ":" . $password);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
    $r = curl_exec($ch);
    print_r($r);
    /*$api_url = wp_remote_post($url);
    $repositories = json_decode($api_url);
    echo '<pre>';
    print_r($api_url);
    print_r($repositories);
    echo '</pre>';

    $response = wp_remote_post( $url, array(
        'method' => 'POST',
        'timeout' => 45,
        'redirection' => 5,
        'httpversion' => '1.0',
        'blocking' => true,
        'headers' => array(),
        //'body' => array( 'username' => 'bob', 'password' => '1234xyz' ),
        'cookies' => array()
        )
    );
    
    if ( is_wp_error( $response ) ) {
       $error_message = $response->get_error_message();
       echo "Something went wrong: $error_message";
    } else {
       echo 'Response:<pre>';
       print_r( $response );
       echo '</pre>';
    }*/
}