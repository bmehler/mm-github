<?php
/**
* Plugin Name: Github Dashboard Widget
* Plugin URI: http://www.mehler-medial.de
* Description: Zeigt eine Liste von Github Repositories eines Benutzers an.
* Version: 0.0.1
* Author: Bernhard Mehler
* Author URI: http://www.mehler-medial.de
* License: GPL2
* Text Domain: mm-github
*/
namespace MM\Github;

add_action( 'plugins_loaded', 'MM\Github\init' );

function init() {
    loadTextdomain();
    include_once('includes/mm-github-settings.php');
    include_once('includes/mm-github-dashboard.php');
    add_action( 'admin_enqueue_scripts', 'MM\Github\register_plugin_styles' );
    add_action('wp_dashboard_setup', 'MM\Github\github_plugins_widget');
}

function loadTextdomain() {
    load_plugin_textdomain( 'mm-github', FALSE, basename( dirname( __FILE__ ) ) . '/languages/' );
}

function register_plugin_styles() {
    wp_register_style( 'font-awesome-css', plugins_url('mm-active/assets/font-awesome/css/font-awesome.css'));
    wp_enqueue_style( 'font-awesome-css' );
}
?>