<?php
    /*
        Template Name: Single
    */    

    $content = get_field('content');
?>

<?php get_header(); ?>
    
        <!--Section Article-->
        <section id="article" class="flex flex-col items-center gap-14 py-10 lg:py-20 lg:px-24">
            <h4><?php echo(get_the_title()); ?></h4>
            <div>
                <?php echo(get_the_post_thumbnail()); ?>
            </div>
            <div class="w-full flex flex-col items-start font-poppins font-light px-12 lg:px-0"><?php echo($content); ?></div>
        </section>

<?php get_footer(); ?>