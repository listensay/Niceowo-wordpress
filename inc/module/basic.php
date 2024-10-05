<?php
  // Create a section
  CSF::createSection( $prefix, array(
    'title'  => '基础设置',
    'fields' => array(
      // 网站LOGO
      array(
        'id'        => 'logo',
        'type'      => 'upload',
        'library'      => 'image',
        'button_title' => '上传LOGO',
        'remove_title' => '删除LOGO',
        'title'     => 'LOGO',
        'default'   => ''
      ),
      // 站点描述
      array(
        'id'       => 'description',
        'type'     => 'textarea',
        'title'    => '网站描述',
        'desc'     => '网站描述',
        'default'    => '未设置站点描述',
      ),
      // 网站背景
      array(
        'id'       => 'background',
        'type'     => 'background',
        'title'    => '网站背景',
        'desc'     => '网站背景',
        'default'    => array(
          'background-color' => 'rgb(191 219 254/1)',
        ),
      ),
      // 站点标语
      array(
        'id'       => 'slogan',
        'type'     => 'text',
        'title'    => '网站标语',
        'desc'     => '网站标语',
        'default'    => 'Welcome to My homepage',
      ),
      // 建站日期
      array(
        'id'       => 'build_date',
        'type'     => 'date',
        'title'    => '建站日期',
        'desc'     => '建站日期',
        'default'    => '2024-09-24',
      ),
      // 版权信息
      array(
        'id'       => 'copyright',
        'type'     => 'wp_editor',
        'title'    => '版权信息',
        'desc'     => '版权信息',
        'default'    => 'Copyright © 2024. All Rights Reserved.',
      ),
    )
  ));