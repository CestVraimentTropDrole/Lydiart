<?php
    /*
        Template Name: News
    */    
?>

<?php get_header(); ?>
    
    <div class="w-full h-fit flex flex-col gap-16">
        <!--Section Actus-->
        <section class="flex flex-col gap-14 py-20">

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
                        $direction = 'flex-row-reverse';
                    }

                    echo("<a href=". $link ." class='w-full flex ". $direction ." gap-12 px-12 items-center'>
                            <div class='w-1/2'>
                                ". $image ."
                            </div>
                            <div class='w-1/2 flex flex-col justify-start gap-12'>
                                <p class='font-poppins text-lg'>". $title ."</p>
                                <p class='font-poppins text-xs'>Publié le ". $date_part ." à ". $time_part ."</p>
                            </div>
                        </a>");
                }
            ?>

        </section>

        <?php get_footer(); ?>