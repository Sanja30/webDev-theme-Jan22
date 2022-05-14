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
                    
                     <?php 
                     include(locate_template( 'template-parts/post-meta.php'));
                     ?><!--eingebunden schnipsel vom post-meta.php-->


                    <h3 class="blog-title">
                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a><!--tu je bio link na single post seite koja je single.php, i gornj link isto tako , i title posta-->
                    </h3>
                </div>
            </article>
        </div>
        <?php  endwhile; ?>
</div>