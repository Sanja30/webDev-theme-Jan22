<aside id="kontakt" class="container-small">
    <h2 class="section-title animate fade-in-up"><?php _e('Kontakt', 'wifi'); ?></h2>
    <dl class="contact-info animate fade-in-up">


      <?php $phone = get_field('phone', 'options');?>
      <?php if(!empty($phone)): ?> 
        
        <dt>
            <span class="icon-phone" aria-hidden="true"></span>
            <span class="screen-reader-text"><?php _e('Telefonnummer', 'wifi'); ?></span>
        </dt>
        <dd>
            <a href="tel:<?php echo preg_replace("/[^\+\d]+/", "", $phone); ?>"><?php echo $phone; ?></a>
        </dd>
      <?php endif; ?>  






        <?php $adress = get_field('adress', 'options') ?>
        <?php if(!empty($adress)): ?> 
        <dt>
            <span class="icon-location" aria-hidden="true"></span>
            <span class="screen-reader-text"><?php _e('Adresse', 'wifi'); ?></span>
        </dt>
        <dd>
        <?php echo $adress; ?>
        </dd>
        <?php endif; ?> 



        <?php $email = get_field('email', 'options') ?>
        <?php if(!empty($email)): ?>

        <dt>
            <span class="icon-email" aria-hidden="true"></span>
            <span class="screen-reader-text"><?php _e('E-Mail Adresse', 'wifi'); ?></span>
        </dt>
        <dd>
            <a href="mailto:<?php echo antispambot($email); ?>" ><?php echo antispambot($email); ?></a>
        </dd>
        <?php endif; ?> 
    </dl>
    <div class="form-wrapper animate fade-in-up">


    <!--form geloscht-->    
      <?php 
      $shortcode = get_field ('form', 'options');
      echo do_shortcode($shortcode);
      
      ?>


    </div>
</aside>
<footer id="page-footer" class="container">
    <div class="columns">
        <div class="col-3">
            <ul class="social-links">

            <?php $facebook = get_field('facebook', 'options');?>
            <?php if(!empty($facebook)): ?>
                <li>
                    <a href="<?php echo($facebook); ?>" target="_blank" rel="nofollow">
                        <span class="icon-facebook" aria-hidden="true"></span>
                        <span class="screen-reader-text">Folge uns auf Facebook</span>
                    </a>
                </li>
            <?php endif; ?> 

            <?php $instagram = get_field('instagram', 'options');?>
            <?php if(!empty($instagram)): ?>
                <li>
                    <a href="<?php echo($instagram); ?>" target="_blank" rel="nofollow">
                        <span class="icon-instagram" aria-hidden="true"></span>
                        <span class="screen-reader-text">Folge uns auf Instagram</span>
                    </a>
                </li>
            <?php endif; ?>

            <?php $linkedin = get_field('linkedin', 'options');?>
            <?php if(!empty($linkedin)): ?>
                <li>
                    <a href="<?php echo($linkedin); ?>" target="_blank" rel="nofollow">
                        <span class="icon-linkedin" aria-hidden="true"></span>
                        <span class="screen-reader-text">Folge uns auf LinkedIn</span>
                    </a>
                </li>
            <?php endif; ?>

            <?php $you_tube = get_field('you_tube', 'options');?>
            <?php if(!empty($you_tube)): ?>
                <li>
                    <a href="<?php echo($you_tube); ?>" target="_blank" rel="nofollow">
                        <span class="icon-youtube" aria-hidden="true"></span>
                        <span class="screen-reader-text">Folge uns auf YouTube</span>
                    </a>
                </li>
            <?php endif; ?>    


            </ul>
        </div>
        <div class="col-3">
            <span class="copyright">&copy; <?php bloginfo('name'); ?></span>
        </div>
        <div class="col-3">
            <nav id="footer-nav">
               <!-- <ul class="nav-menu">
                    <li>
                        <a href="datenschutz.html">Datanschutz</a>
                    </li>
                    <li>
                        <a href="impressum.html">Imressum</a>
                    </li>
                </ul>-->
                <?php 
                wp_nav_menu(array(
                    'theme_location' => 'footer', /*ime menua u wp*/
                    'container' => false, /*da nebude containerom umfasst*/
                    'menu_class' => 'nav-menu',
                    'depth' => 1,
                    'fallback_cb' => false /*da nebude standard menu*/
                ));
                
                ?>
            </nav>
        </div>
    </div>
</footer>
<div id="to-top">
    <a href="#page-header"><?php _e('Top', 'wifi'); ?></a>
</div>
<?php wp_footer(); ?>
<!--
<script src="assets/owl-carousel/owl.carousel.min.js"></script>
<script src="assets/scripts.js"></script>-->
</body>
</html>