<?php
if (!defined('ABSPATH')) {
    exit;
}

if (!class_exists('Eqs_Vehicles')) :
    
    class Eqs_Vehicles
    {
        public function __construct()
        {
            add_action( 'init', array($this, 'eqs_create_vehicles_posttype_taxonomies'));
            add_action( 'add_meta_boxes', array($this, 'eqs_vehicle_meta_boxes') );
            add_action( 'save_post', array($this, 'eqs_vehicle_meta_boxes_save') );
            add_action( 'pre_get_posts', array($this, 'add_my_post_types_to_query') );
        }

        public function eqs_create_vehicles_posttype_taxonomies()
        {
            register_post_type( 'vehicles',
                array(
                    'labels' => array(
                        'name' => __( 'Vehicles' ),
                        'singular_name' => __( 'Vehicle' )
                    ),
                    'public' => true,
                    'has_archive' => true,
                    'rewrite' => array('slug' => 'vehicles'),
                    'show_in_rest' => true,
                    'supports' => array( 'title', 'editor', 'excerpt', 'author', 'thumbnail', 'comments', 'revisions', 'custom-fields', ),
                    'taxonomies' => array( 'vehicle_types' ),    
                    'show_in_menu'        => true,
                    'show_in_nav_menus'   => true,
                    'menu_icon'   => 'dashicons-car',
                )
            );

            register_taxonomy('vehicle_types',array('vehicles'), array(
                'hierarchical' => true,
                'labels' => array(
                    'name' => __( 'Vehicle Types' ),
                    'singular_name' => __( 'Vehicle Type' )
                ),
                'show_ui' => true,
                'show_in_rest' => true,
                'show_admin_column' => true,
                'query_var' => true,
                'rewrite' => array( 'slug' => 'vehicle-type' ),
              ));
        }

        /**
         * Add meta box.
         */
        public function eqs_vehicle_meta_boxes()
        {
            add_meta_box( 
                'eqs-fields', 
                __( 'Vehicle Additional Info', 'eqs-vehicles' ), 
                array($this, 'eqs_metabox_cbk'), 
                'vehicles' );
        }

        /**
         * Meta box content.
         */
        public function eqs_metabox_cbk()
        {
            include EQS_VEHICLES_PATH . './templates/eqs-vehicle-info-form.php';
        }

        /**
         * Save meta box content.
         *
         * @param int $post_id Post ID
         */
        public function eqs_vehicle_meta_boxes_save( $post_id )
        {
            if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
            $fields = [
                'eqs_vehicle_number',
                'eqs_driver_name',
            ];
            foreach ( $fields as $field ) {
                if ( array_key_exists( $field, $_POST ) ) {
                    update_post_meta( $post_id, $field, sanitize_text_field( $_POST[$field] ) );
                }
            }
        }

        public function add_my_post_types_to_query($query)
        {
            if ( is_home() && $query->is_main_query() )
                $query->set( 'post_type', array( 'vehicles' ) );
            return $query;
        }
    }
endif;