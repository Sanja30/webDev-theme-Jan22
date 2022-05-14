<?php /*Template Name: Homepage*/?>
<?php get_header();?>

<main id="content">
   <section class="container animate fade-in-up">
    <?php include(locate_template( 'template-parts/gutenberg-loop.php'));?>
    </section>

    <?php //Daten Holen?>
    <?php query_posts( array(
        'post_type' => 'references',
        'posts_per_page' => 3,
        'orderby' =>'rand' //slucajni redoslijed, ASC, DESC 
    ));?>

    <?php //Daten ausgeben?>

    <?php if(have_posts()): ?>
    
    <section id="testimonials" class="testimonials container-small secondary-bg">
        <h2 class="section-title animate fade-in-up"><?php esc_attr_e('Testimonials' , 'wifi');?></h2>
        <div class="owl-carousel owl-theme animate fade-in-up">

        <?php while(have_posts( )) :?>
            <?php the_post();?>
            <div class="item testimonial-item">
                <figure class="testimonial-image">
                    <?php echo wp_get_attachment_image(get_field('referenz_foto'), 'thumbnail'); ?>
                </figure>
                <blockquote class="testimonial-content">
                   <?php the_field('referenz_text');?>
                    <cite><?php the_title(); ?></cite>
                </blockquote>
            </div>
        <?php endwhile?>   
        </div>
    </section>

    <?php wp_enqueue_style( 'owl-css');?>
    <?php wp_enqueue_style('owl-theme-css');?>
    <?php wp_enqueue_script('owl-script');?>

    <?php endif?>
    <?php //daten löschen
       wp_reset_query();
    ?>


    <?php //Daten Holen?>
    <?php query_posts( array(
        'post_type' => 'post',
        'posts_per_page' => 2
    ));  ?>
    <?php //Daten ausgeben?>
    <?php if(have_posts()): ?>
    <section id="blog" class="container">
        <h2 class="section-title animate fade-in-up"><?php _e('Aktuelle Beiträge', 'wifi');?></h2>

        <?php include(locate_template( 'template-parts/post-loop.php'));?><!-- ovdje je shortcut na kod koji je u post-loop templatu-->

        <?php $blogsite = get_option('page_for_posts'); ?>
        <?php if(!empty($blogsite)):
            
           /* echo '<pre>';
            print_r($blogsite);
            echo '</pre>';  ....da vidimo sta nam se izdaje s kodom*/
            
            ?>
        <div class="actions animate fade-in-up">
            <a class="btn" href="<?php echo get_permalink($blogsite);?>"><?php _e('Mehr Beiträge', 'wifi');?></a>
        </div>
        <?php endif;?>
    </section>
    <?php endif;?>

    <?php //daten löschen
       wp_reset_query();
    ?>

</main>

<?php get_footer();?>