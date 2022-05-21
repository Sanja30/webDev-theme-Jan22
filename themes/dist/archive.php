<?php get_header(); ?>

<main id="content">
    <section class="container">
        <h1>
            <?php
           if(is_category()){
               single_cat_title();
           }else{
               the_archive_title();/*kao npr Tags */
           }
            ?>
        </h1>
        <?php the_archive_description('<p>', '</p>'); ?> <!--beschreibung der kategorie oder anderen arhieven text, ako upisemo p tag unutra onda nece biti prikazan ako je tekst prazan-->
        <nav class="category-nav">
            <ul>
             <?php 
             wp_list_categories(array(
                  'hierarchical' => false, /*ako nemamo podkategorije */
                  'show_option_all' => __('Alle', 'wifi'), /* pokazi sve kategorije ako nemamo posebnu kategoriju koja se zove alle i da je sve pod tom kategorijom */
                  'title_li' => '' /*da se ne pokaze wpov title Kategorie, stavimo prazni string a ne na false */

             ));
             
             ?>
            </ul>
        </nav>
        <?php if(have_posts()): ?>
        <?php include(locate_template( 'template-parts/post-loop.php'));?>


         <?php else: ?>
           <h2> <?php esc_attr_e('Es wurden keine Beiträge gefunden', 'wifi'); ?></h2> <!--ako nemamom postova-->
        <?php endif;?>
            
        
        <nav class="pagination">

            <?php 
              echo paginate_links(array(
                 'prev_text' => '<span class="icon-arrow-left" aria-label="' . __('Vorherige Seite', 'wifi') . '"></span>',
                 'next_text' => '<span class="icon-arrow-right" aria-label="' . __('Nächste Seite', 'wifi') . '"></span>'
              ));
            
            ?>
           
            <!-- <a class="prev" href="#">
                <span class="icon-arrow-left" aria-label="Vorherige Seite"></span>
            </a>
            <a href="#">1</a>
            <span class="current">2</span>
            <a href="#">3</a>
            <a href="#">4</a>
            <span class="dots">...</span>
            <a href="#">17</a>
            <a class="next" href="#">
                <span class="icon-arrow-right" aria-label="Nächste Seite"></span>
            </a>-->
        </nav>
    </section>
</main>



<?php get_footer(); ?>