<?php
/*
    Template Name: Contact
*/

    $title = get_field(selector: 'title');
    $description = get_field(selector: 'description');
    $image = get_field(selector: 'image');
?>

<?php get_header(); ?>

    <div class="relative">
        <!-- Image de fond -->
        <div class="w-full h-full absolute top-0 left-0 z-0">
            <img class="w-full h-full object-cover" src="<?php echo($image['url']); ?>" alt="<?php echo($presentation['title']); ?>">
        </div>

        <div class="w-full z-50 flex flex-col items-center py-20 px-10 gap-8 bg-[rgba(0,0,0,0.6)] relative">
            <h4 class="font-playfair text-blanc_full"><?php echo($title); ?></h4>
            <p class="w-3/4 font-poppins text-blanc_full text-center"><?php echo($description); ?></p>
            <?php echo do_shortcode('[contact-form-7 id="55a69d7" title="Formulaire de contact 1"]'); ?>
        </div>
    </div>

    <?php get_footer(); ?>