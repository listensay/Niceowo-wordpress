<?php get_header(); ?>

<main>
  <div class="layout">
    <div class="left">
      <?php wp_nav_menu(array('theme_location' => 'main','menu_class'=>'nav-menu top-menu icon','container'=>'ul')); ?>
    </div>
    <div class="center">
      <?php wp_nav_menu(array('theme_location' => 'top','menu_class'=>'nav-menu top-menu icon','container'=>'ul')); ?>
    </div>
    <div class="rigjt">
      <?php wp_nav_menu(array('theme_location' => 'right','menu_class'=>'nav-menu top-menu icon','container'=>'ul')); ?>
    </div>
  </div>
</main>

<style>
.layout {
  display: flex;
  width: 1200px;
  margin: 0 auto;
  padding: 0 20px;
  overflow: hidden;
  box-sizing: border-box;
  background: skyblue;
}

.left {
  width: 300px;
  background: red;
  margin-right: 20px;
}

.center {
  flex: 1;
  background: green;
}

.right {
  width: 300px;
  background: blue;
}
</style>

<?php get_footer(); ?>
