<?php 
$id = 'block-' . $block['id'];
  //dobije automatski broj ako ostane prazno u block postu


if(!empty($block['anchor'])){
   $id = $block['anchor'];
}
$className = 'columns';
if(!empty($block['className'])){
    $className .= '  ' . $block['className'];             //.= dodajemo postojecoj klasi nesto i prije toga leerzeichen za razmak ' '
}

?>

<?php //Daten Holen?>
    <?php 
    $anzahl = get_field('anzahl_beitrage');
    
        query_posts( array(
        'post_type' => 'post',
        'posts_per_page' => $anzahl
    ));  
    
    ?>
    <?php if(have_posts()){
        include(locate_template('template-parts/post-loop.php'));
    }
    ?>
     <?php //daten löschen
       wp_reset_query();
    ?>
