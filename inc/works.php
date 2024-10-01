<?php
  add_theme_support('post-thumbnails');
  function works_register() {
    $lables = array(
      'name' => 'works',
      'singular_name' => 'work',
      'menu_name' => '作品集',
      'add_new' => '添加作品',
      'add_new_item' => '添加新作品',
      'edit_item' => '编辑作品',
      'new_item' => '新作品',
      'all_items' => '所有作品',
      'view_item' => '查看作品',
      'search_items' => '搜索作品',
    );

    $args = array(
      'labels' => $lables,
      'public' => true,
      'has_archive' => true,
      'show_ui' => true,
      'publicly_queryable' => true,
      'query_var' => true,
      'rewrite' => true,
      'capability_type' => 'post',
      'hierarchical' => false,
      'menu_position' => null,
      // 缩略图
      'supports' => array('title', 'editor', 'thumbnail', 'excerpt', 'thumbnail'),
      'show_in_rest'       => true, // For Gutenberg editor support
      'show_in_graphql'    => true, // Enable WPGraphQL support
      'graphql_single_name'=> 'work', // GraphQL single name
      'graphql_plural_name'=> 'Works', // GraphQL plural name
    );

    register_post_type('works', $args);
  }

  add_action('init', 'works_register');