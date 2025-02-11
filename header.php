<!DOCTYPE html>
<html lang="fr" class="w-dvh overflow-x-hidden">
  <head>
    <meta charset="UTF-8">
    <title><?php bloginfo('name'); ?></title>
    <link href="<?php echo get_template_directory_uri(); ?>/css/output.css" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <!--Media Queries-->
    <!--Lottie Files Web Player--> 
    <script src="https://cdnjs.cloudflare.com/ajax/libs/lottie-web/5.9.6/lottie.min.js"></script>

    <!--Font Playfair Display-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400..900;1,400..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    
    <!--Font Poppins-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    
    <?php wp_head(); ?>
  </head>

  <body class="h-full w-dvh top-0 flex lg:flex-row bg-blanc overflow-x-hidden">
    
    <header class="w-full h-fit lg:h-dvh top-0 lg:bottom-0 fixed shadow-head lg:w-[25vw] z-50 bg-blanc">
      <div class="menu-container h-fit p-4 lg:py-8 lg:px-7 flex flex-col gap-8 items-center justify-between z-0 relative lg:h-full">
        
        <!-- Conteneur du logo et du bouton burger -->
        <div class="w-full h-fit flex justify-between px-4 lg:px-0 lg:justify-center">
          <a href="<?php echo home_url(); ?>/">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo.png" alt="Logo" class="w-12 h-16 lg:w-28 lg:h-32">
          </a>

          <button class="lg:hidden" id="burger-menu">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/menu.svg" alt="Menu">
          </button>
        </div>

        <!-- Menu desktop -->
        <div id="desktop-menu" class="hidden lg:flex flex-col items-start w-full h-3/5 justify-between">
          <?php wp_nav_menu(array('menu' => 'primary_menu')); ?>

          <div class="menu-link-container w-full flex flex-col gap-3">
            <ul>
              <li><a class="text-sm" href="<?php echo home_url(); ?>/mentions-legales/">Mentions légales</a></li>
              <li><a class="text-sm" href="<?php echo home_url(); ?>/politique-de-confidentialite/">Politique de confidentialité</a></li>
            </ul>
            <ul class="flex flex-row gap-2">
              <li class="menu-item-object-page"><a href="https://www.instagram.com/lydiafize_art/" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon_insta.svg" alt="Instagram" class="text-base"></a></li>
              <li class="menu-item-object-page"><a href="https://www.facebook.com/lydiafizeartiste" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon_fb.svg" alt="Facebook" class="text-base"></a></li>
              <li class="menu-item-object-page"><a href="https://www.linkedin.com/in/lydiafize/" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon_in.svg" alt="LinkedIn" class="text-base"></a></li>
              <li class="menu-item-object-page"><a href="https://linktr.ee/lydiafizeartist" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon_linktree.svg" alt="Linktree" class="text-base"></a></li>
            </ul>
          </div>
        </div>

        <!-- Menu mobile -->
        <div id="mobile-menu" class="hidden lg:hidden left-0 h-full flex-col justify-between items-center gap-12 w-full p-8">
          <?php wp_nav_menu(array('menu' => 'primary_menu')); ?>
          <div class="menu-link-container flex flex-col items-center gap-4 lg:gap-3 text-center">
            <ul class="flex flex-col gap-2">
              <li class="menu-item-object-page"><a class="text-base lg:text-sm" href="<?php echo home_url(); ?>/mentions-legales/">Mentions légales</a></li>
              <li class="menu-item-object-page"><a class="text-base lg:text-sm" href="<?php echo home_url(); ?>/politique-de-confidentialite/">Politique de confidentialité</a></li>
            </ul>
            <ul class="flex flex-row gap-6 lg:gap-2 w-full items-center justify-center">
              <li class="menu-item-object-page"><a href="https://www.instagram.com/lydiafize_art/" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon_insta.svg" alt="Instagram" class="w-10"></a></li>
              <li class="menu-item-object-page"><a href="https://www.facebook.com/lydiafizeartiste" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon_fb.svg" alt="Facebook" class="w-10"></a></li>
              <li class="menu-item-object-page"><a href="https://www.linkedin.com/in/lydiafize/" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon_in.svg" alt="LinkedIn" class="w-10"></a></li>
              <li class="menu-item-object-page"><a href="https://linktr.ee/lydiafizeartist" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon_linktree.svg" alt="Linktree" class="w-10"></a></li>
            </ul>
          </div>
        </div>
      </div>
    </header>


    <!--Si la page actuelle est contact.php, retirer le gap-->
    <div class="w-full mt-24 lg:mt-0 lg:w-3/4 h-fit flex flex-col <?php echo is_page() && !is_page('me-contacter') ? 'gap-16' : ''; ?> lg:ml-[25vw]">
