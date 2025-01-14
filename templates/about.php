<?php
/*
    Template Name: About
*/

    /*Section Presentation*/
    $presentation = get_field(selector: 'presentation');
    $image = $presentation['image'];
    $src1 = $image['url'];
    $alt1 = $image['title'];
?>

<?php get_header(); ?>
    
    <div class="w-full h-fit flex flex-col gap-12">
        <!--Section Présentation-->
        <section id="presentation" class="w-full h-dvh flex flex-row justify-between">
            <img class="w-1/2 h-full object-cover" src="<?php echo($src1); ?>" alt="<?php echo($alt1); ?>">
            <div class="w-1/2 flex flex-col justify-center px-24 gap-6">
                <div class="flex flex-col gap-3">
                    <h2><?php echo($presentation['title']); ?></h2>
                    <p><?php echo($presentation['description']); ?></p>
                </div>
            </div>
        </section>

        <!--Section Démarche-->
        <section id="démarche" class="w-full flex flex-row justify-between">
        </section>

    <?php get_footer(); ?>