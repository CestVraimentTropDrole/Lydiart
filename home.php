<?php
    /*
        Template Name: News
    */    
?>

<?php get_header(); ?>
    
    <div class="w-full h-fit flex flex-col gap-16">
        <!--Section Actus-->
        <section class="flex flex-col gap-14 py-20">
            <div class="w-full flex gap-12 px-12 items-center">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/DSC_0015.jpg" alt="Photo" class="w-1/2">
                <div class="flex flex-col justify-start gap-12">
                    <p class="font-poppins text-lg">Je vous souhaite à tous un joyeux Noël et de très bonnes fêtes de fin d'année</p>
                    <p class="font-poppins text-xs">Publié le 25/12/2024 à 12h38</p>
                </div>
            </div>
        </section>

        <?php get_posts(); ?>

        <?php get_footer(); ?>