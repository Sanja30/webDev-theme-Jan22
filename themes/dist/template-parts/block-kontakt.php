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

<?php $kontakt = get_field('block-kontakt'); ?>
<div id="kontakt_2">
<?php echo wp_get_attachment_image($kontakt ['foto']); ?>
    <p class="name"><?php echo $kontakt ['name'] ?></p>
    <p class="email"><?php echo $kontakt ['email'] ?></p>
</div>