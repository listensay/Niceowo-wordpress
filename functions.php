<?php
// 主题框架
require_once get_theme_file_path() .'/inc/codestar-framework/codestar-framework.php';
require get_theme_file_path(). '/inc/settings.php';
// 作品集
require get_theme_file_path(). '/inc/works.php';
// 基础功能
require get_theme_file_path(). '/inc/basic.php';
// Codestar Framework settings
require get_theme_file_path(). '/inc/cfs.php';

function my_theme_github_updater() {
  require_once get_template_directory() . '/updater.php';
}
add_action('after_setup_theme', 'my_theme_github_updater');
