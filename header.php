<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="UTF-8">
    <title><?php bloginfo('name'); ?></title>
    <link href="<?php echo get_template_directory_uri(); ?>/css/output.css" rel="stylesheet">
    <!--Font Playfair Display-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400..900;1,400..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <?php wp_head(); ?>
  </head>
  <body>
    <header>
      <div class="menu-container">
        <?php wp_nav_menu(array('menu' => 'primary_menu')); ?>
      </div>
    </header>