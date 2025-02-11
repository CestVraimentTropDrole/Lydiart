<?php
/*
    Template Name: About
*/
    
    /*Section Presentation*/
    $presentation = fetchData(get_field(selector: 'presentation'));

    /*Section Démarche*/
    $demarche = get_field(selector: 'demarche');

    foreach ($demarche as $key => $value) {
        if (!is_null($value)) {
            $frame[] = $value;
        }
    }

    /*Bouton*/
    $button = get_field(selector: 'button');
?>

<?php get_header(); ?>

        <!--Section Présentation-->
        <section id="presentation" class="w-full h-dvh flex flex-col gap-3 lg:gap-0 lg:flex-row justify-between overflow-x-hidden">
            <img class="w-full lg:w-1/2 h-full object-cover z-10" src="<?php echo($presentation['src']); ?>" alt="<?php echo($presentation['alt']); ?>">
            <div class="w-full lg:w-1/2 flex flex-col justify-center items-center px-3 py-4 lg:px-24 lg:py-0 gap-6">
                <div class="flex flex-col gap-4 text-center">
                    <h2><?php echo($presentation['title']); ?></h2>
                    <p class="font-poppins font-light"><?php echo($presentation['description']); ?></p>
                </div>
            </div>
        </section>

        <!--Section Démarche-->
        <section id="démarche" class="w-full flex flex-col gap-12 justify-between items-center px-10 py-3">

            <!--Affiche le contenu pour chaque groupe de champs de la section-->
            <?php 
                for ($i=0;$i<count($frame);$i++) {
                    $demarche[$i] = fetchData($frame[$i]);
                    $direction = NULL;

                    if ($i%2 !== 0) { //Toutes les 2 sections, sa direction est inversée
                        $direction = 'lg:flex-row-reverse';
                    }

                    echo("<div class='flex flex-col ". $direction ." gap-8 lg:gap-5 items-center lg:flex-row'>
                            <img src=". $demarche[$i]['src'] ." alt=". $demarche[$i]['title'] ." class='w-full lg:w-1/2 shadow-frame'>
                            <div class='flex flex-col gap-4'>
                                <h3 class='text-center lg:text-left'>". $demarche[$i]['title']  ."</h3>
                                <p class='text-center lg:text-left font-poppins font-light text-sm'>". $demarche[$i]['description']  ."</p>
                            </div>
                        </div>");
                }
            ?>
            <a class="button text-base" href="<?php echo esc_url($button['url']); ?>" target="<?php echo esc_attr($button['target']); ?>"><?php echo esc_html($button['title']); ?></a>
        </section>

    <?php get_footer(); ?>