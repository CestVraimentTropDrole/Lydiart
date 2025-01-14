<?php
/*
    Template Name: About
*/

    /*Section Presentation*/
    $presentation = get_field(selector: 'presentation');
    $image = $presentation['image'];
    $src1 = $image['url'];
    $alt1 = $image['title'];

    /*Section Démarche*/
    $demarche = get_field(selector: 'demarche');

    foreach ($demarche as $key => $value) {
        if (!is_null($value)) {
            $frame[] = $value;
        }
    }
?>

<?php get_header(); ?>
    
    <div class="w-full h-fit flex flex-col gap-20">
        <!--Section Présentation-->
        <section id="presentation" class="w-full h-dvh flex flex-row justify-between">
            <img class="w-1/2 h-full object-cover" src="<?php echo($src1); ?>" alt="<?php echo($alt1); ?>">
            <div class="w-1/2 flex flex-col justify-center px-24 gap-6">
                <div class="flex flex-col gap-3">
                    <h2><?php echo($presentation['title']); ?></h2>
                    <p class="font-poppins font-light"><?php echo($presentation['description']); ?></p>
                </div>
            </div>
        </section>

        <!--Section Démarche-->
        <section id="démarche" class="w-full flex flex-col gap-12 justify-between px-10 py-3">
            <div class="flex gap-5 items-center">
                <img src="<?php echo($frame[0]['image']['url']); ?>" alt="<?php echo($frame[0]['image']['title']); ?>" class="w-1/2 shadow-frame">
                <div class="flex flex-col gap-4">
                    <h3><?php echo($frame[0]['title']); ?></h3>
                    <p class="font-poppins font-light text-sm"><?php echo($frame[0]['description']); ?></p>
                </div>
            </div>
            <div class="flex gap-5 items-center">
                <div class="flex flex-col gap-4">
                    <h3><?php echo($frame[1]['title']); ?></h3>
                    <p><?php echo($frame[1]['description']); ?></p>
                </div>
                <img src="<?php echo($frame[1]['image']['url']); ?>" alt="<?php echo($frame[1]['image']['title']); ?>"  class="w-1/2 shadow-frame">
            </div>
            <div class="flex gap-5 items-center">
                <img src="<?php echo($frame[2]['image']['url']); ?>" alt="<?php echo($frame[2]['image']['title']); ?>"  class="w-1/2 shadow-frame">
                <div class="flex flex-col gap-4">
                    <h3><?php echo($frame[2]['title']); ?></h3>
                    <p><?php echo($frame[2]['description']); ?></p>
                </div>
            </div>
            <div class="flex gap-5 items-center">
                <div class="flex flex-col gap-4">
                    <h3><?php echo($frame[3]['title']); ?></h3>
                    <p><?php echo($frame[3]['description']); ?></p>
                </div>
                <img src="<?php echo($frame[3]['image']['url']); ?>" alt="<?php echo($frame[3]['image']['title']); ?>"  class="w-1/2 shadow-frame">
            </div>
            <div class="flex gap-5 items-center">
                <img src="<?php echo($frame[4]['image']['url']); ?>" alt="<?php echo($frame[4]['image']['title']); ?>"  class="w-1/2 shadow-frame">
                <div class="flex flex-col gap-4">
                    <h3><?php echo($frame[4]['title']); ?></h3>
                    <p><?php echo($frame[4]['description']); ?></p>
                </div>
            </div>
        </section>

    <?php get_footer(); ?>