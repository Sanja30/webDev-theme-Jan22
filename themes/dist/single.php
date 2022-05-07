<?php get_header(); 
$classSidebar = 'no-sidebar';
if(is_active_sidebar('sidebar_posts')){
    $classSidebar = 'has-sidebar';
}

?>

<div id="content" class="container">
    <main class="main-content <?php echo $classSidebar; ?>">
        <h1><?php the_title(); ?></h1>
        <div class="post-meta">
        <?php include(locate_template( 'template-parts/post-meta.php'));?><!--eingebunden schnipsel vom post-meta.php-->
        </div>
        <?php include(locate_template( 'template-parts/gutenberg-loop.php'));?>
        
        <div class="post-meta">
            <div class="meta category">
                <span class="icon-category" aria-hidden="true"></span>&nbsp;
                <?php the_category(' | '); ?>
            </div>
            
                <?php the_tags('<div class="meta tags">
                <span class="icon-tag" aria-hidden="true"></span>&nbsp;' , ' , ' , '</div>');?><!--prvi je za before a drugo mjesto zs separator npr /| , itd...div tj span ikona nece biti prikazan ako nema tagova-->
            
        </div>

        <nav class="post-navigation">
             <?php the_post_navigation(array(
                  'prev_text' =>  __('Vorheriger Beitrag', 'wifi'),
                  'next_text' =>  __('Nächster Beitrag', 'wifi') 
             )); ?>

            <!--<div class="nav-links">
                <div class="nav-previous">
                    <a href="#">Vorheriger Beitrag</a>
                </div>
                <div class="nav-next">
                    <a href="#">Nächster Beitrag</a>
                </div>
            </div>-->
        </nav>

    </main>
    <?php if(is_active_sidebar('sidebar_posts')):?>
    <aside class="sidebar">
        <?php dynamic_sidebar('sidebar_posts');
        ?>
    </aside>
    <?php endif; ?>
</div>


<?php get_footer(); ?>