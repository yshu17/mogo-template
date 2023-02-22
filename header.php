<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
  <meta name="viewport" content="width=device-width" />
  <meta charset="<?php bloginfo('charset'); ?>">
  <title><?php echo wp_get_document_title(); ?></title>
  <?php wp_head(); ?>
</head>

<body>
  <header class="header">
    <div class="header_main_row">
      <h1 class="logo_wrap header_mod"><a href="#" class="logo_text header_mod">MoGo</a></h1>
    </div>
    <div class="menu_trigger_wrap">
      <div id="menu_trigger" class="menu_trigger"><span class="menu_trigger_decor"></span></div>
    </div>
    <?php
      wp_nav_menu(
        array(
          'container_class' => 'header_menu_row',
          'menu_class' => 'header_menu_list',
          'theme_location' => 'top',
          'container' => 'nav',
          'link_class' => 'header_menu_link'   
      ));
    ?>
  </header>