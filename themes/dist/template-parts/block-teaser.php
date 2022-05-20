<?php 
$id = 'block-' . $block['id']; //dobije automatski broj ako ostane prazno u block postu
if(!empty($block['anchor'])){
   $id = $block['anchor'];
}
$className = 'container';
if(!empty($block['className'])){
    $className .= '  ' . $block['className'];             //.= dodajemo postojecoj klasi nesto i prije toga leerzeichen za razmak ' '
}

?>

<?php $teaser = get_field('teaser'); ?>

<section id="<?php echo esc_attr( $id ); ?>" class="<?php echo esc_attr( $className);?>">
        <div class="columns">

            <?php foreach($teaser as $item): ?>

           <!-- <?php echo '<pre>';
            print_r($teaser);
            echo '</pre>'?> -->

            <div class="col-3">
                <div class="teaser-item animate fade-in-up">
                    <span class="<?php echo $item ['icon'] ?> " aria-hidden="true"></span>
                    <h2 class="teaser-title"><?php echo  $item ['uberschrift'] ?></h2>
                    <p class="teaser-description"><?php echo $item ['text'] ?></p>
                    <a href="<?php echo $item ['link'] ?>" class="teaser-link">
                        <span class="icon-link" aria-hidden="true"></span>
                        <span class="screen-reader-text"><?php echo esc_attr_e('Zur Seite: Web Entwicklung', 'wifi');?></span>
                    </a>
                </div>
            </div>
            <?php endforeach ?>
        </div>
   
</section>
