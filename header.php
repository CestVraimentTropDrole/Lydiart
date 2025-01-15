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
  <body class="h-full top-0 flex flex-row bg-blanc">
    <header class="h-dvh top-0 sticky shadow-head w-1/4">
      <div class="menu-container h-full py-8 px-7 flex flex-col items-center justify-between">
        <a href="<?php echo home_url(); ?>/index.php/accueil/">
          <img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo.png" alt="Logo" class="w-28 h-32">
        </a>

        <?php wp_nav_menu(array('menu' => 'primary_menu')); ?>

        <div class="menu-link-container w-full flex flex-col gap-3">
          <ul>
            <li class="menu-item-object-page"><a class="text-sm" href="http://localhost/lydia_fize/index.php/mentions-legales/">Mentions légales</a></li>
            <li class="menu-item-object-page"><a class="text-sm" href="http://localhost/lydia_fize/index.php/politique-de-confidentialite/">Politique de confidentialité</a></li>
          </ul>
          <ul class="flex flex-row gap-2">
            <li class="menu-item-object-page"><a href="https://www.instagram.com/lydiafize_art/" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon_insta.svg" alt="Instagram"></a></li>
            <li class="menu-item-object-page"><a href="https://www.facebook.com/lydiafizeartiste" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon_fb.svg" alt="Facebook"></a></li>
            <li class="menu-item-object-page"><a href="https://www.linkedin.com/search/results/all/?fetchDeterministicClustersOnly=true&heroEntityKey=urn%3Ali%3Afsd_profile%3AACoAABNkcyMB2Cg01P7QQnouz-U4wptWBvjm4Og&keywords=lydia%20fize%20%F0%9F%8E%A8&origin=RICH_QUERY_TYPEAHEAD_HISTORY&position=0&searchId=94449be0-7005-430a-924d-5d23b3d693a4&sid=bvW&spellCorrectionEnabled=true" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon_in.svg" alt="LinkedIn"></a></li>
            <li class="menu-item-object-page"><a href="https://linktr.ee/lydiafizeartist" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon_linktree.svg" alt="Linktree"></a></li>
          </ul>
        </div>
      </div>
    </header>