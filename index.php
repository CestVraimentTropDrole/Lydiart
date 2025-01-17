<?php
    /*
        Template Name: Single
    */    

?>

<?php get_header(); ?>
    
        <!--Section Article-->
        <section id="article" class="flex flex-col items-center gap-14 py-20 px-24">
            <h4><?php echo(get_the_title()); ?></h4>
            <div>
                <?php echo(get_the_post_thumbnail()); ?>
            </div>
            <div class="w-full flex flex-col items-start font-poppins font-light"><?php echo(get_the_content()); ?></div>
        </section>

<?php get_footer(); ?>