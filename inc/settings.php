<?php
// Control core classes for avoid errors
if( class_exists( 'CSF' ) ) {

  //
  // Set a unique slug-like ID
  $prefix = 'Nicewow';

  //
  // Create options
  CSF::createOptions( $prefix, array(
    'menu_title' => '主题设置',
    'menu_slug'  => 'Nicewow',
  ) );
  // 基础设置
  require get_theme_file_path(). '/inc/module/base.php';
  // 社交
  require get_theme_file_path(). '/inc/module/social.php';
  // 备份
  require get_theme_file_path(). '/inc/module/backup.php';

}
