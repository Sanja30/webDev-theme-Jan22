<?php get_header(); ?>
<main id="content">
    <section class="container">
    <?php if(have_posts()){

     while(have_posts()){
         the_post();
         the_content();
     }

    } ?>
    </section>



<!--jhjh

    <?php //Daten Holen?>
    <?php query_posts( array(
        'post_type' => 'post',
        'posts_per_page' => 3
    ));  ?>
    <?php //Daten ausgeben?>
    <?php if(have_posts()): ?>
    



        
        <?php while(have_posts()):
            the_post();
            the_title('<h2>', '</h2')?>
        
    
      <?php wp_reset_query();
    ?> 
</main>

<?php get_footer(); ?>