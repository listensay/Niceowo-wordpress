<?php
  // GraphQL
  add_action( 'graphql_register_types', function() {
    // 注册自定义字段，将 Codestar Framework 的设置暴露出来
    register_graphql_field( 'RootQuery', 'website', [
      'type' => 'website', // 自定义类型
      'description' => 'Codestar Framework settings',
      'resolve' => function() {
        $theme_options = get_option('Niceowo');
        return $theme_options; 
      }
    ]);

    // 注册 SocialLink 对象类型
    register_graphql_object_type( 'SocialLink', [
      'description' => '社交链接详情',
      'fields' => [
          'name' => [
              'type' => 'String',
              'description' => '社交网络的名称',
          ],
          'icon' => [
              'type' => 'String',
              'description' => '社交网络的图标',
          ],
          'url' => [
              'type' => 'String',
              'description' => '社交网络的链接地址',
          ],
      ]
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
        'build_date' => [
          'type' => 'String',
          'description' => '建站日期',
        ],
        'copyright' => [
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
          'type' => ['list_of' => 'SocialLink'],
          'description' => '社交网络链接列表',
          'resolve' => function($root) {
            if (empty($root['social_links'])) {
              return [];
            }
            if (is_null($root['social_links'])) {
              return [];
            } else {
              return $root['social_links'];
            }
          }
        ]
      ]
    ]);
  });
