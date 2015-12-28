<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of class-gallery-content-type
 *
 * @author Anup Biswas <anup@illusivedesign.net>
 */
class Gallery_Content_Type {

  private $post_type = 'eli_gallery';
  private $slug = 'gallery';
  private $lan = ELUSICVE_THEME_LAN;
  private $taxonomy = 'gallery-album';

  function __construct() {
    add_action('init', array($this, 'register'));
    add_action('init', array($this, 'taxonomies'));
    add_shortcode('gallerys', array($this, 'shortcodes'));
    add_action('wp_enqueue_scripts', array($this, 'scripts'));
    $this->metabox();
  }

  function scripts() {
    wp_enqueue_style('grid-7', ELUSICVE_THEME_ASSETS . 'css/grid-7.css');
    wp_enqueue_style('chocolat-css', ELUSICVE_THEME_ASSETS . 'chocolat-lightbox/css/chocolat.css');
    wp_enqueue_script('isotope', ELUSICVE_THEME_ASSETS . 'js/vendor/isotope.pkgd.min.js', array('jquery'), 3.0, TRUE);
    wp_enqueue_script('chocolat-lightbox', ELUSICVE_THEME_ASSETS . 'chocolat-lightbox/js/jquery.chocolat.min.js', array('jquery'), 3.0, TRUE);
    wp_enqueue_script('eli-gallery', ELUSICVE_THEME_ASSETS . 'js/eli-gallery.js', array('jquery', 'isotope', 'jquery-masonry'), 1.0, TRUE);
  }

  public function register() {
    $gallery_labels = array(
      'name' => _x('Gallery', 'post type general name', $this->lan),
      'singular_name' => _x('Gallery', 'post type singular name', $this->lan),
      'menu_name' => _x('Gallerys', 'admin menu', $this->lan),
      'name_admin_bar' => _x('Gallery', 'add new on admin bar', $this->lan),
      'add_new' => _x('Add New', 'Gallery', $this->lan),
      'add_new_item' => __('Add New Gallery', $this->lan),
      'new_item' => __('New Gallery', $this->lan),
      'edit_item' => __('Edit Gallery', $this->lan),
      'view_item' => __('View Gallery', $this->lan),
      'all_items' => __('All Gallerys', $this->lan),
      'search_items' => __('Search Gallerys', $this->lan),
      'parent_item_colon' => __('Parent Gallerys:', $this->lan),
      'not_found' => __('No gallerys found.', $this->lan),
      'not_found_in_trash' => __('No gallerys found in Trash.', $this->lan)
    );
    $gallery_arg = array(
      'labels' => $gallery_labels,
      'description' => __('Description.', $this->lan),
      'public' => true,
      'publicly_queryable' => true,
      'show_ui' => true,
      'show_in_menu' => true,
      'query_var' => true,
      'rewrite' => array('slug' => $this->slug),
      'capability_type' => 'post',
      'has_archive' => true,
      'hierarchical' => false,
      'menu_position' => null,
      'show_in_nav_menus' => FALSE,
      'supports' => array('title', 'excerpt'),
      'menu_icon' => ELUSICVE_THEME_ADMIN_URI . '/images/icon-gallery.png'
    );
    register_post_type($this->post_type, $gallery_arg);
  }

  public function taxonomies() {
    $labels = array(
      'name' => _x('Gallery Album', 'taxonomy general name'),
      'singular_name' => _x('Album', 'taxonomy singular name'),
      'search_items' => __('Search Albums'),
      'all_items' => __('All Albums'),
      'parent_item' => __('Parent Album'),
      'parent_item_colon' => __('Parent Album:'),
      'edit_item' => __('Edit Album'),
      'update_item' => __('Update Album'),
      'add_new_item' => __('Add New Album'),
      'new_item_name' => __('New Album Name'),
      'menu_name' => __('Album'),
    );

    $args = array(
      'hierarchical' => true,
      'labels' => $labels,
      'show_ui' => true,
      'show_admin_column' => true,
      'query_var' => true,
      'rewrite' => array('slug' => $this->taxonomy),
    );

    register_taxonomy($this->taxonomy, $this->post_type, $args);
  }

  public function shortcodes($attrs, $content) {
    $atts = shortcode_atts(array(
      'title' => '',
      'column' => '3',
      'cat' => '',
        ), $attrs, 'gallerys');
  }

  function metabox() {
    if (function_exists("register_field_group")) {
      register_field_group(array(
        'id' => 'acf_album_metabox',
        'title' => 'Cover Photo',
        'fields' => array(
          array(
            'key' => 'gallery_album_cover',
            'label' => 'Cover Image',
            'name' => 'cover_image',
            'type' => 'image',
            'save_format' => 'object',
            'preview_size' => 'thumbnail',
            'library' => 'all',
          ),
          array(
            'key' => 'gallery_custom_order',
            'label' => 'Order',
            'name' => 'custom_order',
            'type' => 'number',
            'default_value' => '1',
            'placeholder' => '',
            'prepend' => '',
            'append' => '',
            'min' => '',
            'max' => '',
            'step' => '',
          ),
        ),
        'location' => array(
          array(
            array(
              'param' => 'ef_taxonomy',
              'operator' => '==',
              'value' => 'gallery-album',
              'order_no' => 0,
              'group_no' => 0,
            ),
          ),
        ),
        'options' => array(
          'position' => 'normal',
          'layout' => 'default',
          'hide_on_screen' => array(
          ),
        ),
        'menu_order' => 0,
      ));

      register_field_group(array(
        'id' => 'acf_images',
        'title' => 'Images',
        'fields' => array(
          array(
            'key' => 'gallery_image_grid_size',
            'label' => 'Grid Size',
            'name' => 'grid_size',
            'type' => 'radio',
            'instructions' => 'Select a size depends on your thumbnail size',
            'choices' => array(
              'small' => 'Small',
              'medium' => 'Medium',
              'large' => 'Large',
            ),
            'other_choice' => 0,
            'save_other_choice' => 0,
            'default_value' => 'small',
            'layout' => 'horizontal',
          ),
          array(
            'key' => 'gallery_image_thumbnail',
            'label' => 'Thumbnail',
            'name' => 'thumbnail',
            'type' => 'image',
            'instructions' => 'Small (150X110), Medium (320X230),	Large (450X350) in pixel
	',
            'save_format' => 'url',
            'preview_size' => 'thumbnail',
            'library' => 'all',
          ),
          array(
            'key' => 'gallery_image_origianl_image',
            'label' => 'Preview Image',
            'name' => 'origianl_image',
            'type' => 'image',
            'instructions' => 'Any size try max width 1920px, when upload add image meta data. e.g. Title, Caption, Alternative Text, Description
	',
            'save_format' => 'object',
            'preview_size' => 'thumbnail',
            'library' => 'all',
          ),
          array(
            'key' => 'gallery_image_custom_order',
            'label' => 'Order',
            'name' => 'custom_order',
            'type' => 'number',
            'default_value' => 1,
          ),
        ),
        'location' => array(
          array(
            array(
              'param' => 'post_type',
              'operator' => '==',
              'value' => 'eli_gallery',
              'order_no' => 0,
              'group_no' => 0,
            ),
          ),
        ),
        'options' => array(
          'position' => 'acf_after_title',
          'layout' => 'default',
          'hide_on_screen' => array(
          ),
        ),
        'menu_order' => 0,
      ));
    }
  }

}

new Gallery_Content_Type();

function get_eli_gallerys($args = array()) {
  $defaults = array(
    'post_type' => 'eli_gallery',
    'orderby' => 'meta_value_num',
    'order' => 'ASC',
    'meta_key' => 'custom_order',
    'posts_per_page' => -1,
  );
  $args = wp_parse_args($args, $defaults);
  $gallerys_query = get_posts($args);
  $gallerys_data = array();
  if (!empty($gallerys_query)) {
    foreach ($gallerys_query as $key => $gallery) {
      $sdata = new stdClass();
      $sdata->title = $gallery->post_title;
      $sdata->grid_size = get_field('grid_size', $gallery->ID);
      $thumbnail_att_id = get_field('thumbnail', $gallery->ID);
      $sdata->thumbnail = wp_get_attachment_url($thumbnail_att_id);
      $org_att_id = get_field('origianl_image', $gallery->ID);
      $sdata->preview = wp_get_attachment_url($org_att_id);
      $gallerys_data[$key] = $sdata;
    }
  }
  return $gallerys_data;
}

function get_eli_gallery_grid_col($size) {
  $size = trim($size);
  $col = 1;
  switch ($size) {
    case 'large':
      $col = 3;
      break;
    case 'medium':
      $col = 2;
      break;
    case 'small':
      $col = 1;
      break;
  }
  return $col;
}
