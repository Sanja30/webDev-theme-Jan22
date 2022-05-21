<?php get_header(); ?>

<main id="content">
   <section class="container errorSeite">
   <?php $error = get_field('error-page', 'options'); ?>
      <h1><?php echo $error ['404-ueberschrift'] ?></h1>
      <p><?php echo $error ['404-text'] ?></p>
      <a href="<?php echo home_url( );?>"><?php _e('Zur Startseite', 'wifi');?></a>
   </section>
</main>




















<?php get_footer(); ?>