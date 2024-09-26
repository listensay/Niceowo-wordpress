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

add_action( 'graphql_register_types', function() {
  // 注册自定义字段，将 Codestar Framework 的设置暴露出来
  register_graphql_field( 'RootQuery', 'website', [
    'type' => 'website', // 自定义类型
    'description' => 'Codestar Framework settings',
    'resolve' => function() {
      // 获取 Codestar Framework 的设置
      $theme_options = get_option('Niceowo'); // 修改 'csf_theme_options' 为实际使用的选项名称

      return [
        // 站点描述
        'description' => $theme_options['site_description'],
        // 站点LOGO
        'logo' => $theme_options['site_logo'],
        // 站点标语
        'slogan' => $theme_options['site_slogan'],
        // 建站日期
        'date' => $theme_options['site_build_date'],
        // 版权信息
        'copy' => $theme_options['site_copyright'],
        // 社交信息 头像
        'avatar' => $theme_options['avatar'],
        // 社交信息 网名昵称
        'nickname' => $theme_options['nickname'],
        // 社交信息 邮箱
        'email' => $theme_options['email'],
        // 社交信息 关于自己
        'about' => $theme_options['about'],
        // 社交信息 社交链接
        'social_links' => $theme_options['social_links'],
      ];
    }
  ]);

  // 注册 CodestarSettings 对象类型
  register_graphql_object_type( 'website', [
    'fields' => [
      'description' => [
        'type' => 'String',
        'description' => '站点描述',
      ],
      'logo' => [
        'type' => 'String',
        'description' => '站点LOGO',
      ],
      'slogan' => [
        'type' => 'String',
        'description' => '站点标语',
      ],
      'date' => [
        'type' => 'String',
        'description' => '建站日期',
      ],
      'copy' => [
        'type' => 'String',
        'description' => '版权信息 支持HTML',
      ],
      'avatar' => [
        'type' => 'String',
        'description' => '社交信息 头像',
      ],
      'nickname' => [
        'type' => 'String',
        'description' => '社交信息 网名昵称',
      ],
      'email' => [
        'type' => 'String',
        'description' => '社交信息 邮箱',
      ],
      'about' => [
        'type' => 'String',
        'description' => '社交信息 关于自己',
      ],
      'social_links' => [
        'type' => [
          'list_of' => 'SocialLink'
        ],
        'description' => '社交信息 社交链接',
      ]
    ]
  ]);
});
