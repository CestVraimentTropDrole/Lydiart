<?php
    /*
        Template Name: News
    */    
?>

<?php get_header(); ?>
    
        <!--Section Actus-->
        <section class="w-full flex flex-col gap-14 py-20">
            <div class="hidden lg:absolute lg:block overflow-hidden z-0 w-full left-[25-dvh] h-[75%]">
                <div class="lottie-animation" data-lottie="<?php echo get_template_directory_uri(); ?>/assets/images/trait.json"></div>
            </div>

            <?php 
                $posts = get_posts(); 

                for ($i=0; $i<count($posts); $i++) {
                    $date = new DateTime($posts[$i]->post_date_gmt);
                    $title = get_the_title($posts[$i]);
                    $date_part = $date->format('d/m/Y');
                    $time_part = $date->format('G\hi');
                    $image = get_the_post_thumbnail($posts[$i]);
                    $link = get_permalink($posts[$i]);
                    $direction = NULL;

                    if ($i%2 !== 0) { //Toutes les 2 sections, sa direction est inversée
                        $direction = 'lg:flex-row-reverse';
                    }

                    echo("<a href=". $link ." class='w-full flex flex-col lg:flex-row ". $direction ." gap-6 lg:gap-12 lg:px-12 items-center z-10'>
                            <div class='w-full lg:w-1/2'>
                                ". $image ."
                            </div>
                            <div class='w-3/4 lg:w-1/2 flex flex-col justify-start gap-4 lg:gap-12'>
                                <p class='font-poppins text-lg'>". $title ."</p>
                                <p class='font-poppins text-xs'>Publié le ". $date_part ." à ". $time_part ."</p>
                            </div>
                        </a>");
                }
            ?>

        </section>

        <?php get_footer(); ?>