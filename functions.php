<?php
// 主题框架
require_once get_theme_file_path() .'/inc/codestar-framework/codestar-framework.php';
require get_theme_file_path(). '/inc/settings.php';

// 菜单设置
function register_custom_menu() {
  register_nav_menu( 'top', '顶部菜单' );
  register_nav_menu( 'main', '导航菜单' );
  register_nav_menu( 'right', '右侧菜单' );
}

add_action( 'after_setup_theme', 'register_custom_menu' );
