<?php /*Template Name: Uebung*/?>
<?php get_header();?>

<main id="content">
    <section class="container">
    <?php include(locate_template( 'template-parts/gutenberg-loop.php'));?>
    </section>

    <?php //Daten Holen?>
    <?php query_posts( array(
        'post_type' => 'references',
        'posts_per_page' => 2,
        'orderby' =>'ASC' //slucajni redoslijed, ASC, DESC 
    ));?>

    <?php //Daten ausgeben?>

    <?php if(have_posts()): ?>
        <?php while(have_posts( )) :?>
            <?php the_post();?>

    <section id="uebung" class="container <?php the_field('background');?>">

    <h1><?php the_title(); ?></h1>
    <div id="uebung-div">
         <p><?php the_field('uebung_text');?></p>
         <?php echo wp_get_attachment_image(get_field('uebung_foto'), 'large'); ?>
    </div>
     
    </section>
    
    <?php endwhile?>
    <?php endif ?>
    <?php wp_reset_query();?>
</main>

<?php get_footer();?>