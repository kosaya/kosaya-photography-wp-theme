<?php // Kosaya Theme

  function kosaya_scripts() {
    wp_enqueue_script(
      'masonry', 
      get_stylesheet_directory_uri().'/js/masonry.pkgd.min.js',
      array('jquery'),
      '1.0',
      true
    );
    wp_enqueue_script(
      'kosaya-script', 
      get_stylesheet_directory_uri().'/js/script.js',
      array('jquery', 'masonry'),
      '1.0',
      true
    );
  }
  add_action('wp_enqueue_scripts', 'kosaya_scripts');

  register_nav_menu( 'main-menu', 'Main Menu' );

  add_theme_support('post-thumbnails');

  // Portfolio Post Type
  add_action( 'init', 'portfolio_init' );
  function portfolio_init() {
    $labels = array(
      'name'               => _x( 'Portfolio Items', 'post type general name', 'kosaya' ),
      'singular_name'      => _x( 'Portfolio Item', 'post type singular name', 'kosaya' ),
      'menu_name'          => _x( 'Portfolio', 'admin menu', 'kosaya' ),
      'name_admin_bar'     => _x( 'Portfolio Item', 'add new on admin bar', 'kosaya' ),
      'add_new'            => _x( 'Add New', 'portfolio', 'kosaya' ),
      'add_new_item'       => __( 'Add New Portfolio Item', 'kosaya' ),
      'new_item'           => __( 'New Portfolio Item', 'kosaya' ),
      'edit_item'          => __( 'Edit Portfolio Item', 'kosaya' ),
      'view_item'          => __( 'View Portfolio Item', 'kosaya' ),
      'all_items'          => __( 'All Portfolio Items', 'kosaya' ),
      'search_items'       => __( 'Search Portfolio Items', 'kosaya' ),
      'parent_item_colon'  => __( 'Parent Portfolio Items:', 'kosaya' ),
      'not_found'          => __( 'No portfolio items found.', 'kosaya' ),
      'not_found_in_trash' => __( 'No portfolio items found in Trash.', 'kosaya' )
    );
    $args = array(
      'labels'             => $labels,
      'public'             => true,
      'publicly_queryable' => true,
      'show_ui'            => true,
      'show_in_menu'       => true,
      'query_var'          => true,
      'rewrite'            => array( 'slug' => 'portfolio' ),
      'capability_type'    => 'post',
      'has_archive'        => false,
      'hierarchical'       => false,
      'menu_position'      => null,
      'supports'           => array( 'title', 'thumbnail', 'excerpt' )
    );
    register_post_type( 'portfolio', $args );
  }

?>