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
        <div class="columns">
        <?php while(have_posts()):
            the_post();?>
        <div class="col-2">
            <article class="blog-item">
                <a href="<?php the_permalink(); ?>">


                <?php if(has_post_thumbnail()){
                 the_post_thumbnail('post-image'); 
                } else {
                    $img = get_field('placeholder_posts', 'options');
                    echo wp_get_attachment_image($img, 'post-image');
                } ?> 
                
                </a>
                <div class="blog-description">
                    <time class="meta" datetime="<?php the_time('Y-m-d'); ?>">
                        <span class="icon-calendar" aria-hidden="true"></span>&nbsp;
                        <?php the_time('d.m.Y');?>
                    </time>
                    <span class="meta category">
                            <span class="icon-category" aria-hidden="true"></span>&nbsp;
                           <?php the_category(' | ')?><!-- <a href="blog.html">Web Entwicklung</a> , u zagradi kako zelimo razdvajati kategorije , | / npr-->
                        </span>
                    <h3 class="blog-title">
                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a><!--tu je bio link na single post seite koja je single.php, i gornj link isto tako , i title posta-->
                    </h3>
                </div>
            </article>
        </div>
        <?php  endwhile; ?>
        </div>


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