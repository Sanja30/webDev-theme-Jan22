<?php /*Template Name: Homepage*/?>
<?php get_header();?>

<main id="content">
   <section class="container animate fade-in-up">
    <?php include(locate_template( 'template-parts/gutenberg-loop.php'));?>
    </section>
    <?php //Daten Holen?>
    <?php query_posts( array(
        'post_type' => 'post',
        'posts_per_page' => 2
    ));  ?>
    <?php //Daten ausgeben?>
    <?php if(have_posts()): ?>
    <section id="blog" class="container">
        <h2 class="section-title animate fade-in-up">Aktuelle Beiträge</h2>

        <?php include(locate_template( 'template-parts/post-loop.php'));?><!-- ovdje je shortcut na kod koji je u post-loop templatu-->

        <div class="actions animate fade-in-up">
            <a class="btn" href="blog.html">Mehr Beiträge</a>
        </div>
    </section>
    <?php endif;?>

    <?php //daten löschen
       wp_reset_query();
    ?>

</main>

<?php get_footer();?>