<?php
    /*
        Template Name: News
    */    
?>

<?php get_header(); ?>
    
    <div class="w-full h-fit flex flex-col gap-16">
        <!--Section Actus-->
        <section class="flex flex-col gap-14 py-20">

            <pre><?php 
                $posts = get_posts();
                var_dump($posts);
                $date = new DateTime($posts[0]->post_date_gmt);
                $title = get_the_title($posts[0]);
                $date_part = $date->format('d/m/Y');
                $time_part = $date->format('G\hi');
            ?></pre>

            <div class="w-full flex gap-12 px-12 items-center">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/DSC_0015.jpg" alt="Photo" class="w-1/2">
                <div class="flex flex-col justify-start gap-12">
                    <p class="font-poppins text-lg"><?php echo "$title"; ?></p>
                    <p class="font-poppins text-xs">Publié le <?php echo "$date_part"; ?> à <?php echo "$time_part"; ?></p>
                </div>
            </div>
        </section>

        <?php get_footer(); ?>