<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="UTF-8">
    <title><?php bloginfo('name'); ?></title>
    <?php wp_head(); ?>
  </head>
  <body>
    <header>
      <h1><?php bloginfo('name'); ?></h1>
      <div class="menu-container">
        <?php wp_nav_menu(array('menu' => 'primary_menu')); ?>
      </div>
    </header>