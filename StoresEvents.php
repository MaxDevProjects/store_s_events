<?php
/*
 * Plugin Name: Store's events
Plugin URI: null
Description: This pluggin is for alert customer of your site. Hey its the Holidays 🌴 you must be wait my come back for to receive your command
Author: Maxime G. Martin ( Clower Web Conception )
Version: 0.0.1
Author URI: https://www.clower.fr/
 */

class StoresEvents
{
    public function __construct()
    {
        $this->hooks();
    }

    function func_load_script() {
        wp_enqueue_script( 'my-vue-app-vendors',
            plugins_url( '/build/js/chunk-vendors.js', __FILE__ ),
            array(),
            '1.0.0'
        );
        wp_enqueue_script( 'my-vue-app',
            plugins_url( '/build/js/app.js', __FILE__ ),
            array( 'my-vue-app-vendors' ),
            '1.0.0'
        );
        wp_enqueue_style( 'my-vue-app',
            plugins_url( '/build/css/app.css', __FILE__),
            array(),
            '1.0.0'
        );
    }

    /*
     * Informations should be return for display the plugin in admin menu
     */
    public function admin_store_s_events_plugin_menu() {
        add_menu_page(
            __('Store\'s events', 'store-s-events'),    //titre de la page
            __('Store\'s events', 'store-s-events'),    // titre du menu
            'manage_options', //Capability
            'store-s-events-plugin', //Slug
            [&$this, 'load_store_s_events_plugin_page'] // Callback page function
        );
    }

    // content of plugin page
    public function load_store_s_events_plugin_page() {
        echo '<h1>'. __('Store\'s events', 'store-s-events') . '</h1>';
        echo '<p>'. __('Notify your customers about <strong>Store\'s events</strong> 🌴', 'store-s-events') . '</p>';
        $this->store_s_events_content();
    }

    function store_s_events_content() {
        $this->func_load_script();
        echo "<div id='app'></div>";
    }

    private function hooks()
    {
        //add plugin in admin menu list
        add_action("admin_menu", [$this, 'admin_store_s_events_plugin_menu']);
//        //add action for translate plugin
//        add_action('plugins_loaded', [$this, 'load_plugin_text_domain']);
        //hook de chargement des scripts
        add_action('wp_enqueue_scripts',[$this, 'func_load_script']);
        add_shortcode( 'wpvue', 'store_s_events_content' );


        /**
         *Script that import modules must use a script tag with type="module",
         * so let's set it for the script.
         */
        add_filter( 'script_loader_tag', function ( $tag, $handle, $src ) {

            switch ( $handle ) {
                case 'main':
                    return '<script type="module" src="' . esc_url( $src ) . '"></script>';
                    break;

                default:
                    return $tag;
                    break;
            }

        }, 10, 3 );
    }
}

new StoresEvents();