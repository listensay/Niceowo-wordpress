<?php
  CSF::createSection( $prefix,
  // 社交
  array(
    'title'  => '社交',
    'fields' => array(
      array(
        'id'        => 'avatar',
        'type'      => 'upload',
        'library'      => 'image',
        'button_title' => '上传头像',
        'remove_title' => '删除头像',
        'title'     => '头像',
        'default'   => '',
      ),
      // 昵称
      array(
        'id'       => 'nickname',
        'type'     => 'text',
        'title'    => '昵称',
        'desc'     => '网名昵称',
        'default'    => '未设置昵称',
      ),
      // 邮箱
      array(
        'id'       => 'email',
        'type'     => 'text',
        'title'    => '邮箱',
        'desc'     => '个人邮箱',
        'default'    => '未设置邮箱',
      ),
      // 关于自己
      array(
        'id'       => 'about',
        'type'     => 'textarea',
        'title'    => '关于自己',
        'desc'     => '简介或个性签名',
        'default'    => '未设置关于自己',
      ),
      // 社交链接
      array(
        'id'       => 'social_links',
        'type'     => 'group',
        'title'    => '社交链接',
        'fields'    => array(
          array(
            'id'    => 'name',
            'type'  => 'text',
            'title' => '链接名称',
          ),
          array(
            'id'    => 'icon',
            'type'  => 'upload',
            'title' => '链接图标',
          ),
          array(
            'id'    => 'url',
            'type'  => 'text',
            'title' => '链接地址',
          ),
        )
      )
    )
  )
);