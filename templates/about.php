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
        <section id="presentation" class="w-full h-dvh flex flex-row justify-between">
            <img class="w-1/2 h-full object-cover" src="<?php echo($presentation['src']); ?>" alt="<?php echo($presentation['alt']); ?>">
            <div class="w-1/2 flex flex-col justify-center px-24 gap-6">
                <div class="flex flex-col gap-3">
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
                        $direction = 'flex-row-reverse';
                    }

                    echo("<div class='flex ". $direction ." gap-5 items-center'>
                            <img src=". $demarche[$i]['src'] ." alt=". $demarche[$i]['title'] ." class='w-1/2 shadow-frame'>
                            <div class='flex flex-col gap-4'>
                                <h3>". $demarche[$i]['title']  ."</h3>
                                <p class='font-poppins font-light text-sm'>". $demarche[$i]['description']  ."</p>
                            </div>
                        </div>");
                }
            ?>
            <a class="button text-base" href="<?php echo esc_url($button['url']); ?>" target="<?php echo esc_attr($button['target']); ?>"><?php echo esc_html($button['title']); ?></a>
        </section>

    <?php get_footer(); ?>