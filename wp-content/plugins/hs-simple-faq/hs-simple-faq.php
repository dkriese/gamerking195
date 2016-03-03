<?php
/**
 * Plugin Name: HS Responsive Category FAQ
 * Plugin URI: http://heliossolutions.in/
 * Description: Hs simple and responsive faq plugin is the simplest wordpress responsive faq plugin.
 * Version: 3.0.4
 * Author: Helios Solutions
 * Author URI: http://heliossolutions.in/
 */
$plugin_url = WP_PLUGIN_URL . '/hs-simple-faq';
$options = array();

/* Activate  the plugin. */
register_activation_hook(__FILE__, 'hsfaq_plugin_activate');

function hsfaq_plugin_activate() {
    hs_faq_post_type();
    hs_faq_post_taxomomy();
}

/* Delete options on Uninstalling the plugin. */
function hsfaq_uninstall() {
    delete_option( 'hscss_settings' );
}

register_uninstall_hook( __FILE__, 'hsfaq_uninstall' );

/* Add submenu of HS FAQ post type.*/
add_action('admin_menu', 'hsfaq_settings');
    
/* Add submenu of HS FAQ Post type. */
function hsfaq_settings() {
    add_submenu_page( 'edit.php?post_type=hs_faq', __( 'HS FAQ Settings', 'hsfaq' ), __( 'Settings', 'hsfaq' ), 'manage_options', 'hsfaq-settings', 'hsfaq_settings_page' );
}

/*
 * Register Custom Post Type - HS Simple FAQ
 *
 */

function hs_faq_post_type() {
    $labels = array(
        'name' => _x('FAQ\'s', 'post type general name'),
        'singular_name' => _x('FAQ', 'post type singular name'),
        'add_new' => _x('Add New', 'faq'),
        'add_new_item' => __('Add New FAQ'),
        'edit_item' => __('Edit FAQ'),
        'new_item' => __('New FAQ'),
        'all_items' => __('All FAQ\'s'),
        'view_item' => __('View FAQ'),
        'search_items' => __('Search FAQ'),
        'not_found' => __('No FAQ\'s found'),
        'not_found_in_trash' => __('No FAQ\'s found in the Trash'),
        'parent_item_colon' => '',
        'menu_name' => 'FAQ\'s'
    );
    $args = array(
        'labels' => $labels,
        'description' => 'Holds our faq\'s and faq specific data',
        'public' => true,
        'menu_position' => 5,
        'supports' => array('title', 'editor', 'thumbnail', 'excerpt', 'comments'),
        'has_archive' => true,
    );
    register_post_type('hs_faq', $args);
}

add_action('init', 'hs_faq_post_type');

/*
 * Register Custom Taxonomy - FAQ Categories
 *
 */

function hs_faq_post_taxomomy() {
    $labels = array(
        'name' => _x('FAQ Categories', 'taxonomy general name'),
        'singular_name' => _x('FAQ Category', 'taxonomy singular name'),
        'search_items' => __('Search FAQ Categories'),
        'all_items' => __('All FAQ Categories'),
        'parent_item' => __('Parent FAQ Category'),
        'parent_item_colon' => __('Parent FAQ Category:'),
        'edit_item' => __('Edit FAQ Category'),
        'update_item' => __('Update FAQ Category'),
        'add_new_item' => __('Add New FAQ Category'),
        'new_item_name' => __('New FAQ Category'),
        'menu_name' => __('FAQ Categories'),
    );
    $args = array(
        'labels' => $labels,
        'hierarchical' => true,
    );
    register_taxonomy('hs_faq_taxomomy', 'hs_faq', $args);
}

add_action('init', 'hs_faq_post_taxomomy', 0);

/* Load CSS and Javascript for plugin */

function hsfaq_frontend_scripts_and_styles() {
    wp_enqueue_style('main-style', plugins_url('hs-simple-faq/inc/css/hs-faq.css'));
}

add_action('wp_enqueue_scripts', 'hsfaq_frontend_scripts_and_styles');

/*
 * Add [hs-faq limit="-1"] shortcode
 *
 */

function hs_faq_shortcode($atts, $content = null) {

    extract(shortcode_atts(array(
                "limit" => ''
                    ), $atts));

    // Define limit
    if ($limit) {
        $posts_per_page = $limit;
    } else {
        $posts_per_page = '-1';
    }

    ob_start();

    // Create the Query
    $post_type = 'hs_faq';
    $orderby = 'post_date';
    $order = 'DESC';

    //Load the frontend
    require( 'inc/front-end.php' );

    // Reset query to prevent conflicts
    return ob_get_clean();
}
add_shortcode("hs-faq", "hs_faq_shortcode");

/*
 * Add [hs-faq-cat id="id"] shortcode
 *
 */
function hs_faq_shortcode_cat($atts, $content = null) {

    extract(shortcode_atts(array(
                "id" => ''
                    ), $atts));

    // get cat id
    if ($id) {
        $term_id = $id;
    }
    ob_start();

    // Create the Query
    $post_type = 'hs_faq';
    $orderby = 'post_date';
    $order = 'DESC';

    $query = new WP_Query(array(
                'post_type' => $post_type,
                'posts_per_page' => -1,
                'orderby' => $orderby,
                'order' => $order,
                'no_found_rows' => 1,
                'tax_query' => array(
                                    array(
                                        'taxonomy' => 'hs_faq_taxomomy',
                                        'terms' => $term_id
                                    )
                                )
                )
    );

    //Get post type count
    $post_count = $query->post_count;
    
    if ($post_count > 0) :
    // Displays FAQ info
    echo '<section class="hs-faq-container">';
    // Loop
    while ($query->have_posts()) : $query->the_post();
    
    $i = get_the_ID();
    
    echo '<div>';
    $title = get_the_title();
    echo '<input id="ac-' . $i . '" name="accordion-1" type="radio"  />';
    echo '<label for="ac-' . $i . '"><i class="hs-question-icon"></i>' . $title . '</label>';
    echo '<article class="ac-small">';
        the_content();   
    echo '</article>'; 
    
    echo '</div>';
    
    endwhile;
    echo '</section>';
    endif;

    // Reset query to prevent conflicts
    wp_reset_query();
    return ob_get_clean();
}

    add_shortcode("hs-faq-cat", "hs_faq_shortcode_cat");
/**
 * Enqueue link to add CSS through PHP
 */
function hsfaq_register_style() {
        wp_register_style( 'hscss_style', '/?hscss=1' );
        wp_enqueue_style( 'hscss_style' );
}

add_action( 'wp_enqueue_scripts', 'hsfaq_register_style', 99 );

/**
 * Add Query Var Stylesheet trigger
 */
function hscss_add_trigger( $vars ) {
        $vars[] = 'hscss';
        return $vars;
}

add_filter( 'query_vars','hscss_add_trigger' );

/**
 * If trigger (query var) is tripped, load our pseudo-stylesheet
 */
function hscss_trigger_check() {
        if ( intval( get_query_var( 'hscss' ) ) == 1 ) {
                ob_start();
                        header( 'Content-type: text/css' );
                        $options = get_option( 'hscss_settings' );
                        $raw_content = isset( $options['hscss-content'] ) ? $options['hscss-content'] : '';
                        $esc_content = esc_html( $raw_content );
                        $content     = str_replace( '&gt;', '>', $esc_content );
                        echo $content;
                        exit;
                ob_clean();
        }
}

add_action( 'template_redirect', 'hscss_trigger_check' );

/**
 * Register settings
 */
function hscss_register_settings() {
        register_setting( 'hscss_settings_group', 'hscss_settings' );
}

add_action( 'admin_init', 'hscss_register_settings' );

function hsfaq_settings_page() {

        $options = get_option( 'hscss_settings' );
        $content = isset( $options['hscss-content'] ) ? $options['hscss-content'] : '';

        if ( isset( $_GET['settings-updated'] ) ) : ?>
                <div id="message" class="updated"><p><?php _e( 'Custom CSS updated successfully.' ); ?></p></div>
<?php 
        endif;
        require( 'inc/hs-faq-option-page.php' );
 }
?>