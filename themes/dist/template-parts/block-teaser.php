<?php $teaser = get_field('teaser'); ?>

<section id="teaser" class="container">
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
                        <span class="screen-reader-text"><?php esc_attr_e('Zur Seite: Web Entwicklung', 'wifi');?></span>
                    </a>
                </div>
            </div>
            <?php endforeach ?>
        </div>
   
</section>
