<?php
/*
    Template Name: Contact
*/
?>
<?php get_header(); ?>


Contact html
<h3><?php the_field("email"); ?></h3>

<?php $coordinates = get_field(selector: 'coordonnees'); ?>

<h3>Coordonnées GPS</h3>
<p>Latitude : <?php echo($coordinates['latitude']); ?></p>
<p>Longitude : <?php echo($coordinates['longitude']); ?></p>

<pre><?php 
    $image = get_field(selector: 'image');
    //var_dump($image);
    $src = $image['url'];
    $alt = $image['title'];
    
    $size = 'custom-size';
    $thumb = $image['sizes'][$size];
    $width = $image['sizes'][ $size . '-width' ];
    $height = $image['sizes'][ $size . '-height' ];

?></pre>

<img src="<?php echo $src; ?>" alt="<?php echo $alt; ?>" width="<?php echo($width . 'px'); ?>" height="<?php echo($height . 'px'); ?>">