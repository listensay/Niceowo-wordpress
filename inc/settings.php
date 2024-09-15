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

  //
  // Create a section
  CSF::createSection( $prefix, array(
    'title'  => '基础设置',
    'fields' => array(

      //
      // A text field
      array(
        'id'       => 'logo',
        'type'     => 'upload',
        'title'    => '网站LOGO',
        'desc'     => '如果使用外部图像直接填入地址',
        'settings' => array(
            'button_title' => '选择图标',
            'frame_title'  => '选择一个图标',
            'insert_title' => '使用此图标',
        ),
        'attributes' => array(
            'placeholder' => 'LOGO URL',
        ),
        'default'    => '',
        ),

    )
  ) );

  //
  // Create a section
  CSF::createSection( $prefix, array(
    'title'  => 'Tab Title 2',
    'fields' => array(

      // A textarea field
      array(
        'id'    => 'opt-textarea',
        'type'  => 'textarea',
        'title' => 'Simple Textarea',
      ),

    )
  ) );

}
