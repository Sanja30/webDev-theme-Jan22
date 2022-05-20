<?php 
$id = 'block-' . $block['id']; //dobije automatski broj ako ostane prazno u block postu
if(!empty($block['anchor'])){
   $id = $block['anchor'];
}
$className = 'container_big';
if(!empty($block['className'])){
    $className .= '  ' . $block['className'];             //.= dodajemo postojecoj klasi nesto i prije toga leerzeichen za razmak ' '
}

?>

<?php $block_uebung = get_field('uebung'); ?>

<?php if(!empty($block_uebung)); ?>

<section id="<?php echo esc_attr( $id ); ?>" class="<?php echo esc_attr( $className);?>">

     <div class="block-uebung-div" style="background-image: url('<?php echo $item ['background_bild'] ?>');">
         <div class="message">
             <h4><?php echo  $item ['h4'] ?></h4>
             <h1><?php echo  $item ['h1'] ?></h1>
     </div>
         
    </div>
    
     
    </section>
    <?php endif; ?> 